"use strict";


// Prealoder
 function prealoader () {
   if ($('#loader').length) {
     $('#loader').fadeOut(); // will first fade out the loading animation
     $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
     $('body').delay(350).css({'overflow':'visible'});
  };
 }



// placeholder remove
function removePlaceholder () {
  if ($("input,textarea").length) {
    $("input,textarea").each(
            function(){
                $(this).data('holder',$(this).attr('placeholder'));
                $(this).on('focusin', function() {
                    $(this).attr('placeholder','');
                });
                $(this).on('focusout', function() {
                    $(this).attr('placeholder',$(this).data('holder'));
                });
                
        });
  }
}

// Accordion panel
function themeAccrodion () {
  if ($('.theme-accordion > .panel').length) {
    $('.theme-accordion > .panel').on('show.bs.collapse', function (e) {
          var heading = $(this).find('.panel-heading');
          heading.addClass("active-panel");
          
    });
    
    $('.theme-accordion > .panel').on('hidden.bs.collapse', function (e) {
        var heading = $(this).find('.panel-heading');
          heading.removeClass("active-panel");
          //setProgressBar(heading.get(0).id);
    });

  };
}


// Testimonial Slider 
function testimonialSlider () {
	if($('#testimonial-slider').length) {
		$('#testimonial-slider').owlCarousel({
		    loop:true,
		    margin:30,
		    nav:false,
		    autoplay:true,
		    autoplayTimeout:1500,
		    autoplaySpeed:1000,
		    lazyLoad:true,
		    singleItem:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        731:{
		            items:2
		        },
		        1000:{
		            items:3
		        }
		    }
		})
	}
}




// Counter function
function CounterNumberChanger () {
  var timer = $('.timer');
  if(timer.length) {
    timer.appear(function () {
      timer.countTo();
    })
  }
}


// Scroll to top
function scrollToTop () {
  if ($('.scroll-top').length) {

    //Check to see if the window is top if not then display button
    $(window).on('scroll', function (){
      if ($(this).scrollTop() > 200) {
        $('.scroll-top').fadeIn();
      } else {
        $('.scroll-top').fadeOut();
      }
    });
    
    //Click event to scroll to top
    $('.scroll-top').on('click', function() {
      $('html, body').animate({scrollTop : 0},1500);
      return false;
    });
  }
}



// Mixitup gallery
function mixitupGallery () {
  if ($("#mixitup_list").length) {
    $("#mixitup_list").mixItUp()
  };
}



// Fancybox 
function FancypopUp () {
  if ($(".fancybox").length) {
    $(".fancybox").fancybox({
      openEffect  : 'elastic',
        closeEffect : 'elastic',
         helpers : {
            overlay : {
                css : {
                    'background' : 'rgba(0, 0, 0, 0.6)'
                }
            }
        }
    });
  };
}


// Google Map 
function googlMap () {
	if($("#google-map").length) {
		var settingsItemsMap = {
	        zoom: 12,
	        center: new google.maps.LatLng(23.810332, 90.412518),
	        zoomControlOptions: {
	          style: google.maps.ZoomControlStyle.LARGE
	        },
	        scrollwheel: false,
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map(document.getElementById('google-map'), settingsItemsMap );
	    var image = 'images/map.png';
	    var myMarker = new google.maps.Marker({
	        position: new google.maps.LatLng(23.810332, 90.412518),
	        draggable: true,
	        icon: image
	    });

	    map.setCenter(myMarker.position);
	    myMarker.setMap(map);
	    // Google map 
	};
}

//Contact Form Validation
function contactFormValidation () {
  if($('.form-validation').length){
    $('.form-validation').validate({ // initialize the plugin
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true
        },
        message: {
          required: true
        }
      },
      submitHandler: function(form) {
                $(form).ajaxSubmit({
                    success: function() {
                        $('.form-validation :input').attr('disabled', 'disabled');
                        $('.form-validation').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#alert_success').fadeIn();
                        });
                    },
                    error: function() {
                        $('.form-validation').fadeTo( "slow", 1, function() {
                            $('#alert_error').fadeIn();
                        });
                    }
                });
            }
        });
  }
}

// Close suddess Alret
function closeSuccessAlert () {
  if($('.closeAlert').length) {
    $(".closeAlert").on('click', function(){
      $(".alert_wrapper").fadeOut();
    });
    $(".closeAlert").on('click', function(){
      $(".alert_wrapper").fadeOut();
    })
  }
}

// Sticky menu
function menuScroll () {
  if ($('header').length) {
    var sticky = $('header'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
    
  };
}



// toggle menu for mobile
function mobileDropdown () {
  if($('header').length) {
    $('header nav.navbar-default .nav>li.dropdown-holder').append(function () {
      return '<i class="fa fa-bars"></i>';
    });
    $('header nav.navbar-default .nav>li.dropdown-holder .fa').on('click', function () {
      $(this).parent('li').children('ul').slideToggle();
    }); 
  }
}














// Window scroll function
jQuery(window).on('scroll', function () {
  (function ($) {
   	menuScroll ()
  })(jQuery);
});


// window load function
jQuery(window).on('load', function () {
  (function ($) {
  	prealoader ()
  })(jQuery);
});