<?php
include("../connection.php");
$query = mysqli_query($connection,"SELECT * FROM tbl_lectures");
$result = "";
foreach($query as $rows){
    $result .= "<tr>
    
                  <td>$rows[id]</td>
                  <td><video src='$rows[videoPath]' width='150' height='150' controls></video></td>
                  <td>$rows[title]</td>
                  <td>$rows[description]</td>
                  <td>$rows[course_id]</td>
                  <td>$rows[lang_id]</td>
                  <td><button type='button' class='btn btn-dark EditLectureBtn' data-bs-toggle='modal' data-bs-target='#EditLectureModal'  lectid='$rows[id]'>
  Edit
</button>
                  <button id='btnLectDelt' lectid='$rows[id]' data-bs-toggle='modal' data-bs-target='#DeletePermission' class='btn btn-dark DeltLectureBtn'>Delete</button>
                  </td>
    </tr>";
};
echo $result;
?>