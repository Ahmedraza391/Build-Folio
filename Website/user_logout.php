<?php
    session_start();
    unset($_SESSION['user_login']);
    header("location:user_login.php");
    exit;
?>
