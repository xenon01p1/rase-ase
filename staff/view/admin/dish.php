<script src="../../controller/admin/controller_dish.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
								<select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="menu_id">ID Menu</option>
										<option value="menu_name">Name</option>
										<option value="menu_price">Price</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Search dish">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="add_menu()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add dish</a>
							</div>

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
                                        <th><div>Picture</div></th>
										<th><div>Name</div></th> 
										<th><div>Original Price</div></th> 
										<th><div>Price</div></th> 
                                        <th><div>Discount</div></th>
                                        <th><div><center>Discount Active</center></div></th> 
                                        <th><div>Type</div></th> 
                                        <th><div>Description</div></th> 
										 
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