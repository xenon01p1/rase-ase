<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_kurir.php";

error_reporting(E_ALL); 
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    $kurir_username  = $_POST['kurir_username'];
    $kurir_password  = $_POST['kurir_password'];
    $kurir           = search_kurir_by_kurir_username($db, $kurir_username)[0];
    $salt            = $kurir['kurir_salt'];

    if(password_verify($kurir_password.$salt, $kurir['kurir_password'])){
        $_SESSION['kurir_name']         = $kurir['kurir_name'];
        $_SESSION['kurir_username']     = $kurir['kurir_username'];
        $_SESSION['kurir_email']        = $kurir['kurir_email'];
        $_SESSION['kurir_handphone']    = $kurir['kurir_handphone'];
        $_SESSION['kurir_id']           = $kurir['kurir_id'];
        $_SESSION['login_kurir']        = 1;
        header('location:../../index.php');
		// go to default file which is index.php

    }else{
        echo "
            <script>
                alert('Handphone dan Password tidak sesuai');
                document.location = '../../login_kurir.php';
            </script>
        ";
    }
}

?>