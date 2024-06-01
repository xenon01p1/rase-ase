<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_customer.php";
include_once "../../lib/function_miscellaneous.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id    = $customer['customer_id'];

if($_GET['action'] == 'change_password'){
    $salt                   = $customer['customer_salt'];
    $password_db            = $customer['customer_password'];
    $old_password           = $_POST['old_password'].$salt;
    $new_password           = $_POST['new_password'];
    $confirm_password       = $_POST['confirm_password'];
    $customer_last_update_by= $customer_id;
    $customer_last_update   = date('Y-m-d H:i:s');

    if($new_password != $confirm_password){
        echo 41;
        exit;
    }

    if(password_verify($old_password, $password_db)){

        $customer_password = password_hash($new_password.$salt, PASSWORD_DEFAULT);

        // INSERT admin
        $sql = "UPDATE customer SET 
            customer_password = :v_customer_password, 
            customer_last_update_by = :v_customer_last_update_by,
            customer_last_update = :v_customer_last_update
            WHERE customer_id = :v_customer_id";
        

        $query_admin = $db->prepare($sql);
        $query_admin->bindParam(":v_customer_password", $customer_password);
        $query_admin->bindParam(":v_customer_last_update_by", $customer_last_update_by);
        $query_admin->bindParam(":v_customer_last_update", $customer_last_update);
        $query_admin->bindParam(":v_customer_id", $customer_id);

        $query_admin->execute();
        $count = $query_admin->rowCount();
        echo $count;

    }else{
        echo 42;
        exit;
    }
    


}elseif($_GET['action'] == 'update_profile'){
    $customer               = search_customer_by_customer_id($db, $customer_id)[0];
    $old_village_id         = $customer['village_id'];
    $customer_username      = $_POST['customer_username'];
    $customer_email         = $_POST['customer_email'];
    $customer_handphone     = $_POST['customer_handphone'];
    $customer_address       = $_POST['customer_address'];
    $customer_link_address  = $_POST['customer_link_address'];
    $province_id            = $_POST['province_id'];
    $regency_id             = $_POST['regency_id'];
    $district_id            = $_POST['district_id'];
    $village_id             = $_POST['village_id'];

    $sql = "UPDATE customer SET 
                customer_username = :v_customer_username, 
                customer_email = :v_customer_email,
                customer_handphone = :v_customer_handphone,
                customer_address = :v_customer_address,
                customer_link_address = :v_customer_link_address,
                province_id = :v_province_id,
                regency_id = :v_regency_id,
                district_id = :v_district_id,
                village_id = :v_village_id
            WHERE customer_id = :v_customer_id";
        

    $query_admin = $db->prepare($sql);
    $query_admin->bindParam(":v_customer_username", $customer_username);
    $query_admin->bindParam(":v_customer_email", $customer_email);
    $query_admin->bindParam(":v_customer_handphone", $customer_handphone);
    $query_admin->bindParam(":v_customer_address", $customer_address);
    $query_admin->bindParam(":v_customer_link_address", $customer_link_address);
    $query_admin->bindParam(":v_province_id", $province_id);
    $query_admin->bindParam(":v_regency_id", $regency_id);
    $query_admin->bindParam(":v_district_id", $district_id);
    $query_admin->bindParam(":v_village_id", $village_id);
    $query_admin->bindParam(":v_customer_id", $customer_id);

    $query_admin->execute();
    $count = $query_admin->rowCount();

    if($old_village_id != $village_id){
        echo 2;
    }else{
        echo $count;
    }
    


}else{
    header('location:../../login_customer.php');
    exit;
}