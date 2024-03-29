    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/core1.js"></script>
    <script>
$(document).ready(function(){
	$('#rateRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#qtyRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
		document.getElementById('rateRow').value=1;
		document.getElementById('qtyRow').value=1;
		document.getElementById('measure').selectedIndex=1;
		document.getElementById('amtKg').value=1;
});
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
	</script>
    <style>
	.error
	{
	  color:#F00;	
	}
	.success
	{
	  color:#2A00FF;	
	}
</style>
   	<div id="contentWrapper">
    	<div id="dashboard_style">
     <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2">
      <div align="left" id="dv_add">
  <?php echo form_open('gredient/add_gredient'); ?>
  <table cellpadding="0" cellspacing="0" width="500px">
    
  <tr><td align="left"><div id="msg"></div></td></tr>
  <tr>
  <td style="padding:4px; padding-left:10px;" class="comment_box">
  <table width="100%" border="0">
    <tr>
      <td width="11%">Sl No</td>
      <td width="45%">Gradient Name</td>
      <td width="44%">Quantity</td>
      <td width="44%">Measure</td>
      <td width="44%">Rate</td>
      <td width="44%">Amount Per KG</td>
      <td width="44%">Purchased From</td>
      <td width="44%">Brand</td>
      <td width="44%">Contact</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="text" name="ingRow" id="ingRow" size="20" value=""   /><span id="ingRowInfo"></span></td>
      <td><input type="text" name="qtyRow" id="qtyRow" size="20" value="0"  onkeyup="calc();"/><span id="qtyRowInfo"></span></td>
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
      <td><input type="text" name="rateRow" id="rateRow" size="20" value="0" onkeyup="calc();" /><span id="rateRowInfo"></span></td>
      <td><input type="text" name="amtKg" id="amtKg" size="20" value="0" readonly="readonly"  /></td>
      <td><input type="text" name="purFrom" id="purFrom" size="20" value=""  /></td>
      <td><input type="text" name="brand" id="brand" size="20" value=""  /></td>
      <td><input type="text" name="contact" id="contact" size="20" value=""  /></td>
      </tr>
    </table>
  <input type="button"  value="Add"  id="addG" name="Button" class="comment_button"/>
  </td>
    
  </tr>
    
  </table>
  <?php echo form_close(); ?>
        
  </div>
      </td>
  </tr>
  
</table>
</div>
    </div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
