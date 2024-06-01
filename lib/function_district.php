<?php

function search_districts_by_regency_id($db,$regency_id) 
{ 
$sql = "SELECT * FROM districts WHERE regency_id=:v_regency_id "; 
$query = $db->prepare($sql);
$query->bindParam(":v_regency_id",$regency_id);
$query->execute();
$result = $query->fetchAll();
foreach ($result as $row) 
{  $districts[] = $row;  }
return $districts; 
}

function search_districts_by_id($db, $id){
    $districts=[];
    $sql = "SELECT * FROM districts WHERE id=:v_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_id",$id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $districts[] = $row;  }
    return $districts; 
}

function viewall_districts($db){
    $districts=[];
    $sql = "SELECT * FROM districts"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $districts[] = $row;  }
    return $districts; 
}


// view_customer($db, $criteria='', $status='', $value='', $type=0)
// $db      = database      |   $value = value for type 2/search type
// $status  = DESC or ASC   |   $type = 0 or 1 or 2

// type 0 = show all default data
// type 1 = show data by dropdown search
// type 2 = show data by search typing

function view_districts($db, $criteria='', $status='', $value='', $type=0){
    $districts=[];
    $sql = "SELECT 
                districts.*,
                regencies.name AS regency
            FROM districts
            JOIN regencies
                ON districts.regency_id = regencies.id";

    if($type == 0){
        $sql .= " ORDER BY districts.id DESC LIMIT 50"; 

    }elseif($type == 1){
        $sql .= " ORDER BY ". $criteria .' '. $status ." LIMIT 50"; 

    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        regencies.name LIKE '%$value%' OR
                        districts.id LIKE '%$value%' OR
                        districts.name LIKE '%$value%'
                    LIMIT 50";
        }
    }

    
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $districts[] = $row;  }
    return $districts; 
}

?>