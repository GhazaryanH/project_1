    $(document).ready(function () {
        for(i = 2016; i >= 1916; i--){
            document.getElementsByClassName('date')[0].innerHTML += "<option value='" + i + "'>" + i + "</option>";
        }
        gender = "";
        $('.male').click(function () {
           gender = "male";
        });
        $('.female').click(function () {
           gender = "female";
        });
        $('.password').keyup(function () {
            if($('.password').val().length < 8){
                $('.password').css({'color': 'red'});
            }else{
                $('.password').css({'color': 'black'});
            }
        });
        $('.login').keyup(function () {
            login = $('.login').val();
            $.ajax({
                url: 'available.php',
                type: 'post',
                data:({log: login}),
                success: function (data) {
                    if(data == 1){
                        $('.reg_alert').html('Mail is not available');
                        $('.reg_alert').css({'visibility': 'visible'});
                        $('.reg_alert').removeClass('alert-success');
                        $('.reg_alert').addClass('alert-danger');
                    }else{
                        $('.reg_alert').css({'visibility': 'hidden'});
                    }
                }
            })
        });
        $('.reg').click(function () {
            login = $('.login').val();
            password = $('.password').val();
            first = $('.first').val();
            last = $('.last').val();
            date = $('.date').val();
            $.ajax({
                url: 'check.php',
                type: 'post',
                data:({log: login, pass: password, first: first, last: last, date: date, gen: gender}),
                success: function (data) {
                    $('.log_alert').css({'visibility': 'hidden'});
                    if(data == 1){
                        $('.reg_alert').html('Fill all fields');
                        $('.reg_alert').css({'visibility': 'visible'});
                        $('.reg_alert').removeClass('alert-success');
                        $('.reg_alert').addClass('alert-danger');
                    }else if(data == 2){
                        $('.reg_alert').html('The password should be at least 8 characters');
                        $('.reg_alert').css({'visibility': 'visible'});
                        $('.reg_alert').removeClass('alert-success');
                        $('.reg_alert').addClass('alert-danger');
                    }else if(data == 3){
                        $('.reg_alert').html('You have successfully registered');
                        $('.reg_alert').css({'visibility': 'visible'});
                        $('.reg_alert').removeClass('alert-danger');
                        $('.reg_alert').addClass('alert-success');
                        $('.login').val(""); $('.password').val(""); $('.first').val(""); $('.last').val(""); $('.date').val("");
                    }
                }
            })
        });
        $('.log_in').click(function () {
            log = $('.log').val();
            pas = $('.pas').val();
            $.ajax({
                url: 'check_login.php',
                type: 'post',
                data: ({log: log, pas: pas}),
                success: function (data) {
                    $('.reg_alert').css({'visibility': 'hidden'});
                    if(data == 1){
                        $('.log_alert').html('Fill all fields');
                        $('.log_alert').css({'visibility': 'visible'});
                    }
                    if(data == 2){
                        $('.log_alert').html('Mail does not exist');
                        $('.log_alert').css({'visibility': 'visible'});
                    }
                    if(data == 3){
                        $('.log_alert').html('The password you’ve entered is incorrect.');
                        $('.log_alert').css({'visibility': 'visible'});
                    }
                    if(data == 4){
                        window.location.assign("home");
                    }
                }
            })
        })
    });