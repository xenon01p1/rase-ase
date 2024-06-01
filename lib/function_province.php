<?php

function viewall_province($db){
    $provinces=[];
    $sql = "SELECT * FROM provinces"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $provinces[] = $row;  }
    return $provinces; 
}


// view_province($db, $criteria='', $status='', $value='', $type=0)
// $db      = database      |   $value = value for type 2/search type
// $status  = DESC or ASC   |   $type = 0 or 1 or 2

// type 0 = show all default data
// type 1 = show data by dropdown search
// type 2 = show data by search typing

function view_province($db, $criteria='', $status='', $value='', $type=0){
    $provinces=[];
    $sql = "SELECT * FROM provinces";

    if($type == 0){
        $sql .= " ORDER BY id DESC";
    }elseif($type == 1){
        $sql .= " ORDER BY ".$criteria.' '.$status;
    }else{

        if (!empty($value)) {
            $sql .= " WHERE 
                        id LIKE '%$value%' OR
                        name LIKE '%$value%'";
        }
    }

    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $provinces[] = $row;  }
    return $provinces; 
}

function search_province_by_id($db, $id){
    $provinces=[];
    $sql = "SELECT * FROM provinces WHERE id=:v_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_id",$id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $provinces[] = $row;  }
    return $provinces; 
}

?>