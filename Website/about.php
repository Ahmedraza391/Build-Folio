<?php
    include("../connection.php");
    session_start();
    $page = "about";
    $_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
?>
<title>Build Folio - About</title>
<?php include("top.php"); ?>  
<style>
    .header {
        background-color: #4668a2;
    }
</style>
<!-- About Section -->
<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <p>
                    Welcome to our website, a dedicated platform for learning and mastering web development and software technologies. Here, you will find a comprehensive collection of lectures and tutorials designed to equip you with the skills needed to thrive in the tech industry.<br><br>

                    Our mission is to bridge the gap between theoretical knowledge and practical application. We offer real-world project insights to help you understand how market-ready solutions are developed and implemented.<br><br>

                    We believe that with the right guidance and resources, every student can become an expert in their chosen field. Join us on this journey to unlock your full potential and achieve your career aspirations in the ever-evolving world of technology. </p>
            </div>
            <div class="col-lg-2"></div>

        </div>

    </div>

</section><!-- /About Section -->

<?php include("bottom.php"); ?>