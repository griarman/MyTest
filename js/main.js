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
			}, 
		})
	})
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
			},
			success:() => {
			}
			
		})
	})
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
	})
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
		
	})
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

	})
	function handleFileSelectMulti(evt) {
		let files = evt.target.files;
		$('#outputMulti').html('');
		for (let i = 0, f; f = files[i]; i++) {

		if (!f.type.match('image.*')) {
		  alert("Только изображения....");
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
	}$('#images').on('change', handleFileSelectMulti);

})
