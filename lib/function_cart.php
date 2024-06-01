<?php

function search_cart_by_customer_inv_menu($db, $customer_id, $invoice_id, $menu_id){
    $cart=[];
    $sql = "SELECT * FROM cart WHERE customer_id=:v_customer_id AND invoice_id=:v_invoice_id AND menu_id=:v_menu_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id",$customer_id);
    $query->bindParam(":v_invoice_id",$invoice_id);
    $query->bindParam(":v_menu_id",$menu_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $cart[] = $row;  }
    return $cart; 
}


function search_cart_by_customer_inv($db, $customer_id, $invoice_id){
    $cart=[];
    $sql = "SELECT * FROM cart WHERE customer_id=:v_customer_id AND invoice_id=:v_invoice_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id",$customer_id);
    $query->bindParam(":v_invoice_id",$invoice_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $cart[] = $row;  }
    return $cart; 
}

function search_cart_by_inv($db, $invoice_id){
    $cart=[];
    $sql = "SELECT * FROM cart WHERE invoice_id=:v_invoice_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_invoice_id",$invoice_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $cart[] = $row;  }
    return $cart; 
}