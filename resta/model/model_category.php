<?php
session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_menu.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$branch_id = $_SESSION['branch_id'];

if($_GET['action'] == "table_data"){
    $menu_type = $_POST['menu_type'];
    $menus     = view_menu_by_branch_and_menu($db, $branch_id, $menu_type);
    echo json_encode($menus);

}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $menu_type  = $_POST['menu_type'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $menus      = view_menu_by_branch_and_menu($db, $branch_id, $menu_type, $criteria, $status, $value, $type);
    echo json_encode($menus);

    
}