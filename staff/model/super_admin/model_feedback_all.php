<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_feedback.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);


if($_GET['action'] == "table_data"){
    $feedback = viewall_feedback($db);
    echo json_encode($feedback);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $feedback   = viewall_feedback($db, $criteria, $status, $value, $type);
    echo json_encode($feedback);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $feedback   = viewall_feedback($db, $criteria, $status, $value, $type);
    echo json_encode($feedback);
}
    
// }elseif ($_GET['action'] == "delete") {
//     $category_id = $_GET['id'];
//     $delete_product = search_product_by_category_id($db,$category_id);
//     $delete_category = delete_category($db,$category_id);

//     echo $delete_category;
// }