<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_menu.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_miscellaneous.php";

$admin_id = $_SESSION['admin_id'];

if(!isset($_GET['menu_id']) && $_GET['action'] == 'insert'){
    $branch_id    = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];
    $package_id   = $_POST['package_id'];
    $menu_id      = $_POST['menu_id'];


    // INSERT menu
    $query_package_menu = $db->prepare("INSERT INTO package_menu (branch_id, package_id, menu_id) VALUES (:v_branch_id, :v_package_id, :v_menu_id)");

    $query_package_menu->bindParam(":v_branch_id", $branch_id);
    $query_package_menu->bindParam(":v_package_id", $package_id);
    $query_package_menu->bindParam(":v_menu_id", $menu_id);

    $query_package_menu->execute();
    $menu_id = $db->lastInsertId();
    if ($menu_id==0) {
        echo 4;
    }

    echo 1;
    

}