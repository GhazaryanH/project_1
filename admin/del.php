<?php require '../sql.php';
    $id = $_GET['id'];
    mysql_query("delete from comments where id ='$id'");