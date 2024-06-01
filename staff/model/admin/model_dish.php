<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_menu.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "table_data"){
    $menu = view_menu_by_branch($db, $branch_id);
    echo json_encode($menu);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $category   = view_menu_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($category);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $category   = view_menu_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($category);

    
}elseif ($_GET['action'] == "delete") {
    $menu_id       = $_GET['id'];
    $menu_status   = 1;

    $sql = "UPDATE menu SET 
    menu_status = :v_menu_status
    WHERE menu_id = :v_menu_id";
    
    $query_menu = $db->prepare($sql);
    $query_menu->bindParam(":v_menu_status", $menu_status);
    $query_menu->bindParam(":v_menu_id", $menu_id);

    $query_menu->execute();
    $count = $query_menu->rowCount();
    echo $count;

}