<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Build Folio</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="<?php if($page == "home"){echo "active";} ?>">Home</a></li>
          <li><a href="about.php" class="<?php if($page == "about"){echo "active";} ?>">About</a></li>
          <li><a href="projects.php" class="<?php if($page == "projects"){echo "active";} ?>">Projects</a></li>
          <li><a href="lectures.php" class="<?php if($page == "lectures"){echo "active";} ?>">Lectures</a></li>
          <li><a href="#contact" class="<?php if($page == "contact"){echo "active";} ?>">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="user_login.php">Login / Register</a>
    </div>
  </header>