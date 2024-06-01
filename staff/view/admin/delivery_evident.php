<?php 

session_start();

require_once "../../../config/connection.php";
require_once "../../../lib/function_invoice.php";

$invoice_id   = $_GET['invoice_id'];
$invoice      = search_invoice_by_inv($db, $invoice_id)[0];

?>


<!--- BEGIN TAB -->

<div class="card">

<div class="card-body">
    <div class="d-lg-flex align-items-center mb-1 gap-3">
        <div class="position-relative">
            <h5 class="mb-1">Delivery Evident</h5>
            <p class="mb-4">A photo of delivered order</p>

        </div>
        <div class="ms-auto">
            <a onclick="page('order.php')" class="btn btn-primary radius-1 mt-2 mt-lg-0"><i class='bx bx-group'></i>Back</a> &nbsp;
        </div>
    </div>
    <ul class="nav nav-tabs nav-primary" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="true">
                <div class="d-flex align-items-center">
                    <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                    </div>
                    <div class="tab-title">File invoice</div>
                </div>
            </a>
        </li>
    </ul>
    <div class="tab-content py-3">

        <div class="tab-pane fade show active" id="primarycontact" role="tabpanel">
            
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                       
                            <div class="carousel-item active">
                                <img src="../../../media/<?= $invoice['invoice_file_name']  ?>" class="d-block w-100" >
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

<!-- END TAB -->