<?php

require_once "../../config/connection.php";
require_once "../../lib/function_province.php";

$provinces = viewall_province($db);
$province_id = (isset($_GET['province_id'])) ? $_GET['province_id'] : '';

?>

<?php if($provinces) : ?>

    <option value="-" disabled selected>Choose your province</option>

    <?php 
    
    foreach($provinces as $province): 
        $selected = ($province_id && ($province['id'] == $province_id)) ? 'selected' : '';
    ?>
        <option value="<?= $province['id'] ?>" <?= $selected ?>><?= $province['name'] ?></option>
    <?php endforeach ?>

<?php else: ?>

    <option value="-" disabled selected>Error menampilkan provinsi</option>

<?php endif ?>