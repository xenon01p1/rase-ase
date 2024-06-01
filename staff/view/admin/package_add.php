<script src="../../controller/admin/controller_package_add.js"></script>

<?php 

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_menu.php";
include_once "../../../lib/function_admin.php";

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "package Detail";
	$text_subtitle 	= "Detail information of package";
}elseif ($edit) {
	$text_title 	= "Add New package" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New package" ;
	$text_subtitle 	= "Please enter data below" ;
}

$admin_id   = $_SESSION['admin_id'];
$branch_id  = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];
$packages   = view_menu_by_branch_type($db, $branch_id, 'PACKAGE', false);
$menus      = view_menu_by_branch_type($db, $branch_id, 'PACKAGE', true);


						
?>

<div class="card"> 

	<input type="hidden" name="detail" id="detail" value="<?= (isset($_GET['detail'])) ? $_GET['detail'] : '' ?>">

				    <div class="card-body">

				    	<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
                                <select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="package_id">ID package</option>
										<option value="package_name">package Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search package">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_package()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add package</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="package_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_package" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="package_menu_id" id="package_menu_id" value="<?= (isset($_GET['package_menu_id'])) ? $_GET['package_menu_id'] : '' ?>">

							<div class="row g-3">

                                <div class="col-12 col-lg-6">
									<label for="package_id" class="form-label">Package</label>
                                    <select name="package_id" id="package_id" class="form-control">
                                        <?php foreach ($packages as $package) :?>
                                            <option value="<?= $package['menu_id'] ?>"><?= $package['menu_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
								</div>

                                <div class="col-12 col-lg-6">
									<label for="menu_id" class="form-label">Menu</label>
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <?php foreach ($menus as $menu) :?>
                                            <option value="<?= $menu['menu_id'] ?>"><?= $menu['menu_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>