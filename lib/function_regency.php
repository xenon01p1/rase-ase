<?php

function search_regencies_by_province_id($db,$province_id) 
{ 
$regencies=[];
$sql = "SELECT * FROM regencies WHERE province_id=:v_province_id "; 
$query = $db->prepare($sql);
$query->bindParam(":v_province_id",$province_id);
$query->execute();
$result = $query->fetchAll();
foreach ($result as $row) 
{  $regencies[] = $row;  }
return $regencies; 
}

function search_regency_by_id($db, $id){
    $regencies=[];
    $sql = "SELECT * FROM regencies WHERE id=:v_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_id",$id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $regencies[] = $row;  }
    return $regencies; 
}

function viewall_regencies($db){
    $regencies=[];
    $sql = "SELECT * FROM regencies"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $regencies[] = $row;  }
    return $regencies; 
}


// view_customer($db, $criteria='', $status='', $value='', $type=0)
// $db      = database      |   $value = value for type 2/search type
// $status  = DESC or ASC   |   $type = 0 or 1 or 2

// type 0 = show all default data
// type 1 = show data by dropdown search
// type 2 = show data by search typing

function view_regencies($db, $criteria='', $status='', $value='', $type=0){
    $regencies=[];
    $sql = "SELECT 
                regencies.*,
                provinces.name AS province
            FROM regencies
            JOIN provinces
                ON regencies.province_id = provinces.id";

    if($type == 0){
        $sql .= " ORDER BY regencies.id DESC LIMIT 50";

    }elseif($type == 1){
        $sql .= " ORDER BY ". $criteria .' '. $status ." LIMIT 50";

    }else{

        if (!empty($value)) {
            $sql .= " WHERE 
                        provinces.name LIKE '%$value%' OR
                        regencies.id LIKE '%$value%' OR
                        regencies.name LIKE '%$value%'
                    LIMIT 50";
        }
    }
    
     
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $regencies[] = $row;  }
    return $regencies; 
}

?>