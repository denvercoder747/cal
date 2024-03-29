<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<title>:::.Welcome to CalCipe.:::</title>

<link href="<?php echo base_url();?>css/calcipe_reg.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>css/userRegister.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/tcal.css" />
	<script type="text/javascript" src="/js/tcal.js"></script> 
<!--  jquery core -->
<?php /*?><script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<?php */?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/js_function.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/sliding.form.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	//for Popup window
	$('a[rel*=facebox]').facebox({
	loadingImage : '/images/loading.gif',
	closeImage   : '/images/close.png'
	})
});
</script>
        <script type="text/javascript">
		function validateRegister(){
			var userName =  $('#username');
			var password =  $('#password');
			var retype_password =  $('#retype_password');
			var first_name =  $('#first_name');
			var last_name =  $('#last_name');
			var email =  $('#email');
			var reg_val =  $('#reg_val');
			$('#username').css({ 'border': '1px solid #AAAAAA'});
			$('#password').css({ 'border': '1px solid #AAAAAA'});
			$('#retype_password').css({ 'border': '1px solid #AAAAAA'});
			$('#first_name').css({ 'border': '1px solid #AAAAAA'});
			$('#last_name').css({ 'border': '1px solid #AAAAAA'});
			$('#email').css({ 'border': '1px solid #AAAAAA'});

			//var payment_method =  $('#payment_method');
			var error="";
			var errbox1="";
			var errbox2="";
			var errbox5="";
			var patt = /^.+@.+[.].{2,}$/i;
			
			if(userName.val() == ""){
				document.getElementById('username').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(!patt.test(userName.val())) {
				document.getElementById('username').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
			} 		
			if(password.val() == ""){
				document.getElementById('password').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(retype_password.val() == ""){
				document.getElementById('retype_password').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(password.val()!=retype_password.val()){
				document.getElementById('retype_password').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(first_name.val() == ""){
				document.getElementById('first_name').style.border='1px solid #F00';
				error="valid";
				errbox2="valid";
//				validateStep1(2);
			}
			if(last_name.val() == ""){
				document.getElementById('last_name').style.border='1px solid #F00';
				error="valid";
				errbox2="valid";
//				validateStep1(2);
			}
			if(email.val() == ""){
				document.getElementById('email').style.border='1px solid #F00';
				error="valid";
				errbox2="valid";
	//			validateStep1(2);
			}
			if(reg_val.val() != 1){
				
				if($('input[name="payment_method"]:checked').length === 0) 
				{
					error="valid";
					errbox5="valid";
				} 
			}
			if(error=="valid")
			{
				if(errbox1=="valid")
				{
					validateStep1(1,'error');
				}
				else
				{
					validateStep1(1,'checked');
				}
				if(errbox2=="valid")
				{
					validateStep1(2,'error');
				}
				else
				{
					validateStep1(2,'checked');
				}
				if(errbox5=="valid")
				{
					validateStep1(5,'error');
				}
				else
				{
					validateStep1(5,'checked');
				}
				document.getElementById('err').style.display='block';
				return false;
			}
		}
		function validateStep1(step,hasError){
				var error = 1;
//				var hasError = true;
/*				$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
					var $this 		= $(this);
					var valueLength = jQuery.trim($this.val()).length;
					
					if(valueLength == ''){
						hasError = true;
						$this.css('background-color','#FFFFFF');
					}
					else
						$this.css('background-color','#0FF');	
				});
*/				var $link = $('#navigation li:nth-child(' + parseInt(step) + ') a');
				$link.parent().find('.error,.checked').remove();
				
				var valclass = 'checked';
				if(hasError=='error'){
					error = -1;
					valclass = 'error';
				}
				$('<span class="'+valclass+'"></span>').insertAfter($link);
				
				return error;
			}
	$(document).ready(function() { 
			var userName =  $('#username');
			var password =  $('#password');
			var retype_password =  $('#retype_password');
			var first_name =  $('#first_name');
			var last_name =  $('#last_name');
			var email =  $('#email');
			var reg_val =  $('#reg_val');
			$('#username').css({ 'border': '1px solid #AAAAAA'});
			$('#password').css({ 'border': '1px solid #AAAAAA'});
			$('#retype_password').css({ 'border': '1px solid #AAAAAA'});
			$('#first_name').css({ 'border': '1px solid #AAAAAA'});
			$('#last_name').css({ 'border': '1px solid #AAAAAA'});
			$('#email').css({ 'border': '1px solid #AAAAAA'});

			//var payment_method =  $('#payment_method');
			var error="";
			var errbox1="";
			var errbox2="";
			var errbox5="";
			var msg="";
			var patt = /^.+@.+[.].{2,}$/i;
			
	$("#registerButton").click(function() {
			var error="";
			var errbox1="";
			var errbox2="";
			var errbox5="";
			var msg="";
			var patt = /^.+@.+[.].{2,}$/i;
					var username = $("#username").val();
	//				alert(username)
				var link = "/index.php/home";
					 $.post(link + "/check_user", { user_name: username, ajax: '1' },
  			function(data){
//				alert(jQuery.trim(data22).length);
  			if($.trim(data) == 'yes'){
				document.getElementById('username').style.border='1px solid #F00';
				alert('User Name Already Exists !!')
				return false;
//				$("#username").css({ 'background-color': 'brown'});

    		}else{
				document.getElementById('username').style.border='1px solid #AAAAAA';
    		}	

			if(userName.val() == ""){
				document.getElementById('username').style.border='1px solid #F00';
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(!patt.test(userName.val())) {
				document.getElementById('username').style.border='1px solid #F00';
				msg+="User Name Should be a Valid Email\r\n"
				error="valid";
				errbox1="valid";
			} 		
			if(password.val() == ""){
				document.getElementById('password').style.border='1px solid #F00';
				msg+="Password Should not be Blank\r\n"
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(retype_password.val() == ""){
				document.getElementById('retype_password').style.border='1px solid #F00';
				msg+="Retype Password Should not be blank\r\n"
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(password.val()!=retype_password.val()){
				document.getElementById('retype_password').style.border='1px solid #F00';
				msg+="Password dont match\r\n"
				error="valid";
				errbox1="valid";
//				validateStep1(1);
			}
			if(first_name.val() == ""){
				document.getElementById('first_name').style.border='1px solid #F00';
				msg+="First Name Should not be Blank\r\n"
				error="valid";
				msg+="Password dont match\r\n"
				errbox2="valid";
//				validateStep1(2);
			}
			if(last_name.val() == ""){
				document.getElementById('last_name').style.border='1px solid #F00';
				msg+="Last Name Should not be Blank\r\n"
				error="valid";
				errbox2="valid";
//				validateStep1(2);
			}
			if(!patt.test(email.val())){
				document.getElementById('email').style.border='1px solid #F00';
				msg+="Valid Email Should be Entered\r\n"
				error="valid";
				errbox2="valid";
	//			validateStep1(2);
			}
			if(reg_val.val() != 70){
				
				if($('input[name="payment_method"]:checked').length === 0) 
				{
				msg+="You Should Choose one payment method\r\n"
					error="valid";
					errbox5="valid";
				} 
			}
			if(error=="valid")
			{
				if(errbox1=="valid")
				{
					validateStep1(1,'error');
				}
				else
				{
					validateStep1(1,'checked');
				}
				if(errbox2=="valid")
				{
					validateStep1(2,'error');
				}
				else
				{
					validateStep1(2,'checked');
				}
				if(errbox5=="valid")
				{
					validateStep1(5,'error');
				}
				else
				{
					validateStep1(5,'checked');
				}
				document.getElementById('err').style.display='block';
				alert(msg);
				return false;
			}
			else
			{
				document.formElem.submit();
			}
 		 }); 
//
////		return false;

/*		$('body').append('<div id="emailInfo" class="info"></div>');
	
		var emailInfo = $('#emailInfo');
		var ele = $('#username');
		var pos = ele.offset();
		
		emailInfo.css({
			top: pos.top-3,
			left: pos.left+ele.width()+15
		});
		
		var patt = /^.+@.+[.].{2,}$/i;
		
		if(!patt.test(ele.val())) {
		//	jVal.errors = true;
				emailInfo.removeClass('correct').addClass('error').html('&larr; give me a valid email adress, ok?').show();
				ele.removeClass('normal').addClass('wrong');					
		} else {
				
					$('body').append('<div id="nameInfo1" class="info"></div>');
					
					var nameInfo = $('#nameInfo1');
					var ele = $('#username');
					var pos = ele.offset();
					
					nameInfo.css({
						top: pos.top-3,
						left: pos.left+ele.width()+15
					});
					///////////////
					var username = $("#username").val();
				var link = "/index.php/home";
					 $.post(link + "/check_user", { user_name: username, ajax: '1' },
						function(data){
						if(data == "true"){
						//jVal.errors = true;
							nameInfo.removeClass('correct').addClass('error').html('&larr; User Name Exist!').show();
							ele.removeClass('normal').addClass('wrong');				
						}else{
							emailInfo.hide();
							ele.removeClass('wrong');
							nameInfo.removeClass('error').addClass('correct').html('&radic;').show();
							ele.removeClass('wrong').addClass('normal');
						}	
						
					 }); 
				
				
				}
*/
	});
});
		</script>
    <style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;
            
        }
        h1{
            color:#ccc;
            font-size:36px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
        }

    </style>
</head>
<body>
<div id="site_main_wrapper">
	<!--start site top header-->
        <?php $this->load->view('includes/front_header'); ?>

    <!--end site top header-->
	
    <!--Start site header part-->
    <!--End site header Part-->
    
    <!--Start site main content wrapper-->
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div class="break"></div>
         <div id="content_inner_wrapper">
<!--			coming soon  --->
<!--Start Site Contant Wrapper-->
<div id="content">
            <div id="wrapper">
                <div id="steps">
                    <form id="formElem" name="formElem" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/home/create_member" method="post">
<?php
 
$a=get_country_by_ip();
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
                    <?php
						switch ($this->uri->segment(3))
						{
						case 1:
						$member_type="FREE";
						$level="70";
						break;
						case 2:
						$member_type="SILVER";
						$level="80";
						break;
						case 3:
						$member_type="GOLD";
						$level="90";
						break;
						case 4:
						$member_type="PLATINUM";
						$level="100";
						break;
						} 
					?>
                    <input type="hidden" name="member_type" id="member_type" value="<?php echo $member_type;?>"  />
                    <input type="hidden" name="level" id="level" value="<?php echo $level;?>" />
                    <input type="hidden" name="reg_val" id="reg_val" value="<?php echo $level;?>"  />
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
                        <fieldset class="step">
                            <legend>Account Details</legend>
                            <p>
                                <label for="username1">*Username</label>
                                <input id="username" name="username" placeholder="sample@sample.com" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="retype_password">*Password</label>
                                <input id="password" name="password" type="password" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="retype_password">*Confirm Password</label>
                                <input id="retype_password" name="retype_password" type="password" AUTOCOMPLETE=OFF />
                          </p><input type="button" id="addG" name="addG" value="check" style="display:none;"  />
                        </fieldset>
                        <fieldset class="step">
                            <legend>Personal Details</legend>
                            <p>
                                <label for="first_name">*First Name</label>
                                <input id="first_name" name="first_name" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="first_name">Middle Name</label>
                                <input id="middle_name" name="middle_name" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="first_name">*Last Name</label>
                                <input id="last_name" name="last_name" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p align="left">
                                <label for="first_name">Gender</label>
                                <input  name="gender" checked="checked" type="radio" AUTOCOMPLETE=OFF />&nbsp;Male
                                <input  name="gender" type="radio" AUTOCOMPLETE=OFF />&nbsp;Female
                          </p>
                            <p>
                                <label for="first_name">Date of Birth</label>
                                <input name="dob"  type="text" class="tcal" id="dob" readonly="readonly" placeholder="e.g. 07-30-1984" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="first_name">Company Name</label>
                                <input id="company" name="company" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="fax">Mobile No</label>
                                <input id="phone" name="phone" placeholder="e.g. 09090445566" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="fax">Fax No</label>
                                <input id="fax" name="fax" placeholder="e.g. +351215555555" type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="fax">*Email</label>
                                <input id="email" name="email"  type="text" AUTOCOMPLETE=OFF />
                          </p>
                            <p>
                                <label for="fax">Photo</label>
                                <input type="file" name="userfile" id="userfile"  />
                               
                          </p>
                           
                        </fieldset>
                         <fieldset class="step">
                            <legend>Billing Details</legend>
                            <p>
                                <label for="first_name">Address Line No1</label>
                                <input id="address" name="address" type="text" AUTOCOMPLETE=OFF />
                           </p>
                            <p>
                                <label for="first_name">Address Line No2</label>
                                <input id="address2" name="address2" type="text" AUTOCOMPLETE=OFF />
                           </p>
                            <p>
                                <label for="first_name">City</label>
                                <input id="city" name="city" type="text" AUTOCOMPLETE=OFF />
                           </p>
                            <p>
                                <label for="first_name">State</label>
                                <input id="state" name="state" type="text" AUTOCOMPLETE=OFF />
                           </p>
                            <p>
                                <label for="fax">Country</label>
                                <select name="country" size="1">
<option>Afghanistan</option><option>Åland Islands</option><option>Albania</option><option>Algeria</option><option>American Samoa</option><option>Andorra</option><option>Angola</option><option>Anguilla</option><option>Antarctica</option><option>Antigua and Barbuda</option><option>Argentina</option><option>Armenia</option><option>Aruba</option><option selected="selected">Australia</option><option>Austria</option><option>Azerbaijan</option><option>Bahamas</option><option>Bahrain</option><option>Bangladesh</option><option>Barbados</option><option>Belarus</option><option>Belgium</option><option>Belize</option><option>Benin</option><option>Bermuda</option><option>Bhutan</option><option>Bolivia</option><option>Bosnia and Herzegovina</option><option>Botswana</option><option>Bouvet Island</option><option>Brazil</option><option>British Indian Ocean territory</option><option>Brunei Darussalam</option><option>Bulgaria</option><option>Burkina Faso</option><option>Burundi</option><option>Cambodia</option><option>Cameroon</option><option>Canada</option><option>Cape Verde</option><option>Cayman Islands</option><option>Central African Republic</option><option>Chad</option><option>Chile</option><option>China</option><option>Christmas Island</option><option>Cocos (Keeling) Islands</option><option>Colombia</option><option>Comoros</option><option>Congo</option><option>Congo, Democratic Republic</option><option>Cook Islands</option><option>Costa Rica</option><option>Côte d'Ivoire (Ivory Coast)</option><option>Croatia (Hrvatska)</option><option>Cuba</option><option>Cyprus</option><option>Czech Republic</option><option>Denmark</option><option>Djibouti</option><option>Dominica</option><option>Dominican Republic</option><option>East Timor</option><option>Ecuador</option><option>Egypt</option><option>El Salvador</option><option>Equatorial Guinea</option><option>Eritrea</option><option>Estonia</option><option>Ethiopia</option><option>Falkland Islands</option><option>Faroe Islands</option><option>Fiji</option><option>Finland</option><option>France</option><option>French Guiana</option><option>French Polynesia</option><option>French Southern Territories</option><option>Gabon</option><option>Gambia</option><option>Georgia</option><option>Germany</option><option>Ghana</option><option>Gibraltar</option><option>Greece</option><option>Greenland</option><option>Grenada</option><option>Guadeloupe</option><option>Guam</option><option>Guatemala</option><option>Guinea</option><option>Guinea-Bissau</option><option>Guyana</option><option>Haiti</option><option>Heard and McDonald Islands</option><option>Honduras</option><option>Hong Kong</option><option>Hungary</option><option>Iceland</option><option>India</option><option>Indonesia</option><!-- copyright Felgall Pty Ltd --><option>Iran</option><option>Iraq</option><option>Ireland</option><option>Israel</option><option>Italy</option><option>Jamaica</option><option>Japan</option><option>Jordan</option><option>Kazakhstan</option><option>Kenya</option><option>Kiribati</option><option>Korea (north)</option><option>Korea (south)</option><option>Kuwait</option><option>Kyrgyzstan</option><option>Lao People's Democratic Republic</option><option>Latvia</option><option>Lebanon</option><option>Lesotho</option><option>Liberia</option><option>Libyan Arab Jamahiriya</option><option>Liechtenstein</option><option>Lithuania</option><option>Luxembourg</option><option>Macao</option><option>Macedonia, Former Yugoslav Republic Of</option><option>Madagascar</option><option>Malawi</option><option>Malaysia</option><option>Maldives</option><option>Mali</option><option>Malta</option><option>Marshall Islands</option><option>Martinique</option><option>Mauritania</option><option>Mauritius</option><option>Mayotte</option><option>Mexico</option><option>Micronesia</option><option>Moldova</option><option>Monaco</option><option>Mongolia</option><option>Montenegro</option><option>Montserrat</option><option>Morocco</option><option>Mozambique</option><option>Myanmar</option><option>Namibia</option><option>Nauru</option><option>Nepal</option><option>Netherlands</option><option>Netherlands Antilles</option><option>New Caledonia</option><option>New Zealand</option><option>Nicaragua</option><option>Niger</option><option>Nigeria</option><option>Niue</option><option>Norfolk Island</option><option>Northern Mariana Islands</option><option>Norway</option><option>Oman</option><option>Pakistan</option><option>Palau</option><option>Palestinian Territories</option><option>Panama</option><option>Papua New Guinea</option><option>Paraguay</option><option>Peru</option><option>Philippines</option><option>Pitcairn</option><option>Poland</option><option>Portugal</option><option>Puerto Rico</option><option>Qatar</option><option>Réunion</option><option>Romania</option><option>Russian Federation</option><option>Rwanda</option><option>Saint Helena</option><option>Saint Kitts and Nevis</option><option>Saint Lucia</option><option>Saint Pierre and Miquelon</option><option>Saint Vincent and the Grenadines</option><option>Samoa</option><option>San Marino</option><option>Sao Tome and Principe</option><!-- copyright Felgall Pty Ltd --><option>Saudi Arabia</option><option>Senegal</option><option>Serbia</option><option>Seychelles</option><option>Sierra Leone</option><option>Singapore</option><option>Slovakia</option><option>Slovenia</option><option>Solomon Islands</option><option>Somalia</option><option>South Africa</option><option>South Georgia and the South Sandwich Islands</option><option>Spain</option><option>Sri Lanka</option><option>Sudan</option><option>Suriname</option><option>Svalbard and Jan Mayen Islands</option><option>Swaziland</option><option>Sweden</option><option>Switzerland</option><option>Syria</option><option>Taiwan</option><option>Tajikistan</option><option>Tanzania</option><option>Thailand</option><option>Togo</option><option>Tokelau</option><option>Tonga</option><option>Trinidad and Tobago</option><option>Tunisia</option><option>Turkey</option><option>Turkmenistan</option><option>Turks and Caicos Islands</option><option>Tuvalu</option><option>Uganda</option><option>Ukraine</option><option>United Arab Emirates</option><option>United Kingdom</option><option>United States of America</option><option>Uruguay</option><option>Uzbekistan</option><option>Vanuatu</option><option>Vatican City</option><option>Venezuela</option><option>Vietnam</option><option>Virgin Islands (British)</option><option>Virgin Islands (US)</option><option>Wallis and Futuna Islands</option><option>Western Sahara</option><option>Yemen</option><option>Zaire</option><option>Zambia</option><option>Zimbabwe</option></select>
                           </p>
                            <p>
                                <label for="fax">Pincode</label>
                                <input id="zip" name="zip" placeholder="" type="text" AUTOCOMPLETE=OFF />
                           </p>
                         
                        </fieldset>
                        <fieldset class="step">
                            <legend>Calculation Basics</legend>
                          <p>
                                <label for="tagname">Currency</label>
                                <select name="currency" id="currency">
<?php 
	$cur_qry = mysql_query("SELECT curr_code FROM currency_data");
	if ($nm_qry=mysql_num_rows($cur_qry)>0)
	{
		while($rw_qry=mysql_fetch_array($cur_qry))
		{?>
                  <option value="<?php echo $rw_qry['curr_code'];?>"><?php echo $rw_qry['curr_code'];?></option>
		<?php }
	}    

?>
                                  </select>
                            </p>
                            <p style="display:none">
                                <label for="tagname">Wieght Per Portion</label>
                                <input name="weight_per_portion" type="hidden" id="weight_per_portion" value="0.01" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="tagname">Food Loss(%)</label>
                                <input name="food_loss" type="text" id="food_loss" value="10" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="tagname">Profit Amount(%)</label>
                                <input name="profit" type="text" id="profit" value="300" AUTOCOMPLETE=OFF />
                            </p>
                        </fieldset>
                        <?php 
						if($this->uri->segment(3)!=1){
						?>
                        <fieldset class="step">
                            <legend>Payment Details</legend>
                             <p align="center" style="text-align:center;">
                                <label for="first_name">*Payment Mode</label>
                                <input id="name" name="payment_method" type="radio" AUTOCOMPLETE=OFF />
                                &nbsp;By Credit / Debit Card 
                                <input id="name" name="payment_method" type="radio" AUTOCOMPLETE=OFF />
                          &nbsp;By Net Banking</p>
<!--                            <p>
                                <label for="cardtype">Card</label>
                                <select id="cardtype" name="cardtype">
                                    <option>Visa</option>
                                    <option>Mastercard</option>
                                    <option>American Express</option>
                                </select>
                            </p>
                            <p>
                                <label for="cardnumber">Card number</label>
                                <input id="cardnumber" name="cardnumber" type="number" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="secure">Security code</label>
                                <input id="secure" name="secure" type="number" AUTOCOMPLETE=OFF />
                            </p>
                            <p>
                                <label for="namecard">Name on Card</label>
                                <input id="namecard" name="namecard" type="text" AUTOCOMPLETE=OFF />
                            </p>-->
                        </fieldset>
                        <?php }?>
						<fieldset class="step">
                            <legend>Confirm</legend>
                            <div id="err" style="color:#F00; font-size:12px;display:none">* You have to fill mandatory fields highligted in red</div>
							<p>
								Everything in the form was correctly filled 
								if all the steps have a green checkmark icon.
								A red checkmark icon indicates that some field 
								is missing or filled out with invalid data. In this
								last step the user can confirm the submission of
								the form.
							</p>
							<p>By clicking the &ldquo;Register&rdquo; button below, I certify that I have read and agree to the <a href="<?php echo base_url();?>index.php/home/terms" id="terms" title="Terms of Service" target="_blank">Calcipe Terms of Service</a> </p>
                            <p class="submit">
                            
                              <button id="registerButton" type="button">Register</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#">Account Details</a>
                        </li>
                        <li>
                            <a href="#">Personal Details</a>
                        </li>
                        <li>
                            <a href="#">Billing Details</a>
                        </li>
                        <li>
                            <a href="#">Calculation</a>
                        </li>
                        <?php 
						if($this->uri->segment(3)!=1){
						?>
                        <li>
                            <a href="#">Payment Details</a>
                        </li>   
                        <?php }?>                    
						<li>
                            <a href="#">Confirm</a>
                        </li>
                    </ul>
                </div>
            </div>
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
