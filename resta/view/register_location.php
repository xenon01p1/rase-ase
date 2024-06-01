<?php

if(!isset($_GET['customer_email'])){
  header('location:../../login_customer');
  exit;
}else{
  $customer_email = $_GET['customer_email'];
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Affan - PWA Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0134d4">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Affan - PWA Mobile HTML Template</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/apexcharts.css">
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="manifest.json">
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Back Button -->
    <!-- <div class="login-back-button"><a href="page-login.html">
        <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg></a></div> -->
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img" src="../assets/img/bg-img/36.png" alt=""></div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Last step! Choose your current location</h6>
          <form action="../middleware/register_process.php?action=register_location" method="post">
            <input type="hidden" name="customer_email" value="<?= $customer_email ?>">
            <div class="form-group text-start mb-3">
                <select class="form-control" name="province_id" id="province_id" required></select>
            </div>
            <div class="form-group text-start mb-3">
                <select class="form-control" name="regency_id" id="regency_id" required>
                <option value="-" disabled selected>Select the province first</option>
                </select>
            </div>
            <div class="form-group text-start mb-3">
                <select class="form-control" name="district_id" id="district_id" required>
                <option value="-" disabled selected>Select the regency first</option>
                </select>
            </div>
            <div class="form-group text-start mb-3">
                <select class="form-control" name="village_id" id="village_id" required>
                <option value="-" disabled selected>Select the district first</option>
                </select>
            </div>
            
            <input type="submit" class="btn btn-primary w-100" name="submit" value="Sign Up">
          </form>
        </div>
        <!-- Login Meta -->
        
      </div>
    </div>

    <script src="../controller/get_location.js"></script>
    <!-- All JavaScript Files -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/internet-status.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/dark-mode-switch.js"></script>
    <!-- Password Strenght -->
    <script src="../assets/js/jquery.passwordstrength.js"></script>
    <script src="../assets/js/active.js"></script>
    <!-- PWA -->
    <!-- <script src="js/pwa.js"></script> -->
  </body>
</html>