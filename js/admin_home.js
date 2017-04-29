$(document).ready(function () {
    if($('.com_new').html() != '0 new'){
        $('.com_new').css({'display': 'inline-block'});
    }
    $('.com').click(function () {
        $('.menu_right').css({'display': 'block'});
        $.ajax({
            url: 'comments.php'
        })
    });
    $('.add').click(function () {
       data = $(this).data();
       id = data.index;
       $(this).parent().parent().css({'background': '#97D87D'});
       $.ajax({
           url: 'add.php',
           type: 'get',
           data: ({id: id})
       })
    });
    $('.del').click(function () {
        data = $(this).data();
        id = data.index;
        $(this).parent().parent().css({'display': 'none'});
        $.ajax({
            url: 'del.php',
            type: 'get',
            data: ({id: id})
        })
    });
});