<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
</head>

<body>
  

   @include('layouts.header')




 @extends('file.footer')
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/jquery.min.js"></script>
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
</html>


<script type="text/javascript">
 $(".slide").owlCarousel({
        margin:0,
        nav:false,
        dots:false,
        loop:true,
        mouseDrag:false,
        autoplay:true,
        paginationSpeed: 500000,
        smartSpeed: 1000000,
        fluidSpeed: 50000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
</script>
<script type="text/javascript">
  window.onload=function(){
  $('.slider1').slick({
  autoplay:true,
  autoplaySpeed:1500,
  arrows:true,
  prevArrow:'<button type="button" class="slick-prev"></button>',
  nextArrow:'<button type="button" class="slick-next"></button>',
  centerMode:true,
  slidesToShow:3,
  slidesToScroll:1
  });
};

</script>