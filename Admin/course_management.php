<?php
$page = "course";
?>
<title>Build Folio - Course</title>
<?php include("./components/top.php"); ?>
<?php
if (!isset($_SESSION['folio_admin'])) {
    echo "<script>window.location.href='admin_login.php'</script>";
}
?>
<section class="container mt-5">
    <div class="content row justify-content-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card p-3 shadow">
                <h2 class="text-center text-primary fw-bold">Courses</h2>
                <div class="overflow_table">
                    <table class="table table-bordered table-striped mt-2 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course</th>
                                <th>Technologies</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="courses_table">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_course">
                            Add Courses
                        </button>
                    </div>
                    <div class="col-md-9"></div>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="add_course" tabindex="-1" aria-labelledby="add_courseLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add_courseLabel">Add Course</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="course_form">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="course" id="course" placeholder="" required>
                                            <label for="course">Course Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="technology" name="technology">
                                                <option selected value="" hidden>Select Technology</option>
                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM tbl_technology WHERE disabled_status='enabled' AND status='activate'");
                                                if (mysqli_num_rows($query) > 0) {
                                                    foreach ($query as $option) {
                                                        echo "<option value='$option[id]'>$option[technology]</option>";
                                                    }
                                                } else {
                                                    echo "<option>Technology Not Found</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="technology">Technologies</label>
                                        </div>
                                        <button class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Modal -->
                <div class="modal fade" id="view_technology_Modal" tabindex="-1" aria-labelledby="view_technology_ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="view_technology_ModalLabel">View Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

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
                                    <form id="edit_course_form">
                                        <input type="hidden" name="edit_course_id" id="edit_course_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_course" id="edit_course" placeholder="" required>
                                            <label for="edit_course">Course</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="edit_technology" name="edit_technology">
                                                <option selected value="" hidden>Select Technology</option>
                                                <?php
                                                $query = mysqli_query($connection, "SELECT * FROM tbl_technology WHERE disabled_status='enabled' AND status='activate'");
                                                if (mysqli_num_rows($query) > 0) {
                                                    foreach ($query as $option) {
                                                        echo "<option value='{$option['id']}'>{$option['technology']}</option>";
                                                    }
                                                } else {
                                                    echo "<option>Technology Not Found</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="edit_technology">Technologies</label>
                                        </div>

                                        <button class="btn btn-primary">Save changes</button>
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