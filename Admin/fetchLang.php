<?php
include("../connection.php");
$query = mysqli_query($connection, "SELECT tbl_language.*,tbl_course.*,tbl_course.course_id as 'c_id' FROM tbl_language INNER JOIN tbl_course ON tbl_language.course_id = tbl_course.course_id");
$result = "";
if(mysqli_num_rows($query)>0){
  foreach ($query as $rows) {
    $result .= "<tr>
      <td>$rows[lang_id]</td>
      <td>$rows[lang_name]</td>
      <td>$rows[course_name]</td>
      <td>
        <button type='button' class='btn btn-primary EditLanguage' id='$rows[lang_id]' t_name='$rows[lang_name]' cid='$rows[c_id]'>Edit</button>
        <button type='button' class='btn btn-danger Deltlang' cid='$rows[lang_id]'>Delete</button>
      </td>
      </tr>";
  }
  echo $result;
}else{
  echo "<tr><td colspan='4'>Technology Not Found</td></tr>";
}
