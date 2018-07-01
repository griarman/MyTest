$(document).ready(function () {
    $('.homePage').click(function () {
        let id = $(this).html();
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
                console.log(data);
            })
    });
});
