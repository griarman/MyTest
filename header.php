<?php
    require_once 'model.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online shop</title>
    <meta charset="utf-8">
    <link rel="icon" href="images/favicons/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/leftAside.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav"  id="ulNav">
                <li class="nav-item active ">
                    <a class="nav-link" href="cart.php">Basket <span class="sr-only">(current)</span></a>
                </li>
                <?php
                $str =<<<HERO
                <li class="nav-item" id="login">
                    <a class="nav-link" href="login.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="registration.php">Registration</a>
                </li>
HERO;
                if(isset($_COOKIE['tkn'])){
                    if(checkCookie($_COOKIE['tkn'])) {
                        $user = checkCookie($_COOKIE['tkn']);
                        $str =<<<HERO
                        <li class="nav-item">
                            <a class="nav-link" href="#">$user</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#" id="logOut">Log Out</a>
                        </li>
HERO;
                    }
                }
                echo $str;
                ?>
            </ul>
        </div>
    </nav>
