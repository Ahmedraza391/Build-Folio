<?php
include("../connection.php");
  $name = $_POST["langName"];
  $cid = $_POST["cid"];
  $result = mysqli_query($connection,"INSERT INTO tbl_language(lang_name,course_id) VALUES('$name','$cid')");
$result ? $success = "Language Successfuly Added" : $success ="Language not added";
echo $success;
?>