<?php
session_start();
if(!isset($_SESSION['true'])){
    header('location:index.php');
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php
        if($_SERVER['SCRIPT_NAME'] === '/mytest/admin/home.php'){
            echo '<title>Home</title>';
        }
        elseif ($_SERVER['SCRIPT_NAME'] === '/mytest/admin/product.php'){
            echo '<title>Products</title>';
            if(!isset($_GET['id']) || !isset($_SESSION['true'])){
                header('Location:index.php');
                die;
            }
            $_SESSION['id']=$_GET['id'];
            echo '<link rel="stylesheet" type="text/css" href="../css/product.css">';
        }
        elseif ($_SERVER['SCRIPT_NAME'] === '/mytest/admin/user.php'){
            echo '<title>Users</title>';
        }
        elseif ($_SERVER['SCRIPT_NAME'] === '/mytest/admin/orders.php'){
            echo '<title>Orders</title>';
        }
        ?>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="icon" href="../images/favicons/admin_favicon.png">
    <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/user.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin_header.css">
    <link rel="stylesheet" href="../css/user.css">

</head>
<body>
    <header>
        <ul id="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="product.php?id=1">Products</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="exit.php">Log Out</a></li>
        </ul>
    </header>
