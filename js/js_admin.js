$(document).ready(function () {
    $('.conf').click(function () {
        name = $('.name').val();
        pass = $('.pass').val();
        $.ajax({
            url: 'check_admin.php',
            type: 'post',
            data: ({name: name, pass: pass}),
            success: function (data) {
                if(data == 1){
                    $('.conf_alert').html('Fill all fields');
                    $('.conf_alert').css({'visibility': 'visible'});
                }
                if(data == 2){
                    $('.conf_alert').html('Name wrong');
                    $('.conf_alert').css({'visibility': 'visible'});
                }
                if(data == 3){
                    $('.conf_alert').html('Password wrong');
                    $('.conf_alert').css({'visibility': 'visible'});
                }
                if(data == 4){
                    window.location.assign("home.php");
                }
            }
        })
    }) 
});