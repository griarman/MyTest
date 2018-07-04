<?php

require_once 'model.php';
if(!isset($_POST['id']) && !empty($_SESSION['card'])){
    foreach ($_SESSION['card'] as $key => $value) {
        if (!empty($img_new = get_image($value['id']))) {
            for ($i = 0; $i < count($img_new); $i++) {
                $img_new[$i] = $img_new[$i]['image'];
            }
            $_SESSION['card'][$key]['image'] = $img_new;
        }
    }
    $arr = array_values($_SESSION['card']);
    echo json_encode($arr);
    die;
}
if(is_numeric($_POST['id']) && $_POST['id'] >= 0) {
    unset($_SESSION['card'][$_POST['id']]);
    foreach ($_SESSION['card'] as $key => $value) {
        if (!empty($img_new = get_image($value['id']))) {
            for ($i = 0; $i < count($img_new); $i++) {
                $img_new[$i] = $img_new[$i]['image'];
            }
            $_SESSION['card'][$key]['image'] = $img_new;
        }
    }
    $arr = array_values($_SESSION['card']);
    echo json_encode($arr);
    if(count($_SESSION['card']) === 0){
        unset($_SESSION['card']);
    }
}

