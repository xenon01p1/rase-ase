<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_branch.php";
include_once "../../../lib/function_miscellaneous.php";


if(!isset($_GET['branch_id']) && $_GET['action'] == 'insert'){
    $province_id    = $_POST['province_id'];
    $regency_id     = $_POST['regency_id'];
    $district_id    = $_POST['district_id'];
    $village_id     = $_POST['village_id'];
    $branch_name    = $_POST['branch_name'];
    $branch_status  = $_POST['branch_status'];
    $branch_open    = $_POST['branch_open'];
    $branch_close   = $_POST['branch_close'];
    $branch_address = $_POST['branch_address'];

    // $branch_input_by         = $_SESSION['admin_id'];
    // $branch_input_datetime   = date('Y-m-d H:i:s');


    // INSERT branch
    $query_branch = $db->prepare("INSERT INTO branch (province_id, regency_id, district_id, village_id, branch_name, branch_status, branch_open, branch_close, branch_address) VALUES (:v_province_id, :v_regency_id, :v_district_id, :v_village_id, :v_branch_name, :v_branch_status, :v_branch_open, :v_branch_close, :v_branch_address)");

    $query_branch->bindParam(":v_province_id", $province_id);
    $query_branch->bindParam(":v_regency_id", $regency_id);
    $query_branch->bindParam(":v_district_id", $district_id);
    $query_branch->bindParam(":v_village_id", $village_id);
    $query_branch->bindParam(":v_branch_name", $branch_name);
    $query_branch->bindParam(":v_branch_status", $branch_status);
    $query_branch->bindParam(":v_branch_open", $branch_open);
    $query_branch->bindParam(":v_branch_close", $branch_close);
    $query_branch->bindParam(":v_branch_address", $branch_address);

    $query_branch->execute();
    $branch_id = $db->lastInsertId();
    if ($branch_id == 0) {
        echo 4;
    } else {
        echo 1;
    }

    

}elseif(isset($_GET['branch_id']) && $_GET['action'] == 'update'){
    $branch_id      = $_POST['branch_id'];
    $province_id    = $_POST['province_id'];
    $regency_id     = $_POST['regency_id'];
    $district_id    = $_POST['district_id'];
    $village_id     = $_POST['village_id'];
    $branch_name    = $_POST['branch_name'];
    $branch_status  = $_POST['branch_status'];
    $branch_open    = $_POST['branch_open'];
    $branch_close   = $_POST['branch_close'];
    $branch_address = $_POST['branch_address'];

    // UPDATE branch
    $query_branch = $db->prepare("UPDATE branch SET province_id = :v_province_id, regency_id = :v_regency_id, district_id = :v_district_id, village_id = :v_village_id, branch_name = :v_branch_name, branch_status = :v_branch_status, branch_open = :v_branch_open, branch_close = :v_branch_close, branch_address = :v_branch_address WHERE branch_id = :v_branch_id");

    $query_branch->bindParam(":v_province_id", $province_id);
    $query_branch->bindParam(":v_regency_id", $regency_id);
    $query_branch->bindParam(":v_district_id", $district_id);
    $query_branch->bindParam(":v_village_id", $village_id);
    $query_branch->bindParam(":v_branch_name", $branch_name);
    $query_branch->bindParam(":v_branch_status", $branch_status);
    $query_branch->bindParam(":v_branch_open", $branch_open);
    $query_branch->bindParam(":v_branch_close", $branch_close);
    $query_branch->bindParam(":v_branch_address", $branch_address);
    $query_branch->bindParam(":v_branch_id", $branch_id);

    $query_branch->execute();
    if ($query_branch->rowCount() > 0) {
        echo 1;
    } else {
        echo 4;
    }



}elseif ($_GET['action'] == 'get_data') {
    $branch_id = $_GET['id'];
    $branch = search_branch_by_branch_id($db, $branch_id)[0];
    echo json_encode($branch);
}