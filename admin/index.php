<?php require "../sql.php";
session_start();
error_reporting(0);
if($_SESSION['ad_in'] == true){
    header('location: home.php');
}
?>
<html>
<head>
    <link rel="stylesheet" href="../libs/css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/js_admin.js"></script>
</head>
<body style="background: #97D87D;">
<h2 class="text-center" style="font-size: 40px;">Administration</h2>
<div class="container" style="width: 400px;">
    <div class="row">
        <div class="conf_alert alert alert-danger" style="margin-bottom: 0; visibility: hidden;">Alert</div>
        <input class="name form-control pull-left" style="width: 49%; margin: 10px 0;" type="text" placeholder="Name">
        <input class="pass form-control pull-right" style="width: 49%; margin: 10px 0;" type="password" placeholder="Password">
        <input class="conf btn btn-primary pull-right" type="button" value="Confirm">
    </div>
</div>
</body>
</html>