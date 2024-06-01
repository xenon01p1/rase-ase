<?php

session_start();
require_once "../../../config/connection.php";
require_once "../../../lib/function_kurir.php";
require_once "../../../lib/function_invoice.php";
require_once "../../../lib/function_customer.php";
require_once "../../../lib/function_miscellaneous.php";

$kurir_id           = $_SESSION['kurir_id'];
$invoices           = search_invoice_by_kurir_order_master($db, $kurir_id, 300);
$ongoing_invoices   = search_invoice_by_kurir_order_master($db, $kurir_id, 400);
$count_invoices     = (count($invoices) > 0) ? count($invoices) : 0;
$count_ongoing_invoices = (count($ongoing_invoices) > 0) ? count($ongoing_invoices) : 0;

?>
<script src="../../controller/kurir/controller_delivery.js"></script>
<br><br>
<div class="section mt-2">
                <div class="section full mt-1">
                     <div class="wide-block pb-2"> 


                        <ul class="nav nav-tabs lined" role="tablist">
                            <li class="nav-item" >
                                <a class="nav-link active" data-bs-toggle="tab" href="#sub_page_diproses" role="tab" >
                                    Waiting Order (<?= $count_invoices ?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#sub_page_selesai" role="tab">
                                    On Progress (<?= $count_ongoing_invoices ?>)
                                </a>
                            </li>
                             
                        </ul>
                        <div class="tab-content mt-2">


                        <!-- BEGIN TAB WORKING ORDER -->
                        <div class="tab-pane fade show active" id="sub_page_diproses" role="tabpanel">

                        <?php if(!$invoices) : ?>
                            <div class="login-form"> 
                                <BR> 
                                <div class="section">
                                    <h1>Hmm... </h1>
                                    <h4>You have no order to deliver yet.</h4>
                                </div> 
                                <div class="section mt-2 mb-5"> 
                                        <div class="btn btn-block mt-1">
                                            <a onclick="page('home.php')" class="btn btn-block btn-lg" style="background-color: #ed2736; width: 70%;">
                                                 <font style="color: #ffffff; font-weight: bold; font-size: 14px;">Ok, Sip</font>
                                            </a>
                                        </div> 
                                </div>
                            </div>

                        <?php else: ?>
                            <!-- BEGIN : Menuju Lokasi Pelanggan -->
                            <!-- begin card -->
                            <?php 
                            
                            foreach ($invoices as $invoice): 
                                $customer = search_customer_by_customer_id($db, $invoice['customer_id'])[0];
                            
                            ?>

                            <div class="card" style="background-color: #FFF7F1;">
                                <div class="card-header d-flex justify-content-between align-items-end  ">
                                    <div><span class="new-class"><?= $invoice['invoice_datetime'] ?></span></div> 

                                    <a href="" class="btn btn-sm" style="background-color: #FFC000;">
                                        <font style="color: #023020; font-weight: bold; font-size: 12px;"><?= $invoice['order_master_status'] ?></font>
                                    </a>
                                </div>

                                <ul class="listview image-listview media mt-1" style="background-color: #FFF7F1; border: none;">
                                    <li>
                                        <a href="" class="item">
                                            <div class="imageWrapper">
                                                <img src="../../assets/kurir/img/sample/photo/4.jpg" alt="image" class="imaged w64">
                                            </div>
                                            <div class="in">
                                                <div><h4 class="mb-05"># INV <?= $invoice['invoice_number'] ?></h4><div></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li> 
                                </ul>

                                <div > 

                                    <div class="mt-1"  style="border: 1px solid #FAF9F6; background-color: #FFF7F1; text-align: left;  display: flex; align-items: center; margin-left: 15px;"  >
                                        <i class="bx bxs-face" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #000000; flex-grow: 1; margin-left: 5px;">
                                            <?= $customer['customer_username'] ?> &#183; <font color="#000000"><?= $customer['customer_handphone'] ?></font>
                                        </label>
                                    </div> 



                                    <div class="mt-1"  style="border: 1px solid #FAF9F6; background-color: #FFF7F1; text-align: left;  display: flex; align-items: center; margin-left: 15px;">

                                        <i class="bx bx-map" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #c0090b; flex-grow: 1; margin-left: 5px;">
                                            <?= $invoice['invoice_delivery_address'] ?>
                                        </label>


                                    </div>

 
                                    <div class="  d-flex justify-content-between align-items-end  ">
                                    <div><div class="form-group boxed"></div></div>
                                    <div align="left" > 

                                        <a class="btn btn-sm mt-1 deliver_btn" style="background-color: #ed2736;" data-invoice-id="<?= $invoice['invoice_id'] ?>">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;">Deliver Order</font>
                                        </a> 

                                        <a target="_blank" href="https://wa.me/<?= $customer['customer_handphone'] ?>" class="btn btn-sm mt-1" style="background-color: #ed2736;">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;">WhatsApp</font>
                                        </a> 


                                        <!-- <a href="<?= $wo['location_googlemap'] ?>" target="_blank" class="btn btn-sm mt-1" style="background-color: #ed2736; margin-right: 15px;">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;">Map</font>
                                        </a>   -->
                                    </div>
                                    </div> 



                                </div>
                                <BR>
                            </div> 
                            <BR> 

                            <?php endforeach; ?>
 
                        <?php endif; ?>    
                        </div>
                        <!-- END TAB WORKING ORDER -->


                        <!-- BEGIN TAB ONPROGRESS -->
                        <div class="tab-pane fade" id="sub_page_selesai" role="tabpanel">

                        <?php if(!$ongoing_invoices) : ?>
                            <div class="login-form"> 
                                <BR> 
                                <div class="section">
                                    <h1>Hmmm.. </h1>
                                    <h4>No ongoing delivery yet.</h4>
                                </div> 
                                <div class="section mt-2 mb-5"> 
                                        <div class="btn btn-block mt-1">
                                            <a onclick="page('home.php')" class="btn btn-block btn-lg" style="background-color: #ed2736; width: 70%;">
                                                 <font style="color: #ffffff; font-weight: bold; font-size: 14px;">Ok, Sip</font>
                                            </a>
                                        </div> 
                                </div>
                            </div>

                        <?php else: ?>

                            <!-- BEGIN : SUDAH SAMPAI -->
                            <!-- begin card -->
                            <?php 
                            
                            foreach($ongoing_invoices as $invoice): 
                                $customer = search_customer_by_customer_id($db, $invoice['customer_id'])[0];
                                $button_text = 'Finish';
                            
                            ?>

                            <div class="card" style="background-color: #FFF7F1;">
                                <div class="card-header d-flex justify-content-between align-items-end  ">
                                    <div><span class="new-class"><?= $invoice['invoice_datetime'] ?></span></div> 

                                    <a href="" class="btn btn-sm" style="background-color: #FFC000;">
                                        <font style="color: #023020; font-weight: bold; font-size: 12px;"><?= $invoice['order_master_status'] ?></font>
                                    </a>
                                </div>

                                <ul class="listview image-listview media mt-1" style="background-color: #FFF7F1; border: none;">
                                    <li>
                                        <a href="" class="item">
                                            <div class="imageWrapper">
                                                <img src="../../assets/kurir/img/sample/photo/4.jpg" alt="image" class="imaged w64">
                                            </div>
                                            <div class="in">
                                                <div><h4 class="mb-05"># INV <?= $invoice['invoice_number'] ?></h4><div></div>
                                                </div>
                                            </div>
                                        </a>
                                    </li> 
                                </ul>

                                <div > 

                                    <div class="mt-1"  style="border: 1px solid #FAF9F6; background-color: #FFF7F1; text-align: left;  display: flex; align-items: center; margin-left: 15px;"  >
                                        <i class="bx bxs-face" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #000000; flex-grow: 1; margin-left: 5px;">
                                            <?= $customer['customer_username'] ?> &#183; <font color="#000000"><?= $customer['customer_handphone'] ?></font>
                                        </label>
                                    </div> 



                                    <div class="mt-1"  style="border: 1px solid #FAF9F6; background-color: #FFF7F1; text-align: left;  display: flex; align-items: center; margin-left: 15px;">

                                        <i class="bx bx-map" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #c0090b; flex-grow: 1; margin-left: 5px;">
                                            <?= $invoice['invoice_delivery_address'] ?>
                                        </label>


                                    </div>
  
                                    <div class="  d-flex justify-content-between align-items-end  ">
                                    <div><div class="form-group boxed"></div></div>
                                    <div align="left" > 

                                        <a onclick="page('delivery_finish.php?invoice_id=<?= $invoice['invoice_id'] ?>')" class="btn btn-sm mt-1" style="background-color: #ed2736;">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;"><?= $button_text ?></font>
                                        </a> 

                                        <a target="_blank" href="https://wa.me/<?= $customer['customer_handphone'] ?>" class="btn btn-sm mt-1" style="background-color: #ed2736;">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;">WhatsApp</font>
                                        </a> 


                                        <!-- <a href="<?= $wo['location_googlemap'] ?>" target="_blank" class="btn btn-sm mt-1" style="background-color: #ed2736; margin-right: 15px;">
                                            <font style="color: #ffffff; font-weight: bold; font-size: 12px;">Map</font>
                                        </a>   -->
                                    </div>
                                    </div> 



                                </div>
                                <BR>
                            </div>
                            <!-- end card -->
                            <!-- Begin Default Action -->
                            <div class="offcanvas offcanvas-bottom action-sheet" tabindex="-1" id="kurir-sampai-lokasi"> 
                            <div class="offcanvas-body">
                                <ul class="action-button-list">
                                    <li><a href="order_complain.php" class="btn btn-list"><span>Pelanggan Tidak Bisa dihubungi</span></a></li>
                                    <li><a href="order_complain.php" class="btn btn-list"><span>Pelanggan Tidak Ada di Lokasi</span></a></li>
                                    <li><a href="order_complain.php" class="btn btn-list"><span>Kesalahan Alamat</span></a></li>
                                    <li><a href="order_complain.php" class="btn btn-list"><span>Dokumen Pelanggan Tidak Siap</span></a></li>
                                    <li><a href="order_complain.php" class="btn btn-list"><span>Lainya</span></a></li>
                                </ul>
                            </div>
                            </div>
                            
                            <BR> 

                            <?php endforeach; ?>

                        <?php endif; ?>

                                 
                            </div>
                             
                        </div>

                    </div>
                </div>
        </div>