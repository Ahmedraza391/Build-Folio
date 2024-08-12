<?php
// Set maximum file upload size limits
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');

// Include database connection
include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if form fields and files are set
    if (isset($_POST['project_title'], $_POST['project_desc']) &&
        isset($_FILES['project_thumbnail'], $_FILES['project_video'])) {

        // Maximum file size (200MB)
        $maxFileSize = 200 * 1024 * 1024; // 200MB in bytes

        // Validate file sizes
        if ($_FILES['project_thumbnail']['size'] > $maxFileSize) {
            echo "Thumbnail file size exceeds the maximum limit of 200MB.";
            exit;
        }

        if ($_FILES['project_video']['size'] > $maxFileSize) {
            echo "Video file size exceeds the maximum limit of 200MB.";
            exit;
        }

        // Retrieve form data
        $title = $_POST['project_title'];
        $desc = $_POST['project_desc'];

        // Set upload directories
        $projectDir = "./uploads/projects/";
        $thumbnailDir = $projectDir . "thumbnails/";
        $videoDir = $projectDir . "videos/";

        // Create directories if they don't exist
        if (!file_exists($projectDir)) mkdir($projectDir, 0777, true);
        if (!file_exists($thumbnailDir)) mkdir($thumbnailDir, 0777, true);
        if (!file_exists($videoDir)) mkdir($videoDir, 0777, true);

        // File paths
        $thumbnailPath = $thumbnailDir . basename($_FILES['project_thumbnail']['name']);
        $videoPath = $videoDir . basename($_FILES['project_video']['name']);

        // Upload files
        if (move_uploaded_file($_FILES['project_thumbnail']['tmp_name'], $thumbnailPath) &&
            move_uploaded_file($_FILES['project_video']['tmp_name'], $videoPath)) {
            
            // Prepare SQL query
            $query = "INSERT INTO tbl_projects (project_title, project_desc, project_video, project_thumbnail) VALUES (?, ?, ?, ?)";
            if ($stmt = $connection->prepare($query)) {
                // Bind parameters
                $stmt->bind_param("ssss", $title, $desc, $videoPath, $thumbnailPath);

                // Execute query
                if ($stmt->execute()) {
                    echo "Project added successfully!";
                } else {
                    echo "Error adding project: " . $stmt->error;
                }

                // Close statement
                $stmt->close();
            } else {
                echo "Error preparing the statement: " . $connection->error;
            }
        } else {
            echo "Error uploading files.";
        }

        // Close connection
        $connection->close();
    } else {
        echo "Missing form fields or files.";
    }
} else {
    echo "Invalid request method.";
}
?>
