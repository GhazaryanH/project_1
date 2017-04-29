<?php require '../sql.php';
    $id = $_GET['id'];
    mysql_query("update comments set num = 2 where id = '$id'");