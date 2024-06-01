<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_menu.php";
include_once "../../../lib/function_package_menu.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "table_data"){
    $package_menu = view_package_menu($db, $branch_id);
    echo json_encode($package_menu);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $package_menu   = view_package_menu($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($package_menu);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $package_menu   = view_package_menu($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($package_menu);

    
}elseif ($_GET['action'] == "delete") {
    $package_menu_id       = $_GET['id'];

    $sql = "DELETE FROM package_menu WHERE package_menu_id = :v_package_menu_id";
    $query_package_menu = $db->prepare($sql);
    $query_package_menu->bindParam(":v_package_menu_id", $package_menu_id);

    $query_package_menu->execute();
    $count = $query_package_menu->rowCount();
    echo $package_menu_id;

}