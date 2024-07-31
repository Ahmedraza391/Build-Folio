<?php
include("../connection.php");
$query = mysqli_query($connection, "SELECT * FROM tbl_course");
$result = "";
if (mysqli_num_rows($query) > 0) {
  foreach ($query as $rows) {
    $result .= "<tr>
      <td>$rows[course_id]</td>
      <td>$rows[course_name]</td>
      <td><button type='button' class='btn btn-primary btn-sm EditCourse' cid='$rows[course_id]' c_name='$rows[course_name]'>
    Edit
  </button>
  <button type='button' class='btn btn-danger btn-sm DeltCourse' cid='$rows[course_id]'>
    Delete
  </button>
  </td>
      </tr>";
  }
  echo $result;
} else {
  echo "<tr><td colspan='4'>Course Not Found</td></tr>";
}
