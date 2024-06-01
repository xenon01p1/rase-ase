<?php

function search_admin_by_admin_username($db, $admin_username){
    $admin=[];
    $sql = "SELECT * FROM admin WHERE admin_username=:v_admin_username "; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_admin_username",$admin_username);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $admin[] = $row;  }
    return $admin; 
}


function search_admin_by_admin_id($db, $admin_id){
    $admin=[];
    $sql = "SELECT * FROM admin WHERE admin_id=:v_admin_id "; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_admin_id",$admin_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $admin[] = $row;  }
    return $admin; 
}

function search_admin_by_branch($db, $branch_id, $criteria='', $status='', $value='', $type=0){
    $admin=[];
    $sql = "SELECT * FROM admin WHERE branch_id=:v_branch_id ";
    
    if($type == 0){
        $sql .= " AND admin_status=0 ORDER BY admin_id DESC"; 

    }elseif($type == 1){
        $sql .= " AND admin_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " AND 
                        admin_status=0 AND
                        (admin_name LIKE '%$value%' OR
                        admin_username LIKE '%$value%' OR
                        admin_email LIKE '%$value%' OR
                        admin_handphone LIKE '%$value%' ) ";
        } else {
            $sql .= " AND admin_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id",$branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $admin[] = $row;  }
    return $admin; 
}


function viewall_admin($db, $criteria='', $status='', $value='', $type=0){
    $admin=[];
    $sql = "SELECT 
                admin.*,
                branch.branch_name AS branch_name
            FROM admin 
            JOIN branch
                ON admin.branch_id = branch.branch_id
            WHERE ";
    
    if($type == 0){
        $sql .= " admin_status=0 ORDER BY admin_id DESC"; 

    }elseif($type == 1){
        $sql .= " admin_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " admin_status=0 AND
                        (admin_name LIKE '%$value%' OR
                        admin_username LIKE '%$value%' OR
                        admin_email LIKE '%$value%' OR
                        admin_handphone LIKE '%$value%' ) ";
        } else {
            $sql .= " admin_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $admin[] = $row;  }
    return $admin; 
}
