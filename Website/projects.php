<?php include("../connection.php"); ?>
<?php
session_start();
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
$page = "project";
?>
<title>Buil Folio - Projects</title>
<?php include("top.php"); ?>
<style>
    .header {
        background-color: #4668a2;
    }
    
</style>
<main class="main project_section">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Projects</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- project Section Section -->
    <section id="project-section" class="project-section section">

        <div class="container" data-aos="fade-up">
            <div class="heading mb-4">
                <h1>Projects</h1>
            </div>
            <div class="row">
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_projects WHERE project_status='activate' AND disabled_status='enabled'");
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $data) {
                        echo "<div class='col col-md-6 col-sm-12 mb-3'>";
                        echo "<div class='card shadow' style='height: 200px;'>";
                        echo "<a href='project_detail.php?id=$data[project_id]' class='text-decoration-none' style='height: 100%; object-fit:cover;'>";
                        echo "<div class='row g-0 h-100'>";
                        echo "<div class='col-md-6'>";
                        echo "<img src='../admin$data[project_thumbnail]' class='img-fluid rounded-start w-100 h-100' alt='...'>";
                        echo "</div>";
                        echo "<div class='col-md-6 d-flex align-items-center'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$data[project_title]</h5>";
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