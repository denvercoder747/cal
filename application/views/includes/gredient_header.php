<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('../front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
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
/* Core JS */

 
	/*place jQuery actions here*/ 
	var link = "/index.php/gredient";
	
//	$("#dv_edit").hide();
//	$(".edit_tr").click(function()
	$(".editlnk").click(function()
		{
			alert('c');	
		var ID=$(this).attr('id');
		$("#first_"+ID).hide();
		$("#second_"+ID).hide();
		$("#third_"+ID).hide();
		$("#fourth_"+ID).hide();
		$("#fifth_"+ID).hide();
		$("#six_"+ID).hide();
		$("#seven_"+ID).hide();
		$("#eight_"+ID).hide();
		$("#nine_"+ID).hide();
//		$("#last_"+ID).hide();
		$("#first_input_"+ID).show();
		$("#second_input_"+ID).show();
		$("#third_input_"+ID).show();
		$("#fourth_input_"+ID).show();
		$("#fifth_input_"+ID).show();
		$("#six_input_"+ID).show();
		$("#seven_input_"+ID).show();
		$("#eight_input_"+ID).show();
		$("#nine_input_"+ID).show();
		$("#ten_input_"+ID).show()
		$("#tweleve_input_"+ID).show()
$(".editlnk").hide();
});
/*$(".editbox").mouseup(function() 
{
return false
});
*/
// Outside click action
//$(document).mouseup(function()
$('.editbot').click(function()
{
$(".editbox").hide();
$(".editbot").hide();
$(".text").show();
});
                                                //  GRADIENT ADD HERE WITH VALIDATION
	$("#addG").click(function() {
		// Get the product ID and the quantity 
/*		var id = $(this).find('input[name=product_id]').val();
		var qty = $(this).find('input[name=quantity]').val();
		//alert('ID:' + id + '\n\rQTY:' + qty);  
		 $.post(link + "cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
*/		
	var ingRow = $("#ingRow");
	var rateRow = $("#rateRow");
	var qtyRow1 = $("#qtyRow");
	var ingRowInfo = $("#ingRowInfo");
	var rateRowInfo = $("#rateRowInfo");
	var qtyRowInfo = $("#qtyRowInfo");
//		if(validateGradients() & validateName() & validateMessage() )
	function validateGre(){
		//if it's NOT valid
		if(ingRow.val().length < 1){
			ingRow.addClass("error_bord");
			ingRowInfo.text("Gredient Name Should Not Blank!");
			ingRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			ingRow.removeClass("error_bord");
			ingRowInfo.text("");
			ingRowInfo.removeClass("error");
			return true;
		}
	}
	function validateRate(){
		//if it's NOT valid
		if(rateRow.val() <= 0){
			rateRow.addClass("error_bord");
			rateRowInfo.text("Rate must be valid!");
			rateRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			rateRow.removeClass("error_bord");
			rateRowInfo.text("");
			rateRowInfo.removeClass("error");
			return true;
		}
	}
	function validateQty(){
		//if it's NOT valid
		if(qtyRow1.val() <= 0){
			qtyRow1.addClass("error_bord");
			qtyRowInfo.text("Quantity should be Valid!");
			qtyRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			qtyRow1.removeClass("error_bord");
			qtyRowInfo.text("");
			qtyRowInfo.removeClass("error");
			return true;
		}
	}
		
		if(validateGre() && validateQty() && validateRate()){
//			return true;
			}
		else{
			return false;
			}
			
		var ingRow = $("#ingRow").val();
		var qtyRow = $("#qtyRow").val();
		var measure = $("#measure").val();
		var measure1 = $("#measure").find("option:selected").text();
		var rateRow = $("#rateRow").val();
		var amtKg = $("#amtKg").val();
		var purFrom = $("#purFrom").val();
		var brand = $("#brand").val();
		var contact = $("#contact").val();
		 $.post(link + "/add_gredient", { ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
  					$("#message").html('Gredient Added Successfully');
				});

    		}else{
  					$("#message").html('');
  					$("#message").hide();
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 

		return false;
	});
	$(".cancellnk").click(function()
	{
		 $.post(link + "/show_gredient", { ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    		}	
    		
 		 }); 
	});
//$("#measure").change(function() {
//    alert($("#measure").find("option:selected").text()+' clicked!');
//});	
	
	$('#rateRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#qtyRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});

/* End Core JS*/
});
	function saveg(ID)
	{

		var ingId = $("#ten_input_"+ID).val();
		var ingRow = $("#first_input_"+ID).val();
		var qtyRow = $("#second_input_"+ID).val();
		var measure = $("#third_input_"+ID).val();
		var measure1 = $("#third_input_"+ID).find("option:selected").text();
		var rateRow = $("#fourth_input_"+ID).val();
		var amtKg = $("#fifth_input_"+ID).val();
		var purFrom = $("#six_input_"+ID).val();
		var brand = $("#seven_input_"+ID).val();
		var contact = $("#eight_input_"+ID).val();
	var link = "/index.php/gredient";
		 $.post(link + "/edit_gredient", { ingId: ingId,ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 
//		alert('clicked');

		return false;
	}
</script>
</head>

<body onload="ref1();">
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
            	<img src="<?php echo base_url();?>images/user_image.png" width="32" height="32" /><span>Welcome <?php echo $this->session->userdata('firstname'); ?></span>
            </div>      
            <dl class="dropdown">
           		<dt><a id="linkglobal" style="cursor:pointer;">My Account</a></dt>
            	<dd>
           			<ul id="ulglobal">
                        <li><a href="<?php echo base_url();?>index.php/member/edit_profile">Update Profile</a></li>
                        <li><a href="<?php echo base_url();?>index.php/member/edit_profile">Change Password</a></li>
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
          <ul>
            <li><a href="<?php echo base_url();?>index.php/site/dash_board" title="">HOME</a></li>
            <li><a href="<?php echo base_url();?>index.php/site/recipe" title="">Recipes</a></li>
            <li><a class="active" href="<?php echo base_url();?>index.php/gredient/" title="">Ingredients</a></li>
            <li><a href="<?php echo base_url();?>index.php/member/edit_profile" title="">Profile</a></li>
          </ul>
        </div>
     </div>
    <!--End Menu Container-->