<?php
include '../includes/connect.php';
$cat_id = $_GET['cat_id'];
$sql = "SELECT img_url FROM products WHERE category = {$cat_id}";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    unlink("upload/".$row['img_url']);
}

$sql2 = "DELETE FROM categories WHERE cat_id = {$cat_id};";
$sql2.= "DELETE FROM products WHERE category = {$cat_id}";
if(mysqli_multi_query($conn, $sql2)){
    header("Location:{$host}/dashboard/category.php");
}

mysqli_close($conn);

?>