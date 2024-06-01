<?php

function search_banner_by_branch_status($db, $branch_id, $banner_status){
    $customer=[];
    $sql = "SELECT * FROM banner WHERE branch_id=:v_branch_id AND banner_status=:v_banner_status ORDER BY banner_order ASC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->bindParam(":v_banner_status", $banner_status);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $customer[] = $row;  }
    return $customer; 
}