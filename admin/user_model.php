<?php

@$conn = mysqli_connect('localhost','root','','shops');
if(!$conn){
    die(mysqli_connect_error($conn));
}

function get_all_users(){
    global $conn;
    $query = "SELECT id,name,login,mail FROM users";
    $res = mysqli_query($conn,$query);
    return mysqli_fetch_all($res,MYSQLI_ASSOC)?: null;
}
function login_exists($login,$id){
    global $conn;
    $query = "SELECT login FROM users WHERE login='$login' AND id != $id";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}
function change_user_details($id,$name,$login,$email){
    global $conn;
    $query = "UPDATE `users` SET `name`='$name',`login`='$login',`mail`='$email' WHERE id=$id";
    return mysqli_query($conn,$query);
}
function mail_exists($mail,$id){
    global $conn;
    $query = "SELECT mail FROM users WHERE mail='$mail' AND id != $id";
    $res = mysqli_query($conn,$query);
    return mysqli_num_rows($res);
}
function delete_user($id){
    global $conn;
    $query = "DELETE FROM `users` WHERE id = $id";
    return mysqli_query($conn,$query);
}