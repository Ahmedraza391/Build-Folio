<?php include("top.php"); 
?>

<section class="mainRight container">
    <h2>All Users</h2>
    <table class="table table-bordered table-striped mt-2 text-center" >
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
        </thead>
        
        <tbody id="user-list">
             
        </tbody>
    </table>

<!-- Update Lecture Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditLectureModal">Edit Lecture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="userModalBody p-2">  
        
         </div>
    
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <input type="submit" name="btnEnter" class="btn btn-secondary my-2" value="Edit">
    </div>
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
        