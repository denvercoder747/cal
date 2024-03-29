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
    <div id="contentWrapper">
    	<div id="dashboard_style">
     <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2">
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
    <td colspan="2">
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
    <td width="69%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
  </tr>
</table>
</div>
    </div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
