<?php
include("../connection.php");
$query = mysqli_query($connection,"SELECT * FROM tbl_course");
$result ="";
foreach($query as $rows){
    $result .= "<tr>
    <td>$rows[course_id]</td>
    <td>$rows[course_name]</td>
    <td><button type='button' class='btn btn-dark EditCourse' data-bs-toggle='modal' data-bs-target='#EditCourse'  cid='$rows[course_id]'>
  Edit
</button>
<button type='button' class='btn btn-danger DeltCourse' data-bs-toggle='modal' data-bs-target='#DeletePermission'  cid='$rows[course_id]'>
  Delete
</button>
</td>
    </tr>";
}
echo $result;
?>