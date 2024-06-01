<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_branch.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_GET['action'] == "table_data"){
    $branch = viewall_branch($db);
    echo json_encode($branch);
    //var_dump($branch);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $branch   = viewall_branch($db, $criteria, $status, $value, $type);
    echo json_encode($branch);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $branch   = viewall_branch($db, $criteria, $status, $value, $type);
    echo json_encode($branch);

    
}elseif ($_GET['action'] == "delete") {
    $branch_id       = $_GET['id'];
    $branch_status   = 1;

    $sql = "UPDATE branch SET 
    branch_status = :v_branch_status
    WHERE branch_id = :v_branch_id";
    
    $query_branch = $db->prepare($sql);
    $query_branch->bindParam(":v_branch_status", $branch_status);
    $query_branch->bindParam(":v_branch_id", $branch_id);

    $query_branch->execute();
    $count = $query_branch->rowCount();
    echo $count;

}