<?php
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize flags
    $videoUploaded = false;
    $thumbnailUploaded = false;
    $videoPath = null;
    $thumbnailPath = null;
    $lectureId = isset($_POST['edit_lec_id_v_t']) ? intval($_POST['edit_lec_id_v_t']) : 0;

    // Video upload handling
    if ($_FILES['edit_video'] != "") {
        if (isset($_FILES['edit_video'])) {
            $video = $_FILES['edit_video'];
            $tmpName = $video['tmp_name'];
            $videoName = $video['name'];
            $ExtensionType = $video['type'];
            $allowedExt = array("video/mp4", "audio/mpeg");

            if (in_array($ExtensionType, $allowedExt)) {
                $videoPath = "./videos/$videoName";
                if (move_uploaded_file($tmpName, $videoPath)) {
                    $videoUploaded = true;
                } else {
                    echo "Failed to upload video.";
                }
            } else {
                echo "Invalid video file type.";
            }
        }
    }

    // Thumbnail upload handling (if any)
    if ($_FILES['edit_thumbnail'] != "") {
        if (isset($_FILES['edit_thumbnail'])) {
            $thumbnail = $_FILES['edit_thumbnail'];
            $tmpName = $thumbnail['tmp_name'];
            $thumbnailName = $thumbnail['name'];
            $thumbnailType = $thumbnail['type'];
            $allowedThumbnailExt = array("image/jpeg", "image/png");

            if (in_array($thumbnailType, $allowedThumbnailExt)) {
                $thumbnailPath = "./videos/$thumbnailName";
                if (move_uploaded_file($tmpName, $thumbnailPath)) {
                    $thumbnailUploaded = true;
                } else {
                    echo "Failed to upload thumbnail.";
                }
            } else {
                echo "Invalid thumbnail file type.";
            }
        }
    }

    // Update database
    if ($videoUploaded || $thumbnailUploaded) {
        if ($videoUploaded && $thumbnailUploaded) {
            $query = "UPDATE tbl_lectures SET videoPath = ?, video_thumbnail = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("ssi", $videoPath, $thumbnailPath, $lectureId);
        } elseif ($videoUploaded) {
            $query = "UPDATE tbl_lectures SET videoPath = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $videoPath, $lectureId);
        } elseif ($thumbnailUploaded) {
            $query = "UPDATE tbl_lectures SET video_thumbnail = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("si", $thumbnailPath, $lectureId);
        }

        if ($stmt->execute()) {
            echo "Video or Thumbnail Updated Successfully.";
        } else {
            echo "Failed to Update Video or Thumbnail.";
        }

        $stmt->close();
    } else {
        echo "No file uploaded.";
    }

    $connection->close();
}
