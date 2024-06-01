<script src="../../controller/admin/controller_admin.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
								<select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="admin_id">ID admin</option>
										<option value="admin_name">Admin Name</option>
										<option value="admin_username">Admin Username</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search admin">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="add_admin()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add admin</a>
							</div>

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th><div>Full Name</div></th> 
                                        <th><div>Username</div></th> 
                                        <th><div>Email</div></th> 
                                        <th><div>Phone Number</div></th> 
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