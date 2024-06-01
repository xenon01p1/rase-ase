<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_cart.php";
include_once "../../lib/function_menu.php";
include_once "../../lib/function_invoice.php";
include_once "../../lib/function_customer.php";
include_once "../../lib/function_miscellaneous.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id    = $customer['customer_id'];

if($_GET['action'] == 'menu_picture'){
    $menu_id = $_POST['menu_id'];
    $menus = search_menu_by_id($db, $menu_id);
    echo json_encode($menus);

}elseif($_GET['action'] == 'add_item'){

    $check_unfinished_invoice = search_invoice_by_customer_order_master($db, $customer_id, 100);

    if($check_unfinished_invoice){
        echo 'ONGOING_TRANSACTION';
        exit;
    }

    if(isset($_GET['menu_id'])){
        $menu_id                = $_GET['menu_id'];
        $menu                   = search_menu_by_id($db, $menu_id)[0];
        $invoice_id             = 0;
        $cart                   = search_cart_by_customer_inv_menu($db, $customer_id, $invoice_id, $menu_id);
        $cart_qty               = ($cart) ? $cart[0]['cart_qty'] + 1: 1;

    }else{
        $menu_id                = $_POST['menu_id'];
        $menu                   = search_menu_by_id($db, $menu_id)[0];
        $invoice_id             = 0;
        $cart                   = search_cart_by_customer_inv_menu($db, $customer_id, $invoice_id, $menu_id);
        $cart_qty               = ($cart) ? $cart[0]['cart_qty'] + $_POST['cart_qty']: $_POST['cart_qty'];
    }

    $now                    = date('Y-m-d');
    $cart_discount          = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? $menu['menu_discount'] : 0;
    $cart_price             = ($cart_discount) ? ($menu['menu_price'] - ($menu['menu_price'] * ($menu['menu_discount']/100))): $menu['menu_price'];
    $cart_subtotal_price    = ($cart_discount) ? ($menu['menu_price'] - (intval($menu['menu_price']) * ($menu['menu_discount']/100)))*$cart_qty : $menu['menu_price']*$cart_qty;
    

    if($cart){
        $cart_id = $cart[0]['cart_id'];

        $sql = "UPDATE cart 
        SET cart_qty = :v_cart_qty, 
            cart_price = :v_cart_price, 
            cart_discount = :v_cart_discount, 
            cart_subtotal_price = :v_cart_subtotal_price 
        WHERE cart_id = :v_cart_id";   

        $query_cart = $db->prepare($sql);
        $query_cart->bindParam(":v_cart_id", $cart_id);
        $query_cart->bindParam(":v_cart_qty", $cart_qty);
        $query_cart->bindParam(":v_cart_price", $cart_price);
        $query_cart->bindParam(":v_cart_discount", $cart_discount);
        $query_cart->bindParam(":v_cart_subtotal_price", $cart_subtotal_price);

    }else{
        $sql = "INSERT INTO cart (invoice_id, customer_id, menu_id, cart_qty, cart_price, cart_discount, cart_subtotal_price) VALUES (:v_invoice_id, :v_customer_id, :v_menu_id, :v_cart_qty, :v_cart_price, :v_cart_discount, :v_cart_subtotal_price)";  
        
        $query_cart = $db->prepare($sql);
        $query_cart->bindParam(":v_invoice_id", $invoice_id);
        $query_cart->bindParam(":v_customer_id", $customer_id);
        $query_cart->bindParam(":v_menu_id", $menu_id);
        $query_cart->bindParam(":v_cart_qty", $cart_qty);
        $query_cart->bindParam(":v_cart_price", $cart_price);
        $query_cart->bindParam(":v_cart_discount", $cart_discount);
        $query_cart->bindParam(":v_cart_subtotal_price", $cart_subtotal_price);

    }

    
    $query_cart->execute();
    $count = $query_cart->rowCount();

    if($count){
        echo $menu_id;
    }else{
        echo 0;
    }
    


}else{
    header('location:../../login_customer.php');
    exit;
}