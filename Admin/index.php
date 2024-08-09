<?php
$page = "home";
?>
<title>Build Folio - Home</title>
<?php include("top.php"); ?>
<?php
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='admin_login.php'</script>";
}
?>
<section class="mainRight container">
    <div class="content row gap-1 justify-content-center">
        <div class="card p-3 col-md-3 shadow mb-5 rounded custom-card">
            <h4>Course</h4>
            <div>
                <span><strong>Total Courses : </strong></span> <?php echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tbl_course")); ?>
            </div>
        </div>
        <div class="card p-3 col-md-3 shadow mb-5 rounded mx-3 custom-card">
            <h4>Lectures</h4>
            <div>
                <span><strong>Total Lectures : </strong></span> <?php echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tbl_lectures")); ?>
            </div>
        </div>
        <div class="card p-3 col-md-3 shadow mb-5 rounded mx-3 custom-card">
            <h4>Technologies</h4>
            <div>
                <span><strong>Total Technologies : </strong></span> <?php echo mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tbl_language")); ?>
            </div>
        </div>
    </div>
</section>

<?php include("bottom.php"); ?>