<?php

function view_customer($db, $criteria='', $status='', $value='', $type=0){
    $customer=[];
    $sql = "SELECT * FROM customer "; 

    if($type == 0){
        $sql .= " WHERE customer_status=0 ORDER BY customer_id DESC"; 

    }elseif($type == 1){
        $sql .= " WHERE customer_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        customer_status=0 AND
                        (customer_name LIKE '%$value%' OR
                        customer_username LIKE '%$value%' OR
                        customer_handphone LIKE '%$value%' OR
                        customer_address LIKE '%$value%') ";
        } else {
            $sql .= " WHERE customer_status=0";
        }
    }

    
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $customer[] = $row;  }
    return $customer; 
}

function search_customer_by_customer_id($db, $customer_id){
    $customer=[];
    $sql = "SELECT * FROM customer WHERE customer_id=:v_customer_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_id", $customer_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $customer[] = $row;  }
    return $customer; 
}

function search_customer_by_customer_email($db, $customer_email){
    $customer=[];
    $sql = "SELECT * FROM customer WHERE customer_email=:v_customer_email"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_customer_email", $customer_email);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $customer[] = $row;  }
    return $customer; 
}