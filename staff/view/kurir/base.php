

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>STNK - KURIR</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="../../assets/kurir/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/kurir/img/icon/192x192.png">
    <link rel="stylesheet" href="../../assets/kurir/css/style.css">
    <script src="../../assets/admin/js/jquery.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



    <link rel="stylesheet" href="http://localhost/stnk/mobile/font/Kelano_Remora.otf">



     <style>
            .custom-card {
                background-image: url('http://localhost/stnk/mobile/images/cardbg.jpg');
                background-size: cover;
                background-position: center;
                padding: 20px;
                border-radius: 10px;
                color: #fff; /* warna teks agar terlihat jelas di atas gambar */
            }

            .custom-card .card-text {
                font-family: 'Arial', sans-serif; /* Ganti dengan font yang diinginkan */
                color: #ffcc00; /* Ganti dengan warna yang diinginkan */
            }
        </style>


</head>

<body>    

    <!-- App Header : scrolled -->
   <a href="page('home.php')">
   <div class="appHeader" style="background-color: #c0090b;">
    
    <div class="pageTitle" style="color: #ffffff; font-weight: bold; font-size: 30px;">
        Courier
    </div>   
    </div> 
    </a>



    <!-- * App Header -->


    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Cari di Baikmart ...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="#" class="ms-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->



    

    <!-- App Capsule -->
    <div id="content">

  
        
 


    </div>

        <BR>



 
 


        <!-- app footer -->
        <?php //include_once("footer.php"); ?>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


    <script src="../../route/route_kurir.js"></script> 
    <!-- * welcome notification -->

    <!-- ============== Js Files ==============  -->
    <!-- Bootstrap -->
    <script src="../../assets/kurir/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="../../assets/kurir/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="../../assets/kurir/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="../../assets/kurir/js/base.js"></script>

    <script>
        // Trigger welcome notification after 5 seconds
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>

</body> 

</html>