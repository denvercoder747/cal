<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Calcipe </title>
     <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/slidediv.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script>
	function calc()
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		rate=parseFloat(document.getElementById('rateRow').value);
		qty=parseFloat(document.getElementById('qtyRow').value);
		units=parseFloat(document.getElementById('measure').value);
		perkg=parseFloat((rate/qty*units));
		document.getElementById('amtKg').value=perkg.toFixed(2);
	}
	function calc1(iD)
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		rate=parseFloat(document.getElementById('fourth_input_'+iD).value);
		qty=parseFloat(document.getElementById('second_input_'+iD).value);
		units=parseFloat(document.getElementById('third_input_'+iD).value);
		perkg=parseFloat((rate/qty*units));
		document.getElementById('fifth_input_'+iD).value=perkg.toFixed(2);
		var measure1 = $("#third_input_"+iD).find("option:selected").text();
		document.getElementById('measure1_'+iD).value=measure1;

	}
	function editAll()
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		var totrow=document.getElementById('total_row').value
		for(iD=1;iD<=totrow;iD++)
		{
			$("#first_"+iD).hide();
			$("#second_"+iD).hide();
			$("#third_"+iD).hide();
			$("#fourth_"+iD).hide();
			$("#fifth_"+iD).hide();
			$("#six_"+iD).hide();
			$("#seven_"+iD).hide();
			$("#eight_"+iD).hide();
			$("#nine_"+iD).hide();
	//		$("#last_"+iD).hide();
			$("#first_input_"+iD).show();
			$("#second_input_"+iD).show();
			$("#third_input_"+iD).show();
			$("#fourth_input_"+iD).show();
			$("#fifth_input_"+iD).show();
			$("#six_input_"+iD).show();
			$("#seven_input_"+iD).show();
			$("#eight_input_"+iD).show();
			$("#nine_input_"+iD).show();
			$("#ten_input_"+iD).show()
			$("#tweleve_input_"+iD).show()
		}
			$("#S1").show()
	}
	function ref1()
	{
		document.getElementById('rateRow').value=1;
		document.getElementById('qtyRow').value=1;
		document.getElementById('measure').selectedIndex=1;
		document.getElementById('amtKg').value=1;
	}
	</script>
    <style>
	div.display table thead tr td{
		border-bottom: 1px solid #d3d3d3;
		padding: 5px;
	}
	
	div.display table tbody tr td{
		padding: 5px;
	}
	
	div.display table tbody tr td input[type=text]{
		background: #FFF;
		border: 1px solid #d3d3d3;
		width: 85px;
	}
	
	div.display table tbody tr.alt{
		background: #f5f5f5;
	}	
	.editbox
	{
	display:none
	}
	.editbot
	{
	display:none
	}
	.editdrop
	{
	display:none
	}
	td
	{
	padding:5px;
	}
	.editbox
	{
	font-size:14px;
	width:270px;
	background-color:#ffffcc;
	border:solid 1px #000;
	padding:4px;
	}
	.edit_tr:hover
	{
	background:url(edit.png) right no-repeat #80C8E5;
	cursor:pointer;
	}    
	.error
	{
		color:#F00;
	}
	.error_bord
	{
		border: 1px solid #efefef;
	}    
	.editlnk
	{
	
	}
	.cancellnk
	{
	display:none
	
	}
</style>
</head>
<body>
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
            <div class="art-Sheet-body">
                <!--<div id="header_css">
                <img src="/images/recipe_logo.png" width="372" height="57" />	
                </div>-->
					<?php $this->load->view('includes/add_recipe_header'); ?>
                <div class="art-contentLayout">
                    <div class="art-content-inner">
                        <div class="art-Post">
                            <div class="art-Post-tl"></div>
                            <div class="art-Post-tr"></div>
                            <div class="art-Post-bl"></div>
                            <div class="art-Post-br"></div>
                            <div class="art-Post-tc"></div>
                            <div class="art-Post-bc"></div>
                            <div class="art-Post-cl"></div>
                            <div class="art-Post-cr"></div>
                            <div class="art-Post-cc"></div>
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                        <div id="viewRecipe">
                                <div id="bigFont">Ingredients </div><Br />
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><div id="message"><?php //print_r($this->session);print_r($_SESSION);//
	echo $this->session->flashdata('message1'); ?></div>
      <div align="left" id="dv_add">
  <?php echo form_open('gredient/add_gredient'); ?>
  <table cellpadding="0" cellspacing="0" width="100%">
    
  <tr><td align="left"><div align="left">
    <h3>&nbsp;</h3></div></td></tr>
  <tr>
  <td style="padding:4px; padding-left:10px;" class="comment_box">
  <table width="100%" border="0">
    <tr class="recipe_header_sub">
      <td width="13%">Gradient Name</td>
      <td width="6%">Quantity</td>
      <td width="11%">Measure</td>
      <td width="5%">Rate</td>
      <td width="12%">Amount Per KG</td>
      <td width="12%">Purchased From</td>
      <td width="8%">Brand</td>
      <td width="29%" colspan="2">Contact</td>
      </tr>
    <tr>
      <td><input type="text" name="ingRow" id="ingRow" size="20" value=""   /><span id="ingRowInfo"></span></td>
      <td><input type="text" name="qtyRow" id="qtyRow" size="5" value="0"  onkeyup="calc();"/><span id="qtyRowInfo"></span></td>
      <td>
        <select name="measure" id="measure" onchange="calc();">
          <option value="1000">Gram</option>
          <option value="1">KiloGram</option>
          <option value="1">Liter</option>
          <option value="4.35">Cup</option>
          <option value="200">TeaSpoon</option>
          <option value="66.67">TableSpoon</option>
          <option value="35.71">Ounce</option>
          <option value="2.20">Pound</option>
          </select>
        </td>
      <td><input type="text" name="rateRow" id="rateRow" size="5" value="0" onkeyup="calc();" /><span id="rateRowInfo"></span></td>
      <td><input type="text" name="amtKg" id="amtKg" size="5" value="0" readonly="readonly"  /></td>
      <td><input type="text" name="purFrom" id="purFrom" size="10" value=""  /></td>
      <td><input type="text" name="brand" id="brand" size="10" value=""  /></td>
      <td><input type="text" name="contact" id="contact" size="10" value=""  /></td>
      <td><span class="comment_box" style="padding:4px; padding-left:10px;">
        <input type="button"  value="Add"  id="addG" name="Button" class="comment_button"/>
      </span></td>
      </tr>
    </table></td>
    
  </tr>
    
  </table>
  <?php echo form_close(); ?>
        
  </div>
      </td>
  </tr>
  <tr>
    <td colspan="2"><input type="button" name="editall" value="Edit All" onclick="editAll();"  />
<div style="height:7px"></div>
<div id="flash" align="left"  ></div>
<div class="display">
		<div id="display">
			<?php 
			echo $this->view($content); ?>
		</div>
</div>
    </td>
    </tr>
  <tr>
    <td width="69%"></td>
    <td width="31%">&nbsp;</td>
  </tr>
</table>                        </div>
                        </div>
                      
                        
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
