<?php 
include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"SELECT * FROM tbl_language inner join tbl_course on tbl_language.course_id=tbl_course.course_id WHERE lang_id=$cid");
    $result ="";
    foreach($query as $row){
        $result .= "
        <div class='my-2'>
        <input type='hidden' name='cid' id='langID' value='$row[lang_id]'/>
        <span><strong>Technology Name</strong></span>
        <input type='text' name='langName' id='UpdLangName' placeholder='language name' class='form-control' value='$row[lang_name]' required>
        </div>
        <div class='my-2'>
           <span><strong>Current Course</strong></span>
        <input type='text' name='langName' id='UpdLangName' placeholder='language name' class='form-control' value='$row[course_name]' required>
        </div>";
        echo $result;
    };

?>