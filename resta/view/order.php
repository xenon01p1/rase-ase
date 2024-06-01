<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";
require_once "../../lib/function_invoice.php";
require_once "../../lib/function_miscellaneous.php";

$customer_email   = $_SESSION['customer_email'];
$customer         = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id      = $customer['customer_id'];
$on_going_invoice = search_ongoing_invoice($db, $customer_id);
$finished_invoice = '';

?>

<div class="py-2"></div>

<div class="container">
        <div class="card">
          <div class="card-body">
            <div class="standard-tab">
              <ul class="nav rounded-lg mb-2 p-2 shadow-sm" id="affanTabs1" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="btn active" id="bootstrap-tab" data-bs-toggle="tab" data-bs-target="#bootstrap" type="button" role="tab" aria-controls="bootstrap" aria-selected="true">On Going</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="btn" id="pwa-tab" data-bs-toggle="tab" data-bs-target="#pwa" type="button" role="tab" aria-controls="pwa" aria-selected="false">Finished</button>
                </li>
              </ul>
              <div class="tab-content rounded-lg p-3 shadow-sm" id="affanTabs1Content">
                <div class="tab-pane fade show active" id="bootstrap" role="tabpanel" aria-labelledby="bootstrap-tab">

                <?php if(!$on_going_invoice): ?>

                  <center>No on going order yet.</center>

                <?php endif; ?>

                <?php foreach($on_going_invoice as $invoice): ?>
                  <div class="card timeline-card bg-warning shadow p-3 mb-5 bg-white rounded">
                    <a onclick="page('order_detail.php?invoice_id=<?= $invoice['invoice_id'] ?>')">
                      <div class="card-body">
                          <div class="d-flex justify-content-between">
                              <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill"><?= $invoice['order_master_status'] ?></span>
                                  <h6># INV <?= $invoice['invoice_number'] ?></h6>
                              </div>
                              <div class="timeline-icon mb-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                      <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                                  </svg>
                              </div>
                          </div>
                          <p class="mb-1">Exp : <?= $invoice['invoice_date_expired'] ?></p>
                          <p class="mb-1">Price : <?= id_currency($invoice['invoice_price']) ?></p>
                          <p class="mb-1">Tax : <?= id_currency($invoice['invoice_ppn']) ?></p>
                          <p class="mb-1">Total : <?= id_currency($invoice['invoice_price_total']) ?></p>
                          <p>Location : <?= $invoice['invoice_delivery_address'] ?></p>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>

                </div>

                  
                <div class="tab-pane fade" id="pwa" role="tabpanel" aria-labelledby="pwa-tab">

                <?php if(!$finished_invoice): ?>

                <center>No finished order yet.</center>

                <?php endif; ?>

                  <!-- <div class="card timeline-card bg-success shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="timeline-text mb-2"><span class="badge mb-2 rounded-pill">Done</span>
                                <h6># INV 1</h6>
                            </div>
                            <div class="timeline-icon mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mb-1">21 Sep 2021</p>
                        <p class="mb-1">Total : Rp. 100.000</p>
                        <p>Location : Jl. Ganesa No.10, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</p>
                    </div>
                  </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="py-2"></div>