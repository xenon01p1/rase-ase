<?php

session_start();
require_once "../../../config/connection.php";
require_once "../../../lib/function_invoice.php";
require_once "../../../lib/function_customer.php";
require_once "../../../lib/function_miscellaneous.php";

$invoice_id = $_GET['invoice_id'];
$invoice    = search_invoice_by_inv($db, $invoice_id)[0];
$customer   = search_customer_by_customer_id($db, $invoice['customer_id'])[0];

?>

<script src="../../controller/kurir/controller_evident.js"></script>
<br><br>

<div class="section mt-3 mb-3">
            <div class="card mb-2" style="background-color: #FAF9F6;">
                <div class="card-body" >
                    <h5 class="card-title" style="color: #c0090b;">
                        <i class='bx bx-receipt' style='font-size: 35px; vertical-align: middle;'></i>&nbsp;Delivery Order
                    </h5>  
                    <div class="section full mt-1" > 
                            <font color="#000000">Data order below : <BR></font>
                            <div class="section full mb-1" >
                                <div   style="background-color: #FAF9F6; border: none;">  

                                    <div style="border: 1px solid #FAF9F6; background-color: #FAF9F6; text-align: left;  display: flex; align-items: center;" class="mt-1">
                                        <i class="bx bx-purchase-tag bx-rotate-90" style="font-size: 24px; color: #c0090b; align-items: center;"></i>  
                                        <label class="form-check-label" for="radioList1" style="color: #000000; flex-grow: 1; margin-left: 5px;">
                                            # INV <?= $invoice['invoice_number'] ?>
                                        </label>
                                    </div> 
                                    <div style="border: 1px solid #FAF9F6; background-color: #FAF9F6; text-align: left;  display: flex; align-items: center;" class="mt-1">
                                        <i class="bx bxs-face" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #000000; flex-grow: 1; margin-left: 5px;">
                                            <?= $customer['customer_username'] ?> &#183; <font color="#000000"><?= $customer['customer_handphone'] ?></font>
                                        </label>
                                    </div> 
                                    <div style="border: 1px solid #FAF9F6; background-color: #FAF9F6; text-align: left;  display: flex; align-items: center;" class="mt-1">
                                        <i class="bx bx-map" style="font-size: 24px; color: #c0090b; align-items: center;"></i>
                                        <label class="form-check-label" for="radioList1" style="color: #000000; flex-grow: 1; margin-left: 5px;">
                                            <?= $invoice['invoice_delivery_address'] ?>
                                        </label>
                                    </div> 
                                </div>
                            </div> 
                    </div>
                </div>
            </div>
        </div>



 
        <div class="section mt-3 mb-3">
            <div class="card mb-1" style="background-color: #FAF9F6;">
                <div class="card-body" > 

                    <h5 class="card-title" style="color: #c0090b;">
                        <i class='bx bxs-face' style='font-size: 35px; vertical-align: middle;'></i>&nbsp; Recipient
                    </h5>  



                    <div class="login-form">   
                                <div class="section ">
                                    <form id="form_evident" method="post" enctype="multipart/form-data"> 
                                        <BR>
                                        <input type="hidden" name="invoice_id" value="<?= $invoice_id ?>">

                                            <div class="input-wrapper mb-2">
                                                <label class="section-title" style='font-size: 14px; color: #36454F; vertical-align: left; margin-left: 1px;'>Recipient</label>

                                                <input type="text" name="invoice_received_by" class="form-control" id="email1" placeholder="Nama Penerima Dokumen" style="border: 1px solid #F3CFC6;" required>
                                                 
                                            </div>


                                            <div class="input-wrapper mb-2">
                                                    <input type="file" class="form-control" id="fileuploadInput" accept=".png, .jpg, .jpeg" name="invoice_file" required>
                                                    <!-- <label for="fileuploadInput" style="border: 1px solid #F3CFC6;">
                                                        <span>
                                                            <strong>
                                                                <ion-icon name="cloud-upload-outline"></ion-icon>
                                                                <i style="color: #c0090b;">Upload Evident</i>
                                                            </strong>
                                                        </span>
                                                    </label> -->
                                            </div>
 


                                        
  
                                       <div class="btn-block mt-2">
                                            <button type="submit" class="btn btn-block btn-lg" style="background-color: #ed2736; ">
                                                 <font style="color: #ffffff; font-weight: bold; font-size: 18px;">Finish</font>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                        </div> 

 
 

                    </div>


                </div>
            </div>
        </div>