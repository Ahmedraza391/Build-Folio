<?php
ob_start();
session_start();
include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <div class="container p-md-5 top_header_margin_div">
        <div class="login_content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card mb-3 p-md-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your email & password to login</p>
                            </div>
                            <form class="row g-3 needs-validation" novalidate method="POST">
                                <div class="col-12">
                                    <label for="youremail" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="txtemail" value="<?php if (isset($_COOKIE['email'])) {echo htmlspecialchars($_COOKIE['email']);} ?>" class="form-control" id="youremail" required>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
                                </div>
                                <?php
                                $value = "";
                                if (isset($_COOKIE['password'])) {
                                    $value = $_COOKIE['password'];
                                }
                                ?>
                                <div class="col-12 mb-3 password-wrapper">
                                    <label for="password" class="form-label">Admin Password</label>
                                    <input type="password" name="txtpassword" value="<?php echo htmlspecialchars($value); ?>" class="form-control password" required>
                                    <i class="bi bi-eye-slash togglePassword" style="transform: translateY(0%)!important;"></i>
                                    <div class="invalid-feedback">Please, Enter password!</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember_me" id="rememberMe" <?php if (isset($_COOKIE['email']) && $_COOKIE['email'] !== '' &&isset($_COOKIE['password']) && $_COOKIE['password'] !== '') {echo 'checked';}?>>
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" name="btn-login" type="submit">Login</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['btn-login'])) {
                                $email = $_POST['txtemail'];
                                $password = $_POST['txtpassword'];

                                // Fetch user data from database
                                $check_user_have = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE admin_email='$email'");
                                $count = mysqli_num_rows($check_user_have);

                                if ($count > 0) {
                                    $fetch_user = mysqli_fetch_assoc($check_user_have);
                                    $stored_password = $fetch_user['admin_password'];

                                    // Check password (plain text comparison)
                                    if ($password == $stored_password) {
                                        $_SESSION['folio_admin'] = $fetch_user;

                                        if (isset($_POST['remember_me'])) {
                                            setcookie('email', $email, time() + (86400 * 30), "/", "", true, true); // Secure flag and HttpOnly flag
                                            setcookie('password', $stored_password, time() + (86400 * 30), "/", "", true, true); // Secure flag and HttpOnly flag
                                        } else {
                                            setcookie('email', "", time() - 3600, "/", "", true, true); // Secure flag and HttpOnly flag
                                            setcookie('password', "", time() - 3600, "/", "", true, true); // Secure flag and HttpOnly flag
                                        }

                                        echo "<script>alert('Admin Login Successfully');window.location.href = 'index.php';</script>";
                                    } else {
                                        echo "<script>alert('Incorrect Email Or Password');window.location.href = 'login.php';</script>";
                                    }
                                } else {
                                    echo "<script>alert('Incorrect Email Or Password');window.location.href = 'login.php';</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</body>
<!-- <script src="../assets/bootstrap/js/bootstrap.min.js"></script> -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>
<?php ob_end_flush(); ?>