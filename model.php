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
    $query = "SELECT `userId` FROM `token` WHERE `token`='$cookie' AND `expireDate`>'$date'";
    $res = mysqli_query($conn,$query);
    if (!$res) {
        die(mysqli_error($conn));
    }
    $arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $arr ? $arr[0] : null;
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
function get_product($id = null){
    global $conn;
    if($id === null){
        $query = "SELECT * FROM `products` ORDER BY id DESC ";
        $res = mysqli_query($conn,$query);
        if(!$res) die(mysqli_error($conn));
        return mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    $query = "SELECT * FROM `products` WHERE cat_id=$id ORDER BY id DESC ";
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}
function get_image($id){
    global $conn;
    $query = "SELECT prod_id,image FROM `images` WHERE prod_id=$id LIMIT 1";
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}