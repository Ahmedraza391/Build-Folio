<?php
include("../connection.php");
$id = $_POST['edit_project_id'];
$title = $_POST['edit_project_title'];
$desc = $_POST['edit_project_desc'];
$update_query = mysqli_query($connection, "UPDATE tbl_projects SET project_title='$title',project_desc='$desc' WHERE project_id = '$id'");
if ($update_query) {
    echo "Project Updated Successfully";
} else {
    echo "Project Update Failed";
}
?>