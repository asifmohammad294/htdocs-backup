<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- PAGE TITLE -->
<title>Radar | CROPC</title>

<!-- GOOGLE FONTS -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300%7CRoboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/service_tab.css">
</head>

<body class="service-template services-pages">
<!-- HEADER -->
<?php include'header.php' ?>
<!-- HEADER END --> 

<!-- PAGE HEADER -->
<section class="page-breadcumb-header">
  <div class="container">
    <div class="row">
      <h1 class="page-title">Radar</h1>
      <div class="breadcumb-wrapper"> <a href="#">Home</a> <span>Radar </span> </div>
    </div>
  </div>
</section>
<!-- PAGE HEADER END -->

<?php 
$page = file_get_contents("http://www.imd.gov.in/pages/radar_main.php");
$split = explode("Hindi", $page)[1]; 

echo $split;
?>
<br>
<br>
<br>
<br>
<!-- FOOTER -->
<?php include'footer.php' ?>
<!-- FOOTER END --> 

<!-- jQuery --> 
<script src="js/vendors/jquery.min.js"></script> 

<!-- Plugins --> 
<script src="js/plugins.js"></script> 

<!-- Main JS --> 
<script src="js/main.js"></script> 
<script src="js/githubicons.js"></script> 
<script src="js/carbonad.js"></script> 
<script src="js/tabs.js"></script> 
<script>
  var myTabs = tabs({
    el: '#tabs',
    tabNavigationLinks: '.awt-track-tabs',
    tabContentContainers: '.awt-tab'
  });

  myTabs.init();
</script>
</body>
</html>