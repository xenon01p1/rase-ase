<?php session_start(); ?>
<br><br>
<div class="section mt-3 mb-3"> 
                    <h5 class="card-title" style="color: #c0090b; font-size: 22px; font-weight:bold; margin-left:5px;">Halo, <?= $_SESSION['kurir_name'] ?></h5>
        </div>

        <!-- Menu Utama -->
        <div class="section mt-2 mt-3">
            <div class="row" style="display: flex; justify-content: center;">

                <div class="col-8" style="text-align: center;">
                    <div class="card">
                        <a onclick="page('deliveries.php')">
                            <div class="card" style="background-color: #ffff;">
                                <img src="../../assets/kurir/img/delivery.png" class="card-img-top p-2" alt="image">
                                <div class="card-body pt-2">
                                    <h4 class="mb-0" style="color: #000000; font-weight: bold; ">Delivery</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div> 
        <BR>

        <div class="section mt-3 mb-3">
            <div class="btn-block mt-3">  
                <a href="../../../logout_staff.php?role=kurir" class="btn btn-block btn-lg" style="background-color: #ed2736;">
                    <font style="color: #ffffff; font-weight: bold; font-size: 18px;">Keluar Aplikasi</font>
                </a>
            </div> 
        </div>