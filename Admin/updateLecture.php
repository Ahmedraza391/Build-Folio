<?php 
include("../connection.php");
$lectid = $_POST['lectid'];
$Title = $_POST['updLectTitle'];
$Description= $_POST['updLectDesc'];
$course = $_POST['course_id'];
$tech = $_POST['lang_id'];
$video = $_FILES['editVideo'];
$tmpName = $video['tmp_name'];
$videoName = $video['name'];
$ExtensionType = $video['type'];
$ext = array("video","mp4","mp3","video/mp4");

if(in_array($ExtensionType,$ext)){
    $path = "../assets/course video/$videoName";
    move_uploaded_file($tmpName,$path);
$query = mysqli_query($connection,"UPDATE tbl_lectures SET videoPath='$path',title='$Title',description='$Description',course_id=$course,lang_id=$tech WHERE id=$lectid");
if($query){
    $result="Lecture updated";
}
}else{
$result = "extension not matched";
}
   
echo $result;


?>