<?php

require_once 'auth-reg_model.php';
if(isset($_POST)){
    $login = trim(addslashes($_POST['login']));
    $password = md5($_POST['password']);
    $user_id = get_user($login);
    if(empty(authorization($login,$password))){
        $_SESSION['le'] = true;
        header('Location:../login.php');
        die;
    }
    addCookie(tokenGenerator($login),get_date(),$user_id);
    header('Location:../index.php');
}