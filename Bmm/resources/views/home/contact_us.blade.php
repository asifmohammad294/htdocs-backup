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
                        <h1 class="page-title">Contact us</h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>

 <div class="content">
        <div class="container">
            <div class="back"style="background: #fff;padding-bottom: 22px;">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mb60">
                    <!-- contact-section-title -->
                    <div class="text-center">
                        <p class="lead">We would like to talk with you, Talk to us and we'll show you what we’ve done, and what we can do for you.
                        </p>
                    </div>
                    <!-- /.contact-section-title -->
                </div>
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                    <form action="<?php echo url('/'); ?>/save_contact" method="post">
                        <!-- form -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="contact-form">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
                                    <h3>Get in touch</h3>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="fname"></label>
                                        <input id="fname-1" type="text" name="fname" placeholder="First Name" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="lname"></label>
                                        <input id="lname-1" type="text" name="lname" placeholder="Last Name" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" type="email" name="email" placeholder="Email" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone-1" type="text" name="phone" placeholder="Phone" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- select -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <select class="wide mb20" name="purpose" style="display: none;">
                                            <option value="Vendor Purpose">Vendor Purpose</option>
                                            <option value="Couple">Couple</option>
                                            <option value="Pricing">Pricing</option>
                                            <option value="Vendor">Vendor</option>
                                            <option value="Advertise with us">Advertise with us</option>
                                        </select><div class="nice-select wide mb20" tabindex="0"><span class="current">Vendor Purpose</span><ul class="list"><li data-value="Vendor Purpose" class="option selected">Vendor Purpose</li><li data-value="Couple" class="option">Couple</li><li data-value="Pricing" class="option">Pricing</li><li data-value="Vendor" class="option">Vendor</li><li data-value="Advertise with us" class="option">Advertise with us</li></ul></div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="message"></label>
                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                                <!--button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button type="submit"  name="singlebutton" class="btn btn-default">submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.form -->
                    </form>
                </div>
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