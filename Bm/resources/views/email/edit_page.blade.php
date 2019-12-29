<?php

foreach ($pages as $key => $value) {
  # code...
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" sizes="16x16" href="assets/pics/fav.png">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="keywords" content="Wedding" >
<meta name="description" content="Wedding,directid" >
<title>Wedding | Edit Email</title>
<link href="<?php echo url('/'); ?>/assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/sidebar-nav/dist/sidebar-nav.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/morrisjs/morris.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/sweetalert/sweetalert.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/assets/html5-editor/bootstrap-wysihtml5.css" media="screen" rel="stylesheet" type="text/css" ><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script src="<?php echo url('/'); ?>/assets/js/web.min.js"></script>
<script type="text/javascript" src="<?php echo url('/'); ?>/assets/js/webmig.min.js"></script>
<script type="text/javascript">
  var LoggedUser=1;
  var ADMIN_APPURL="http://localhost/laravel-crud-demo-master/public";
  var AVTURL="http://www.direct-id.sg/avatars-thumb";
  var MEDIAURL="http://www.direct-id.sg/page-media";
  var AVTBIGURL="http://www.direct-id.sg/avatars";
  var SITENAME="Wedding";
  var Action="editfrontpage";
  var Controller="static";
  var ConfirmTitle="Are you sure?";
  var ConfirmBtn="Yes";
  var CancelBtn="Cancel";
  var extError="Uploaded file is not a valid image. Only JPG,PNG and JPEG files are allowed.";
  var AvtUpdated="Your profile avatar has been updated";
  var PwdUserError="Username and password must not be same";
</script>
</head>
<body class="fix-sidebar fix-header">
<div class="preloader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>
<div id="wrapper">  
  
    @extends('layouts.left-side')
<!--<li class="nav-small-cap m-t-10">--- Main Menu</li>-->     <div id="page-wrapper">
      <div class="container-fluid">
          <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title">Edit Email</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      &nbsp;
    </div>
</div>            <div class="col-md-12">
    <ul class="page-breadcrumb breadcrumb">
        <a href="<?php echo url('/'); ?>" style="color:#FFF;"><i class="fa fa-dashboard"></i> Dashboard</a>  
                    <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
                    <a href="javascript:void(1);" style="color:#FFF;">Site Contents</a>  
                             <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
                    <a href="<?php echo url('/'); ?>/email-templates" style="color:#FFF;">Email-templates</a>  
                             <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
                    <a href="" style="color:#FFF;">Edit Email</a>  
                </ul>
</div>
<div style="clear:both;"></div>
      <div class="row">
  <div class="white-box">
  <form id="page-form" enctype="multipart/form-data" role="form" class="" action="<?php echo url('/'); ?>/email-templates/update-page" novalidate method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-body">
             <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                       <label for="page_title" class="optional">Template Title</label>
<input type="hidden" name="temp_id" value="<?php echo $value->temp_id ?>"> 
<input type="text" name="temp_title" id="page_title" value="<?php echo $value->temp_title ?>" class="form-control required" placeholder="Temp Title">                    </div>
                </div>
             </div>
             <div class="clearfix">&nbsp;</div>
              <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                       <label for="page_title" class="optional">Subject</label>

<input type="text" name="temp_subject" id="page_title" value="<?php echo $value->temp_subject ?>" class="form-control required" placeholder="Temp subject">                    </div>
                </div>
             </div>
             <div class="clearfix">&nbsp;</div>
             <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                       <label for="page_desc" class="optional">Template Text</label>

<textarea name="temp_text" id="page_desc" rows="7" class="form-control required ckeditor" placeholder="Eamil Description" cols="80"><?php echo $value->temp_text ?>
</textarea>                    </div>
                </div>
             </div>
             <div class="clearfix">&nbsp;</div>
          <button class="btn fcbtn btn-outline btn-info btn-1e">Update</button>
            <div class="clearfix">&nbsp;</div>
        </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(e) {
      $('#page-form').validate({
      ignore:":hidden:not(textarea)",     
    });
      $('.editor').wysihtml5();
    if($('a[data-wysihtml5-command="insertImage"]').length>0){
      $('a[data-wysihtml5-command="insertImage"]').remove();
    }
    });
</script>   </div>
    <footer class="footer text-center"><?php echo date("Y"); ?> &copy; Wedding </footer>
<script type="text/javascript" defer="defer" src="<?php echo url('/') ?>/js/bootsetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/vanilla.idle.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/waves.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/toast/js/jquery.toast.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/initial.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/js.cookie.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/mask.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/custom.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/html5-editor/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/html5-editor/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/js/jasny-bootstrap.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/assets/jquery-file-upload/js/jquery.fileupload.js"></script>


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
</body>  
</html>