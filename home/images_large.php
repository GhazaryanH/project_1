<?php require 'images.php';
$image_id = $_SESSION['img_id'];
$user_log = $_SESSION['login'];
$query_img = mysql_query("select * from images where id ='$image_id'");
$img_arr = mysql_fetch_array($query_img);
$likes_array = explode(".", $img_arr['likes_us']);
$dislikes_array = explode(".", $img_arr['dislikes_us']);
$users_query = mysql_query("select * from users where log = '$user_log'");
$users_arr = mysql_fetch_array($users_query);
$user_id = $users_arr['id'];
?>
<div class="large_img_cont">
    <div class="large_img_bg"></div>
    <div class="large_img_div">
        <div class="container">
            <a href="images.php"><i class="fa fa-times close_img" aria-hidden="true"></i></a>
            <img class="large_img" src="<?php echo $_SESSION['img_src'] ?>" style="width: 100%; height: 641.25px;">
            <div class="likes">
                    <i class="like <?php if (in_array($user_id, $likes_array)) {
                        echo 'likes_color';
                    } ?> fa fa-thumbs-up" data-index="<?php echo $image_id ?>" aria-hidden="true"></i>
                <span class="like_span"><?php echo count($likes_array) - 1; ?></span>
                <i class="dislike <?php if (in_array($user_id, $dislikes_array)) {
                    echo 'likes_color';
                } ?> fa fa-thumbs-down" data-index="<?php echo $image_id ?>" aria-hidden="true"></i>
                <span class="dislike_span"><?php echo count($dislikes_array) - 1; ?></span>
            </div>
            <p class="large_img_desc" style="color: orange; font-size: 20px;"><?php echo $_SESSION['img_head'] ?> - <?php echo $_SESSION['img_des'] ?></p>
            <?php
            for($i = 0; $i < $_SESSION['com_cnt']; $i++){
                $com_obj = mysql_query("select * from comments where img_id = '$image_id' and num = 2 limit ".$i.", 1");
                $com_arr = mysql_fetch_array($com_obj);
                echo "<div class='well' style='overflow: hidden;'><div class='col-lg-2 text-right'><p class='com_head'>".$com_arr['user_name']."</p></div><div class='col-lg-1'><img class='com_logo' src='../images/".$com_arr['user_name']."/logo.jpg'></div><div class='col-lg-9'><p>".$com_arr['img_com']."</p></div></div>";
            }
            ?>
            <div class="well" style="background: #FFFFFF; overflow: hidden;">
                <form method="post" action="">
                    <div class="col-lg-10">
                        <input class="comm form-control">
                    </div>
                    <div class="col-lg-2">
                        <input type="button" class="add_comm btn btn-success" style="width: 100%;" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
