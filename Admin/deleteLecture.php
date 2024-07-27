<?php 
include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"DELETE FROM tbl_lectures WHERE id=$cid");
if($query){
    echo $result ="lecture deleted";
}
?>