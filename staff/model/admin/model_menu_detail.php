<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_order_master.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "deploy_courier"){

    $invoice_id             = $_POST['invoice_id'];
    $kurir_id               = $_POST['kurir_id'];
    $order_master_code      = 300;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];

    // UPDATE INVOICE
    $sql = "UPDATE invoice SET 
        kurir_id = :v_kurir_id,
        order_master_code = :v_order_master_code,
        order_master_status = :v_order_master_status
    WHERE invoice_id = :v_invoice_id";  

    $query_invoice = $db->prepare($sql);
    $query_invoice->bindParam(":v_kurir_id", $kurir_id);
    $query_invoice->bindParam(":v_order_master_code", $order_master_code);
    $query_invoice->bindParam(":v_order_master_status", $order_master_status);
    $query_invoice->bindParam(":v_invoice_id", $invoice_id);
    $query_invoice->execute();
    $count = $query_invoice->rowCount();
    

    // INSERT INVOICE STATUS
    $invoice_status_datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO invoice_status (invoice_id, order_master_code, order_master_status, invoice_status_datetime) VALUES (:v_invoice_id, :v_order_master_code, :v_order_master_status, :v_invoice_status_datetime)";  
        
    $query_inv_status = $db->prepare($sql);
    $query_inv_status->bindParam(":v_invoice_id", $invoice_id);
    $query_inv_status->bindParam(":v_order_master_code", $order_master_code);
    $query_inv_status->bindParam(":v_order_master_status", $order_master_status);
    $query_inv_status->bindParam(":v_invoice_status_datetime", $invoice_status_datetime);
    $query_inv_status->execute();
    $count = $query_inv_status->rowCount();

    if($count < 1){
        echo 0;
        exit;
    }

    echo 1;



}elseif($_GET['action'] == "done"){

    $invoice_id             = $_GET['invoice_id'];
    $order_master_code      = 600;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];

    // UPDATE INVOICE
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


    $invoice_status_datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO invoice_status (invoice_id, order_master_code, order_master_status, invoice_status_datetime) VALUES (:v_invoice_id, :v_order_master_code, :v_order_master_status, :v_invoice_status_datetime)";  
        
    $query_inv_status = $db->prepare($sql);
    $query_inv_status->bindParam(":v_invoice_id", $invoice_id);
    $query_inv_status->bindParam(":v_order_master_code", $order_master_code);
    $query_inv_status->bindParam(":v_order_master_status", $order_master_status);
    $query_inv_status->bindParam(":v_invoice_status_datetime", $invoice_status_datetime);
    $query_inv_status->execute();
    $count = $query_inv_status->rowCount();

    if($count < 1){
        echo 0;
        exit;
    }

    echo 1;
}