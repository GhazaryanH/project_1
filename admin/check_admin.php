<?php require '../sql.php';
session_start();
$name = $_POST['name'];
$pass = $_POST['pass'];
$query = mysql_query("select * from admin where adm = '$name' && pas = '$pass'");
$num = mysql_num_rows($query);
$name_query = mysql_query("select * from admin where adm = '$name'");
$name_num = mysql_num_rows($name_query);
if($name == "" || $pass == ""){
    echo 1;
}else if($name_num != 1){
    echo 2;
}else if($num != 1){
    echo 3;
}else{
    $_SESSION['ad_in'] = true;
    echo 4;
}