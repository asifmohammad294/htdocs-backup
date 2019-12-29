
<!DOCTYPE html>  
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="keywords" content="Wedding" >
<meta name="description" content="Wedding,directid" >
<title>Wedding | Forgot password</title>
<link href="<?php echo url('/'); ?>/assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link rel="icon" type="image/png" sizes="16x16" href="assets/pics/fav.png">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script src="assets/js/web.min.js"></script>
<script type="text/javascript" src="assets/js/webmig.min.js"></script>
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
.login-box{position:fixed;height:100%;top:0px;margin:0px;background:rgba(48, 107, 159, 0.1);}
.login-box .logo{display:inline-block;margin-bottom:20px;}
.login-box .logo img{margin-right:10px;max-width:210px;}
.login-box .logo span{font-size:28px;color:#2d2e42;display: inline-block;vertical-align: middle;}
.login-box .logo font{color:#e84c3d;}
.forgotBtnAdmin a{color:#2d2e42;}
.login-box .white-box{background:none;box-shadow:none;}
.login-box .white-box form .form-control{color:#444;}
.btninfof{    background-color: #2880ae5e;
    border: 1px solid #2a7dac;     color: #fff;}
.box-title{
     color: #fff;
}
.forgettext{background-color: #22587e2e; color: #fff !important;}
</style>

<!-- <div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>   -->
<section id="wrapper" class="login-register">
  <div class="login-box">
     @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="white-box">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}
        <!-- <a class="logo"><img src="<?php echo url('/'); ?>/assets/images/headerLogo.png" alt="" /></a> -->
        <h3 class="box-title m-b-20">FORGOT PASSWORD</h3>
        <div class="form-group ">
        <div class="col-xs-12">
        <input type="email" class="form-control forgettext" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        </div>
        </div>
        <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
        <button class="btn btninfof btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Submit</button>
        </div>
        </div>
        </form>    
    </div>
  </div>
</section>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/mousetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/vanilla.idle.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/waves.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/bootstrap-show-password.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/js.cookie.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/toast/js/jquery.toast.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/custom.min.js"></script>


</body>
</html>