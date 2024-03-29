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
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/global_validations.js"></script>
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
<style>
.calcipeButton {
    background-color: #638392;
    border: 1px solid gray;
    border-radius: 10px 10px 10px 10px;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 11px;
    height: 25px;
    width: auto;
}
.calcipeButtonBig{
    background-color:#006600;
    border: 1px solid gray;
    border-radius: 10px 10px 10px 10px;
    color: #FFFFFF;
    font-size: 11px;
    height: 25px;
    width: 100px;
	cursor:pointer;
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
    	<table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td height="100" align="center" ><h2><font color="#006600">Your registration is successful. </font></h2></td>
    </tr>
    <tr>
      <td height="100" align="center" valign="top"><form name="request" id="request" action="<?php echo base_url();?>index.php/email" method="post" class="standardForm">
    <table width="100%" border="0" cellspacing="10" cellpadding="0" align="left">
  <tr>
    <td height="30" colspan="8"><strong><font color="#006600">Suggest Your Friends For Calcipe</font></strong></td>
    </tr>
  <tr>
    <td width="6%">&nbsp;</td>
    <td width="4%">1</td>
    <td width="10%">First Name</td>
    <td width="20%"><input type="text" name="first3" id="first3" /></td>
    <td width="10%">Last Name</td>
    <td width="20%"><input type="text" name="last1" id="last1" /></td>
    <td width="7%">Email</td>
    <td width="23%"><input type="text" name="email3" id="email3" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2</td>
    <td>First Name</td>
    <td><input type="text" name="first4" id="first4" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last2" id="last2" /></td>
    <td>Email</td>
    <td><input type="text" name="email4" id="email4" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3</td>
    <td>First Name</td>
    <td><input type="text" name="first5" id="first5" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last3" id="last3" /></td>
    <td>Email</td>
    <td><input type="text" name="email5" id="email5" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4</td>
    <td>First Name</td>
    <td><input type="text" name="first6" id="first6" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last4" id="last4" /></td>
    <td>Email</td>
    <td><input type="text" name="email6" id="email6" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5</td>
    <td>First Name</td>
    <td><input type="text" name="first7" id="first7" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last5" id="last5" /></td>
    <td>Email</td>
    <td><input type="text" name="email7" id="email7" /></td>
  </tr>
  <tr>
    <td colspan="8" align="center"><input type="submit" name="requestbtn" id="requestbtn" class="calcipeButtonBig" value="Send" /></td>
  </tr>
    </table>
</form>
</td>
      </tr>
      </table>
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
        <?php $this->load->view('includes/front_footer'); ?>
    <!--End site main footer-->
</div>
</body>
</html>
