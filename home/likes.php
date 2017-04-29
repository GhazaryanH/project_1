<?php require '../sql.php';
session_start();
$img_id = $_POST['id'];
$user_log = $_SESSION['login'];
$user_query = mysql_query("select * from users where log = '$user_log'");
$user_arr = mysql_fetch_array($user_query);
$user_id = $user_arr['id'];
$images_query = mysql_query("select * from images where id='$img_id'");
$images_array = mysql_fetch_array($images_query);
$likes_array = explode(".", $images_array['likes_us']);
$dislikes_array = explode(".", $images_array['dislikes_us']);
if(!in_array($user_id, $likes_array)) {
    array_push($likes_array, $user_id);
    $likes_new_text = implode(".", $likes_array);
    mysql_query("update images set likes_us = '$likes_new_text' where id ='$img_id'");
    $echo = (count($likes_array) - 1).','.(count($dislikes_array) - 1);
    if (in_array($user_id, $dislikes_array)) {
        $dislikes_new_arr = array_diff($dislikes_array, [$user_id]);
        $dislikes_new_text = implode(".", $dislikes_new_arr);
        mysql_query("update images set dislikes_us = '$dislikes_new_text' where id ='$img_id'");
        $echo =  (count($likes_array) - 1).','.(count($dislikes_new_arr) - 1);
    }
    echo $echo;
}else{
    $likes_new_arr = array_diff($likes_array, [$user_id]);
    $likes_new_text = implode(".", $likes_new_arr);
    mysql_query("update images set likes_us = '$likes_new_text' where id ='$img_id'");
    $echo = (count($likes_new_arr) - 1).','.(count($dislikes_array) - 1);
    echo $echo;
}