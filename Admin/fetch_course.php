<?php
session_start();
include '../connection.php';

$query = "SELECT tbl_course.*,tbl_course.status as 'c_status',tbl_course.disabled_status as 'c_disabled_status',tbl_technology.*,tbl_technology.id as 't_id' FROM tbl_course INNER JOIN tbl_technology ON tbl_course.technology_id = tbl_technology.id";
$result = mysqli_query($connection, $query);
$output = '';
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        $output .= "<tr>";
        $output .= "<td class='text-center'>{$data['course_id']}</td>";
        $output .= "<td class='text-left'>{$data['course_name']}</td>";
        $output .= "<td class='text-left'>{$data['technology']}</td>";
        $output .= "<td class='text-center'>";
            if($data['c_status']=="deactivate"){
                $output .= "<a href='course_activate.php?id={$data['course_id']}' class='btn btn-primary btn-sm'>Activate</a>";
            }else{  
                $output .= "<a href='course_deactivate.php?id={$data['course_id']}' class='btn btn-danger btn-sm'>Deactivate</a>";
            }
        $output .= "</td>";
        
        $output .= "<td class='text-center'>";
        $output .= "<button type='button' class='btn btn-primary btn-sm edit-course' data-id='{$data['course_id']}' data-course='{$data['course_name']}' data-technology='{$data['t_id']}'>Edit</button>";
        $output .= "</td>";
        $output .= "<td class='text-center'>";
            if($data['c_disabled_status']=="enabled"){
                $output .= "<a href='course_disabled.php?id={$data['course_id']}' type='button' class='btn btn-danger btn-sm'>Disable</a>";
            }else{
                $output .= "<a href='course_enabled.php?id={$data['course_id']}' type='button' class='btn btn-primary btn-sm'>Enable</a>";
            }
        $output .= "</td>";
        
        $output .= "</tr>";
    }
} else {
    $output .= "<tr><td colspan='4'>Course Not Found</td></tr>";
}

echo $output;
?>
