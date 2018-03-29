<?php

session_start();
$arr = $_POST;


$name = trim($arr['name']);
$price = trim($arr['price']);
$description = trim($arr['description']);
$img = $_FILES['images'];
if(!is_numeric($price) || $price <= 0){
	$_SESSION['error'] = "Your price isn't numeric";
	header("Location:product.php?id={$_SESSION['id']}");
	die;
}
if(!$name || !$price || !$description){
    $_SESSION['error'] ='Please enter all empty fields';
    header("Location:product.php?id={$_SESSION['id']}");
	die;
}
include 'model.php';
if(!add_product($name,$price,$description,$img)){
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
	die;
}

header("Location:product.php?id={$_SESSION['id']}");