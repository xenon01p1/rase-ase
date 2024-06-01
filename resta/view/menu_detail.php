<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_menu.php";
require_once "../../lib/function_miscellaneous.php";

$branch_id  = $_SESSION['branch_id'];
$menu_id    = $_GET['menu_id'];
$menu       = search_menu_by_id($db, $menu_id)[0];
$menu_type  = $menu['menu_type'];
$now        = date('Y-m-d');

$price = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? $menu['menu_price'] - ($menu['menu_price'] * ($menu['menu_discount'] / 100)) : $menu['menu_price'];
$disc  = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? '<span class="badge bg-warning text-dark position-absolute product-badge">-'.$menu['menu_discount'].'%</span>' : '';

$recommend_menus = search_menu_by_branch_type($db, $branch_id, $menu_type, 4);

?>
<div class="py-2"></div>

<input type="hidden" name="menu_id" id="menu_id" value="<?= $_GET['menu_id'] ?>">

<div class="container">
        <div class="card product-details-card mb-3">                   <?= $disc ?>
          <div class="card-body">
            <!-- <div class="product-gallery owl-carousel" id="rows"> -->
              <img class="rounded" src="../../media/<?= $menu['menu_file_name'] ?>" alt="">
              <!-- <div class="single-product-image"><a class="gallery-img2" href="../../assets/img/bg-img/p1.jpg" data-effect="mfp-zoom-in"><img class="rounded" src="../assets/img/bg-img/p1.jpg" alt=""></a></div>
              <div class="single-product-image"><a class="gallery-img2" href="../assets/img/bg-img/p2.jpg" data-effect="mfp-zoom-in"><img class="rounded" src="../assets/img/bg-img/p2.jpg" alt=""></a></div>
              <div class="single-product-image"><a class="gallery-img2" href="../assets/img/bg-img/p3.jpg" data-effect="mfp-zoom-in"><img class="rounded" src="../assets/img/bg-img/p3.jpg" alt=""></a></div> -->
            <!-- </div> -->
          </div>
        </div>
        <div class="card product-details-card mb-3 direction-rtl">
          <div class="card-body">
            <h3><?= $menu['menu_name'] ?></h3><h1><?= id_currency($price) ?></h1>
            <p><?= $menu['menu_description'] ?></p>

            <form id="form_cart" method="post">
              <div class="input-group">
                <input type="hidden" name="menu_id" value="<?= $menu['menu_id'] ?>">
                <input class="input-group-text form-control" name="cart_qty" type="number" value="1">
                <button class="btn text-white w-50 " type="submit" style="background-color: #6b462c;">Add to Cart</button>
              </div>
            </form>

          </div>
        </div>
        <!-- <div class="card product-details-card mb-3 direction-rtl">
          <div class="card-body">
            <h5>Description</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum soluta tempore tenetur provident eligendi porro, eius nulla? Aliquam, blanditiis id. Corporis.</p>
            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At ut fugit accusantium quo quidem magni laboriosam!</p>
           
          </div>
        </div> -->
        <div class="card related-product-card direction-rtl">
          <div class="card-body">
            <h5 class="mb-3">Related Products</h5>
            <div class="row g-3">

            <?php 
            
            foreach($recommend_menus as $menu): 
              $price = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? $menu['menu_price'] - ($menu['menu_price'] * ($menu['menu_discount'] / 100)) : $menu['menu_price'];
              $disc  = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? '<span class="badge bg-warning">-'.$menu['menu_discount'].'%</span>' : '';
              $og_price  = ($menu['menu_discount'] > 0 && $now <= $menu['menu_discount_end']) ? '<br><span>'.id_currency($menu['menu_price']).'</span>' : '';
              ?>

              <!-- Single Top Product Card -->
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card single-product-card shadow">
                  <div class="card-body p-3">
                    <!-- Product Thumbnail --><a class="product-thumbnail d-block" onclick="menu_detail(<?= $menu['menu_id'] ?>)"><img src="../../media/<?= $menu['menu_file_name'] ?>" alt="">
                      <!-- Badge --><?= $disc ?></a>
                    <!-- Product Title --><a class="product-title d-block text-truncate" onclick="menu_detail(<?= $menu['menu_id'] ?>)"><?= $menu['menu_name'] ?></a>
                    <!-- Product Price -->
                    <p class="sale-price"><?= id_currency($price) ?><?= $og_price ?></p><a class="btn text-white btn-sm add_cart2" data-menu-id="<?= $menu['menu_id'] ?>" style="background-color: #6b462c;">Add to Cart</a>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>

      <div class="py-2"></div>

<script src="../controller/controller_menu_detail.js"></script>