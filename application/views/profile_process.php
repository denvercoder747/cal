<?php
$chars = '0123456789abcdefghjkmnoprstvwxyz';
$Merchant_Id = "";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
$Amount = 0;//your script should substitute the amount in the quotes provided here
$Order_Id  = '';
// Generate code
for ($i = 0; $i < 12; ++$i)
{
$Order_Id .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
}
$Redirect_Url ="www.calcipe.com/index.php/home/free_confirm";
?>
<script type="text/javascript">
function reFresh() {
  document.form2.submit();
}
window.setInterval("reFresh()",5000);
</script>
<p align="center" style="font-family:Calibri; font-size:18px;"><img src="/images/loading.gif" alt="loader"></p>
<p align="center" style="font-family:Calibri; font-size:24px;color:#3670A7;"><span id="internal-source-marker_0.6627918019559212">Please wait while your account is being created&hellip;&hellip;&hellip;&hellip;</span></p>
<form id="form2" name="form2" method="post" action="<?php echo base_url();?>index.php/home/free_confirm">
<input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
<input type="hidden" name="last_name" value="<?php echo $last_name;?>">
<input type=hidden name="Merchant_Id" value="<?php echo $Merchant_Id; ?>">
<input type="hidden" name="Amount" value="0">
<input type="hidden" name="Order_Id" value="<?php echo $Order_Id; ?>">
</form>
