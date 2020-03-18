<?php 
session_start();
include("include/db.php");
include('include/pages.php');

$sql = "select * from projects "; 
    $result = $conDB->query($sql) or exit(mysqli_error()); 
    $numrows = mysqli_num_rows($result); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DESIGN LAB">
    <meta name="keywords" content="Design Lab,Design,設計,輸出,廣告設計,桃園,桃園廣告設計,菜單設計,廣告設計桃園,Menu設計,菜單設計,LOGO設計,招牌設計,包裝設計,花藝,婚禮佈置,婚禮背板,傳單設計,結婚,婚禮顧問,名片設計">
    <meta name="author" content="Mitena">

<!-- favicon -->
<link rel="icon" href="images/favicon.png">
<!-- page title -->
<title>Design Lab - 設計實驗室</title>
<!-- bootstrap css -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- css -->
<link href="css/style.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <li class="active"><a href="index.html"><span>首頁</span></a></li>
                <li><a href="about.html"><span>關於我們</span></a></li>
                <li><a href="services.html"><span>服務項目</span></a></li>
                <li><a href="gallery.html"><span>相簿逛逛</span></a></li>
                <li><a href="projects.php"><span>案例介紹</span></a></li>
                <li><a href="contact.html"><span>連絡我們吧!</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </nav>
</header>
<!-- / header -->

<!-- content -->
<div id="page-content" class="container-fluid">
    <!-- projects -->
    <section id="portfolio">
        <!-- portfolio filter -->
        <ul class="portfolio-filter list-inline text-center">
            <li><a href="#" data-group="all" class="active">全部</a></li>
            <li><a href="#" data-group="婚禮佈置">婚禮佈置</a></li>
            <li><a href="#" data-group="廣告設計">廣告設計</a></li>
            <li><a href="#" data-group="道具製作">道具製作</a></li>
            <li><a href="#" data-group="形象設計">形象設計</a></li>
            <li><a href="#" data-group="其它設計">其它設計</a></li>
        </ul><!--end portfolio filter -->
        <ul class="row portfolio list-unstyled gallery" id="grid">
<?php  while($row = mysqli_fetch_array($result)) { 
	$this_id=$row["p_id"];
?>
            <!-- project -->
            <li class="col-xs-6 col-sm-3 project" data-groups='["<?php echo $row["p_class"];?>"]'>
                <figure class="portfolio-item">
                    <div class="hovereffect">
                    <?php //for the pictures 
					$sql_pic ='select pic from picture where p_id='.$this_id.' LIMIT 1'; 
					$result_pic = $conDB->query($sql_pic) ;  
					 while($row_pic = mysqli_fetch_array($result_pic)) { 
					?>
                    <img class="img-responsive" src="images/upload_pic/<?php echo $row_pic["pic"];?>" alt="<?php echo $row["p_class"];?>">
                   <?php } ?>  
                        <a href="project_detail.php?p_id=<?php echo $this_id;?>">
                            <div class="overlay">
                                <div class="hovereffect-title">
                                    <h5><?php echo $row["p_name"];?></h5>
                                    <p><?php echo $row["p_date"];?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </figure>
            </li>
            <!-- / project -->
<?php }?>
          

            <!-- sizer -->
            <li class="col-xs-6 col-sm-3 shuffle_sizer"></li>      
        </ul> <!-- / projects -->
    </section>
    <!-- / portfolio section 3col -->
</div><!-- / page-content -->
<!-- / content -->

<!-- footer -->
<footer class="light-footer fixed-bottom">
    <div class="container-fluid">
        <p class="footer-info">© 2017 - <strong>DesignLab</strong> - 設計實驗室. All Rights Reserved.<span class="footer-contact-info"><a href="mailto:talicchou@gmail.com" class="footer-ci"><i class="lnr lnr-envelope"></i>talicchou@gmail.com</a> <a href="#" class="footer-ci"><i class="lnr lnr-phone-handset"></i>0910-608-155</a></span>
            
        </p>
    </div><!-- / container -->
</footer>
<!-- / footer -->

<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>

<!-- portfolio script -->
<script src="js/jquery.shuffle.min.js"></script>
<script src="js/custom.js"></script>
<!-- / portfolio script -->

<!-- preloader -->
<script src="js/preloader.js"></script>
<!-- / preloader -->
<!-- / javascript -->
</body>
</html>