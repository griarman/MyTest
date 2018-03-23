<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
    <meta charset="utf-8">
</head>
<body>
	<form action="login.php" method="post">
		<label for="login">Login</label>		
		<input type="text" id='login' placeholder="Login" name="login" required>
		<label for="pass">Password</label>		
		<input type="password" id="pass" placeholder="Password" name="password" required autocomplete="off">
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