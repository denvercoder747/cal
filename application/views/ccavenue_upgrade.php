<?php
$chars = '0123456789abcdefghjkmnoprstvwxyz';

$Order_Id  = '';
// Generate code
for ($i = 0; $i < 12; ++$i)
{
$Order_Id .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
}

$Merchant_Id = "M_gun20151_20151";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
$Amount = $plan_inr;//your script should substitute the amount in the quotes provided here
//$Order_Id ="orderid";//your script should substitute the order description in the quotes provided here
$WorkingKey = "juni7rk6ush3dgk38j";//Given to merchant by ccavenue
$Redirect_Url ="http://www.calcipe.com/index.php/member/confirm_update_plan";
$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); // Validate All value
//$Merchant_Id = "your_merchantid";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
//$Amount = "amount";//your script should substitute the amount in the quotes provided here
//$Order_Id ="orderid";//your script should substitute the order description in the quotes provided here
//$WorkingKey = "working_key";//Given to merchant by ccavenue
//$Redirect_Url ="www.calcipe.com/index.php/home/ccavenue_confirm";
//$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); // Validate All value
?>
<script type="text/javascript">
function reFresh() {
  document.form2.submit();
}
window.setInterval("reFresh()",10000);
</script>
<p align="center" style="font-family:Calibri; font-size:18px;"><img src="/images/loading.gif" alt="loader"></p>
<p align="center" style="font-family:Calibri; font-size:24px;color:#3670A7;">Processing to CCAvenue..............</p>
<form id="form2" name="form2" method="post" action="https://www.ccavenue.com/shopzone/cc_details.jsp">
<input type="hidden" name="plan_name" value="<?php echo $plan_name; ?>">
<input type="hidden" name="plan_type" value="<?php echo $plan_type;?>">
<input type="hidden" name="username" value="<?php echo $username; ?>">
<input type="hidden" name="plan_inr" value="<?php echo $plan_inr;?>">
<input type="hidden" name="plan_usd" value="<?php echo $plan_usd; ?>">
<input type="hidden" name="currency" value="<?php echo $currency;?>">
<input type="hidden" name="currency_amount" value="<?php echo $currency_amount;?>">
<input type=hidden name="Merchant_Id" value="<?php echo $Merchant_Id; ?>">
<input type="hidden" name="Amount" value="<?php echo $Amount; ?>">
<input type="hidden" name="Order_Id" value="<?php echo $Order_Id; ?>">
<input type="hidden" name="Redirect_Url" value="<?php echo $Redirect_Url; ?>">
<input type="hidden" name="Currency" value="<?php echo $currency; ?>"  />
<input type="hidden" name="Checksum" value="<?php echo $Checksum; ?>">
<input type="hidden" name="billing_cust_name" value="<?php echo $username;?>"> <!--Pass Customer Full Name -->
<input type="hidden" name="billing_cust_address" value=""><!--Pass Customer Full Address-->
<input type="hidden" name="billing_cust_country" value=""> <!--Pass Customer Country -->
<input type="hidden" name="billing_cust_state" value=""><!--Pass Customer State -->
<input type="hidden" name="billing_cust_city" value=""> <!--Pass Customer City -->
<input type="hidden" name="billing_zip" value=""> <!--Pass Customer Zip Code-->
<input type="hidden" name="billing_cust_tel" value=""> <!--Pass Customer Phone No-->
<input type="hidden" name="billing_cust_email" value="<?php echo $username; ?>"> <!--Pass Customer Email address-->
<input type="hidden" name="delivery_cust_name" value=""> <!--Pass Same or other other detail fill by customer-->
<input type="hidden" name="delivery_cust_address" value="">
<input type="hidden" name="delivery_cust_country" value="">
<input type="hidden" name="delivery_cust_state" value="">
<input type="hidden" name="delivery_cust_tel" value="">
<input type="hidden" name="delivery_cust_notes" value="">
<input type="hidden" name="Merchant_Param" value="">
<input type="hidden" name="billing_zip_code" value="">
<input type="hidden" name="delivery_cust_city" value="">
<input type="hidden" name="delivery_zip_code" value="">

<input type="hidden" value="Proceed to Pay" />
</form>
<?php


function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
{
$str ="$MerchantId|$OrderId|$Amount|$URL|$WorkingKey";
$adler = 1;
$adler = adler32($adler,$str);
return $adler;
}


function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
{
$str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
$adler = 1;
$adler = adler32($adler,$str);

if($adler == $CheckSum)
return "true" ;
else
return "false" ;
}


function adler32($adler , $str)
{
$BASE = 65521 ;


$s1 = $adler & 0xffff ;
$s2 = ($adler >> 16) & 0xffff;
for($i = 0 ; $i < strlen($str) ; $i++)
{
$s1 = ($s1 + Ord($str[$i])) % $BASE ;
$s2 = ($s2 + $s1) % $BASE ;
//echo "s1 : $s1 <BR> s2 : $s2 <BR>";


}
return leftshift($s2 , 16) + $s1;
}


function leftshift($str , $num)
{


$str = DecBin($str);


for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
$str = "0".$str ;


for($i = 0 ; $i < $num ; $i++)
{
$str = $str."0";
$str = substr($str , 1 ) ;
//echo "str : $str <BR>";
}
return cdec($str) ;
}


function cdec($num)
{

$dec='';

for ($n = 0 ; $n < strlen($num) ; $n++)
{
$temp = $num[$n] ;
$dec = $dec + $temp*pow(2 , strlen($num) - $n - 1);
}


return $dec;
}
?>
