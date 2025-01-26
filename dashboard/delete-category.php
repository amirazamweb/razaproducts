<?php
include '../includes/connect.php';
$cat_id = $_GET['cat_id'];
$sql = "DELETE FROM categories WHERE cat_id = {$cat_id}";
if(mysqli_query($conn, $sql)){
    header("Location:{$host}/dashboard/category.php");
}

mysqli_close($conn);

?>