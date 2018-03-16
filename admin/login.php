<?php

session_start();
$login = trim($_POST['login']);
$password = trim($_POST['password']);
include 'model.php';

if(check_admin($login,$password)){
	$_SESSION['true'] = 'true';
	header('Location:home.php');
	die;
}
$_SESSION['error'] = 'Error';
header('Location:index.php');



