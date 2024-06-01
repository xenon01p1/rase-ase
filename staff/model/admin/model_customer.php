<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_customer.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];

if($_GET['action'] == "table_data"){
    $customer = view_customer($db);
    echo json_encode($customer);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $customer   = view_customer($db, $criteria, $status, $value, $type);
    echo json_encode($customer);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $customer   = view_customer($db, $criteria, $status, $value, $type);
    echo json_encode($customer);

    
}elseif ($_GET['action'] == "delete") {
    $customer_id       = $_GET['id'];
    $customer_status   = 1;

    $sql = "UPDATE customer SET 
    customer_status = :v_customer_status
    WHERE customer_id = :v_customer_id";
    
    $query_customer = $db->prepare($sql);
    $query_customer->bindParam(":v_customer_status", $customer_status);
    $query_customer->bindParam(":v_customer_id", $customer_id);

    $query_customer->execute();
    $count = $query_customer->rowCount();
    echo $count;

}