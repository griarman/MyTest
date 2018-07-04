<?php

//echo '<pre>';
if($_POST) {
    require_once 'model.php';
    if(empty($_POST['id']) && empty($_POST['offset'])) {
        $product = get_product();
        $count = get_product_count();
    }
    elseif (empty($_POST['offset'])){
        $product = get_product($_POST['id']);
        $count = get_product_count($_POST['id']);
    }
    elseif (!$_POST['id']){
        $product = get_product(null,$_POST['offset']);
        $count = get_product_count();
    }
    else{
        $product = get_product($_POST['id'],$_POST['offset']);
        $count = get_product_count($_POST['id']);
    }
    foreach ($product as $key => $value) {
        if (!empty($img_new = get_image($value['id']))) {
            for ($i = 0; $i < count($img_new); $i++) {
                $img_new[$i] = $img_new[$i]['image'];
            }
            $product[$key]['image'] = $img_new;
        }
    }
    $product[] = $count;

    echo json_encode($product);
}

