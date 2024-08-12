<?php
include("../connection.php");
$id = $_POST['edit_user_id'];
$name = $_POST['edit_user_name'];
$email = $_POST['edit_user_email'];
$password = $_POST['edit_user_password'];
$update_query = mysqli_query($connection, "UPDATE tbl_users SET user_name='$name',user_email='$email',user_password='$password' WHERE user_id = '$id'");
if ($update_query) {
    echo "User Updated Successfully";
} else {
    echo "User Update Failed";
}
