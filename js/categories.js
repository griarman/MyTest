;$(document).ready(function(){
   $('#leftAside section').click(function () {
       $('#leftAside section').removeClass('sectionChecked');
       $(this).attr('class','sectionChecked');
       let id = $(this).attr('id');
       $.ajax({
           url: 'get_product.php',
           method:'post',
           dataType:'json',
           data:{
               id:id,
               action:'prod'
           }
       })
       .done(function (data) {
           let right = $('#rightAside');
           right.html('');let img;
           console.log(data);
           let arr = [],k = 0;
           arr[data[0].id] = [];
           for(let i = 0; i < data.length; i++){
               if(data[i].image === null){
                   arr[data[i].id] = [];
                   k = 0;
                   arr[data[i].id][k] = 'images/no-image.png';
               }
               else {
                   arr[data[i].id][k] = data[i].image.substr(3);
               }
               while(i < data.length - 1){
                   if(data[i].id === data[i + 1].id){
                       arr[data[i].id][++k] = data[i+  1].image.substr(3);
                       i++;
                   }
                   else{
                       k = 0;
                       break;
                   }
               }
           }
           // console.log(arr);
           for(let i = 0; i < data.length; i++){

                let tag = $(`<section id="${data[i].id}>" class="product">`);
                if(data[i].image !== null){
                    img = $(`<img src="">`);
                    if(arr[data[i].id].length > 1){
                        console.log(arr[data[i].id]);
                        img.data('photos',arr[data[i].id]);
                        img.attr('src',img.data('photos')[0]);
                        img.click(imageChange);
                    }
                    else{
                        let image = data[i].image.substr(3);
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
                while(i < data.length - 1){
                    if(data[i].id === data[i + 1].id){
                        i++;
                    }
                    else{
                        break;
                    }
                }
           }
       })
   });
/*   let imageChange = function () {
       let img = $(this);
       if(isset(img.attr('data'))){
           let src = img.data('photos').pop();
           img.data('photos').unshift(src);
           src = img.data('photos')[0];
           img.attr('src',src);
        }
   }*/
});

