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
    <link rel="stylesheet" href="resta/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="resta/assets/css/animate.css">
    <link rel="stylesheet" href="resta/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="resta/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="resta/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="resta/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="resta/assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="resta/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="resta/assets/css/apexcharts.css">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="resta/style.css">
    <!-- Web App Manifest -->
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
    <!-- <div class="login-back-button"><a href="element-hero-blocks.html">
        <svg class="bi bi-arrow-left-short" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg></a></div> -->
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4"><img class="login-intro-img" src="resta/assets/img/logo.png" alt=""></div>
        <!-- Register Form -->
        <div class="register-form mt-2">
          <!-- <h6 class="mb-3 text-center">Log in to continue to Affan.</h6> -->
          <form action="resta/middleware/login_process.php" method="post">
            <div class="form-group">
              <input class="form-control" type="email" placeholder="Email" name="customer_email">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" placeholder="Password" name="customer_password">
            </div>
            <input type="submit" class="btn w-100 text-white" style="background-color: #8a542f;" name="submit" value="Sign In" >
          </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <br>
          
          <!-- <a class="stretched-link forgot-password d-block mt-3 mb-1" href="forget_password.php">Forgot Password?</a> -->
          <p class="mb-0">Didn't have an account? <a class="stretched-link" href="register.php">Register Now</a></p>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files -->
    <script src="resta/assets/js/bootstrap.bundle.min.js"></script>
    <script src="resta/assets/js/jquery.min.js"></script>
    <script src="resta/assets/js/internet-status.js"></script>
    <script src="resta/assets/js/waypoints.min.js"></script>
    <script src="resta/assets/js/jquery.easing.min.js"></script>
    <script src="resta/assets/js/wow.min.js"></script>
    <script src="resta/assets/js/owl.carousel.min.js"></script>
    <script src="resta/assets/js/jquery.counterup.min.js"></script>
    <script src="resta/assets/js/jquery.countdown.min.js"></script>
    <script src="resta/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="resta/assets/js/isotope.pkgd.min.js"></script>
    <script src="resta/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="resta/assets/js/dark-mode-switch.js"></script>
    <script src="resta/assets/js/ion.rangeSlider.min.js"></script>
    <script src="resta/assets/js/jquery.dataTables.min.js"></script>
    <script src="resta/assets/js/active.js"></script>
    <!-- PWA -->
    <script src="resta/assets/js/pwa.js"></script>
  </body>
</html>