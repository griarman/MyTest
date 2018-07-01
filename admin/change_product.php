<?php

include 'model.php';
$action = trim($_POST['action']);
$id = trim($_POST['id']);
if($action === 'rem'){
	remove_img($id);
	remove_prod($id); 
}
if ($action === 'upd') {
	$name = trim($_POST['name']);
    $price = trim($_POST['price'],'$');
    $price = (int)trim($_POST['price']);
	if (!is_numeric($price)) {
		$price = "Isn't number"; 
	}
	$des = trim($_POST['des']);
	change_prod($id,$name,$price,$des);
}