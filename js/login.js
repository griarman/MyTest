$(document).ready(function () {
   $('#submit').click(function (event) {
       let check =  $('#checky:checked').length > 0;
       if(!check){
           alert('You don\'t checked the checkbox');
           event.preventDefault();
       }
   });
});