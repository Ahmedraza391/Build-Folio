<?php
include("../connection.php");
$id = $_GET['id'];
$check_id = mysqli_query($connection,"SELECT * FROM tbl_projects WHERE project_id = $id");
if(mysqli_num_rows($check_id)>0){
    $update_query = mysqli_query($connection,"UPDATE tbl_projects SET disabled_status='disabled' WHERE project_id = $id");
    if($update_query){
        echo "<script>alert('Project Disabled Successfully');window.location.href = 'project_management.php'</script>";
    }else{
        echo "Error in Setting Status";
    }
}else{
    echo "<script>window.location.href = 'error_page.php'</script>";
}

?>