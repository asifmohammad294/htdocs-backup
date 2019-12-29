<!DOCTYPE html>  
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="keywords" content="X-ray" >
<meta name="description" content="X-ray india" >
<title>Wedding | Log In</title>
<link href="<?php echo url('/'); ?>/public/assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link rel="icon" type="image/png" sizes="16x16" href="assets/pics/fav.png">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="public/assets/js/html5shiv.js"></script>
    <script src="public/assets/js/respond.min.js"></script>
<![endif]-->
<script src="<?php echo url('/'); ?>/public/assets/js/web.min.js"></script>
<script type="text/javascript" src="<?php echo url('/'); ?>/public/assets/js/webmig.min.js"></script>
<script type="text/javascript">
    var LoggedUser=false;
    var ADMIN_APPURL="http://www.direct-id.sg/directprivateid";
    var AVTURL="http://www.direct-id.sg/avatars-thumb";
    var MEDIAURL="http://www.direct-id.sg/page-media";
    var AVTBIGURL="http://www.direct-id.sg/avatars";
    var SITENAME="Wedding";
    var Action="login";
    var Controller="index";
    var ConfirmTitle="Are you sure?";
    var ConfirmBtn="Yes";
    var CancelBtn="Cancel";
    var extError="Uploaded file is not a valid image. Only JPG,PNG and JPEG files are allowed.";
    var AvtUpdated="Your profile avatar has been updated";
    var PwdUserError="Username and password must not be same";
</script>
</head>
<body>
<style type="text/css">
.login-box{background:rgba(0, 0, 0, 0.38);}
.login-box .logo{display:inline-block;margin-bottom:20px;margin-left: 65px;}
.login-box .logo img{margin-right:10px;max-width:210px;}
.login-box .logo span{font-size:28px;color:#2d2e42;display: inline-block;vertical-align: middle;}
.login-box .logo font{color:#e84c3d;}
.forgotBtnAdmin a{color:#fff;}
.login-box .white-box{background:none;box-shadow:none;}
.login-box .white-box form .form-control{color:#fff;padding: 9px;}
input::placeholder {
   color: #fff !important;
}
h3.box-title.m-b-20 {
    text-align: center;
    font-size: 25px;
}
</style>

<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>  
<section id="wrapper" class="login-register">
  <div style="margin: 0 auto; width: 100%; padding-top: 50px"><h1 style="color: #000;
    text-align: center;
    font-family: monospace;
    font-weight: 500;margin-top: 120px;
    text-shadow: -1px 1px 4px #000;">Wedding Admin Panel</h1></div>
  <div class="login-box">
    <div class="white-box">
      
                          <form class="form-horizontal form-material" id="loginform" role="form" method="POST" action="{{ url('/login') }}">
 {!! csrf_field() !!}

    <a class="logo"><!-- <img src="assets/images/headerLogo.png" alt="Widding" /> --></a>
    <h3 style="color: #fff;" class="box-title m-b-20">Log In</h3>
    <div class="form-group ">
      <div class="col-xs-12">
   <input type="email" class="form-control required" name="email" value="" placeholder="Email">      
    </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
         <input type="password" class="form-control" id="admin_password required" name="password" value="" placeholder="Password">
    </div>
    </div>
     @if ($errors->has('email'))
      <span class="help-block">
      <strong style="color: red;">{{ $errors->first('email') }}</strong>
      </span>
      @endif
      @if ($errors->has('password'))
      <span class="help-block">
      <strong style="color: red;">{{ $errors->first('password') }}</strong>
      </span>
      @endif
      @if ($errors->has('status'))
      <span class="help-block">
      <strong style="color: red;">{{ $errors->first('status') }}</strong>
      </span>
      @endif
     <!-- <div class="form-group">
        <div class="col-md-12">
            <div class="forgotBtnAdmin">
                <a href="<?php echo url('/'); ?>/password/reset">Forgot Password?</a>
                <a href="<?php echo url('/'); ?>/forgot-password">Forgot Password?</a>
            </div>
        </div>
    </div> -->
    <div class="form-group text-center m-t-20">
      <div class="col-xs-12">
        <button style="background: #8059010a !important;
    border: 1px solid #fff !important; color: #fff;" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
      </div>
    </div>
</form>    </div>
</section>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/mousetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/vanilla.idle.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/waves.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/bootstrap-show-password.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/js.cookie.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/toast/js/jquery.toast.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/custom.min.js"></script>


</body>
</html>