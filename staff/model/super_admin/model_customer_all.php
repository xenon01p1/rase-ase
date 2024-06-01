<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_customer.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    
}