<?php

function search_ongoing_invoice($db, $customer_id){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE order_master_code >= 200 AND order_master_code < 600 AND customer_id=:v_customer_id ORDER BY invoice_id DESC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id", $customer_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}

function search_finished_invoice($db, $customer_id){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE order_master_code = 600 AND customer_id=:v_customer_id ORDER BY invoice_id DESC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id", $customer_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}

function search_invoice_by_inv($db, $invoice_id){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE invoice_id=:v_invoice_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_invoice_id", $invoice_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}

function search_invoice_ongoing_transfer($db, $customer_id){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE customer_id=:v_customer_id AND order_master_code = 100 ORDER BY invoice_id DESC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id", $customer_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}


function search_invoice_by_branch($db, $branch_id){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE branch_id=:v_branch_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}

function search_invoice_by_kurir_order_master($db, $kurir_id, $order_master_code){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE kurir_id=:v_kurir_id AND order_master_code=:v_order_master_code"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_kurir_id", $kurir_id);
    $query->bindParam(":v_order_master_code", $order_master_code);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}

function search_invoice_by_customer_order_master($db, $customer_id, $order_master_code){
    $invoice=[];
    $sql = "SELECT * FROM invoice WHERE customer_id=:v_customer_id AND order_master_code=:v_order_master_code"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id", $customer_id);
    $query->bindParam(":v_order_master_code", $order_master_code);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice[] = $row;  }
    return $invoice; 
}
