<script src="../../controller/super_admin/controller_branch.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
								<select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="customer_id">ID Customer</option>
										<option value="customer_name">Customer Name</option>
										<option value="customer_status">Customer Status</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search customer">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="page('branch_add.php')" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Branch</a>
							</div>

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th><div>Branch</div></th> 
                                        <th><div>Address</div></th> 
                                        <th><div align="center">Operate</div></th> 
                                        <th><div><center>Status</center></div></th> 
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