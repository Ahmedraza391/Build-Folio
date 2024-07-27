<?php include("top.php") ?>

<section class="mainRight container">
    <h2>All Technology</h2>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Technology
</button>
    <table class="table table-bordered table-striped mt-2 text-center" id="allCourseTable">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>course id</th>
                    <th>Actions</th>
                </tr>
        </thead>
        <tbody id="language-list">
    
        </tbody>
    </table>
<!-- Add Course Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Technology</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="langForm" method="POST">
      <div class="modal-body">
        <input type="text" name="langName" id="langName" placeholder="technology name" class="form-control" required>
        <select class="form-select my-2" name="course" id="course" required>
          <option hidden>Select any course</option>
        <?php foreach(mysqli_query($connection,"SELECT * FROM tbl_course") as $course){
          echo "<option value='$course[course_id]'>$course[course_name]</option>";
        } ?>
        </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Add">
    </div>
</form>
    </div>
  </div>
</div>
<!-- Update Course Modal -->
<div class="modal fade" id="Editlang" tabindex="-1" aria-labelledby="EditLangLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditLangLabel">Edit Language</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="EditLangForm" method="POST">
      <div class="LangModal px-2">
    </div>
    <div class="select px-2">
      <span><strong>Edit Course</strong></span>
      <select name="" id="courseId" class="form-select my-2" id="">
      <?php foreach(mysqli_query($connection,"SELECT * FROM tbl_course") as $course){
          echo "<option value='$course[course_id]'>$course[course_name]</option>";
        } ?>
      </select>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Enter">
    </div>
</form>
    </div>
  </div>
</div>
<!-- Delete Permission Modal -->
<div class="modal fade" id="DeleteLangPermission" tabindex="-1" aria-labelledby="DeleteLangPermissionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DeletePermissionLabel">Delete Language</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="DeleteLanguage" method="POST">
      <div class="DeleteLangPermissionBody px-2">
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