<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_cart.php";
include_once "../../lib/function_invoice.php";
include_once "../../lib/function_customer.php";
include_once "../../lib/function_order_master.php";

$branch_id      = $_SESSION['branch_id'];
$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id    = $customer['customer_id'];


if($_GET['action'] == 'delete_item'){
    $cart_id = $_GET['cart_id'];
    
    $sql = "DELETE FROM cart WHERE cart_id = :v_cart_id";

    $query_cart = $db->prepare($sql);
    $query_cart->bindParam(":v_cart_id", $cart_id);
    $query_cart->execute();
    $count = $query_cart->rowCount();
    echo $count;


}elseif($_GET['action'] == 'checkout'){

    $invoice_number         = rand(1000,9999);
    $invoice_datetime       = date('Y-m-d H:i:s');
    $invoice_date_expired   = date('Y-m-d', strtotime('+1 day'));
    $kurir_id               = 0;
    $admin_id               = 0;
    $order_master_code      = 100;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];
    $invoice_paid_status    = 0;

    $invoice_price = 0;
    $carts = search_cart_by_customer_inv($db, $customer_id, 0);
    foreach($carts as $cart){
        $invoice_price += $cart['cart_subtotal_price'];
    }

    $invoice_ppn                = $invoice_price * ($ppn/100);
    $invoice_shipping           = 10000;
    $invoice_price_total        = $invoice_price + $invoice_ppn + $invoice_shipping;
    $invoice_note               = $_POST['invoice_note'];
    $invoice_delivery_address   = $_POST['invoice_delivery_address'];


    // INSERT INVOICE
    $sql = "INSERT INTO invoice (branch_id, invoice_number, invoice_datetime, invoice_date_expired, customer_id, kurir_id, admin_id, order_master_code, order_master_status, invoice_paid_status, invoice_price, invoice_ppn, invoice_shipping, invoice_price_total, invoice_note, invoice_delivery_address) VALUES (:v_branch_id, :v_invoice_number, :v_invoice_datetime, :v_invoice_date_expired, :v_customer_id, :v_kurir_id, :v_admin_id, :v_order_master_code, :v_order_master_status, :v_invoice_paid_status, :v_invoice_price, :v_invoice_ppn, :v_invoice_shipping, :v_invoice_price_total, :v_invoice_note, :v_invoice_delivery_address)";  
        
    $query_cart = $db->prepare($sql);
    $query_cart->bindParam(":v_branch_id", $branch_id);
    $query_cart->bindParam(":v_invoice_number", $invoice_number);
    $query_cart->bindParam(":v_invoice_datetime", $invoice_datetime);
    $query_cart->bindParam(":v_invoice_date_expired", $invoice_date_expired);
    $query_cart->bindParam(":v_customer_id", $customer_id);
    $query_cart->bindParam(":v_kurir_id", $kurir_id);
    $query_cart->bindParam(":v_admin_id", $admin_id);
    $query_cart->bindParam(":v_order_master_code", $order_master_code);
    $query_cart->bindParam(":v_order_master_status", $order_master_status);
    $query_cart->bindParam(":v_invoice_paid_status", $invoice_paid_status);
    $query_cart->bindParam(":v_invoice_price", $invoice_price);
    $query_cart->bindParam(":v_invoice_ppn", $invoice_ppn);
    $query_cart->bindParam(":v_invoice_shipping", $invoice_shipping);
    $query_cart->bindParam(":v_invoice_price_total", $invoice_price_total);
    $query_cart->bindParam(":v_invoice_note", $invoice_note);
    $query_cart->bindParam(":v_invoice_delivery_address", $invoice_delivery_address);
    $query_cart->execute();
    $count = $query_cart->rowCount();
    $invoice_id = $db->lastInsertId();

    if($count < 1){
        echo 0;
        exit;
    }


    // INSERT INVOICE STATUS
    $invoice_status_datetime = $invoice_datetime;
    $sql = "INSERT INTO invoice_status (invoice_id, order_master_code, order_master_status, invoice_status_datetime) VALUES (:v_invoice_id, :v_order_master_code, :v_order_master_status, :v_invoice_status_datetime)";  
        
    $query_cart = $db->prepare($sql);
    $query_cart->bindParam(":v_invoice_id", $invoice_id);
    $query_cart->bindParam(":v_order_master_code", $order_master_code);
    $query_cart->bindParam(":v_order_master_status", $order_master_status);
    $query_cart->bindParam(":v_invoice_status_datetime", $invoice_status_datetime);
    $query_cart->execute();
    $count = $query_cart->rowCount();

    if($count < 1){
        echo 0;
        exit;
    }

    
    // UPDATE CART
    foreach($carts as $cart){

        $cart_id = $cart['cart_id'];

        $sql = "UPDATE cart SET 
            invoice_id = :v_invoice_id
        WHERE cart_id = :v_cart_id";  

        $query_admin = $db->prepare($sql);
        $query_admin->bindParam(":v_invoice_id", $invoice_id);
        $query_admin->bindParam(":v_cart_id", $cart_id);
        $query_admin->execute();
        $count = $query_admin->rowCount();
        if($count < 1){
            echo 0;
            exit;
        }
        
    }
    
    echo $invoice_id;


}elseif($_GET['action'] == 'transfer'){

    $invoice_id             = $_POST['invoice_id'];
    $order_master_code      = 200;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];

    // UDPATE INVOICE
    $sql = "UPDATE invoice SET 
        order_master_code = :v_order_master_code,
        order_master_status = :v_order_master_status
    WHERE invoice_id = :v_invoice_id";  

    $query_invoice = $db->prepare($sql);
    $query_invoice->bindParam(":v_order_master_code", $order_master_code);
    $query_invoice->bindParam(":v_order_master_status", $order_master_status);
    $query_invoice->bindParam(":v_invoice_id", $invoice_id);
    $query_invoice->execute();
    $count = $query_invoice->rowCount();


    // INSERT INVOICE STATUS
    $invoice_status_datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO invoice_status (invoice_id, order_master_code, order_master_status, invoice_status_datetime) VALUES (:v_invoice_id, :v_order_master_code, :v_order_master_status, :v_invoice_status_datetime)";  
        
    $query_cart = $db->prepare($sql);
    $query_cart->bindParam(":v_invoice_id", $invoice_id);
    $query_cart->bindParam(":v_order_master_code", $order_master_code);
    $query_cart->bindParam(":v_order_master_status", $order_master_status);
    $query_cart->bindParam(":v_invoice_status_datetime", $invoice_status_datetime);
    $query_cart->execute();
    $count = $query_cart->rowCount();
    $invoice_id = $db->lastInsertId();

    if($count < 1){
        echo 0;
        exit;
    }

    echo 1;


}elseif($_GET['action'] == 'check_unfinished_transaction'){

    $invoice = search_invoice_ongoing_transfer($db, $customer_id) ?? null;

    if ($invoice) {
        echo $invoice[0]['invoice_id'];
    }else{
        echo 0;
    }

}else{
    header('location:../../login_customer.php');
    exit;
}