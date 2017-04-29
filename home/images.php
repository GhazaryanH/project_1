<?php include "header.php";
    if(isset($_POST['add'])){
        $head_ = $_POST['head'];
        $des_ = $_POST['des'];
        $head = addslashes($head_);
        $des = addslashes($des_);
        $query_ = mysql_query("select * from images where head = '$head'");
        $query_rows = mysql_num_rows($query_);
        $image_types = ['jpg', 'jpeg'];
        $image_name = $_FILES['image']['name'];
        $image_explode = explode('.', $image_name);
        $image_type = end($image_explode);
        if(in_array($image_type, $image_types) && $head != "" && $des != "" && $query_rows < 1){
            $query = mysql_query("insert into images (head, des, likes, likes_us, dislikes, dislikes_us) values ('$head', '$des', 0, '', 0, '')");
            $img_row = mysql_query("select * from images where head = '$head'");
            $img_array = mysql_fetch_array($img_row);
            $img_id = $img_array['id'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/photos/image_'.$img_id.'.jpg');
        }
    };
?>

<script>
    $('.navbar-nav').children().removeClass();
    $('.navbar-nav li:nth-child(2)').addClass('active');
</script>

<div class="container">
    <div class="col-lg-12 well"><?php
        $table_obj = mysql_query("select count(*) from images");
        $table_arr = mysql_fetch_array($table_obj);
        $table_cnt = $table_arr[0];
        for($i = 0; $i < $table_cnt; $i++) {
            $query = mysql_query("select * from images limit ".$i.", 1");
            $array = mysql_fetch_array($query);
            $xxx = $array['head'].' - '.$array['des'];
            $yyy = substr($xxx, 0, 42);
            echo "<div class=\"imag col-lg-4\"><a href='images_large.php'><img src=\"../images/photos/image_".$array['id'].".jpg\" style=\"width: 100%; height: 189.45px; cursor: pointer;\"></a><p>".$yyy." . . .</p></div>";
        }
        ?></div>
    <div class="col-lg-12 well">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-2 text-right">
                <h4>Heading</h4>
                <h4>Description</h4>
            </div>
            <div class="col-lg-8">
                <input name="head" class="form-control">
                <textarea name="des" class="form-control" style="margin-top: 5px;"></textarea>
            </div>
            <div class="col-lg-2">
                <label class="btn btn-info" style="width: 100%;">
                    Choose img<input name="image" type="file" style="display: none;">
                </label>
                <button name="add" type="submit" class="btn btn-success" style="margin-top: 5px; width: 100%; height: 53.6px;">Add</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>