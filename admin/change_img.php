<?php

if(isset($_FILES['newImage'])){

    include 'model.php';
    $files = $_FILES['newImage'];
    $id = $_POST['id'];
    $src = $_POST['src'];
    $path = '../images/'.$id;
    $newname = date('YmdHis').mt_rand().'.jpg';
    change_img($src,$path.'/'.$newname);
    unlink($src);
    move_uploaded_file($files['tmp_name'],$path.'/'.$newname);
    echo $path.'/'.$newname;
}


