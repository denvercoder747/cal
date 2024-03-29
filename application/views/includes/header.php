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
	$("a[rel*=facebox]").facebox({
	loadingImage : '/images/loading.gif',
	closeImage   : '/images/close.png'
	})
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
            	<img src="<?php echo base_url();?>images/user_image.png" width="32" height="32" /><span>Welcome <?php echo $this->session->userdata('firstname') ;?></span>
            </div>      
            <dl class="dropdown">
           		<dt><a id="linkglobal" style="cursor:pointer;">My Account</a></dt>
            	<dd>
           			<ul id="ulglobal">
                        <li><a href="<?php echo base_url();?>index.php/member/edit_profile">Update Profile</a></li>
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
          <ul>
            <li><a class="active" href="<?php echo base_url();?>index.php/site/dash_board" title="">HOME</a></li>
            <li><a href="<?php echo base_url();?>index.php/site/recipe" title="">Recipes</a></li>
            <li><a href="<?php echo base_url();?>index.php/gredient/" title="">Ingredients</a></li>
            <li><a href="<?php echo base_url();?>index.php/member/edit_profile" title="">Profile</a></li>
          </ul>
        </div>
     </div>
    <!--End Menu Container-->