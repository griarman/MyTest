<?php
require_once 'model.php';

if(isset($_POST['id']) && $_POST['action'] === 'prod'){
    $arr = get_prod_img($_POST['id']);
    echo json_encode($arr);
}
