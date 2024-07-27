<?php
include("../connection.php");
$query = mysqli_query($connection,"SELECT * FROM tbl_user");
$result = "";
foreach($query as $rows){
    $result .= "<tr>
                    <td>$rows[user_id]</td>
                    <td>$rows[user_name]</td>
                    <td>$rows[user_email]</td>
                    <td>$rows[user_image]</td>
                    <td>$rows[user_status]</td>
                  <td><button type='button' class='btn btn-dark EditUserBtn' data-bs-toggle='modal' uid='$rows[user_id]' data-bs-target='#EditUserModal' '>
  Edit
</button>
                  <button id=''  data-bs-toggle='modal' data-bs-target='#DeletePermission' class='btn btn-dark'>Delete</button>
                  </td>
    </tr>";
};
echo $result;
?>