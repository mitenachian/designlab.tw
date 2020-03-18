<?php 
//$db_host = 'databases.000webhost.com';
//$db_username = 'id2115149_designlab'; 
//$db_password = 'designlab2017';
//$db_name = 'id2115149_design_lab'; 

//$db_username = 'root'; 
//$db_password = '';
//$db_name = 'design_lab'; 
//$db_host = 'localhost';

//$conDB = mysqli_connect('databases.000webhost.com','id2115149_designlab','designlab2017','id2115149_design_lab')or die('Error: Could not connect to database.');
//mysqli_set_charset($conDB,"utf8");




$conDB = new mysqli("localhost", "id2115149_designlab", "designlab2017", "id2115149_design_lab");
if ($conDB->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conDB->connect_errno . ") " . $conDB->connect_error;
}

//echo $conDB->host_info . "\n";
$conDB->set_charset('utf8');
?>
