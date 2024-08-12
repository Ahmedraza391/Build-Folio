<?php
session_start();
include '../connection.php';

$query = "SELECT * FROM tbl_projects";
$result = mysqli_query($connection, $query);
$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        // Truncate lecture title if longer than 30 characters
        $projectTitle = strlen($data['project_title']) > 30 ? substr($data['project_title'], 0, 30) . '...' : $data['project_title'];

        $output .= "<tr>";
        $output .= "<td class='text-center'>{$data['project_id']}</td>";
        $output .= "<td class='text-left'>{$projectTitle}</td>";
        $output .= "<td class='text-center'>";
            if($data['project_status'] == "deactivate"){
                $output .= "<a href='project_activate.php?id={$data['project_id']}' class='btn btn-primary btn-sm'>Activate</a>";
            } else {  
                $output .= "<a href='project_deactivate.php?id={$data['project_id']}' class='btn btn-danger btn-sm'>Deactivate</a>";
            }
        $output .= "</td>";
        
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm view-project' data-id='{$data['project_id']}' data-title='{$data['project_title']}' data-desc='{$data['project_desc']}' data-thumbnail='{$data['project_thumbnail']}' data-video='{$data['project_video']}' data-status='{$data['project_status']}'>View</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm edit-project' data-id='{$data['project_id']}' data-title='{$data['project_title']}' data-desc='{$data['project_desc']}' data-thumbnail='{$data['project_thumbnail']}' data-video='{$data['project_video']}'>Edit</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            if($data['disabled_status'] == "enabled"){
                $output .= "<a href='project_disabled.php?id={$data['project_id']}' type='button' class='btn btn-danger btn-sm'>Disable</a>";
            } else {
                $output .= "<a href='project_enabled.php?id={$data['project_id']}' type='button' class='btn btn-primary btn-sm'>Enable</a>";
            }
        $output .= "</td>";
        
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='7'>Projects Not Found</td></tr>";
}

echo $output;
?>
