<?php 
include("../connection.php");
$lectid = $_POST['lectid'];
$Title = $_POST['updLectTitle'];
$Description= $_POST['updLectDesc'];
$course = $_POST['course_id'];
$tech = $_POST['lang_id'];

$query = mysqli_query($connection,"UPDATE tbl_lectures SET title='$Title',description='$Description',course_id=$course,lang_id=$tech WHERE id=$lectid");
if($query){
    $result="Lecture Successfully Updated";
}else{
    $result = "extension not matched";
}  
echo $result;
?>