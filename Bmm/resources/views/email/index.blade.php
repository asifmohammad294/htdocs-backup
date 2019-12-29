
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
<title>Wedding | Email-templates</title>
<link href="assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/sidebar-nav/dist/sidebar-nav.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/morrisjs/morris.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/sweetalert/sweetalert.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/DataTables/media/css/dataTables.bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="assets/DataTables/extensions/Responsive/css/responsive.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" ><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script src="assets/js/web.min.js"></script>
<script type="text/javascript" src="assets/js/webmig.min.js"></script>
<script type="text/javascript">
  var LoggedUser=1;
  var ADMIN_APPURL="http://www.direct-id.sg/directprivateid";
  var AVTURL="http://www.direct-id.sg/avatars-thumb";
  var MEDIAURL="http://www.direct-id.sg/page-media";
  var AVTBIGURL="http://www.direct-id.sg/avatars";
  var SITENAME="Wedding";
  var Action="index";
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
      <h4 class="page-title">Pages</h4>
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
            </ul>
</div>
<div style="clear:both;"></div>
      <div class="row">
  <div class="white-box">
        <table id="sample_1" class="table table-striped table-bordered table-hover dataTable">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Templates Title</th>
                    <th>Subject</th>
                    <th>Last Modified</th>
                    <th>Actions</th>
                </tr>

              
            </thead>
            <tbody>
                <tbody>
           <?php
           $i = 0;
             foreach ($pages as $key => $value) {
               # code...
             $i++;
              ?>
            <tr role="row" class="odd">
             
              <td class="sorting_1" tabindex="0"><?php echo $i; ?></td>
              <td><?php echo $value->temp_title ?></td>
              <td><?php echo $value->temp_subject ?></td>
              <td><?php echo date('F d,Y h:i a', strtotime($value->temp_updated_on));  ?></td>
              <td><a class="btn btn-outline btn-info btn-sm waves-effect waves-light m-t-5" href="email-templates/edit-page/<?php echo $value->temp_key?>"><i class="fa fa-edit"></i></a></td>
              
            </tr>
 <?php } ?>
          </tbody>
            </tbody>
        </table>
    </div>
 </div>
   </div>
    <footer class="footer text-center"><?php echo date("Y"); ?> &copy; Wedding </footer>
    <script type="text/javascript" defer="defer" src="assets/js/mousetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/vanilla.idle.js"></script>
<script type="text/javascript" defer="defer" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/waves.js"></script>
<script type="text/javascript" defer="defer" src="assets/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/toast/js/jquery.toast.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/initial.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/js.cookie.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/mask.js"></script>
<script type="text/javascript" defer="defer" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" defer="defer" src="assets/js/custom.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/DataTables/media/js/jquery.dataTables.min.js?a=1531913459"></script>
<script type="text/javascript" defer="defer" src="assets/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="assets/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


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
<div class="jq-toast-wrap top-right"><div class="jq-toast-single jq-has-icon jq-icon-success" style="text-align: left; display: none;"><span class="jq-toast-loader"></span><h2 class="jq-toast-heading">Site settings has been updated</h2></div></div>

</body>  
</html>