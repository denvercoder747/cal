<?php error_reporting(0);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<?php require_once('front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
    <script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/slidediv.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
</head>
<body>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <!--<div id="header_css">
                <img src="/images/recipe_logo.png" width="372" height="57" />	
                </div>-->
					<?php $this->load->view('includes/login_header'); ?>
                <div class="art-contentLayout">
                    <div class="art-content-inner">
                        <div class="art-Post">
                            <div class="art-Post-tl"></div>
                            <div class="art-Post-tr"></div>
                            <div class="art-Post-bl"></div>
                            <div class="art-Post-br"></div>
                            <div class="art-Post-tc"></div>
                            <div class="art-Post-bc"></div>
                            <div class="art-Post-cl"></div>
                            <div class="art-Post-cr"></div>
                            <div class="art-Post-cc"></div>
                            <div class="art-Post-body">
                        <div class="art-Post-inner"></div>
                        <div style="background-color:white;padding:5px;">
<?php if(isset($records)) : foreach($records as $row) : ?>  
<?php
function getReniewPrice($lvl)
{
	$sql="SELECT price_INR FROM plans WHERE level=".$lvl;
	$rs=mysql_query($sql);
	$nm=mysql_num_rows($rs);
	if($nm>0)
	{
		$rw=mysql_fetch_array($rs);
		$amt=$rw['price_INR'];
		return $amt;
	}
}
 $country_code=substr($a['Country'],-3,-1);
function get_country_by_ip()
{
	$ip =$_SERVER['REMOTE_ADDR'];
	$url='http://api.hostip.info/get_html.php?ip='.$ip.'&position=true';
 
	$data=file_get_contents($url);
	$a=array();
	$keys=array('Country','City','Latitude','Longitude','IP');
	$keycount=count($keys);
	for ($r=0; $r < $keycount ; $r++)
	{
		$sstr= substr ($data, strpos($data, $keys[$r]), strlen($data));
		if ( $r < ($keycount-1))
			$sstr = substr ($sstr, 0, strpos($sstr,$keys[$r+1]));
		$s=explode (':',$sstr);
		$a[$keys[$r]] = trim($s[1]);
	}
 
	return $a;
 
}
$a=get_country_by_ip();
function getAmount($levelval,$cur)
{
	$sql_amt="SELECT price_INR,price_USD FROM plans WHERE level='".$levelval."'";
	$rs_amt=mysql_query($sql_amt);
	$nm_amt=mysql_num_rows($rs_amt);
	if($nm_amt>0)
	{
		$rw_amt=mysql_fetch_array($rs_amt);	
		$levl_val_inr=$rw_amt['price_INR'];
		$levl_val_usd=$rw_amt['price_USD'];
	}
	else
	{
		$levl_val_inr=1;
		$levl_val_usd=1;
	}
	if($cur=="INR")
	{
		return $levl_val_inr;
	}
	if($cur=="USD")
	{
		return $levl_val_usd;
	}
}

?>   
                    <form name="update_plan" method="post" action="<?php echo base_url();?>index.php/member/update_plan" >  
                    <input type="hidden" name="username" id="username" value="<?php echo $row->username;?>"   />
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo $row->first_name;?>"   />
                      <table width="100%" cellspacing="0" cellpadding="4" border="0" class="cellular_plan_table">
             <tbody><tr>
               <td class="cellular_plan_table_hdr" colspan="6"><div id="bigFont">Change Plan</div></td>
             </tr>
               <tr>
                 <td height="10" colspan="6"><div id="message"><?php //print_r($this->session);print_r($_SESSION);//
	echo $this->session->flashdata('message'); ?></div></td>
               </tr>
               <tr>
                 <td width="515" class="price_plan_name">&nbsp;</td>
                <input type="hidden" value="<?php echo getReniewPrice($row->level);?>" name="reniew_amt_inr" id="reniew_amt_inr"  />
                <input type="hidden" value="<?php echo $row->level;?>" name="reniew_level" id="reniew_level"  />
                    <?php
					if($country_code=="IN")
					{?>
                    <input type="hidden" name="currency" id="currency" value="INR"  />
                    <input type="hidden" name="currency_amount" id="currency_amount" value="<?php echo getAmount($level,'INR');?>"  />
					<?php }else{
					?>
                    <input type="hidden" name="currency" id="currency" value="INR"  />
                    <input type="hidden" name="currency_amount" id="currency_amount" value="<?php echo getAmount($level,'INR');?>"  />
					<?php }?>
               <?php
				$query1 = $this->db->query("SELECT * FROM plans");
				$i=1;
				foreach ($query1->result() as $row1)
				{?>
                 <td width="129" align="left" class="price_plan_name"><span class="cellular_plan_table_title">
                 <?php
				 if($row->level==$row1->level){
				 ?>
                 <input type="radio" value="<?php echo $row1->level;?>" checked="checked" id="price_name2" name="plan_name" onclick="document.getElementById('plan_type<?php echo $i;?>').checked=true;document.getElementById('plan_inr<?php echo $i;?>').checked=true;document.getElementById('plan_usd<?php echo $i;?>').checked=true;" <?php if($row->level>$row1->level && $row1->level==70){ ?>disabled="disabled"<?php }?> />
                   <input type="radio" value="<?php echo $row1->level_type;?>" checked="checked" id="plan_type<?php echo $i;?>" name="plan_type" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_INR;?>" checked="checked" id="plan_inr<?php echo $i;?>" name="plan_inr" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_USD;?>" checked="checked" id="plan_usd<?php echo $i;?>" name="plan_usd" style="display:none" />
                 <?php }else{?>
                 <input type="radio" value="<?php echo $row1->level;?>" id="price_name2" name="plan_name" onclick="document.getElementById('plan_type<?php echo $i;?>').checked=true;document.getElementById('plan_inr<?php echo $i;?>').checked=true;document.getElementById('plan_usd<?php echo $i;?>').checked=true;" <?php if($row->level>$row1->level && $row1->level==70){ ?>disabled="disabled"<?php }?> />
                   <input type="radio" value="<?php echo $row1->level_type;?>" id="plan_type<?php echo $i;?>" name="plan_type" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_INR;?>"  id="plan_inr<?php echo $i;?>" name="plan_inr" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_USD;?>" id="plan_usd<?php echo $i;?>" name="plan_usd" style="display:none" />
                 
                 <?php }?>
                  <?php echo $row1->level_type;?> </span></td>
				 <?php $i++;}			   
				?>
</tr>
               <tr>
                 <td height="10" colspan="6"></td>
               </tr>
               <tr class="trActive">
                 <td width="515">Plan Price</td>
                 <td width="129" align="left">FREE</td>
                 <td width="113" align="left"><span class="WebRupee">₹</span>300/Month</td>
                 <td width="121" align="left"><span class="WebRupee">₹</span>500/Month</td>
                 <td width="126" align="left"><span class="WebRupee">₹</span>1000/Month</td>
               </tr>
               <tr>
                 <td height="5" colspan="6"></td>
               </tr>
               <tr class="trActive">
                 <td width="515">No Of Recipes</td>
                 <td width="129" align="left">5</td>
                 <td align="left">30</td>
                 <td align="left">50</td>
                 <td align="left">100</td>
               </tr>
               <tr>
                 <td height="2" colspan="6"></td>
               </tr>
               <tr class="trActive">
                 <td width="515">Recipe Indent Calculation</td>
                 <td width="129" align="left">No </td>
                 <td align="left">Yes</td>
                 <td align="left">Yes</td>
                 <td align="left">Yes</td>
               </tr>
               <tr>
                 <td height="2" colspan="6"></td>
               </tr>
               <tr class="trActive">
                 <td width="515">Service Validity</td>
                 <td width="129" align="left">30 Days</td>
                 <td align="left">30 Days</td>
                 <td align="left">30 Days</td>
                 <td align="left">30 Days</td>
               </tr>
               <tr>
                 <td height="2" colspan="6"></td>
               </tr>
               <tr>
               <td  colspan="3"></td>
                 <td height="10" colspan="2" align="left"> <?php if($row->valid_upto<date("Y-m-d")){?>Your Plan has Expired on &nbsp;<span style="color:#F00"><?php echo date('d-m-Y',strtotime($row->valid_upto));?></span><?php }else{?>Your Plan Will Expire on &nbsp;<span style="color:#007F55"><strong><?php echo date('d-m-Y',strtotime($row->valid_upto));?></strong><?php }?></span></td>
                 <td height="15"></td>
               </tr>
               <tr>
               <td  colspan="3"></td>
                 <td height="10" colspan="2" align="left"><input type="button" name="PlanB" id="PlanB" value="Upgrade" class="calcipeButton" onclick="if (confirm('Are you sure you want to Upgrade ?')) {document.update_plan.submit();}"  />
                 Your Plan</td>
                 <td height="15"></td>
               </tr>
               <tr>
               <td  colspan="3"></td>
                 <td height="10" colspan="2" align="left"><?php if($row->level!=70 ){?><input type="button" name="reniew" id="reniew" value="Renew" class="calcipeButton" onclick="if (confirm('Are you sure you want to Renew ?')) {document.update_plan.action='<?php echo base_url();?>index.php/member/reniew_plan';document.update_plan.submit();}"  /> Your Membership<?php }?></td>
                 <td width="0" height="15"></td>
               </tr>
				<!-- this is removed for popup application
               <tr>
                 <td height="15"></td>
                 <td height="15" colspan="3" align="right">
                 <input type="hidden" name="session_user" id="session_user" value="" />
                 <input type="Submit" name="Update" id="Update" value="Update Your Plan" class="updateShopcart" /></td>
                 <td width="2" height="15"></td>
               </tr> -->
               <tr>
                 <td height="15" colspan="6"></td>
               </tr>
             </tbody></table>
             </form>
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Profile were Found.</h2>
	<?php endif; ?>

                        </div>
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 
