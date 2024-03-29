<!--Start Site Contant Wrapper-->
<script>
function loginCheck()
{
	var username2=document.getElementById('username2').value;
	var password2=document.getElementById('password2').value;
		document.getElementById('dv1').style.display='none';
		document.getElementById('dv2').style.display='none';
		document.getElementById('username2').style.border='1px solid #A4AEB6';
		document.getElementById('password2').style.border='1px solid #A4AEB6';
	if(username2=='')
	{
		document.getElementById('dv1').style.display='block';
		document.getElementById('username2').style.border='1px solid #F00';
		return false;
	}
	if(password2=='')
	{
		document.getElementById('dv2').style.display='block';
		document.getElementById('password2').style.border='1px solid #F00';
		return false;
	}
	document.frm_userLogin.action="<?php echo base_url();?>index.php/home/validate_credentials";
	document.frm_userLogin.submit();
	
}
</script>
<div id="main_login_wraper">
	<div id="login_header"><span>Calcipe Login Panel</span></div>
	<div style="height:10px; clear:both;"></div>
	<div id="login_wraper">
        <!--Left Side Space for User Register-->
        <div id="user_register_left">
        	<h1>Sign-in to your account</h1>
            <div style="height:15px; border-bottom:1px solid #d8dbde; margin-left:25px;">
            </div>
            <div style="height:5px; clear:both;"></div>
            <form name="frm_userLogin" id="frm_userLogin" action="<?php echo base_url();?>index.php/home/validate_credentials" method="post">
            <div id="login_user_text">Username
            	<div id="errUsername" style="display:none; float:right; font-weight:normal; margin-left:5px; text-align:left; width:350px;">
                Enter Your User Name</div>
            </div>
            <div id="login_user_text">
           	  	<input class="login_text_box" name="username" id="username2" type="text" value="" /><div id="dv1" style="color:#F00; font-size:12px; display:none">* Mandatory</div></div>
            <div style="height:10px; clear:both;"></div>
            <div id="login_user_text">Password
            	<div id="errPassword" style="display:none; float:right; font-weight:normal; margin-left:5px; text-align:left; width:350px;">
                Enter Your Passsword</div>
            </div>
            <div id="login_user_text">
           	  	<input class="login_text_box" name="password" id="password2" type="password" value="" /><div id="dv2" style="color:#F00; font-size:12px; display:none">* Mandatory</div><br/>
                </div>
            <div style="height:32px; clear:both;"></div>
            <div id="login_user_frtpwd"><a href="<?php echo base_url();?>index.php/forgotPassword" rel="facebox">Forgot your password?</a></div>
           <!-- <div id="login_user_btm">
            	<input class="login_sign_in" name="user_login" id="user_login" type="submit" value="" onclick="return loginCheck()" />
             </div>-->
             <div id="login_user_btm">
            	<input class="loginCss" name="user_login" id="user_login" type="button" value="LOG IN" onclick="return loginCheck()" />
            </div>
            </form>
        </div>
        <!--End Left Side Space for User Register-->
        <!--Right Side Space for User Login-->
        <div id="user_login_right">
        	<h1>Create an account</h1>
            <div style="height:15px; border-bottom:1px solid #d8dbde; margin-left:25px;"></div>
          <p>To  know, experience and enjoy the services of Calcipe, you will need to open an  account. To open a Calcipe account, all you  need to do is to register by clicking  on the link given and fill in the  details. Please type in your password and your email id for us to confirm  opening your Calcipe account with us.</p>
            <div style="height:30px; clear:both;"></div>
          <a href="<?php echo base_url();?>index.php/home/price" style="text-decoration:none;"><div id="create_account"><br />CREATE MY ACCOUNT</div></a>
        </div>
        
        <!--End Right Side Space for User Login-->
    </div>
    <div style="height:20px; clear:both;"></div>
</div>
<!--End Site Contant Wrapper-->
