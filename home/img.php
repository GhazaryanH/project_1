<?php require "../sql.php";
    session_start();
    $idd = $_POST['img_id'];
    $row = mysql_query("select * from images where id = '$idd'");
    $row_arr = mysql_fetch_array($row);
    echo $row_arr['des'];