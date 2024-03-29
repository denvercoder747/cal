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
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div class="break"></div>
         <div id="content_inner_wrapper">
<!--			coming soon  --->
<!--Start Site Contant Wrapper-->
<script>
function loginCheck1()
{
	var username=document.getElementById('username1').value;
	var password=document.getElementById('password1').value;
		document.getElementById('dv3').style.display='none';
		document.getElementById('dv4').style.display='none';
		document.getElementById('username1').style.border='1px solid #A4AEB6';
		document.getElementById('password1').style.border='1px solid #A4AEB6';
	if(username=='')
	{
		document.getElementById('dv3').style.display='block';
		document.getElementById('username').style.border='1px solid #F00';
		return false;
	}
	if(password=='')
	{
		document.getElementById('dv4').style.display='block';
		document.getElementById('password1').style.border='1px solid #F00';
		return false;
	}
	document.frm_userLogin1.action="<?php echo base_url();?>index.php/home/validate_credentials";
	document.frm_userLogin1.submit();
}
</script>
<div id="main_login_wraper">
	<div style="height:10px; clear:both;"></div><div style="color:#F00; text-align:center; font-size:12px"><?php echo $this->session->flashdata('message'); ?></div>

	<div id="login_wraper">
        <!--Left Side Space for User Register-->
        <div id="user_register_left">
        	<h1>Sign-in to your account</h1>
            <div style="height:15px; border-bottom:1px solid #d8dbde; margin-left:25px;">
            </div>
            <div style="height:5px; clear:both;"></div>
            <form name="frm_userLogin1" id="frm_userLogin1" action="<?php echo base_url();?>index.php/home/validate_credentials" method="post">
            <div id="login_user_text">Username
            	<div id="errUsername" style="display:none; float:right; font-weight:normal; margin-left:5px; text-align:left; width:350px;">
                Enter Your User Name</div>
            </div>
            <div id="login_user_text">
           	  	<input class="login_text_box" name="username" id="username1" type="text" value="" /><div id="dv3" style="color:#F00; font-size:12px; display:none">* Mandatory</div></div>
            <div style="height:10px; clear:both;"></div>
            <div id="login_user_text">Password
            	<div id="errPassword" style="display:none; float:right; font-weight:normal; margin-left:5px; text-align:left; width:350px;">
                Enter Your Passsword</div>
            </div>
            <div id="login_user_text">
           	  	<input class="login_text_box" name="password" id="password1" type="password" value="" /><div id="dv4" style="color:#F00; font-size:12px; display:none">* Mandatory</div><br/>
                </div>
            <div style="height:30px; clear:both;"></div>
            <div id="login_user_frtpwd"><a href="<?php echo base_url();?>index.php/forgotPassword">Forgot your password?</a></div>
            <!--<div id="login_user_btm">
            	<input class="login_sign_in" name="user_login" id="user_login" type="submit" value="" onclick="return loginCheck()" />
            </div>-->
            <div id="login_user_btm">
            	<input class="loginCss" name="user_login1" id="user_login1" type="button" value="LOG IN" onclick="return loginCheck1()" />
            </div>
            </form>
        </div>
        <!--End Left Side Space for User Register-->
        <!--Right Side Space for User Login-->
        <div id="user_login_right">
        	<h1>Create an account</h1>
            <div style="height:15px; border-bottom:1px solid #d8dbde; margin-left:25px;"></div>
 <p>To  know, experience and enjoy the services of Calcipe, you will need to open an  account. To open a Calcipe account, all you  need to do is to register by clicking  on the link given and fill in the  details. Please type in your password and your email id for us to confirm  opening your Calcipe account with us.</p>            <div style="height:30px; clear:both;"></div>
            <a href="<?php echo base_url();?>index.php/home/price" style="text-decoration:none;"><div id="create_account"><br />CREATE MY ACCOUNT<!--<img src="/images/icon_create_account.png" alt="Create New User Account" />--></div></a>
        </div>
        <!--End Right Side Space for User Login-->
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
