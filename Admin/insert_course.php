<?php
include("../connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $course = $_POST['course'];
    $technology = $_POST['technology'];
    $insert_query = mysqli_query($connection,"INSERT INTO tbl_course(course_name,technology_id)VALUES('$course','$technology')");
    if($insert_query){
        echo "Course Inserted Successfully";
    }else{
        echo "Failed to Insert Course";
    }    
}
?>
