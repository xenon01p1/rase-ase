<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_banner.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "table_data"){
    $branch_status = 0;
    $banner = search_banner_by_branch_status($db, $branch_id, $branch_status);
    echo json_encode($banner);
  
}elseif ($_GET['action'] == "delete") {
    $banner_id       = $_GET['id'];
    $banner_status   = 1;

    $sql = "UPDATE banner SET 
    banner_status = :v_banner_status
    WHERE banner_id = :v_banner_id";
    
    $query_banner = $db->prepare($sql);
    $query_banner->bindParam(":v_banner_status", $banner_status);
    $query_banner->bindParam(":v_banner_id", $banner_id);

    $query_banner->execute();
    $count = $query_banner->rowCount();
    echo $count;

}