<?php 
include("../connection.php");
$cid = $_POST['c_id'];
$t_id = $_POST['t_id'];
$t_name = $_POST['tname'];
$query = mysqli_query($connection,"UPDATE tbl_language SET lang_name='$t_name',course_id=$cid WHERE lang_id=$t_id");
$query ? $result = "Language Successfuly Updated" : $result ="language not updated"; 
echo $result;
?>