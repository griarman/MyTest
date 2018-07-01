window.array_key_exists = function  (key, search) {
    if (!search || (search.constructor !== Array && search.constructor !== Object)) {
        return false;
    }
    return key in search;
};
window.isset = function (argument) {
  return (typeof argument !== 'undefined');
};
window.imageChange = function () {
    let img = $(this);
    if(!isset(img.attr('data'))){
        let src = img.data('photos').pop();
        img.data('photos').unshift(src);
        src = img.data('photos')[0];
        img.attr('src',src);
        // console.log(img.data('photos'));
    }
};
window.product_show = function (data){
    let right = $('#rightAside');
    right.html('');
    for(let i = 0; i < data.length - 1; i++){
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

    let pages =  Math.ceil(data[data.length - 1] / 6),pageNumber,pageDiv;
    pageDiv = $('<div id=\'pages\'></div>');
    for(let i = 1; i <= pages;i++){
        pageNumber = $(`<span class='page'>${i}</span>`);
        pageNumber.click(pageChange);
        pageDiv.append(pageNumber);
    }
    right.append(pageDiv);
};


window.pageChange = function () {
    let offset = $(this).html();
    let cat_id = $('.sectionChecked').attr('id');
    if(!cat_id){
        cat_id = null;
    }
    offset = (offset - 1) * 6;
    $.ajax({
        url:'pagination.php',
        method:'post',
        dataType: 'json',
        data:{
            offset:offset,
            id: cat_id
        }
    })
        .done(function(data){
            product_show(data);
        })
};
