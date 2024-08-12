<header id="header">
  <div class="d-flex flex-column">

    <div class="profile">
      <br>
      <h1 class="text-light"><a href="index.html"><?php echo isset($_SESSION['user']) ? $_SESSION['user']['admin_name'] : ""; ?></a></h1>

    </div>

    <nav id="navbar" class="nav-menu navbar">
      <ul>
        <li>
          <a href="index.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "home") {echo "active";} ?> ">
            <i class="fas fa-home me-3"></i>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="technology_management.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "technology") {echo "active";} ?> ">
            <i class="fas fa-language me-3"></i>
            <span>Technology</span>
          </a>
        </li>
        <li>
          <a href="course_management.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "course") {echo "active";} ?> ">
            <i class="fas fa-book me-3"></i>
            <span>Course</span>
          </a>
        </li>
        <li>
          <a href="lecture_management.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "lecture") {echo "active";} ?> ">
            <i class="fas fa-video me-3"></i>
            <span>Lectures</span>
          </a>
        </li>
        <li>
          <a href="project_management.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "project") {echo "active";} ?> ">
            <i class="fas fa-tasks me-3"></i>
            <span>Projects</span>
          </a>
        </li>
        <li>
          <a href="user_management.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "user") {echo "active";} ?> ">
            <i class="fas fa-users me-3"></i>
            <span>Users</span>
          </a>
        </li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->