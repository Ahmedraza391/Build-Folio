<?php
include("../connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $user_image = $_FILES['user_image'];
    $tmp_image = $_FILES['user_image']['tmp_name'];  // Corrected this line

    $path = "./uploads/users/$email/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $image_path = $path . basename($user_image['name']);  // Define the full path

    if (move_uploaded_file($tmp_image, $image_path)) {
        // Insert the user data into the database
        $insert_query = mysqli_query($connection, "INSERT INTO tbl_users (user_name, user_email, user_password, user_image) VALUES ('$user', '$email', '$password', '$image_path')");
        if ($insert_query) {
            echo "User Inserted Successfully";
        } else {
            echo "Failed to Insert User: " . mysqli_error($connection);
        }
    } else {
        echo "Failed to Upload Image";
    }
}
?>
