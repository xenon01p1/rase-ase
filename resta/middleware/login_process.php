<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";
require_once "../../lib/function_miscellaneous.php";

if(isset($_POST['submit'])){

    $customer_email     = $_POST['customer_email'];
    $customer           = search_customer_by_customer_email($db, $customer_email)[0];
    $password_db        = $customer['customer_password'];
    $salt               = $customer['customer_salt'];
    $customer_password  = $_POST['customer_password'].$salt;


    if(!$customer){
        echo "<script>
            alert('Akun tidak ditemukan.');
            document.location.href = '../../login_customer.php';
        </script>";
        exit;
    }

    if(password_verify($customer_password, $password_db)){

        $_SESSION['customer_email']     = $customer_email;
        $_SESSION['customer_username']  = $customer['customer_username'];
        $_SESSION['customer_handphone'] = $customer['customer_handphone'];
        $_SESSION['login_customer']     = 1;

        header('location:../view/branch_location.php');
        exit;

    }else{
        echo "<script>
            alert('Email dan password tidak sesuai. Silahkan coba lagi');
            document.location.href = '../../login_customer.php';
        </script>";
        exit;
    }



}if($_GET['action'] == 'set_session_branch'){

    $branch_id      = $_GET['branch_id'];
    $customer_email = $_SESSION['customer_email'];
    $customer       = search_customer_by_customer_email($db, $customer_email)[0];
    $customer_id    = $customer['customer_id'];
    $datetime       = date('Y-m-d H:i:s');

    // INSERT LOG
    $query_customer_log   = $db->prepare("INSERT INTO customer_log (customer_id, datetime) VALUES ( :v_customer_id, :v_datetime)");  
    $query_customer_log->bindParam(":v_customer_id",$customer_id);
    $query_customer_log->bindParam(":v_datetime",$datetime);
    $query_customer_log->execute();
    $customer_log_id = $db->lastInsertId();
    $count = $query_customer_log->rowCount();
    if ($count==0) {
        echo "<script>
            alert('Terjadi kesalahan yang tidak terduga, silahkan coba lagi');
            document.location.href = '../../login_customer.php';
        </script>";
        exit;
    }

    // SET SESSION
    $_SESSION['branch_id'] = $branch_id;

    header('location:../view/index.php');


}else{
    header('location:../../login_customer.php');
    exit;
}