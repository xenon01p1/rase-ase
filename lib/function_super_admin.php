<?php

function search_super_admin_by_username($db, $super_admin_username){
    $super_admin=[];
    $sql = "SELECT * FROM super_admin WHERE super_admin_username=:v_super_admin_username"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_super_admin_username",$super_admin_username);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $super_admin[] = $row;  }
    return $super_admin; 
}