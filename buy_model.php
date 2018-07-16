<?php

session_start();
@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
    die(mysqli_connect_error($conn));
}

function get_user_id($token){
    global $conn;
    $query = "SELECT userId FROM token WHERE token='$token'";
    $res = mysqli_query($conn,$query);
    if(!$res) die(mysqli_error($conn));
    $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $result? $result[0]['userId'] : null;

}
function add_order_date($user_id,$date){
    global $conn;
    $query = "INSERT INTO `orders`(`userid`, `order_date`) VALUES ($user_id,'$date')";
    return mysqli_query($conn,$query);
}
function add_order($id,$prod_id,$quantity){
    global $conn;
    $query = "INSERT INTO `order_details`(`orderId`, `productId`, `qunatity`) VALUES ($id,$prod_id,$quantity)";
    return mysqli_query($conn,$query);
}