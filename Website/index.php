<?php include("../connection.php"); ?>
<?php
session_start();
$page = "home";
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
?>
<title>Build Folio - Home</title>
<?php include("top.php"); ?>

<section id="hero" class="hero section dark-background">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1>Better Environment For Students</h1>
                <p>We are Team of Talented Programmers & Developers in Making Websites & Softwares.</p>
                <?php
                if (!isset($_SESSION['user_login'])) {
                    echo "<div class='d-flex'>
                            <a href='user_register.php' class='btn-get-started'>Get Started</a>
                        </div>";
                } else {
                    echo "<div class='d-flex'>  
                            <a href='projects.php' class='btn-get-started'>View Projects</a>
                        </div>";
                }
                ?>

            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/svgs/[removal.ai]_e9dd2db8-58a8-4a95-8d51-08b563993e8b-man-is-working-laptop-with-word-data-it_1013341-201504.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>

<!-- Technology Section -->
<section id="services" class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Technologies</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-html5 fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Html</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-css3 fs-1 mx-2"></i></div>
                                <h4 class="fs-3">CSS</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-bootstrap fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Bootstrap</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-js fs-1 mx-2"></i></div>
                                <h4 class="fs-3">JavaScript</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-react fs-1 mx-2"></i></div>
                                <h4 class="fs-3">React</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-angular fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Angular</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-github fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Github</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fab fa-php fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Php</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fas fa-database fs-1 mx-2"></i></div>
                                <h4 class="fs-3">MySql</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon">
                                    <i class="devicon-devicon-plain mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-50" viewBox="0 0 128 128">
                                            <path fill="#9B4F96" d="M115.4 30.7L67.1 2.9c-.8-.5-1.9-.7-3.1-.7-1.2 0-2.3.3-3.1.7l-48 27.9c-1.7 1-2.9 3.5-2.9 5.4v55.7c0 1.1.2 2.4 1 3.5l106.8-62c-.6-1.2-1.5-2.1-2.4-2.7z" />
                                            <path fill="#68217A" d="M10.7 95.3c.5.8 1.2 1.5 1.9 1.9l48.2 27.9c.8.5 1.9.7 3.1.7 1.2 0 2.3-.3 3.1-.7l48-27.9c1.7-1 2.9-3.5 2.9-5.4V36.1c0-.9-.1-1.9-.6-2.8l-106.6 62z" />
                                            <path fill="#fff" d="M85.3 76.1C81.1 83.5 73.1 88.5 64 88.5c-13.5 0-24.5-11-24.5-24.5s11-24.5 24.5-24.5c9.1 0 17.1 5 21.3 12.5l13-7.5c-6.8-11.9-19.6-20-34.3-20-21.8 0-39.5 17.7-39.5 39.5s17.7 39.5 39.5 39.5c14.6 0 27.4-8 34.2-19.8l-12.9-7.6zM97 66.2l.9-4.3h-4.2v-4.7h5.1L100 51h4.9l-1.2 6.1h3.8l1.2-6.1h4.8l-1.2 6.1h2.4v4.7h-3.3l-.9 4.3h4.2v4.7h-5.1l-1.2 6h-4.9l1.2-6h-3.8l-1.2 6h-4.8l1.2-6h-2.4v-4.7H97zm4.8 0h3.8l.9-4.3h-3.8l-.9 4.3z" />
                                        </svg>
                                    </i>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon"><i class="fas fa-database fs-1 mx-2"></i></div>
                                <h4 class="fs-3">Sql</h4>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item d-flex align-items-center justify-content-center">
                                <div class="icon">
                                    <i class="devicon-devicon-plain mx-2">
                                        <svg class="h-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                            <g fill="#623697">
                                                <path d="M61.195 0h4.953c12.918.535 25.688 4.89 36.043 12.676 9.809 7.289 17.473 17.437 21.727 28.906 2.441 6.387 3.664 13.18 4.082 19.992v4.211c-.414 11.293-3.664 22.52-9.73 32.082-6.801 10.895-16.922 19.73-28.727 24.828A64.399 64.399 0 0165.082 128h-2.144c-11.735-.191-23.41-3.66-33.297-9.992-11.196-7.113-20.114-17.785-25.028-30.117C1.891 81.19.441 74.02 0 66.812v-4.957c.504-14.39 5.953-28.609 15.41-39.496C23.168 13.31 33.5 6.48 44.887 2.937 50.172 1.27 55.676.41 61.195 0M25.191 37.523c-.03 12.153-.011 24.305-.011 36.454 1.43.011 2.86.011 4.293.011-.075-10.433.101-20.863-.106-31.293.48.907.918 1.84 1.465 2.707C37.035 54.91 43.105 64.5 49.309 74c1.738-.023 3.476-.023 5.214.004-.003-12.16-.007-24.32.004-36.48a308.076 308.076 0 00-4.25-.012c.075 10.32-.136 20.64.125 30.949-6.507-10.352-13.101-20.645-19.695-30.945a370.85 370.85 0 00-5.516.007m38.844-.011c-.129 12.16-.004 24.32-.047 36.476 6.469-.015 12.938.024 19.41-.02a83.36 83.36 0 01.024-3.952c-5.012-.016-10.027.007-15.043-.02-.074-4.21-.004-8.426-.04-12.637 4.395-.078 8.79.012 13.18-.047-.011-1.277-.011-2.554-.019-3.832-4.387.141-8.773-.054-13.164.012.012-4.023.02-8.05.02-12.078 4.699 0 9.398-.02 14.093.012-.008-1.301 0-2.606.016-3.906-6.145-.016-12.29-.008-18.43-.008m22.602.054c.004 1.266.004 2.528.008 3.79 3.488-.04 6.972.109 10.46.035-.023 10.863.004 21.718-.011 32.574 1.46.043 2.93.035 4.39-.09-.12-5.992.118-11.988-.156-17.977.067-2.699-.07-5.394.117-8.09.106-2.14-.277-4.277-.035-6.417 3.516.047 7.035.015 10.55.015a59.774 59.774 0 01.075-3.832c-8.469-.105-16.937-.094-25.398-.008M13.55 69.094c-1.977.91-2.106 4.023-.149 5.027 1.72 1.18 4.305-.371 4.227-2.41.133-2.004-2.29-3.688-4.078-2.617m29.23 15.289c-4.277 3.469-4.226 11.195.5 14.25 2.668 1.695 6.102 1.344 8.922.215.012-.621.027-1.239.05-1.86-2.671 1.395-6.41 1.68-8.675-.61-2.965-3.237-2.297-9.269 1.613-11.476 2.211-1.164 4.907-.824 7.086.239-.007-.66-.004-1.32 0-1.98-3.097-1.099-6.922-1.04-9.496 1.222m17.207 2.71c-1.89.22-3.758 1.22-4.633 2.966-1.253 2.496-1.109 5.867.864 7.96 2.035 2.297 5.945 2.32 8.18.297 2.425-2.308 2.699-6.468.757-9.164-1.148-1.629-3.273-2.183-5.168-2.058m17.887 2.722c-1.66 2.883-1.332 7.25 1.598 9.211 2.183 1.22 4.933.832 7.074-.308-.004-.617.004-1.235.031-1.848-1.687 1.07-3.937 1.856-5.812.777-1.309-.722-1.704-2.257-1.914-3.625 2.875-.039 5.746-.082 8.625-.074-.075-1.828-.118-3.894-1.45-5.308-2.199-2.43-6.644-1.657-8.152 1.175m-8.414-2.336v12.008c.652 0 1.312 0 1.973.004.023-2.195-.04-4.394.023-6.594.016-1.27.527-2.558 1.484-3.414.801-.605 1.883-.27 2.801-.246-.012-.636-.02-1.27-.023-1.902-1.793-.398-3.336.652-4.242 2.117-.02-.633-.04-1.266-.051-1.894-.656-.024-1.313-.051-1.965-.079zm0 0" />
                                                <path d="M58.758 89.223c1.652-.805 4.023-.41 4.945 1.3 1.05 1.887 1.027 4.383-.137 6.211-1.52 2.286-5.527 1.786-6.523-.742-1.008-2.258-.617-5.484 1.715-6.77zm0 0M79.04 92.414c.046-1.574 1.144-3.137 2.726-3.48.976-.164 2.097.007 2.773.793.672.714.813 1.714.98 2.64-2.16.012-4.32-.031-6.48.047zm0 0" />
                                            </g>
                                        </svg>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Projects Section -->
<section id="projects" class="projects section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <!-- Projects Filters -->
            <?php
            // Fetch up to 3 projects for filters
            $query = mysqli_query($connection, "SELECT * FROM tbl_projects WHERE project_status='activate' AND disabled_status='enabled' ORDER BY project_id DESC LIMIT 3");
            $projects = [];
            if (mysqli_num_rows($query) > 0) {
                echo '<ul class="projects-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">';
                echo '<li data-filter="*" class="filter-active">All</li>';
                // Store fetched projects for later use
                foreach ($query as $data) {
                    $title = preg_replace('/[^A-Za-z0-9\-]/', '_', $data['project_title']);
                    $projects[] = $data;
                    echo "<li data-filter='.filter-$title'>$data[project_title]</li>";
                }
                echo '</ul>';
            }
            ?>

            <!-- Projects Items -->
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <?php
                // Display only the fetched projects
                if (count($projects) > 0) {
                    $count = 1;
                    foreach ($projects as $data) {
                        $project_desc = strlen($data['project_desc']) > 30 ? substr($data['project_desc'], 0, 30) . '...' : $data['project_desc'];
                        $title = preg_replace('/[^A-Za-z0-9\-]/', '_', $data['project_title']);
                        echo "<div class='col-lg-4 col-md-6 projects-item isotope-item  filter-$title'>";
                        echo "<img src='../admin/$data[project_thumbnail]' class='img-fluid w-100 shadow rounded' alt='Thumbnail'>";
                        echo "<div class='projects-info'>";
                        echo "<h4>$data[project_title]</h4>";
                        echo "<p class='project_length_exceed'>$project_desc</p>";
                        echo "<button title='More Details' data-bs-toggle='modal' data-bs-target='#$title-$count' class='details-link btn border-primary ms-2'><i class='bi bi-link-45deg'></i></button>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='modal fade' id='$title-$count' tabindex='-1' aria-labelledby='$title-$count-Label' aria-hidden='true'>";
                        echo "<div class='modal-dialog modal-lg'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h1 class='modal-title fs-5' id='$title-$count-Label'>$data[project_title]</h1>";
                        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        echo "<div class='card p-3'>";
                        echo "<video id='project_video_thumbnail' poster='../admin/$data[project_thumbnail]' height='500px' width='100%' controls>";
                        echo "<source src='../admin/$data[project_video]' id='view_video' type='video/mp4'>";
                        echo "</video>";
                        echo "<div class='mt-3'>";
                        echo "<h6 class='text-dark'>Project Title: <span class='text-primary'>$data[project_title]</span></h6>";
                        echo "<h6 class='text-dark'>Project Description: <span class='text-primary'>$data[project_desc]</span></h6>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        $count++;
                    }
                }
                ?>
            </div>

        </div>
    </div>

</section>

<!-- Team Section -->
<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="pic mb-3"><img src="assets/img/team/ahmed.jpeg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Ahmed Raza</h4>
                        <span>Full-Stack Developer</span>
                        <p class="text-center">Intermediate In Making Dynamic Websites.</p>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""> <i class="bi bi-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div><!-- End Team Member -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="pic mb-3"><img src="assets/img/team/hassan.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Muhammad Hassan</h4>
                        <span>Backend Developer</span>
                        <p class="text-center">Intermediate In Making Dynamic Backends.</p>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""> <i class="bi bi-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div><!-- End Team Member -->
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="pic mb-3"><img src="assets/img/team/taha.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Syed Muhammad Taha</h4>
                        <span>Software Engineer</span>
                        <p class="text-center">Intermediate In Making All Type Of Softwares.</p>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""> <i class="bi bi-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div><!-- End Team Member -->

        </div>

    </div>

</section><!-- /Team Section -->


<?php include("bottom.php"); ?>