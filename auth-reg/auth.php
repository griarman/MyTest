<?php

require_once 'auth-reg_model.php';
if(isset($_POST)){
    $login = trim(addslashes($_POST['login']));
    if($login){
        $reg = '~^[A-Za-z]\w{5,19}$~';
        preg_match($reg,$login,$matches);
        if(empty($matches)){
            $_SESSION['el1'] = true;
            header('Location:../login.php');
            die;
        }
    }
    if($password){
        $reg = '~^\w{5,64}$~';
        preg_match($reg,$password,$matches);
        if(empty($matches)){
            $_SESSION['el2'] = true;
            header('Location:../login.php');
            die;
        }
    }
    $password = md5($_POST['password']);
    $user_id = get_user($login);
    if(empty(authorization($login,$password))){
        $_SESSION['el3'] = true;
        header('Location:../login.php');
        die;
    }
    addCookie(tokenGenerator($login),get_date(),$user_id);
    header('Location:../index.php');
}