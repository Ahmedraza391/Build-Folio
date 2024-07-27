<?php include("../connection.php");
$cid = $_POST['cid'];
$query = mysqli_query($connection,"SELECT * FROM tbl_language WHERE lang_id=$cid");
$result = "";
foreach($query as $row){
   $result .= "<span langid='$row[lang_id]' id='LangDeltId'><strong>ID :</strong> $row[lang_id]</span><br>
   <span><strong>Name :</strong> $row[lang_name]</span><br>
       <span class='text-danger'>Are you sure you want to delete this language?</span>
   "."";
   echo $result;
}
?>