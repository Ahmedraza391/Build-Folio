<?php
// Set maximum file upload size limits
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');

include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize flags
    $videoUploaded = false;
    $thumbnailUploaded = false;
    $videoPath = null;
    $thumbnailPath = null;
    $lectureId = isset($_POST['edit_lecture_id_t_v']) ? intval($_POST['edit_lecture_id_t_v']) : 0;
    $errorMessage = '';
    $course_id = $_POST['edit_lecture_course'];
    $fetch_course = mysqli_query($connection, "SELECT * FROM tbl_course WHERE course_id='$course_id'");
    $fetch = mysqli_fetch_assoc($fetch_course);
    $coursename = preg_replace('/[^A-Za-z0-9\-]/', '_', $fetch['course_name']);
    // Set maximum video size in MB
    $maxVideoSizeMB = 200; // example: 200MB
    $maxVideoSizeBytes = $maxVideoSizeMB * 1024 * 1024;

    // Video upload handling
    if (!empty($_FILES['edit_video']['tmp_name'])) {
        $video = $_FILES['edit_video'];
        $tmpName = $video['tmp_name'];
        $videoName = $video['name'];
        $videoSize = $video['size'];
        $ExtensionType = $video['type'];
        $allowedExt = array("video/mp4", "audio/mpeg");

        if ($videoSize > $maxVideoSizeBytes) {
            $errorMessage = "Video file size exceeds the maximum limit of $maxVideoSizeMB MB.";
        } elseif (in_array($ExtensionType, $allowedExt)) {
            $videoPath = "./uploads/$coursename/videos/$videoName";
            if (move_uploaded_file($tmpName, $videoPath)) {
                $videoUploaded = true;
            } else {
                $errorMessage = "Failed to upload video.";
            }
        } else {
            $errorMessage = "Invalid video file type.";
        }
    }

    // Thumbnail upload handling (if any)
    if (empty($errorMessage) && !empty($_FILES['edit_thumbnail']['tmp_name'])) {
        $thumbnail = $_FILES['edit_thumbnail'];
        $tmpName = $thumbnail['tmp_name'];
        $thumbnailName = $thumbnail['name'];
        $thumbnailType = $thumbnail['type'];
        $allowedThumbnailExt = array("image/jpeg", "image/png");

        if (in_array($thumbnailType, $allowedThumbnailExt)) {
            $thumbnailPath = "./uploads/$coursename/thumbnails/$thumbnailName";
            if (move_uploaded_file($tmpName, $thumbnailPath)) {
                $thumbnailUploaded = true;
            } else {
                $errorMessage = "Failed to upload thumbnail.";
            }
        } else {
            $errorMessage = "Invalid thumbnail file type.";
        }
    }

    // Check if there was an error
    if (!empty($errorMessage)) {
        echo $errorMessage;
    } else {
        // Update database
        if ($videoUploaded && $thumbnailUploaded) {
            $query = "UPDATE tbl_lectures SET video = ?, video_thumbnail = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssi", $videoPath, $thumbnailPath, $lectureId);
            if ($stmt->execute()) {
                echo "Video and Thumbnail Updated Successfully.";
            } else {
                echo "Failed to Update Video and Thumbnail.";
            }
            $stmt->close();
        } elseif ($videoUploaded) {
            $query = "UPDATE tbl_lectures SET video = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $videoPath, $lectureId);
            if ($stmt->execute()) {
                echo "Video Updated Successfully.";
            } else {
                echo "Failed to Update Video.";
            }
            $stmt->close();
        } elseif ($thumbnailUploaded) {
            $query = "UPDATE tbl_lectures SET video_thumbnail = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $thumbnailPath, $lectureId);
            if ($stmt->execute()) {
                echo "Thumbnail Updated Successfully.";
            } else {
                echo "Failed to Update Thumbnail.";
            }
            $stmt->close();
        }
    }

    $connection->close();
}
?>