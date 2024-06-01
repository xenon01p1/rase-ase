<script src="../../controller/admin/controller_dish_add.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "menu Detail";
	$text_subtitle 	= "Detail information of menu";
}elseif ($edit) {
	$text_title 	= "Add New menu" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New menu" ;
	$text_subtitle 	= "Please enter data below" ;
}

						
?>

<div class="card"> 

	<input type="hidden" name="detail" id="detail" value="<?= (isset($_GET['detail'])) ? $_GET['detail'] : '' ?>">

				    <div class="card-body">

				    	<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
                                <select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="menu_id">ID menu</option>
										<option value="menu_name">menu Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search menu">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_menu()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add menu</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="menu_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_menu" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="menu_id" id="menu_id" value="<?= (isset($_GET['menu_id'])) ? $_GET['menu_id'] : '' ?>">

							<div class="row g-3">
								<div class="col-12 col-lg-6">
									<label for="menu_name" class="form-label">Name</label>
									<input type="text" class="form-control" id="menu_name" placeholder="Enter menu name" name="menu_name">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="menu_type" class="form-label">Type</label>
                                    <select name="menu_type" id="menu_type" class="form-control">
                                        <option value="FOOD">Food</option>
                                        <option value="DRINK">Drink</option>
										<option value="DESSERT">Dessert</option>
                                        <option value="PACKAGE">Package</option>
                                    </select>
								</div>

								<div class="col-12 col-lg-6">
									<label for="menu_price" class="form-label">Price</label>
									<input type="number" class="form-control" id="menu_price" placeholder="Enter menu price" name="menu_price">
								</div>

								<div class="col-12 col-lg-6">
									<label for="menu_original_price" class="form-label">Original Price</label>
									<input type="number" class="form-control" id="menu_original_price" placeholder="Enter menu price" name="menu_original_price">
								</div>

								<div class="col-12 col-lg-6">
									<label for="menu_discount" class="form-label">Discount</label>
									<input type="number" class="form-control" id="menu_discount" placeholder="Enter menu discount" name="menu_discount">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="menu_discount_start" class="form-label">Discount Start</label>
									<input type="date" class="form-control" id="menu_discount_start" placeholder="Enter menu's address" name="menu_discount_start">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="menu_discount_end" class="form-label">Discount End</label>
									<input type="date" class="form-control" id="menu_discount_end" placeholder="Enter menu's phone number" name="menu_discount_end">
								</div>

								<div class="col-12 col-lg-6">
									<label for="menu_img" class="form-label">Picture</label>
									<input type="file" class="form-control" id="menu_img" name="menu_img">
								</div>

                                <div class="col-12 col-lg-12">
									<label for="menu_description" class="form-label">Description</label>
									<textarea class="form-control" name="menu_description" id="menu_description" placeholder="Enter the description of this menu, including ingredients and items for package"></textarea>
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>