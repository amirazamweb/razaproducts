<?php
session_start();
include 'includes/connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: {$host}/login.php");
 }
 else{
    $user_id = $_SESSION['user_id'];
    $cart_id = $_GET['cart_id'];
    $sql = "UPDATE cart SET qty = qty+1 WHERE user_id = {$user_id} AND cart_id = {$cart_id}";
    if(mysqli_query($conn, $sql)){
        header("Location:{$host}/cart.php");
    }
    
    mysqli_close($conn);
 }

?>