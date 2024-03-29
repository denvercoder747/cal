<script>
function validateEmail(elementValue){
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(elementValue);
 }

function validate()
{
	var error=0;
	for(i=1;i<2;i++)
	{
		if(document.getElementById('email'+i).value!='')
		{
			error=1;
			if(validateEmail(document.getElementById('email'+i).value)==false)
			{
				document.getElementById('err'+i).style.display='block';
				document.getElementById('email'+i).style.borderColor='#FF0000';
				return false;
				
			}
		}
		if(error<1)
		{
			document.getElementById('err').style.display='block';
			return false;
			
		}
		
	}
}
</script>
<form name="request" id="request" action="<?php echo base_url();?>index.php/email/sendmail" method="post" class="standardForm" onsubmit="return validate();">
    <div style="color:#00F; text-align:center"><?php echo $this->session->flashdata('message'); ?></div>
    <div id="err" style="color:#F00; display:none; text-align:center">Please Fill Atleast One Email</div>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="left">
  <tr>
    <td height="30" colspan="7"><strong>Suggest Your Friends For Calcipe</strong></td>
  </tr>
  <tr>
    <td>Recipe </td>
    <td><input type="text" name="first1" id="first1" value="<?php echo urldecode($this->uri->segment(3));?>" /></td>
    <td>Email</td>
    <td><input type="text" name="email1" id="email1" />
      <div id="err1" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
 <!-- <tr>
    <td>2</td>
    <td>First Name</td>
    <td><input type="text" name="first2" id="first2" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last2" id="last2" /></td>
    <td>Email</td>
    <td><input type="text" name="email2" id="email2" />
      <div id="err2" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>3</td>
    <td>First Name</td>
    <td><input type="text" name="first3" id="first3" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last3" id="last3" /></td>
    <td>Email</td>
    <td><input type="text" name="email3" id="email3" />
      <div id="err3" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>4</td>
    <td>First Name</td>
    <td><input type="text" name="first4" id="first4" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last4" id="last4" /></td>
    <td>Email</td>
    <td><input type="text" name="email4" id="email4" />
      <div id="err4" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>5</td>
    <td>First Name</td>
    <td><input type="text" name="first5" id="first5" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last5" id="last5" /></td>
    <td>Email</td>
    <td><input type="text" name="email5" id="email5" />
      <div id="err5" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>6</td>
    <td>First Name</td>
    <td><input type="text" name="first6" id="first6" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last6" id="last6" /></td>
    <td>Email</td>
    <td><input type="text" name="email6" id="email6" />
      <div id="err6" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>7</td>
    <td>First Name</td>
    <td><input type="text" name="first7" id="first7" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last7" id="last7" /></td>
    <td>Email</td>
    <td><input type="text" name="email7" id="email7" />
      <div id="err7" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>8</td>
    <td>First Name</td>
    <td><input type="text" name="first8" id="first8" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last8" id="last8" /></td>
    <td>Email</td>
    <td><input type="text" name="email8" id="email8" />
      <div id="err8" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>9</td>
    <td>First Name</td>
    <td><input type="text" name="first9" id="first9" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last9" id="last9" /></td>
    <td>Email</td>
    <td><input type="text" name="email9" id="email9" />
      <div id="err9" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>
  <tr>
    <td>10</td>
    <td>First Name</td>
    <td><input type="text" name="first10" id="first10" /></td>
    <td>Last Name</td>
    <td><input type="text" name="last10" id="last10" /></td>
    <td>Email</td>
    <td><input type="text" name="email10" id="email10" />
      <div id="err10" style="color:#F00; display:none; text-align:center">Please Enter Valid Email</div></td>
  </tr>-->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="requestbtn" id="requestbtn" value="Send" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>
</form>