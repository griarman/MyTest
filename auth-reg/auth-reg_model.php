<?php
/**
 * Created by PhpStorm.
 * User: grigo
 * Date: 22/06/2018
 * Time: 03:09
 */

session_start();
@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
    die(mysqli_connect_error($conn));
}

function login_exists($login){
    global $conn;
    $query = "SELECT login FROM users WHERE login='$login'";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}
function mail_exists($mail){
    global $conn;
    $query = "SELECT mail FROM users WHERE mail='$mail'";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}
function _exists($login){
    global $conn;
    $query = "SELECT name FROM users WHERE login='$login'";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}
function registration($name,$login,$mail,$password){
    global $conn;
    $query = "INSERT INTO `users`(`name`, `login`, `password`, `mail`) VALUES ('$name','$login','$mail','$password')";
    $res = mysqli_query($conn,$query);
    return $res;
}