<?php
$chars = '0123456789abcdefghjkmnoprstvwxyz';

$Order_Id  = '';
// Generate code
for ($i = 0; $i < 12; ++$i)
{
$Order_Id .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
}

$Merchant_Id = "M_gun20151_20151";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
$Amount = $currency_amount;//your script should substitute the amount in the quotes provided here
//$Order_Id ="orderid";//your script should substitute the order description in the quotes provided here
$WorkingKey = "juni7rk6ush3dgk38j";//Given to merchant by ccavenue
$Redirect_Url ="http://www.calcipe.com/index.php/home/ccavenue_confirm";
$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); // Validate All value
//$Merchant_Id = "your_merchantid";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
//$Amount = "amount";//your script should substitute the amount in the quotes provided here
//$Order_Id ="orderid";//your script should substitute the order description in the quotes provided here
//$WorkingKey = "working_key";//Given to merchant by ccavenue
//$Redirect_Url ="www.calcipe.com/index.php/home/ccavenue_confirm";
//$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); // Validate All value
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
         <div class="break"></div>
         <div id="content_inner_wrapper">
<!--			coming soon  --->
<!--Start Site Contant Wrapper-->
<div id="main_login_wraper">

<div id="background">
  <!--.header-->
<link href="Donations%20via%20CCAvenue%20_%20Latika%20Roy%20Foundation_files/ipg_ccavenue.css" rel="stylesheet" type="text/css">
<link href="Donations%20via%20CCAvenue%20_%20Latika%20Roy%20Foundation_files/css_005.css" rel="stylesheet" type="text/css">
<link href="Donations%20via%20CCAvenue%20_%20Latika%20Roy%20Foundation_files/css_002.css" rel="stylesheet" type="text/css">






<!-- To generate a unique id for each donation -->

<!-- Get server time stamp in human readable form and not a Linux timestamp -->



<div id="pmaincc">
<div id="pleftcc" class="bubbleInfo">
			<!-- Begin CCAvenue form -->
			<form action="https://www.ccavenue.com/shopzone/cc_details.jsp" method="post">
						<input name="Order_Id" value="<?php echo $Order_Id; ?>" type="hidden">
						<input name="Merchant_Id" value="<?php echo $Merchant_Id; ?>" type="hidden">
								 
						<input name="billing_cust_notes" value="" type="hidden">
					 
						
			<fieldset>
			<legend>Secure Online Donations via CCAvenue </legend>
			<ul style="margin-top:20px;">
						<li><label for="name">Name</label><input name="billing_cust_name" type="text"></li>
						<li><label for="address">Address</label><input name="billing_cust_address" type="text"></li>
						<li><label for="city">City</label><input name="billing_cust_city" type="text"></li>
						<li><label for="state">State/Province</label><input name="billing_cust_state" type="text"></li>
						<li><label for="zip">Zip Code</label><input name="billing_zip_code" type="text"></li>
						<li><label for="country">Country</label><select name="billing_cust_country" size="1">
											  <option selected="selected" value="">Select a Country</option>
											  <option value="Afghanistan">Afghanistan</option>
											  <option value="Albania">Albania</option>
											  <option value="Algeria">Algeria</option>
											  <option value="American Samoa">American Samoa</option>
											  <option value="Andorra">Andorra</option>
											  <option value="Angola">Angola</option>
											  <option value="Anguilla">Anguilla</option>
											  <option value="Antigua And Barbuda">Antigua And Barbuda</option>
											  <option value="Argentina">Argentina</option>
											  <option value="Armenia">Armenia</option>
											  <option value="Aruba">Aruba</option>
											  <option value="Australia">Australia</option>
											  <option value="Austria">Austria</option>
											  <option value="Azerbaijan">Azerbaijan</option>
											  <option value="Bahamas, The">Bahamas, The</option>
											  <option value="Bahrain">Bahrain</option>
											  <option value="Bangladesh">Bangladesh</option>
											  <option value="Barbados">Barbados</option>
											  <option value="Belarus">Belarus</option>
											  <option value="Belgium">Belgium</option>
											  <option value="Belize">Belize</option>
											  <option value="Benin">Benin</option>
											  <option value="Bermuda">Bermuda</option>
											  <option value="Bhutan">Bhutan</option>
											  <option value="Bolivia">Bolivia</option>
											  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
											  <option value="Botswana">Botswana</option>
											  <option value="Brazil">Brazil</option>
											  <option value="British Virgin Islands">British Virgin Islands</option>
											  <option value="Brunei">Brunei</option>
											  <option value="Bulgaria">Bulgaria</option>
											  <option value="Burkina Faso">Burkina Faso</option>
											  <option value="Burma">Burma</option>
											  <option value="Burundi">Burundi</option>
											  <option value="Cambodia">Cambodia</option>
											  <option value="Cameroon">Cameroon</option>
											  <option value="Canada">Canada</option>
											  <option value="Cape Verde">Cape Verde</option>
											  <option value="Cayman Islands">Cayman Islands</option>
											  <option value="Central African Republic">Central African Republic</option>
											  <option value="Chad">Chad</option>
											  <option value="Chile">Chile</option>
											  <option value="China">China</option>
											  <option value="Christmas Island">Christmas Island</option>
											  <option value="Colombia">Colombia</option>
											  <option value="Comoros">Comoros</option>
											  <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
											  <option value="Congo, Republic of the">Congo, Republic of the</option>
											  <option value="Cook Islands">Cook Islands</option>
											  <option value="Costa Rica">Costa Rica</option>
											  <option value="Cote D'Ivoire">Cote D'Ivoire</option>
											  <option value="Croatia">Croatia</option>
											  <option value="Cuba">Cuba</option>
											  <option value="Cyprus">Cyprus</option>
											  <option value="Czech Republic">Czech Republic</option>
											  <option value="Denmark">Denmark</option>
											  <option value="Djibouti">Djibouti</option>
											  <option value="Dominica">Dominica</option>
											  <option value="Dominican Republic">Dominican Republic</option>
											  <option value="East Timor">East Timor</option>
											  <option value="Ecuador">Ecuador</option>
											  <option value="Egypt">Egypt</option>
											  <option value="El Salvador">El Salvador</option>
											  <option value="Equatorial Guinea">Equatorial Guinea</option>
											  <option value="Eritrea">Eritrea</option>
											  <option value="Estonia">Estonia</option>
											  <option value="Ethiopia">Ethiopia</option>
											  <option value="Falkland Islands">Falkland Islands</option>
											  <option value="Faroe Islands">Faroe Islands</option>
											  <option value="Fiji">Fiji</option>
											  <option value="Finland">Finland</option>
											  <option value="France">France</option>
											  <option value="French Guiana">French Guiana</option>
											  <option value="French Polynesia">French Polynesia</option>
											  <option value="Gabon">Gabon</option>
											  <option value="Gambia, The">Gambia, The</option>
											  <option value="Georgia">Georgia</option>
											  <option value="Germany">Germany</option>
											  <option value="Ghana">Ghana</option>
											  <option value="Gibraltar">Gibraltar</option>
											  <option value="Greece">Greece</option>
											  <option value="Greenland">Greenland</option>
											  <option value="Grenada">Grenada</option>
											  <option value="Guadeloupe">Guadeloupe</option>
											  <option value="Guam">Guam</option>
											  <option value="Guatemala">Guatemala</option>
											  <option value="Guinea">Guinea</option>
											  <option value="Guinea-Bissau">Guinea-Bissau</option>
											  <option value="Guyana">Guyana</option>
											  <option value="Haiti">Haiti</option>
											  <option value="Honduras">Honduras</option>
											  <option value="Hungary">Hungary</option>
											  <option value="Iceland">Iceland</option>
											  <option value="India">India</option>
											  <option value="Indonesia">Indonesia</option>
											  <option value="Iran">Iran</option>
											  <option value="Iraq">Iraq</option>
											  <option value="Ireland">Ireland</option>
											  <option value="Israel">Israel</option>
											  <option value="Italy">Italy</option>
											  <option value="Jamaica">Jamaica</option>
											  <option value="Japan">Japan</option>
											  <option value="Jordan">Jordan</option>
											  <option value="Kazakhstan">Kazakhstan</option>
											  <option value="Kenya">Kenya</option>
											  <option value="Kiribati">Kiribati</option>
											  <option value="Korea, North">Korea, North</option>
											  <option value="Korea, South">Korea, South</option>
											  <option value="Kuwait">Kuwait</option>
											  <option value="Kyrgyzstan">Kyrgyzstan</option>
											  <option value="Laos">Laos</option>
											  <option value="Latvia">Latvia</option>
											  <option value="Lebanon">Lebanon</option>
											  <option value="Lesotho">Lesotho</option>
											  <option value="Liberia">Liberia</option>
											  <option value="Libya">Libya</option>
											  <option value="Liechtenstein">Liechtenstein</option>
											  <option value="Lithuania">Lithuania</option>
											  <option value="Luxembourg">Luxembourg</option>
											  <option value="Macau">Macau</option>
											  <option value="Macedonia">Macedonia</option>
											  <option value="Madagascar">Madagascar</option>
											  <option value="Malawi">Malawi</option>
											  <option value="Malaysia">Malaysia</option>
											  <option value="Maldives">Maldives</option>
											  <option value="Mali">Mali</option>
											  <option value="Malta">Malta</option>
											  <option value="Marshall Islands">Marshall Islands</option>
											  <option value="Martinique">Martinique</option>
											  <option value="Mauritania">Mauritania</option>
											  <option value="Mauritius">Mauritius</option>
											  <option value="Mayotte">Mayotte</option>
											  <option value="Mexico">Mexico</option>
											  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
											  <option value="Moldova">Moldova</option>
											  <option value="Monaco">Monaco</option>
											  <option value="Mongolia">Mongolia</option>
											  <option value="Montserrat">Montserrat</option>
											  <option value="Morocco">Morocco</option>
											  <option value="Mozambique">Mozambique</option>
											  <option value="Namibia">Namibia</option>
											  <option value="Nauru">Nauru</option>
											  <option value="Nepal">Nepal</option>
											  <option value="Netherlands">Netherlands</option>
											  <option value="Netherlands Antilles">Netherlands Antilles</option>
											  <option value="New Caledonia">New Caledonia</option>
											  <option value="New Zealand">New Zealand</option>
											  <option value="Nicaragua">Nicaragua</option>
											  <option value="Niger">Niger</option>
											  <option value="Nigeria">Nigeria</option>
											  <option value="Niue">Niue</option>
											  <option value="Norfolk Island">Norfolk Island</option>
											  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
											  <option value="Norway">Norway</option>
											  <option value="Oman">Oman</option>
											  <option value="Pakistan">Pakistan</option>
											  <option value="Palau">Palau</option>
											  <option value="Panama">Panama</option>
											  <option value="Papua new Guinea">Papua new Guinea</option>
											  <option value="Paraguay">Paraguay</option>
											  <option value="Peru">Peru</option>
											  <option value="Philippines">Philippines</option>
											  <option value="Pitcairn Island">Pitcairn Island</option>
											  <option value="Poland">Poland</option>
											  <option value="Portugal">Portugal</option>
											  <option value="Puerto Rico">Puerto Rico</option>
											  <option value="Qatar">Qatar</option>
											  <option value="Reunion">Reunion</option>
											  <option value="Romania">Romania</option>
											  <option value="Russia">Russia</option>
											  <option value="Rwanda">Rwanda</option>
											  <option value="Saint Helena">Saint Helena</option>
											  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
											  <option value="Saint Lucia">Saint Lucia</option>
											  <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
											  <option value="Samoa">Samoa</option>
											  <option value="San Marino">San Marino</option>
											  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
											  <option value="Saudi Arabia">Saudi Arabia</option>
											  <option value="Senegal">Senegal</option>
											  <option value="Serbia and Montenegro">Serbia and Montenegro</option>
											  <option value="Seychelles">Seychelles</option>
											  <option value="Sierra Leone">Sierra Leone</option>
											  <option value="Singapore">Singapore</option>
											  <option value="Slovakia">Slovakia</option>
											  <option value="Slovenia">Slovenia</option>
											  <option value="Solomon Islands">Solomon Islands</option>
											  <option value="Somalia">Somalia</option>
											  <option value="South Africa">South Africa</option>
											  <option value="Spain">Spain</option>
											  <option value="Sri Lanka">Sri Lanka</option>
											  <option value="Sudan">Sudan</option>
											  <option value="Suriname">Suriname</option>
											  <option value="Swaziland">Swaziland</option>
											  <option value="Sweden">Sweden</option>
											  <option value="Switzerland">Switzerland</option>
											  <option value="Syria">Syria</option>
											  <option value="Taiwan">Taiwan</option>
											  <option value="Tajikistan">Tajikistan</option>
											  <option value="Tanzania">Tanzania</option>
											  <option value="Thailand">Thailand</option>
											  <option value="Togo">Togo</option>
											  <option value="Tokelau">Tokelau</option>
											  <option value="Tonga">Tonga</option>
											  <option value="Trinidad And Tobago">Trinidad And Tobago</option>
											  <option value="Tunisia">Tunisia</option>
											  <option value="Turkey">Turkey</option>
											  <option value="Turkmenistan">Turkmenistan</option>
											  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
											  <option value="Tuvalu">Tuvalu</option>
											  <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
											  <option value="Uganda">Uganda</option>
											  <option value="Ukraine">Ukraine</option>
											  <option value="United Arab Emirates">United Arab Emirates</option>
											  <option value="United Kingdom">United Kingdom</option>
											  <option value="United States">United States</option>
											  <option value="Uruguay">Uruguay</option>
											  <option value="Uzbekistan">Uzbekistan</option>
											  <option value="Vanuatu">Vanuatu</option>
											  <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
											  <option value="Venezuela">Venezuela</option>
											  <option value="Vietnam">Vietnam</option>
											  <option value="West Bank">West Bank</option>
											  <option value="Western Sahara">Western Sahara</option>
											  <option value="Yemen">Yemen</option>
											  <option value="Yugoslavia, Federal Repubic Of">Yugoslavia, Federal Repubic Of</option>
											  <option value="Zambia">Zambia</option>
											  <option value="Zimbabwe">Zimbabwe</option>
										  </select>	</li>
						<li><label for="email">E-mail</label><input name="billing_cust_email" type="text"></li>
						<li><label for="phone">Phone number</label><input name="billing_cust_tel" type="text"></li>
						<li><label for="amount">Amount (INR)* <!--<a class="tooltip" href="#">?<span class="classic">Please enter the amount in Indian Rupees only.</span></a>--></label><input name="Amount" type="text"></li>
						<li><input class="ss button l grey-matte" src="Donations%20via%20CCAvenue%20_%20Latika%20Roy%20Foundation_files/a.htm" value="Donate" size="30" maxlength="20" type="submit"></li>
					  
				  </ul>
						<span class="popup">
    * Entered amount is in Indian Rupees and numeric only. Convert your preferred currency to Indian Rupees - <a href="http://www.xe.com/ucc/" title="convert your preferred currency" target="_blank">click here.</a>
  </span>
			</fieldset>
			</form>
			</div><!-- End CCAvenue Form -->



			
			
<div id="prightcc">



<p><strong>We are accredited with Give India</strong><br>

<img src="Donations%20via%20CCAvenue%20_%20Latika%20Roy%20Foundation_files/gi-logo.JPG" alt="give india logo" style="float: left; padding: 5px 10px 10px 1px;">The Latika Roy Foundation also accepts donations via  <a href="http://giveindia.org/" title="vistt the Give India website">Give India</a>.<br>
If you would like to use Give India to make a donation, then please <a href="http://www.giveindia.org/m-1064-latika-roy-foundation.aspx" title="make a donation via Give India">click here.</a>


</p>
<p style="clear:both;"><strong>What happens when I click Donate?</strong><br>

When you click on the Donate button, you will be directed to the 
CCAvenue Payment Gateway, where the transaction will be processed.



</p>
<p><strong>Is this transaction secure?</strong><br>

Yes. Each transaction uses the SSL protocol to encrypt and carry out transactions. 
<a href="http://www.verisign.com/ssl/ssl-information-center/how-ssl-security-works/">
Learn more about SSL</a>


</p>

<p><strong>Can I use debit cards/internet banking besides credit cards?</strong><br>

Yes. CCAvenue supports a number of platforms. Debit cards, major credit 
cards, internet banking services, cash cards and mobile payments are 
supported. 


</p>

<p><strong>Which cards can I use to pay&nbsp;?</strong><br>

<script language="JavaScript">
function openLogo(ClientID)
{
var attributes = 'toolbar=0,location=0,directories=0,status=0, menubar=0,scrollbars=1,resizable=1,width=550,height=600,left=0,top=0';
sealWin=window.open('http://www.ccavenue.com/verifySeal.jsp?ClientID='+ClientID ,'win',attributes);
self.name = 'mainWin';
}
</script>

</p><table border="0" cellpadding="0" cellspacing="0" width="125">
<tbody><tr>
<td valign="top" align="center">
<a href="javascript:openLogo('shopline2282')"><img src="/images/100.gif" border="0"></a>
</td>
</tr>
</tbody></table>

<a href="http://www.ccavenue.com/">Merchant Account</a>
<br>
<a href="http://www.ccavenue.com/content/credit_card_processing.jsp">Credit
Card Processing</a>
<br>
<a href="http://www.ccavenue.com/">Payment Gateway</a>
  
<p></p>
</div>
<div id="clearpcc">
</div>

</div>

				
				
	
			
</div>    <div style="height:20px; clear:both;"></div>
</div>
<!--End Site Contant Wrapper-->

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
