$(document).ready(function(){
	//global vars
	var form = $("#recipe");
	var b1=$("#B1");
	var S1=$("#S1");
	var nameInfo = $("#nameInfo");
	var recipe_name = $("#recipe_name");
	var recipe_nameInfo = $("#recipe_nameInfo");
	var desc = $("#short_desc");
	var longdesc = $("#long_desc");
	var descInfo = $("#descInfo");
	var tot_row = $("#tot_row");
	var rcp_weight=$("#rcp_weight");
	var food_loss=$("#food_loss");
	var weight=$("#weight");
	var numbers=$("#numbers");
	var profit=$("#profit");
	
	// Initialize Progress Bar

    $('#progress').css('width','0');
    $('#progress_text').html('0% Complete');
	$('#slickbox').hide();
	
	$('#rcp_weight').blur(progress);
	$('#food_loss').blur(progress);
	$('#weight').blur(progress);
	$('#numbers').blur(progress);
	$('#profit').blur(progress);
	$('#recipe_name').blur(progress);
	$('#short_desc').blur(progress);
	$('#long_desc').blur(progress);
	
	// Validation for Float Numbers
	$('.quantity_t').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#rcp_weight').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#food_loss').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#weight').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	
});
	$('#numbers').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	
});
	$('#profit').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	
});
// ====================================================== //

var jVal = {
	'fullName' : function() {
//	alert('2');
	
		$('body').append('<div id="nameInfo" class="info"></div>');
		
		var nameInfo = $('#nameInfo');
		var ele = $('#recipe_name');
		var pos = ele.offset();
		
		nameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 6) {
			jVal.errors = true;
				nameInfo.removeClass('correct').addClass('error').html('&larr; at least 6 characters').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				nameInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'NameValid' : function() {
//	alert('1');
		$('body').append('<div id="nameInfo1" class="info"></div>');
		
		var nameInfo = $('#nameInfo1');
		var ele = $('#recipe_name');
		var pos = ele.offset();
		
		nameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		///////////////
		var recipe_name = $("#recipe_name").val();
	var link = "/index.php/site";
		 $.post(link + "/check_recipe", { recipe_name: recipe_name, ajax: '1' },
  			function(data){
  			if(data == 'true'){
				nameInfo.hide();
				ele.removeClass('wrong');

    		}else{
			jVal.errors = true;
				nameInfo.removeClass('correct').addClass('error').html('&larr; Recipe Name Exist!').show();
				ele.removeClass('normal').addClass('wrong');				
    		}	
    		
 		 }); 
		////////////////
	},
	
	'NameValidEdit' : function() {
//	alert('1');
		$('body').append('<div id="nameInfo1" class="info"></div>');
		
		var nameInfo = $('#nameInfo1');
		var ele = $('#recipe_name');
		var rcpId = $('#rcpId').val();
		var pos = ele.offset();
		
		nameInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		///////////////
		var recipe_name = $("#recipe_name").val();
	var link = "/index.php/site";
		 $.post(link + "/check_recipe2", { recipe_name: recipe_name,rcpId: rcpId, ajax: '1' },
  			function(data){
  			if(data == 'true'){
				nameInfo.hide();
				ele.removeClass('wrong');

    		}else{
			jVal.errors = true;
				nameInfo.removeClass('correct').addClass('error').html('&larr; Recipe Name Exist!').show();
				ele.removeClass('normal').addClass('wrong');				
    		}	
    		
 		 }); 
		////////////////
	},

	'gredient' : function() {
	
		$('body').append('<div id="gredientInfo" class="info"></div>');
		
		var gredientInfo = $('#gredientInfo');
		var ele = $('#B1');
		var pos = ele.offset();
		var totrow=$('#tot_row').val();
		gredientInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});

		//if it's NOT valid
		if(totrow < 1) {
			jVal.errors = true;
				gredientInfo.removeClass('correct').addClass('error').html('&larr; Please Add Atleast One Gradient').show();
				ele.removeClass('normal').addClass('wrong');				
		} else {
				gredientInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
			for(j=1;j<=totrow;j++)
			{
				$('body').append('<div id="gredientInfo" class="info"></div>');
				
				var ingredientInfo = $('#gredientInfo');
				var ele = $('#ingRow' + j);
				var pos = ele.offset();
				
				ingredientInfo.css({
					top: pos.top-3,
					left: pos.left+ele.width()+15
				});
				var inp = $('#ingRow' + j).val();
				if($.trim(inp).length <1)
				{
				jVal.errors = true;
				ingredientInfo.removeClass('correct').addClass('error').html('&larr; Please Fill Gradient Name').show();
				ele.removeClass('normal').addClass('wrong');				
				$('#ingRow' + j).addClass("error");
				}
				else
				{
				ingredientInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
				$('#ingRow' + j).removeClass("error");
				
						$('body').append('<div id="mesInfo" class="info"></div>');
						
						var mesInfo = $('#mesInfo');
						var ele = $('#ingRow' + j);
						var pos = ele.offset();
						
						mesInfo.css({
							top: pos.top-3,
							left: pos.left+ele.width()+15
						});
						var inp = $('#measureRow' + j).val();
						if($.trim(inp).length <1)
						{
						jVal.errors = true;
						mesInfo.removeClass('correct').addClass('error').html('&larr; Please Fill Gradient Name From Auto Suggest').show();
						ele.removeClass('normal').addClass('wrong');				
						$('#ingRow' + j).addClass("error");
						}
						else
						{
						mesInfo.removeClass('error').addClass('correct').html('&radic;').show();
						ele.removeClass('wrong').addClass('normal');
						$('#ingRow' + j).removeClass("error");
						}
				
				
				}
			$('body').append('<div id="quantityInfo" class="info"></div>');
			
			var quantityInfo = $('#quantityInfo');
			var ele = $('#qtyRow' + j);
			var pos = ele.offset();
			
			quantityInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});
			var inp2 = $('#qtyRow' + j).val();
			if($.trim(inp2).length <1)
			{
				jVal.errors = true;
				quantityInfo.removeClass('correct').addClass('error').html('&larr; Please Fill Quantity').show();
				ele.removeClass('normal').addClass('wrong');				
			$('#qtyRow' + j).addClass("error");
			}
			else
			{
				quantityInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
			$('#qtyRow' + j).removeClass("error");
			}
		}
			
	},
	
	'about' : function() {
	
		$('body').append('<div id="aboutInfo" class="info"></div>');
	
		var aboutInfo = $('#aboutInfo');
		var ele = $('#short_desc');
		var pos = ele.offset();
		
		aboutInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 10) {
			jVal.errors = true;
				aboutInfo.removeClass('correct').addClass('error').html('&larr; come on, tell me a little bit more!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				aboutInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},
	
	'procedure' : function() {
	
		$('body').append('<div id="procedureInfo" class="info"></div>');
	
		var procedureInfo = $('#procedureInfo');
		var ele = $('#long_desc');
		var pos = ele.offset();
		
		procedureInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		if(ele.val().length < 10) {
			jVal.errors = true;
				procedureInfo.removeClass('correct').addClass('error').html('&larr; come on, tell me a little bit more!').show();
				ele.removeClass('normal').addClass('wrong').css({'font-weight': 'normal'});		
		} else {
				procedureInfo.removeClass('error').addClass('correct').html('&radic;').show();
				ele.removeClass('wrong').addClass('normal');
		}
	},

	'sendIt' : function (){
		if(!jVal.errors) {
			$('#recipe').submit();
//			alert('success');
		}
	}
};

// ====================================================== //

$('#S1').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#recipe').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.fullName();
		jVal.NameValid();
		jVal.about();
		jVal.gredient();
		jVal.procedure();
		jVal.sendIt();
	});
	return false;
});

$('#E1').click(function (){
	var obj = $.browser.webkit ? $('body') : $('html');
	obj.animate({ scrollTop: $('#recipe').offset().top }, 750, function (){
		jVal.errors = false;
		jVal.fullName();
		jVal.NameValidEdit();
		jVal.about();
		jVal.gredient();
		jVal.procedure();
		jVal.sendIt();
	});
	return false;
});
$('#recipe_name').change(jVal.fullName);
$('#short_desc').change(jVal.about);
$('#long_desc').change(jVal.procedure);

// ====================================================== //



/*	form.submit(function(){//return true
//		if(validateGradients() & validateName() & validateMessage() )
		if(validateGradients() && validateName() && validateDescription() && validateRight() && validateDescription2()){
			return true
			}
		else{
			return false;}
	});
*/	function validateGradients(){
		//if it's NOT valid
		totrow=tot_row.val();
		if(totrow<1)
		{
			nameInfo.text("Please Add Atleast One Gradient");
			nameInfo.addClass("error");
			b1.addClass("error");
			return false;
		}
		else{
			nameInfo.text("");
			nameInfo.removeClass("error");
			b1.removeClass("error");
		}
/* 	var ingRow2 = document.getElementsByName('ingRow[]');
				for(j=0;i<ingRow1.length;j++)
				{
					var rr2=ingRow2[j].value;
					if(rr2.length<1)
					{
				nameInfo.text("Please Fill the highlighted Box");
				nameInfo.addClass("error");
					}
				}
*/			
			for(j=1;j<=totrow;j++)
			{
				var inp = $('#ingRow' + j).val();
				if($.trim(inp).length <1)
				{
				nameInfo.text("Please Fill the highlighted Box");
				nameInfo.addClass("error");
				$('#ingRow' + j).addClass("error");
				return false;
				}
				else
				{
				nameInfo.text("");
				nameInfo.removeClass("error");
				$('#ingRow' + j).removeClass("error");
				}
			var inp2 = $('#qtyRow' + j).val();
			if($.trim(inp2).length <1)
			{
			nameInfo.text("Please Fill the highlighted Box");
			nameInfo.addClass("error");
			$('#qtyRow' + j).addClass("error");
			return false;
			}
			else
			{
			nameInfo.text("");
			nameInfo.removeClass("error");
			$('#qtyRow' + j).removeClass("error");
			}
		}
	return true;
	}
	function validateName(){
		//if it's NOT valid
		if(recipe_name.val().length < 4){
			recipe_name.addClass("error");
			recipe_nameInfo.text("Recipe Name Should more than 3 letters!");
			recipe_nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			recipe_name.removeClass("error");
			recipe_nameInfo.text("");
			recipe_nameInfo.removeClass("error");
			return true;
		}
	}
	function validateDescription(){
		//if it's NOT valid
		if(desc.val().length < 10){
			desc.addClass("error");
			descInfo.text("Description could not be less than 10 charecters!");
			descInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			desc.removeClass("error");
			descInfo.text("");
			descInfo.removeClass("error");
			return true;
		}
	}
	function validateDescription2(){
		//if it's NOT valid
		if(longdesc.val().length < 10){
			longdesc.addClass("error");
			descInfo.text("Procedure Description could not be less than 10 charecters!");
			descInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			longdesc.removeClass("error");
			descInfo.text("");
			descInfo.removeClass("error");
			return true;
		}
	}
	function validateRight(){
		//if it's NOT valid
		var msg='';
		if(rcp_weight.val().length < 1){
			desc.addClass("error");
			msg='error';
		}
		if(food_loss.val().length < 1){
			food_loss.addClass("error");
			msg='error';
		}
		if(weight.val().length < 1){
			weight.addClass("error");
			msg='error';
		}
		if(numbers.val().length < 1){
			numbers.addClass("error");
			msg='error';
		}
		if(profit.val().length < 1){
			profit.addClass("error");
			msg='error';
		}
	
		if (msg=='error'){return false;}else{return true;}
       }

		function progress() {
		var cnt=0;
		var pgln=0;
		var recipe_name = $("#recipe_name");
		var value1 = recipe_name.val();
		var desc = $("#short_desc");
		var value2 = desc.val();
		var value3 = $('#rcp_weight').val();
		var value4 = $('#food_loss').val();
		var value5 = $('#weight').val();
		var value6 = $('#numbers').val();
		var value7 = $('#profit').val();
		var value8 = $('#long_desc').val();
            if( value1.length>4 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value2.length>4 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value3.length>0 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value4.length>0 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value5.length>0 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value6.length>0 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value7.length>0 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
            if( value8.length>10 ) {
				cnt=cnt+10;
				pgln=pgln+33.9;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
            } 
		totrow1=$('#tot_row').val();
		var emp=0;
			if(totrow1>0)
			{
 	var ingRow1 = document.getElementsByName('ingRow[]');
				for(j1=0;j1<ingRow1.length;j1++)
				{
					var rr1=ingRow1[j1].value;
					if(rr1.length<1)
					{
						emp++;
					}
				}
//				alert(emp);
//				for(j1=1;j1<=totrow1;j1++)
//				{
//					var inp1 = $('#ingRow' + j1).val();
//					if($.trim(inp1).length <1)
//					{
//						emp++;
//					}
//				}
				    
			}
			if(emp<1 && totrow1>=1)
			{
				cnt=cnt+20;
				pgln=pgln+67.8;
                $('#progress_text').html(cnt+'% Complete');
                $('#progress').css('width',pgln+'px');
			}
			
				if(cnt==100)
				{
				//	$('#slickbox').show('slow');
				}
				else
				{
					$('#slickbox').hide('fast');
				}
		}
});