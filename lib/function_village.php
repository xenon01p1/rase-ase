<?php

function search_villages_by_district_id($db,$district_id) 
{ 
$sql = "SELECT * FROM villages WHERE district_id=:v_district_id "; 
$query = $db->prepare($sql);
$query->bindParam(":v_district_id",$district_id);
$query->execute();
$result = $query->fetchAll();
foreach ($result as $row) 
{  $villages[] = $row;  }
return $villages; 
}

function search_villages_by_id($db, $id){
    $villages=[];
    $sql = "SELECT * FROM villages WHERE id=:v_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_id",$id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $villages[] = $row;  }
    return $villages; 
}

function viewall_village($db){
    $villages=[];
    $sql = "SELECT * FROM villages"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $villages[] = $row;  }
    return $villages; 
}


// view_customer($db, $criteria='', $status='', $value='', $type=0)
// $db      = database      |   $value = value for type 2/search type
// $status  = DESC or ASC   |   $type = 0 or 1 or 2

// type 0 = show all default data
// type 1 = show data by dropdown search
// type 2 = show data by search typing

function view_villages($db, $criteria='', $status='', $value='', $type=0){
    $villages=[];
    $sql = "SELECT 
                villages.*,
                districts.name AS subdistrict
            FROM villages
            JOIN districts
                ON villages.district_id = districts.id
            ";

    if($type == 0){
        $sql .= " ORDER BY districts.id DESC LIMIT 50";

    }elseif($type == 1){
        $sql .= " ORDER BY ". $criteria. ' ' .$status. " LIMIT 50";

    }else{

        if (!empty($value)) {
            $sql .= " WHERE 
                        districts.name LIKE '%$value%' OR
                        villages.id LIKE '%$value%' OR
                        villages.name LIKE '%$value%'
                    LIMIT 50";
        }else{
            $sql .= "LIMIT 50";
        }
    }

    
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $villages[] = $row;  }
    return $villages; 
}

?>