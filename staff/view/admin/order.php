<?php 

session_start();

require_once "../../../config/connection.php";
require_once "../../../lib/function_admin.php";
require_once "../../../lib/function_kurir.php";
require_once "../../../lib/function_invoice.php";
require_once "../../../lib/function_customer.php";
require_once "../../../lib/function_miscellaneous.php";
require_once "../../../lib/function_order_master.php";

$admin_id   = $_SESSION['admin_id'];
$branch_id  = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];
$invoices   = search_invoice_by_branch($db, $branch_id);

?>
<script src="../../controller/admin/controller_order.js"></script>
<div class="card">
					<div class="card-body">

						<!-- <div class="d-lg-flex align-items-center mb-4 gap-3">
							
							<div class="col-md-2"> 
							</div> 
							
							<div class="col-md-6">
							</div>
						  
							<div class="col-md-2 ms-auto">
							  	<a onclick="add_banner()" class="btn btn-success radius-1 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add Banner</a>
							</div>

						</div> -->


						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr align="center">
										<th>No</th>
										<th><div>Invoice Number</div></th> 
                                        <th><div>Customer</div></th>  
										<th><div>Courier</div></th>
                                        <th><div>Price</div></th>
                                        <th><div>PPN</div></th>
                                        <th><div>Shipping</div></th>
                                        <th><div>Total</div></th>
                                        <th><div>Note</div></th>
                                        <th><div>Address</div></th>
                                        <th><div>Status</div></th>
                                        <th><div>Action</div></th>
									</tr>
								</thead>
								<tbody id="rows">
									
                                <?php 
                                
                                $count = 0;
                                foreach ($invoices as $invoice) : 
                                    $count++;
                                    $customer = search_customer_by_customer_id($db, $invoice['customer_id'])[0];
                                    $status = search_order_master_by_code($db, $invoice['order_master_code'])[0]['order_master_status'];
                                    
                                    if($invoice['kurir_id'] > 0){
                                        $kurir = search_kurir_by_kurir_id($db, $invoice['kurir_id'])[0];
                                        $kurir_text = $kurir['kurir_name'].'<br>'.$kurir['kurir_email'].'<br>'.$kurir['kurir_handphone'];
                                    }else{
                                        $kurir_text = ' - ';
                                    }
                                    
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td>
                                            # INV <?= $invoice['invoice_number'] ?>

                                            <?php if($invoice['order_master_code'] >= 500): ?>
                                                <br style="height: 5px; display: block; content: '';">
                                                <a onclick="page('delivery_evident.php?invoice_id=<?= $invoice['invoice_id'] ?>')" target="_blank">
                                                    <button type="button" class="btn-sm btn btn-outline-dark   radius-5 px-3">Delivery Evident</button>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= $customer['customer_username'] ?><br>
                                            <?= $customer['customer_email'] ?><br>
                                            <?= $customer['customer_handphone'] ?? '-' ?>
                                        </td>
                                        <td><?= $kurir_text ?></td>
                                        <td><?= id_currency($invoice['invoice_price']) ?></td>
                                        <td><?= id_currency($invoice['invoice_ppn']) ?></td>
                                        <td><?= id_currency($invoice['invoice_shipping']) ?></td>
                                        <td><?= id_currency($invoice['invoice_price_total']) ?></td>
                                        <td><?= $invoice['invoice_note'] ?></td>
                                        <td><?= $invoice['invoice_delivery_address'] ?></td>
                                        <td>
                                            <br style="height: 5px; display: block; content: '';">
                                            <a onclick="page('order_status.php?invoice_id=<?= $invoice['invoice_id'] ?>')" style="cursor: pointer;">
                                                <div align="center">
                                                    <div class="badge  text-white bg-warning p-2 text-uppercase px-3">
                                                        <i class='bx bxs-circle align-middle me-1'></i>
                                                        <?= $status ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                        
                                        <?php if($invoice['order_master_code'] == 200): ?>
                                            <div align="center">
                                                <br style="height: 5px; display: block; content: '';">
                                                <a onclick="page('deploy_courier.php?invoice_id=<?= $invoice['invoice_id'] ?>')">
                                                    <button type="button" class="btn text-white bg-primary btn-sm radius-5 px-3">Proceed</button>
                                                </a> 
                                            </div> 
                                        </td>
                                        <?php endif; ?>

                                        <?php if($invoice['order_master_code'] == 500): ?>
                                            <div align="center">
                                                <br style="height: 5px; display: block; content: '';">
                                                <a class="done_btn" data-invoice-id="<?= $invoice['invoice_id'] ?>">
                                                    <button type="button" class="btn text-white bg-success btn-sm radius-5 px-3">Done</button>
                                                </a> 
                                            </div> 
                                        </td>
                                        <?php endif; ?>

                                    </tr>
                                <?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>