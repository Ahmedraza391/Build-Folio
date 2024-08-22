<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Build Folio</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="<?php if($page == "home"){echo "active";} ?>">Home</a></li>
          <li><a href="about.php" class="<?php if($page == "about"){echo "active";} ?>">About</a></li>
          <li><a href="projects.php" class="<?php if($page == "project"){echo "active";} ?>">Projects</a></li>
          <li><a href="lectures.php" class="<?php if($page == "lectures"){echo "active";} ?>">Lectures</a></li>
          <li><a href="courses.php" class="<?php if($page == "course"){echo "active";} ?>">Courses</a></li>
          <li><a href="contact.php" class="<?php if($page == "contact"){echo "active";} ?>">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php
        if(isset($_SESSION['user_login'])){
        $user_id = $_SESSION["user_login"]["user_id"];
        $fetch_query = mysqli_query($connection,"SELECT * FROM tbl_users WHERE user_id = '$user_id'");
        $fetch = mysqli_fetch_assoc($fetch_query); 
        echo "<div class='btn-group'>
        <button type='button' class='btn ms-3 dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
          <img src='$fetch[user_image]' class='img-fluid' style='width:40px; height:40px; border-radius:50%;'  alt='' />
        </button>
        <ul class='dropdown-menu'>
          <li><a class='dropdown-item' href='user_profile.php'>Profile</a></li>
          <li><a class='dropdown-item' href='user_logout.php'>Logout</a></li>
        </ul>
      </div>";
        }else{
          echo "<a class='btn-getstarted' href='user_login.php'>Login / Register</a>";
        }
      ?>
    </div>
  </header>