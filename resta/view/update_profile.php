<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];


?>

<div class="py-2"></div>
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
            <form id="form_profile" method="post">

            <input type="hidden" id="province_id_db" value="<?= $customer['province_id'] ?>">
            <input type="hidden" id="regency_id_db" value="<?= $customer['regency_id'] ?>">
            <input type="hidden" id="district_id_db" value="<?= $customer['district_id'] ?>">
            <input type="hidden" id="village_id_db" value="<?= $customer['village_id'] ?>">

              <div class="form-group mb-3">
                <label class="form-label" for="customer_username">Username</label>
                <input class="form-control" id="customer_username" name="customer_username" type="text" value="<?= $customer['customer_username'] ?>" placeholder="Username">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="customer_email">Email</label>
                <input class="form-control" id="customer_email" name="customer_email" type="text" value="<?= $customer['customer_email'] ?>" placeholder="customer_email">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="customer_handphone">Phone Number</label>
                <input class="form-control" id="customer_handphone" name="customer_handphone" type="text" value="<?= $customer['customer_handphone'] ?>" placeholder="Complete your phone number">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="customer_address">Address</label>
                <input class="form-control" id="customer_address" name="customer_address" type="text" value="<?= $customer['customer_address'] ?>" placeholder="Complete your address">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="customer_link_address">Google Map Address</label>
                <input class="form-control" id="customer_link_address" name="customer_link_address" type="text" value="<?= $customer['customer_link_address'] ?>" placeholder="Copy your google map link">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="province_id">Province</label>
                <select class="form-control" name="province_id" id="province_id">

                </select>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="regency_id">Regency</label>
                <select class="form-control" name="regency_id" id="regency_id">
                    <option value="-" disabled selected>Choose province first.</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="district_id">District</label>
                <select class="form-control" name="district_id" id="district_id">
                    <option value="-" disabled selected>Choose regency first.</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="villaget_id">Village</label>
                <select class="form-control" name="village_id" id="village_id">
                    <option value="-" disabled selected>Choose dsitrict first.</option>
                </select>
              </div>
              <button class="btn text-white w-100" style="background-color: #6b462c;" type="submit">Update Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="py-2"></div>
      <script src="../controller/get_location_edit.js"></script>
      <script src="../controller/controller_update_profile.js"></script>