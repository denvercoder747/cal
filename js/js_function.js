// JavaScript Document
/*Global Java Script Function File
  Author : Arulkumaran.P Paramount Tech Labs
  Function : Some Basic Validations Function
*/

//User Validations for New User
function user_validations()
{
	var username 	= $('#txt_username').val();
	var password 	= $('#txt_password').val();
	var cpassword 	= $('#txt_confirm_password').val();
	var firstName 	= $('#txt_firstname').val();
	var BtnsGender = document.getElementsByName('select_gender');
	
	var mobileNo 	= $('#txt_mobileno').val();
	var emailId 	= $('#txt_emailid').val();
	var address 	= $('#txt_address').val();
	var state	 	= $('#select_state').val();
	var country 	= $('#select_country').val();
	var pinCode 	= $('#txt_pincode').val();
	var profitAmt 	= $('#txt_profitAmount').val();
	var paymentMode = document.getElementsByName('select_payment_mode');
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
	if(username == "" || username == " "){
		$('#txt_username').css('border', '1px #F50 solid');
		$('#registerErr').css('color', '#CC0000');
		$('#registerErr').show();
		document.userRegister.txt_username.focus();
		return false;
	} else if(!(username.search(/^[A-Za-z0-9_]{3,20}$/) > -1)) {
		$('#txt_username').css('border', '1px #F50 solid');
		$('#usernamesatus').css('color', '#CC0000');
		$('#usernamesatus').show();
		$('#registerErr').hide();
		document.userRegister.txt_username.focus();
		return false;
	} else {
		$('#txt_username').css('border', '1px #007500 solid');
		$('#registerErr').hide();
		$("#usernamesatus").hide();
	}
	
	if(password == "" || password == " "){
		$('#txt_password').css('border', '1px #F50 solid');
		$('#registerpErr').css('color', '#CC0000');
		$('#registerpErr').show();
		document.userRegister.txt_password.focus();
		return false;
	}else if(password.length < 6 ) {
		$('#txt_password').css('border', '1px #F50 solid');
		$('#passlimit').css('color', '#CC0000');
		$('#passlimit').show();
		$('#passChar').hide();
		$('#registerpErr').hide();
		document.userRegister.txt_password.focus();
		return false;
	}
	else if (!(password.search(/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/) > -1)) {
		$('#txt_password').css('border', '1px #F50 solid');
		$('#passChar').css('color', '#CC0000');
		$('#passChar').show();
		$('#registerpErr').hide();
		document.userRegister.txt_password.focus();
		return false;
	}else {
		$('#txt_password').css('border', '1px #007500 solid');
		$('#registerpErr').hide();
		$('#passChar').hide();
		$('#passlimit').hide();
	}
	
	if(cpassword == "" || cpassword == " "){
		$('#txt_confirm_password').css('border', '1px #F50 solid');
		$('#registercErr').css('color', '#CC0000');
		$('#registercErr').show();
		document.userRegister.txt_confirm_password.focus();
		return false;
	} else {
		$('#txt_confirm_password').css('border', '1px #007500 solid');
		$('#registercErr').hide();
	}
	
	if(password != cpassword) {
		$('#txt_password').css('border', '1px #F50 solid');
		$('#txt_confirm_password').css('border', '1px #F50 solid');
		$('#passNotmatch').css('color', '#CC0000');
		$('#passNotmatch').show();
		document.userRegister.txt_password.focus();
		return false;
	} else {
		$('#txt_password').css('border', '1px #007500 solid');
		$('#passNotmatch').hide();
		$('#txt_confirm_password').css('border', '1px #007500 solid');
	}
	
	if(firstName == "" || firstName == " "){
		$('#txt_firstname').css('border', '1px #F50 solid');
		$('#firstName').css('color', '#CC0000');
		$('#firstName').show();
		document.userRegister.txt_firstname.focus();
		return false;
	} else {
		$('#txt_firstname').css('border', '1px #007500 solid');
		$('#firstName').hide();
	}
	
	var isGenderChecked = false;
	for(i=0; i < BtnsGender.length; i++)
	{
		if(BtnsGender[i].checked)
		{
			isGenderChecked = true;
			i = BtnsGender.length;
			$('#gender').hide();
		}
	}
	if(!isGenderChecked) 
	{
		$('#gender').css('color', '#CC0000');
		$('#gender').show();
		return false;
	}

	if(mobileNo == "" || mobileNo == " "){
		$('#txt_mobileno').css('border', '1px #F50 solid');
		$('#mobileNo').css('color', '#CC0000');
		$('#mobileNo').show();
		document.userRegister.txt_mobileno.focus();
		return false;
	} else if(mobileNo.length > 15 || mobileNo.search(/[^0-9\-()+]/g) != -1)
	{
		$('#incorrectNo').css('color', '#CC0000');
		$('#incorrectNo').show();
		$('#mobileNo').hide();
		document.userRegister.txt_mobileno.focus();
		return false;
	}else {
		$('#txt_mobileno').css('border', '1px #007500 solid');
		$('#mobileNo').hide();
		$('#incorrectNo').hide();
	}
		
	if(emailId == "" || emailId == " "){
		$('#txt_emailid').css('border', '1px #F50 solid');
		$('#emailId').css('color', '#CC0000');
		$('#emailId').show();
		document.userRegister.txt_emailid.focus();
		return false;
	} else if(reg.test(emailId) == false) {
		$('#emailId').hide();
		$('#incorrectemail').css('color', '#CC0000');
		$('#incorrectemail').show();
        document.userRegister.txt_emailid.focus();
        return false;
	}else {
		$('#txt_emailid').css('border', '1px #007500 solid');
		$('#emailId').hide();
		$('#incorrectemail').hide();
	}

	if(address == "" || address == " "){
		$('#txt_address').css('border', '1px #F50 solid');
		$('#address').css('color', '#CC0000');
		$('#address').show();
		document.userRegister.txt_address.focus();
		return false;
	} else {
		$('#txt_address').css('border', '1px #007500 solid');
		$('#address').hide();
	}

	if(state == "" || state == " "){
		$('#select_state').css('border', '1px #F50 solid');
		$('#state').css('color', '#CC0000');
		$('#state').show();
		document.userRegister.select_state.focus();
		return false;
	} else {
		$('#select_state').css('border', '1px #007500 solid');
		$('#state').hide();
	}
	
	if(country == "" || country == " "){
		$('#select_country').css('border', '1px #F50 solid');
		$('#country').css('color', '#CC0000');
		$('#country').show();
		document.userRegister.select_country.focus();
		return false;
	} else {
		$('#select_country').css('border', '1px #007500 solid');
		$('#country').hide();
	}
	
	if(profitAmt == "" || profitAmt == " "){
		$('#txt_profitAmount').css('border', '1px #F50 solid');
		$('#profitAmountt').css('color', '#CC0000');
		$('#profitAmountt').show();
		document.userRegister.txt_profitAmount.focus();
		return false;
	} else {
		$('#txt_profitAmount').css('border', '1px #007500 solid');
		$('#profitAmountt').hide();
	}
	
	var isPaymentChecked = false;
	for(i=0; i < paymentMode.length; i++)
	{
		if(paymentMode[i].checked)
		{
			isPaymentChecked = true;
			i = paymentMode.length;
			$('#payment').hide();
		}
	}
	if(!isPaymentChecked) 
	{
		$('#payment').css('color', '#CC0000');
		$('#payment').show();
		return false;
	}
	
return true;
}

//Feedback Validation
// JavaScript Document
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
function validateForm()
{
	var x=document.suggestion.frmName.value;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var reg1 = /^[a-zA-Z ]+$/;
   var address = document.getElementById('email_address').value;
	if (reg1.test(document.suggestion.frmName.value)==false)
  	{
  		alert("Please Enter Your Name");
		document.suggestion.frmName.focus();
  		return false;
  	}
   if(reg.test(address) == false) {
 
      alert('Invalid Email Address');
		document.suggestion.email_address.focus();
      return false;
   }
/*	if ( document.suggestion.email_address.value == '')
  	{
  		alert("Please fill Respective Fields");
  		return false;
  	}
*/	if (document.suggestion.subject.value=='')
  	{
  		alert("Please fill Respective Fields");
		document.suggestion.subject.focus();
  		return false;
  	}
	if (document.suggestion.comments.value == '')
  	{
  		alert("Please fill Respective Fields");
		document.suggestion.comments.focus();
  		return false;
  	}
	else if(reg.test(document.suggestion.email_address.value) == false)
	{
		document.suggestion.email_address.value="";
		document.suggestion.email_address.focus();
		return false
	}
return true;
}
