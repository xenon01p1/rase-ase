<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_menu.php";
require_once "../../lib/function_cart.php";
require_once "../../lib/function_invoice.php";
require_once "../../lib/function_customer.php";
require_once "../../lib/function_miscellaneous.php";

$invoice_id       = $_GET['invoice_id'];
$customer_email   = $_SESSION['customer_email'];
$customer         = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id      = $customer['customer_id'];
$customer_address = $customer['customer_address'];
$invoice          = search_invoice_by_inv($db, $invoice_id)[0];

$carts = search_cart_by_customer_inv($db, $customer_id, $invoice_id);

?>

<div class="py-2"></div>

<div class="container">
        <!-- Cart Wrapper -->
        <div class="cart-wrapper-area">
          

          <?php if($carts): ?>
            <div class="cart-table card mb-3">
              <div class="table-responsive card-body">
                <table class="table mb-0 text-center">
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Description</th>
                      <th scope="col">Quantity</th>
                      <!-- <th scope="col"></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  foreach($carts as $cart): 
                    $menu = search_menu_by_id($db, $cart['menu_id'])[0];
                  
                  ?>
                    <tr>
                      <th scope="row"><img src="../../media/<?= $menu['menu_file_name'] ?>" alt=""></th>
                      <td>
                        <h6 class="mb-1"><?= $menu['menu_name'] ?></h6><span><?= id_currency($cart['cart_subtotal_price']) ?></span>
                      </td>
                      <td>
                        <div class="quantity">
                          <input class="qty-text" type="text" value="<?= $cart['cart_qty'] ?>" readonly>
                        </div>
                      </td>
                      <!-- <td><a class="remove-product" href="#" data-cart-id="<?= $cart['cart_id'] ?>"><i class="fa fa-close"></i></a></td> -->
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-body border-top">
                <form id="form_transfer">
                    <input type="hidden" name="invoice_id" value="<?= $invoice_id ?>">
                    <div class="checkout-form">
                        <span class="label">Price :</span><span><?= id_currency($invoice['invoice_price']) ?></span><br>
                        <span class="label">Tax :</span><span><?= id_currency($invoice['invoice_ppn']) ?></span><br>
                        <span class="label">Shipping :</span><span><?= id_currency($invoice['invoice_shipping']) ?></span><br>
                        <span class="label">Total :</span><span><?= id_currency($invoice['invoice_price_total']) ?></span><br>
                    </div>
                    <hr>
                    <div class="checkout-form">
                        <span class="label">Transfer to</span><br>
                        <span class="label">PT. ABC</span>
                        <div class="py-1"></div>
                        <span class="label">Account Number</span><br>
                        <span class="label">113843003000</span><br>
                    </div>
                    <br>
                    <input class="btn btn-danger w-100 mt-1" type="submit" value="I've already transfered">
                </form>
                
              </div>
            </div>

          <?php else: ?>

            <div class="alert custom-alert-3 alert-secondary alert-dismissible fade show" role="alert">
              <div class="alert-text">
                <h6>Hmmm...</h6><span>No items in your cart yet.</span>
              </div>
              <!-- <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>

          <?php endif; ?>
          
        </div>
      </div>
    
<div class="py-2"></div>
<script src="../controller/controller_transfer.js"></script>