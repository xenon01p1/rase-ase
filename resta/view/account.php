<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];


?>

<div class="py-2"></div>
<div class="container">
        <!-- Setting Card-->
        <div class="card user-info-card mb-3">
          <div class="card-body d-flex align-items-center">
            <div class="user-profile me-3"><img src="../assets/img/bg-img/2.jpg" alt="">
              <form action="#">
                <input class="form-control" type="file">
              </form>
            </div>
            <div class="user-info">
              <div class="d-flex align-items-center">
                <h5 class="mb-1"><?= $customer['customer_username'] ?></h5>
              </div>
              <p class="mb-0"><?= $customer['customer_email'] ?></p>
            </div>
          </div>
        </div>
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
          <div class="card-body direction-rtl">
            <p>Account</p>
            <div class="single-setting-panel"><a onclick="page('update_profile.php')" style="cursor:pointer;">
                <div class="icon-wrapper"><i class="bi bi-person"></i></div>Update Profile</a></div>
            <div class="single-setting-panel"><a onclick="page('change_password.php')" style="cursor:pointer;">
                <div class="icon-wrapper bg-info"><i class="bi bi-lock"></i></div>Change Password</a></div>
            <div class="single-setting-panel"><a onclick="page('privacy_policy.php')" style="cursor:pointer;">
                <div class="icon-wrapper bg-danger"><i class="bi bi-shield-lock"></i></div>Privacy Policy</a></div>
            <div class="single-setting-panel"><a onclick="page('feedback.php')" style="cursor:pointer;">
                <div class="icon-wrapper bg-danger"><i class="bi bi-shield-lock"></i></div>Feedback</a></div>
          </div>
        </div>
        <!-- Setting Card-->
        <div class="card shadow-sm">
          <div class="card-body direction-rtl">
            <p>Register &amp; Logout</p>
            <div class="single-setting-panel"><a href="../../register.php" style="cursor:pointer;">
                <div class="icon-wrapper bg-primary"><i class="bi bi-person"></i></div>Create new account</a></div>
            <div class="single-setting-panel"><a href="logout.php" style="cursor:pointer;">
                <div class="icon-wrapper bg-danger"><i class="logout.php"></i></div>Logout</a></div>
          </div>
        </div>
      </div>

<div class="py-2"></div>