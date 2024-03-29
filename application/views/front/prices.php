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
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js//js_function.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js//jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js//facebox.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js//jquery.nivo.slider.js"></script>
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
<style>
.custom_btn{
	background-repeat: repeat-x;
	color: #FFF;	
	font-weight: bold;
	display: inline-block;	
	text-decoration: none;
	border-width: 1px;
	border-style: solid;
	padding: 0 15px 4px;
	*padding: 0 7px 4px;
	margin: 0;
	text-shadow: 1px 1px 1px rgba(0,0,0,.2);
	-moz-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	filter: progid:DXImageTransform.Microsoft.Shadow(color=#999999,direction=135,strength=2);
	cursor: pointer;
	position: relative;
	background-position: 0 0; font-size: 10px; 
	height: 22px; 
	line-height: 23px;
	background-image: url(/images/bg-lite.png); 
	background-color: #E188EF; 
	border-color: #D58000; 
	color: #FFF; 
}
.custom_btn1{
	background-repeat: repeat-x;
	color: #FFF;	
	font-weight: bold;
	display: inline-block;	
	text-decoration: none;
	border-width: 1px;
	border-style: solid;
	padding: 0 15px 4px;
	*padding: 0 7px 4px;
	margin: 0;
	text-shadow: 1px 1px 1px rgba(0,0,0,.2);
	-moz-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	filter: progid:DXImageTransform.Microsoft.Shadow(color=#999999,direction=135,strength=2);
	cursor: pointer;
	position: relative;
	background-position: 0 0; font-size: 10px; 
	height: 22px; 
	line-height: 23px;
	background-image: url(/images/bg-lite.png); 
	background-color: #F90; 
	border-color: #D58000; 
	color: #FFF; 
}
.custom_btn2{
	background-repeat: repeat-x;
	color: #FFF;	
	font-weight: bold;
	display: inline-block;	
	text-decoration: none;
	border-width: 1px;
	border-style: solid;
	padding: 0 15px 4px;
	*padding: 0 7px 4px;
	margin: 0;
	text-shadow: 1px 1px 1px rgba(0,0,0,.2);
	-moz-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	filter: progid:DXImageTransform.Microsoft.Shadow(color=#999999,direction=135,strength=2);
	cursor: pointer;
	position: relative;
	background-position: 0 0; font-size: 10px; 
	height: 22px; 
	line-height: 23px;
	background-image: url(/images/bg-lite.png); 
	background-color: #F90; 
	border-color: #D58000; 
	color: #FFF; 
}
.custom_btn3{
	background-repeat: repeat-x;
	color: #FFF;	
	font-weight: bold;
	display: inline-block;	
	text-decoration: none;
	border-width: 1px;
	border-style: solid;
	padding: 0 15px 4px;
	*padding: 0 7px 4px;
	margin: 0;
	text-shadow: 1px 1px 1px rgba(0,0,0,.2);
	-moz-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.25);
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	filter: progid:DXImageTransform.Microsoft.Shadow(color=#999999,direction=135,strength=2);
	cursor: pointer;
	position: relative;
	background-position: 0 0; font-size: 10px; 
	height: 22px; 
	line-height: 23px;
	background-image: url(/images/bg-lite.png); 
	background-color: #F90; 
	border-color: #D58000; 
	color: #FFF; 
}
</style>
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
    <div id="rigister_content_wrapper">
    	<div id="content-table-inner">
		
			<!--  start table-content  --><!--  end content-table  -->
		
			<!--  start actions-box ............................................... --><!-- end actions-box........... -->
			
			<!--  start paging..................................................... --><!--  end paging................ -->
			
                 <div style="padding:10px; width:970px;">
                   
   <div align="center" >
  <style>
				   .feature_head
				   {
					   color:#FFF;
					   font-size:18px;
					   font-weight:bold;
				   }
				   .feature_table
				   {
					   border:1px solid #9BBB59
				   }
				   .feature_caption
				   {
					   color:#3AB43A;
					   font-size:12px;
					   font-weight:bold;
				   }
				   .feature_note
				   {
					   font-size:12px;
				   }
				   .border_bot
				   {
					   border-bottom:1px solid #9BBB59;
				   }
				   .border_bot p
				   {
					   padding-left:15px;
				   }
				   </style>		   

                   </div>

<div style="width:500px;display:inline;text-align:left;"><img src="/images/Cal_price.png" /></div>
<div style="width:300px;display:inline; vertical-align:top; margin-top:60px; position:absolute;text-align:left;"><img src="/images/Cal_bite.png" /></div>
<div style="margin-top:-100px; position:absolute;margin-left:600px;"><a href="show_form1/1"><img src="/images/Regis_button.png" style="cursor:pointer;" border="0"/></a></div>
</div>			
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
