<?php

require_once 'auth-reg_model.php';
if(isset($_POST)){

    $name = trim($_POST['name']) ;
    $login = addslashes(trim($_POST['login']));
    $mail = trim($_POST['email']);
    $password = trim($_POST['password']);
    $retype = trim($_POST['retype']);
    if(empty($name) || empty($login) || empty($mail) || empty($password) || empty($retype)){
        $_SESSION['e1'] = true;
        header('Location:../registration.php');
        die;
    }
    if($password !== $retype){
        $_SESSION['e2'] = true;
        header('Location:../registration.php');
        die;
    }
    if($name){
        $reg = '~^[A-Za-z][a-z]{2,}$~';
        preg_match($reg,$name,$matches);
        if(empty($matches)){
            $_SESSION['e3'] = true;
            header('Location:../registration.php');
            die;
        }
    }
    if($login){
        $reg = '~^[A-Za-z]\w{5,19}$~';
        preg_match($reg,$login,$matches);
        if(empty($matches)){
            $_SESSION['e4'] = true;
            header('Location:../registration.php');
            die;
        }
    }
    if($mail){
        $reg = '~^[A-Za-z][A-Za-z0-9\.]{3,24}@[a-zA-Z]{2,5}\.[a-zA-Z]{2,5}$~';
        preg_match($reg,$mail,$matches);
        if(empty($matches)){
            $_SESSION['e5'] = true;
            header('Location:../registration.php');
            die;
        }
    }
    if($password){
        $reg = '~^\w{5,64}$~';
        preg_match($reg,$password,$matches);
        if(empty($matches)){
            $_SESSION['e6'] = true;
            header('Location:../registration.php');
            die;
        }
    }
    if(login_exists($login)){
        $_SESSION['e7'] = true;
        header('Location:../registration.php');
        die;
    }
    elseif(mail_exists($mail)){
        $_SESSION['e8'] = true;
        header('Location:../registration.php');
        die;
    }
    elseif(!registration(ucfirst(strtolower($name)),strtolower($login),strtolower($mail),md5($password))){
        $_SESSION['e9'] = true;
        header('Location:../registration.php');
        die;
    }
    $user_id = get_user_id($login,$mail);
    addCookie(tokenGenerator($login),get_date(),$user_id);
    header('Location:../index.php');

}