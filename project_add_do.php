<?php
include_once('include/db.php');
session_start();
if($_SESSION["adm_name"]==null){
    header('Location:login_adm.php');
    }

if($_REQUEST["p_name"] =="" || $_REQUEST["p_class"] =="" ||  $_REQUEST["p_date"] =="")
{
	
		
		echo "<script type='text/javascript'>";
		echo " window.history.back();";
		echo "</script>";
	}
else{

$p_name = $_REQUEST["p_name"];
$p_class = $_REQUEST["p_class"];
$p_des = $_REQUEST["p_des"];
$p_date = $_REQUEST["p_date"];
$p_place = $_REQUEST["p_place"];
$p_client = $_REQUEST["p_client"];

$insert = "insert into projects values(null,'$p_class','$p_name','$p_des','$p_date','$p_place','$p_client')";
					
					
					if(mysqli_query($conDB,$insert)==true){
						
						echo "<script> alert('Success!');</script>";
						
					}else{

						$error = mysqli_error();
						echo "<script> alert(ERROR CODE:".$error.");</script>";
						}
				  
				$p_No =  mysqli_insert_id($conDB);
	
		
/*========picture========================================================================================================*/
		//$files = array_filter($_FILES['pic_upload']['name']); //something like that to be used before processing files.
		
		// Count # of uploaded files in array
		$total = count($_FILES['pic_upload']['name']);

		// Loop through each file
		for($i=0; $i<$total; $i++) {
		  //Get the temp file path
		  $tmpFilePath = $_FILES['pic_upload']['tmp_name'][$i];

		  //Make sure we have a filepath
		  if ($tmpFilePath != ""){
		    //Setup our new file path
		    $newFilePath = "./images/upload_pic/" . $_FILES['pic_upload']['name'][$i];
            $pic_name=$_FILES['pic_upload']['name'][$i];
		    //Upload the file into the temp dir
		    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

		      //Handle other code here
		    	$insert_pic = "insert into picture values(null,'$p_No','$pic_name','0')";
		    	mysqli_query($conDB,$insert_pic);
		    }
		  }
		}


/*========picture========================================================================================================*/


        
		    $url ="project_list.php";
			echo "<script type='text/javascript'>";
			echo "location.href='$url'";
			echo "</script>";
	    
}

?>
