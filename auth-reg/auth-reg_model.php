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
function registration($name,$login,$mail,$password){
    global $conn;
    $query = "INSERT INTO `users`(`name`, `login`, `password`, `mail`) VALUES ('$name','$login','$password','$mail')";
    $res = mysqli_query($conn,$query);
    return $res;
}
 function get_date(){
    date_default_timezone_set('Asia/Yerevan');
    $date =  time()+24*3600*7;
    return $date;
}
function tokenGenerator($str){
    $str = md5(uniqid($str));
    return $str;
}
function get_user_id($login,$mail){
    global $conn;
    $query= "SELECT id FROM users WHERE login='$login' AND mail='$mail'";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_row($res)[0];
}
function get_user($login){
    global $conn;
    $query= "SELECT id FROM users WHERE mail='$login' OR login='$login'";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_row($res)[0];
}
function addCookie($token,$date,$user_id){
    global $conn;
    $query= "INSERT INTO `token`(`token`, `expireDate`,`userId`) VALUES ('$token','$date','$user_id')";
    $res = mysqli_query($conn,$query);
    setcookie('t1',$token,time()+24*7*3600,'/');
    return $res;
}
function deleteCookie($token){
    global $conn;
    $query= "DELETE FROM `token` WHERE `token`='$token'";
    setcookie('t1','',1);
    return mysqli_query($conn,$query);
}
function authorization($login,$password){
    global $conn;
    $query= "SELECT id,name,login,mail FROM users WHERE (login='$login' OR mail='$login') AND password='$password'";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_row($res);
}
