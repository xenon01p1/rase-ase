<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_cart.php";
require_once "../../lib/function_menu.php";
require_once "../../lib/function_invoice.php";
require_once "../../lib/function_miscellaneous.php";

$invoice_id = $_GET['invoice_id'];
$invoice    = search_invoice_by_inv($db, $invoice_id)[0];
$carts      = search_cart_by_inv($db, $invoice_id);

?>

<div class="py-2"></div>

<div class="container">
        <!-- Cart Wrapper -->
        <div class="cart-wrapper-area">
          

            <div class="cart-table card mb-3">
              <div class="table-responsive card-body">
                <table class="table mb-0 text-center">
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Description</th>
                      <th scope="col">Quantity</th>
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
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-body border-top">
                <label class="form-label" for="invoice_note">Alamat : </label><br>
                <textarea name="invoice_note" id="invoice_note" class="form-control" readonly><?= $invoice['invoice_delivery_address'] ?></textarea><br>

                <label class="form-label" for="invoice_note">Note : </label><br>
                <textarea name="invoice_note" id="invoice_note" class="form-control" readonly><?= $invoice['invoice_note'] ?></textarea><br>
                
                <button class="btn text-white w-100 mt-1" onclick="page('order.php')" style="background-color: #6b462c;">Back</button>

              </div>
            </div>
          
        </div>
      </div>
    
<div class="py-2"></div>
<script src="../controller/controller_cart.js"></script>