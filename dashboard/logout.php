<?php
include '../includes/connect.php';
session_start();
session_unset();
session_destroy();
echo "<script>window.location.href = '{$host}/login.php'; </script>";
?>