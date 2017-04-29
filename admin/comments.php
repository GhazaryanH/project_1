<?php require '../sql.php';
$query = mysql_query("update comments set num = 1 where num = 0");