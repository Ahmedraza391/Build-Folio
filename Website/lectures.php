<?php include("../connection.php"); ?>
<?php
session_start();
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
$page = "lecture";
?>
<title>Buil Folio - Projects</title>
<?php include("top.php"); ?>
<style>
    .header {
        background-color: #4668a2;
    }
    
</style>
<main class="main lecture_section">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Lectures</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- lecture Section Section -->
    <section id="lecture-section" class="lecture-section section">

        <div class="container" data-aos="fade-up">
            <div class="heading mb-5 text-center">
                <h1 class="stylish_heading w-50 m-auto">All Courses lectures</h1>
            </div>
            <div class="row">
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_lectures WHERE status='activate' AND disabled_status='enabled'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $data) {
                        echo "<div class='col col-md-6 col-sm-12 mb-3'>";
                        echo "<div class='card shadow' style='height: 200px;'>";
                        echo "<a href='lecture_detail.php?id=$data[id]' class='text-decoration-none' style='height: 100%; object-fit:cover;'>";
                        echo "<div class='row g-0 h-100'>";
                        echo "<div class='col-md-6 hovered_images_box'>";
                        echo "<img src='../admin$data[video_thumbnail]' class='img-fluid rounded-start w-100 h-100 hovered_images' alt='...'>";
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
                }
                ?>
            </div>

        </div>

    </section><!-- /project Section Section -->

</main>
<?php include("bottom.php"); ?>