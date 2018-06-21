<?php

require_once 'header.php';
require_once 'aside.php';
?>

<aside id="rightAside">
    <div class="container">

        <form id="signup" action="auth-reg/reg.php">
            <div class="header">
                <h3>Registration</h3>
                <p>Fill the fields for registration</p>
            </div>
            <div class="sep"></div>
            <div class="inputs">
                <input type="text" placeholder="Name*" autofocus name="name">
                <input type="text" placeholder="Login*" autofocus name="login">
                <input type="email" placeholder="E-mail*" name="email">
                <input type="password" placeholder="Password*" name="password">
                <input type="password" placeholder="Retype Password*" name="retype">
                <a id="submit" href="#">REGISTRATION</a>
            </div>
        </form>
    </div>
</aside>
<?php require_once 'footer.php' ?>