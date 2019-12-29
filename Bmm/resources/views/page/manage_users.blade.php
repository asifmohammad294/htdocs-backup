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
<title>Bharatiy Matrimony | Manage Users</title>
<link href="<?php echo url('/'); ?>/public/assets/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/sidebar-nav/dist/sidebar-nav.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/morrisjs/morris.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/animate.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/style.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/default.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/css/colors/blue.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/toast/css/jquery.toast.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/sweetalert/sweetalert.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/DataTables/media/css/dataTables.bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo url('/'); ?>/public/assets/DataTables/extensions/Responsive/css/responsive.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" ><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->

<script src="<?php echo url('/'); ?>/public/assets/js/web.min.js"></script>
<script type="text/javascript" src="/public/assets/js/webmig.min.js"></script>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
    locale: {
      format: 'YYYY-MM-DD'
    },
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<style>
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
      <h4 class="page-title">Manage Users</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      &nbsp;
    </div>
</div>        
    <div class="col-md-12">
    <ul class="page-breadcrumb breadcrumb">
        <a href="<?php echo url('/'); ?>/admin" style="color:#FFF;"><i class="fa fa-dashboard"></i> Dashboard</a>  
                    <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
                    <a href="javascript:void(1);" style="color:#FFF;">Users</a>  
                             <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
                    <a href="" style="color:#FFF;">Users</a>  
                             <i class="fa fa-chevron-right" style="vertical-align:middle; color:#FFF;"></i>
            </ul>
</div>
<div style="clear:both;"></div>
      <div class="row">
  <div class="white-box">
     
  
       
      

    <div class="clearfix">&nbsp;</div>
 
        <div class="">
        

          <div class="col-md-10">
            <h4>
          Item Per Page: Total Result Found: Showing 1 to {{ $pages->perPage() }}  of {{ $pages->total() }} ({{ $pages->lastPage() }} Pages) </h4>
        </div>
      </div>
     
<div class="col-md-12"> 
     {{ $pages->links() }} 
</div>

      <div class="clearfix">&nbsp;</div>
       <form id="team_form" method="post" action="remove-users"  onsubmit="return checkSelects('team_form');" >
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="table-toolbar">
         <div class="btn-group">
                 <a href="javascript:" class="btn btn-outline btn-info btn-sm waves-effect waves-light selectall"><i class="fa fa-plus"></i> Verify </a>
                </div>  
          <div class="btn-group">
            <button id="sample_editable_1_new" class="btn btn-outline btn-danger btn-sm waves-effect waves-light"> <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete Selected </button>
          </div>  


        </div>
                <div class="clearfix">&nbsp;</div>
        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="sample_1" role="grid">
                    <thead>
                    <tr>
                        <th width="6%">S.No.</th>
                        <th width="4%"><div class="checkbox"><input id="deletebcchk" name="deletebcchk" type="checkbox" class="group-checkable"><label for="deletebcchk"></label></div></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Profile For</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Status</th>
                       
                       
                    </tr>
                </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    foreach ($pages as $key => $value) {
                    # code...
                    $i++;
                    ?>
                    <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $i; ?></td>
                      <td>
                        <div class="checkbox">
                          <input class="elem_ids checkboxes" type="checkbox" id="checkbox_<?php echo $value->id; ?>" name="clients[<?php echo $value->id; ?>]" value="<?php echo $value->id; ?>"><label for="checkbox_<?php echo $value->id; ?>"></label></div>
                        </td>
                          <td><?php echo $value->fname.' '.$value->lname; ?></td>
                          <td><?php echo $value->email ?></td>
                          <td><?php echo $value->phone ?></td>
                          <td><?php echo $value->profile ?></td>
                          <td><?php echo $value->gender ?></td>
                          <td><?php echo $value->city ?></td>

                          <td><?php if($value->status == 1){ ?><label class="switch">
                    <input type="checkbox" class="chk ids<?php echo $value->id; ?>" value="1" id="<?php echo $value->id; ?>" checked>
                    <span class="slider round"></span>
                    </label>
                    <?php } else{ ?><label class="switch">
                    <input type="checkbox" class="chk ids<?php echo $value->id; ?>" value="0" id="<?php echo $value->id; ?>" >
                    <span class="slider round"></span>
                    </label>
                    <?php } ?></td>
                       
                     
                    </tr>
                    <?php } ?>
                  </tbody>
        </table>
      </form>
      {{ $pages->links() }}
                </div>
 </div>


  </div>

  <script type="text/javascript" charset="utf-8">


  $(document).ready(function(){

    
    $('.selectall').click(function(){
 var checkedVals = $('.elem_ids:checkbox:checked').map(function() {
    return this.value;
}).get();


        $.ajax({
            url: '<?php echo url('/'); ?>/admin/Verifyall',
            type: 'POST',
            data: 'clients='+checkedVals.join(","),
            success: function (data) {
                location.reload();
            }
        });
    });



    $('#state').change(function(){
      var state=$(this).val();
        $.ajax({
            url: '<?php echo url('/'); ?>/admin/Verifyall',
            type: 'POST',
            data: 'state='+state,
            success: function (data) {
                $('#city').html(data);
            }
        });
    });

       $('#state1').change(function(){
      var state=$(this).val();
        $.ajax({
            url: '<?php echo url('/'); ?>/admin/city_by_state',
            type: 'POST',
            data: 'state='+state,
            success: function (data) {
                $('#city1').html(data);
            }
        });
    });


});

  var sortinArr = [1,5];
  var listeText = 'categories';
    $('.chk').change(function(){

var vl=$(this).val();
var id=$(this).attr('id');
   $.ajax({
              url: "<?php echo url('/'); ?>/admin/update_status_users",
              data: 'status='+vl+'&id='+id+'&table=users',            

              type: "POST",
                    success: function (data) {
                      
                          if (vl==0) {
                            $('.ids'+id).val('1');
                          }else if(vl==1)
                          {
                            //alert(vl);
                            $('.ids'+id).val('0');
                          }
                    }
                });
  });
$(document)  .ready(function(e) {
  $('#sample_1').dataTable({
    "language":{"lengthMenu": "Show _MENU_ "+listeText},
    "responsive":true,
    "aoColumnDefs":[
      {"bSortable":false,"aTargets":sortinArr},
     ],
  });
});
</script> 
<style type="text/css">
  .dataTables_filter, .dataTables_info { display: none; }
  .dataTables_length { display: none; }
  .dataTables_paginate { display: none; }

</style>
   <footer class="footer text-center"><?php echo date("Y"); ?> &copy; Bharatiy Matrimony </footer>
     <script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/mousetrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/js/vanilla.idle.js"></script>
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
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/DataTables/media/js/jquery.dataTables.min.js?a=1531913459"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" defer="defer" src="<?php echo url('/'); ?>/public/assets/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>




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