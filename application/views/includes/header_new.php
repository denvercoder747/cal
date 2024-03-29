<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo (isset($title)) ? $title : ":::.Welcome To CalCipe Portal.:::" ?></title>
     <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/images/favicon.ico">
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    
</head>
<body>
<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
  border:#5c8802 5px dashed;
  -webkit-border-radius: 11px;
  -moz-border-radius: 11px;
   border-radius: 11px;
}
.class1
{
 float:right;margin-top:-27px;position:absolute; margin-left:358px;
}
</style>

<div id="boxes">

<div id="dialog" class="window">
<span class="class1"><a href="#"class="close"/><img src="/images/popclose.png"  border="0"/></a></span>
<div class="d-header">
      <p>You have not Updated your Profile Details <a href="<?php echo base_url();?>index.php/member/edit_profile">Click Here</a> To Update </p>
      <br/>
      <p><strong>Important</strong>: Please update your profile with Profit, Food Loss and Infrastructure percentage to calculate accurate recipe cost.</p>
      <p>Also, Please ensure to add/edit the ingredients, their quantity and rates before adding recipe which use those ingredients. </p>
 </div>

</div>
					
  <div id="mask"></div>
</div>
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>