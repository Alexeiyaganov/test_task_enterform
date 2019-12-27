<?php require_once("includes/connect.php"); ?>
<?php

header("content-type:image/jpeg");

$name=$_GET['name'];

$select_image="select * from user_table where picturename='$name'";

$var=mysqli_query($select_image);

if($row=mysqli_fetch_array($var))
{
    $image_name=$row["picturename"];
    $image_content=$row["picturedata"];
}
echo $image;

?>
