<?php include("top.php") ; ?>
<section class="mainRight container">
    <h2>All Courses</h2>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Course
</button>
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
<!-- Add Course Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="myForm" method="POST">
      <div class="modal-body">
        <input type="text" name="courseName" id="courseName" placeholder="course name" class="form-control" required>
       
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Enter">
    </div>
</form>
    </div>
  </div>
</div>
<!-- Update Course Modal -->
<div class="modal fade" id="EditCourse" tabindex="-1" aria-labelledby="EditCourseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditCourseLabel">Edit Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="EditForm" method="POST">
      <div class="fetchModalBody">
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