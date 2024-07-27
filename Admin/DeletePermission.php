<?php include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"SELECT * FROM tbl_course WHERE course_id=$cid");
$result = "";
foreach($query as $row){
   $result .= "<span courid='$row[course_id]' id='cDeltId'><strong>ID :</strong> $row[course_id]</span><br>
   <span><strong>Name :</strong> $row[course_name]</span><br>
       <span class='text-danger'>Are you sure you want to delete this course?</span>
   "."";
   echo $result;
}
?>