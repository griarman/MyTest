<?php
require_once 'header.php';
require_once 'aside.php';
echo '<aside id="rightAside">';
$arr = get_product();
$_SESSION['page'] = 1;
$count = ($_SESSION['page'] - 1) * 6;
for ($j = $count; $j < count($arr) && $j < ($count + 6);$j++){
    $img = get_image($arr[$j]['id']);
    $i = 0;
    while(isset($img[$i])){
        $_SESSION['img'][$arr[$j]['id']][$i] = $img[$i]['image'];
        $i++;
    }
?>
    <section id="<?=$arr[$j]['id']?>" class="product">
        <?php if(isset($_SESSION['img'][$arr[$j]['id']])) : ?>
            <img src="<?= substr($img[0]['image'],3) ?>">
        <?php else : ?>
            <img src="images/no-image.png">
        <?php endif;?>
        <div class="name"><span>Name: </span><span><?= $arr[$j]['name'] ?></span></div>
        <div class="price"><span>Price: </span><span><?= $arr[$j]['price'].'$' ?></span></div>
        <div class="quantity"><span>Quantity: </span><input type="number" min="0" value="0" max="100"></div>
        <div class="description"><?=$arr[$j]['description'] ?></div>
        <div class="add">Add to Basket</div>
    </section>
<?php
}
    $pages = ceil(count($arr) / 6);
    echo '<div id=\'pages\'>';
    for ($k=1; $k <= $pages; $k++) { 
        echo "<span class='page'>$k</span>";
    }
    echo '</div>';
    ?>
</aside>
<?php require_once 'footer.php';?>

<script src="js/change.js"></script>
