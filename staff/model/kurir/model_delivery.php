<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_order_master.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$kurir_id = $_SESSION['kurir_id'];

if($_GET['action'] == "deliver_order"){
    $invoice_id             = $_GET['invoice_id'];
    $order_master_code      = 400;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];

    // UPDATE INVOCE
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


}elseif ($_GET['action'] == "evident") {
    $invoice_id             = $_POST['invoice_id'];
    $invoice_received_by    = $_POST['invoice_received_by'];
    $invoice_file           = $_FILES['invoice_file'];
    $order_master_code      = 500;
    $order_master_status    = search_order_master_by_code($db, $order_master_code)[0]['order_master_status'];
    $tmp_name               = $invoice_file['tmp_name'];
    $invoice_file_name         = date('YmdHis').'_evident_'.$invoice_file['name'];
    $invoice_file_filetype     = $invoice_file['type'];
    $invoice_file_extension    = explode('.', $invoice_file_name);
    $invoice_file_extension    = end($invoice_file_extension);
    

    // UPDATE INVOICE
    $sql = "UPDATE invoice SET 
        invoice_received_by = :v_invoice_received_by,
        order_master_code = :v_order_master_code,
        order_master_status = :v_order_master_status,
        invoice_file_name = :v_invoice_file_name,
        invoice_file_filetype = :v_invoice_file_filetype,
        invoice_file_extension = :v_invoice_file_extension
    WHERE invoice_id = :v_invoice_id";  

    $query_invoice = $db->prepare($sql);
    $query_invoice->bindParam(":v_invoice_received_by", $invoice_received_by);
    $query_invoice->bindParam(":v_order_master_code", $order_master_code);
    $query_invoice->bindParam(":v_order_master_status", $order_master_status);
    $query_invoice->bindParam(":v_invoice_file_name", $invoice_file_name);
    $query_invoice->bindParam(":v_invoice_file_filetype", $invoice_file_filetype);
    $query_invoice->bindParam(":v_invoice_file_extension", $invoice_file_extension);
    $query_invoice->bindParam(":v_invoice_id", $invoice_id);
    $query_invoice->execute();
    $count = $query_invoice->rowCount();
    if ($count == 0) {
        echo 0;
    }


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


    // MOVE FILE TO FOLDER
    $upload_file = move_uploaded_file($tmp_name, "../../../media/".$invoice_file_name);
    if (!$upload_file) {
        echo 0;
    }

    echo 1;
}