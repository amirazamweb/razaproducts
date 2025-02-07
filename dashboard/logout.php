<?php
include '../includes/connect.php';
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['role']);
echo "<script>window.location.href = '{$host}/login.php'; </script>";
?>