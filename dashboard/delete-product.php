<?php
include '../includes/connect.php';
$product_id = $_GET['product_id'];
$sql = "SELECT img_url FROM products WHERE product_id = {$product_id}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$img_link = $row['img_url'];
unlink("upload/".$img_link);

$sql2 = "DELETE FROM products WHERE product_id = {$product_id}";
if(mysqli_query($conn, $sql2)){
    header("Location:{$host}/dashboard/products.php");
}

mysqli_close($conn);

?>