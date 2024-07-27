<?php 
include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"DELETE FROM tbl_language WHERE lang_id=$cid");
if($query){
    echo $result ="language deleted";
}
?>