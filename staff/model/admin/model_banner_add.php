<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_banner.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_miscellaneous.php";

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if(!isset($_GET['banner_id']) && $_GET['action'] == 'insert'){
    $banner_order             = $_POST['banner_order'];
    $banner_status            = 0;
    $banner_input_by          = $_SESSION['admin_id'];
    $banner_input_datetime    = date('Y-m-d H:i:s');
    $banner_img               = $_FILES['banner_file_name'];
    $tmp_name                 = $banner_img['tmp_name'];
    $banner_file_name         = date('YmdHis').'_bnr_'.$banner_img['name'];
    $banner_file_type         = $banner_img['type'];
    $banner_file_extension    = explode('.', $banner_file_name);
    $banner_file_extension    = end($banner_file_extension);


    // INSERT banner
    $query_banner = $db->prepare("INSERT INTO banner (branch_id, banner_order, banner_status, banner_file_name, banner_file_type, banner_file_extension, banner_input_by, banner_input_datetime) VALUES (:v_branch_id, :v_banner_order, :v_banner_status, :v_banner_file_name, :v_banner_file_type, :v_banner_file_extension, :v_banner_input_by, :v_banner_input_datetime)");

    $query_banner->bindParam(":v_branch_id", $branch_id);
    $query_banner->bindParam(":v_banner_order", $banner_order);
    $query_banner->bindParam(":v_banner_status", $banner_status);
    $query_banner->bindParam(":v_banner_file_name", $banner_file_name);
    $query_banner->bindParam(":v_banner_file_type", $banner_file_type);
    $query_banner->bindParam(":v_banner_file_extension", $banner_file_extension);
    $query_banner->bindParam(":v_banner_input_by", $banner_input_by);
    $query_banner->bindParam(":v_banner_input_datetime", $banner_input_datetime);

    $query_banner->execute();
    $banner_id = $db->lastInsertId();
    if ($banner_id==0) {
        echo 41;
    }

    $upload_file = move_uploaded_file($tmp_name, "../../../media/".$banner_file_name);
    if (!$upload_file) {
        echo 42;
    }

    echo 1;
    

}