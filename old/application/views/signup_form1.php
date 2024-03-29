<?php $this->load->view('includes/signup_header'); ?>
<link href="<?php echo base_url();?>css/order.css" type="text/css" rel="stylesheet" media="all" />
<link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
   	<div id="contentWrapper">
<div id="dashboard_style">

<h1>Create an Account!</h1>

<div class="content-wrapper">

	
	<ul class="standardStep">
		<li class="standardStepAD">Easy and Fast. <span>3 Steps »</span></li>
		<li class="stepActived"><span>1</span>&nbsp;Order</li>
		<li><span>2</span>&nbsp;Check Out</li>
					<li><span>3</span>&nbsp;Configuration</li>
			</ul>
	
	<div class="content content-full">
	
<div class="content-main">

			
		  <div id="formNewUser" class="isVisible">
		
						
		  <form name="signup" id="signup" action="<?php echo base_url();?>index.php//home/create_member" method="post" class="standardForm">
		
<table class="orderTable" border="0" cellpadding="0" cellspacing="0">
				<tbody>
				  <tr>
					<th class="standardSubTitle">Select a level</th>
				</tr>
				<tr>
					<td>
						<table class="standardChooseLevel" align="center" border="0" cellpadding="2" cellspacing="2">
															<tbody><tr>
									<th>&nbsp;</th>
									<td colspan="2">&nbsp;</td>
								</tr>
																						<tr>
									<th>Bronze</th>
									<td>
										$FREE									</td>
									<th class="radioChooseLevel">
										<input name="level" type="radio" onclick="levelSwitch('70');" value="70" checked="checked">
									</th>
								</tr>
															<tr>
									<th>Silver</th>
									<td>
										$99.00 per month									</td>
									<th class="radioChooseLevel">
										<input name="level" value="50" onclick="levelSwitch('50');" type="radio" disabled="disabled">
									</th>
								</tr>
															<tr>
									<th>Gold</th>
									<td>
										$199.00 per month									</td>
									<th class="radioChooseLevel">
										<input name="level" value="30" onclick="levelSwitch('30');" type="radio" disabled="disabled">
									</th>
								</tr>
															<tr>
									<th>Diamond</th>
									<td>
										$299.00 per month									</td>
									<th class="radioChooseLevel">
										<input name="level" value="10" onclick="levelSwitch('10');" type="radio" disabled="disabled">
									</th>
								</tr>
																						<tr id="trTax" class="isVisible">
									<td id="taxInfo" colspan="2"><input type="hidden" name="total_amount" id="total_amount" value="0.00"  /></td>
									<th class="radioChooseLevel"></th>
								</tr>
													</tbody></table>
		
					</td>
				</tr>
			</tbody></table>		
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
								<input name="username" id="username" maxlength="80" type="text">
								<span>E-mail must be a valid e-mail between 4 and 80 characters with no spaces.</span>
								<div id="checkUsername">&nbsp;</div>
							</td>
						</tr>
						<tr>
							<th>* Password:</th>
							<td>
								<input name="password" id="password" maxlength="50" class="input-form-account" type="password">
																<span>Password must be between 4 and 50 characters with no spaces.</span>
							</td>
						</tr>
						<tr>
							<th>* Retype Password:</th>
							<td><input name="retype_password" id="retype_password" class="input-form-account" type="password"></td>
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
	  <td><input name="first_name" id="first_name" type="text"></td>
	  </tr>
	<tr>
		<th> Middle Name:</th>
		<td><input name="middle_name" id="middle_name" type="text"></td>
	</tr>
	<tr>
		<th>* Last Name:</th>
		<td><input name="last_name" id="last_name" type="text"></td>
	</tr>
	<tr>
		<th>Company:</th>
		<td><input name="company" id="company" type="text"></td>
	</tr>
	<tr>
		<th class="alignTop alignWithField" valign="top">Address Line1:</th>
		<td><input name="address" id="address" maxlength="50" type="text">
			<span>Street Address, P.O. box</span>
		</td>
	</tr>
	<tr>
		<th class="alignTop alignWithField">Address Line2:</th>
		<td><input name="address2" id="address2" maxlength="50" type="text">
			<span>Apartment, suite, unit, building, floor, etc.</span>
		</td>
	</tr>
	<tr>
		<th>Country:</th>
		<td><input name="country" id="country" type="text"></td>
	</tr>
	<tr>
		<th>State:</th>
		<td><input name="state" id="state" type="text"></td>
	</tr>
	<tr>
		<th>City:</th>
		<td><input name="city" id="city" type="text"></td>
	</tr>
	<tr>
		<th>Zipcode:</th>
		<td><input name="zip" type="text"></td>
	</tr>
	<tr>
		<th>Phone:</th>
		<td><input name="phone" type="text"></td>
	</tr>
	<tr>
		<th>Fax:</th>
		<td><input name="fax" type="text"></td>
	</tr>
	<tr>
		<th>* E-mail:</th>
		<td><input name="email" id="email" type="text"></td>
	</tr>
</tbody></table>
<div id="check_out_payment" class="isVisible">
<table class="standard-tableTOPBLUE">
																		    <tbody><tr>
			<th colspan="2">Payment Method</th>
		</tr>
		<tr>
			<td colspan="2">
				<table class="paymentMethods" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>

						
						
						
						
						
						
						
													<td width="10"><input style="border: 0px none;" name="payment_method" id="paypalapi" value="paypalapi" type="radio"></td>
							<td><b>By Credit Card</b></td>
						
													<td width="10"><input style="border: 0px none;" name="payment_method" id="paypal" value="paypal" type="radio"></td>
							<td><b>By PayPal</b></td>
						
						
													<td width="10"><input style="border: 0px none;" name="payment_method" id="invoice" value="invoice" type="radio"></td>
							<td><b>Print Invoice and Mail a Check</b></td>
						
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
								<p class="standardButton checkoutButton"><input type="button" name="continue" value="continue" id="continue" class="button"  />
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

</div></div>
<?php $this->load->view('includes/footer'); ?>