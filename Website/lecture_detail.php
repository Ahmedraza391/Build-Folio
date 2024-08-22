<?php include("../connection.php"); ?>
<?php
session_start();
$page = "lecture";
$_SESSION['page_url'] = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['user_login'])) {
  header("location:user_login.php");
}
// for check user activate or not
$message = "";
$user_id = $_SESSION['user_login']['user_id'];
$check_user_query = mysqli_query($connection,"SELECT * FROM tbl_users WHERE user_id = $user_id AND user_status = 'activate'");
if(mysqli_num_rows($check_user_query)>0){
  
}else{
  $message = "<div class='blur_detail_background text-center'><h4 class='text-dark fw-bold fs-2'>Unlock All Courses,Lectures, and Projects for 1000 Rs and Get Lifetime Access!</h4></div>";
}

// for fetch project title in title tag
$id = $_GET['id'];
$check_id_exists = mysqli_query($connection, "SELECT * FROM tbl_lectures WHERE id='$id'");
if (mysqli_num_rows($check_id_exists) > 0) {
  $query = mysqli_query($connection, "SELECT * FROM tbl_lectures WHERE id='$id'");
  $fetch = mysqli_fetch_assoc($query);
} else {
  echo "<script>alert('Id Not Found');window.location.href='lectures.php'</script>";
}
?>
<title>Buil Folio - <?php echo $fetch['lecture_title'] ?></title>
<?php include("top.php"); ?>
<style>
  .header {
    background-color: #4668a2;
  }
</style>
<main class="main lecture_detail_section">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="container">
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Lecture-Details</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Portfolio Details Section -->
  <section id="portfolio-details" class="portfolio-details outer_section">
    <?php echo $message ?>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <?php
        $id = $_GET['id'];
        $check_id_exists = mysqli_query($connection, "SELECT * FROM tbl_lectures WHERE id='$id'");
        if (mysqli_num_rows($check_id_exists) > 0) {
          $query = mysqli_query($connection, "SELECT * FROM tbl_lectures WHERE id='$id'");
          $fetch = mysqli_fetch_assoc($query);
        } else {
          echo "<script>alert('Id Not Found');window.location.href='lectures.php'</script>";
        }
        ?>
        <div class="col-lg-8">
          <div class="card shadow">
            <div class="video">
              <video poster="../Admin<?php echo $fetch['video_thumbnail'] ?>" style="width:100% !important; height: 100%; max-height: 400px; object-fit: cover;" controls>
                <source src="../Admin<?php echo $fetch['video'] ?>" type="video/mp4">
                <source src="../Admin<?php echo $fetch['video'] ?>" type="video/ogg">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info mt-2 shadow" data-aos="fade-up" data-aos-delay="200">
            <h3>Lecture information</h3>
            <ul>
              <li><strong>Title</strong>: <?php echo $fetch['lecture_title']; ?></li>
              <li><strong>Description</strong>: <br> <?php echo $fetch['lecture_description']; ?></li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </section><!-- /Portfolio Details Section -->

</main>

<?php include("bottom.php"); ?>