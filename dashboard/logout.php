<?php
include '../includes/connect.php';
session_start();
session_unset();
session_destroy();
echo "<script>
         setTimeout(()=>{
         window.location.href = '{$host}/login.php';
         }, 0)
         </script>";
?>