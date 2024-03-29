<link href="<?php echo base_url();?>css/order.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
   	<div id="contentWrapper">
<div id="dashboard_style">
<?php if(isset($records)) : foreach($records as $row) : ?>     


<div class="content-wrapper">

	
	<div class="content content-full">
	
<div class="content-main">

			
		  <div id="formNewUser" class="isVisible">
		
						<div><?php echo $this->session->flashdata('message'); ?></div>
		  <form name="profile" id="profile" action="<?php echo base_url();?>index.php/member/update_profile" method="post" class="standardForm">
		    <table class="standardSIGNUPTable" align="center" border="0" cellpadding="2" cellspacing="2">
			  <tbody>						  
                        <tr>
						    <td colspan="2" class="errorMessage">
                            <?php echo $this->session->flashdata('registration_error'); ?>
 
							<?php echo validation_errors('<p class="errorMessage">'); ?>
</td>
					      </tr>
<tr>
							<th colspan="2" class="SIGNUPTable-title"><h2 class="standardSubTitle">Account Information <span>Please write down your e-mail and password for future reference.</span></h2></th>
						</tr>
						  <tr>
							<th>* E-mail:</th>
							<td>
								<input name="username" type="text" id="username" value="<?php echo $row->username; ?>" maxlength="80" readonly="readonly">
								<span>E-mail must be a valid e-mail between 4 and 80 characters with no spaces.</span>
							  <div id="checkUsername">&nbsp;</div>
							</td>
						</tr>
						<tr>
							<th>* Password:</th>
							<td>
								<input name="password" id="password" maxlength="50" class="input-form-account" type="password" value="<?php echo $row->password; ?>">
																<span>Password must be between 4 and 50 characters with no spaces.</span>
							</td>
						</tr>
						<tr>
							<th>* Retype Password:</th>
							<td><input name="retype_password" id="retype_password" class="input-form-account" type="password" value="<?php echo $row->password; ?>"></td>
						</tr>
						<tr>
							<th colspan="2" class="SIGNUPTable-title">&nbsp;</th>
						</tr>
					</tbody></table>
		
					<table class="standardSIGNUPTable" align="center" border="0" cellpadding="2" cellspacing="2">
<tbody><tr>
							<th class="SIGNUPTable-title" colspan="2">
								<h2 class="standardSubTitle">Billing Information<span>(This information will not be displayed publicly. You will configure your Profile after register.)</span></h2>
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
</tbody></table>
<div id="check_out_payment" class="isVisible">
<p class="standardButton checkoutButton"><input type="submit" name="continue" value="Update" id="continue" class="button"  />
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

</div></div>
