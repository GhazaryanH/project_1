<?php require '../sql.php';
    session_start();
    error_reporting(0);
    if($_SESSION['log_in'] != true){
        header('location: ../');
    }
    $login = $_SESSION['login'];
    $query = mysql_query("select * from users where log = '$login'");
    $user = mysql_fetch_array($query);
    if(isset($_POST['logo_up'])){
        $logo_types = ['jpg', 'jpeg', 'png'];
        $logo = $_FILES["logo"]["name"];
        $logo_array = explode(".", $logo);
        $logo_type = end($logo_array);
        if($logo != "" && in_array($logo_type, $logo_types)){
            move_uploaded_file($_FILES["logo"]["tmp_name"], '../images/'.$login.'/logo.jpg');
            $query_logo = "update users set logo = 'logo' where log = '$login'";
            mysql_query($query_logo);
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="../libs/css/font-awesome.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style_home.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/js_home.js"></script>
    </head>
    <body style="background: url('../images/smertokril.jpg') fixed;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <img src="<?php
                        if($user['logo'] != "" || in_array($logo_type, $logo_types)) {
                            echo '../images/'.$login.'/logo.jpg';
                        }else{
                            if ($user['gen'] == 'male') {
                                echo "../images/boy.jpg";
                            } else {
                                echo "../images/girl.jpg";
                            }
                        }
                    ?>" width="100%" height="160px">
                </div>
                <div class="col-lg-10">
                    <h1 style="color: silver;"><?php echo $user['first'] ?> <?php echo $user['last'] ?></h1>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label class="btn btn-primary">
                            Choose img<input name="logo" type="file" style="display: none;">
                        </label>
                        <br>
                        <button name="logo_up" type="submit" class="btn btn-primary" style="margin-top: 10px; width: 100.3px;">Update</button>
                    </form>
                </div>
            </div>
            <nav class="navbar navbar-inverse" style="border-radius: 0 4px;">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="images.php">Images</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                    </ul>
                </div>
            </nav>
        </div>