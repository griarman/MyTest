<?php
/**
 * Created by PhpStorm.
 * User: grigo
 * Date: 12/07/2018
 * Time: 02:36
 */
session_start();
require_once 'order_model.php';
if($_POST['id']){
    $quantity = get_quantity($_POST['id'])[0]['qunatity'];
    echo $quantity;
}