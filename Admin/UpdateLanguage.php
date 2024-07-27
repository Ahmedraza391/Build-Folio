<?php 
include("../connection.php");
$cid = $_POST['cid'];
$courseId = $_POST['courseID'];
$cname = $_POST['cname'];
$query = mysqli_query($connection,"UPDATE tbl_language SET lang_name='$cname',course_id=$courseId WHERE lang_id=$cid");
$query ? $result = "Language Successfuly Updated" : $result ="language not updated"; 
echo $result;
?>