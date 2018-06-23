$(document).ready(function(){
	$('#add').click(function(){
		let categoria = $('#cad').val();
		$.ajax({
			url: '../admin/categori_change.php',
			type: 'POST',
			data:{
				name: categoria,
				action: 'add'
			},
			success:() => {
				location.reload();
			}
		})
	});
	$('.del').click(function(){
		let tr = $(this).closest('tr');
		let id = tr.attr('id');
		$(this).closest('tr').remove();
		$.ajax({
			url: '../admin/categori_change.php',
			type: 'POST',
			data:{
				id: id,
				action: 'rem'
			}
		})
	});
	$('.upd').click(function(){
		let tr = $(this).closest('tr');
		let id = tr.attr('id');
		let name = tr.find('.name').html();
		$.ajax({
			url: '../admin/categori_change.php',
			type: 'POST',
			data:{
				id: id,
				name:name,
				action: 'upd'
			},
			success:() => {
				tr.find('a').html('Add product in ' + name)
			}		
		})
	});
	$('.prod_del').click(function(){
		let id = $(this).closest('tr').attr('id');
		$(this).closest('tr').remove();
		$.ajax({
			url: 'change_product.php',
			type: 'POST',
			data:{
				id: id,
				action: 'rem' 
			}
		})
	});
	$('.prod_upd').click(function(){
		let tr = $(this).closest('tr');
		let id = tr.attr('id');
		let name = tr.find('.prod_name').text();
		let price = tr.find('.prod_price').text();
		let des = tr.find('.prod_des').text();
		$.ajax({
			url: 'change_product.php',
			type: 'POST',
			data:{
				id: id,
				name:name,
				price:price,
				des:des,
				action: 'upd' 
			}
		})
	});
	$('.leftArrow').click(function () {
		let img = $(this).closest('tr').find('img');
		let data = img.attr('data-array').split(' ');
		let src = img.attr('src');
		for(let i = 0; i < data.length;i++){
			if(src === data[i]){
				if(i !== 0) {
                    img.attr('src', data[i - 1]);
                }
			}
		}
    });
    $('.rightArrow').click(function () {
        let img = $(this).closest('tr').find('img');
        let data = img.attr('data-array').split(' ');
        let src = img.attr('src');
        for(let i = 0; i < data.length;i++){
            if(src === data[i] ){
            	if(i !== data.length - 1){
                	img.attr('src', data[i + 1]);
            	}
            }
        }
    });
	$('input').filter('[hidden]').on('change',function(evt){
        if(!this.value) {
        	return;
		}
		let files = evt.target.files;
        let form = new FormData();
        let newImg = $(this.previousSibling.firstChild);
        let id = newImg.attr('data-id');
        let src = newImg.attr('src');
        form.append('newImage', files[0]);
        form.append('id', id);
        form.append('src', src);
        $.ajax({
            url: "change_img.php",
            type: "POST",
            data: form,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
			success:function (newSrc) {
                let data = newImg.attr('src',newSrc).attr('data-array');
                data = data.replace(new RegExp(src), newSrc);
                newImg.attr('data-array', data);
            }
        });
	});
    let article = $('article');
    article.click(function(){
		let id = $(this).attr('id');
		let href = location.search.split('=');
		href = href[0] + '=' + id;
		location.search = href;
	});
	for(let i = 0; i < article.length;i++){
		let href = location.search.split('=');
		href = href[1];
		if(href === article.eq(i).attr('id')){
            article.eq(i).css({
				'background-color':'#F39814',
				color: '#fff'
            });
		}
	}
    $('#images').on('change',function (evt) {
		let files = evt.target.files;
		$('#outputMulti').html('');
		for (let i = 0, f; f = files[i]; i++) {
			if (!f.type.match('image.*')) {
			  alert("Только изображения....");
			  return;
			}
			let reader = new FileReader();
			reader.onload = (function(theFile) {
			  return function(e) {
				let span = $('<span></span>');
				span.html(['<img class="img-thumbnail" src="', e.target.result,
								  '" title="', encodeURI(theFile.name), '">'].join(''));
				$('#outputMulti').before(span);
			  };
			})(f);
			reader.readAsDataURL(f);
		}
	});
});