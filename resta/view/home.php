<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_menu.php";
require_once "../../lib/function_banner.php";

$branch_id  = $_SESSION['branch_id'];
$foods      = search_menu_by_branch_type($db, $branch_id, 'FOOD', 4);
$banners    = search_banner_by_branch_status($db, $branch_id, 0);
$drinks     = search_menu_by_branch_type($db, $branch_id, 'DRINK', 4);


?>

<!-- Hero Slides -->
<div class="owl-carousel-one owl-carousel" style="background-color: #ffd9ad;">
  <!-- Single Hero Slide -->
  <?php foreach($banners as $banner): ?>
  <div class="single-hero-slide " style="background-image: url('../../media/<?= $banner['banner_file_name'] ?>')">
    <div class="slide-content h-100 d-flex align-items-center text-center">
      <!-- <div class="container">
        <h3 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">PWA Ready</h3>
      </div> -->
    </div>
  </div>
  <?php endforeach; ?>
</div>
<div class="pt-3" style="background-color: #ffd9ad;"></div >

<div class="container direction-rtl mb-3" style="background-color: #ffd9ad;">
  <div class="card" >
    <div class="card-body">
      <div class="row g-3">
        <div class="col-3">
          <a onclick="menu_category('FOOD')" style="cursor:pointer;">
            <div class="feature-card mx-auto text-center">
              <div class="card mx-auto" style="background-color: #fff3e6;">
                <i class="bi bi-egg-fried text-warning"></i>
              </div>
              <p class="mb-0">Food</p>
            </div>
          </a>
        </div>
        <div class="col-3">
          <a onclick="menu_category('DRINK')" style="cursor:pointer;"> 
            <div class="feature-card mx-auto text-center">
              <div class="card mx-auto" style="background-color: #fff3e6;">
                <i class="bi bi-cup-straw text-warning"></i>
              </div>
              <p class="mb-0">Drink</p>
            </div>
          </a>
        </div>
        <div class="col-3">
          <a onclick="menu_category('DESSERT')" style="cursor:pointer;"> 
            <div class="feature-card mx-auto text-center">
              <div class="card mx-auto" style="background-color: #fff3e6;">
                <i class="bi bi-card-image text-warning"></i>
              </div>
              <p class="mb-0">Dessert</p>
            </div>
          </a>
        </div>
        <div class="col-3">
          <a onclick="menu_category('PACKAGE')" style="cursor:pointer;">
            <div class="feature-card mx-auto text-center">
              <div class="card mx-auto" style="background-color: #fff3e6;">
                <i class="bi bi-star text-warning"></i>
              </div>
              <p class="mb-0">Special Offer</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if($foods): ?>
<div class="container mb-3" style="background-color: #ffd9ad;">
  <div class="card image-gallery-card">
    <div class="card-body">
      <center><h6>Foods</h6></center>
      <div class="row g-3 mt-1">
        <!-- Single Image Gallery -->

      <?php foreach ($foods as $food) :?>
        <div class="col-6">
          <a onclick="menu_detail(<?= $food['menu_id'] ?>)" style="cursor:pointer;">
            <div class="single-image-gallery">
              <img src="../../media/<?= $food['menu_file_name'] ?>" alt="">
              <!-- Fav Icon -->
              <!-- <a class="fav-icon shadow" href="#">
                <svg class="bi bi-heart-fill" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                </svg>
              </a> -->
            </div>
          </a>
        </div>
      <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<?php if($drinks): ?>
<div class="container mb-3" style="background-color: #ffd9ad;">
  <div class="card image-gallery-card">
    <div class="card-body">
      <center><h6>Drinks</h6></center>
      <div class="row g-3 mt-1">

      <?php foreach ($drinks as $drink) :?>
        <!-- Single Image Gallery -->
        <div class="col-6">
          <a onclick="menu_detail(<?= $drink['menu_id'] ?>)" style="cursor:pointer;">
            <div class="single-image-gallery">
              <img src="../../media/<?= $drink['menu_file_name'] ?>" alt="">
              <!-- Fav Icon -->
              <!-- <a class="fav-icon shadow" href="#">
                <svg class="bi bi-heart-fill" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                </svg>
              </a> -->
            </div>
          </a>
        </div>
      <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="pb-3" style="background-color: #ffd9ad;"></div>

