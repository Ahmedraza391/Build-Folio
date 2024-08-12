<?php
// Include database connection
include("../connection.php");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $lecture_title = $_POST['lecture_title'];
    $lecture_desc = $_POST['lecture_desc'];

    $course = $_POST['course']; // Updated course ID
    $fetch_course = mysqli_query($connection, "SELECT * FROM tbl_course WHERE course_id = '$course'");
    $fetch = mysqli_fetch_assoc($fetch_course);

    // Define the base upload directory
    $baseUploadDir = "./uploads/lectures/";

    // Create directory paths based on the course name
    $courseDir = $baseUploadDir . preg_replace('/[^A-Za-z0-9\-]/', '_', $fetch['course_name']) . "/";
    $thumbnailDir = $courseDir . "thumbnails/";
    $videoDir = $courseDir . "videos/";

    // Ensure directories exist, create them if they don't
    if (!is_dir($courseDir)) {
        mkdir($courseDir, 0777, true);
    }
    if (!is_dir($thumbnailDir)) {
        mkdir($thumbnailDir, 0777, true);
    }
    if (!is_dir($videoDir)) {
        mkdir($videoDir, 0777, true);
    }

    // Initialize variables for file paths
    $thumbnailPath = "";
    $videoPath = "";
    $uploadOk = true;

    // Validate and move thumbnail file if uploaded
    if ($_FILES['thumbnail']['name']) {
        $thumbnailPath = $thumbnailDir . basename($_FILES['thumbnail']['name']);
        if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbnailPath)) {
            echo "Error uploading thumbnail file.";
            $uploadOk = false;
        }
    }

    // Validate and move video file if uploaded
    if ($_FILES['video']['name']) {
        $videoPath = $videoDir . basename($_FILES['video']['name']);
        if (!move_uploaded_file($_FILES['video']['tmp_name'], $videoPath)) {
            echo "Error uploading video file.";
            $uploadOk = false;
        }
    }

    // Update data in the database if file uploads were successful
    if ($uploadOk) {
        // Prepare the SQL statement to insert data into the lectures table
        $query = "INSERT INTO tbl_lectures (lecture_title, lecture_description, video, video_thumbnail, course_id) VALUES (?, ?, ?, ?, ?)";

        // Initialize a prepared statement
        if ($stmt = $connection->prepare($query)) {
            // Bind the parameters to the SQL query
            $stmt->bind_param("ssssi", $lecture_title, $lecture_desc, $videoPath, $thumbnailPath, $course);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Lecture added successfully!";
            } else {
                echo "Error adding lecture: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $connection->error;
        }
    }


    // Close the database connection
    $connection->close();
} else {
    echo "Invalid request method.";
}
