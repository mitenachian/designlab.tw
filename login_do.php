<?php
session_start();
include('include/db.php');

$adm_name = $_REQUEST["adm_name"];
$adm_pass = $_REQUEST["adm_pass"];

$name_chk = "select adm_name from admin where adm_name = '$adm_name'";
$r = mysqli_query($conDB,$name_chk);
$name = mysqli_num_rows($r);

if($name < 1){
	echo "<script type='text/javascript'>alert('帳號錯誤')</script>"; 
	
}
else{
	$emp = "select * 
			from admin 
			where adm_name = '$adm_name' and adm_pass ='$adm_pass'";
	$res = mysqli_query($conDB,$emp);
	$emp_num = mysqli_num_rows($res);
	$emp_row = mysqli_fetch_assoc($res);
		if($emp_num < 1){
			echo "<script type='text/javascript'>alert('密碼錯誤')</script>"; 
			
		}
		else{
				if($emp_row["adminPower"] == "1"){
					
					$_SESSION["adm_name"] = $emp_row["adm_name"];
					$_SESSION["adm_Power"] = $emp_row["adminPower"];
					
					header("Location:adm.php");
					
				}
				else{
					
					echo "<script type='text/javascript'>alert('帳號停權中')</script>"; 
				}
		}
	
}

//header('Location:login_adm.php');
?>










