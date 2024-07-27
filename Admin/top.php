<?php include("../connection.php");session_start();
// if(!isset($_SESSION['user'])){
//   ?>
   <script>
//     window.location.replace("login.php");
//   </script>
 <?php
// };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<!-- <link rel="stylesheet" href="index.css"> -->
 <?php include("style.php") ?>
</head>
<body>
<div class="header bg-dark text-white p-4 px-5 d-flex align-items-center justify-content-between">
  <h2>BuildFolio</h2>
<div>
  <i class="fa fa-user p-2 bg-light text-dark"  onclick="setting()"></i>
<ul id="settinglist" class="m-0 p-3 bg-dark text-light">
  <li><a href="logout.php">Logout</a></li>
</ul>
  </div>  
</div>

<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <br>
        <h1 class="text-light"><a href="index.html"><?php echo isset($_SESSION['user']) ? $_SESSION['user']['admin_name'] : "";?></a></h1>
      
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="course.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Course</span></a></li>
          <li><a href="techlanguage.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span></span>Technology</a></li>
          <li><a href="lecture.php" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Lectures</span></a></li>
          <li><a href="user.php" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Users</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <script>
    const setting = ()=> {
     const dropdown =  document.getElementById("settinglist");
    dropdown.classList.toggle("show");
   };
 
  </script>