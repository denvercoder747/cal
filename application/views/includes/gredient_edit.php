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
            	<img src="<?php echo base_url();?>images/user_image.png" width="32" height="32" /><span>Welcome <?php echo $this->session->userdata('firstname'); ?></span>
            </div>      
            <dl class="dropdown">
           		<dt><a id="linkglobal" style="cursor:pointer;">My Account</a></dt>
            	<dd>
           			<ul id="ulglobal">
                        <li><a href="<?php echo base_url();?>index.php/member/edit_profile">Update Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Logout</a></li>
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