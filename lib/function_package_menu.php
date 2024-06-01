<?php

function view_package_menu($db, $branch_id, $criteria='', $status='', $value='', $type=0){
    $menu = [];
    $sql = "
        SELECT 
            package_menu.*,
            m1.menu_name AS package_name,
            m2.menu_name AS item_name
        FROM 
            package_menu
        JOIN 
            menu AS m1 ON m1.menu_id = package_menu.package_id
        JOIN 
            menu AS m2 ON m2.menu_id = package_menu.menu_id
    ";

    if($type == 0){
        $sql .= " WHERE package_menu.branch_id = :v_branch_id ORDER BY package_menu.package_menu_id DESC"; 

    }elseif($type == 1){
        $sql .= " WHERE package_menu.branch_id = :v_branch_id ORDER BY ". $criteria .' '. $status; 
        
    }else{
        if (!empty($value)) {
            $sql .= " WHERE 
                        package_menu.branch_id = :v_branch_id AND
                        (m1.menu_name LIKE '%$value%' OR
                        m2.menu_name LIKE '%$value%'  ) ";
        } else {
            $sql .= " WHERE package_menu.branch_id = :v_branch_id";
        }
    }

    $query = $db->prepare($sql);
    $query->bindParam(":v_branch_id", $branch_id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $menu[] = $row;
    }
    return $menu;
 
}