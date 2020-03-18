<?php
session_start();
include('include/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- favicon -->
<link rel="icon" href="images/favicon.png">
<!-- page title -->
<title>Design Lab 後台管理系統</title>
<!-- bootstrap css -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- css -->
<link href="css/style.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='fonts/FontAwesome.otf' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/linear-icons.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<div id="page-content" class="container-fluid">
<!-- typography -->
<div id="typography">
    <div class="container">
        <div class="page-header text-center space-top-2x">
            <h2>LOGIN</h2>
        
        <form method="post" action="login_do.php">
        
        <div class="login_title"><p>請登入您的管理帳號與密碼,進入後台操作</p></div>
            <ul>
                <li> 
                    <input type="text" name="adm_name" value="" placeholder="帳號"/>
                </li>
                <li>
                    <input type="password" name="adm_pass" value="" placeholder="密碼"/>
                </li>
                <li>
                    <input type="submit" value="LOGIN"  class="btn"/>
                </li>
            </ul>
        
    </form>
</div>
    
    </div><!-- / container -->
</div>


<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<!-- / javascript -->
</body>


</html>