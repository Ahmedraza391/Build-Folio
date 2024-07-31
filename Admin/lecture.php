<?php
$page = "lecture";
?>
<title>Build Folio - Lectures</title>
<?php include("top.php"); ?>
<section class="mainRight container">
  <h2>Lectures</h2>
  <div class="overflow_table lec_table  mb-3">
    <table class="table table-bordered table-striped mt-2 text-center">
      <thead>
        <th>ID</th>
        <th>Video</th>
        <th>Title</th>
        <th>Description</th>
        <th>Course</th>
        <th>Techonology</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>

      <tbody id="lecture-list">

      </tbody>
    </table>
  </div>
  <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#add_lecture">
    Add Lecture
  </button>
  <!-- Add Lecture Modal -->
  <div class="modal fade" id="add_lecture" tabindex="-1" aria-labelledby="add_lectureLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add_lectureLabel">Add Lecture</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="lectureForm" enctype="multipart/form-data">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="lectureTitle" id="lectureTitle" placeholder="" required>
              <label for="lectureTitle">Lecture Title</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="lectureDesc" id="lectureDesc" placeholder="" required>
              <label for="lectureDesc">Lecture Description</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" name="course" id="course" aria-label="Floating label select example">
                <option hidden selected value="">Select Course</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_course");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $course) {
                    echo "<option value='{$course['course_id']}'>{$course['course_name']}</option>";
                  }
                } else {
                  echo "<option selected>Courses Not Found</option>";
                }
                ?>
              </select>
              <label for="course">Courses</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" name="lang_id" id="lang_id" aria-label="Floating label select example">
                <option hidden selected value="">Select Lecture</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_language");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $lang) {
                    echo "<option value='{$lang['lang_id']}'>{$lang['lang_name']}</option>";
                  }
                } else {
                  echo "<option selected>Lectures Not Found</option>";
                }
                ?>
              </select>
              <label for="lang_id">Lectures</label>
            </div>
            <div class="card p-2 border mb-3">
              <label for="thumbnail" class="form-lable">Video Thumbnail</label>
              <input type="file" name="thumbnail" id="thumbnail" class="form-control my-2" required>
            </div>
            <div class="card p-2 border mb-3">
              <label for="video" class="form-lable">Video</label>
              <input type="file" name="video" id="video" class="form-control my-2" required>

            </div>

            <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Enter">
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- View Lecture Modal -->
  <div class="modal fade" id="ViewLectureModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ViewLectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ViewLectureModalLabel">View Lecture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card p-3">
            <video src="" poster="" class="w-100" id="view_thumbnail" controls>
              <source id="view_video" type="video/mp4">
            </video>
            <hr>
            <h6>Lecture Id: #<span id="view_lec_id"></span></h6>
            <h6>Lecture Title: <span id="view_lec_title"></span></h6>
            <h6>Lecture Description: <span id="view_lec_desc"></span></h6>
            <h6>Course: <span id="view_course"></span></h6>
            <h6>Technology: <span id="view_technology"></span></h6>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Lecture Modal -->
  <div class="modal fade" id="EditLectureModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="EditLectureModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditLectureModal">Edit Lecture</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <video src="" poster="" class="w-100" id="edit_thumbnail_display" controls>
            <source id="eidt_video_play" type="video/mp4">
          </video>
          <form id="video_thumbnail_form" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="edit_lec_id_v_t" id="edit_lec_id_v_t">
            <div class="card p-2 border mb-3">
              <label for="edit_thumbnail" class="form-label">Upload Thumbnail</label>
              <input type="file" name="edit_thumbnail" id="edit_thumbnail" class="form-control my-2">
            </div>
            <div class="card p-2 border mb-3">
              <label for="edit_video" class="form-label">Upload Video</label>
              <input type="file" name="edit_video" id="edit_video" class="form-control my-2">
            </div>
            <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Update">
          </form>

          <form id="EditLectureForm" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="edit_lec_id_form" id="edit_lec_id_form">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="edit_lectureTitle" id="edit_lectureTitle" placeholder="" required>
              <label for="edit_lectureTitle">Lecture Title</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="edit_lectureDesc" id="edit_lectureDesc" placeholder="" required>
              <label for="edit_lectureDesc">Lecture Description</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" name="edit_course" id="edit_course" aria-label="Floating label select example">
                <option hidden selected value="">Select Course</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_course");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $course) {
                    echo "<option value='{$course['course_id']}'>{$course['course_name']}</option>";
                  }
                } else {
                  echo "<option selected>Courses Not Found</option>";
                }
                ?>
              </select>
              <label for="edit_course">Courses</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" name="edit_lang_id" id="edit_lang_id" aria-label="Floating label select example">
                <option hidden selected value="">Select Lecture</option>
                <?php
                $query = mysqli_query($connection, "SELECT * FROM tbl_language");
                if (mysqli_num_rows($query) > 0) {
                  foreach ($query as $lang) {
                    echo "<option value='{$lang['lang_id']}'>{$lang['lang_name']}</option>";
                  }
                } else {
                  echo "<option selected>Lectures Not Found</option>";
                }
                ?>
              </select>
              <label for="edit_lang_id">Lectures</label>
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
</section>
<?php include("bottom.php"); ?>