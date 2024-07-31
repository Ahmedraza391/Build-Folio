<?php 
include("../connection.php");
$tid = $_POST['id'];
$query = mysqli_query($connection,"DELETE FROM tbl_language WHERE lang_id=$tid");
if($query){
    echo $result ="language deleted";
}
?>