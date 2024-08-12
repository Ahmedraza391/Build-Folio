<?php
include("../connection.php");
$id = $_POST['edit_technology_id'];
$technology = $_POST['edit_technology'];
$update_query = mysqli_query($connection, "UPDATE tbl_technology SET technology='$technology' WHERE id = '$id'");
if ($update_query) {
    echo "Technology Updated Successfully";
} else {
    echo "Technology Update Failed";
}
?>