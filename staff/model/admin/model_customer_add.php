<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_customer.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_miscellaneous.php";

$admin_id = $_SESSION['admin_id'];

if(!isset($_GET['customer_id']) && $_GET['action'] == 'insert'){
    $customer_salt             = guidv4();
    $province_id               = $_POST['province_id'];
    $regency_id                = $_POST['regency_id'];
    $district_id               = $_POST['district_id'];
    $village_id                = $_POST['village_id'];
    $customer_name             = $_POST['customer_name'];
    $customer_username         = $_POST['customer_username'];
    $customer_password         = password_hash($_POST['customer_password'].$customer_salt, PASSWORD_DEFAULT);
    $customer_email            = $_POST['customer_email'];
    $customer_handphone        = $_POST['customer_handphone'];
    $customer_address          = $_POST['customer_address'];
    $customer_link_address     = $_POST['customer_link_address'];
    $customer_status           = 0;
    $customer_input_by         = $_SESSION['admin_id'];
    $customer_input_datetime   = date('Y-m-d H:i:s');


    // INSERT customer
    $query_customer = $db->prepare("INSERT INTO customer (customer_salt, province_id, regency_id, district_id, village_id, customer_name, customer_username, customer_password, customer_email, customer_handphone, customer_address, customer_link_address, customer_status, customer_input_by, customer_input_datetime) VALUES (:v_customer_salt, :v_province_id, :v_regency_id, :v_district_id, :v_village_id, :v_customer_name, :v_customer_username, :v_customer_password, :v_customer_email, :v_customer_handphone, :v_customer_address, :v_customer_link_address, :v_customer_status, :v_customer_input_by, :v_customer_input_datetime)");

    $query_customer->bindParam(":v_customer_salt", $customer_salt);
    $query_customer->bindParam(":v_province_id", $province_id);
    $query_customer->bindParam(":v_regency_id", $regency_id);
    $query_customer->bindParam(":v_district_id", $district_id);
    $query_customer->bindParam(":v_village_id", $village_id);
    $query_customer->bindParam(":v_customer_name", $customer_name);
    $query_customer->bindParam(":v_customer_username", $customer_username);
    $query_customer->bindParam(":v_customer_password", $customer_password);
    $query_customer->bindParam(":v_customer_email", $customer_email);
    $query_customer->bindParam(":v_customer_handphone", $customer_handphone); 
    $query_customer->bindParam(":v_customer_address", $customer_address);
    $query_customer->bindParam(":v_customer_link_address", $customer_link_address);
    $query_customer->bindParam(":v_customer_status", $customer_status);
    $query_customer->bindParam(":v_customer_input_by", $customer_input_by);
    $query_customer->bindParam(":v_customer_input_datetime", $customer_input_datetime);

    $query_customer->execute();
    $customer_id = $db->lastInsertId();
    if ($customer_id==0) {
        echo 4;
    }else{
        echo 1;
    }
    

}elseif(isset($_GET['customer_id']) && $_GET['action'] == 'update'){
    $customer_salt             = guidv4();
    $customer_id               = $_POST['customer_id'];
    $province_id               = $_POST['province_id'];
    $regency_id                = $_POST['regency_id'];
    $district_id               = $_POST['district_id'];
    $village_id                = $_POST['village_id'];
    $customer_name             = $_POST['customer_name'];
    $customer_username         = $_POST['customer_username'];
    $customer_email            = $_POST['customer_email'];
    $customer_handphone        = $_POST['customer_handphone'];
    $customer_address          = $_POST['customer_address'];
    $customer_link_address     = $_POST['customer_link_address'];

    $sql = "UPDATE customer SET 
        province_id = :v_province_id,
        regency_id = :v_regency_id,
        district_id = :v_district_id,
        village_id = :v_village_id,
        customer_name = :v_customer_name, 
        customer_username = :v_customer_username, 
        customer_email = :v_customer_email, 
        customer_handphone = :v_customer_handphone, 
        customer_address = :v_customer_address,
        customer_link_address = :v_customer_link_address";

    // UPDATE customer
    if($_POST['customer_password']){
        $customer_password     = password_hash($_POST['customer_password'].$customer_salt, PASSWORD_DEFAULT);
        $sql.= ", customer_password = :v_customer_password WHERE customer_id = :v_customer_id";

    }else{
        $sql.= " WHERE customer_id = :v_customer_id";
    }
    
    $query_customer = $db->prepare($sql);
    if($_POST['customer_password']){
        $query_customer->bindParam(":v_customer_password", $customer_password);
    }
    $query_customer->bindParam(":v_province_id", $province_id);
    $query_customer->bindParam(":v_regency_id", $regency_id);
    $query_customer->bindParam(":v_district_id", $district_id);
    $query_customer->bindParam(":v_village_id", $village_id);
    $query_customer->bindParam(":v_customer_name", $customer_name);
    $query_customer->bindParam(":v_customer_username", $customer_username);
    $query_customer->bindParam(":v_customer_email", $customer_email);
    $query_customer->bindParam(":v_customer_handphone", $customer_handphone);
    $query_customer->bindParam(":v_customer_address", $customer_address);
    $query_customer->bindParam(":v_customer_link_address", $customer_link_address);
    $query_customer->bindParam(":v_customer_id", $customer_id);

    $query_customer->execute();
    $count = $query_customer->rowCount();
    echo $count;


}elseif ($_GET['action'] == 'get_data') {
    $customer_id = $_GET['id'];
    $customer = search_customer_by_customer_id($db, $customer_id)[0];
    echo json_encode($customer);
}