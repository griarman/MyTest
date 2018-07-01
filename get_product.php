<?php
require_once 'model.php';

if(isset($_POST['id']) && $_POST['action'] === 'prod'){
    $arr = get_prod_img($_POST['id']);
    echo json_encode($arr);
}
if(isset($_POST['offset']) && $_POST['action'] === 'offset'){
    $arr = get_prod_img($_POST['cat_id'],$_POST['offset']);
    echo json_encode($arr);
}


