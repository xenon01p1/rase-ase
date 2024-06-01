<?php

function view_feedback($db){
    $feedback=[];
    $sql = "SELECT 
                feedback.*,
                customer.*
            FROM feedback 
            JOIN customer
                ON feedback.customer_id = customer.customer_id"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $feedback[] = $row;  }
    return $feedback; 
}


function search_feedback_by_branch($db, $branch_id, $criteria='', $status='', $value='', $type=0){
    $feedback=[];
    $sql = "SELECT 
                feedback.*,
                customer.*
            FROM feedback 
            JOIN customer
                ON feedback.customer_id = customer.customer_id
            "; 

    if($type == 0){
        $sql .= " WHERE feedback.branch_id = :v_branch_id ORDER BY feedback.feedback_id DESC"; 

    }elseif($type == 1){
        $sql .= " WHERE feedback.branch_id = :v_branch_id ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        feedback.branch_id = :v_branch_id AND
                        (customer.customer_name LIKE '%$value%' OR
                        feedback.feedback_content LIKE '%$value%' OR
                        feedback.feedback_datetime LIKE '%$value%' ) ";
        } else {
            $sql .= " WHERE feedback.branch_id = :v_branch_id";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $feedback[] = $row;  }
    return $feedback; 
}


function viewall_feedback($db, $criteria='', $status='', $value='', $type=0){
    $feedback=[];
    $sql = "SELECT 
                feedback.*,
                customer.*,
                branch.branch_name AS branch_name
            FROM feedback 
            JOIN customer
                ON feedback.customer_id = customer.customer_id
            JOIN branch 
                ON feedback.branch_id = branch.branch_id
            "; 

    if($type == 0){
        $sql .= " ORDER BY feedback.feedback_id DESC"; 

    }elseif($type == 1){
        $sql .= " ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        feedback.branch_id = :v_branch_id AND
                        (customer.customer_name LIKE '%$value%' OR
                        feedback.feedback_content LIKE '%$value%' OR
                        feedback.feedback_datetime LIKE '%$value%' ) ";
        }
    }

    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $feedback[] = $row;  }
    return $feedback; 
}


