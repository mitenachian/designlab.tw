<?php 
session_start();
include("include/db.php");
include('include/pages.php');
$this_id=$_GET["p_id"];
$sql = "select * from projects where p_id=".$this_id; 
$result = $conDB->query($sql) or exit(mysqli_error()); 
    
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
<link href="css/magnific-popup.css" rel="stylesheet">
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


<?php  while($row = mysqli_fetch_array($result)) { ?>
<!-- content -->
<div id="slider-project-banner" class="dark has-fixed-top">
    <div class="banner text-center">
        <div class="container-fluid">
            <div class="page-header">
                <h2><?php echo $row["p_name"];?></h2>
            </div><!-- / page-header -->
            <p class="post-meta"><?php echo $row["p_class"];?>/<?php echo $row["p_date"];?></p>
            <a href="#page-content" class="page-scroll"><i class="lnr lnr-chevron-down scroll-down"></i></a>
        </div><!-- / container-fluid -->
    </div><!-- / banner -->
</div><!-- / journal-banner -->

<div id="page-content" class="container-fluid">
    <!-- project content + sidebar -->
    <section id="project">
        <div class="row">
            <!-- project content area -->
            <div class="col-sm-7">
                <div class="project block project-content-area">
                    <div id="project-slider" class="carousel slide" data-ride="carousel">
                        <!-- wrapper for slides -->
                        <div  class="carousel-inner" role="listbox">
							 <?php //for the pictures 
								$sql_pic ='select pic from picture where p_id='.$this_id; 
								$result_pic = $conDB->query($sql_pic) ;  
								 while($row_pic = mysqli_fetch_array($result_pic)) { 
								?>
								    <div class="item">
                                        <img src="images/upload_pic/<?php echo $row_pic["pic"];?>" alt="<?php $row["p_class"]?>">
                                    </div>
							   <?php } ?> 
                            
                        </div>
                        <!-- / wrapper for slides -->

                        <!-- controls -->
                        <a class="left carousel-control" href="#project-slider" role="button" data-slide="prev">
                            <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#project-slider" role="button" data-slide="next">
                            <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                        </a>
                        <!-- / controls -->
                    </div><!-- / project-slider -->
                </div><!-- / project-content-area -->

              
                
            </div>
            <!-- / project-content-area -->

            <!-- project sidebar area -->
            <div class="col-sm-5 project-sidebar">
                <div class="section-description light" style="padding-top:30px;">
                    <h4><?php echo $row["p_class"];?>/<?php echo $row["p_name"];?></h4>
                    <p><?php echo $row["p_des"];?></p>
                    <h4 class="space-top-30">相關資訊</h4>
                    <div class="project-info">
                        <div class="info">
                            <p><i class="lnr lnr-star"></i><span>分類:<a href="#"><?php echo $row["p_class"];?></a></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-user"></i><span>客戶:<?php echo $row["p_client"];?></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-calendar-full"></i><span>日期:<?php echo $row["p_date"];?></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-map"></i><span>地點:<?php echo $row["p_place"];?></span></p>
                        </div>
                    </div><!-- / project-info -->


                </div><!-- section-description -->

                <div class="space-50">&nbsp;</div>

            </div><!-- / col-sm-4 col-md-3 -->
            <!-- / project sidebar area -->
        </div><!-- / row -->
    </section>
    <!-- / project content + sidebar -->
</div><!-- / page-content -->
<!-- / content -->
<?php }?>
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

<script src="js/scrolling-nav.js"></script>

<!-- preloader -->
<script src="js/preloader.js"></script>
<!-- / preloader -->

<!-- portfolio script -->
<script src="js/jquery.shuffle.min.js"></script>
<script src="js/custom.js"></script>
<!-- / portfolio script -->

<!-- lightbox -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
// This will create a single gallery from all elements that have class "gallery-item"
$('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});

/*第一張圖+class*/
$('.item:first-child').addClass('active');
</script>
<!-- / lightbox -->
<!-- / javascript -->
</body>


</html>