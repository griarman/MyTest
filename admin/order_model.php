<?php

@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
    die(mysqli_connect_error($conn));
}

function get_orders(){
    global $conn;
    $query = "SELECT * FROM orders";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_all($res,MYSQLI_ASSOC)?: null;
}

function get_order_details($order_id){
    global $conn;
    $query = "SELECT * FROM order_details WHERE orderId=$order_id";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_all($res,MYSQLI_ASSOC)?: null;
}
function get_product_name($id){
    global $conn;
    $query = "SELECT name FROM products WHERE id = $id";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_row($res);
}
function get_quantity($id,$order_id){
    global $conn;
    $query = "SELECT qunatity FROM order_details WHERE productId=$id AND orderId = $order_id";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}