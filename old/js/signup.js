$(document).ready(function(){
	//global vars
	var form = $("#signup");
// ====================================================== //

var jVal = {
	'userName' : function() {
//	alert('2');
	
		$('body').append('<div id="usernameInfo" class="info"></div>');
		
		var usernameInfo = $('#usernameInfo');
		var ele = trim($('#username').val());
		var pos = ele.offset();
		
		usernameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.length < 6) {
			jVal.errors = true;
				usernameInfo.removeClass('correct').addClass('error').html('&larr; at least 6 characters').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				usernameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'userNameValid' : function() {
//	alert('1');
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
	var link = "/index.php/site";
		 $.post(link + "/check_user", { user_name: username, ajax: '1' },
  			function(data){
  			if(data == 'true'){
				nameInfo.hide();
				ele.removeClass('wrong');

    		}else{
			jVal.errors = true;
				nameInfo.removeClass('correct').addClass('error').html('&larr; User Name Exist!').show();
				ele.removeClass('normal').addClass('wrong');				
    		}	
    		
 		 }); 
		////////////////
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
			$('#signup').submit();
			alert('success');
		}
	}
};

// ====================================================== //

$('input[name=continue]').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#signup').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.fullName();
		jVal.userNameValid();
		jVal.sendIt();
	});
	return false;
});

//$('#recipe_name').change(jVal.fullName);
//$('#short_desc').change(jVal.about);

// ====================================================== //



});