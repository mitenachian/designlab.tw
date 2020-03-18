<?php
session_start();
include("include/db.php");
include('include/pages.php');
if($_SESSION["adm_name"]==null){
    header('Location:login_adm.php');
    }
 //$this_id=$_GET["p_id"];   
$this_id=$_POST["del_id"]; 	
//刪除圖片檔案-待修
/*$sql_file="SELECT pic FROM picture WHERE p_id=". $this_id;
$result = $conDB->query($sql_file);
while($row = $result->fetch_array())
{
unlink("images/upload_pic/".$row['pic']); 
}*/


// sql to delete a record
$sql = "DELETE FROM projects WHERE p_id=". $this_id;
$sql_pic="DELETE FROM picture WHERE p_id=". $this_id;
if ($conDB->query($sql) === TRUE && $conDB->query($sql_pic) === TRUE) {
    
    echo "ok";
} else {
    echo "Error deleting record: " . $conDB->error;
}

$conDB->close();
//$url ="project_list.php";
//echo "<script type='text/javascript'>";
//echo "location.href='$url'";
//echo "</script>";
   
 ?>