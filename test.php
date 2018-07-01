<?php

require_once 'header.php';
require_once 'aside.php';
echo '<aside id="rightAside">';
$count = get_product_count();
setcookie('c1',$count,time()+24*3*60);


?>
<script>
    $(document).ready(function(){
        (function() {
            let id = 1;
            let offset = (id - 1) * 6;
            $.ajax({
                url:'pagination.php',
                method:'post',
                dataType:'json',
                data: {
                    id:id,
                    offset:offset
                }
            })
                .done(function (data){
                    let right = $('#rightAside');
                    right.html('');
                    for(let i = 0; i < data.length; i++){
                        let img;
                        let tag = $(`<section id="${data[i].id}>" class="product">`);
                        if(isset(data[i].image)){
                            img = $(`<img src="">`);
                            if(Object.keys(data[i].image).length > 1){
                                data[i].image = data[i].image.map(function (a) {
                                   return a.substr(3);
                                });
                                img.data('photos',data[i].image);
                                console.log(img.data('photos'));
                                img.attr('src',img.data('photos')[0]);
                                img.click(imageChange);
                            }
                            else{
                                let image = data[i].image[0].substr(3);
                                img = $(`<img src="${image}">`);
                            }
                        }
                        else{
                            img = $(`<img src='images/no-image.png'>`);
                        }
                        let name = $(`<div class="name"><span>Name: </span><span>${data[i].name}</span></div>`);
                        let price = $(`<div class="price"><span>Price: </span><span>${data[i].price}$</span></div>`);
                        let quantity = $(`<div class="quantity"><span>Quantity: </span><input type="number" min="0" value="0" max="100"></div>`);
                        let description = $(`<div class="description">${data[i].description}</div>`);
                        let add = $(`<div class="add">Add to Basket</div></section>`);
                        add.click(function () {
                            //code
                        });
                        tag.append(img);
                        tag.append(name);
                        tag.append(price);
                        tag.append(quantity);
                        tag.append(description);
                        tag.append(add);
                        right.append(tag);
                    }

                    let pages =  Math.ceil(data[6] / 6),pageNumber,pageDiv;
                    pageDiv = $('<div id=\'pages\'></div>');
                    for(let i = 1; i <= pages;i++){
                        pageNumber = $(`<span class='page'>${i}</span>`);
                        pageNumber.click(pageChange);
                        pageDiv.append(pageNumber);
                    }
                    right.append(pageDiv);
                });



        })();
    })
</script>
<?php
//    $pages = ceil($count/6);
//    echo "<div id='pages'>";
//    for($i = 1; $i <= $pages;$i ++){
//        echo "<span class='page'>$i</span>";
//    }
//
//    echo "</div>";
//
//?>

</aside>
<?php require_once 'footer.php';?>