<?php 
include("./components/top.php");
if (!isset($_SESSION['folio_admin'])) {
    echo "<script>window.location.href = 'admin_login.php'<script>";
    exit();
}

if (isset($_POST['btn_update'])) {
    $message = "";
    $class = "";
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $query = "UPDATE tbl_admin SET admin_name = '$admin_name', admin_email = '$admin_email', admin_password = '$admin_password' WHERE admin_id = '$admin_id'";
    $execute_query = mysqli_query($connection, $query);

    if ($execute_query) {
        setcookie('email', $admin_email, time() + (86400 * 30), "/", "", true, true);
        setcookie('password', $admin_password, time() + (86400 * 30), "/", "", true, true);
        $message = "Profile Updated Successfully";
        $class = "d-block text-success";
    } else {
        $message = "Failed to Update Profile";
        $class = "d-block text-danger";
    }
}
?>

<title>Build Folio - Admin Profile</title>
<section class="mainRight container">
    <div class="content row gap-1 justify-content-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card p-3 shadow">
                <div class="form">
                    <h3 class="fw-bold text-center text-dark mb-4">Edit / Update Profile</h3>
                    <?php 
                    $admin_id = $_SESSION['folio_admin']['admin_id'];
                    $fetch_admin_query = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE admin_id = '$admin_id'");
                    $fetch = mysqli_fetch_assoc($fetch_admin_query);
                    ?>
                    <form method="POST">
                        <input type="hidden" name="admin_id" value="<?php echo $fetch['admin_id']; ?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $fetch['admin_name']; ?>" placeholder="">
                            <label for="admin_name">Admin Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="admin_email" value="<?php echo $fetch['admin_email']; ?>" name="admin_email" placeholder="">
                            <label for="admin_email">Admin Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="admin_password" value="<?php echo $fetch['admin_password']; ?>" name="admin_password" placeholder="Password">
                            <label for="admin_password">Admin Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_update">Update Profile</button>
                    </form>
                    <div class="message fw-bold text-center <?php echo $class ? $class : 'd-none'; ?>">
                        <h5><?php echo $message; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>
<?php include("./components/bottom.php"); ?>
