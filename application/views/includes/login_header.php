<script type="text/javascript">
$(document).ready(function(){
	//global vars
	var form = $("#profile");
// ====================================================== //

var jVal = {
	
	
	'oldpassword' : function() {
	
		$('body').append('<div id="oldpasswordInfo" class="info"></div>');
	
		var passwordInfo = $('#oldpasswordInfo');
		var ele = $('#old_password');
		var pos = ele.offset();
		
		passwordInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 1) {
			jVal.errors = true;
				passwordInfo.removeClass('correct').addClass('error').html('&larr; Please Enter Old Password!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				passwordInfo.remove();
//				passwordInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
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
	
//	'about' : function() {
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
			$('#profile').submit();
//			alert('success');
		}
	},
	'sendIt1' : function (){
		if(!jVal.errors) {
			$('#profilePass').submit();
//			alert('success');
		}
	}
};

// ====================================================== //

$('#continue').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#profile').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.firstname();
		jVal.lastname();
		jVal.email2();
		jVal.sendIt();
	});
	return false;
});
$('#update_pass').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#profilePass').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.oldpassword();
		jVal.password();
		jVal.repassword();
		jVal.sendIt1();
	});
	return false;
});

$('#password').change(jVal.password);
$('#retype_password').change(jVal.repassword);
$('#first_name').change(jVal.firstname);
$('#last_name').change(jVal.lastname);
$('#email').change(jVal.email2);
// ====================================================== //

$("#phone").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
$("#fax").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });

});
</script>

            <div id="allHeader">
                    <div id="company_logo"></div>
                    <div id="header_css">
                   			<!-- <img src="/images/recipe_logo.png" width="372" height="57" />-->
                    </div>
                    <!--<div id="loggedUser">
                    Logged as <?php echo $this->session->userdata('firstname'); ?>
                    </div>-->
            </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li><a href="<?php echo base_url();?>index.php/site/dash_board"><span class="l"></span><span class="r"></span><span class="t">Dashboard</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/site/recipe"><span class="l"></span><span class="r"></span><span class="t">Recipes</span></a>
                		</li>
                		<li><a href="<?php echo base_url();?>index.php/gredient/"><span class="l"></span><span class="r"></span><span class="t">Ingredients</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/member/edit_profile" ><span class="l"></span><span class="r"></span><span class="t">Profile</span></a></li>
                        	<li><a href="<?php echo base_url();?>index.php/login/logout"><span class="l"></span><span class="r"></span><span class="t">Logout</span></a></li>
                		<!--<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Contact</span></a></li>-->
                	</ul>
<div id="loggedUser">
                    Logged as <?php echo $this->session->userdata('firstname'); ?>
                    </div>                </div>
