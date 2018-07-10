<?php
    require_once 'header.php';
?>

    <div class="container-fluid">
        <label for="cad">Name</label>
        <input type="text" class="homeInp" id="cad">
        <button id="add" class="homeAdd">Add</button>
        <?php
        include 'model.php';
        $arr = get_cat();
            echo "<table id='homeTable'>";
            for($i = 0; $i < count($arr); $i++) {
                echo "<tr id={$arr[$i]['id']}><td contenteditable=true class=name>".$arr[$i]['name']."<td><button class=upd>Update</button></td></td><td><button class=del>Delete</button></td><td><a href=product.php?id={$arr[$i]['id']}>Add product in {$arr[$i]['name']}</a></td></tr>";
            }
            echo '</table>';

        ?>
    </div>
<?php
    require_once 'footer.php';

