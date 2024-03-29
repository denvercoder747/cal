<?php $this->load->view('includes/signup_header'); ?>
<link href="<?php echo base_url();?>css/order.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
   	<div id="contentWrapper">
<div id="dashboard_style">
	<ul class="standardStep">
		<li class="standardStepAD">Easy and Fast. <span>3 Steps »</span></li>
		<li><span>1</span>&nbsp;Order</li>
		<li><span>2</span>&nbsp;Check Out</li>
					<li class="stepActived"><span>3</span>&nbsp;Configuration</li>
			</ul>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td height="446" align="center" valign="top">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
    <ul class="congrats">
    <li><span>Congrats !!!</span>&nbsp;You Can Add Recipes</li>
    </ul>
		  <form name="request" id="request" action="<?php echo base_url();?>index.php/email" method="post" class="standardForm">
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="left">
  <tr>
    <td height="30" colspan="7"><strong>Suggest Your Friends For Calcipe</strong></td>
    </tr>
  <tr>
    <td>1</td>
    <td>First Name</td>
    <td><input type="text" name="first3" id="first3" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last1" id="last1" /></td>
    <td>Email</td>
    <td><input type="text" name="email3" id="email3" /></td>
  </tr>
  <tr>
    <td>2</td>
    <td>First Name</td>
    <td><input type="text" name="first4" id="first4" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last2" id="last2" /></td>
    <td>Email</td>
    <td><input type="text" name="email4" id="email4" /></td>
  </tr>
  <tr>
    <td>3</td>
    <td>First Name</td>
    <td><input type="text" name="first5" id="first5" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last3" id="last3" /></td>
    <td>Email</td>
    <td><input type="text" name="email5" id="email5" /></td>
  </tr>
  <tr>
    <td>4</td>
    <td>First Name</td>
    <td><input type="text" name="first6" id="first6" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last4" id="last4" /></td>
    <td>Email</td>
    <td><input type="text" name="email6" id="email6" /></td>
  </tr>
  <tr>
    <td>5</td>
    <td>First Name</td>
    <td><input type="text" name="first7" id="first7" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last5" id="last5" /></td>
    <td>Email</td>
    <td><input type="text" name="email7" id="email7" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="requestbtn" id="requestbtn" value="Send" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>
</form>
      </td>
      <td align="center" valign="top">&nbsp;<a href="<?php echo base_url();?>" class="green-button">Login</a></td>
      </tr>
      </table>
</div></div>
<?php $this->load->view('includes/footer'); ?>