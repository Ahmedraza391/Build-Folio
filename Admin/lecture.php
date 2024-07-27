<?php include("top.php"); 
?>

<section class="mainRight container">
    <h2>All Lectures</h2>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Lecture
</button>
    <table class="table table-bordered table-striped mt-2 text-center" >
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Course_id</th>
                    <th>Lang_id</th>
                    <th>Actions</th>
                </tr>
        </thead>
        
        <tbody id="lecture-list">
             
        </tbody>
    </table>
<!-- Add Lecture Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Lecture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="lectureForm" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="text" name="Title" id="lectureTitle" placeholder="lecture title" class="form-control" required>
        <input type="text" name="Description" id="lectureDesc" placeholder="lecture description" class="form-control my-2" required>
        <select name="course_id" id="course" class="form-select" required>
          <option hidden>Select any course</option>
        <?php foreach(mysqli_query($connection,"SELECT * FROM tbl_course") as $course){
          echo "<option value='$course[course_id]'>$course[course_name]</option>";
        } ?>       
        </select>
        <select name="lang_id" id="language" class="form-select mt-2" required>
          <option hidden>Select any language</option>
        <?php foreach(mysqli_query($connection,"SELECT * FROM tbl_language") as $lang){
          echo "<option value='$lang[lang_id]'>$lang[lang_name]</option>";
        } ?> 
        </select>
        <input type="file" name="video" id="video" class="form-control my-2" required>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Enter">
    </div>
</form>
    </div>
  </div>
</div>
<!-- Update Lecture Modal -->
<div class="modal fade" id="EditLectureModal" tabindex="-1" aria-labelledby="EditLectureModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditLectureModal">Edit Lecture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="EditLectureForm" enctype="multipart/form-data" method="POST">
      <div class="LectureBody p-2">  
      
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
        <h1 class="modal-title fs-5" id="DeletePermissionLabel">Delete Lecture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="lectDeltForm" method="POST" enctype="multipart/form-data">
      <div class="DeleteLecturePermissionBody p-2">
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