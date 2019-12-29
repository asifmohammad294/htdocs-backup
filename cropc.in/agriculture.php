<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- PAGE TITLE -->
<title>Agriculture | CROPC</title>

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
      <h1 class="page-title">Agriculture</h1>
      <div class="breadcumb-wrapper"> <a href="#">Home</a> <span>Agriculture </span> </div>
    </div>
  </div>
</section>
<!-- PAGE HEADER END -->

<main class="service-main">
  <div class="services-container-box">
    <div class="o-section">
      <div id="tabs" class="awt-tabs no-js">
        <div class="awt-tabs-nav"> 
        <div class="awt-tab is-active">
          <div class="awt-tab_content_box">
            <section class="page-contents-wrapper">
              <div class="container">
                <div class="row"> 
                  
                  <!-- Page Contents -->
                  <div class="page-contents col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-section">
                      <div class="left-twothird">
                        <h2 class="content-inner-title">AGRICULTURE FORECASTING<span class="bold-text"></span></h2>
                        <ul>
                            <li>Agricultural prediction using the crop growth models and the local weather parameters </li>
                            <li>Study of water-agriculture-energy-climate change nexus</li>
                            <li>Adaptation of agriculture practices under projected climate scenarios</li>
                            <li>Modelling of nutrients, pesticides and fertilizer movement in agriculture area </li>
                        </ul>
                      </div>
                      <div class="right-onethird">
                        <div class="image-wrapper"> <img src="images/agriculture1.jpg" alt="Service"> </div>
                      </div>
                    </div>
              
                    
                  </div>
                  <!-- End --> 
                </div>
              </div>
            </section>
          </div>
       
       
      </div>
    </div>
  </div>
</main>

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