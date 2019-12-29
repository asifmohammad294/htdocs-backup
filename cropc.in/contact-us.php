<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- PAGE TITLE -->
        <title>Contact Us | CROPC</title>

        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300%7CRoboto:400,100,300,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
    </head>

    <body class="contact-template">
        <!-- HEADER -->
       <?php include'header.php' ?>
        <!-- HEADER END -->

        <!-- PAGE HEADER -->
        <section class="page-breadcumb-header">
            <div class="container">
                <div class="row">
                    <h1 class="page-title">Contact</h1>
                    <div class="breadcumb-wrapper">
                        <a href="#">Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- PAGE HEADER END -->

      
<!-- CONTACT SECTION -->
<section class="contact-map-section section"> 
  <!-- Google Map -->
  <div class="map-wrapper">
    <div >
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.04611135456!2d77.19663331440493!3d28.538333695090408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce20689fe25a9%3A0xf356f4f9935b8260!2sElemention!5e0!3m2!1sen!2sin!4v1550816604968" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
  <!-- End --> 
  
  <!-- Contact Form -->
  <div class="contact-form-sections">
    <h1 class="section-tittle">Stay <span class="bold-text">Connected</span></h1>
    <div class="contact-form-wrapper">
      <form action="#">
        <input type="text" name="name" id="name" placeholder="Your name">
        <input type="email" name="email" id="email" placeholder="Your email">
        <input type="text" name="subject" id="subject" placeholder="I would like to discuss">
        <input type="tel" name="phone" id="phone" placeholder="Phone number">
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>
  <!-- End --> 
</section>
<!-- CONTACT SECTION END -->


<!-- FOOTER -->
<?php include'footer.php' ?>
<!-- FOOTER END --> 

        <!-- jQuery -->
        <script src="js/vendors/jquery.min.js"></script>

        <!-- Plugins -->
        <script src="js/plugins.js"></script>

        <!-- GOOGLE MAP -->
        
        
        <script src="js/google-map-init.js"></script>

         <!-- Main JS -->
        <script src="js/main.js"></script>
        
    </body>

</html>