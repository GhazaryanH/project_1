<?php require '../sql.php';
session_start();
$image_id = $_POST['img_id'];
$query_images = mysql_query("select * from images where id ='$image_id'");
$images_arr = mysql_fetch_array($query_images);
$_SESSION['img_src'] = '../images/photos/image_' . $image_id . '.jpg';
$_SESSION['img_head'] = $images_arr['head'];
$_SESSION['img_des'] = $images_arr['des'];
$_SESSION['img_id'] = $image_id;
$com_obj = mysql_query("select * from comments where img_id = '$image_id' and num = 2");
$com_cnt = mysql_num_rows($com_obj);
$_SESSION['com_cnt'] = $com_cnt;
?>
