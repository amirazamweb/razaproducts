<?php
include '../includes/connect.php';
$user_id = $_GET['user_id'];

$sql2 = "DELETE FROM users WHERE user_id = {$user_id}";
if(mysqli_query($conn, $sql2)){
    header("Location:{$host}/dashboard/users.php");
}

mysqli_close($conn);

?>