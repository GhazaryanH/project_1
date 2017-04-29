<?php require '../sql.php';
    session_start();
    $user_name = $_SESSION['login'];
    $img_id = $_SESSION['img_id'];
    $comm_ = $_POST['comm'];
    $comm = addslashes($comm_);
    mysql_query("insert into comments (user_name, img_id, img_com, num) VALUES ('$user_name', '$img_id', '$comm', 0)");
    echo 1;