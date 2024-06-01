<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "table_data"){
    $admin = search_admin_by_branch($db, $branch_id);
    echo json_encode($admin);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $admin   = search_admin_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($admin);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $admin   = search_admin_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($admin);

    
}elseif ($_GET['action'] == "delete") {
    $admin_id       = $_GET['id'];
    $admin_status   = 1;

    $sql = "UPDATE admin SET 
    admin_status = :v_admin_status
    WHERE admin_id = :v_admin_id";
    
    $query_admin = $db->prepare($sql);
    $query_admin->bindParam(":v_admin_status", $admin_status);
    $query_admin->bindParam(":v_admin_id", $admin_id);

    $query_admin->execute();
    $count = $query_admin->rowCount();
    echo $count;

}