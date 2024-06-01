<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_kurir.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


if($_GET['action'] == "table_data"){
    $kurir = viewall_kurir($db,);
    echo json_encode($kurir);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $kurir      = viewall_kurir($db, $criteria, $status, $value, $type);
    echo json_encode($kurir);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $kurir      = viewall_kurir($db, $criteria, $status, $value, $type);
    echo json_encode($kurir);

    
}elseif ($_GET['action'] == "delete") {
    $kurir_id       = $_GET['id'];
    $kurir_status   = 1;

    $sql = "UPDATE kurir SET 
    kurir_status = :v_kurir_status
    WHERE kurir_id = :v_kurir_id";
    
    $query_kurir = $db->prepare($sql);
    $query_kurir->bindParam(":v_kurir_status", $kurir_status);
    $query_kurir->bindParam(":v_kurir_id", $kurir_id);

    $query_kurir->execute();
    $count = $query_kurir->rowCount();
    echo $count;

}