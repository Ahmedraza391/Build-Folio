<?php
    session_start();
    include("../connection.php");
    if(isset($_POST['btn_login'])){
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $query = mysqli_query($connection,"SELECT * FROM tbl_users WHERE user_email='$email' AND user_password='$password'");
        if(mysqli_num_rows($query)>0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['user_login'] = $data;
            if(isset($_SESSION['page_url'])){
                // echo "<script>alert('Login Successfully');</script>";
                header("location:$_SESSION[page_url]");
            }else{
                echo "<script>alert('Login Successfully');window.location.href = 'index.php';</script>";
            }
        }else{
            echo "<script>alert('Incorrect Email or Password');window.location.href = 'user_login.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Build Folio - Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/fontawesome.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page login_page">

    <main class="main">
        <div class="container login_section">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card p-md-5 p-3 shadow login_card">
                        <div class="heading text-center mb-3">
                            <h2 class="text-primary">Login User</h2>
                        </div>
                        <div class="form">
                            <form method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com" required>
                                    <label for="user_email">User Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required>
                                    <label for="user_password">User Password</label>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn btn-primary" name="btn_login">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="link mt-4">
                            <h6>Don't Have An Account? <a href="user_register.php" class="text-danger text-decoration-underline">Register</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/slider.js"></script>
        <script src="assets/js/fontawesome.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>

</body>

</html>