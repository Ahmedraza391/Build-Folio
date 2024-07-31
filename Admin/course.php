<?php
$page = "course";
?>
<title>Build Folio - Courses</title>
<?php include("top.php"); ?>
<section class="mainRight container">
  <h2>Courses</h2>
  <div class="overflow_table">
    <table class="table table-bordered table-striped mt-2 text-center" id="allCourseTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="courses-list">

      </tbody>
    </table>

  </div>
  <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#course_modal">
    Add Course
  </button>
  <!-- Add Course Modal -->
  <div class="modal fade" id="course_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="course_modalLabel">Add Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="myForm" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="courseName" id="courseName" placeholder="" required>
              <label for="courseName">Course Name</label>
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
  <div class="modal fade" id="EditCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditCourseLabel">Edit Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="EditForm" method="POST">
            <input type="hidden" name="edit_course_id" id="edit_course_id">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="editcourseName" name="editcourseName" placeholder="" required>
              <label for="editcourseName">Course Name</label>
            </div>
            <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Update">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Permission Modal -->
  <div class="modal fade" id="DeletePermission" tabindex="-1" aria-labelledby="DeletePermissionLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="DeletePermissionLabel">Delete Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="DeleteCourse" method="POST">
          <div class="DeletePermissionBody px-2">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include("bottom.php"); ?>