<?php

session_start();

session_destroy();

$role = $_GET['role'];

if($role == 'admin'){
    header('location:login_admin.php');

}elseif ($role == 'kurir') {
    header('location:login_kurir.php');

}elseif ($role == 'super_admin') {
    header('location:login_super_admin.php');

}

?>