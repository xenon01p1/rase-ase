<script src="../../controller/admin/controller_banner_add.js"></script>
<script src="../../../lib/get_selected.js"></script>

<?php 

$detail 		= (isset($_GET['detail'])) ? $_GET['detail'] : '';
$edit 			= (isset($_GET['edit'])) ? $_GET['edit'] : '';

if($detail){
	$text_title 	= "banner Detail";
	$text_subtitle 	= "Detail information of banner";
}elseif ($edit) {
	$text_title 	= "Add New banner" ;
	$text_subtitle 	= "Please enter data below" ;
}else{
	$text_title 	= "Add New banner" ;
	$text_subtitle 	= "Please enter data below" ;
}

						
?>

<div class="card"> 

	<input type="hidden" name="detail" id="detail" value="<?= (isset($_GET['detail'])) ? $_GET['detail'] : '' ?>">

				    <div class="card-body">

				    	<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
							</div> 
							
							<div class="col-md-6">
							</div>

							<!-- <div class="col-md-2 text-start d-grid">
							    <button type="button" onclick="CreateTodo();" class="btn btn-primary radius-5 mt-2 mt-lg-0"><i class='bx bx-search'></i>Cari Pelanggan</button>
							</div> -->

							<div class="col-md-2 ms-auto">
							  	<a onclick="add_banner()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add banner</a>
							</div> 
						   

						</div>


						<div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1"><?= $text_title ?></h5>
								<p class="mb-4"><?= $text_subtitle ?></p>
 
							</div>
						  <div class="ms-auto">
						  	<a onclick="banner_back()" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
						  </div>
						</div>
						 
						<form id="form_banner" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="banner_id" id="banner_id" value="<?= (isset($_GET['banner_id'])) ? $_GET['banner_id'] : '' ?>">

							<div class="row g-3">

                                <div class="col-12 col-lg-6">
									<label for="banner_order" class="form-label">Order</label>
									<input type="number" class="form-control" id="banner_order" placeholder="Enter banner's order" name="banner_order">
								</div>

                                <div class="col-12 col-lg-6">
									<label for="banner_file_name" class="form-label">Banner</label>
									<input type="file" class="form-control" id="banner_file_name" name="banner_file_name">
								</div>
								 
								<?php if(!$detail): ?>
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
								<?php endif;?>
							</div><!---end row-->
							
						   
						</form>
					 </div>