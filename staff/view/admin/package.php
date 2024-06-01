<script src="../../controller/admin/controller_package.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
								<select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="package_menu.package_menu_id">ID</option>
										<option value="m1.menu_name">Package Name</option>
										<option value="m2.menu_name">Menu Name</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search package">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="add_package()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add package</a>
							</div>

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th><div>Package</div></th> 
                                        <th><div>Menu</div></th>  
										<th><div>Action</div></th>
									</tr>
								</thead>
								<tbody id="rows">
									
                                    <!-- fetcehd data will be appended here -->

								</tbody>
							</table>
						</div>
					</div>
				</div>