<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (isset($title)) ? $title : ":::.Welcome To CalCipe Portal.:::" ?></title>
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".dropdown dt a").click(function() {

			// Change the behaviour of onclick states for links within the menu.
		var toggleId = "#" + this.id.replace(/^link/,"ul");

			// Hides all other menus depending on JQuery id assigned to them
		$(".dropdown dd ul").not(toggleId).hide();

			//Only toggles the menu we want since the menu could be showing and we want to hide it.
		$(toggleId).toggle();

			//Change the css class on the menu header to show the selected class.
		if($(toggleId).css("display") == "none"){
			$(this).removeClass("selected");
		}else{
			$(this).addClass("selected");
		}

	});

	$(".dropdown dd ul li a").click(function() {

		// This is the default behaviour for all links within the menus
		var text = $(this).html();
		$(".dropdown dt a span").html(text);
		$(".dropdown dd ul").hide();
	});

	$(document).bind('click', function(e) {

		// Lets hide the menu when the page is clicked anywhere but the menu.
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("dropdown")){
			$(".dropdown dd ul").hide();
			$(".dropdown dt a").removeClass("selected");
		}

	});
	//global vars
	var form = $("#signup");
// ====================================================== //

var jVal = {
	
'email' : function() {
	
		$('body').append('<div id="emailInfo" class="info"></div>');
	
		var emailInfo = $('#emailInfo');
		var ele = $('#username');
		var pos = ele.offset();
		
		emailInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		
		if(!patt.test(ele.val())) {
			jVal.errors = true;
				emailInfo.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
				ele.removeClass('normal').addClass('wrong');					
		} else {
				
					$('body').append('<div id="nameInfo1" class="info"></div>');
					
					var nameInfo = $('#nameInfo1');
					var ele = $('#username');
					var pos = ele.offset();
					
					nameInfo.css({
						top: pos.top-3,
						left: pos.left+ele.width()+15
					});
					///////////////
					var username = $("#username").val();
				var link = "/index.php/home";
					 $.post(link + "/check_user", { user_name: username, ajax: '1' },
						function(data){
						if(data == "true"){
						jVal.errors = true;
							nameInfo.removeClass('correct').addClass('error').html('&larr; User Name Exist!').show();
							ele.removeClass('normal').addClass('wrong');				
						}else{
							emailInfo.hide();
							ele.removeClass('wrong');
							nameInfo.removeClass('error').addClass('correct').html('&radic;').show();
							ele.removeClass('wrong').addClass('normal');
						}	
						
					 }); 
				
				
				}
	},
	
	'password' : function() {
	
		$('body').append('<div id="passwordInfo" class="info"></div>');
	
		var passwordInfo = $('#passwordInfo');
		var ele = $('#password');
		var pos = ele.offset();
		
		passwordInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 4) {
			jVal.errors = true;
				passwordInfo.removeClass('correct').addClass('error').html('&larr; Minimum 4 charecters!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				passwordInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'repassword' : function() {
	
		$('body').append('<div id="repasswordInfo" class="info"></div>');
	
		var repasswordInfo = $('#repasswordInfo');
		var ele = $('#retype_password');
		var ele1 = $('#password');
		var pos = ele.offset();
		
		repasswordInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length<1 || ele.val()!=ele1.val()) {
			jVal.errors = true;
				repasswordInfo.removeClass('correct').addClass('error').html('&larr; Password Does not Match!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				repasswordInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'firstname' : function() {
	
		$('body').append('<div id="firstnameInfo" class="info"></div>');
	
		var firstnameInfo = $('#firstnameInfo');
		var ele = $('#first_name');
		var pos = ele.offset();
		
		firstnameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if($.trim(ele.val()).length<3) {
			jVal.errors = true;
				firstnameInfo.removeClass('correct').addClass('error').html('&larr; What is Your First Name!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				firstnameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'lastname' : function() {
	
		$('body').append('<div id="lastnameInfo" class="info"></div>');
	
		var lastnameInfo = $('#lastnameInfo');
		var ele = $('#last_name');
		var pos = ele.offset();
		
		lastnameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if($.trim(ele.val()).length<2) {
			jVal.errors = true;
				lastnameInfo.removeClass('correct').addClass('error').html('&larr; What is Your Last Name!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				lastnameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},

'email2' : function() {
	
		$('body').append('<div id="emailInfo2" class="info"></div>');
	
		var emailInfo2 = $('#emailInfo2');
		var ele = $('#email');
		var pos = ele.offset();
		
		emailInfo2.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		
		if(!patt.test(ele.val())) {
			jVal.errors = true;
				emailInfo2.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
				ele.removeClass('normal').addClass('wrong');					
		} else {
				emailInfo2.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
				}
	},
	
'payment_method' : function (){
		
		$('body').append('<div id="paymentInfo" class="info"></div>');
	
		var paymentInfo = $('#paymentInfo');
		var ele = $('#invoice');
		var pos = ele.offset();
		
		paymentInfo.css({
			top: pos.top-10,
			left: pos.left+ele.width()+260
		});
		
		if($('input[name="payment_method"]:checked').length === 0) {
			jVal.errors = true;
				paymentInfo.removeClass('correct').addClass('error').html('&larr; Check One Payment Method').show();
				ele.removeClass('normal').addClass('wrong');		
		} else {
				paymentInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}	
	},//	'about' : function() {
//	
//		$('body').append('<div id="aboutInfo" class="info"></div>');
//	
//		var aboutInfo = $('#aboutInfo');
//		var ele = $('#short_desc');
//		var pos = ele.offset();
//		
//		aboutInfo.css({
//			top: pos.top-3,
//			left: pos.left+ele.width()+15
//		});
//		
//		if(ele.val().length < 10) {
//			jVal.errors = true;
//				aboutInfo.removeClass('correct').addClass('error').html('&larr; come on, tell me a little bit more!').show();
//				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
//		} else {
//				aboutInfo.removeClass('error').addClass('correct').html('&radic;').show();
//				ele.removeClass('wrong').addClass('normal');
//		}
//	},
	

	'sendIt' : function (){
		if(!jVal.errors) {
			$('#signup').submit();
//			alert('success');
		}
	}
};

// ====================================================== //

$('#continue').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#signup').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.email();
		jVal.password();
		jVal.repassword();
		jVal.firstname();
		jVal.lastname();
		jVal.email2();
		jVal.payment_method();
		jVal.sendIt();
	});
	return false;
});

$('#username').change(jVal.email);
$('#password').change(jVal.password);
$('#retype_password').change(jVal.repassword);
$('#first_name').change(jVal.firstname);
$('#last_name').change(jVal.lastname);
$('#email').change(jVal.email2);
$('input[name="payment_method"]').change(jVal.payment_method);
// ====================================================== //

});
</script>
</head>

<body>
<div id="mainwrapper">
	<!--Start TopLayer-->
	<div id="top_layer_wrapper">
    	<div id="top_layer_wrapper_inner"></div>
    </div>
	<!--End Top Layer-->
    <!--Start Top Container-->
   	<div id="banner_wrapper">
   		 <div id="banner_wrapper_inner">
       	   <div id="companyLogo"></div>
            <div id="banner_right">
            <div id="user_image_name">
            	<img src="images/user_image.png" width="32" height="32" /><span>Welcome Guest</span>
            </div>      
            <dl class="dropdown">
           		<dt><a id="linkglobal" style="cursor:pointer;">My Account</a></dt>
            	<dd>
           			<ul id="ulglobal">
                        <li><a href="#">Paramount Tech Labs</a></li>
                        <li><a href="#">Update Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><?php echo anchor('login/logout', 'Logout'); ?></li>
            		</ul>
            	</dd>
            </dl>
            <div id="quick_search">
            	<form name="quickSearch" id="quickSearch" method="post" action="#">
            	<span>Quick Search</span> <input name="quicksearch" class="searchText" type="text" />
                <input name="Search Here" class="search_button" type="submit" value="" />
                </form>
            </div>
           </div>
         </div>
    </div>
    <!--End Top Container-->
    <!--Start Menu Container-->
     <div id="menuWrapper">
        <div id="nav">  
        </div>
     </div>
    <!--End Menu Container-->