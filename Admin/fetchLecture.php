<?php
include("../connection.php");

$query = mysqli_query($connection, "SELECT tbl_lectures.*,tbl_course.*,tbl_language.* FROM tbl_lectures INNER JOIN tbl_course ON tbl_lectures.course_id = tbl_course.course_id INNER JOIN tbl_language ON tbl_lectures.lang_id = tbl_language.lang_id");
$result = "";

if (mysqli_num_rows($query) > 0) {
  foreach ($query as $rows) {
    $thumbnail_url = $rows['video_thumbnail'];
    $video_url = $rows['videoPath'];

    // Limit description to 50 characters
    $description = $rows['description'];
    if (strlen($description) > 30) {
      $description = substr($description, 0, 30) . '...';
    }

    $result .= "<tr>
            <td class='align-middle'>{$rows['id']}</td>
            <td class='align-middle'>
              <video width='100' height='100' controls poster='$thumbnail_url'>
                <source src='$video_url' type='video/mp4'>
                Your browser does not support the video tag.
              </video>
            </td>
            <td class='align-middle'>{$rows['title']}</td>
            <td class='align-middle'>{$description}</td>
            <td class='align-middle'>{$rows['course_name']}</td>
            <td class='align-middle'>{$rows['lang_name']}</td>
            <td class='align-middle'>
              <button type='button' class='btn btn-primary ViewLectureBtn' lectid='{$rows['id']}' title='{$rows['title']}' desc='{$rows['description']}' course='{$rows['course_name']}' lang_name='{$rows['lang_name']}' video='{$rows['videoPath']}' thumbnail='{$rows['video_thumbnail']}'>View</button>
            </td>
            <td class='align-middle'>
              <button type='button' class='btn btn-primary EditLectureBtn' lectid='{$rows['id']}' title='{$rows['title']}' desc='{$rows['description']}' course_id='{$rows['course_id']}' lang_id='{$rows['lang_id']}' video='{$rows['videoPath']}' thumbnail='{$rows['video_thumbnail']}'>Edit</button>
            </td>
            <td class='align-middle'>
              <button type='button' class='btn btn-dark DeltLectureBtn' lectid='{$rows['id']}'>Delete</button>
            </td>
        </tr>";
  }
  echo $result;
} else {
  echo "<tr><td colspan='7'>Lectures Not Found</td></tr>";
}
