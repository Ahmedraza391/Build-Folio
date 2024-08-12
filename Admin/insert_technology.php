<?php
include("../connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $technology = $_POST['technology'];
    $insert_query = mysqli_query($connection,"INSERT INTO tbl_technology(technology)VALUES('$technology')");
    if($insert_query){
        echo "Technology Inserted Successfully";
    }else{
        echo "Failed to insert technology";
    }    
}
?>
