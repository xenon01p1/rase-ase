<script src="../../controller/admin/controller_courier_add.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "Courier Detail";
	$text_subtitle 	= "Detail information of courier";
}elseif ($edit) {
	$text_title 	= "Add New Courier" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New Courier" ;
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
										<option value="kurir_id">ID courier</option>
										<option value="kurir_name">Courier Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search Courier">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_courier()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add courier</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="courier_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_kurir" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="kurir_id" id="kurir_id" value="<?= (isset($_GET['kurir_id'])) ? $_GET['kurir_id'] : '' ?>">

							<div class="row g-3">
								<div class="col-12 col-lg-6">
									<label for="kurir_name" class="form-label">Full Name</label>
									<input type="text" class="form-control" id="kurir_name" placeholder="Enter courier's name" name="kurir_name">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="kurir_username" class="form-label">Username</label>
									<input type="text" class="form-control" id="kurir_username" placeholder="Enter courier's username for logging courier's application" name="kurir_username">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="kurir_password" class="form-label">Password</label>
									<input type="password" class="form-control" id="kurir_password" placeholder="Enter courier's password for logging courier's application" name="kurir_password">
								</div>

								<div class="col-12 col-lg-6">
									<label for="kurir_email" class="form-label">Email</label>
									<input type="email" class="form-control" id="kurir_email" placeholder="Enter courier's Email" name="kurir_email">
								</div>

								<div class="col-12 col-lg-6">
									<label for="kurir_handphone" class="form-label">Handphone</label>
									<input type="text" class="form-control" id="kurir_handphone" placeholder="Enter courier's phone number" name="kurir_handphone">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="kurir_vehicle_number" class="form-label">Vehicle Number</label>
									<input type="text" class="form-control" id="kurir_vehicle_number" placeholder="Enter courier's phone number" name="kurir_vehicle_number">
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>