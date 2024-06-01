<?php

require_once "../../../config/connection.php";
require_once "../../../lib/function_regency.php";

if(isset($_GET['id_province'])){
    $province_id = $_GET['id_province'];
    $regency_id = $_GET['regency_id'];
    $regencies = search_regencies_by_province_id($db,$province_id);
}else{
    $regencies = viewall_regencies($db);
}

?>

<?php if($regencies) : ?>

    <option value="-" disabled selected>Silahkan pilih kabupaten anda</option>

    <?php 
    
    foreach($regencies as $regency): 
        $selected = (isset($_GET['id_province']) && $regency['id'] == $regency_id) ? 'selected' : '';
    
    ?>
        <option value="<?= $regency['id'] ?>" <?= $selected ?>><?= $regency['name'] ?></option>
    <?php endforeach ?>

<?php else: ?>

    <option value="-" disabled selected>Error menampilkan kabupaten</option>

<?php endif ?>

