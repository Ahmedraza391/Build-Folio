<?php
include("../connection.php");
$id = $_GET['id'];
$check_id = mysqli_query($connection,"SELECT * FROM tbl_course WHERE course_id = $id");
if(mysqli_num_rows($check_id)>0){
    $update_query = mysqli_query($connection,"UPDATE tbl_course SET disabled_status='enabled' WHERE course_id = $id");
    if($update_query){
        echo "<script>alert('Course Enabled Successfully');window.location.href = 'course_management.php'</script>";
    }else{
        echo "Error in Setting Status";
    }
}else{
    echo "<script>window.location.href = 'error_page.php'</script>";
}

?>