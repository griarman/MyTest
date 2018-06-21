<?php
require_once 'header.php';
require_once 'aside.php';
echo '<aside id="rightAside">';
$arr = get_product();

foreach ($arr as $value):
    $img = get_image($value['id']);
    $i = 0;

    while(isset($img[$i])){
        $_SESSION['img'][$value['id']][$i] = $img[$i]['image'];
        $i++;

    }

//nkarner@ ste qcelu arag tarberaka petq
?>
    <section id="<?=$value['id']?>" class="product">
        <?php if(isset($_SESSION['img'][$value['id']])) : ?>
        <?php /*if(count($_SESSION['img'][$value['id']]) > 1) : */?>
        <img src="<?= substr($img[0]['image'],3) ?>">
        <?php /*endif;*/?>
        <?php else : ?>
        <img src="images/no-image.png">
        <?php endif;?>
        <div class="name"><span>Name: </span><span><?= $value['name'] ?></span></div>
        <div class="price"><span>Price: </span><span><?= $value['price'].'$' ?></span></div>
        <div class="quantity"><span>Quantity: </span><input type="number" min="0" value="0" max="100"></div>
        <div class="description"><?=$value['description'] ?></div>
        <div class="add">Add to Basket</div>
    </section>
<?php endforeach;?>
</aside>
<?php require_once 'footer.php';?>

<script src="js/change.js"></script>
