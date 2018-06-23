<?php

require_once 'header.php';
require_once 'aside.php';
?>

<aside id="rightAside">
    <div class="container">

        <form id="signup" action="auth-reg/reg.php" method="post">
            <div class="header">
                <h3>Registration</h3>
                <p>Fill the fields for registration</p>
            </div>
            <div class="sep"></div>
            <div class="inputs">
                <input type="text" placeholder="Name*" autofocus name="name" required>
                <input type="text" placeholder="Login*" autofocus name="login" required>
                <input type="email" placeholder="E-mail*" name="email" required>
                <input type="password" placeholder="Password*" name="password" required>
                <input type="password" placeholder="Retype Password*" name="retype" required>
                <button id="submit" >REGISTRATION</button>
            </div>
        </form>
        <?php if(isset($_SESSION['e1'])) :?>
            <div class="error">Please enter all the fields</div>
        <?php unset($_SESSION['e1']) ?>
        <?php elseif (isset($_SESSION['e2'])): ?>
            <div class="error">Passwords do not match</div>
            <?php unset($_SESSION['e2']) ?>
        <?php elseif (isset($_SESSION['e3'])): ?>
            <div class="error">Name must have minimum 3 symbols</div>
            <div>Allowed only letters[a-z]</div>
            <?php unset($_SESSION['e3']) ?>
        <?php elseif (isset($_SESSION['e4'])): ?>
            <div class="error">Login must have minimum 6 symbols</div>
            <div >Allowed only letters and digits</div>
            <?php unset($_SESSION['e4']) ?>
        <?php elseif (isset($_SESSION['e5'])): ?>
            <div class="error">Email like that can't be</div>
            <?php unset($_SESSION['e5']) ?>
        <?php elseif (isset($_SESSION['e6'])): ?>
            <div class="error">Password can have minimum 6 and maximum 64 symbols </div>
            <div >Allowed only letters and digits</div>
            <?php unset($_SESSION['e6']) ?>
        <?php elseif (isset($_SESSION['e7'])): ?>
            <div class="error">Login exists, please try other one</div>
            <?php unset($_SESSION['e7']) ?>
        <?php elseif (isset($_SESSION['e8'])): ?>
            <div class="error">This e-mail already registered</div>
            <?php unset($_SESSION['e8']) ?>
        <?php elseif (isset($_SESSION['e9'])): ?>
            <div class="error">Sorry but registration haven't done, please try ones more</div>
            <?php unset($_SESSION['e9']) ?>
        <?php endif; ?>

    </div>
</aside>
<?php require_once 'footer.php' ?>

