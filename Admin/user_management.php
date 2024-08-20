<?php
$page = "user";
?>
<title>Build Folio - User Management</title>
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
                <h2 class="text-center text-primary fw-bold">Users</h2>
                <div class="overflow_table mb-3">
                    <table class="table table-bordered table-striped mt-2 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="users_table">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_user">
                            Add Users
                        </button>
                    </div>
                    <div class="col-md-9"></div>
                </div>
                <!-- Add Modal -->
                <div class="modal fade" id="add_user" data-bs-backdrop="static" tabindex="-1" aria-labelledby="add_userLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add_userLabel">User Registration</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="user_form" method="POST" enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="user_name" id="user_name" placeholder="" required>
                                            <label for="user_name">User Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="" required>
                                            <label for="user_email">User Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="user_password" id="user_password" placeholder="" required>
                                            <label for="user_password">User Password</label>
                                        </div>
                                        <div class="card p-2 border mb-3">
                                            <label for="user_image" class="form-label">Upload Image</label>
                                            <input type="file" name="user_image" id="user_image" class="form-control my-2" required>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Add User</button>
                                    </form>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View User Modal -->
                <div class="modal fade" id="View_user" data-bs-backdrop="static" tabindex="-1" aria-labelledby="View_userLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="View_userLabel">View User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card p-3">
                                    <div class="image text-center mb-3">
                                        <img src="" id="view_user_image" style="width: 170px; height: 170px; border-radius: 50%;" alt="">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="content text-center">
                                                <h6 class="fs-6">User ID: #<span id="view_user_id" class="fs-6 fw-bold"></span></h6>
                                                <h6 class="fs-6">User Name: <span id="view_user_name" class="fs-6 fw-bold"></span></h6>
                                                <h6 class="fs-6">User Email: <span id="view_user_email" class="fs-6 fw-bold"></span></h6>
                                                <h6 class="fs-6">Uesr Password: <span id="view_user_password" class="fs-6 fw-bold"></span></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_user" tabindex="-1" aria-labelledby="edit_userLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit_userLabel">Edit / Update User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <div class="image text-center mb-3">
                                        <img src="" id="display_user_image" style="width: 170px; height: 170px; border-radius: 50%;" alt="">
                                    </div>
                                    <form id="profile_form" enctype="multipart/form-data" method="POST">
                                        <input type="hidden" name="edit_user_image_id" id="edit_user_image_id">
                                        <input type="hidden" name="edit_user_image_email" id="edit_user_image_email">
                                        <div class="card p-2 border mb-3">
                                            <label for="edit_image" class="form-label">Upload Image</label>
                                            <input type="file" name="edit_image" id="edit_image" class="form-control my-2" required>
                                        </div>
                                        <input type="submit" name="btnEnter" class="btn btn-primary my-2" value="Update Image">
                                    </form>
                                    <form id="edit_user_form">
                                        <input type="hidden" name="edit_user_id" id="edit_user_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_user_name" id="edit_user_name" placeholder="" required>
                                            <label for="edit_user_name">User Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="edit_user_email" id="edit_user_email" placeholder="" required>
                                            <label for="edit_user_email">User Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_user_password" id="edit_user_password" placeholder="" required>
                                            <label for="edit_user_password">User Password</label>
                                        </div>
                                        <button class="btn btn-primary">Update User</button>
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