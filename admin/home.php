<?php require '../sql.php';
session_start();
if($_SESSION['ad_in'] != true){
    header('location: index.php');
};
$new_obj = mysql_query("select count(*) from comments where num = 0");
$new_arr = mysql_fetch_array($new_obj);
$new_cnt = $new_arr[0];
$query_new = mysql_query("select * from comments where num = 0 order by id desc");
$query_viewed = mysql_query("select * from comments where num = 1");
$query_added = mysql_query("select * from comments where num = 2");
?>
<html>
    <head>
        <link rel="stylesheet" href="../libs/css/font-awesome.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/style_admin.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/admin_home.js"></script>
    </head>
    <body>
        <div class="all_menu container">
            <h1>Administration</h1>
            <div class="row">
                <div class="menu_left col-lg-2 text-right">
                    <div class="left_">
                        <h4 class="com_new"><?php echo $new_cnt; ?> new</h4>
                        <h4 class="com">Comments</h4>
                    </div>
                    <div class="left_">
                        <h4><a href="out.php" style="text-decoration: none;">Log out</a></h4>
                    </div>
                </div>
                <div class="container menu_right col-lg-10">
                    <?php
                        while($row = mysql_fetch_assoc($query_new)){
                            echo "<div class='com_cont row' style='background: #ff6666'><div class='user_name col-lg-2'>".$row['user_name']."</div><div class='comment_text col-lg-8'>".$row['img_com']."</div><div class='edit_com col-lg-2'><i data-index='".$row['id']."' class='add fa fa-check' aria-hidden='true'></i><i data-index='".$row['id']."' class='del fa fa-times' aria-hidden='true'></i></div></div>";
                        }
                        while($row = mysql_fetch_assoc($query_viewed)){
                            echo "<div class='com_cont row' style='background: silver'><div class='user_name col-lg-2'>".$row['user_name']."</div><div class='comment_text col-lg-8'>".$row['img_com']."</div><div class='edit_com col-lg-2'><i data-index='".$row['id']."' class='add fa fa-check' aria-hidden='true'></i><i data-index='".$row['id']."' class='del fa fa-times' aria-hidden='true'></i></div></div>";
                        }
                        while($row = mysql_fetch_assoc($query_added)){
                            echo "<div class='com_cont row' style='background: #97D87D'><div class='user_name col-lg-2'>".$row['user_name']."</div><div class='comment_text col-lg-8'>".$row['img_com']."</div><div class='edit_com col-lg-2'><i data-index='".$row['id']."' class='add fa fa-check' aria-hidden='true'></i><i data-index='".$row['id']."' class='del fa fa-times' aria-hidden='true'></i></div></div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>