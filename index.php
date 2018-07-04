<?php
    require_once 'header.php';
    require_once 'aside.php';
    echo '<aside id="rightAside">';

?>
<script>
    $(document).ready(function() {
        (function () {
            $.ajax({
                url: 'pagination.php',
                method: 'post',
                dataType: 'json',
                data:{
                    a:'a'
                }
            })
            .done(function(data){
                product_show(data);
            })
        })();
    });
</script>

</aside>
<?php require_once 'footer.php';?>

<script src="js/change.js"></script>