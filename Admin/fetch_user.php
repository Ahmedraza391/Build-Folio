<?php
session_start();
include '../connection.php';

$query = "SELECT * FROM tbl_users";
$result = mysqli_query($connection, $query);
$output = '';
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td class='text-center'>{$data['user_id']}</td>";
        $output .= "<td class='text-left'>{$data['user_name']}</td>";
        $output .= "<td class='text-left'>{$data['user_email']}</td>";
        $output .= "<td class='text-center'>";
            if($data['user_status']=="deactivate"){
                $output .= "<a href='user_activate.php?id={$data['user_id']}' class='btn btn-primary btn-sm'>Activate</a>";
            }else{  
                $output .= "<a href='user_deactivate.php?id={$data['user_id']}' class='btn btn-danger btn-sm'>Deactivate</a>";
            }
        $output .= "</td>";
        
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm view-user' data-id='{$data['user_id']}' data-name='{$data['user_name']}' data-email='{$data['user_email']}' data-password='{$data['user_password']}' data-image='{$data['user_image']}'>View</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm edit-user' data-id='{$data['user_id']}' data-name='{$data['user_name']}' data-email='{$data['user_email']}' data-password='{$data['user_password']}' data-image='{$data['user_image']}'>Edit</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            if($data['disabled_status']=="enabled"){
                $output .= "<a href='user_disabled.php?id={$data['user_id']}' type='button' class='btn btn-danger btn-sm'>Disable</a>";
            }else{
                $output .= "<a href='user_enabled.php?id={$data['user_id']}' type='button' class='btn btn-primary btn-sm'>Enable</a>";
            }
        $output .= "</td>";
        
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='4'>User Not Found</td></tr>";
}

echo $output;
?>
