<?php
include("../connection.php");
$id = $_POST['edit_course_id'];
$course = $_POST['edit_course'];
$technology = $_POST['edit_technology'];
$update_query = mysqli_query($connection, "UPDATE tbl_course SET course_name='$course',technology_id='$technology' WHERE course_id = '$id'");
if ($update_query) {
    echo "Course Updated Successfully";
} else {
    echo "Course Update Failed";
}
?>