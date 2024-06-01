<?php

function viewall_branch($db, $criteria='', $status='', $value='', $type=0){
    $branch=[];
    $sql = "SELECT * FROM branch "; 

    if($type == 0){
        $sql .= " WHERE branch_status!=1 ORDER BY branch_id DESC"; 

    }elseif($type == 1){
        $sql .= " WHERE branch_status!=1 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        branch_status!=1 AND
                        (branch_name LIKE '%$value%' OR
                        branch_address LIKE '%$value%') ";
        } else {
            $sql .= " WHERE branch_status=0";
        }
    }

    
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}

function view_branch($db){
    $branch=[];
    $sql = "SELECT * FROM branch"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}

function search_branch_by_id($db, $branch_id){
    $branch=[];
    $sql = "SELECT * FROM branch WHERE branch_id=:v_branch_id "; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id",$branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}


function search_branch_by_regency_id($db, $regency_id){
    $branch=[];
    $sql = "SELECT * FROM branch WHERE regency_id=:v_regency_id AND branch_status=2"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_regency_id",$regency_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}


function search_branch_by_district_id($db, $district_id){
    $branch=[];
    $sql = "SELECT * FROM branch WHERE district_id=:v_district_id AND branch_status=2"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_district_id",$district_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}

function search_branch_by_village_id($db, $village_id){
    $branch=[];
    $sql = "SELECT * FROM branch WHERE village_id=:v_village_id AND branch_status=2"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_village_id",$village_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}

function search_branch_by_branch_id($db, $branch_id){
    $branch=[];
    $sql = "SELECT * FROM branch WHERE branch_id=:v_branch_id "; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id",$branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $branch[] = $row;  }
    return $branch; 
}


