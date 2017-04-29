<?php require 'sql.php';
    session_start();
    $log = $_POST['log'];
    $pas = $_POST['pas'];
    $log_and_pas = mysql_query("select * from users where log = '$log' && pass = '$pas'");
    $log_and_pas_num = mysql_num_rows($log_and_pas);
    $log = mysql_query("select * from users where log = '$log'");
    $log_num = mysql_num_rows($log);
    if($log == "" || $pas == ""){
        echo 1;
    }else if($log_num != 1){
        echo 2;
    }else if($log_and_pas_num != 1){
        echo 3;
    }else{
        $_SESSION['log_in'] = true;
        $_SESSION['login'] = $_POST['log'];
        echo 4;
    }