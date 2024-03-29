$(function() {
	/*
	number of fieldsets
	*/
	var fieldsetCount = $('#formElem').children().length;
	/*
	current position of fieldset / navigation link
	*/
	var current 	= 1;
    
	/*
	sum and save the widths of each one of the fieldsets
	set the final sum as the total width of the steps element
	*/
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	
	/*
	to avoid problems in IE, focus the first input of the form
	*/
	$('#formElem').children(':first').find(':input:first').focus();	
	
	/*
	show the navigation bar
	*/
	$('#navigation').show();
	
	/*
	when clicking on a navigation link 
	the form slides to the corresponding fieldset
	*/
    $('#navigation a').bind('click',function(e){
		var $this	= $(this);
		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');
		/*
		we store the position of the link
		in the current variable	
		*/
		current = $this.parent().index() + 1;
		/*
		animate / slide to the next or to the corresponding
		fieldset. The order of the links in the navigation
		is the order of the fieldsets.
		Also, after sliding, we trigger the focus on the first 
		input element of the new fieldset
		If we clicked on the last link (confirmation), then we validate
		all the fieldsets, otherwise we validate the previous one
		before the form slided
		*/
        $('#steps').stop().animate({
            marginLeft: '-' + widths[current-1] + 'px'
        },500,function(){
			if(current == fieldsetCount)
				validateSteps();
			else
				validateStep(prev);
			$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();	
		});
        e.preventDefault();
    });
	
	/*
	clicking on the tab (on the last input of each fieldset), makes the form
	slide to the next step
	*/
	$('#formElem > fieldset').each(function(){
		var $fieldset = $(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				$('#navigation li:nth-child(' + (parseInt(current)+1) + ') a').click();
				/* force the blur for validation */
				$(this).blur();
				e.preventDefault();
			}
		});
	});
	
	/*
	validates errors on all the fieldsets
	records if the Form has errors in $('#formElem').data()
	*/
	function validateSteps(){
		var FormErrors = false;
		for(var i = 1; i < fieldsetCount; ++i){
			var error = validateStep(i);
			if(error == -1)
				FormErrors = true;
		}
		$('#formElem').data('errors',FormErrors);	
	}
	
	/*
	validates one fieldset
	and returns -1 if errors found, or 1 if not
	*/
	function validateStep(step)
	{
		
	}
/*	function validateStep(step){
		if(step == fieldsetCount) return;
		
		var error = 1;
		var hasError = false;
		$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
			
			if(valueLength == ''){
				hasError = true;
				$this.css('background-color','#FFFFFF');
			}
			else
				$this.css('background-color','#FFFFFF');	
		});
		var $link = $('#navigation li:nth-child(' + parseInt(step) + ') a');
		$link.parent().find('.error,.checked').remove();
		
		var valclass = 'checked';
		if(hasError){
			error = -1;
			valclass = 'error';
		}
		$('<span class="'+valclass+'"></span>').insertAfter($link);
		
		return error;
	}
*/	
	/*
	if there are errors don't allow the user to submit
	*/
/*	$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			alert('Please correct the errors in the Form');
			return false;
		}	
	});
*/
<!--Validation-->

/*	var form = $("#formElem");
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
'email3' : function() {
	
		$('body').append('<div id="emailInfo3" class="info"></div>');
	
		var emailInfo3 = $('#emailInfo3');
		var ele = $('#email3');
		var pos = ele.offset();
		
		emailInfo3.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
			if(!patt.test(ele.val())) {
				jVal.errors = true;
					emailInfo3.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
					ele.removeClass('normal').addClass('wrong');					
			} else {
					emailInfo3.remove();
					ele.removeClass('wrong').addClass('normal');
					}
			
	},
	
'email4' : function() {
	
		$('body').append('<div id="emailInfo4" class="info"></div>');
	
		var emailInfo4 = $('#emailInfo4');
		var ele = $('#email4');
		var pos = ele.offset();
		
		emailInfo4.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		if(ele.val())
		{
			if(!patt.test(ele.val())) {
				jVal.errors = true;
					emailInfo4.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
					ele.removeClass('normal').addClass('wrong');					
			} else {
					emailInfo4.remove();
					ele.removeClass('wrong').addClass('normal');
					}
			
		}
	},
	
'email5' : function() {
	
		$('body').append('<div id="emailInfo5" class="info"></div>');
	
		var emailInfo5 = $('#emailInfo5');
		var ele = $('#email5');
		var pos = ele.offset();
		
		emailInfo5.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		if(ele.val())
		{
			if(!patt.test(ele.val())) {
				jVal.errors = true;
					emailInfo5.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
					ele.removeClass('normal').addClass('wrong');					
			} else {
					emailInfo5.remove();
					ele.removeClass('wrong').addClass('normal');
					}
			
		}
	},
	
'email6' : function() {
	
		$('body').append('<div id="emailInfo6" class="info"></div>');
	
		var emailInfo6 = $('#emailInfo6');
		var ele = $('#email6');
		var pos = ele.offset();
		
		emailInfo6.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		if(ele.val())
		{
			if(!patt.test(ele.val())) {
				jVal.errors = true;
					emailInfo6.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
					ele.removeClass('normal').addClass('wrong');					
			} else {
					emailInfo6.remove();
					ele.removeClass('wrong').addClass('normal');
					}
			
		}
	},
	
'email7' : function() {
	
		$('body').append('<div id="emailInfo7" class="info"></div>');
	
		var emailInfo7 = $('#emailInfo7');
		var ele = $('#email7');
		var pos = ele.offset();
		
		emailInfo7.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		if(ele.val())
		{
			if(!patt.test(ele.val())) {
				jVal.errors = true;
					emailInfo7.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
					ele.removeClass('normal').addClass('wrong');					
			} else {
					emailInfo7.remove();
					ele.removeClass('wrong').addClass('normal');
					}
			
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
			$('#formElem').submit();
//			alert('success');
		}
	},
	'sendRt' : function (){
		if(!jVal.errors) {
			$('#request').submit();
//			alert('success');
		}
	}
};

// ====================================================== //

$('#continue').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#formElem').offset().top }, 750, function (){
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
$('#requestbtn').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#request').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.email3();
		jVal.email4();
		jVal.email5();
		jVal.email6();
		jVal.email7();
		jVal.sendRt();
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
*/

});