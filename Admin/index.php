<?php include("top.php"); ?>
<style>
    .cards{
        box-shadow:0 0 8px gray;
    }
</style>

<section class="mainRight container">
    <div class="content row gap-1 justify-content-center">
        <div class="cards p-3 col-md-3">
            <h4>Course</h4>
            <div>
              <span><strong>Total Courses : </strong></span>  <?php echo mysqli_num_rows(mysqli_query($connection,"SELECT * FROM tbl_course")); ?>
            </div>
        </div>
        <div class="cards p-3 col-md-3 bg">
        <h4>Lectures</h4>
            <div>
              <span><strong>Total Lectures : </strong></span>  <?php echo mysqli_num_rows(mysqli_query($connection,"SELECT * FROM tbl_lectures")); ?>
            </div>
        </div>
        <div class="cards p-3 col-md-3 bg">
            <h4>Technologie</h4>
            <span><strong>Total Technologies : </strong></span>  <?php echo mysqli_num_rows(mysqli_query($connection,"SELECT * FROM tbl_language")); ?>
        </div>
    </div>
</section>

<?php include("bottom.php"); ?>