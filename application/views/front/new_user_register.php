<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title>:::.Welcome to CalCipe.:::</title>
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/base/jquery.ui.all.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker/calander.css" type="text/css">
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/js_function.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider();
});
</script>
<script type="text/javascript">
$(function() {
	$( "#txt_dateofbirth" ).datepicker();
});
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	//for Popup window
	$('a[rel*=facebox]').facebox({
	loadingImage : 'images/loading.gif',
	closeImage   : 'images/close.png'
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
    <div id="site_main_header">
    	<div id="site_main_header_layout">
            <div class="slider-wrapper theme-default">
                <div class="ribbon"></div>
                <div id="slider" class="nivoSlider">
                    <img src="images/001.jpg" alt="Calcipe Banner No1" border="0" />
                    <img src="images/002.jpg" alt="Calcipe Banner No2" border="0" />
                    <img src="images/003.jpg" alt="Calcipe Banner No3" border="0" />
                    <img src="images/004.jpg" alt="Calcipe Banner No4" border="0" />
                    <img src="images/005.jpg" alt="Calcipe Banner No5" border="0" />
                </div>
           </div>
        </div>
    </div>
    <!--End site header Part-->
    
    <!--Start site main content wrapper-->
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div id="new_user_header"><span>Setup your New Account</span></div>
         <div class="break"></div>
         <div id="register_table">
         <form id="userRegister" name="userRegister" action="new_user_register.php" method="post">
            <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
              <tr>
                <td width="55%" class="register_header"><span>Step 1: </span>Account Informations </td>
                <td width="45%" align="right" class="register_header"><span id="mandatory">*</span> are <em>Mandatory fields</em></td>
              </tr>
              <tr>
                <td height="2" colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="33%">Username <span id="mandatory">*</span></td>
                    <td width="31%"><input class="user_text" type="text" name="txt_username" id="txt_username" value="" />
                    <div id="usernamesatus" style="display:none;">Username needs Alphabets, Numbers and Underscore('_').</div>
                    <div id="registerErr" style="display:none;">Enter your Username here</div>
                   </td>
                    <td width="36%" style="font-size:9px; text-align:right;">Username can only have Letters, Numbers and Underscores</td>
                  </tr>
                  <tr>
                    <td height="3" colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Password <span id="mandatory">*</span></td>
                    <td colspan="2"><input class="user_text" type="password" name="txt_password" id="txt_password" />
                    <div id="registerpErr" style="display:none;">Enter Your Password here</div>
                    <div id="passChar" style="display:none;">Password supports Alphabets, numbers and special Characters</div>
                    <div id="passlimit" style="display:none;">Password should be atleast 6 Character.</div></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Confirm Password <span id="mandatory">*</span></td>
                    <td colspan="2"><input class="user_text" type="password" name="txt_confirm_password" id="txt_confirm_password" />
                    <div id="registercErr" style="display:none;">Enter Your Password here</div>
                    <div id="passNotmatch" style="display:none;">Password doesn't Match</div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="register_header"><span>Step 2: </span>Personal Informations</td>
              </tr>
              <tr>
                <td height="2" colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="33%">First Name <span id="mandatory">*</span></td>
                    <td width="67%"><input class="user_text" type="text" name="txt_firstname" id="txt_firstname" />
                    <div id="firstName" style="display:none;">Enter your First Name here</div></td>
                  </tr>
                  <tr>
                   <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Last Name</td>
                    <td><input class="user_text" type="text" name="txt_lastname" id="txt_lastname" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Gender <span id="mandatory">*</span></td>
                    <td align="left">
                        <input type="radio" name="select_gender" value="Male" id="select_gender" />Male
                        <input type="radio" name="select_gender" value="Female" id="select_gender" />Female
                        <div id="gender" style="display:none;">Please Select your Gender</div>
                    </td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td><input class="user_text" type="text" name="txt_dateofbirth" id="txt_dateofbirth" readonly="readonly" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Company Name</td>
                    <td><input class="user_text" type="text" name="txt_companyName" id="txt_companyName" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Mobile No <span id="mandatory">*</span></td>
                    <td><input class="user_text" type="text" name="txt_mobileno" id="txt_mobileno" />
                    <div id="mobileNo" style="display:none;">Enter your Mobile No. here</div>
                    <div id="incorrectNo" style="display:none;">Enter Porper Format Mobile No. like +91-99999-88888</div></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Fax No</td>
                    <td><input class="user_text" type="text" name="txt_faxNo" id="txt_faxNo" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>e-Mail id <span id="mandatory">*</span></td>
                    <td><input class="user_text" type="text" name="txt_emailid" id="txt_emailid" />
                    <div id="emailId" style="display:none;">Enter your e-Mail id here</div>
                    <div id="incorrectemail" style="display:none;">Enter Porper Format e-Mail like yourname@yourdomain.com</div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="register_header"><span>Step 3: </span>Contact Informations</td>
              </tr>
              <tr>
                <td height="2" colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="33%">Address Line No1 <span id="mandatory">*</span></td>
                    <td width="67%"><input name="txt_address" type="text" class="user_text" id="txt_address" value="" />
                    <div id="address" style="display:none;">Enter Your Address here</div></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td width="33%">Address Line No2 </td>
                    <td width="67%"><input name="txt_address2" type="text" class="user_text" id="txt_address2" value="" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td width="33%">City </td>
                    <td width="67%"><input name="txt_city" type="text" class="user_text" id="txt_city" value="" /></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>State <span id="mandatory">*</span></td>
                    <td><select class="user_text" name="select_state" id="select_state" onchange="selectState(this.value)">
                      <option selected="selected" value="">Select State</option>
                      <option value="TN">Tanil Nadu</option>
                      <option value="KAR">Karnataka</option>
                      <option value="KL">Kerala</option>
                      <option value="DL">Delhi</option>
                      <option value="Go">Goa</option>
                      <option value="AS">Assam</option>
                      <option value="MH">Maharastera</option>
                    </select>
                    <div id="state" style="display:none;">Select Your State</div></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Country <span id="mandatory">*</span></td>
                    <td><select class="user_text" name="select_country" id="select_country" onchange="selectState(this.value)">
                      <option selected="selected" value="">Select Country</option>
                      <option value="IND">India</option>
                      <option value="PK">Pakstian</option>
                      <option value="SL">Sri Lankha</option>
                      <option value="AUS">Australia</option>
                      <option value="US">United States</option>
                      <option value="UK">United Kingdom</option>
                    </select>
                     <div id="country" style="display:none;">Select Your Country</div></td>
                  </tr>
                  <tr>
                    <td height="3" colspan="2"></td>
                  </tr>
                  <tr>
                    <td>Pincode </td>
                    <td><input class="user_text" type="text" name="txt_pincode" id="txt_pincode" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="register_header"><span>Step 4: </span>Other Informations</td>
              </tr>
              <tr>
                <td colspan="2"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="33%">Profit Amount(%) <span id="mandatory">*</span></td>
                    <td width="67%">
                    <input class="user_text" type="text" name="txt_profitAmount" id="txt_profitAmount" />
                    <div id="profitAmountt" style="display:none">Enter Your Profit Amount</div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" class="register_header"><span>Step 5: </span>Payment Mode</td>
              </tr>
              <tr>
                <td colspan="2" align="center"><table width="96%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <td width="33%">Select Your Payment Mode <span id="mandatory">*</span></td>
                    <td width="67%"><input type="radio" name="select_payment_mode" value="payment_credit" id="select_payment_mode" />
                    By Credit Card
                      <input type="radio" name="select_payment_mode" value="payment_paypal" id="select_payment_mode" />
                    By PayPal
                    <input type="radio" name="select_payment_mode" value="payment_mail" id="select_payment_mode" />
                    Print Invoice and Mail a Check
                    <div id="payment" style="display:none">Select Your Payment Mode</div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                <input class="signup_button" id="signup_now" name="signup_now" type="submit" value="" onclick="return user_validations();" />
                </td>
              </tr>
            </table>
         </form>
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
