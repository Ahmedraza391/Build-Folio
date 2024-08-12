<?php
include("../connection.php");
?>
<title>Build Folio - Home</title>
<?php include("./components/top.php"); ?>
<?php
// Redirect to login if not authenticated
if (!isset($_SESSION['folio_admin'])) {
    echo "<script>window.location.href='admin_login.php'</script>";
    exit();
}

// Retrieve counts from various tables
$user_query = mysqli_query($connection, "SELECT COUNT(*) as count FROM tbl_users");
$user_count = mysqli_fetch_assoc($user_query)['count'];

$technology_query = mysqli_query($connection, "SELECT COUNT(*) as count FROM tbl_technology");
$technology_count = mysqli_fetch_assoc($technology_query)['count'];

$lecture_query = mysqli_query($connection, "SELECT COUNT(*) as count FROM tbl_lectures");
$lecture_count = mysqli_fetch_assoc($lecture_query)['count'];

$course_query = mysqli_query($connection, "SELECT COUNT(*) as count FROM tbl_course");
$course_count = mysqli_fetch_assoc($course_query)['count'];

$project_query = mysqli_query($connection, "SELECT COUNT(*) as count FROM tbl_projects");
$project_count = mysqli_fetch_assoc($project_query)['count'];

// Insert or update the counts in the chart table
$insert_query = mysqli_query($connection, "
    REPLACE INTO tbl_chart 
    (id, users_count, technology_count, lecture_count, course_count, projects_count) 
    VALUES 
    (1, '$user_count', '$technology_count', '$lecture_count', '$course_count', '$project_count')
");

if (!$insert_query) {
    die("Error updating chart data: " . mysqli_error($connection));
}

// Fetch updated data for the chart
$query = mysqli_query($connection, "SELECT * FROM tbl_chart WHERE id = 1");
$fetch_count = [];

if ($row = mysqli_fetch_assoc($query)) {
    $fetch_count[] = ["label" => "Technologies", "y" => $row['technology_count']];
    $fetch_count[] = ["label" => "Courses", "y" => $row['course_count']];
    $fetch_count[] = ["label" => "Lectures", "y" => $row['lecture_count']];
    $fetch_count[] = ["label" => "Users", "y" => $row['users_count']];
    $fetch_count[] = ["label" => "Projects", "y" => $row['projects_count']];
}
?>

<section class="mainRight container">
    <div class="content row gap-1 justify-content-center">
        <div class="card p-3 col-md-12 shadow mb-5 rounded">
            <script>
                window.onload = function() {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title: {
                            text: "Dashboard"
                        },
                        axisY: {
                            title: ""
                        },
                        data: [{
                            type: "column",
                            dataPoints: <?php echo json_encode($fetch_count, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();
                }
            </script>

            <div id="chartContainer" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
</section>

<?php include("./components/bottom.php"); ?>
