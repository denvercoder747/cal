<?php 
	$query3 = $this->db->query("SELECT profit FROM user WHERE user_id=".$this->session->userdata('user_id'));
	
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	   $profitval =$row3['profit'];
	}    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Calcipe </title>
     <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/tcal.css" />
	<script type="text/javascript" src="/js/tcal.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <!-- slide show -->
    <!--
      jCarousel library
    -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>    
    <link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
    <script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$('a[rel*=facebox]').facebox({
		loadingImage : '/images/loading.gif',
		closeImage   : '/images/close.png'
		})
	});
	</script>
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
<style type="text/css">
.profileHeader {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	font-style: normal;
	line-height: normal;
	text-align: left;
}
.mandatory {
	color:#F00;
	text-align: right;
}
</style>
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
					<?php $this->load->view('includes/add_profile_header'); ?>
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
                        <div class="art-Post-inner">
                        <div id="viewRecipe">
<?php if(isset($records)) : foreach($records as $row) : ?>     


<div class="content-wrapper">

	
	<div class="content content-full">
	
<div class="content-main">

			
		  <div id="formNewUser" class="isVisible">
		
						<div><?php echo $this->session->flashdata('message'); ?></div>
          <form name="profilePass" id="profilePass" action="<?php echo base_url();?>index.php/member/update_password" method="post" class="standardForm">
            <table class="standardSIGNUPTable" align="center" border="0" cellpadding="5" cellspacing="0">
            <tbody>						  
                <tr class="mandatory">
                    <td colspan="3" class="errorMessage">
                    <?php echo $this->session->flashdata('registration_error'); ?>
                    
                    <?php echo validation_errors('<p class="errorMessage">'); ?>
                    </td>
                </tr>
                 <tr>
                    <th colspan="3" bgcolor="#b8d1dd"><div id="bigFont">Account Information</div></th>
                </tr>
                <tr bgcolor="#dfecf4">
                  <th class="mandatory">&nbsp;</th>
                  <th class="profileHeader">&nbsp;</th>
                  <td>&nbsp;</td>
                </tr>
                <tr bgcolor="#dfecf4">
                  <th width="32" class="mandatory">&nbsp;</th>
                    <th width="140" class="profileHeader"> E-mail:</th>
                    <td width="614">
                    <input name="username" type="text" id="username" value="<?php echo $row->username; ?>" maxlength="80" readonly="readonly">
                    <span>E-mail must be a valid e-mail between 4 and 80 characters with no spaces.</span>
                    <div id="checkUsername"></div>
                    </td>
                </tr>
                <tr bgcolor="#dfecf4">
                  <th class="mandatory">*</th>
                    <th class="profileHeader"> Old Password:</th>
                    <td>
                    <input name="old_password" id="old_password" maxlength="50" class="input-form-account" type="password" value="">
                    <span>Password must be between 4 and 50 characters with no spaces.</span>
                    </td>
                </tr>
                <tr bgcolor="#dfecf4">
                  <th class="mandatory">*</th>
                    <th class="profileHeader"> Password:</th>
                    <td>
                    <input name="password" id="password" maxlength="50" class="input-form-account" type="password" value="">
                    <span>Password must be between 4 and 50 characters with no spaces.</span>
                    </td>
                </tr>
                <tr bgcolor="#dfecf4">
                  <th class="mandatory">*</th>
                    <th class="profileHeader"> Retype Password:</th>
                    <td><input name="retype_password" id="retype_password" class="input-form-account" type="password" value=""></td>
                </tr>
                <tr bgcolor="#dfecf4">
                	<td></td>
                	<td colspan="3"><input type="submit" name="update_pass" value="Update" id="update_pass" class="button calcipeButton"  />
                 </td></tr>
                <tr>
                  <td></td>
                  <td colspan="3">&nbsp;</td>
                </tr>
            </tbody>
            </table>
            </form>    
            <div id="dv1" style="display:block">
            
            

<table width="822" border="0" align="center" cellpadding="5" 
cellspacing="0" class="standard-table standard-table-dash standardSIGNUPTable noBdTop nomargin" id="contact_info">

	    	    <tbody>
                <tr>
                    <th colspan="5" bgcolor="#b8d1dd"><div id="bigFont">Billing Information</div></th>
                </tr>
                
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th width="135" class="profileHeader"> First Name</th>
	  <th width="9" class="profileHeader">:</th>
	  <td width="602"><?php echo $row->first_name; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader"> Middle Name</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->middle_name; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Last Name</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->last_name; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Gender</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo $row->gender; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">DOB</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo date("d-M-Y",strtotime($row->dob)); ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Company</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->company; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory" valign="top">&nbsp;</th>
		<th class="profileHeader" valign="top">Address Line1</th>
		<th class="profileHeader" valign="top">:</th>
		<td><?php echo $row->address1; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Address Line2</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->address2; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Country</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->country_name; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">State</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->state_name; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">City</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->city_name; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Zipcode</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->zip; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Phone</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->contact_no; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Fax</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->fax_no; ?></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader"> E-mail</th>
		<th class="profileHeader">:</th>
		<td><?php echo $row->email; ?></td>
	</tr>
    <tr>
      <th colspan="5">&nbsp;</th>
    </tr>
    <tr>
       <th colspan="5" bgcolor="#b8d1dd"><div id="bigFont">Calculation Basics</div></th>
    </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Currency</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo $row->currency; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Weight Per Portion</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo $row->weight_per_portion; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Food Loss(%)</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo $row->food_loss; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader"> Profit Amount(%)</th>
	  <th class="profileHeader">:</th>
	  <td><?php echo $row->profit; ?></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Photo</th>
	  <th class="profileHeader">:</th>
	  <td><input type="hidden" id="T3" name="T3" size="20" value="<?php echo $row->photo;?>" />
    	                          <?php if($row->photo != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->photo;?>" width="120" height="100" />
                          <?php } ?></td>
	  </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" align="right">&nbsp;</td>
      </tr>
     <tr>
       <th colspan="5" bgcolor="#b8d1dd"><div id="bigFont">Suggest a Friend</div></th>
    </tr>
      <tr bgcolor="#dfecf4">
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" align="right">Share<a href="<?php echo base_url();?>index.php/site/shareFriend/" rel="facebox" ><img src="/images/share_recipe.png"  title="Share" width="24" height="24" /></a></td>
      </tr>
      <tr bgcolor="#dfecf4"><td></td>
      		<td><input type="button" class="calcipeButton" name="editb" value="Edit" onclick="document.getElementById('dv1').style.display='none';document.getElementById('dv2').style.display='block';"  />&nbsp;</td>
      		<td>&nbsp;</td>
      		<td colspan="2" align="right"><a href="<?php echo base_url();?>index.php/site/radio_close/" rel="facebox">Close Account</a></td>
      		</tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" align="right"></td>
      </tr>
                </tbody>
</table>            </div>
            <div id="dv2" style="display:none;">
    

<table  width="822" id="contact_info" class="standard-table standard-table-dash standardSIGNUPTable noBdTop nomargin" border="0" cellpadding="2" cellspacing="0" align="center">
<form name="profile" id="profile" action="<?php echo base_url();?>index.php/member/update_profile" method="post" enctype="multipart/form-data" class="standardForm">
<?php
				$dob=explode("-",$row->dob);
?>
	    	    <tbody>
               <tr>
       <th colspan="5" bgcolor="#b8d1dd"><div id="bigFont">Billing Information</div></th>
                
                
                <tr bgcolor="#dfecf4">
                  <th class="mandatory">&nbsp;</th>
                  <th class="profileHeader">&nbsp;</th>
                  <td>&nbsp;</td>
                </tr>
                <tr bgcolor="#dfecf4">
	    	      <th width="34" class="mandatory"><span class="profileHeader">* </span></th>
		    <th width="140" class="profileHeader">Language:</th>
		    <td width="615">
			    <select name="lang" id="lang"><option selected="selected" value="en_us">English</option><option value="pt_br">Português</option><option value="es_es">Español</option><option value="it_it">Italiano</option></select>			    <span>Select your main language to contact (when necessary).</span>
		    </td>
	    </tr>
        
	<tr bgcolor="#dfecf4">
	  <th class="mandatory"><span class="profileHeader">* </span></th>
	  <th class="profileHeader"> First Name:</th>
	  <td><input name="first_name" id="first_name" type="text" value="<?php echo $row->first_name; ?>"></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader"> Middle Name:</th>
		<td><input name="middle_name" id="middle_name" type="text" value="<?php echo $row->middle_name; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory"><span class="profileHeader">* </span></th>
		<th class="profileHeader">Last Name:</th>
		<td><input name="last_name" id="last_name" type="text" value="<?php echo $row->last_name; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory"><span class="profileHeader">* </span></th>
		<th class="profileHeader">DOB:</th>
		<td><input name="dob" id="dob" class="tcal" type="text" value="<?php echo $dob[1]."/".$dob[2]."/".$dob[0];?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Company:</th>
		<td><input name="company" id="company" type="text" value="<?php echo $row->company; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory" valign="top">&nbsp;</th>
		<th class="profileHeader" valign="top">Address Line1:</th>
		<td><input name="address" id="address" maxlength="50" type="text" value="<?php echo $row->address1; ?>">
			<span>Street Address, P.O. box</span>
		</td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Address Line2:</th>
		<td><input name="address2" id="address2" maxlength="50" type="text" value="<?php echo $row->address2; ?>">
			<span>Apartment, suite, unit, building, floor, etc.</span>
		</td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Country:</th>
		<td><input name="country" id="country" type="text" value="<?php echo $row->country_name; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">State:</th>
		<td><input name="state" id="state" type="text" value="<?php echo $row->state_name; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">City:</th>
		<td><input name="city" id="city" type="text" value="<?php echo $row->city_name; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Zipcode:</th>
		<td><input name="zip" type="text" value="<?php echo $row->zip; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Phone:</th>
		<td><input name="phone" type="text" value="<?php echo $row->contact_no; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
		<th class="profileHeader">Fax:</th>
		<td><input name="fax" type="text" value="<?php echo $row->fax_no; ?>"></td>
	</tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory"><span class="profileHeader">* </span></th>
		<th class="profileHeader"> E-mail:</th>
		<td><input name="email" id="email" type="text" value="<?php echo $row->email; ?>"></td>
	</tr>
	<tr>
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">&nbsp;</th>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
       <th colspan="5" bgcolor="#b8d1dd"><div id="bigFont">Calculation Basics</div></th>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Currency</th>
	  <td><select name="currency">
      <option value="INR" <?php if($row->currency=="INR"){?> selected="selected" <?php }?>>INR</option>
      <option value="USD" <?php if($row->currency=="USD"){?> selected="selected" <?php }?>>USD</option>
      </select>
      </td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Weight Per Portion</th>
	  <td><input name="weight_per_portion" id="weight_per_portion" type="text" value="<?php echo $row->weight_per_portion; ?>" /></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Food Loss(%)</th>
	  <td><input name="food_loss" id="food_loss" type="text" value="<?php echo $row->food_loss; ?>" /></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory"><span class="profileHeader">* </span></th>
	  <th class="profileHeader"> Profit Amount(%):</th>
	  <td><input name="profit" id="profit" type="text" value="<?php echo $row->profit; ?>"></td>
	  </tr>
	<tr bgcolor="#dfecf4">
	  <th class="mandatory">&nbsp;</th>
	  <th class="profileHeader">Photo</th>
	  <td><input type="file" name="userfile" id="userfile"  />
      <input type="hidden" id="T3" name="T3" size="20" value="<?php echo $row->photo;?>" />
    	                          <?php if($row->photo != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->photo;?>" width="120" height="100" />
    	                          <?php } ?></td>
	  </tr>
      <tr bgcolor="#dfecf4"><td></td>
      		<td colspan="3"><input type="submit" name="continue" value="Update Info" id="continue" class="button calcipeButton"  /></td>
       </tr>
</tbody></form></table>
			
            </div>
		<br /><br />
			</div>
			
		</div>
		
			<!--cachemarkerBannerBottom-->
			<div class="advertisement advertisement-bottom"></div>			
		<!--cachemarkerBannerBottom-->		
	</div>


		</div>
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Profile were Found.</h2>
	<?php endif; ?>
                </div></div>
						</div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                                       <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 

