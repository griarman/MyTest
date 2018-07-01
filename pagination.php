<?php

//echo '<pre>';
if($_POST) {
    require_once 'model.php';
    if(!isset($_POST['id']) && !isset($_POST['offset'])) {
        $product = get_product();
        $count = get_product_count();
    }
    elseif (!isset($_POST['offset'])){
        $product = get_product($_POST['id']);
        $count = get_product_count($_POST['id']);
    }
    elseif (!(isset($_POST['id']))){
        $product = get_product(null,$_POST['offset']);
        $count = get_product_count();
    }
    else{
        $product = get_product($_POST['id'],$_POST['offset']);
        $count = get_product_count($_POST['id']);
    }
    foreach ($product as $key => $value) {
        if (!empty($img_new = get_image($value['id'], $value['cat_id']))) {
            for ($i = 0; $i < count($img_new); $i++) {
                $img_new[$i] = $img_new[$i]['image'];
            }
            $product[$key]['image'] = $img_new;
        }
    }
    $product[] = $count;
    echo json_encode($product);
}

