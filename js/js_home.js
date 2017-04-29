$(document).ready(function () {
    $('.imag').click(function () {
        src = $(this).find('img').attr('src');
        src_1 = src.split(".jpg");
        src_2 = src_1[0].split("image_");
        src_id = src_2[1];
        $.ajax({
            url: 'large.php',
            type: 'post',
            data: ({img_id: src_id})
        })
    });
    $('.add_comm').click(function () {
        comm = $('.comm').val();
        if(comm != ""){
            $.ajax({
                url: 'comment.php',
                type: 'post',
                data: ({comm: comm}),
                success: (function (data) {
                    if(data == 1){
                        $('.comm').val("");
                        alert('Administrator will see your comment');
                    }
                })
            })
        }
    });
    $('.like').click(function () {
        $(this).toggleClass('likes_color');
        $('.dislike').removeClass('likes_color');
        data = $(this).data();
        id = data.index;
        $.ajax({
            url: 'likes.php',
            type: 'post',
            data: ({id: id}),
            success: (function (data) {
                arr = data.split(',');
                $('.like_span').html(arr[0]);
                $('.dislike_span').html(arr[1]);
            })
        })
    });
    $('.dislike').click(function () {
        $(this).toggleClass('likes_color');
        $('.like').removeClass('likes_color');
        data = $(this).data();
        id = data.index;
        $.ajax({
            url: 'dislikes.php',
            type: 'post',
            data: ({id: id}),
            success: (function (data) {
                arr = data.split(',');
                $('.like_span').html(arr[0]);
                $('.dislike_span').html(arr[1]);
            })
        })
    });
});