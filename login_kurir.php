<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="staff/assets/kurir/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="staff/assets/kurir/img/icon/192x192.png">
    <link rel="stylesheet" href="staff/assets/kurir/css/style.css">
</head>

<body class="bg-white">

    <!-- App Header -->
    <div class="appHeader text-light" style="background-color: #c0090b;">

            
            <div class="pageTitle" style="color: #ffffff; font-weight: bold; font-size: 20px;">
            Courier
            </div>   
 
         
    </div>
    <!-- * App Header -->

    <BR>
    <BR> 
    <BR> 


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">


        <div class="login-form mt-1">
            <div class="section">
                <img src="staff/assets/kurir/img/logo.png" alt="image" class="form-image">
            </div>
            <!-- <div class="section mt-1">
                <h1>Login</h1>
             </div> -->
            <div class="section mt-1 mb-5">
                <form action="staff/middleware/login_kurir_process.php" method="post">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="kurir_username" name="kurir_username" placeholder="Input Username">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed mb-2">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="kurir_password" name="kurir_password" placeholder="Password" autocomplete="off">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div> 

                    

                    <div class="btn-block mt-3 mb-2">
                        <button type="submit" name="submit" class="btn btn-block btn-lg" style="background-color: #ed2736;  ">
                             <font style="color: #ffffff; font-weight: bold; font-size: 18px;">Log in</font>
                        </button>
                    </div>
 
                </form>
            </div>
        </div>


 


    </div>
    <!-- * App Capsule -->



    <!-- ============== Js Files ==============  -->
    <!-- Bootstrap -->
    <script src="staff/assets/kurir/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="staff/assets/kurir/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="staff/assets/kurir/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="staff/assets/kurir/js/base.js"></script>

</body>

</html>