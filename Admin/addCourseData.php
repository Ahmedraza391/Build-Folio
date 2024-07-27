<?php
include("../connection.php");
  $name = $_POST["courseName"];
  $result = mysqli_query($connection,"INSERT INTO tbl_course(course_name) VALUE('$name')");
  $result ? $success = "Course Successfuly Added"  : $success = "course not added";
  echo $success;
?>