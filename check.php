<?php require 'sql.php';
    session_start();
    $log = $_POST['log'];
    $pass = $_POST['pass'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $date = $_POST['date'];
    $gen = $_POST['gen'];
    $log_ = mysql_query("select * from users where log = '$log'");
    $log_row = mysql_num_rows($log_);
    if($log_row == 1){
    }else if($log == "" || $pass == "" || $first == "" || $last == "" || $date == "" || $gen == ""){
        echo 1;
    }else if(strlen($pass) < 8){
        echo 2;
    }else{
        echo 3;
        mkdir('images/'.$log);
        $conn = "insert into users (log, pass, first, last, date, gen, logo) values('$log', '$pass', '$first', '$last', '$date', '$gen', '')";
        mysql_query($conn);
    }