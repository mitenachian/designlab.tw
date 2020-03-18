<?php
session_start();
include('include/db.php');

unset($_SESSION["adm_name"]);
unset($_SESSION["adm_Power"]);
header('Location:login_adm.php');
?>