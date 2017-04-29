<?php require 'sql.php';
    session_start();
    $log = $_POST['log'];
    $log_ = mysql_query("select * from users where log = '$log'");
    $log_row = mysql_num_rows($log_);
    if($log_row == 1){
        echo 1;
    }