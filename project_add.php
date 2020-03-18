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
                <li class="active"><a href="project_add.php"><span>新增專案</span></a></li>
                <li><a href="gallery_edit.php"><span>galley管理</span></a></li>
                
                <li><a href="logout.php"><span>(<?php echo $_SESSION["adm_name"]; ?>)登出</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
</header>
<!-- / header -->

<div id="page-content" class="container-fluid">
   <section id="services">
        <div class="row">  
            <!--from-->
            <form class="form" action="project_add_do.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                   <label class="control-label col-sm-2" for="p_class">專案類別:</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" name="p_class">
                          <option value="婚禮佈置">婚禮佈置</option>
                          <option value="廣告設計">廣告設計</option>
                          <option value="道具製作">道具製作</option>
                          <option value="形象設計">形象設計</option>
                          <option value="其它設計">其它設計</option>
                        </select>
                    </div>
                </div>

               <div class="form-group">
                    <label class="control-label col-sm-2" for="p_name">專案名稱</label>
                    <div class="col-sm-10">
                      <input  class="form-control"  name="p_name" placeholder="請輸入專案名稱">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="p_date">日期:</label>
                    <div class="col-sm-10"> 
                      <input  class="form-control" name="p_date" placeholder="輸入日期,格式:2017/06/28">
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="p_place">地點:</label>
                    <div class="col-sm-10"> 
                      <input  class="form-control" name="p_place" placeholder="地點">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="p_client">客戶名稱:</label>
                    <div class="col-sm-10"> 
                      <input  class="form-control" name="p_client" placeholder="輸入客戶名稱">
                    </div>
                  </div>

                  
                <div class="form-group">
                    <label class="control-label col-sm-2" for="p_des">專案描述:</label>
                    <div class="col-sm-10"> 
                      <textarea class="form-control" rows="3" name="p_des" placeholder="寫更多關於這個案子的描述"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="control-label col-sm-2" for="pic_upload">照片上傳(可多選)</label>
                       <div class="col-sm-10">  
                        <input type="file" name="pic_upload[]"  id="pic_upload" multiple="multiple">
                       </div>
                    </div>
                  </div>

                  <div class="form-group"> 
                    <div class="pull-right">
                      <button type="submit" class="btn btn-default">新增送出</button>
                    </div>
                  </div>
            </form>
            <!--from-->
        </div>
    </section>
</div><!-- / container -->



<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- preloader -->
<script src="js/preloader.js"></script>
<!-- / preloader -->
<!-- / javascript -->
</body>
</html>