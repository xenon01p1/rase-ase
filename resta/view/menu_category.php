<?php

session_start();
require_once "../../config/connection.php";
require_once "../../lib/function_menu.php";

$branch_id  = $_SESSION['branch_id'];
$menu_type  = $_GET['menu_type'];
$menus      = search_menu_by_branch_type($db, $branch_id, $menu_type);


?>

<div class="py-2"></div>

<!-- Pagination -->
<div class="shop-pagination pb-3">
      <div class="container pb-3">
        <div class="card">
          <div class="card-body">
            <form action="#" autocomplete="off" method="post">
              <div class="form-group mb-0">
                <input class="form-control" id="search_type" type="text" placeholder="Type a menu">
                <input type="hidden" name="branch_id" id="branch_id" value="<?= $branch_id ?>">
                <input type="hidden" name="menu_type" id="menu_type" value="<?= $menu_type ?>">
              </div>
            </form>
          </div>
        </div>
      </div>

      

      <!-- Top Products -->
      <div class="top-products-area">
        <div class="container" id="rows">
          


          

          
        </div>
      </div>

      <div class="py-2"></div>
<script src="../../lib/functions.js"></script>
<script src="../controller/controller_category.js"></script>
