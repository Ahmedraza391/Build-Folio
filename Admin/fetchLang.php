<?php
include("../connection.php");
$query = mysqli_query($connection,"SELECT * FROM tbl_language");
$result ="";
foreach($query as $rows){
    $result .= "<tr>
    <td>$rows[lang_id]</td>
    <td>$rows[lang_name]</td>
    <td>$rows[course_id]</td>
    <td><button type='button' class='btn btn-dark EditLanguage' data-bs-toggle='modal' data-bs-target='#Editlang'  cid='$rows[lang_id]'>
  Edit
</button>
<button type='button' class='btn btn-danger Deltlang' data-bs-toggle='modal' data-bs-target='#DeleteLangPermission'  cid='$rows[lang_id]'>
  Delete
</button>
</td>
    </tr>";
}
echo $result;
?>