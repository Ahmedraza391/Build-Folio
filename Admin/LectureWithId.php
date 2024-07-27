<?php 
include("../connection.php");
$cid = $_POST['lectid'];
$query = mysqli_query($connection,"select * from ((tbl_lectures inner JOIN  tbl_course on tbl_lectures.course_id=tbl_course.course_id) inner join tbl_language on tbl_lectures.lang_id=tbl_language.lang_id) where tbl_lectures.id=$cid");
$result = mysqli_fetch_assoc($query);
$object = "";
    $object .= "
    <input type='hidden' name='lectid' id='lectID' value='$result[id]'/>
    <span><strong>Title</strong></span>
        <input type='text' name='updLectTitle' id='updLectTitle' placeholder='Title' class='form-control my-2' value='$result[title]' required>
        <span><strong>Description</strong></span>
      <input type='text' name='updLectDesc' id='updLectDesc' placeholder='Description' class='form-control my-2' value='$result[description]' required>
      <span><strong>Current Course</strong></span>
      ";
      ?>
      <?php 
      $object .="<select name='course_id' class='form-control my-2'>
        <option hidden value='$result[course_id]' selected>$result[course_name]</option>
      ";
    
   foreach(mysqli_query($connection,"SELECT * FROM tbl_course") as $rows){
     $object .= " 
     <option value='$rows[course_id]'>$rows[course_name]</option>";
    };
   $object .= "</select>";

   $object .= "
   <span><strong>Current Technology</strong></span>
   <select name='lang_id' class='form-control my-2'>
   <option hidden value='$result[lang_id]' selected>$result[lang_name]</option>";
   foreach(mysqli_query($connection,"SELECT * FROM tbl_language") as $lang){
    $object .= "<option value='$lang[lang_id]'>$lang[lang_name]</option>";
   }
   $object .= "</select>";
    $object .= "<span><strong>Video</strong></span>
      <input type='file' name='editVideo' id='editVideo' />";
      echo $object;
      ?>
   
      
      
    
    