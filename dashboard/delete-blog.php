<?php
include '../includes/connect.php';
$blog_id = $_GET['blog_id'];
$sql = "SELECT blog_img FROM blogs WHERE blog_id = {$blog_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$img_link = $row['blog_img'];
unlink("upload/blog/".$img_link);

$sql2 = "DELETE FROM blogs WHERE blog_id = {$blog_id}";
if(mysqli_query($conn, $sql2)){
    header("Location:{$host}/dashboard/blog-list.php");
}

mysqli_close($conn);

?>