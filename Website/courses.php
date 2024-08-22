<?php include("../connection.php"); ?>
<?php
session_start();
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
$page = "course";
?>
<title>Buil Folio - Projects</title>
<?php include("top.php"); ?>
<style>
    .header {
        background-color: #4668a2;
    }
    
</style>
<main class="main course_section">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">courses</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Course Section Section -->
    <section id="course-section" class="course-section section">

        <div class="container" data-aos="fade-up">
            <div class="heading mb-4">
                <h1>Corses</h1>
            </div>
            <div class="row">
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_course WHERE status='activate' AND disabled_status='enabled'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $data) {
                        echo "<div class='col col-md-6 col-sm-12 mb-3'>";
                        echo "<div class='card shadow' style='height: 200px;'>";
                        echo "<a href='all_course_lecture.php?id=$data[course_id]' class='text-decoration-none' style='height: 100%; object-fit:cover;'>";
                        echo "<div class='row g-0 h-100'>";
                        echo "<div class='col-md-8 m-auto d-flex align-items-center justify-content-center'>";
                        echo "<div class=''>";
                        echo "<h4>$data[course_name]</h4>";
                        // echo "<h5 class='card-title'>$data[technologi]</h5>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>

        </div>

    </section><!-- Course Section Section -->

</main>
<?php include("bottom.php"); ?>