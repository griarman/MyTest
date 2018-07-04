<?php
require_once 'model.php';

if($_POST){
    if(empty($_SESSION['user'])){
        echo 'err';
        die;
    }
    elseif($_SESSION['user'] !== checkCookie($_COOKIE['t1'])) {
        echo 'err2';
        die;
    }
    elseif(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description'])){
        echo 'er1';
        die;
    }
    elseif (!is_numeric($_POST['quantity'])){
        echo 'er3';
        die;
    }
    elseif($_POST['quantity'] < 1){
        echo 'er2';
        die;
    }

    elseif ($_POST['quantity'] > 100){
        echo 'er4';
        die;
    }
    $_POST['price'] = (int)trim($_POST['price'],'$');
    $_SESSION['card'][$_POST['id']] = [
                                        "id"=>$_POST['id'],
                                        "name"=>$_POST['name'],
                                        "price"=>$_POST['price'],
                                        "description"=>$_POST['description'],
                                        "quantity"=>$_POST['quantity']
                                    ];
    echo true;
}
