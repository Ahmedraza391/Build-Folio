<?php
 include("../connection.php");
 session_start();
 session_destroy();
 setcookie("email","",time()-136000);
 setcookie("password","",time()-136000);
 header("location:login.php");
?>