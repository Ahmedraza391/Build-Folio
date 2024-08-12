<?php
session_start();
include '../connection.php';

$query = "SELECT * FROM tbl_technology";
$result = mysqli_query($connection, $query);
$output = '';
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td class='text-center'>{$data['id']}</td>";
        $output .= "<td class='text-left'>{$data['technology']}</td>";
        $output .= "<td class='text-center'>";
            if($data['status']=="deactivate"){
                $output .= "<a href='technology_activate.php?id={$data['id']}' class='btn btn-primary btn-sm'>Activate</a>";
            }else{  
                $output .= "<a href='technology_deactivate.php?id={$data['id']}' class='btn btn-danger btn-sm'>Deactivate</a>";
            }
        $output .= "</td>";
        
        $output .= "<td class='text-center'>";
        $output .= "<button type='button' class='btn btn-primary btn-sm edit-technology' data-id='{$data['id']}' data-technology='{$data['technology']}'>Edit</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            if($data['disabled_status']=="enabled"){
                $output .= "<a href='technology_disabled.php?id={$data['id']}' type='button' class='btn btn-danger btn-sm'>Disable</a>";
            }else{
                $output .= "<a href='technology_enabled.php?id={$data['id']}' type='button' class='btn btn-primary btn-sm'>Enable</a>";
            }
        $output .= "</td>";
        
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='4'>Technology Not Found</td></tr>";
}

echo $output;
?>
