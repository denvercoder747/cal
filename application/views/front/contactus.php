<?php
    $error_message = "";
	if(isset($_POST['S1'])) {
		 
		// EDIT THE 2 LINES BELOW AS REQUIRED
		$email_to = "support@calcipe.com";
		$email_subject = "Feedback From User";
		 
		 
		function died($error) {
			// your error code can go here
			$error.="We are very sorry, but there were error(s) found with the form you submitted. ";
			 $error.="These errors appear below.<br /><br />";
			$error.="<br /><br />";
			$error.="Please go back and fix these errors.<br /><br />";
			//die();
		}
		 
		// validation expected data exists
		if(!isset($_POST['frmName']) ||
			!isset($_POST['email_address']) ||
			!isset($_POST['companyName']) ||
			!isset($_POST['subject']) ||
			!isset($_POST['comments'])) {
			died('We are sorry, but there appears to be a problem with the form you submitted.');      
		}
		 
		$first_name = $_POST['frmName']; // required
		$companyName = $_POST['companyName']; // not required
		$email_address = $_POST['email_address']; // required
		$subject = $_POST['subject']; // required
		$comments = $_POST['comments']; // required
		 
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	  if(!preg_match($email_exp,$email_address)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	  }
		$string_exp = "/^[A-Za-z .'-]+$/";
	  if(!preg_match($string_exp,$first_name)) {
		$error_message .= 'The First Name you entered does not appear to be valid.<br />';
	  }
	  if(strlen($comments) < 2) {
		$error_message .= 'The Comments you entered do not appear to be valid.<br />';
	  }
	  if(strlen($error_message) > 0) {
	   // died($error_message);
		$error_message1="We are very sorry, but there were error(s) found with the form you submitted. ";
		$error_message1.="These errors appear below.<br /><br />";
		$error_message=$error_message1." ".$error_message."<br /><br />";
	
	  }
		$email_message = "Form details below.\n\n";
		 
		function clean_string($string) {
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		}
		 
	
		$email_message .= "First Name: ".clean_string($first_name)."\n";
		$email_message .= "CompanyName: ".clean_string($companyName)."\n";
		$email_message .= "Email: ".clean_string($email_address)."\n";
		$email_message .= "Subject: ".clean_string($subject)."\n";
		$email_message .= "Comments: ".clean_string($comments)."\n";
		 
		 
	// create email headers
	$headers = 'From: '.$email_address."\r\n".
	'Reply-To: '.$email_address."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers); 
	header("location:/index.php/home/contactus/success");
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
         <div id="contactus_header"><span>Contact Us</span></div>
         <div class="break"></div>
         <div id="content_inner_wrapper">
            <div id="content_contact_left">
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td height="30" colspan="3" class="contactus_header">Address</td>
              </tr>
              <tr>
                <td height="20" colspan="3"><strong>Bakers Machinery & Consultancy Co.,</strong><br />
                46/3, Mission road,<br />
                Bangalore - 560027.</td>
              </tr>
              <tr>
                <td height="10" colspan="3"></td>
              </tr>
               <tr>
                <td height="20" colspan="3" class="contactus_header">Email :</td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
    
                <td><img src="/images/icon_email.jpg" width="28" height="28" /></td>
                <td>info@calcipe.com</td>
              </tr>
              <tr>
                <td height="20" colspan="3" class="contactus_header">Telephone :</td>
              </tr>
              <tr>
                <td width="1%" height="20">&nbsp;</td>
                <td width="6%"><img src="/images/icon_phone.png" alt="Contact us Phone" width="29" height="29" border="0" /></td>
                <td width="93%">+91 8022116619</td>
              </tr>
              <tr>
                <td height="20" colspan="3" class="contactus_header">Mobile :</td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
                <td><img src="/images/icon_mobile.png" width="28" height="28" /></td>
                <td>+91-9886305404</td>
              </tr>
             
              <!--<tr>
                <td height="20">&nbsp;</td>
                <td><img src="/images/icon_www.png" width="28" height="28" /></td>
                <td>www.calcipe.com</td>
              </tr>-->
               <tr>
                <td height="20" colspan="3" class="contactus_header">Social Network Links :</td>
              </tr>
              <tr>
              	<td></td>
               <td colspan="3">
                        <table width="" cellspacing="0" cellpadding="0" border="0">
          <tbody><tr>
            <td width="16">
            	<a target="_blank" href="https://www.facebook.com/pages/Calcipe/231668930231824"><img width="16" height="16" border="0" alt="Facebook" src="/images/facebook.gif"></a>
            </td>
            <td width="15">&nbsp;</td>
            <td width="16">
            	<a target="_blank" href="http://www.linkedin.com/"><img width="16" height="16" border="0" alt="LinkedIn" src="/images/linkedin.gif"></a>
            </td>
            <td width="15">&nbsp;</td>
            <td width="16">
            	<a target="_blank" href="http://www.blog.com/"><img width="16" height="16" border="0" alt="Blob" src="/images/blog.gif"></a>
            </td>
            <td width="15">&nbsp;</td>
            <td width="16">
            	<a target="_blank" href="https://twitter.com/#!/calcipe"><img width="16" height="16" border="0" alt="Twitter" src="/images/twitter.gif"></a>
            </td>
           <!-- <td width="22">
            	<a href="index.php" target="_self"><img src="images/home.gif" border="0" width="22" height="20" alt="Home" /></a></td>

            <td width="16">
            	<a href="login.php">Login</a>
            </td>-->
          </tr>
        </tbody></table>
               </td>
              <tr>
              </table>
           </div>
          <div id="content_contact_right">
            <div id="feedback_form_tittle"><p></p><h1>Your Suggestions</h1>
            <div id="height_clear2"></div>
            <div id="error_msg"></div>
            <form name="suggestion" id="suggestion" method="post" action="">
            <table align="left" cellpadding="2" cellspacing="3" width="400">
              <tbody>
                <tr>
                  <td colspan="2" align="center"><div style="color:#F00; font-size:9px"><?php echo $error_message;?></div><div style="color:#00BF00; font-size:10px"><?php if($this->uri->segment(3)){echo "Your Feedback has been Sent";}?></div></td>
                  </tr>
                <tr>
                  <td width="85">Name:<span class="text-login">* </span></td>
                  <td width="269" valign="middle"><input name="frmName" id="frmName" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
    
                </tr>
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td width="85">E mail:<span class="text-login">*</span></td>
                  <td height="5"><input name="email_address" id="email_address" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
    
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td>Company:</td>
                  <td><input name="companyName" id="companyName" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
                <tr>
    
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td>Subject:<span class="text-login">*</span></td>
                  <td><input name="subject" id="subject" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
    
                </tr>
                <tr>
                  <td valign="top">Remarks:<span class="text-login">*</span></td>
                  <td valign="top"><textarea rows="5" cols="30" name="comments" id="comments" class="textarea_box_blur" onfocus="javascript: this.className = 'textarea_box_focus';" onblur="javascript: this.className = 'textarea_box_blur';"></textarea></td>
                </tr>
                <tr>
                  <td height="2" colspan="2" valign="top"></td>
    
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input class="feedback_mail_icon" value="Send Your Feedback" name="S1" type="submit" onclick="return validateForm();" ></td>
                </tr>
              </tbody>
           </table>
          </form>
          </div>
         </div>
         <div class="break"></div>
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
