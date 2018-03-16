<?php

$name = $_POST['name'];
include 'model.php';

if(!add_categoria($name)){
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
}