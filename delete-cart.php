<?php
include 'includes/connect.php';
$cart_id = $_GET['cart_id'];

$sql = "DELETE FROM cart WHERE cart_id = {$cart_id}";
if(mysqli_query($conn, $sql)){
    header("Location:{$host}/cart.php");
}

mysqli_close($conn);

?>