<?php
$page = "language";
?>
<title>Build Folio - Languages</title>
<?php include("top.php") ?>
<?php
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='admin_login.php'</script>";
}
?>
<section class="mainRight container">
  <h2>Technologies</h2>
  <div class="overflow_table">
    <table class="table table-bordered table-striped mt-2 text-center" id="allCourseTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Course</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="language-list">

      </tbody>
    </table>

  </div>
  <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#add_technology">
    Add Technology
  </button>
  <!-- Add Course Modal -->
  <div class="modal fade" id="add_technology" tabindex="-1" aria-labelledby="add_technologyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add_technologyLabel">Add Technology</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="langForm" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="langName" name="langName" placeholder="" required>
              <label for="langName">Technology Name</label>
            </div>
            <div class="form-floating">
              <select class="form-select" name="course" id="course" requiredaria-label="Floating label select example">
                <option selected hidden value="">Select Course</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_course");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $course) {
                    echo "<option value='$course[course_id]'>$course[course_name]</option>";
                  }
                } else {
                  echo "<option selected >Course Not Found</option>";
                }
                ?>
              </select>
              <label for="course">Courses</label>
            </div>
            <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Insert">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Course Modal -->
  <div class="modal fade" id="update_technology" tabindex="-1" aria-labelledby="update_technologyLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="update_technologyLabel">Edit Language</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="EditLangForm" method="POST">
            <input type="hidden" name="editlangid" id="editlangid" >
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="editlangName" name="editlangName" placeholder="" required>
              <label for="editlangName">Technology Name</label>
            </div>
            <div class="form-floating">
              <select class="form-select" name="editcourse" id="editcourse" requiredaria-label="Floating label select example">
                <option selected hidden value="">Select Course</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_course");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $course) {
                    echo "<option value='$course[course_id]'>$course[course_name]</option>";
                  }
                } else {
                  echo "<option selected >Course Not Found</option>";
                }
                ?>
              </select>
              <label for="editcourse">Courses</label>
            </div>
            <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Insert">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("bottom.php"); ?>