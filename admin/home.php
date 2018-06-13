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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" href="../images/favicons/admin_favicon.png">	
	<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <label for="cad">Name</label>
        <input type="text" id="cad">
        <button id="add">Add</button>
        <a href="exit.php" id="logOut">Log out</a>
        <?php
        include 'model.php';
        $arr = get_cat();
            echo "<table>";
            for($i = 0; $i < count($arr); $i++) {
                echo "<tr id={$arr[$i]['id']}><td contenteditable=true class=name>".$arr[$i]['name']."<td><button class=upd>Update</button></td></td><td><button class=del>Delete</button></td><td><a href=product.php?id={$arr[$i]['id']}>Add product in {$arr[$i]['name']}</a></td></tr>";
            }
            echo '</table>';

        ?>
    </div>
</body>
</html>


