<?php
$page = "technology";
?>
<title>Build Folio - Technology</title>
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
                <h2 class="text-center text-primary fw-bold">Technologies</h2>
                <div class="overflow_table">
                    <table class="table table-bordered table-striped mt-2 text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Technology</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="technology_table">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_technology">
                            Add Technologies
                        </button>
                    </div>
                    <div class="col-md-9"></div>
                </div>

                <!-- Add Modal -->
                <div class="modal fade" id="add_technology" tabindex="-1" aria-labelledby="add_technologyLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add_technologyLabel">Add Technology</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="technology_form">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="technology" id="technology" placeholder="" required>
                                            <label for="technology">Technology</label>
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
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_technology_modal" tabindex="-1" aria-labelledby="edit_technology_modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="edit_technology_modalLabel">Edit / Update Technology</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form">
                                    <form id="edit_technology_form">
                                        <input type="hidden" name="edit_technology_id" id="edit_technology_id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="edit_technology" id="edit_technology" placeholder="" required>
                                            <label for="edit_technology">Technology</label>
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