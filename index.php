<?php
require_once 'header.php';
require_once 'aside.php';
echo '<aside id="rightAside">';
$arr = get_product();

/*echo '<pre>';
print_r($arr);
echo '</pre>';*/


foreach ($arr as $key => $value):
    $img = get_image($value['id']);

?>
    <section id="<?=$value['id']?>" class="product">
        <?php if(isset($img[0]['image'])) : ?>

            <img src="<?= substr($img[0]['image'],3) ?>">
        <?php else : ?>
            <img src="images/no-image.png">

         <?php endif;?>
        <div class="name"><span>Name: </span><span><?= $value['name'] ?></span></div>
        <div class="price"><span>Price: </span><span><?= $value['price'].'$' ?></span></div>
        <div class="quantity"><span>Quantity: </span><input type="number" min="0" value="0" max="100"></div>
        <div class="description"><?=$value['description'] ?></div>
    </section>
<?php endforeach;?>
</aside>
<?php require_once 'footer.php';?>

