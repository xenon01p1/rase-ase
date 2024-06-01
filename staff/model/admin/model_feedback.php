<?php
session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_feedback.php";
include_once "../../../lib/function_admin.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_id = $_SESSION['admin_id'];
$branch_id = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];

if($_GET['action'] == "table_data"){
    $feedback = search_feedback_by_branch($db, $branch_id);
    echo json_encode($feedback);

}elseif($_GET['action'] == "search"){
    $criteria   = $_GET['by'];
    $status     = 'DESC';
    $value      = '';
    $type       = 1;
    $feedback   = search_feedback_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($feedback);


}elseif($_GET['action'] == "search_type"){
    $value      = $_GET['value'];
    $criteria   = '';
    $status     = 'DESC';
    $type       = 2;
    $feedback   = search_feedback_by_branch($db, $branch_id, $criteria, $status, $value, $type);
    echo json_encode($feedback);
}
    
// }elseif ($_GET['action'] == "delete") {
//     $category_id = $_GET['id'];
//     $delete_product = search_product_by_category_id($db,$category_id);
//     $delete_category = delete_category($db,$category_id);

//     echo $delete_category;
// }