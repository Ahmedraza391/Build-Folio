<?php 
include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"SELECT * FROM tbl_course WHERE course_id=$cid");
    $result ="";
    foreach($query as $row){
        $result .= " <input type='hidden' name='cid' id='courseID' value='$row[course_id]'/>
        <input type='text' name='courseName' id='UpdCName' placeholder='course name' class='form-control' value='$row[course_name]' required>";
        echo $result;
    };

?>