<?php

if(!empty($_POST)){

    require_once 'buy_model.php';
    $arr = json_decode($_POST['str']);
 /*   echo '<pre>';
    print_r($arr);
    die;*/
    foreach ($arr as $key => $value){
        if($value->quantity < 0 && $value->quantity > 100 ){
            echo 'err';
            die;
        }
    }
    if(!($user_id = get_user_id($_COOKIE['t1']))){
        echo 'err1';
        die;
    }
    date_default_timezone_set('Asia/Yerevan');
    $date = date('Y-m-d');
    add_order_date($user_id,$date);
    $id = mysqli_insert_id($conn);
    foreach ($arr as $value){
        add_order($id,$value->id,$value->quantity);
    }

}