<?php

function search_order_master_by_code($db, $order_master_code){
    $order_master=[];
    $sql = "SELECT * FROM order_master WHERE order_master_code=:v_order_master_code"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_order_master_code",$order_master_code);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $order_master[] = $row;  }
    return $order_master; 
}