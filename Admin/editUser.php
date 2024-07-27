<?php
include("../connection.php");
$uid = $_POST['txtuid'];
$status = $_POST['txtstatus'];
$query = mysqli_query($connection,"UPDATE tbl_user SET user_status='$status' WHERE user_id=$uid");
$query ? $result = "status updated" : $result = "status not updated";
echo $result;
?>