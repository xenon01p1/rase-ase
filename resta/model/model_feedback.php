<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_customer.php";
include_once "../../lib/function_miscellaneous.php";

$branch_id      = $_SESSION['branch_id'];
$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id    = $customer['customer_id'];

if($_GET['action'] == 'submit_feedback'){
    $feedback_content   = $_POST['feedback_content'];
    $feedback_file      = $_FILES['feedback_file'];
    $feedback_datetime  = date('Y-m-d H:i:s');
    
    // INSERT FEEDBACK
    $sql = "INSERT INTO feedback (branch_id, customer_id, feedback_content, feedback_datetime) VALUES (:v_branch_id, :v_customer_id, :v_feedback_content, :v_feedback_datetime)";  
        
    $query_feedback = $db->prepare($sql);
    $query_feedback->bindParam(":v_branch_id", $branch_id);
    $query_feedback->bindParam(":v_customer_id", $customer_id);
    $query_feedback->bindParam(":v_feedback_content", $feedback_content);
    $query_feedback->bindParam(":v_feedback_datetime", $feedback_datetime);
    $query_feedback->execute();
    $count = $query_feedback->rowCount();
    $feedback_id = $db->lastInsertId();

    if($count < 1){
        echo 0;
        exit;
    }


    // INSERT FEEDBACK FILE
    for ($x = 0; $x < count($feedback_file['name']); $x++) {

        // cek apakah gambar sudah ada
        if($feedback_file['error'][$x] == 4){
            echo 0;
            exit;
        }

        // INSERT
        $tmp_name               = $feedback_file['tmp_name'][$x];
        $feedback_file_name     = date('YmdHis').'_feedback_'.$feedback_file['name'][$x];
        $feedback_file_filetype = $feedback_file['type'][$x];
        $ext                    = explode('.', $feedback_file_name);
        $feedback_file_extension= end($ext);
        $feedback_file_contents = file_get_contents($feedback_file['tmp_name'][$x]);

        $query_stnk_file   = $db->prepare("INSERT INTO feedback_file (feedback_id, feedback_file_name, feedback_file_filetype, feedback_file_extension) VALUES ( :v_feedback_id, :v_feedback_file_name, :v_feedback_file_filetype, :v_feedback_file_extension)");  
        $query_stnk_file->bindParam(":v_feedback_id",$feedback_id);
        $query_stnk_file->bindParam(":v_feedback_file_name",$feedback_file_name); 
        $query_stnk_file->bindParam(":v_feedback_file_filetype",$feedback_file_filetype); 
        $query_stnk_file->bindParam(":v_feedback_file_extension",$feedback_file_extension); 

        $query_stnk_file->execute();
        $count = $query_stnk_file->rowCount();
        if ($count==0) {
            echo 0;
            exit;
        }

        // UPLOAD TO FOLDER
        $upload_file = move_uploaded_file($tmp_name, "../../media/".$feedback_file_name);
        if (!$upload_file) {
            echo 0;
            exit;
        }
    }


    echo 1;


}else{
    header('location:../../login_customer.php');
    exit;
}