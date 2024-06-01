<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_super_admin.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $super_admin_username  = $_POST['super_admin_username'];
    $super_admin_password  = $_POST['super_admin_password'];
    $super_admin           = search_super_admin_by_username($db, $super_admin_username)[0];

    if($super_admin_password == $super_admin['super_admin_password']){
        $_SESSION['super_admin_name']         = $super_admin['super_admin_name'];
        $_SESSION['super_admin_username']     = $super_admin['super_admin_username'];
        $_SESSION['super_admin_email']        = $super_admin['super_admin_email'];
        $_SESSION['super_admin_handphone']    = $super_admin['super_admin_handphone'];
        $_SESSION['super_admin_id']           = $super_admin['super_admin_id'];
        $_SESSION['login_super_admin']        = 1;
        header('location:../../index.php');
		// go to default file which is index.php

    }else{
        echo "
            <script>
                alert('Handphone dan Password tidak sesuai');
                document.location = '../../login_super_admin.php';
            </script>
        ";
    }
}

?>