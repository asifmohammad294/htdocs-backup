<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2019 06:51:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Wedding Vendor</title>
    <!-- Bootstrap -->
    <link href="<?php echo url('/'); ?>/public/home/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="<?php echo url('/'); ?>/public/home/assets/fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="<?php echo url('/'); ?>/public/home/assets/fontello/css/fontello.css" rel="stylesheet">
    <!-- OwlCarosuel CSS -->
    <link href="<?php echo url('/'); ?>/public/home/assets/css/owl.carousel.css" type="text/css" rel="stylesheet">
    <link href="<?php echo url('/'); ?>/public/home/assets/css/owl.theme.default.css" type="text/css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo url('/'); ?>/public/assets/images/favicon.ico">
    <!-- Style CSS -->
    <link href="<?php echo url('/'); ?>/public/home/assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  

   @include('layouts.header')
   <div class="page-header">
   <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <h1 class="page-title">Abouts Us</h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>

        <div class="about-section">
            <div class="container">
                <div class="about-us1">
                  <?php echo $about_us->data; ?>
                </div>
            </div>
        </div>

        </div>
    <!-- /.blog-post-section -->
   @extends('file.footer')
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo url('/'); ?>/public/home/assets/js/menumaker.min.js"></script>
    <!-- owl-carousel js -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/owl.carousel.min.js"></script>
    <!-- nice-select js -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo url('/'); ?>/public/home/assets/js/fastclick.js"></script>
    <script src="<?php echo url('/'); ?>/public/home/assets/js/custom-script.js"></script>
    <script src="<?php echo url('/'); ?>/public/home/assets/js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2019 06:52:15 GMT -->
</html>