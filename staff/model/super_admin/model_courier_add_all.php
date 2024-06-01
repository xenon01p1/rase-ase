<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_kurir.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_super_admin.php";
include_once "../../../lib/function_miscellaneous.php";

$super_admin_id = $_SESSION['super_admin_id'];

if(!isset($_GET['kurir_id']) && $_GET['action'] == 'insert'){
    $kurir_salt             = guidv4();
    $branch_id              = $_POST['branch_id'];
    $kurir_name             = $_POST['kurir_name'];
    $kurir_username         = $_POST['kurir_username'];
    $kurir_password         = password_hash($_POST['kurir_password'].$kurir_salt, PASSWORD_DEFAULT);
    $kurir_email            = $_POST['kurir_email'];
    $kurir_handphone        = $_POST['kurir_handphone'];
    $kurir_vehicle_number   = $_POST['kurir_vehicle_number'];
    $kurir_status           = 0;
    $kurir_input_by         = $super_admin_id;
    $kurir_input_datetime   = date('Y-m-d H:i:s');


    // INSERT kurir
    $query_kurir = $db->prepare("INSERT INTO kurir (branch_id, kurir_salt, kurir_name, kurir_username, kurir_password, kurir_email, kurir_handphone, kurir_vehicle_number, kurir_status, kurir_input_by, kurir_input_datetime) VALUES (:v_branch_id, :v_kurir_salt, :v_kurir_name, :v_kurir_username, :v_kurir_password, :v_kurir_email, :v_kurir_handphone, :v_kurir_vehicle_number, :v_kurir_status, :v_kurir_input_by, :v_kurir_input_datetime)");

    $query_kurir->bindParam(":v_branch_id", $branch_id);
    $query_kurir->bindParam(":v_kurir_salt", $kurir_salt);
    $query_kurir->bindParam(":v_kurir_name", $kurir_name);
    $query_kurir->bindParam(":v_kurir_username", $kurir_username);
    $query_kurir->bindParam(":v_kurir_password", $kurir_password);
    $query_kurir->bindParam(":v_kurir_email", $kurir_email);
    $query_kurir->bindParam(":v_kurir_handphone", $kurir_handphone); 
    $query_kurir->bindParam(":v_kurir_vehicle_number", $kurir_vehicle_number);
    $query_kurir->bindParam(":v_kurir_status", $kurir_status);
    $query_kurir->bindParam(":v_kurir_input_by", $kurir_input_by);
    $query_kurir->bindParam(":v_kurir_input_datetime", $kurir_input_datetime);

    $query_kurir->execute();
    $kurir_id = $db->lastInsertId();
    if ($kurir_id==0) {
        echo 4;
    }else{
        echo 1;
    }
    

}elseif(isset($_GET['kurir_id']) && $_GET['action'] == 'update'){
    $kurir_salt             = guidv4();
    $branch_id              = $_POST['branch_id'];
    $kurir_id               = $_POST['kurir_id'];
    $kurir_name             = $_POST['kurir_name'];
    $kurir_username         = $_POST['kurir_username'];
    $kurir_email            = $_POST['kurir_email'];
    $kurir_handphone        = $_POST['kurir_handphone'];
    $kurir_vehicle_number   = $_POST['kurir_vehicle_number'];

    $sql = "UPDATE kurir SET 
        branch_id = :v_branch_id,
        kurir_name = :v_kurir_name, 
        kurir_username = :v_kurir_username, 
        kurir_email = :v_kurir_email, 
        kurir_handphone = :v_kurir_handphone, 
        kurir_vehicle_number = :v_kurir_vehicle_number";

    // UPDATE kurir
    if($_POST['kurir_password']){
        $kurir_password     = password_hash($_POST['kurir_password'].$kurir_salt, PASSWORD_DEFAULT);
        $sql.= ", kurir_salt = :v_kurir_salt, kurir_password = :v_kurir_password WHERE kurir_id = :v_kurir_id";

    }else{
        $sql.= " WHERE kurir_id = :v_kurir_id";
    }
    
    $query_kurir = $db->prepare($sql);
    if($_POST['kurir_password']){
        $query_kurir->bindParam(":v_kurir_salt", $kurir_salt);
        $query_kurir->bindParam(":v_kurir_password", $kurir_password);
    }
    $query_kurir->bindParam(":v_branch_id", $branch_id);
    $query_kurir->bindParam(":v_kurir_name", $kurir_name);
    $query_kurir->bindParam(":v_kurir_username", $kurir_username);
    $query_kurir->bindParam(":v_kurir_email", $kurir_email);
    $query_kurir->bindParam(":v_kurir_handphone", $kurir_handphone);
    $query_kurir->bindParam(":v_kurir_vehicle_number", $kurir_vehicle_number);
    $query_kurir->bindParam(":v_kurir_id", $kurir_id);

    $query_kurir->execute();
    $count = $query_kurir->rowCount();
    echo $count;


}elseif ($_GET['action'] == 'get_data') {
    $kurir_id = $_GET['id'];
    $kurir = search_kurir_by_kurir_id($db, $kurir_id)[0];
    echo json_encode($kurir);
}