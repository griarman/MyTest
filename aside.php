
<?php

require_once 'model.php';

$arr = get_cat();
//print_r($arr);

?>
<main>
<aside id="leftAside">
    <?php
        foreach($arr as $element): ?>
        <section id="<?= $element['id']?>"><?= $element['name']?></section>
    <?php endforeach;?>
</aside>
