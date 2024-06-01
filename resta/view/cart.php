<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_menu.php";
require_once "../../lib/function_cart.php";
require_once "../../lib/function_customer.php";
require_once "../../lib/function_miscellaneous.php";

$customer_email   = $_SESSION['customer_email'];
$customer         = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id      = $customer['customer_id'];
$customer_address = $customer['customer_address'];
$invoice_id       = 0;

$carts = search_cart_by_customer_inv($db, $customer_id, $invoice_id);

error_reporting(0);
ini_set('display_errors', 0);

?>

<div class="py-2" style="background-color: #ffd9ad;"></div>

<div class="container" style="background-color: #ffd9ad;">
        <!-- Cart Wrapper -->
        <div class="cart-wrapper-area">
          

          <?php if($carts): ?>
            <div class="cart-table card mb-3" >
              <div class="table-responsive card-body">
                <table class="table mb-0 text-center">
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Description</th>
                      <th scope="col">Quantity</th>
                      <th scope="col"></th>
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
                      <td><a class="remove-product" href="#" data-cart-id="<?= $cart['cart_id'] ?>"><i class="fa fa-close"></i></a></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-body border-top">
                <form id="form_checkout">
                  <label class="form-label" for="invoice_delivery_address">Alamat : </label><br>
                  <textarea name="invoice_delivery_address" id="invoice_delivery_address" class="form-control" required><?= $customer_address ?></textarea><br>

                  <label class="form-label" for="invoice_note">Note : </label><br>
                  <textarea name="invoice_note" id="invoice_note" class="form-control"></textarea><br>

                  <input class="btn btn-danger w-100 mt-1" type="submit" value="Checkout">
                </form>
                
              </div>
            </div>

          <?php else: ?>

            <div class="alert custom-alert-3 alert-warning alert-dismissible fade show" role="alert">
              <div class="alert-text" >
                <h6>Hmmm...</h6><span style="color: #6b462c ;">No items in your cart yet.</span>
              </div>
              <!-- <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button> -->
            </div>

          <?php endif; ?>
          
        </div>
      </div>
    
<div class="py-2" style="background-color: #ffd9ad;"></div>
<script src="../controller/controller_cart.js"></script>