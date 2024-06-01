<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];


?>

<div class="py-3"></div>
<div class="container">
        <!-- User Information-->
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
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <form id="form_change_password">
              <div class="form-group mb-3">
                <label class="form-label" for="Username">Old Password</label>
                <input class="form-control" id="Username" type="text" name="old_password">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">New Password</label>
                <input class="form-control" id="fullname" type="password" name="new_password" >
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Confirm Password</label>
                <input class="form-control" id="email" type="password" name="confirm_password">
              </div>
              <button class="btn text-white w-100" type="submit" style="background-color: #6b462c;">Update</button>
            </form>
          </div>
        </div>
      </div>

<script src="../controller/controller_change_password.js"></script>