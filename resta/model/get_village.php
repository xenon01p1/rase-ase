<?php

require_once "../../config/connection.php";
require_once "../../lib/function_village.php";

if(isset($_GET['district_id'])){
    $district_id = $_GET['district_id'];
    $village_id = $_GET['village_id'];
    $villages = search_villages_by_district_id($db,$district_id);

}else{
    $villages = viewall_village($db);
}


?>

<?php if($villages) : ?>

    <option value="-" disabled selected>Choose your village</option>

    <?php 
    
    foreach($villages as $village): 
        $selected = (isset($_GET['edit']) && $village['id'] == $village_id) ? 'selected' : '';
    
    ?>
        <option value="<?= $village['id'] ?>" <?= $selected ?>><?= $village['name'] ?></option>
    <?php endforeach ?>

<?php else: ?>

    <option value="-" disabled selected>Error menampilkan kecamatan</option>

<?php endif ?>