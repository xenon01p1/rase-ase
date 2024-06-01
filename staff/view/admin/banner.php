<script src="../../controller/admin/controller_banner.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
							</div> 
							
							<div class="col-md-6">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="add_banner()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Banner</a>
							</div>

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th><div>Order</div></th> 
                                        <th><div>Banner</div></th>  
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