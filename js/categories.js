;$(document).ready(function(){
   $('#leftAside section').click(function () {
       $('#leftAside section').removeClass('sectionChecked');
       $(this).attr('class','sectionChecked');
       let id = $(this).attr('id');
       $.ajax({
           url: 'pagination.php',
           method:'post',
           dataType:'json',
           data:{
               id:id
           },
           success:function (data) {
               product_show(data);
           }
       });
          /* .done(function(data){
               product_show(data);
           });*/
   });
    /*let pageChange = function () {
        let offset = $(this).html();
        let cat_id = $('.sectionChecked').attr('id');
         $.ajax({
             url:'pagination.php',
             method:'post',
             dataType: 'json',
             data:{
                 offset:offset,
                 cat_id:cat_id,
                 action: 'offset'
             }
         })
         .done(function(data){
             product_show(data);
         })
    };*/

});
