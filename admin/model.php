<?php
@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
	die(mysqli_connect_error($conn));
}


function check_admin($login,$password){
	global $conn;
	$password = md5($password);
	$query = "SELECT * FROM admin WHERE login='$login' AND password='$password'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	} 
	return mysqli_num_rows($res);
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
function add_categoria($name){
	if($name == ''){
		return false;
	}
	global $conn;
	$query = "INSERT INTO `categories`(`name`) VALUES ('$name')";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	} 
	return $res;
}
function remove($id){
	global $conn;
	$query = "DELETE FROM `categories` WHERE id='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}	
}
function update($id,$name){
	global $conn;
	$query = "UPDATE `categories` SET `name`='$name' WHERE id='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}	
}

function add_product($name,$price,$description,$img){
	global $conn;
	$cat_id = $_SESSION['id'];
	$query = "INSERT INTO `products`(`name`, `price`, `cat_id`, `description`) VALUES ('$name','$price','$cat_id','$description')";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
	$prod_id = mysqli_insert_id($conn); 

	@mkdir("../images/$cat_id");
	$path = "../images/$cat_id/";
	if(empty($img['name'][0])){
		return;
	}
	for ($i = 0; $i < count($img['name']); $i++) {
		$newname = date('YmdHis').mt_rand().'.jpg';
		move_uploaded_file($img['tmp_name'][$i],$path.$newname);

		$query = "INSERT INTO `images`(`prod_id`, `image`) VALUES ('$prod_id','{$path}{$newname}')";
		$res = mysqli_query($conn,$query);
		if (!$res) {
			die(mysqli_error($conn));
		}
	}
	return true;
}

function get_prod($cad_id){
	global $conn;
	$query = "SELECT id,name,price,description FROM `products` WHERE cat_id='$cad_id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
	$arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
	return $arr;
}
function get_image($prod_id){
	global $conn;
	$query = "SELECT image FROM `images` WHERE prod_id='$prod_id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
	$arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
	return $arr;
}

function remove_img($id){
	global $conn;
	$query = "SELECT `image` FROM `images` WHERE `prod_id`='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
	$arr = mysqli_fetch_all($res, 1);
	print_r($arr);

	for($i = 0;$i < count($arr);$i++){
		unlink($arr[$i]['image']);
	}
	$query = "DELETE FROM `images` WHERE `prod_id`='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
}
function remove_prod($id){
	global $conn;
	$query = "DELETE FROM `products` WHERE id='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}
}
function change_prod($id,$name,$price,$des){
	global $conn;
	$query = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$des' WHERE id='$id'";
	$res = mysqli_query($conn,$query);
	if (!$res) {
		die(mysqli_error($conn));
	}

}