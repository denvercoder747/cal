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

    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <!-- slide show -->
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <!--
      jCarousel library
    -->
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript">
    
    jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel();
    });
    
    </script>
	<!-- end of slide -->
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
</head>
<body onload="ref();">
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
<?php if(isset($records)) : foreach($records as $row) : ?>     


<div class="content-wrapper">

	
	<div class="content content-full">
	
<div class="content-main">

			
		  <div id="formNewUser" class="isVisible">
		
						<div><?php echo $this->session->flashdata('message'); ?></div>
          <form name="profilePass" id="profilePass" action="<?php echo base_url();?>index.php/member/update_password" method="post" class="standardForm">
            <table class="standardSIGNUPTable" align="center" border="0" cellpadding="2" cellspacing="2">
            <tbody>						  
                <tr>
                    <td colspan="2" class="errorMessage">
                    <?php echo $this->session->flashdata('registration_error'); ?>
                    
                    <?php echo validation_errors('<p class="errorMessage">'); ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="2" class="SIGNUPTable-title"><h2 class="standardSubTitle">Account Information</h2></th>
                </tr>
                <tr>
                    <th> E-mail:</th>
                    <td>
                    <input name="username" type="text" id="username" value="<?php echo $row->username; ?>" maxlength="80" readonly="readonly">
                    <span>E-mail must be a valid e-mail between 4 and 80 characters with no spaces.</span>
                    <div id="checkUsername">&nbsp;</div>
                    </td>
                </tr>
                <tr>
                    <th>* Old Password:</th>
                    <td>
                    <input name="old_password" id="old_password" maxlength="50" class="input-form-account" type="password" value="">
                    <span>Password must be between 4 and 50 characters with no spaces.</span>
                    </td>
                </tr>
                <tr>
                    <th>* Password:</th>
                    <td>
                    <input name="password" id="password" maxlength="50" class="input-form-account" type="password" value="">
                    <span>Password must be between 4 and 50 characters with no spaces.</span>
                    </td>
                </tr>
                <tr>
                    <th>* Retype Password:</th>
                    <td><input name="retype_password" id="retype_password" class="input-form-account" type="password" value=""></td>
                </tr>
            </tbody></table>  <div id="check_out_payment" class="isVisible">
<p class="standardButton checkoutButton"><input type="submit" name="update_pass" value="Update" id="update_pass" class="button"  />
				</p>
			</div>    
            </form>    
    <form name="profile" id="profile" action="<?php echo base_url();?>index.php/member/update_profile" method="post" enctype="multipart/form-data" class="standardForm">
		    
		
					<table class="standardSIGNUPTable" align="center" border="0" cellpadding="2" cellspacing="2">
<tbody><tr>
							<th class="SIGNUPTable-title" colspan="2">
								<h2 class="standardSubTitle">Billing Information</h2>
							</th>
						</tr>
			</tbody></table>
					
							
					
<table id="contact_info" class="standard-table standard-table-dash standardSIGNUPTable noBdTop nomargin" border="0" cellpadding="2" cellspacing="0">

	    	    <tbody><tr>
		    <th class="alignTop alignWithField">* Language:</th>
		    <td>
			    <select name="lang" id="lang"><option selected="selected" value="en_us">English</option><option value="pt_br">Português</option><option value="es_es">Español</option><option value="it_it">Italiano</option></select>			    <span>Select your main language to contact (when necessary).</span>
		    </td>
	    </tr>
        
	<tr>
	  <th>* First Name:</th>
	  <td><input name="first_name" id="first_name" type="text" value="<?php echo $row->first_name; ?>"></td>
	  </tr>
	<tr>
		<th> Middle Name:</th>
		<td><input name="middle_name" id="middle_name" type="text" value="<?php echo $row->middle_name; ?>"></td>
	</tr>
	<tr>
		<th>* Last Name:</th>
		<td><input name="last_name" id="last_name" type="text" value="<?php echo $row->last_name; ?>"></td>
	</tr>
	<tr>
		<th>Company:</th>
		<td><input name="company" id="company" type="text" value="<?php echo $row->company; ?>"></td>
	</tr>
	<tr>
		<th class="alignTop alignWithField" valign="top">Address Line1:</th>
		<td><input name="address" id="address" maxlength="50" type="text" value="<?php echo $row->address1; ?>">
			<span>Street Address, P.O. box</span>
		</td>
	</tr>
	<tr>
		<th class="alignTop alignWithField">Address Line2:</th>
		<td><input name="address2" id="address2" maxlength="50" type="text" value="<?php echo $row->address2; ?>">
			<span>Apartment, suite, unit, building, floor, etc.</span>
		</td>
	</tr>
	<tr>
		<th>Country:</th>
		<td><input name="country" id="country" type="text" value="<?php echo $row->country_name; ?>"></td>
	</tr>
	<tr>
		<th>State:</th>
		<td><input name="state" id="state" type="text" value="<?php echo $row->state_name; ?>"></td>
	</tr>
	<tr>
		<th>City:</th>
		<td><input name="city" id="city" type="text" value="<?php echo $row->city_name; ?>"></td>
	</tr>
	<tr>
		<th>Zipcode:</th>
		<td><input name="zip" type="text" value="<?php echo $row->zip; ?>"></td>
	</tr>
	<tr>
		<th>Phone:</th>
		<td><input name="phone" type="text" value="<?php echo $row->contact_no; ?>"></td>
	</tr>
	<tr>
		<th>Fax:</th>
		<td><input name="fax" type="text" value="<?php echo $row->fax_no; ?>"></td>
	</tr>
	<tr>
		<th>* E-mail:</th>
		<td><input name="email" id="email" type="text" value="<?php echo $row->email; ?>"></td>
	</tr>
	<tr>
	  <th>* Profit Amount(%):</th>
	  <td><input name="profit" id="profit" type="text" value="<?php echo $row->profit; ?>"></td>
	  </tr>
	<tr>
	  <th>Photo</th>
	  <td><input type="file" name="userfile" id="userfile"  />
      <input type="hidden" id="T3" name="T3" size="20" value="<?php echo $row->photo;?>" />
    	                          <?php if($row->photo != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->photo;?>" width="120" height="100" />
    	                          <?php } ?></td>
	  </tr>
</tbody></table>
<div id="check_out_payment" class="isVisible">
<p class="standardButton checkoutButton"><input type="submit" name="continue" value="Update Info" id="continue" class="button"  />
								</p>
			</div>
													
		
			</form>
		
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
                </div>
                    </div>
                   <!--  Right Side bar Informations -->
                                       <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 

