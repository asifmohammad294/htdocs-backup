var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isFirefox = navigator.userAgent.indexOf("Firefox") || navigator.userAgent.search("Firefox");
if(isSafari==true){
	$('div').css('background-attachment','inherit');
	//$('.preloader .svgLoader').css('display','none');
	$('.RegisterLogoDivInner').css('min-height','550px');
	$('.portLikeImageDivAbs a').css('line-height','30px');
}

$(document).ready(function() {
 if(controllerName =='static' && actionName=='contact'){
		showMap(siteLat,siteLong,'contactMap',mapStyle); 
 }
});


$(window).load(function(e) {
	
	window.setTimeout( function(e){
		$('.preloader').fadeOut('slow');
		 if(!isSafari){
			new WOW().init();
		 }
	},500);
	
	if(controllerName =='profile'){
		if(window.innerWidth > 767){
			var Width = $('.leftDivProfile').width();
			$('.profileSideBarDiv').css('max-width',Width+'px');
		}
	}
});


$(window).resize(function(e) {
    if(controllerName =='profile'){
		if(window.innerWidth > 767){
			var Width = $('.leftDivProfile').width();
			$('.profileSideBarDiv').css('max-width',Width+'px');
		}
	}
});
