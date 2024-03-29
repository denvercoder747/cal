<?php

class Email extends CI_Controller {
	
    public function __construct(){
        parent::__construct();

    }
	function index()
	{
		 $this->load->library('email');
		// set email class parameters
		for($i=3; $i<8; $i++){
				$mailbox=$this->input->post('email'.$i);
				$firstname=$this->input->post('first'.$i);
				$lastname=$this->input->post('last'.$i);
			if($mailbox!='')
			{
					$message="<html>
								<head>
								<style type='text/css'>
								h2, p
								{
									font-family:Arial, Helvetica, sans-serif;
									padding:0px 10px 0px 10px
								}
								
								p
								{
									font-size:13px;
									color:#666666;
								}
								</style>
								</head>
								
								<body bgcolor='#000000'>
								<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
								<tr>
								<td>
								<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
								<tr>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/tlcurve.gif' /></td>
								<td width='332px' height='123px'><img src='http://www.calcipe.com/mail_images/logo2.gif' /></td>
								<td width='332px' height='123px' style='text-align:right;'><img src='http://www.calcipe.com/mail_images/mob2.gif' /></td>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/trcurve.gif' /></td>
								</tr>
								
								
								</table>
								</td>
								</tr>
								<tr>
								<tr>
								<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>WELCOME MAIL</p></td>
								</tr>
								<tr>
								<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hi <strong>$firstname $lastname</strong>
									  <p>Hope that all is well .</p>
									  <p>Here is one of your friend suggested to JOIN Calcipe:</p>
									  <p>You will join by click the following link, <a href='http://www.calcipe.com/index.php/home/price'>Join Calcipe</a></p></td>
									<td align='right'><a href='http://www.calcipe.com/index.php/home/price'><img src='http://www.calcipe.com/mail_images/join.gif' border='0' ></a></td>
								  </tr>
								</table>
								<p>&nbsp;</p>
								<p>We look forward to updating you next time!<br />
								  <br />
								  <strong>Regards,</strong><br />
								<strong>The Calcipe Team</strong></p>
								
								</td>
								</tr>
								<tr>
								<td>
								<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
								<tr>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/blcurv.gif' height='83' width='18' /></td>
								<td width='664px' style='background-image:url(http://www.calcipe.com/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/brcurv.gif' height='83' width='18' /></td>
								</tr>
								</table>
								</td>
								</tr>
								<tr>
								<td bgcolor='#e6e6e6'>
								<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
								<tr height='20px'>
								<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='http://www.calcipe.com/mail_images/facebook.gif' border='0' /></a></td>
								<td><p>Link us on Facebook</p></td>
								<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='http://www.calcipe.com/mail_images/tweeter.gif' /></a></td>
								<td><p>Follow us on Twitter</p></td>
								<td width='450px'>&nbsp;</td>
								</tr>
								<tr>
								<td height='19' colspan='5'  style='margin:0'><img src='http://www.calcipe.com/mail_images/hr.gif' /></td>
								</tr>
								<tr>
								<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
								</tr>
								</table>
								<tr>
								</table>
								</table>
								</td>
								</tr>
								</table>
								</body>
								</html>
";
					$this->email->from('support@calcipe.com','Calcipe Team');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Join Calcipe');
					$this->email->message($message);
					$data['title']='Sending email...';
					$data['header']='Sending email now...';
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
				
			}
		}
//					$this->load->view('email_view',$data);
					redirect('../index.php');
 	}
	
	function sendmail()
	{
		 $this->load->library('email');
		// set email class parameters
//		for($i=1; $i<11; $i++){
		for($i=1; $i<2; $i++){
				$mailbox=$this->input->post('email'.$i);;
				$recipename=$this->input->post('first'.$i);;
//				$lastname=$this->input->post('last'.$i);;
			if($mailbox!='')
			{
					$message="<html>
<head>
<style type='text/css'>
h2, p
{
	font-family:Arial, Helvetica, sans-serif;
	padding:0px 10px 0px 10px
}

p
{
	font-size:13px;
	color:#666666;
}
</style>
</head>

<body bgcolor='#000000'>
<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
<tr>
<td>
<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
<tr>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/tlcurve.gif' /></td>
<td width='332px' height='123px'><img src='http://www.calcipe.com/mail_images/logo2.gif' /></td>
<td width='332px' height='123px' style='text-align:right;'><img src='http://www.calcipe.com/mail_images/mob2.gif' /></td>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/trcurve.gif' /></td>
</tr>


</table>
</td>
</tr>
<tr>
<tr>
<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>WELCOME MAIL</p></td>
</tr>
<tr>
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hi
        <p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'><span style='font-family: Verdana,Geneva,sans-serif; font-size: 11px; font-weight: bolder; color: rgb(5, 105, 181); padding-left: 5px;'>The $recipename is Shared with You </span>                        
<p>Hope that all is well .</p>
      <p>Here is one of your friend suggested to JOIN Calcipe:</p>
      <p>You will join by click the following link, <a href='http://www.calcipe.com/index.php/home/price'>Join Calcipe</a></p></td>
    <td align='right'><a href='http://www.calcipe.com/index.php/home/price'><img src='http://www.calcipe.com/mail_images/join.gif' border='0' ></a></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>We look forward to updating you next time!<br />
  <br />
  <strong>Regards,</strong><br />
<strong>The Calcipe Team</strong></p>

</td>
</tr>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
<tr>
<td width='18px'><img src='http://www.calcipe.com/mail_images/blcurv.gif' height='83' width='18' /></td>
<td width='664px' style='background-image:url(http://www.calcipe.com/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
<td width='18px'><img src='http://www.calcipe.com/mail_images/brcurv.gif' height='83' width='18' /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#e6e6e6'>
<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
<tr height='20px'>
<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='http://www.calcipe.com/mail_images/facebook.gif' border='0' /></a></td>
<td><p>Link us on Facebook</p></td>
<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='http://www.calcipe.com/mail_images/tweeter.gif' /></a></td>
<td><p>Follow us on Twitter</p></td>
<td width='450px'>&nbsp;</td>
</tr>
<tr>
<td height='19' colspan='5'  style='margin:0'><img src='http://www.calcipe.com/mail_images/hr.gif' /></td>
</tr>
<tr>
<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
</tr>


</table>
<tr>

</table>
</table>
</td>
</tr>
</table>
</body>
</html>
";
					$this->email->from('support@calcipe.com','Calcipe Support');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('New Recipe in Calcipe');
					$this->email->message($message);
//					$data['title']='Sending email...';
//					$data['header']='Sending email now...';
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
				
			}
		}
				$this->session->set_flashdata('message', '<div id="message" class="error">Request has been sent successfully.</div>');
				redirect('site/recipe');
 	}
	function shareFriend()
	{
		 $this->load->library('email');
		// set email class parameters
//		for($i=1; $i<11; $i++){
		for($i=1; $i<2; $i++){
				$mailbox=$this->input->post('email'.$i);;
				$recipename=$this->input->post('first'.$i);;
//				$lastname=$this->input->post('last'.$i);;
			if($mailbox!='')
			{
					$message="<html>
								<head>
								<style type='text/css'>
								h2, p
								{
									font-family:Arial, Helvetica, sans-serif;
									padding:0px 10px 0px 10px
								}
								
								p
								{
									font-size:13px;
									color:#666666;
								}
								</style>
								</head>
								
								<body bgcolor='#000000'>
								<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
								<tr>
								<td>
								<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
								<tr>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/tlcurve.gif' /></td>
								<td width='332px' height='123px'><img src='http://www.calcipe.com/mail_images/logo2.gif' /></td>
								<td width='332px' height='123px' style='text-align:right;'><img src='http://www.calcipe.com/mail_images/mob2.gif' /></td>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/trcurve.gif' /></td>
								</tr>
								
								
								</table>
								</td>
								</tr>
								<tr>
								<tr>
								<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>WELCOME MAIL</p></td>
								</tr>
								<tr>
								<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hi <strong>$recipename</strong>
									  <p>Hope that all is well .</p>
									  <p>Here is one of your friend suggested to JOIN Calcipe:</p>
									  <p>You will join by click the following link, <a href='http://www.calcipe.com/index.php/home/price'>Join Calcipe</a></p></td>
									<td align='right'><a href='http://www.calcipe.com/index.php/home/price'><img src='http://www.calcipe.com/mail_images/join.gif' border='0' ></a></td>
								  </tr>
								</table>
								<p>&nbsp;</p>
								<p>We look forward to updating you next time!<br />
								  <br />
								  <strong>Regards,</strong><br />
								<strong>The Calcipe Team</strong></p>
								
								</td>
								</tr>
								<tr>
								<td>
								<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
								<tr>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/blcurv.gif' height='83' width='18' /></td>
								<td width='664px' style='background-image:url(http://www.calcipe.com/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/brcurv.gif' height='83' width='18' /></td>
								</tr>
								</table>
								</td>
								</tr>
								<tr>
								<td bgcolor='#e6e6e6'>
								<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
								<tr height='20px'>
								<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='http://www.calcipe.com/mail_images/facebook.gif' border='0' /></a></td>
								<td><p>Link us on Facebook</p></td>
								<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='http://www.calcipe.com/mail_images/tweeter.gif' /></a></td>
								<td><p>Follow us on Twitter</p></td>
								<td width='450px'>&nbsp;</td>
								</tr>
								<tr>
								<td height='19' colspan='5'  style='margin:0'><img src='http://www.calcipe.com/mail_images/hr.gif' /></td>
								</tr>
								<tr>
								<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
								</tr>
								</table>
								<tr>
								</table>
								</table>
								</td>
								</tr>
								</table>
								</body>
								</html>";
					$this->email->from('support@calcipe.com','Calcipe Support');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Join Calcipe');
					$this->email->message($message);
//					$data['title']='Sending email...';
//					$data['header']='Sending email now...';
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
				
			}
		}
				$this->session->set_flashdata('message', '<div id="message" class="error">Request has been sent successfully.</div>');
				redirect('site/recipe');
 	}
}