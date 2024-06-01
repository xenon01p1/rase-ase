<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_miscellaneous.php";


if(!isset($_GET['admin_id']) && $_GET['action'] == 'insert'){
    $admin_salt             = guidv4();
    $branch_id              = $_POST['branch_id'];
    $admin_name             = $_POST['admin_name'];
    $admin_username         = $_POST['admin_username'];
    $admin_password         = password_hash($_POST['admin_password'].$admin_salt, PASSWORD_DEFAULT);
    $admin_email            = $_POST['admin_email'];
    $admin_handphone        = $_POST['admin_handphone'];
    $admin_status           = 0;
    $admin_input_by         = $_SESSION['super_admin_id'];
    $admin_input_datetime   = date('Y-m-d H:i:s');


    // INSERT admin
    $query_admin = $db->prepare("INSERT INTO admin (branch_id, admin_salt, admin_name, admin_username, admin_password, admin_email, admin_handphone, admin_status, admin_input_by, admin_input_datetime) VALUES (:v_branch_id, :v_admin_salt, :v_admin_name, :v_admin_username, :v_admin_password, :v_admin_email, :v_admin_handphone, :v_admin_status, :v_admin_input_by, :v_admin_input_datetime)");

    $query_admin->bindParam(":v_branch_id", $branch_id);
    $query_admin->bindParam(":v_admin_salt", $admin_salt);
    $query_admin->bindParam(":v_admin_name", $admin_name);
    $query_admin->bindParam(":v_admin_username", $admin_username);
    $query_admin->bindParam(":v_admin_password", $admin_password);
    $query_admin->bindParam(":v_admin_email", $admin_email);
    $query_admin->bindParam(":v_admin_handphone", $admin_handphone); 
    $query_admin->bindParam(":v_admin_status", $admin_status);
    $query_admin->bindParam(":v_admin_input_by", $admin_input_by);
    $query_admin->bindParam(":v_admin_input_datetime", $admin_input_datetime);

    $query_admin->execute();
    $admin_id = $db->lastInsertId();
    if ($admin_id==0) {
        echo 4;
    }else{
        echo 1;
    }
    

}elseif(isset($_GET['admin_id']) && $_GET['action'] == 'update'){
    $admin_salt             = guidv4();
    $branch_id              = $_POST['branch_id'];
    $admin_id               = $_GET['admin_id'];
    $admin_name             = $_POST['admin_name'];
    $admin_username         = $_POST['admin_username'];
    $admin_email            = $_POST['admin_email'];
    $admin_handphone        = $_POST['admin_handphone'];

    $sql = "UPDATE admin SET 
        branch_id = :v_branch_id, 
        admin_name = :v_admin_name, 
        admin_username = :v_admin_username, 
        admin_email = :v_admin_email, 
        admin_handphone = :v_admin_handphone";

    // UPDATE admin
    if($_POST['admin_password']){
        $admin_password     = password_hash($_POST['admin_password'].$admin_salt, PASSWORD_DEFAULT);
        $sql.= ", admin_password = :v_admin_password WHERE admin_id = :v_admin_id";

    }else{
        $sql.= " WHERE admin_id = :v_admin_id";
    }
    
    $query_admin = $db->prepare($sql);
    if($_POST['admin_password']){
        $query_admin->bindParam(":v_admin_password", $admin_password);
    }
    $query_admin->bindParam(":v_branch_id", $branch_id);
    $query_admin->bindParam(":v_admin_name", $admin_name);
    $query_admin->bindParam(":v_admin_username", $admin_username);
    $query_admin->bindParam(":v_admin_email", $admin_email);
    $query_admin->bindParam(":v_admin_handphone", $admin_handphone);
    $query_admin->bindParam(":v_admin_id", $admin_id);

    $query_admin->execute();
    $count = $query_admin->rowCount();
    echo $count;


}elseif ($_GET['action'] == 'get_data') {
    $admin_id = $_GET['id'];
    $admin = search_admin_by_admin_id($db, $admin_id)[0];
    echo json_encode($admin);
}