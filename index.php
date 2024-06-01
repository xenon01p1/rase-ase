<?php

session_start();
  
echo "test";

if(isset($_SESSION['login_admin'])){
  $current_url = 'staff/';
  header('location:staff/view/admin/base.php');

}elseif(isset($_SESSION['login_super_admin'])){
  $current_url = 'staff/';
  header('location:staff/view/super_admin/base.php');

}elseif(isset($_SESSION['login_kurir'])){
  $current_url = 'staff/';
  header('location:staff/view/kurir/base.php');

}else{
  header('location:login_customer.php');
}

// }elseif(isset($_SESSION['login_kurir'])){
//   include_once "view/admin/base.php";

// }elseif(isset($_SESSION['login_customer'])){
//   include_once "view/admin/base.php";
// }