<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_admin.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $admin_username  = $_POST['admin_username'];
    $admin_password  = $_POST['admin_password'];
    $admin           = search_admin_by_admin_username($db, $admin_username)[0];

    if($customer_password == $admin['customer_password']){
        $_SESSION['admin_name']         = $admin['admin_name'];
        $_SESSION['admin_username']     = $admin['admin_username'];
        $_SESSION['admin_email']        = $admin['admin_email'];
        $_SESSION['admin_handphone']    = $admin['admin_handphone'];
        $_SESSION['admin_id']           = $admin['admin_id'];
        $_SESSION['login_admin']        = 1;
        header('location:../../index.php');
		// go to default file which is index.php

    }else{
        echo "
            <script>
                alert('Handphone dan Password tidak sesuai');
                document.location = '../login_admin.php';
            </script>
        ";
    }
}

?>