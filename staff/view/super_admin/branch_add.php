<script src="../../controller/super_admin/controller_branch_add.js"></script>
<script src="../../../lib/get_selected.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "branch Detail";
	$text_subtitle 	= "Detail information of branch";
}elseif ($edit) {
	$text_title 	= "Add New branch" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New branch" ;
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
										<option value="branch_id">ID branch</option>
										<option value="branch_name">branch Nmae</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search branch">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="page('branch_add.php')" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add branch</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="page('branch.php')" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_branch" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="branch_id" id="branch_id" value="<?= (isset($_GET['branch_id'])) ? $_GET['branch_id'] : '' ?>">

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
									<label for="branch_name" class="form-label">Branch Name</label>
									<input type="text" class="form-control" id="branch_name" placeholder="Enter branch's name" name="branch_name">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="branch_status" class="form-label">Branch Status</label>
                                    <select name="branch_status" id="branch_status" class="form-control">
                                        <option value="0">Available</option>
                                        <option value="1">Not Active</option>
                                        <option value="2">Released to public</option>
                                    </select>
								</div>

                                <div class="col-12 col-lg-6">
									<label for="branch_open" class="form-label">Open</label>
									<input type="time" class="form-control" id="branch_open" name="branch_open">
								</div>

								<div class="col-12 col-lg-6">
									<label for="branch_close" class="form-label">Close</label>
									<input type="time" class="form-control" id="branch_close" placeholder="Enter branch's Email" name="branch_close">
								</div>

                                <div class="col-12 col-lg-12">
									<label for="branch_address" class="form-label">Address</label>
									<input type="text" class="form-control" id="branch_address" placeholder="Enter branch's address" name="branch_address">
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>