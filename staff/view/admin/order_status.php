<?php 

session_start();

require_once "../../../config/connection.php";
require_once "../../../lib/function_invoice.php";
require_once "../../../lib/function_order_master.php";
require_once "../../../lib/function_invoice_status.php";

$invoice_id         = $_GET['invoice_id'];
$invoice            = search_invoice_by_inv($db, $invoice_id)[0];
$all_invoice_status = search_invoice_status_by_inv($db, $invoice_id);

?>

<div class="container py-2">
							<h2 class="font-weight-light text-center text-muted py-3">Order Timeline</h2>
							<!-- timeline item 1 -->

                            <?php 
                            
                            foreach($all_invoice_status as $invoice_status): 
                                $description = search_order_master_by_code($db, $invoice_status['order_master_code'])[0]['order_master_description'];
                                if($invoice['order_master_code'] == $invoice_status['order_master_code']){
                                    $pill_bg    = "bg-primary";
                                    $text_color = "text-primary";
                                    $date_color = "text-primary";
                                }else{
                                    $pill_bg    = "bg-light";
                                    $text_color = "text-muted";
                                    $date_color = "text-muted";
                                }
                            
                            ?>
                            <div class="row">
								<!-- timeline item 1 left dot -->
								<div class="col-auto text-center flex-column d-none d-sm-flex">
									<div class="row h-50">
										<div class="col">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
									<h5 class="m-2">
									<span class="badge rounded-pill <?= $pill_bg ?> border">&nbsp;</span>
								</h5>
									<div class="row h-50">
										<div class="col border-end">&nbsp;</div>
										<div class="col">&nbsp;</div>
									</div>
								</div>
								<!-- timeline item 1 event content -->
								<div class="col py-2">
									<div class="card radius-15">
										<div class="card-body">
											<div class="float-end <?= $date_color ?>"><?= $invoice_status['invoice_status_datetime'] ?></div>
											<h4 class="card-title <?= $text_color ?>"><?= $invoice_status['order_master_status'] ?></h4>
											<p class="card-text"><?= $description ?></p>
										</div>
									</div>
								</div>
							</div>
                            <?php endforeach; ?>
							
						</div>