<?php

session_start();
require_once '../../config/connection.php';
require_once '../../lib/function_branch.php';
require_once '../../lib/function_customer.php';
require_once '../../lib/function_miscellaneous.php';

// var_dump($_SESSION['customer_email']);
// exit;

if(!isset($_SESSION['customer_email'])){
  header('location:../../login_customer.php');
}

$customer_email     = $_SESSION['customer_email'];
$customer           = search_customer_by_customer_email($db, $customer_email)[0];
$regency_id         = $customer['regency_id'];
$district_id        = $customer['district_id'];
$village_id         = $customer['village_id'];
$branch_by_regency  = search_branch_by_regency_id($db, $regency_id);
$branch_by_district = search_branch_by_district_id($db, $district_id);
$branch_by_village  = search_branch_by_village_id($db, $village_id);
$branches           = $branch_by_village;

if(!$branch_by_village){
  $branches = $branch_by_district;
}

if(!$branch_by_district){
  $branches = $branch_by_regency;
}


?>

<!DOCTYPE html>
<html lang="en" style="background-color: #ff9778;">
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
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <!-- Web App Manifest -->
    <link rel="manifest" href="../manifest.json">
  </head>
  <body style="background-color: #ff9778;">
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status -->
    <!-- # This code for showing internet connection status -->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Header Area -->
    <div class="header-area" id="headerArea">
      <div class="container">
        <!-- Header Content -->
        <div class="header-content position-relative d-flex align-items-center justify-content-between">
          <!-- Back Button -->
          <div class="back-button"></div>
          <!-- Page Title -->
          <div class="page-heading">
            <h6 class="mb-0">Choose Location</h6>
          </div>
          <!-- Settings -->
          <div ></div>
              
        </div>
      </div>
    </div>
    <div class="page-content-wrapper" style="background-color: #ff9778;">
    
    <?php if($branches): ?>

      <div class="py-3"></div>
      
      <div class="container" style="background-color: #ff9778;">
        <!-- Timeline Content -->
      <?php foreach ($branches as $branch) :?>
        <div class="card timeline-card">
          <a href="../middleware/login_process.php?action=set_session_branch&branch_id=<?= $branch['branch_id'] ?>">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div></span>
                  <h6><?= $branch['branch_name'] ?></h6>
                </div>
                <div >
                  
                </div>
              </div>
              <p class="mb-2"><?= $branch['branch_address'] ?>.</p>
              <div class="timeline-tags"><span class="badge bg-light text-dark"><?= formatTime($branch['branch_open']).' - '.formatTime($branch['branch_close']) ?></span></div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
      </div>

    <?php else: ?>

      <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <div class="custom-container">
          <div class="text-center mb-4"><img class="login-intro-img mb-4" src="../assets/img/bg-img/38.png" alt="">
            <!-- Reset Password Message -->
            <p class="mb-4">Ooops! There is no branch in your city :(</p>
            <!-- Go Back Button --><a class="btn btn-primary" href="">Okay</a>
          </div>
        </div>
      </div>

    <?php endif; ?>
    </div>
    <!-- Footer Nav -->
    <!-- All JavaScript Files -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/internet-status.js"></script>
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/jquery.countdown.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/dark-mode-switch.js"></script>
    <script src="../assets/js/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/active.js"></script>
    <!-- PWA -->
    <script src="../assets/js/pwa.js"></script>
  </body>
</html>