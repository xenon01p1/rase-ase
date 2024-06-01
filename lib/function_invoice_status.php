<?php

function search_invoice_status_by_inv($db, $invoice_id){
    $invoice_status=[];
    $sql = "SELECT * FROM invoice_status WHERE invoice_id=:v_invoice_id ORDER BY invoice_status_id DESC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_invoice_id", $invoice_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $invoice_status[] = $row;  }
    return $invoice_status; 
}