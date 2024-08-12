<?php
include("../connection.php");
$id = $_POST['edit_lecture_id'];
$lecture_title = $_POST['edit_lecture_title'];
$lecture_desc = $_POST['edit_lecture_desc'];
$course = $_POST['edit_course'];
$update_query = mysqli_query($connection, "UPDATE tbl_lectures SET lecture_title='$lecture_title',lecture_description='$lecture_desc',course_id='$course' WHERE id = '$id'");
if ($update_query) {
    echo "Lecture Updated Successfully";
} else {
    echo "Lecture Update Failed";
}
?>