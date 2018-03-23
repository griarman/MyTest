<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
	<form action="login.php" method="post">
		<div>Login</div>
        <div>
            <label for="login">Username <span>*</span></label><br>
		    <input type="text" id='login' placeholder="Enter The Username" name="login" required>
        </div>
		<div>
            <label for="pass">Password <span>*</span></label><br>
		    <input type="password" id="pass" placeholder="Enter The Password" name="password" required autocomplete="off">
        </div>
        <button>Log in</button>
	</form>
	<?php 

		session_start();
		if (isset($_SESSION['error'])) {
			echo '<div>Wrong login or password</div>';
			unset($_SESSION['error']);
		}
	?>

</body>
</html>