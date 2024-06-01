<script src="../../controller/admin/controller_customer_add.js"></script>
<script src="../../../lib/get_selected.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "customer Detail";
	$text_subtitle 	= "Detail information of customer";
}elseif ($edit) {
	$text_title 	= "Add New customer" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New customer" ;
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
										<option value="customer_id">ID customer</option>
										<option value="customer_name">customer Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search customer">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_customer()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add customer</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="customer_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_customer" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="customer_id" id="customer_id" value="<?= (isset($_GET['customer_id'])) ? $_GET['customer_id'] : '' ?>">

							<div class="row g-3">

								<div class="col-12 col-lg-6">
									<label for="province_id" class="form-label">Province</label>
									<select class="form-select" id="province_id" aria-label="Default select example" name="province_id">
										
									</select>
								</div>

								<div class="col-12 col-lg-6">
									<label for="regency_id" class="form-label">Regency</label>
									<select class="form-select" id="regency_id" aria-label="Default select example" name="regency_id">
									<option value="-" disabled selected>Pilih provinsi terlebih dahulu</option>
									</select>
								</div>

								<div class="col-12 col-lg-6">
									<label for="district_id" class="form-label">District</label>
                                    <select class="form-select" id="district_id" aria-label="Default select example" name="district_id">
									<option value="-" disabled selected>Pilih kabupaten terlebih dahulu</option>
									</select>
								</div>

								<div class="col-12 col-lg-6">
									<label for="village_id" class="form-label">Village</label>
                                    <select class="form-select" id="village_id" aria-label="Default select example" name="village_id">
									<option value="-" disabled selected>Pilih kelurahan terlebih dahulu</option>
									</select>
								</div>

								<div class="col-12 col-lg-6">
									<label for="customer_name" class="form-label">Full Name</label>
									<input type="text" class="form-control" id="customer_name" placeholder="Enter customer's name" name="customer_name">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="customer_username" class="form-label">Username</label>
									<input type="text" class="form-control" id="customer_username" placeholder="Enter customer's username for logging customer's application" name="customer_username">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="customer_password" class="form-label">Password</label>
									<input type="password" class="form-control" id="customer_password" placeholder="Enter customer's password for logging customer's application" name="customer_password">
								</div>

								<div class="col-12 col-lg-6">
									<label for="customer_email" class="form-label">Email</label>
									<input type="email" class="form-control" id="customer_email" placeholder="Enter customer's Email" name="customer_email">
								</div>

								<div class="col-12 col-lg-6">
									<label for="customer_handphone" class="form-label">Handphone</label>
									<input type="text" class="form-control" id="customer_handphone" placeholder="Enter customer's phone number" name="customer_handphone">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="customer_address" class="form-label">Address</label>
									<input type="text" class="form-control" id="customer_address" placeholder="Enter customer's address" name="customer_address">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="customer_link_address" class="form-label">Google Map Link Address</label>
									<input type="text" class="form-control" id="customer_link_address" placeholder="Enter customer's phone number" name="customer_link_address">
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>