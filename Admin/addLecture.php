<?php
include("../connection.php");

$title = $_POST['Title'];
$description = $_POST['Description'];
$courseId = $_POST['course_id'];
$langId = $_POST['lang_id'];
$videoPath = $_FILES['video'];
$tmpName = $videoPath['tmp_name'];
$videoName = $videoPath['name'];
 $ExtensionType = $videoPath['type'];
$ext = array("video","mp4","video/mp4");
if(in_array($ExtensionType,$ext)){

 $path = "../assets/course video/$videoName";
 move_uploaded_file($tmpName,$path);
$query = mysqli_query($connection,"INSERT INTO tbl_lectures(videoPath,title,description,course_id,lang_id) VALUES('$path','$title','$description',$courseId,$langId)");
if($query){
echo $result = "Lecture Successfuly Added";
}
}
?>