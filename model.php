<?php

session_start();
@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
    die(mysqli_connect_error($conn));
}

function checkCookie($cookie){
    global $conn;
    $cookie = addslashes($cookie);
    date_default_timezone_set('Asia/Yerevan');
    $date = time();
    $query = "SELECT `name` FROM users,`token` WHERE `token`='$cookie' AND `expireDate`>'$date' AND userId=id";
    $res = mysqli_query($conn,$query);
    if (!$res) {
        die(mysqli_error($conn));
    }
    $arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $arr ? $arr[0]['name'] : null;
}
function get_cat(){
    global $conn;
    $query = "SELECT * FROM `categories`";
    $res = mysqli_query($conn,$query);
    if (!$res) {
        die(mysqli_error($conn));
    }
    $arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $arr;
}
function get_product($id = null,$offset = null){
    global $conn;
    if($id === null){
        $offset === null? $query = "SELECT * FROM `products` ORDER BY id DESC LIMIT 6" : $query = "SELECT * FROM `products` ORDER BY id DESC LIMIT 6 OFFSET $offset";
        $res = mysqli_query($conn,$query);
        if(!$res) die(mysqli_error($conn));
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    $offset === null? $query = "SELECT * FROM `products` WHERE cat_id=$id ORDER BY id DESC LIMIT 6" : $query = "SELECT * FROM `products` WHERE cat_id=$id ORDER BY id DESC LIMIT 6 OFFSET $offset";
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}
function get_product_count($id = null){
    global $conn;
    $id === null? $query = "SELECT * FROM products" : $query = "SELECT * FROM products WHERE cat_id = $id";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}

function get_image($id){
    global $conn;
    $query = "SELECT image FROM `images` WHERE prod_id=$id";
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function get_prod_img($id,$offset = 1){
    global $conn;
    if($offset === 1){
        $query = "SELECT `products`.`id`,`name`,`price`,`cat_id`,`description`,image FROM `products` LEFT JOIN images ON images.prod_id = products.id WHERE cat_id = $id ORDER BY `products`.`id` DESC";
    }
    else{
        $offset = ($offset - 1) * 6;
        $query = "SELECT `products`.`id`,`name`,`price`,`cat_id`,`description`,image FROM `products` LEFT JOIN images ON images.prod_id = products.id WHERE cat_id = $id ORDER BY `products`.`id` DESC LIMIT  6 OFFSET $offset";
    }
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

