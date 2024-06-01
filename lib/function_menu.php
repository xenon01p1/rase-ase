<?php

function view_menu_by_branch($db, $branch_id, $criteria='', $status='', $value='', $type=0){
    $menu=[];
    $sql = "SELECT * FROM menu WHERE branch_id=:v_branch_id ";
    
    if($type == 0){
        $sql .= " AND menu_status=0 ORDER BY menu_id DESC"; 

    }elseif($type == 1){
        $sql .= " AND menu_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " AND 
                        menu_status=0 AND
                        (menu_name LIKE '%$value%' OR
                        menu_type LIKE '%$value%' OR
                        menu_price LIKE '%$value%' ) ";
        } else {
            $sql .= " AND menu_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $menu[] = $row;  }
    return $menu; 
}


function view_menu_by_branch_and_menu($db, $branch_id, $menu_type, $criteria='', $status='', $value='', $type=0){
    $menu=[];
    $sql = "SELECT * FROM menu WHERE branch_id=:v_branch_id AND menu_type=:v_menu_type ";
    
    if($type == 0){
        $sql .= " AND menu_status=0 ORDER BY menu_id DESC"; 

    }elseif($type == 1){
        $sql .= " AND menu_status=0 ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " AND 
                        menu_status=0 AND
                        (menu_name LIKE '%$value%' OR
                        menu_type LIKE '%$value%' OR
                        menu_price LIKE '%$value%' ) ";
        } else {
            $sql .= " AND menu_status=0";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->bindParam(":v_menu_type", $menu_type);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $menu[] = $row;  }
    return $menu; 
}


function view_menu_by_branch_type($db, $branch_id, $menu_type, $unlike_menu){
    $menu=[];
    if($unlike_menu){
        $sql = "SELECT * FROM menu WHERE branch_id=:v_branch_id AND menu_type!=:v_menu_type AND menu_status=0"; 
    }else{
        $sql = "SELECT * FROM menu WHERE branch_id=:v_branch_id AND menu_type=:v_menu_type AND menu_status=0"; 
    }
    
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->bindParam(":v_menu_type", $menu_type);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $menu[] = $row;  }
    return $menu; 
}


function search_menu_by_id($db, $menu_id){
    $menu=[];
    $sql = "SELECT * FROM menu WHERE menu_id=:v_menu_id"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_menu_id", $menu_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $menu[] = $row;  }
    return $menu; 
}

function search_menu_by_branch_type($db, $branch_id, $menu_type, $limit=0){
    $menu=[];
    $sql = "SELECT * FROM menu WHERE branch_id=:v_branch_id AND menu_type=:v_menu_type AND menu_status=0"; 
    if($limit > 0){
        $sql .= " LIMIT ".$limit;
    }
    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->bindParam(":v_menu_type", $menu_type);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $menu[] = $row;  }
    return $menu; 
}