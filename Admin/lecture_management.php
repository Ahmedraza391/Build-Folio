<?php
$page = "lecture";
?>
<title>Build Folio - Lecture Management</title>
<?php include("./components/top.php"); ?>
<?php
if (!isset($_SESSION['folio_admin'])) {
    echo "<script>window.location.href='admin_login.php'</script>";
}
?>
<section class="mainRight container">
    <div class="content row gap-1 justify-content-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card p-3 shadow">
                <h2 class="text-center text-primary fw-bold">Lectures</h2>
                <div class="overflow_table mb-3">
                    <table class="table table-bordered table-striped mt-2 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lecture</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="lectures_table">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_lecture">
                            Add Lectures
                        </button>
                    </div>
                    <div class="col-md-9"></div>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="add_lecture" data-bs-backdrop="static" tabindex="-1" aria-labelledby="add_lectureLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add_lectureLabel">Add Lecture</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="lectureForm">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="lecture_title" id="lecture_title" placeholder="" required>
                                            <label for="lecture_title">Lecture Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="" name="lecture_desc" id="lecture_desc"></textarea>
                                            <label for="lecture_desc">Lecture Description</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="course" name="course">
                                                <option selected value="" hidden>Select Course</option>
                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM tbl_course WHERE disabled_status='enabled' AND status='activate'");
                                                if (mysqli_num_rows($query) > 0) {
                                                    foreach ($query as $option) {
                                                        echo "<option value='$option[course_id]' name='$option[course_name]'>$option[course_name]</option>";
                                                    }
                                                } else {
                                                    echo "<option>Course Not Found</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="course">Courses</label>
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="thumbnail" class="form-lable">Video Thumbnail</label>
                                            <input type="file" name="thumbnail" id="thumbnail" class="form-control my-2" required>
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="video" class="form-lable">Video</label>
                                            <input type="file" name="video" id="video" class="form-control my-2" required>
                                        </div>
                                        <button class="btn btn-primary">Add Lecture</button>
                                    </form>
                                </div>
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
                                    <video id="view_video_player" height="500px" width="100%" controls>
                                        <source id="view_video" type="video/mp4">
                                    </video>
                                    <hr>
                                    <h6>Lecture Title: <span id="view_lec_title"></span></h6>
                                    <h6>Lecture Description: <span id="view_lec_desc"></span></h6>
                                    <h6>Course: <span id="view_course"></span></h6>
                                    <h6>Status: <span id="view_status"></span></h6>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_course_modal" tabindex="-1" aria-labelledby="edit_course_modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit_course_modalLabel">Edit / Update Course</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <video poster="" class="w-100" id="edit_thumbnail_display" height="500px" controls>
                                        <source id="edit_video_play" type="video/mp4">
                                    </video>
                                    <form id="video_thumbnail_form" enctype="multipart/form-data" method="POST">
                                        <input type="hidden" name="edit_lecture_id_t_v" id="edit_lecture_id_t_v">
                                        <input type="hidden" name="edit_lecture_course" id="edit_lecture_course">
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
                                    <form id="edit_lectureForm">
                                        <input type="hidden" name="edit_lecture_id" id="edit_lecture_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_lecture_title" id="edit_lecture_title" placeholder="" required>
                                            <label for="edit_lecture_title">Lecture Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="" name="edit_lecture_desc" id="edit_lecture_desc"></textarea>
                                            <label for="edit_lecture_desc">Lecture Description</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="edit_course" name="edit_course">
                                                <option selected value="" hidden>Select Course</option>
                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM tbl_course WHERE disabled_status='enabled' AND status='activate'");
                                                if (mysqli_num_rows($query) > 0) {
                                                    foreach ($query as $option) {
                                                        echo "<option value='$option[course_id]' name='$option[course_name]'>$option[course_name]</option>";
                                                    }
                                                } else {
                                                    echo "<option>Course Not Found</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="edit_course">Courses</label>
                                        </div>
                                        <button class="btn btn-primary">Update Lecture</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php include("./components/bottom.php"); ?>