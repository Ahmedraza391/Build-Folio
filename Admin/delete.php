<?php 
include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"DELETE FROM tbl_course WHERE course_id=$cid");
if($query){
    echo $result ="course deleted";
}
?>