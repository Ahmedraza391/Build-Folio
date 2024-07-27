<?php include("../connection.php");
$cid = $_POST['cid'];

$query = mysqli_query($connection,"select * from ((tbl_lectures inner JOIN  tbl_course on tbl_lectures.course_id=tbl_course.course_id) inner join tbl_language on tbl_lectures.lang_id=tbl_language.lang_id) where tbl_lectures.id=$cid");
$lectResult = mysqli_fetch_assoc($query);

   $result = "
   <input type='hidden' name='lectid' id='lectID' leid='$lectResult[id]'/>
   <video src='$lectResult[videoPath]' width=350 height=250 controls></video><br>
   <span lectTitle='$lectResult[title]'><strong>Title :</strong> $lectResult[title]</span><br>
   <span><strong>Description :</strong> $lectResult[description]</span><br>
       <span><strong>Course Name :</strong> $lectResult[course_name]</span><br>
       <span><strong>Technology :</strong> $lectResult[lang_name]</span><br>
       <span class='text-danger'>Are you sure you want to delete this lecture?</span>
   ";
   echo $result;

?>