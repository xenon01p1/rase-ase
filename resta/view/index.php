<?php  

session_start();

?>

<!DOCTYPE html>
<html lang="en"  style="background-color: #ffd9ad;">
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
    <script src="../assets/js/jquery.min.js"></script>
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

    <style>
      .cart {
          position: relative;
          display: inline-block;
      }

      .badge-cart {
          position: absolute;
          top: -10px;
          right: 15px;
          padding: 5px 9px;
          border-radius: 50%;
          background-color: red;
          color: white;
          font-size: 12px;
          font-weight: bold;
          text-align: center;
      }

      .checkout-form span {
            display: inline-block;
            padding-left: 20px; /* Adjust the padding as needed */
        }

        .checkout-form .label {
            padding-left: 0;
        }
    </style>
  </head>
  <body style="background-color: #ffd9ad;">
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
    <div class="header-area" id="headerArea" style="background-color: #6b462c;">
      <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between" >
          
          <!-- Page Title -->
          <div></div>
          <div class="page-heading" >
            <h6 class="mb-0">
              <img src="../assets/img/logo.png" width="50">
            </h6>
          </div>
          <div></div>

          </div>
      </div>
    </div>
    <!-- # Sidenav Left -->
    <!-- Offcanvas -->
    
    <div class="page-content-wrapper" id="content" style="background-color: #ffd9ad;">
      
      <!-- Hero Slides -->
      
      
      
      <div class="pb-3" style="background-color: #ffd9ad;"></div>
    </div>
    <!-- Footer Nav -->
    <?php include_once 'menu_bottom.php' ?>
    <script src="route_customer.js"></script>
    <script src="../../lib/functions.js"></script>
    <!-- All JavaScript Files -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
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