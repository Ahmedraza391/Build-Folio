<?php 
include("../connection.php");
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$query = mysqli_query($connection,"UPDATE tbl_course SET course_name='$cname' WHERE course_id=$cid");
$query ? $result = "Course Successfuly Updated" : $result = "Course not added";
echo $result;
?> 