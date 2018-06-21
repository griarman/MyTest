window.array_key_exists = function  (key, search) {
    if (!search || (search.constructor !== Array && search.constructor !== Object)) {
        return false;
    }
    return key in search;
};
window.isset = function (argument) {
  return (typeof argument === "undefined");
};
window.imageChange = function () {
    let img = $(this);
    if(isset(img.attr('data'))){
        let src = img.data('photos').pop();
        img.data('photos').unshift(src);
        src = img.data('photos')[0];
        img.attr('src',src);
        console.log(img.data('photos'));
    }
};
