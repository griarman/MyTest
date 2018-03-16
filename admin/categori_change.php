<?php

$action = $_POST['action'];
include 'model.php';
if($action === 'add'){
	$name = trim($_POST['name']);
	if(!add_categoria($name)){
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
		die();
	}	
}
else if($action === 'rem'){
	$id = $_POST['id'];
	$path = "../images/$id";
	$arr = scandir($path);
	foreach ($arr as $value) {
		unlink($path."/$value");
	}
	rmdir($path);
	remove($id);
}
else if($action === 'upd'){
	$id = $_POST['id'];
	$name = $_POST['name'];
	update($id,$name);
}