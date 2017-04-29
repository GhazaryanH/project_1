<?php require "sql.php";
    session_start();
    error_reporting(0);
    if($_SESSION['log_in'] == true){
        header('location: home');
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="libs/css/font-awesome.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script src="js/js.js"></script>
    </head>
    <body style="background: skyblue;">
        <h2 class="text-center" style="font-size: 40px;">Registration</h2>
        <div class="container" style="width: 400px;">
            <div class="row">
                <div class="reg_alert alert alert-danger" style="margin-bottom: 0px; visibility: hidden;">Alert</div>
                <input class="login form-control" style="margin-top: 10px;" type="text" placeholder="Login">
                <input class="password form-control" style="margin-top: 10px; color: red;" type="password" placeholder="Password">
                <input class="first form-control pull-left" style="width: 49%; margin: 10px 0;" type="text" placeholder="Name">
                <input class="last form-control pull-right" style="width: 49%; margin: 10px 0;" type="text" placeholder="LastName">
                <select class="date form-control">
                    <option value="">Birth date</option>
                </select>
                <label class="female radio-inline" style="margin-top: 10px;"><input type="radio" name="gender">Female</label>
                <label class="male radio-inline" style="margin-top: 10px;"><input type="radio" name="gender">Male</label>
                <input class="reg btn btn-success pull-right" style="margin-top: 10px;" type="button" value="Confirm">
            </div>
            <h2 class="text-center" style="font-size: 40px; margin-top: 70px;">Sign Up</h2>
            <div class="row">
                <div class="log_alert alert alert-danger" style="margin-bottom: 0px; visibility: hidden;">Alert</div>
                <input class="log form-control pull-left" style="width: 49%; margin: 10px 0;" type="text" placeholder="Login">
                <input class="pas form-control pull-right" style="width: 49%; margin: 10px 0;" type="password" placeholder="Password">
                <input class="log_in btn btn-success pull-right" type="button" value="Log in">
            </div>
        </div>
    </body>
</html>