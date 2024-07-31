<?php
include("../connection.php");

$title = $_POST['lectureTitle'];
$description = $_POST['lectureDesc'];
$courseId = $_POST['course'];
$langId = $_POST['lang_id'];
$video = $_FILES['video'];
$thumbnail = $_FILES['thumbnail'];

$allowedVideoTypes = ["video/mp4", "audio/mpeg"];
$allowedImageTypes = ["image/jpeg", "image/png", "image/gif"];

if (in_array($video['type'], $allowedVideoTypes) && in_array($thumbnail['type'], $allowedImageTypes)) {
    $uploadDir = "./videos/";
    $videoName = basename($video['name']);
    $thumbnailName = basename($thumbnail['name']);
    $videoPath = $uploadDir . $videoName;
    $thumbnailPath = $uploadDir . $thumbnailName;

    if (move_uploaded_file($video['tmp_name'], $videoPath) && move_uploaded_file($thumbnail['tmp_name'], $thumbnailPath)) {
        $stmt = $connection->prepare("INSERT INTO tbl_lectures (videoPath, video_thumbnail, title, description, course_id, lang_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii", $videoPath, $thumbnailPath, $title, $description, $courseId, $langId);

        if ($stmt->execute()) {
            echo "Lecture Successfully Added";
        } else {
            echo "Error adding lecture.";
        }

        $stmt->close();
    } else {
        echo "Failed to upload video or thumbnail.";
    }
} else {
    echo "Invalid file type. Only MP4 video, MP3 audio, and JPEG/PNG/GIF images are allowed.";
}

$connection->close();
?>
