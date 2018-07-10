<?php 

    require_once 'header.php';
?>

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
				<textarea id="description" name="description" required placeholder="Enter The Description"></textarea>
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

    <div class="container-fluid row">
	<?php
        include 'model.php';

		echo '<div class="col-md-3"><main>Categories</main>';

        $arr = get_cat();
        for($i = 0; $i < count($arr); $i++) {
            echo "<article id={$arr[$i]['id']}>{$arr[$i]['name']}</article>";
        }
        echo '<a href="home.php" id="href">Add Cadegories</a></div>';

        echo '<div class=\'col-md-7 offset-md-2\'>';
		echo "<table>";
		echo "<tr><td>Name</td><td>Price</td><td>Description</td><td>Image</td></tr>";

		$arr = get_prod($_SESSION['id']);

		foreach ($arr as $key => $value) {
		    $new_images = [];
			$images = get_image($value['id']);
            for($i = 0; $i < count($images); $i++){
                $new_images[] = $images[$i]['image'];
            }
			if(empty($new_images)){
				$images = '<span>No Image</span>';
			}
			else{
                $data = implode(' ',$new_images);
				$images = "
                            <form name='img' enctype=\"multipart/form-data\" method=\"post\" >
                                <label for='img-{$arr[$key]['id']}'>
                                    <img src={$new_images[0]} data-id='{$_SESSION['id']}' data-array='$data' class='newImg'>
                                </label>
                                <input type='file' hidden id='img-{$arr[$key]['id']}'>
                            </form>";
			}
			echo "<tr id={$arr[$key]['id']}><td contenteditable=true class=prod_name>{$arr[$key]['name']}</td>
			<td contenteditable=true class=prod_price>{$arr[$key]['price']} $</td>
			<td contenteditable=true class=prod_des>{$arr[$key]['description']}</td>";
            if(count($new_images) < 2){
                echo "<td>{$images}</td>";
            }
            else{
              echo "<td>
			            <button class='leftArrow'><</button>{$images}<button class='rightArrow'>></button>
	                </td>";
            }



			echo "<td><button class=prod_upd>Update</button></td><td><button class=prod_del>Delete</button></td></tr>";
		}
		echo "</table></div></div>";
        if(isset($_SESSION['error'])){
            echo "<div id=error class='center'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
    require_once 'footer.php';
	?>


<!--https://www.formget.com/ajax-image-upload-php/-->