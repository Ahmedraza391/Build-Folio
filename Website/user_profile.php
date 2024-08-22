<?php include("../connection.php"); ?>
<?php
session_start();
$page = "home";
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];

$success_message = "";
if (isset($_POST['update_profile_btn'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $id = $_POST['user_id'];
    $update_query = mysqli_query($connection, "UPDATE tbl_users SET user_name='$name',user_email='$email',user_password='$password' WHERE user_id = '$id' ");
    if ($update_query) {
        $success_message = "Profile Updated Successfully";
    } else {
        $success_message = "Error In Updating Profile";
    }
}
if (isset($_POST['image_btn'])) {
    $id = $_POST['user_id'];
    $email = $_POST['user_email'];

    $image = $_FILES['user_image'];
    $tmp_name = $_FILES['user_image']['tmp_name'];

    $path = "../Admin/uploads/users/$email/";

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $image_path = $path . basename($image['name']);

    if (move_uploaded_file($tmp_name, $image_path)) {
        $query = mysqli_query($connection, "UPDATE tbl_users SET user_image='$image_path' WHERE user_id='$id'");

        if ($query) {
            $success_message = "Image Updated Successfully";
        } else {
            $success_message =  "Failed To Update Image: " . mysqli_error($connection);
        }
    } else {
        $success_message = "Failed To Upload Image";
    }
}

?>
<title>Build Folio - Home</title>
<?php include("top.php"); ?>
<style>
    .header {
        background-color: #4668a2;
    }

    .profile_section {
        min-height: 55vh;
    }
</style>
<section class="profile_section">
    <div class="container p-5">
        <div class="card p-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="heading mb-3">
                        <h3>Update Profile</h3>
                    </div>
                    <div class="form">
                        <?php
                        $user_id = $_SESSION["user_login"]["user_id"];
                        $query = "SELECT * FROM tbl_users WHERE user_id = $user_id";
                        $execute_query = mysqli_query($connection, $query);
                        if (mysqli_num_rows($execute_query) > 0) {
                            $fetch = mysqli_fetch_assoc($execute_query);
                        }
                        ?>
                        <form method="POST">
                            <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']; ?>">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" value="<?php echo $fetch['user_name']; ?>" name="user_name" id="user_name" placeholder="" required>
                                <label for="user_name">User Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" value="<?php echo $fetch['user_email']; ?>" name="user_email" id="user_email" placeholder="" required>
                                <label for="user_email">User Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" value="<?php echo $fetch['user_password']; ?>" name="user_password" id="user_password" placeholder="" required>
                                <label for="user_password">User Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update_profile_btn">Update</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image text-center mb-3">
                        <img src="<?php echo $fetch['user_image']; ?>" alt="<?php echo $fetch['user_name']; ?>" class="img-fluid rounded-circle" width="250" height="250">
                    </div>
                    <div class="image_form w-75 m-auto">
                        <form enctype="multipart/form-data" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']; ?>">
                            <input type="hidden" name="user_email" value="<?php echo $fetch['user_email']; ?>">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <input class="form-control me-2" name="user_image" type="file" id="profile_image">
                                <button type="submit" class="btn btn-primary" name="image_btn">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="message text-center">
                        <h4 class="text-success"><?php echo $success_message; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("bottom.php"); ?>