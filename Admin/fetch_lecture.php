<?php
session_start();
include '../connection.php';

$query = "SELECT tbl_lectures.*, tbl_lectures.status AS 'l_status', tbl_lectures.disabled_status AS 'l_disabled_status', tbl_course.* FROM tbl_lectures INNER JOIN tbl_course ON tbl_lectures.course_id = tbl_course.course_id ORDER BY tbl_lectures.id ASC";
$result = mysqli_query($connection, $query);
$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        // Truncate lecture title if longer than 30 characters
        $lectureTitle = strlen($data['lecture_title']) > 30 ? substr($data['lecture_title'], 0, 30) . '...' : $data['lecture_title'];

        $output .= "<tr>";
        $output .= "<td class='text-center'>{$data['id']}</td>";
        $output .= "<td class='text-left'>{$lectureTitle}</td>";
        $output .= "<td class='text-left'>{$data['course_name']}</td>";
        $output .= "<td class='text-center'>";
            if($data['l_status'] == "deactivate"){
                $output .= "<a href='lecture_activate.php?id={$data['id']}' class='btn btn-primary btn-sm'>Activate</a>";
            } else {  
                $output .= "<a href='lecture_deactivate.php?id={$data['id']}' class='btn btn-danger btn-sm'>Deactivate</a>";
            }
        $output .= "</td>";
        
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm view-course' data-id='{$data['id']}' data-course='{$data['course_name']}' data-lecture_title='{$data['lecture_title']}' data-lecture_desc='{$data['lecture_description']}' data-thumbnail='{$data['video_thumbnail']}' data-video='{$data['video']}'  data-status='{$data['l_status']}'>View</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            $output .= "<button type='button' class='btn btn-primary btn-sm edit-course' data-id='{$data['id']}' data-course='{$data['course_id']}' data-lecture_title='{$data['lecture_title']}' data-lecture_desc='{$data['lecture_description']}' data-thumbnail='{$data['video_thumbnail']}' data-video='{$data['video']}'>Edit</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            if($data['l_disabled_status'] == "enabled"){
                $output .= "<a href='lecture_disabled.php?id={$data['id']}' type='button' class='btn btn-danger btn-sm'>Disable</a>";
            } else {
                $output .= "<a href='lecture_enabled.php?id={$data['id']}' type='button' class='btn btn-primary btn-sm'>Enable</a>";
            }
        $output .= "</td>";
        
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='7'>Lectures Not Found</td></tr>";
}

echo $output;
?>
