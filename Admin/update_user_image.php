<?php
include("../connection.php");

$id = $_POST['edit_user_image_id'];
$email = $_POST['edit_user_image_email'];

$image = $_FILES['edit_image'];
$tmp_name = $_FILES['edit_image']['tmp_name'];

$path = "./uploads/users/$email/";

if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

$image_path = $path . basename($image['name']);

if (move_uploaded_file($tmp_name, $image_path)) {
    $query = mysqli_query($connection, "UPDATE tbl_users SET user_image='$image_path' WHERE user_id='$id'");

    if ($query) {
        echo "Image Updated Successfully";
    } else {
        echo "Failed To Update Image: " . mysqli_error($connection);
    }
} else {
    echo "Failed To Upload Image";
}

$connection->close();
?>
