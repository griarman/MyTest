<?php

if(!empty($_POST)){
    require_once 'user_model.php';
    if($_POST['action'] === 'update'){
        $id = (int)$_POST['id'];
        if($id === 0){
            echo 'err';
            die;
        }
        $name = trim($_POST['name']);
        if($name){
            $reg = '~^[A-Za-z][a-z]{2,}$~';
            preg_match($reg,$name,$matches);
            if(empty($matches)){
                echo 'err0';
                die;
            }
        }
        $login = trim($_POST['login']);
        if($login){
            $reg = '~^[A-Za-z]\w{5,19}$~';
            preg_match($reg,$login,$matches);
            if(empty($matches)){
                echo 'err1';
                die;
            }
            if(login_exists($login,$id)){
                echo 'err1.2';
                die;
            }
        }
        $email = trim($_POST['email']);
        if($email){
            $reg = '~^[A-Za-z][A-Za-z0-9\.]{3,24}@[a-zA-Z]{2,5}\.[a-zA-Z]{2,5}$~';
            preg_match($reg,$email,$matches);
            if(empty($matches)){
                echo 'err2';
                die;
            }
            if(mail_exists($email,$id)){
                echo 'err2.2';
                die;
            }
        }
        change_user_details($id,ucfirst(strtolower($name)),strtolower($login),$email);
    }
    elseif ($_POST['action'] === 'delete'){
        $id = (int)$_POST['id'];
        if($id === 0){
            echo 'err';
            die;
        }
        if(!delete_user($id)){
            echo 'err1';
            die;
        }
    }

}