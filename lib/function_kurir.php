<?php

function view_kurir($db){
    $kurir=[];
    $sql = "SELECT * FROM kurir WHERE kurir_status=0"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $kurir[] = $row;  }
    return $kurir; 
}

function search_kurir_by_kurir_id($db, $kurir_id){
    $kurir=[];
    $sql = "SELECT * FROM kurir WHERE kurir_status=0 AND kurir_id=:v_kurir_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_kurir_id", $kurir_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $kurir[] = $row;  }
    return $kurir; 
}

function search_kurir_by_kurir_username($db, $kurir_username){
    $kurir=[];
    $sql = "SELECT * FROM kurir WHERE kurir_status=0 AND kurir_username=:v_kurir_username"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_kurir_username", $kurir_username);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $kurir[] = $row;  }
    return $kurir; 
}

function search_kurir_by_branch($db, $branch_id, $criteria='', $status='', $value='', $type=0){
    $kurir=[];
    $sql = "SELECT * FROM kurir WHERE branch_id=:v_branch_id ";
    
    if($type == 0){
        $sql .= " AND kurir_status=0 ORDER BY kurir_id DESC"; 

    }elseif($type == 1){
        $sql .= " AND kurir_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " AND 
                        kurir_status=0 AND
                        (kurir_name LIKE '%$value%' OR
                        kurir_email LIKE '%$value%' OR
                        kurir_handphone LIKE '%$value%' OR 
                        kurir_vehicle_number LIKE '%$value%' ) ";
        } else {
            $sql .= " AND kurir_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $kurir[] = $row;  }
    return $kurir; 
}


function viewall_kurir($db, $criteria='', $status='', $value='', $type=0){
    $kurir=[];
    $sql = "SELECT 
                kurir.*,
                branch.branch_name AS branch_name
            FROM kurir 
            JOIN branch
                ON kurir.branch_id = branch.branch_id ";
    
    if($type == 0){
        $sql .= " AND kurir_status=0 ORDER BY kurir_id DESC"; 

    }elseif($type == 1){
        $sql .= " AND kurir_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " AND 
                        kurir_status=0 AND
                        (kurir_name LIKE '%$value%' OR
                        kurir_email LIKE '%$value%' OR
                        kurir_handphone LIKE '%$value%' OR 
                        kurir_vehicle_number LIKE '%$value%' ) ";
        } else {
            $sql .= " AND kurir_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $kurir[] = $row;  }
    return $kurir; 
}