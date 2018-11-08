<?php
$path = "uploads/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = $name.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
$query   = "UPDATE users SET profile_image='$actual_image_name' WHERE student_id='{$_SESSION['user_id']}'";
$result = mysqli_query($link_id, $query);
echo "<img src='uploads/".$actual_image_name."' class='preview'>";
}
?>  