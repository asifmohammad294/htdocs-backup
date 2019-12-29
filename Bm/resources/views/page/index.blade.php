m<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" sizes="16x16" href="http://www.direct-id.sg/assets/pics/fav.png">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="keywords" content="Wedding" >
<meta name="description" content="Wedding,directid" >
<title>Bharatiy Matrimony </title>
<link href="<?php echo url('/'); ?>/public/assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/sidebar-nav/dist/sidebar-nav.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/morrisjs/morris.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/sweetalert/sweetalert.css" media="screen" rel="stylesheet" type="text/css" ><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script src="<?php echo url('/'); ?>/public/assets/js/web.min.js"></script>
<script type="text/javascript" src="http://www.direct-id.sg/assets/js/webmig.min.js"></script>
<script type="text/javascript">
  var LoggedUser=1;
  var ADMIN_APPURL="<?php echo url('/'); ?>";
  var AVTURL="<?php echo url('/'); ?>";
  var MEDIAURL="<?php echo url('/'); ?>";
  var AVTBIGURL="<?php echo url('/'); ?>";
  var SITENAME="Orion Quotes";
  var Action="editfrontpage";
  var Controller="static";
  var ConfirmTitle="Are you sure?";
  var ConfirmBtn="Yes";
  var CancelBtn="Cancel";
  var extError="Uploaded file is not a valid image. Only JPG,PNG and JPEG files are allowed.";
  var AvtUpdated="Your profile avatar has been updated";
  var PwdUserError="Username and password must not be same";
</script>
<style type="text/css">
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body class="fix-sidebar fix-header">
<div class="preloader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>
<div id="wrapper">  
@extends('layouts.left-side')

<!--<li class="nav-small-cap m-t-10">--- Main Menu</li>-->     <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Dashboard</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      &nbsp;
    </div>
</div>            <div class="col-md-12">
    <ul class="page-breadcrumb breadcrumb">
        <a href="<?php echo url('/'); ?>" style="color:#FFF;"><i class="fa fa-dashboard"></i> Dashboard</a>  
            </ul>
</div>
<div style="clear:both;"></div>
      <style type="text/css">
.box-title{color:#fff;}
</style>
<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12 adminDashboard">
  <div class="row">
    <!-- onclick="window.location.href='<?php echo url('/'); ?>/sub-admin'" -->
    <div class="col-lg-4 col-sm-6 col-xs-12 Success">
      <div class="white-box " >
        <h3 class="box-title">All Users</h3>
        <ul class="list-inline two-part">
          <li><i class="icon-people"></i></li>
          <li class="text-right"><span class="counter"><?php echo $users ?></span></li>
        </ul>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-xs-12 Warning">
      <div class="white-box ">
        <h3 class="box-title">Sub Admin</h3>
        <ul class="list-inline two-part">
          <li><i class="icon-people"></i></li>
          <li class="text-right"><span class="counter"><?php echo $admin ?></span></li>
        </ul>
      </div>
    </div>
  </div> 
</div>

</div>



    </div>
    <footer class="footer text-center"><?php echo date("Y"); ?> &copy; Devine Matchmakers </footer>
    <script type="text/javascript" defer="defer" src="assets/js/mousetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/vanilla.idle.js">
  
</script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/waves.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/toast/js/jquery.toast.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/initial.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/js.cookie.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/mask.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/custom.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/counterup/jquery.counterup.min.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/raphael/raphael-min.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/morrisjs/morris.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/waypoints/lib/jquery.waypoints.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-sparkline/jquery.sparkline.min.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-sparkline/jquery.charts-sparkline.js?a=1531805675"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/dashboard3.js?a=1531805675"></script>


    </div>
</div>
<div id="admin-webapp-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
 $('.chk').change(function(){

var vl=$(this).val();
var id=$(this).attr('id');
   $.ajax({
              url: "<?php echo url('/'); ?>/admin/update_status_category",
              data: 'status='+vl+'&id='+id+'&table=banners',            

              type: "POST",
                    success: function (data) {
                      
                          if (vl==1) {
                            $('.ids'+id).val('0');
                          }else if(vl==0)
                          {
                            //alert(vl);
                            $('.ids'+id).val('1');
                          }
                    }
                });
  });
</script>
</body>  
</html>