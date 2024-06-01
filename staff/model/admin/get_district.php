<?php

require_once "../../../config/connection.php";
require_once "../../../lib/function_district.php";

if(isset($_GET['id_regency'])){
    $regency_id = $_GET['id_regency'];
    $district_id = $_GET['district_id'];
    $districts = search_districts_by_regency_id($db,$regency_id);
}else{
    $districts = viewall_districts($db);
}
?>

<?php if($districts) : ?>

    <option value="-" disabled selected>Silahkan pilih kecamatan anda</option>

    <?php 
    
    foreach($districts as $district): 
        $selected = (isset($_GET['id_regency']) && $district['id'] == $district_id) ? 'selected' : '';
    ?>
        <option value="<?= $district['id'] ?>" <?= $selected ?>><?= $district['name'] ?></option>
    <?php endforeach ?>

<?php else: ?>

    <option value="-" disabled selected>Error menampilkan kecamatan</option>

<?php endif ?>