<?php
include("../connection.php");
$uid = $_POST['UID'];
$query = mysqli_query($connection,"SELECT * FROM tbl_user WHERE user_id=$uid");
$user = mysqli_fetch_assoc($query);
echo $result = "
<input type='hidden' value='$user[user_id]' id='txtUserId' />
<span><strong>Username</strong></span>
    <input type='text' value='$user[user_name]' id='userName' name='userName' class='form-control my-1' readonly />
    <span><strong>Email</strong></span>
    <input type='text' value='$user[user_email]' id='userEmail' name='userEmail' class='form-control my-1' readonly />
    <span><strong>Status</strong></span>
<select id='userStatus' uid='$user[user_id]' class='form-select my-1'>
    <option value='$user[user_status]' selected hidden>$user[user_status]</option>
    <option value='Activate'>Activate</option>
    <option value='Deactivate'>Deactivate</option>
</select>";
?>