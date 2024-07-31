<header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <br>
        <h1 class="text-light"><a href="index.html"><?php echo isset($_SESSION['user']) ? $_SESSION['user']['admin_name'] : ""; ?></a></h1>

      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="index.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "home") {
                                                              echo "active";
                                                            } ?> "><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="course.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "course") {
                                                              echo "active";
                                                            } ?> "><i class="bx bx-user"></i> <span>Course</span></a></li>
          <li><a href="techlanguage.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "language") {
                                                                    echo "active";
                                                                  } ?> "><i class="bx bx-file-blank"></i> <span></span>Technology</a></li>
          <li><a href="lecture.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "lecture") {
                                                                echo "active";
                                                              } ?> "><i class="bx bx-book-content"></i> <span>Lectures</span></a></li>
          <li><a href="user.php" class="nav-link sidebar_navlink fw-bold scrollto <?php if ($page == "user") {
                                                            echo "active";
                                                          } ?> "><i class="bx bx-server"></i> <span>Users</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->