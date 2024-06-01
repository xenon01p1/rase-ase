<script src="../../controller/admin/controller_deploy_kurir.js"></script>

<?php 

session_start();

require_once "../../../config/connection.php";
require_once "../../../lib/function_admin.php";
require_once "../../../lib/function_invoice.php";
require_once "../../../lib/function_kurir.php";
require_once "../../../lib/function_order_master.php";


$admin_id       = $_SESSION['admin_id'];
$branch_id      = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];
$invoice_id     = $_GET['invoice_id'];
$couriers       = search_kurir_by_branch($db, $branch_id);
						
?>

<div class="card"> 

	<input type="hidden" name="detail" id="detail" value="<?= (isset($_GET['detail'])) ? $_GET['detail'] : '' ?>">

				    <div class="card-body">

                        <div class="d-lg-flex align-items-center mb-1 gap-3">
							<div class="position-relative">
								<h5 class="mb-1">Choose Courier</h5>
								<p class="mb-4">Choose courier for this order</p>
 
							</div>
						  <!-- <div class="ms-auto">
						  	<a href="billing.php" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Tagihan</a> &nbsp;
						  </div> -->
						</div>


						<form id="form_courier" enctype="multipart/form-data" method="post">   
						
						<input type="hidden" name="invoice_id" id="invoice_id" value="<?= (isset($_GET['invoice_id'])) ? $_GET['invoice_id'] : '' ?>">

							<div class="row g-3">

								<div class="col-12 col-lg-6">
									<label for="kurir_id" class="form-label">Courier</label>
									<select class="form-select" id="kurir_id" aria-label="Default select example" name="kurir_id">
										<?php foreach ($couriers as $courier) :?>
                                            <option value="<?= $courier['kurir_id'] ?>"><?= $courier['kurir_name'] ?></option>
                                        <?php endforeach; ?>
									</select>
								</div>
								 
									<div class="col-12 col-lg-12 mb-3">
										<button class="btn btn-success px-4">Submit </button>
									</div>
							</div><!---end row-->
							
						   
						</form>
					 </div>