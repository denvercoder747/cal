<?php
$Merchant_Id = "your_merchantid";//This id(also User Id) available at "Generate Working Key" of "Settings & Options"
$Amount = "amount";//your script should substitute the amount in the quotes provided here
$Order_Id ="orderid";//your script should substitute the order description in the quotes provided here
$WorkingKey = "working_key";//Given to merchant by ccavenue
$Redirect_Url ="http://www.yoursite.com/ccavenue_returndata.php";
$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); // Validate All value
?>
<p align="center" style="font-family:Calibri; font-size:18px;"><img src="http://www.example.com/images/loader.gif" alt="loader"></p>
<p align="center" style="font-family:Calibri; font-size:24px;color:#3670A7;">Processing to CCAvenue..............</p>
<form id="form2" method="post" action="https://www.ccavenue.com/shopzone/cc_details.jsp">
<input type=hidden name="Merchant_Id" value="<?php echo $Merchant_Id; ?>">
<input type="hidden" name="Amount" value="<?php echo $Amount; ?>">
<input type="hidden" name="Order_Id" value="<?php echo $Order_Id; ?>">
<input type="hidden" name="Redirect_Url" value="<?php echo $Redirect_Url; ?>">
<input type="hidden" name="Checksum" value="<?php echo $Checksum; ?>">
<input type="hidden" name="billing_cust_name" value="yourname"> <!--Pass Customer Full Name -->
<input type="hidden" name="billing_cust_address" value="123 Green Acres,West Eden"><!--Pass Customer Full Address-->
<input type="hidden" name="billing_cust_country" value="India"> <!--Pass Customer Country -->
<input type="hidden" name="billing_cust_state" value="AP"><!--Pass Customer State -->
<input type="hidden" name="billing_cust_city" value="Kakinada"> <!--Pass Customer City -->
<input type="hidden" name="billing_zip" value="533002"> <!--Pass Customer Zip Code-->
<input type="hidden" name="billing_cust_tel" value="9999999999"> <!--Pass Customer Phone No-->
<input type="hidden" name="billing_cust_email" value="test_test@yahoo.com"> <!--Pass Customer Email address-->
<input type="hidden" name="delivery_cust_name" value="delivery_name"> <!--Pass Same or other other detail fill by customer-->
<input type="hidden" name="delivery_cust_address" value="123 Green Acres,West Eden">
<input type="hidden" name="delivery_cust_country" value="India">
<input type="hidden" name="delivery_cust_state" value="AP">
<input type="hidden" name="delivery_cust_tel" value="999999999">
<input type="hidden" name="delivery_cust_notes" value="Testing ccav">
<input type="hidden" name="Merchant_Param" value="">
<input type="hidden" name="billing_zip_code" value="533002">
<input type="hidden" name="delivery_cust_city" value="Kakinada">
<input type="hidden" name="delivery_zip_code" value="533002">

<input type="submit" value="Proceed to Pay" />
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


for ($n = 0 ; $n < strlen($num) ; $n++)
{
$temp = $num[$n] ;
$dec = $dec + $temp*pow(2 , strlen($num) - $n - 1);
}


return $dec;
}
?>
