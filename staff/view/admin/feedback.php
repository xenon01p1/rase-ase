<script src="../../controller/admin/controller_feedback.js"></script>
<script src="display_style_admin.js"></script>

<div class="card">
					<div class="card-body">

						<div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
								<select class="form-select" id="search" aria-label="Default select example">
										<!-- value is based on field -->
										<option value="feedback.feedback_id">ID feedback</option>
										<option value="customer.customer_name">Customer</option>
										<option value="feedback.feedback_datetime">Date</option>
								</select> 
							</div> 
							
							<div class="col-md-6">
									<input id="search_type" type="text" class="form-control" placeholder="Cari feedback">
							</div>
						  
							<!-- <div class="col-md-2 ms-auto">
							  	<a onclick="add_category()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>category Baru</a>
							</div> -->

						</div>


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No</th>
										<th><div>Customer</div></th> 
										<th>Feedback</th> 
										<th><div>Datetime</div></th>
										<th><div>Preview Photo</div></th>
									</tr>
								</thead>
								<tbody id="rows">
									
                                    <!-- fetcehd data will be appended here -->

								</tbody>
							</table>
						</div>
					</div>
				</div>