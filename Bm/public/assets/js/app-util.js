$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    submitHandler: function(form) {
        $(".preloader").fadeIn();
        form.submit();
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if (element.attr("id") == "page_short_desc") { 
            error.appendTo($('#page_short_desc').parent('div'));
        } else if (element.attr("id") == "temp_text") { 
            error.appendTo($('#temp_text').parent('div'));
        }
		else if (element.hasClass("chosen-select")) { 
            error.appendTo(element.parent('.form-group'));
        }
		else if (element.hasClass("checkbox")) { 
            error.appendTo(element.parent('.form-group'));
        }
		 else {
            error.insertAfter(element);
        }
    }
});

$.validator.setDefaults({ ignore: ":hidden:not(.ckeditor,.chosen-select)"});
$('.profile_form').validate({
	ignore: "hiddenRecaptcha:hidden",
	rules:{
		client_rpassword:{equalTo:'#client_password'},
		client_old_password:{remote:{url:APPURL+'/check-password'}},
		t_old_password:{remote:{url:APPURL+'/teacher-check-password'}},
		'da_certification_name[]':{required:true},
		client_agree : {required:true},
	 	client_style_one: {
			//required: true,
			checkTotal: true
		},
		client_style_two: {
			//required: true,
			checkTotal: true
		},
		client_style_three: {
			//required: true,
			checkTotal: true
		},
 	},
	groups: {
    	percent: "client_style_one client_style_two client_style_three"
    },	
	hiddenRecaptcha: {
		required: function () {
			if (grecaptcha.getResponse() == '') {
				return true;
			} else {
				return false;
			}
		}
	}
});

/* jQuery.validator.addMethod("checkTotal", function (value) {
	total = parseFloat($('#client_style_retro').val()) + parseFloat($('#client_style_modern').val()) + parseFloat($('#client_style_scandinavian').val()) + parseFloat($('#client_style_industrial').val());
	return total == 100;
}, "Total must be 100%!");*/

 $.validator.addMethod('anyOne', function (value, element, param) {
          return ($(element).is(':filled') || $('[name="' + param + '"]').is(':filled'));
      }, "Please enter your payment details");


jQuery.validator.addClassRules("validateEmail",{remote: {url: APPURL+"/user/validatedetails/key/email",async:false}});


$.validator.addMethod("regex",function(value, element, regexp) {
	       var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Password must contain atleast one lower case,one upper case, one digit and one special character and at least 8 characters."
);

jQuery.validator.addClassRules({pswZXRhYmVlYgrd : {minlength: 6,maxlength:16}});

/* Validate Forgot Email */
jQuery.validator.addClassRules("validateForgotEmail",{remote:{url: APPURL + "/user/validatedetails/key/femail",async:false}});


jQuery.validator.addClassRules("checkPaypalEmail", {
    remote: {
        url: APPURL + "/check-paypal"
    }
});


$.validator.addMethod("checkTotal",function(value, element, regexp) {
	var val1 = $('#client_style_one').val();
	var val2 = $('#client_style_two').val();
	var val3 = $('#client_style_three').val();
			if(val1!='' &&  val2 != '' && val3 != ''){
				if(val1!= val2 && val2!=val3 && val3!=val1){
					return true;
				}
				else{
					return false;	
				}
			}
			else if(val1!='' &&  val2 != ''){
					if(val1!= val2){
						return true;
					}
					return false;
			}
			else if(val2!='' &&  val3 != ''){
					if(val2!= val3){
						return true;
					}
					return false;
			}
			else if(val3!='' &&  val1 != ''){
					if(val13!= val1){
						return true;
					}
					return false;
			}

		   return true;
        },
        "Select different style."
);


function emailListSubmit() {
	if($('.profile_form').valid()){
		if($('.contactNameDiv').length > 0){
			var AllSt = $('#all_students input[type=checkbox]:checked').length;
			var ActiveSt = $('#active_students input[type=checkbox]:checked').length;
			var InActiveSt = $('#inactive_students input[type=checkbox]:checked').length;
			var allTeacher = $('#per_teacher input[type=checkbox]:checked').length;
			
			if(AllSt==0 && ActiveSt==0 && InActiveSt == 0 && allTeacher==0){
				$('.errorMsg').show();
			}
			else{
				$('.profile_form').submit();
			}
		}
	}
}


$.validator.addMethod("pwd_username_not_same", function(value, element) {
    return $('#client_fullname').val() != $('#client_password').val()
}, "Due to security reason full name is not allowed in your password,please choose another password");

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function checkCookie() {
    var username = getCookie("username");
    if (username != "") {
        alert("Welcome again " + username);
    } else {
        username = prompt("Please enter your name:", "");
        if (username != "" && username != null) {
            setCookie("username", username, 365);
        }
    }
}


/*function avatarUploader() {
    $('.file-upload').fileupload({
        url: APPURL + '/change-profile',
        add: function(e, data) {
            var uploadErrors = [];
            var file_name = data.originalFiles[0]['name']
            var Extension = file_name.substr((file_name.lastIndexOf('.') + 1));
            var extension_array = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
            if (($.inArray(Extension, extension_array) < 0)) {
                $('.fileinput-filename').html('');
                $('.fileinput').removeClass('fileinput-exists');
                $('.fileinput').addClass('fileinput-new');
                showAppAlert(SITENAME, extError, "warning");
            } else {
                data.submit();
            }
        },
        done: function(e, data) {
            $('.fileinput-filename').html('');
            $('.fileinput').removeClass('fileinput-exists');
            $('.fileinput').addClass('fileinput-new');
            if (data.result == 0) {
                $('#pic-progress').hide();
                showAppAlert(SITENAME, extError, "warning");
            } else {
                var data = JSON.parse(data.result);
                if ($('.user-content img').length > 0) {
                    $('.user-content img').remove();
                }
                if ($('.user-pro img').length > 0) {
                    $('.user-pro img').remove();
                }
                if ($('.user-bg img').length > 0) {
                    $('.user-bg img').remove();
                }
                var bigImgTag = "<img src='" + AVTBIGURL + "/" + data + "' style='width:100%;' alt='big-avatar' />"
                var imgTag = "<img src='" + AVTURL + "/" + data + "' class='thumb-lg img-circle' alt='avatar' />";
                var smallimgTag = "<img src='" + AVTURL + "/" + data + "' class='img-circle' alt='avatar' />";
                $('.user-content').html(imgTag);
                $('a#profile-avatar-link').prepend(smallimgTag);
                $('.user-bg').prepend(bigImgTag);
				
                $('#pic-progress').hide();
                toastInit(AvtUpdated, "success");
            }
        },
        progress: function(e, data) {
            $('#pic-progress').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#pic-bar").width(progress + '%');
            $('#pic-progress').css('width', progress + '%');
        }
    });
}*/


function mediaUploader(url) {
    $('.file-upload').fileupload({
        url: ADMIN_APPURL + '/' + url,
        add: function(e, data) {
            var uploadErrors = [];
            var file_name = data.originalFiles[0]['name']
            var Extension = file_name.substr((file_name.lastIndexOf('.') + 1));
            var extension_array = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
            if (($.inArray(Extension, extension_array) < 0)) {
                $('.fileinput-filename').html('');
                $('.fileinput').removeClass('fileinput-exists');
                $('.fileinput').addClass('fileinput-new');
                showAppAlert(SITENAME, extError, "warning");
            } else {
                data.submit();
            }
        },
        done: function(e, data) {
            $('.fileinput-filename').html('');
            $('.fileinput').removeClass('fileinput-exists');
            $('.fileinput').addClass('fileinput-new');
            if (data.result == 0) {
                $('#pic-progress').hide();
                showAppAlert(SITENAME, extError, "warning");
            } else {
                var res = $.parseJSON(data.result);
                console.log(res.uploader);
                $('#page_images').val(res.uploader);
                if ($('#preview').length > 0) {
                    $('#preview').remove();
                }
                var img = "<img id='preview' src='" + MEDIAURL + "/" + res.uploader + "'  alt='page-media' class='img-thumbnail' style='max-width:100px;' />";
                $(img).insertAfter($('#pic-progress'));
                toastInit(AvtUpdated, "success");
            }
        },
        progress: function(e, data) {



            $('#pic-progress').show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#pic-bar").width(progress + '%');
            $('#pic-progress').css('width', progress + '%');
        }
    });
}
$('#deletebcchk').click(function(e) {
    var current_checked_status = $(this).prop('checked');
    if (current_checked_status == false) {
        $('.checkboxes').prop('checked', false);
    } else {
        $('.checkboxes').prop('checked', true);
    }
});

function showAppAlert(title, msg, type) {
	if($('.alert.alert-with-icon').length){
		$('.alert.alert-with-icon').fadeOut(500);
	}
	
	$.notify({
	icon: 'pe-7s-flag',
	message: msg
		},{
	type: type,
	timer: 10000
});
	
}

function toastInit(msg, icon) {
   $.notify({
	icon: icon,
	message: msg

},{
	type: 'success',
	timer: 10000
});
	
}

function checkPwdStrenth(val) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test(val)) {
        $('#passstrength').html('More Characters');
    } else if (strongRegex.test(val)) {
        $('#passstrength').addClass('text-success');
        $('#passstrength').html('Strong!');
    } else if (mediumRegex.test(val)) {
        $('#passstrength').addClass('text-warning');
        $('#passstrength').html('Medium!');
    } else {
        $('#passstrength').addClass('text-danger');
        $('#passstrength').html('Weak!');
    }
    return true;
}

function addFaq(id) {
    $.ajax({
        url: ADMIN_APPURL + '/get-faq-form.htm',
        method: 'post',
        data: {
            id: id
        },
        success: function(data) {
            var splittedData = data.split('~~');
            $('#admin-webapp-modal .modal-title').html(splittedData[0]);
            $('#admin-webapp-modal .modal-body').html(splittedData[1]);
            $('#admin-webapp-modal .modal-body').append("<div class='clearfix'>&nbsp;</div>");
            $('#admin-webapp-modal .modal-body #faq-form').validate();
            $('#admin-webapp-modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
}

function checkSelects(id){
	
	alert(id);
	var checkedRecords = false;
	$(".elem_ids").each(function(index, element) {
		if ($(this).prop("checked") == true) {
			checkedRecords = true;
		}
	});
	if (checkedRecords == false) {
		showAppAlert("Orion Quotes", "No Records Selected for Delete,Please Select Records to delete", "warning");
		return false;
	}
	else{
		swal({
		title: "Are you sure?",
		text: "Do you want to delete ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Confirm",
		cancelButtonText: "Cancel",
		closeOnConfirm: true,
		closeOnCancel: true
		}, function(isConfirm) {
		if(isConfirm == true) {
			if(id === undefined){
				$('.elem_ids').closest("form").attr('onsubmit', 'return CallBackTrue()');
				$('.elem_ids').closest("form").submit();
			}
			else{
				$('#'+id).attr('onsubmit', 'return CallBackTrue()');
				$('#'+id).submit();	
			}
		}
		else {
			return false;
		}
		});
	}
	return false;
}

function CallBackTrue() {
	return true;
}

function avatarUploader(){
	
	$('.file-upload').fileupload({
		url:APPURL+'/change-profile',
		add:function(e, data) {  
			var uploadErrors=[];
			var file_name=data.originalFiles[0]['name']
	        var Extension=file_name.substr((file_name.lastIndexOf('.') + 1));
			var extension_array=['jpg','jpeg','png','JPG','JPEG','PNG'];
			if(($.inArray(Extension, extension_array)<0)){ 
				$('.fileinput-filename').html('');
				$('.fileinput').removeClass('fileinput-exists');
				$('.fileinput').addClass('fileinput-new');
				showAppAlert(SITENAME,extError,"warning");
			}
			else {
				$('#bttnsubmit').prop("disabled",true);
				data.submit();
			}
        },
		done: function(e,data){
			$('.fileinput-filename').html('');
			$('.fileinput').removeClass('fileinput-exists');
			$('.fileinput').addClass('fileinput-new');
			$('#bttnsubmit').prop("disabled",false);
			if(data.result==0){
				$('#pic-progress').hide();
				showAppAlert(SITENAME,extError,"warning");
			}
			else{
				if(controllerName != 'designer' || (controllerName=='designer' && Actionname != 'uploadportfolio')){
					var data=JSON.parse(data.result);
					console.log(data);
				}
				else{
					var data = data.result;
				}
				if($('.user-content img').length>0){
					$('.user-content img').remove();
				}if($('.user-pro img').length>0){
					$('.user-pro img').remove();
				}if($('.user-bg img').length>0){
					$('.user-bg img').remove();
				}
				
				var bigImgTag="<img src='"+AVTBIGURL+"/thumb/"+data+"' class='thumb-lg img-circle' alt='img' />";
				var bigImgUrl=AVTBIGURL+"/"+data;
				$('.userProfileImg').html(bigImgTag);
				$('.user-bg').css('background-image','url('+bigImgUrl+')');
                $('#pic-progress').hide();
				toastInit(AvtUpdated,"success");
				
			}
		},
		progress: function(e, data){
			$('#pic-progress').show();
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$("#pic-bar").width(progress+'%');
			$('#pic-progress').css('width', progress+'%');
		}
	});
}
	
function globalStatus(chkAll){
	if($(chkAll).hasClass("status-1")){
		var status=0
		$(chkAll).addClass("status-0");
		$(chkAll).removeClass("status-1");
	}
	else{
		var status=1
		$(chkAll).addClass("status-1");
		$(chkAll).removeClass("status-0");
	}
	vars = $(chkAll).attr("id").split("-");
	title =	$(chkAll).attr("title") ;
	fieldstatus = $(chkAll).attr("name");
	scriptUrl = APPURL+"/change-status/"+vars[0]+"/"+vars[1]+"/"+status+"/"+fieldstatus;
	if(title!==undefined && title!=""){usermessage=title+" has been changed";}
	else{
		field_title = vars[0].replace(/_/g," ");
		field_title=field_title;
		usermessage='<b>'+field_title +'</b>  status has been changed';
	}
	$.ajax({
		url: scriptUrl,
		dataType:"json",
		success: function(data){
			if(data.success){
				
				if($('.alert.alert-with-icon').length){
					$('.alert.alert-with-icon').fadeOut(500);
				}
				$.notify({
					icon: 'pe-7s-close-check',
					message: data.message
				},
				{
					type: 'success',
					timer: 300
				});
			}
			else{
				if($('.alert.alert-with-icon').length){
					$('.alert.alert-with-icon').fadeOut(500);
				}
				$.notify({
					icon: 'pe-7s-close-circle',
					message: data.message
				},
				{
					type: 'error',
					timer: 300
				});
			}
		},
		error:function(data) {
			$.notify({
				icon: 'pe-7s-flag',
				message: data.message
			
			},{
				type: 'error',
				timer: 10000
			});
		}
	});
}

/*!-----------Custom Function-----------------------------*/
/*!--------Initialize Map-----------*/
function showMap(lat,long,Ele,Styles)
{
	var mapCanvas = document.getElementById(Ele);
	var siteLatLng = new google.maps.LatLng(lat,long);
	var mapOptions = {
		center:siteLatLng,
		zoom:7,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: Styles,
		 scrollwheel: false,
	}
	var map = new google.maps.Map(mapCanvas, mapOptions);
	var marker = new google.maps.Marker({
		position: siteLatLng,
		map: map,
		title: 'Wedding',
		icon: baseUrl+'/assets/pics/mapIcon.png'
	});			
}
	

$(".pricebox").keydown(function(e){
		// Allow: backspace, delete, tab, escape, enter and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	 // Allow: Ctrl+A, Command+A
	(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
	 // Allow: home, end, left, right, down, up
	(e.keyCode >= 35 && e.keyCode <= 40)) {
		 // let it happen, don't do anything
		 return;
}
// Ensure that it is a number and stop the keypress
if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	e.preventDefault();
}
});	
	


$('body').click(function(e) {
	
    if(!($(e.target).parents('.profileSideBarDiv').size()) && !($(e.target).parents('.respProfileSideButton').size()) && !($(e.target).hasClass('profileSideBarDiv'))){
		$('.profileSideBarDiv').removeClass('open');	
	}
});

function registerType(Ele){
	if(Ele=='user'){
		$('.socialRegisterDiv').slideDown('slow');
	}
	else{
			$('.socialRegisterDiv').slideUp('slow');
	}
}

function openSideBar(){
	$('.profileSideBarDiv').toggleClass('open');
}


function ValidateNumber(e){if(8!=(e.keyCode||e.which)&&37!=(e.keyCode||e.which)&&39!=(e.keyCode||e.which)){var t=new RegExp("^[0-9-?+()$%^&*]+$"),a=String.fromCharCode(e.charCode?e.which:e.charCode);if(!t.test(a))return e.preventDefault(),!1}}

function getsubcategories(category){
	if(category!='0'){
		$(".preloader").fadeIn();
		$.ajax({
		url:baseUrl+'/designer/getsubcat/cat_id/'+category,
		aysnc:false,
		success:function(data){
			$(".preloader").fadeOut();
			data = JSON.parse(data);
			if(data[0].length>0){
				$("#portfolio_subcategory").html('');
				$("#portfolio_subcategory").append('<option value="">Select Sub Category</option>');
				for(var i=0;i<data[0].length;i++){
					var selcted="";
					/*if(subCatId!='' && subCatId==data[0][i].sub_cat_id)
						selcted="selected=selected";*/
					$("#portfolio_subcategory").append('<option value="'+data[0][i].sub_cat_id+'" '+selcted+' >'+data[0][i].sub_cat_title+'</option>');
				}
			} else {
				$("#portfolio_subcategory").html('');
				$("#portfolio_subcategory").append('<option value="">Select Sub Category</option>');
			}
		}
	});
	}
	else{
		$("#portfolio_subcategory").html('');
		$("#portfolio_subcategory").append('<option value="">Select Sub Category</option>');
	}
}

function deleteMedia1(){ /* to delete saved media*/
	var Total = parseInt($('#total_media_images').val());
	if(Total > 0){
		Total = Total - 1;
	}
	$('#total_media_images').val(Total);
}

function MediaFormSubmit(){
	var success=0;
	$('.errorMediaDiv').css('display','none');
	if($('.fileuploadForm').valid()){
		success='1';	
	}
	var checkImages=$('#total_media_images').val();
	var chckType = $('.portfolioTypeChk:checked').val();
	if(checkImages>'0'){
		if(chckType=='1'){
			success='1';
		}
		else if(chckType=='2'){
			if(checkImages > 2){
				success='0';
				$('.errorMediaDiv').html('You can add maximum 2 images for ongoing projects.');
				$('.errorMediaDiv').css('display','block');
			}
			else{
				success='1';	
			}
		}
		else if(chckType=='3'){
			if(checkImages > 1){
				success='0';
				$('.errorMediaDiv').html('You can add only 1 image for in studio project.');
				$('.errorMediaDiv').css('display','block');
			}
			else{
				success='1';
			}
		}
	}else{
		success='0';
		$('.errorMediaDiv').html('Please select some pictures for portfolio.');
		$('.errorMediaDiv').css('display','block');	
	}
	
	if(success=='1'){
		$('.fileuploadForm').submit();
	}
}

function deleteClinicMedia(Id){/* to check count of total media*/
	var Value = $('#deleteMedia').val();
	
	if(Value == ''){
		Value = Id ;
	}
	else{
		Value = Value+','+Id;
	}
	$('#deleteMedia').val(Value);
	$('#clinicMedia_'+Id).fadeOut();
	window.setTimeout(function(e){$('#clinicMedia_'+Id).remove();},2000);
	deleteMedia1();
}

function checkTypeOfPackageSelected(){
	var packageType=$('input[name=client_plan]:checked').attr('id');
	if(packageType=='plan_2' || packageType=='plan_3' || packageType=='plan_4'){
		$("html, body").animate({
			scrollTop: $('.mMakePaymentMainDiv').offset().top 
		}, 1000);
	}
}

function checkCardType(cardValue){
	if(cardValue=='paypal'){
		$('.billingInfoMainDiv').css('display','none');
	}else{
		$('.billingInfoMainDiv').css('display','block');
	}
}

function checkPlanType(id,value){
	var newId=id.split('_');
	var CheckCheckedPlan=$('input[name=client_plan]:checked').attr('id');
	if(CheckCheckedPlan=='plan_'+newId[1]){
		$('#plan_type').val(value);
		$('#plan_type_1').val(value);
	}
}

function paymentForm(){
	$('.cardForm').valid();
	var checkPayType=$('input[name=payment_type]:checked').val();
	
	if(checkPayType!='paypal'){
		if($('.cardForm').valid()){
			$('.cardForm').submit();
		}
	}else{ 
		$('.paypalForm').submit();
	}
}

function addmoreAccomplishments(){ 
	 var count = $('#countLang').val();
	 var i =count;
	 $.ajax({
		url: APPURL+'/profile/addmoreaccomplishment/count/'+i,
		method:'get',
		success: function(data) { 
			var new1=parseInt(i)-parseInt(1);
			$('.pickUpLocationDiv').append(data);
			count++;
			$('#countLang').val(count);
		},
		
	});

}
function removediv(id){
	if(id!=0){
		$('#divId_'+id).remove();
	}
}

function checkSkillCount(maxskill,ID){
	var checkedSkills=$('.checkClass:checked').length;
	var addedSkills =$('.customSkillVal').length;
	var Total = checkedSkills + addedSkills;

	if(maxskill!='a'){
		
		if(checkedSkills>maxskill || Total > maxskill){
			$('#'+ID).attr('checked',false);
		}
	}
	
}
//Fb share

window.fbAsyncInit = function() {
    FB.init({
        appId: Yh6ds,
        xfbml: true,
        version: 'v2.6'
    });
};
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function FBShareOp(share_title, share_url, share_img, share_desc) {
    FB.ui({
        method: 'feed',
        name: share_title,
        link: share_url,
        picture: share_img,
        caption: "",
    }, function(response) {
        if (response && response.post_id) {} else {}
    });
}

function changeImage(id){
	var Ht = $('#product-image .featured').height();
	$('#product-image .featured').css('min-height',Ht+'px');
	var IMG = $('#portImage_'+id).val();
	
	$('#portMainImage').fadeOut(400, function(){
		$('#portMainImage').html('<img src="'+IMG+'" alt="" />').fadeIn(400);
	});	
	window.setTimeout( function(e){
		setZoomImg();
		$('#product-image .featured img').css('cursor',"url('"+APPURL+"/assets/pics/zoom-in.png') 4 12, auto");
	},1000);
}

function setZoomImg(){
	$('#portMainImage').zoom({on:"click",
		onZoomIn : function(e){
				$('#product-image .featured img').css('cursor',"url('"+APPURL+"/assets/pics/zoom-out.png') 4 12, auto");
		},
		onZoomOut : function(e){
				$('#product-image .featured img').css('cursor',"url('"+APPURL+"/assets/pics/zoom-in.png') 4 12, auto");
		},
		magnify:1.5,
	});		
}

function addToFav(Id){
	$.ajax({
		url:APPURL+'/addfav/'+Id,
		success:function(data){
			if(data!=''){
				if(data == '1'){
					$('#portSave_'+Id).html('<i class="fa fa-check"></i>&nbsp;&nbsp;Saved');
					$('#portSave_'+Id).addClass('portActive');
					
				}
				else if(data == '0'){
					if(controllerName == 'profile' && actionName == 'myfavourite'){
						$('#trendingContentDiv_'+Id).fadeOut(500);
					}
					else{
						$('#portSave_'+Id).html('+&nbsp;&nbsp;Save');
						$('#portSave_'+Id).removeClass('portActive');
					}
				}
			}
		}
	});
}
function addToLike(Id){
	$.ajax({
		url:APPURL+'/addlike/'+Id,
		success:function(data){
			if(data!=''){
				if(data == '1'){
					$('#portLike_'+Id).html('<i class="fa fa-heart"></i>&nbsp;&nbsp;Liked');
					$('#portLike_'+Id).addClass('portActive');
					
				}
				else if(data == '0'){
					$('#portLike_'+Id).html('<i class="fa fa-heart"></i>&nbsp;&nbsp;Like');
					$('#portLike_'+Id).removeClass('portActive');
				}
			}
		}
	});
}

function getScategories(Id){
	if(Id!='' && Id!='0' ){
		$.ajax({
			url:APPURL+'/get-subcat/'+Id,
			success:function(data){
				EmptyListbox('sSubCat');
				AddOptiontoListBox('sSubCat',"","Select Sub Category");
				if(data!=''){
					var Res = JSON.parse('"'+data+'"');
					var Res = JSON.parse(Res);
					$(Res).each(function(index, element) {
						var OptionValue = element.sub_cat_id;
						var OptionText = element.sub_cat_title;			
						AddOptiontoListBox('sSubCat',OptionValue,OptionText);   
					});
				}
			}
		});
	}
	else{
		EmptyListbox('sSubCat');
		AddOptiontoListBox('sSubCat',"","Select Sub Category");	
	}
}

function EmptyListbox(listBoxId)
{
	$('#'+listBoxId)
		.find('option')
		.remove();
}

function AddOptiontoListBox(listBoxId,Value,Text)
{
	$('#'+listBoxId).append($('<option>', {
		value: Value,
		text: Text
	}));
}

function confirmPort(Id){
	swal({
		title: "Are you sure?",
		text: "Do you want to delete this portfolio ?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Confirm",
		cancelButtonText: "Cancel",
		closeOnConfirm: true,
		closeOnCancel: true
		}, function(isConfirm) {
		if(isConfirm == true) {
			window.location.href = APPURL+'/remove-portfolio/'+Id;
		}
		else {
			return false;
		}
	});
}

function toggleFilter(){
	$('.searchMainDiv').slideToggle('slow');
}

function changeInputValue(data,Inputt){
	$('#'+Inputt).val(data);	
}

function addSkills(maxskill){
	$('.customSkillsDivMainDiv .errorMsg').hide();
	var append = 1;
	TotalCusSkill++;
	var checkedSkills=$('.checkClass:checked').length;
	var addedSkills =$('.customSkillVal').length;
	var Total = checkedSkills + addedSkills;
	if(maxskill!='a'){
		if(checkedSkills>=maxskill || Total >= maxskill ){
			append = 0;
		}
	}
	
	if(append==1){
		$('.customSkillsDiv').append('<div class="col-md-4 customSkillVal" id="customSkillsDivInner_'+TotalCusSkill+'"><button type="button" class="removebtn" onclick="removeCstmSkill('+TotalCusSkill+')"><i class="fa fa-minus-circle"></i></button><div class="form-group"><label>Skill Name</label><input type="text" name="client_custom_skill['+TotalCusSkill+']" id="client_custom_skill_'+TotalCusSkill+'" class="form-control required" placeholder="Skill Name"></div></div>');
	}
	else{
			$('.customSkillsDivMainDiv .errorMsg').show();
	}
}

function removeCstmSkill(div){
	$('#customSkillsDivInner_'+div).remove();
}

jQuery.validator.addMethod("email", function(value, element) {
	value = $.trim(value);
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
}, "Please enter a valid Email address.");

