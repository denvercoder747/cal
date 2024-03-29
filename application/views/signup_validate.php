<?php $this->load->view('includes/signup_header'); ?>
<link href="<?php echo base_url();?>css/order.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
   	<div id="contentWrapper">
<div id="dashboard_style">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td height="100" align="center" valign="top">An email has been sent to <span style="color:#00BF00"><strong><?php print_r($email);?></strong></span>, Please Activate you Account by clicking on the Link provided in the mail. 
</td>
      </tr>
      </table>
</div></div>
<?php $this->load->view('includes/footer'); ?>