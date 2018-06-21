<?php

require_once 'model.php';
if(isset($_POST['id'])){

    $id = $_POST['id'];
    if (isset($_SESSION['img'][$id]) && count($_SESSION['img'][$id]) > 1){
        echo json_encode($_SESSION['img'][$id]);
        $src = array_pop($_SESSION['img'][$id]);
        array_unshift($_SESSION['img'][$id],$src);
    }
    else{
        echo false;
    }
}
