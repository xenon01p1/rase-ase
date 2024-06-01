<?php

require_once "../../../config/connection.php";
require_once "../../../lib/function_province.php";

$provinces = viewall_province($db);

?>

<?php if($provinces) : ?>

    <?php foreach($provinces as $province): ?>
        <option value="<?= $province['id'] ?>"><?= $province['name'] ?></option>
    <?php endforeach ?>

<?php else: ?>

    <option value="-" disabled selected>Error menampilkan provinsi</option>

<?php endif ?>