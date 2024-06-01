<?php

session_start();
include_once "../../config/connection.php";
include_once "../../lib/function_cart.php";
include_once "../../lib/function_customer.php";

$customer_email = $_SESSION['customer_email'];
$customer       = search_customer_by_customer_email($db, $customer_email)[0];
$customer_id    = $customer['customer_id'];
$invoice_id     = 0;
$cart           = search_cart_by_customer_inv($db, $customer_id, $invoice_id);
$count_cart     = (count($cart) > 0) ? count($cart) : 0;

echo $count_cart;