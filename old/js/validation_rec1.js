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

	//On blur
//	name.blur(validateName);
	//On key press
//	name.keyup(validateName);
//	message.keyup(validateMessage);
	//On Submitting
	form.submit(function(){//return true
//		if(validateGradients() & validateName() & validateMessage() )
		if(validateGradients() && validateName() && validateDescription() && validateRight() && validateDescription2()){
			return true
			}
		else{
			return false;}
	});
	function validateGradients(){
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
				for(j1=0;i<ingRow1.length;j1++)
				{
					var rr1=ingRow1[j1].value;
					if(rr1.length<1)
					{
						emp++;
					}
				}
				alert(emp);
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
					$('#slickbox').show('slow');
				}
				else
				{
					$('#slickbox').hide('fast');
				}
		}
});