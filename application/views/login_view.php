<script type="text/javascript" src="<?php echo $base ?>/js/validation.js"></script>
<script type="text/javascript">
function showlayer(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none" || myLayer.style.display==""){
myLayer.style.display="block";
} else {
myLayer.style.display="none";
}
}
</script>
<div id="content">
<?php $this->load->helper('form'); ?>
<!--For showing All Error-->    
<table width="100%" border="0" cellspacing="2" cellpadding="2">
    <tr>
      <td height="446" colspan="2" align="center" valign="middle"><?php echo form_open("home/validate_credentials"); ?>
        <div id="navbar">
  <div id="login_menu" style="display:block;">
<div class="login_error"><?php echo $this->session->flashdata('message'); ?></div>
<div id="new-user-col">New User:<br /><br />
<a href="<?php echo base_url();?>index.php/home/create_member" class="green-button">Register</a>
</div>

<div id="signup-user-col">
Existing User log in below:<br /><br />
<?php echo form_open("home/validate_credentials"); ?>
<ul>
<li>
<label for="email">Email:</label>
<input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" size="18" />
</li>
<li>
<label for="psw">Password:</label>
<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" size="18" />
</li>
<button type="submit" class="green-button">Log-in</button>
</ul>
</div>

<div class="spacer"></div>

</div>
</div>        
      <?php echo form_close(); ?>   
      
      </td>
    </tr>
    <tr>
    <td width="23%">&nbsp;</td>
    <td width="77%">&nbsp;</td>
    </tr>
</table>

</div><!--<div id="content">-->

