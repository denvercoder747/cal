<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="/css/mini-pricing-grid.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="/css/buttons.css" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
    <script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/js_function.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider();
});
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	//for Popup window
	$('a[rel*=facebox]').facebox({
	loadingImage : '/images/loading.gif',
	closeImage   : '/images/close.png'
	})
});
</script>
</head>
<body>
<div id="site_main_wrapper">
	<!--start site top header-->
        <?php $this->load->view('includes/front_header'); ?>

    <!--end site top header-->
	
    <!--Start site header part-->
        <?php $this->load->view('includes/front_banner'); ?>
    <!--End site header Part-->
    
    <!--Start site main content wrapper-->
    <div id="rigister_content_wrapper"><Br /><br />
    	<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div style="display:none" id="message-yellow">
				<table width="100%" cellspacing="0" cellpadding="0" border="">
				<tbody><tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img alt="" src="/images/table/icon_close_yellow.gif"></a></td>
				</tr>
				</tbody></table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div style="display:none" id="message-blue">
				<table width="100%" cellspacing="0" cellpadding="0" border="">
				<tbody><tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img alt="" src="/images/table/icon_close_blue.gif"></a></td>
				</tr>
				</tbody></table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
<div class="apg-mini apg-mini-4">
	
			<div class="apg-option ">
				
				<div class="apg-header">
		
					<h1>Free</h1>
				</div>
				
				<div class="apg-content">
				<span style="color:#009F00; font-size:16px; font-weight:bold">Take A Bite</span>
				<p><img width="165" height="51" alt="" src="../../images/free.JPG"></p>
				
				<ul>
					<li><strong>5</strong> No. Of Recipes</li>
		
					<li><strong>No </strong> Recipe Indent Calculation</li>
					<li><strong>1 Month</strong> Service</li>
				</ul>
				</div>
				
				
				<div class="apg-footer">
					<span class="apg-price">FREE<span class="apg-label">/month</span></span>
		
				  <a class="btn btn-small" href="<?php echo base_url();?>index.php/home/show_form1/1">Select </a>
				 </div>
			</div>
			
			<div class="apg-option ">
				
				<div class="apg-header">
					<h1>Silver</h1>
					
				</div>
				
				<div class="apg-content">
		
				<span style="color:#009F00; font-size:16px; font-weight:bold">Relish this Dessert</span>
				<p><img width="93" height="98" alt="" src="../../images/silver.JPG"></p>
				
				<ul>
					<li><strong>30</strong> No Of Recipes</li>
					<li><strong>Yes</strong> Indent Calculation</li>
					<li><strong>1 Month</strong> Service</li>
		
				</ul>
				</div>
				
				
				<div class="apg-footer">
					<span class="apg-price"><span class="WebRupee">₹</span>300<span class="apg-label">/month</span></span>
				  <a class="btn btn-small" href="<?php echo base_url();?>index.php/home/show_form1/2">Select </a>
				 </div>
			</div>
		
			
			<div class="apg-option ">
				
				<div class="apg-header">
					<h1>Gold</h1>
				</div>
				
				<div class="apg-content">
				<span style="color:#009F00; font-size:16px; font-weight:bold">Bite a Snack</span>
				<p><img width="161" height="133" alt="" src="../../images/gold.JPG"></p>
				
				<ul>
					<li><strong>50</strong> No. Of Recipes</li>
		
					<li><strong>Yes</strong> Indent Calculation</li>
					<li><strong>1 Month</strong> Service</li>
				</ul>
				</div>
				
				
				<div class="apg-footer">
					<span class="apg-price"><span class="WebRupee">₹</span>500<span class="apg-label">/month</span></span>
		
				 <!-- <a class="btn btn-small" href="<?php echo base_url();?>index.php/home/show_form1/3">Select </a>-->
				 </div>
			</div>
			
<div class="apg-option ">
				
				<div class="apg-header">
					<h1>Platinum</h1>
				</div>
				
				<div class="apg-content">
				<span style="color:#009F00; font-size:16px; font-weight:bold">Meal-in-itself</span>
				<p><img width="176" height="169" alt="" src="../../images/platinum.JPG"></p>
				
				<ul>
					<li><strong>100</strong> No. Of Recipes</li>
		
					<li><strong>Yes</strong> Indent Calculation</li>
					<li><strong>1 Month</strong> Service</li>
				</ul>
				</div>
				
				
				<div class="apg-footer">
					<span class="apg-price"><span class="WebRupee">₹</span>1000<span class="apg-label">/month</span></span>
		
				  <a class="btn btn-small" href="<?php echo base_url();?>index.php/home/show_form1/4">Select </a>
				 </div>
			</div>            
		</div>                
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... --><!-- end actions-box........... -->
			
			<!--  start paging..................................................... --><!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div><br /><br />
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
        <?php $this->load->view('includes/front_footer'); ?>
    <!--End site main footer-->
</div>
</body>
</html>
