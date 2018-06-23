<?php

require_once 'header.php';
require_once 'aside.php';
?>
<aside id="rightAside">
    <div class="container">
        <form id="signup" action="auth-reg/auth.php" method="post">
            <div class="header">
                <h3>Sign Up</h3>
                <p>You want to fill out this form</p>
            </div>
            <div class="sep"></div>
            <div class="inputs">
                <input type="text" placeholder="Login or E-mail" autofocus name="login" required>
                <input type="password" placeholder="Password"  name="password" required>
                <div class="checkboxy">
                    <label class="terms">
                        <input name="cecky" id="checky" value="1" type="checkbox" >I accept the terms of use
                    </label>

                </div>
                <button id="submit">SIGN UP FOR INVITE NOW</button>
            </div>
        </form>
    </div>
​</aside>
<?php require_once 'footer.php';