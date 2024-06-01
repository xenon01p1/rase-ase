<?php

session_start();
include_once "../../../config/connection.php";
include_once "../../../lib/function_menu.php";
include_once "../../../lib/function_admin.php";
include_once "../../../lib/function_miscellaneous.php";

$admin_id = $_SESSION['admin_id'];

if(!isset($_GET['menu_id']) && $_GET['action'] == 'insert'){
    $branch_id              = search_admin_by_admin_id($db, $admin_id)[0]['branch_id'];
    $menu_name              = $_POST['menu_name'];
    $menu_type              = $_POST['menu_type'];
    $menu_price             = $_POST['menu_price'];
    $menu_original_price    = $_POST['menu_original_price'];
    $menu_discount          = $_POST['menu_discount'];
    $menu_discount_start    = $_POST['menu_discount_start'];
    $menu_discount_end      = $_POST['menu_discount_end'];
    $menu_description       = $_POST['menu_description'];
    $menu_status            = 0;
    $menu_input_by          = $_SESSION['admin_id'];
    $menu_input_datetime    = date('Y-m-d H:i:s');
    $menu_img               = $_FILES['menu_img'];
    $tmp_name               = $menu_img['tmp_name'];
    $menu_file_name         = date('YmdHis').'_'.$menu_img['name'];
    $menu_file_filetype     = $menu_img['type'];
    $menu_file_extension    = explode('.', $menu_file_name);
    $menu_file_extension    = end($menu_file_extension);


    // INSERT menu
    $query_menu = $db->prepare("INSERT INTO menu (branch_id, menu_name, menu_type, menu_price, menu_original_price, menu_discount, menu_discount_start, menu_discount_end, menu_description, menu_status, menu_file_name, menu_file_filetype, menu_file_extension, menu_input_by, menu_input_datetime) VALUES (:v_branch_id, :v_menu_name, :v_menu_type, :v_menu_price, :v_menu_original_price, :v_menu_discount, :v_menu_discount_start, :v_menu_discount_end, :v_menu_description, :v_menu_status, :v_menu_file_name, :v_menu_file_filetype, :v_menu_file_extension, :v_menu_input_by, :v_menu_input_datetime)");

    $query_menu->bindParam(":v_branch_id", $branch_id);
    $query_menu->bindParam(":v_menu_name", $menu_name);
    $query_menu->bindParam(":v_menu_type", $menu_type);
    $query_menu->bindParam(":v_menu_price", $menu_price);
    $query_menu->bindParam(":v_menu_original_price", $menu_original_price);
    $query_menu->bindParam(":v_menu_discount", $menu_discount);
    $query_menu->bindParam(":v_menu_discount_start", $menu_discount_start); 
    $query_menu->bindParam(":v_menu_discount_end", $menu_discount_end);
    $query_menu->bindParam(":v_menu_description", $menu_description);
    $query_menu->bindParam(":v_menu_status", $menu_status);
    $query_menu->bindParam(":v_menu_file_name", $menu_file_name);
    $query_menu->bindParam(":v_menu_file_filetype", $menu_file_filetype);
    $query_menu->bindParam(":v_menu_file_extension", $menu_file_extension);
    $query_menu->bindParam(":v_menu_input_by", $menu_input_by);
    $query_menu->bindParam(":v_menu_input_datetime", $menu_input_datetime);

    $query_menu->execute();
    $menu_id = $db->lastInsertId();
    if ($menu_id==0) {
        echo 41;
    }

    $upload_file = move_uploaded_file($tmp_name, "../../../media/".$menu_file_name);
    if (!$upload_file) {
        echo 42;
    }

    echo 1;
    

}elseif(isset($_GET['menu_id']) && $_GET['action'] == 'update'){
    $menu_id                = $_POST['menu_id'];
    $menu_name              = $_POST['menu_name'];
    $menu_type              = $_POST['menu_type'];
    $menu_price             = $_POST['menu_price'];
    $menu_original_price    = $_POST['menu_original_price'];
    $menu_discount          = $_POST['menu_discount'];
    $menu_discount_start    = $_POST['menu_discount_start'];
    $menu_discount_end      = $_POST['menu_discount_end'];
    $menu_description       = $_POST['menu_description'];
    $menu_last_update_by    = $_SESSION['admin_id'];
    $menu_last_update       = date('Y-m-d H:i:s');
    $menu_img               = $_FILES['menu_img'];
    $tmp_name               = $menu_img['tmp_name'];
    $menu_file_name         = date('YmdHis').'_'.$menu_img['name'];
    $menu_file_filetype     = $menu_img['type'];
    $menu_file_extension    = explode('.', $menu_file_name);
    $menu_file_extension    = end($menu_file_extension);

    $sql = "UPDATE menu SET 
        menu_name = :v_menu_name, 
        menu_type = :v_menu_type, 
        menu_price = :v_menu_price, 
        menu_original_price = :v_menu_original_price,
        menu_discount = :v_menu_discount, 
        menu_discount_start = :v_menu_discount_start,
        menu_discount_end = :v_menu_discount_end,
        menu_description = :v_menu_description,
        menu_last_update_by = :v_menu_last_update_by,
        menu_last_update = :v_menu_last_update";

    // UPDATE menu
    if($menu_img['error'] == 4){
        $sql.= " WHERE menu_id = :v_menu_id";

    }else{
        $sql.= ", menu_file_name = :v_menu_file_name,
                menu_file_filetype = :v_menu_file_filetype,
                menu_file_extension = :v_menu_file_extension
            WHERE menu_id = :v_menu_id";
    }
    
    $query_menu = $db->prepare($sql);
    if($menu_img['error'] != 4){
        $query_menu->bindParam(":v_menu_file_name", $menu_file_name);
        $query_menu->bindParam(":v_menu_file_filetype", $menu_file_filetype);
        $query_menu->bindParam(":v_menu_file_extension", $menu_file_extension);
    }
    $query_menu->bindParam(":v_menu_name", $menu_name);
    $query_menu->bindParam(":v_menu_type", $menu_type);
    $query_menu->bindParam(":v_menu_price", $menu_price);
    $query_menu->bindParam(":v_menu_original_price", $menu_original_price);
    $query_menu->bindParam(":v_menu_discount", $menu_discount);
    $query_menu->bindParam(":v_menu_discount_start", $menu_discount_start);
    $query_menu->bindParam(":v_menu_discount_end", $menu_discount_end);
    $query_menu->bindParam(":v_menu_description", $menu_description);
    $query_menu->bindParam(":v_menu_last_update_by", $menu_last_update_by);
    $query_menu->bindParam(":v_menu_last_update", $menu_last_update);
    $query_menu->bindParam(":v_menu_id", $menu_id);

    $query_menu->execute();
    $count = $query_menu->rowCount();
    if ($count < 1) {
        echo 41;
    }

    if($menu_img['error'] != 4){
        $upload_file = move_uploaded_file($tmp_name, "../../../staff/media/".$menu_file_name);
        if (!$upload_file) {
            echo 42;
        }
    }

    echo 1;


}elseif ($_GET['action'] == 'get_data') {
    $menu_id = $_GET['id'];
    $menu = search_menu_by_id($db, $menu_id)[0];
    echo json_encode($menu);
}