  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
  <script type="text/javascript">
  function validate_chk()
	  {
		if ( ( document.getElementById('chk1').checked == false ) && ( document.getElementById('chk2').checked == false ) && ( document.getElementById('chk3').checked == false ) && ( document.getElementById('chk4').checked == false )) 
		{ 
		alert ( "Please choose One Reason for our better Service" ); return false; 
		}
		if(document.getElementById('chk4').checked == true)
		{
			if(document.getElementById('reason').value == '')
			{
				alert ( "Please Enter the Reason" ); return false; 
				
			}
			
		}
		document.form1.submit();
	  }
  </script>
<form name="form1" method="post" action="<?php echo base_url();?>index.php/site/delete_user">
<table width="645" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td height="30" align="right"><input name="chk" type="radio" id="chk1" value="You have experienced and experimented with all the features and benefits of Calcipe and would like to take a Short break for sometime."></td>
    <td>You have experienced and experimented with all the features and benefits of Calcipe and would like to take a Short break for sometime.</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="radio" id="chk2" value="The services and benefits of Calcipe no longer serve your needs as you have moved into a completely different line of business."></td>
    <td>The services and benefits of Calcipe no longer serve your needs as you have moved into a completely different line of business.</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="radio" id="chk3" value="Due to non payment issues"></td>
    <td>Due to non payment issues</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="radio" id="chk4" value="Any other reason - which the user would like to share"></td>
    <td>Any other reason - which the user would like to share</td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td><textarea name="reason" id="reason" cols="46" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td><input type="button" name="S1" id="S1" value="Submit" onClick="validate_chk();"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
