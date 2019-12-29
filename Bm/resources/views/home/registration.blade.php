
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2019 06:51:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  

   @include('layouts.header')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mb60">
                    <form method="post" action="<?php echo url('/'); ?>/save_registration">
                        <!-- form -->
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="contact-form">
                            <div class="row">
                                <div class="bg_white">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
                                        <div class="text-center">
                                            <h2>Create Profile on Bharatiy matrimony</h2>
                                            <p>Start your journey with confidence. 100% Genuine and Trustworthy Profiles
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Email address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group service-form-group">
                                            <input id="email" type="email" name="email" placeholder="Email" class="form-control" required="">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 ">
                                            <div class="form-group service-form-group">
                                                <label>Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group service-form-group">
                                                <input id="passwordregister" type="passwordregister" name="password" placeholder="Password" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Mobile Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group service-form-group">
                                               <select class="wide mb20" name="code">
                                                <option value="91">India(+91)</option>
                                                <option value="44">United Kingdom(+44)</option>
                                                <option value="44">United States(+1)</option>
                                                <option value="93">Afghanistan(+93)</option>
                                                <option value="355">Albania(+355)</option>
                                                <option value="91">India(+91)</option>
                                                <option value="44">United Kingdom(+44)</option>
                                                <option value="1">United States(+1)</option>
                                                <option value="93">Afghanistan(+93)</option>
                                                <option value="355">Albania(+355)</option>
                                                <option value="91">India(+91)</option>
                                                <option value="44">United Kingdom(+44)</option>
                                                <option value="1">United States(+1)</option>
                                               

                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group service-form-group">
                                                <input id="phone" type="text" name="phone" placeholder="Phone" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Profile creating for</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group service-form-group">
                                               <select class="wide mb20" name="profile">
                                                    <option value="">Select </option>
                                                    <option value="Self">Self</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughter">Daughter</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Relative">Relative</option>
                                                    <option value="Friend">Friend</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group service-form-group">
                                                <label>First Name<span class="pt-1">Same as ID document</span> </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="fname">dc</label>
                                                <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group service-form-group">
                                                <label>Last Name<span class="pt-1">Same as ID document</span> </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12 col-12  ">
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="lname"></label>
                                                <input id="lname" type="text" name="lname" placeholder="Last Name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Gender</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 pl-5">
                                            <div class="form-group service-form-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" required id="customRadio1" value="Male" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 pl-5">
                                            <div class="form-group service-form-group">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" required id="customRadio2" value="Female" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group service-form-group">
                                                <label> Date of Birth <span class="pt-1">Same as ID document</span> </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group service-form-group">
                                                 <input id="lname" type="date" name="dob" placeholder="Date Of Birth" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Location</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7">
                                            <div class="form-group service-form-group">
                                                <input id="" type="text" name="location" placeholder="Location" class="form-control" required>

                                                 <input id="city" type="hidden" name="city" placeholder="Location" class="form-control" >

                                                  <input id="state" type="hidden" name="state" placeholder="Location" class="form-control" >

                                                  <input id="pin" type="hidden" name="pin" placeholder="Pin Code" class="form-control" >

                                                  <input id="country" type="hidden" name="country" placeholder="country" class="form-control" >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Religion</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7">
                                            <div class="form-group service-form-group">
                                                <select class="wide mb20" name="religion">
                                                    <option value="">Select</option>
                                                    <option value="Hindu">Hindu</option>
                              
                                                      <option value="Jain">Jain</option>
                                  
                                                      <option value="Muslim">Muslim</option>
                                  
                                                      <option value="Sikh">Sikh</option>
                                  
                                                      <option value="Christian">Christian</option>
                                  
                                                      <option value="Spiritual">Spiritual</option>
                                  
                                                      <option value="Parsi">Parsi </option>
                                  
                                                      <option value="Jewish">Jewish</option>
                                  
                                                      <option value="Buddhist">Buddhist</option>
                                  
                                                      <option value="No Religion">No Religion</option>
                                  
                                                      <option value="Other">Other</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5">
                                            <div class="form-group service-form-group">
                                                <label>Mother Tongue</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7">
                                            <div class="form-group service-form-group">
                                                <select class="wide mb20" name="mt">
                                                     <option  value="Arabic">Arabic</option>
                                            <option  value="Assamese">Assamese</option>
                                            <option  value="Awadhi">Awadhi</option>
                                            <option value="Bangali">Bangali</option>
                                            <option  value="Bhojpuri">Bhojpuri</option>
                                            <option  value="Chattisgari">Chattisgari</option>
                                            <option  value="Coorgi">Coorgi</option>
                                            <option  value="Dogri">Dogri</option>
                                            <option  value="English">English</option>
                                            <option  value="French">French</option>
                                            <option  value="Garhwali">Garhwali</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option  value="Haryanavi">Haryanavi</option>
                                            <option  value="Himachali">Himachali</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Jewish">Jewish</option>
                                            <option  value="Kannada">Kannada</option>
                                            <option  value="Kashmiri">Kashmiri</option>
                                            <option  value="Konkani">Konkani</option>
                                            <option  value="Kumaoni">Kumaoni</option>
                                            <option  value="Kutchi">Kutchi</option>
                                            <option  value="Magahi">Magahi</option>
                                            <option  value="Malayalam">Malayalam</option>
                                            <option  value="Manipuri">Manipuri</option>
                                            <option  value="Marathi">Marathi</option>
                                            <option  value="Marwari">Marwari</option>
                                            <option  value="Nepali">Nepali</option>
                                            <option  value="Oriya">Oriya</option>
                                            <option value="Persian">Persian</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option  value="Rajasthani">Rajasthani</option>
                                            <option  value="Russian">Russian</option>
                                            <option  value="Sindhi">Sindhi</option>
                                            <option  value="Spanish">Spanish</option>
                                            <option  value="Tamil">Tamil</option>
                                            <option  value="Telugu">Telugu</option>
                                            <option  value="Tulu">Tulu</option>
                                            <option  value="Urdu">Urdu</option>
                                            <option value="Other">Other</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group service-form-group">
                                                <label>Referral Code</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                            <div class="form-group service-form-group">
                                                <label class="control-label sr-only" for="fname">dc</label>
                                                <input id="fname" type="text" name="ref" placeholder="Referral Code" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5 col-md-5"></div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="terms">
                                                <p>By submitting you agree to our 
                                                    <a href=""> Privacy Policy</a> and 
                                                    <a href="">T&C.</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5"></div>
                                        <div class="col-md-7 col-sm-7">
                                            <button type="submit" name="submit" value="submit" class="btn btn-default">Signup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.blog-post-section -->
   @extends('file.footer')
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo url('/'); ?>/public/home/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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


<script src='http://maps.googleapis.com/maps/api/js?v=3&amp;libraries=places&key=AIzaSyBDoWXTfZG_JGcy7rfbjd97Ft5rcj-A3A8'></script>
 <script src="http://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
<script>
     $(function () {    
        
$("#location").geocomplete({

     details: ".geo-details",
     detailsAttribute: "data-geo"

 }).bind("geocode:result", function (event, result) {

     $("#lat").val(result.geometry.location.lat());
     $("#lng").val(result.geometry.location.lng());

        var parsedResult=$(result.adr_address);
        
       var stateVal=parsedResult.filter('.region').text();
       var CityVal=parsedResult.filter('.locality').text();
        var Cn=parsedResult.filter('.country-name').text();
        var postal_code=parsedResult.filter('.postal-code').text();
        //alert(result.adr_address);
        $('#pin').val(postal_code);
        $('#country').val(Cn);
       $('#state').val(stateVal);
        
       if(CityVal!=""){
         $("#city").val(CityVal);
       }
 });
 });
    </script>
</html>