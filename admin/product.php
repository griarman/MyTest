<?php 
	session_start();
	

	if(!isset($_GET['id']) || !isset($_SESSION['true'])){
		header('Location:index.php');
		die;
	}
	
	$_SESSION['id']=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="utf-8">
	<link rel="icon" href="../images/favicons/admin_favicon.png">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/product.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
	<form action="add_product.php" method="post" enctype="multipart/form-data" class="container-fluid">
		<div class="row">
			<div id="left" class="col-md-3">
				<div id="upper">
					<label for="name">Name</label>
					<input type="text" id="name" required="" name="name" placeholder="Enter The Name">
				</div>
				<div id="downer">
					<label for="price">Price</label>
					<input type="number" id="price" required="" name="price" step="0.01" placeholder="Enter The Price">
				</div>
			</div>
			<div id="middle"  class="col-md-6">
				<label for="description">Description</label>
				<textarea id="description" name="description"" required="" placeholder="Enter The Description"></textarea>
			</div>
			<div id="right" class="col-md-3">
				<label for="images" id="add_images">Add images</label>
				<a href="exit.php">Log Out</a>
				<input type="file" name="images[]" id="images" multiple="">
				<section><span id="outputMulti"></span></section>
			</div>
		</div>
		<button id="add">Add new Product</button>
	</form>

    <div class="row">

	<?php
        include 'model.php';
		if(isset($_SESSION['error'])){
			echo "<div id=error>{$_SESSION['error']}</div>";
			unset($_SESSION['error']);
		}
		echo '<div class="col-md-3">';
        $arr = get_cat();
        for($i = 0; $i < count($arr); $i++) {
            echo "<article id={$arr[$i]['id']}>{$arr[$i]['name']}</article>";
        }
        echo '</div>';

        echo '<div class=\'col-md-7 offset-md-2\'>';
		echo "<table>";
		echo "<tr><td>Name</td><td>Price</td><td>Description</td><td>Image</td></tr>";

		$arr = get_prod($_SESSION['id']);

		foreach ($arr as $key => $value) {
			$images = get_image($arr[$key]['id']);
			if(empty($images)){
				$images = '<span>No Image</span>';
			}
			else{
				$images = "<img src={$images}>";
			}
			echo "<tr id={$arr[$key]['id']}><td contenteditable=true class=prod_name>{$arr[$key]['name']}</td>
			<td contenteditable=true class=prod_price>{$arr[$key]['price']}</td>
			<td contenteditable=true class=prod_des>{$arr[$key]['description']}</td>
			<td>{$images}</td>
			<td><button class=prod_upd>Update</button></td><td><button class=prod_del>Delete</button></td></tr>";
		}
		echo "</table></div>";
	?>
    </div>
	
</body>
</html>