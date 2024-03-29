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
	loadingImage : 'images/loading.gif',
	closeImage   : 'images/close.png'
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
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div class="break"></div>
         <div id="content_inner_wrapper">
<!--			coming soon  --->
<!--Start Site Contant Wrapper-->
<script>
function validate1()
{
			var userName1 =  $('#username1');
			var patt = /^.+@.+[.].{2,}$/i;
			
			if(userName1.val() == ""){
				document.getElementById('username1').style.border='1px solid #F00';
				alert("Please Enter a Valid Email");
				return false;
//				validateStep1(1);
			}
			if(!patt.test(userName1.val())) {
				document.getElementById('username1').style.border='1px solid #F00';
				alert("Please Enter a Valid Email");
				return false;
			} 		
}
</script>
<div id="main_login_wraper">
	<div style="height:10px; clear:both;"></div><div style="color:#F00; text-align:center; font-size:12px"><?php echo $this->session->flashdata('message'); ?></div>

	<div id="login_wraper">
        <!--Left Side Space for User Register-->
        <div >
        	<h1>
        	  <legend>Forgotten your password?</legend>
        	</h1>
        	<div style="height:5px; clear:both;"></div>
<div>
	      <form action="<?php echo base_url(); ?>index.php/forgotPassword/sendMail" method="post" id="forgotPasswordForm" onsubmit="return validate1();">
	        <div id="forgotPasswordText">To reset your password, type the full email address that you use to sign in to your Calcipe Account.</div>
	    <br />   
            <strong>Email address:</strong>
    	    <input name="username1" type="text" size="30" id="username1"/>
	    <input type="submit" value="Submit" id="submitButton" />
 		</form>
	    </div>        </div>
        <!--End Left Side Space for User Register-->
        <!--Right Side Space for User Login--><!--End Right Side Space for User Login-->
    </div>
    <div style="height:20px; clear:both;"></div>
</div>
<!--End Site Contant Wrapper-->

         </div>
         <div class="break"></div>
        </div>
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
        <?php $this->load->view('includes/front_footer'); ?>
    <!--End site main footer-->
</div>
</body>
</html>
