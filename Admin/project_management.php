<?php
$page = "project";
?>
<title>Build Folio - Project Management</title>
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
                <h2 class="text-center text-primary fw-bold">Projects</h2>
                <div class="overflow_table mb-3">
                    <table class="table table-bordered table-striped mt-2 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Title</th>
                                <th>Status</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="project_table">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_project">
                            Add Projects
                        </button>
                    </div>
                    <div class="col-md-9"></div>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="add_project" data-bs-backdrop="static" tabindex="-1" aria-labelledby="add_projectLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add_projectLabel">Add Project</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="projectForm" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="project_title" id="project_title" placeholder="" required>
                                            <label for="project_title">Project Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="" name="project_desc" id="project_desc"></textarea>
                                            <label for="project_desc">Project Description</label>
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="project_thumbnail" class="form-label">Video Thumbnail</label>
                                            <input type="file" name="project_thumbnail" id="project_thumbnail" class="form-control my-2" required>
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="project_video" class="form-label">Video</label>
                                            <input type="file" name="project_video" id="project_video" class="form-control my-2" required>
                                        </div>
                                        <button class="btn btn-primary">Add Project</button>
                                    </form>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Project Modal -->
                <div class="modal fade" id="ViewProject" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ViewProjectLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewProjectLabel">View Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card p-3">
                                    <video id="view_video_player" height="500px" width="100%" controls>
                                        <source id="view_video" type="video/mp4">
                                    </video>
                                    <hr>
                                    <h6>Project Title: <span id="view_project_title"></span></h6>
                                    <h6>Project Description: <span id="view_project_desc"></span></h6>
                                    <h6>Status: <span id="view_project_status"></span></h6>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_project" tabindex="-1" aria-labelledby="edit_projectLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit_projectLabel">Edit / Update Project</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <video poster="" class="w-100" id="edit_thumbnail_display" height="500px" controls>
                                        <source id="edit_video_play" type="video/mp4">
                                    </video>
                                    <form id="project_video_thumbnail_form" enctype="multipart/form-data" method="POST">
                                        <input type="hidden" name="edit_project_id_v_t" id="edit_project_id_v_t">
                                        <div class="card p-2 border mb-3">
                                            <label for="edit_project_thumbnail" class="form-label">Upload Thumbnail</label>
                                            <input type="file" name="edit_project_thumbnail" id="edit_project_thumbnail" class="form-control my-2">
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="edit_project_video" class="form-label">Upload Video</label>
                                            <input type="file" name="edit_project_video" id="edit_project_video" class="form-control my-2">
                                        </div>
                                        <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Update">
                                    </form>
                                    <form id="edit_project_form">
                                        <input type="hidden" name="edit_project_id" id="edit_project_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_project_title" id="edit_project_title" placeholder="" required>
                                            <label for="edit_project_title">Project Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="" name="edit_project_desc" id="edit_project_desc"></textarea>
                                            <label for="edit_project_desc">Project Description</label>
                                        </div>
                                        <button class="btn btn-primary">Update Project</button>
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