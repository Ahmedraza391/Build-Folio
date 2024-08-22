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
    .course-section{
        min-height: 55vh;
    }
</style>
<main class="main course_section">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Full Course</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
    <!-- Course Section Section -->
    <section id="course-section" class="course-section section">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <?php
                $query = "SELECT tbl_lectures.*,tbl_course.course_name as 'c_name' FROM tbl_lectures INNER JOIN tbl_course ON tbl_lectures.course_id = tbl_course.course_id WHERE tbl_course.status='activate' AND tbl_course.disabled_status='enabled' AND tbl_course.course_id = '$_GET[id]'";
                $execute_query = mysqli_query($connection, $query);
                if (mysqli_num_rows($execute_query) > 0) {
                    $data = mysqli_fetch_assoc($execute_query);
                    echo "<div class='card all_course_header bg-skyblue mb-3'>
                        <h1 class='text-center text-white'>$data[c_name]</h1>
                    </div>";
                    foreach ($execute_query as $data) {
                        echo "<div class='col col-md-6 col-sm-12 mb-3'>";
                        echo "<div class='card shadow' style='height: 200px;'>";
                        echo "<a href='lecture_detail.php?id=$data[id]' class='text-decoration-none' style='height: 100%; object-fit:cover;'>";
                        echo "<div class='row g-0 h-100'>";
                        echo "<div class='col-md-6'>";
                        echo "<img src='../admin$data[video_thumbnail]' class='img-fluid rounded-start w-100 h-100' alt='...'>";
                        echo "</div>";
                        echo "<div class='col-md-6 d-flex align-items-center'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$data[lecture_title]</h5>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                }else{
                    echo "<div class='text-center p-5'><h3>Lectures Not Found.</h3></div>";
                }
                ?>
            </div>

        </div>

    </section><!-- Course Section Section -->
</main>
<?php include("bottom.php"); ?>