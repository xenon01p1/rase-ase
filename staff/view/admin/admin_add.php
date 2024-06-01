<script src="../../controller/admin/controller_admin_add.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "admin Detail";
	$text_subtitle 	= "Detail information of admin";
}elseif ($edit) {
	$text_title 	= "Add New admin" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New admin" ;
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
										<option value="admin_id">ID admin</option>
										<option value="admin_name">admin Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search admin">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_admin()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add admin</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="admin_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_admin" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="admin_id" id="admin_id" value="<?= (isset($_GET['admin_id'])) ? $_GET['admin_id'] : '' ?>">

							<div class="row g-3">
								<div class="col-12 col-lg-6">
									<label for="admin_name" class="form-label">Full Name</label>
									<input type="text" class="form-control" id="admin_name" placeholder="Enter admin's name" name="admin_name">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="admin_username" class="form-label">Username</label>
									<input type="text" class="form-control" id="admin_username" placeholder="Enter admin's username for logging admin's application" name="admin_username">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="admin_password" class="form-label">Password</label>
									<input type="password" class="form-control" id="admin_password" placeholder="Enter admin's password for logging admin's application" name="admin_password">
								</div>

								<div class="col-12 col-lg-6">
									<label for="admin_email" class="form-label">Email</label>
									<input type="email" class="form-control" id="admin_email" placeholder="Enter admin's Email" name="admin_email">
								</div>

								<div class="col-12 col-lg-6">
									<label for="admin_handphone" class="form-label">Handphone</label>
									<input type="text" class="form-control" id="admin_handphone" placeholder="Enter admin's phone number" name="admin_handphone">
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>