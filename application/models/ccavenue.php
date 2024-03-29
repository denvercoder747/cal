<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccavenue extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
    {
        $str ="$MerchantId|$OrderId|$Amount|$URL|$WorkingKey";
        $adler = 1;
        $adler = $this->adler32($adler,$str);
        return $adler;
    }
     
    function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
    {
        $str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
        $adler = 1;
        $adler = $this->adler32($adler,$str);
     
        if($adler == $CheckSum)
            return "true" ;
        else
            return "false" ;
    }
     
    function adler32($adler , $str)
    {
        $BASE =  65521 ;
     
        $s1 = $adler & 0xffff ;
        $s2 = ($adler >> 16) & 0xffff;
        for($i = 0 ; $i < strlen($str) ; $i++)
        {
            $s1 = ($s1 + Ord($str[$i])) % $BASE ;
            $s2 = ($s2 + $s1) % $BASE ;
                //echo "s1 : $s1 <BR> s2 : $s2 <BR>";
     
        }
        return $this->leftshift($s2 , 16) + $s1;
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
        return $this->cdec($str) ;
    }
     
    function cdec($num)
    {
     $dec ='';
        for ($n = 0 ; $n < strlen($num) ; $n++)
        {
           $temp = $num[$n] ;
           $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
        }
     
        return $dec;
    }
}
?>

