<?php
session_start();
include('include/db.php');
if($_SESSION["adm_name"]==null){
    header('Location:login_adm.php');
    }
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

<!-- preloader -->
<div id="preloader">
    <div class="spinner spinner-round"></div>
</div>
<!-- / preloader -->

<!-- header -->
<header>
    <nav class="navbar-1 navbar navbar-default fixed-top">
        <div class="container-fluid navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo"></a>
        </div><!-- / navbar-header -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                
                <li><a href="project_list.php"><span>專案列表</span></a></li>
                <li><a href="project_add.php"><span>新增專案</span></a></li>
                <li><a href="gallery_edit.php"><span>galley管理</span></a></li>
                
                <li><a href="logout.php"><span>(<?php echo $_SESSION["adm_name"]; ?>)登出</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
</header>
<!-- / header -->

<div id="page-content" class="container-fluid">
<!-- typography -->
<div id="typography">


        <div class="space-50">&nbsp;</div>

        <!-- blockquotes -->
        <div class="row">
            <div class="col-sm-6">
                <h4 class="sub-title">登入完成</h4>
                <blockquote>
                    <p>請選擇右上角的功能操作,有任何問題請洽我</p>
                    <cite>- Mitena</cite>
                </blockquote>
            </div>

            
        </div><!-- / row -->
        <!-- / blockquotes -->



     
        
    </div><!-- / container -->
</div><!-- / typography -->


<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- preloader -->
<script src="js/preloader.js"></script>
<!-- / preloader -->
<!-- / javascript -->
</body>
</html>