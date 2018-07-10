<?php
require_once 'header.php';
require_once 'aside.php';
echo '<aside id="rightAside">';
if(!isset($_SESSION['card'])){
    echo '<div id="empty">There is no any products</div>';
    die;
}
?>
<script>
    $(document).ready(function () {
        (function(){
            $.ajax({
                url:'del_from_basket.php',
                method:'post',
                dataType:'json'
            })
                .done(function (data) {
                    del_from_basket(data);
                    total_amount();
                });
        })();
    });
</script>

<?php
echo "<div id=\"total\">
             
                <span>Total:</span><span></span>
      </div>";
echo "<div id='buy'>BUY</div>";

echo '</aside>';
require_once 'footer.php';
