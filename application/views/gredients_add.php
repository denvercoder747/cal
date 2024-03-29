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
  <table cellpadding="0" cellspacing="0" width="800px">
    
  <tr><td align="left"><div id="message_new"></div></td></tr>
  <tr>
  <td style="padding:4px; padding-left:10px;" class="comment_box">
  <table width="100%" border="0">
    <tr style="background-color:#E6EEEE;">
      <th width="17%" height="20" style="font-size:10px;">Ingredient Name</th>
      <th width="13%" style="font-size:10px;">Quantity</th>
      <th width="14%" style="font-size:10px;">Measure</th>
      <th width="9%" style="font-size:10px;">Rate</th>
      <th width="13%" style="font-size:10px;">Amount Per KG</th>
      <th width="16%" style="font-size:10px;">Purchased From</th>
      <th width="9%" style="font-size:10px;">Brand</th>
      <th width="9%" style="font-size:10px;">Contact</th>
      </tr>
    <tr>
      <td><input name="ingRow" type="text" class="calcipeAmountBox" id="ingRow" tabindex="1" value="" size="20" maxlength="50"   /></td>
      <td><input type="text" name="qtyRow" class="calcipeAmountBox" style="text-align:right;" id="qtyRow" size="10" value="0"  onkeyup="calc();" tabindex="2"/></td>
      <td>
        <select name="measure" id="measure" onchange="calc();" tabindex="3">
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
      <td><input type="text" name="rateRow" style="text-align:right;"  id="rateRow" class="calcipeAmountBox" size="10" value="0" onkeyup="calc();" tabindex="4" /></td>
      <td><input type="text" name="amtKg" style="text-align:right;" id="amtKg" size="5" value="0" readonly="readonly" tabindex="5"  /></td>
      <td><input name="purFrom" type="text" id="purFrom"  tabindex="6" value="" size="10" maxlength="50" /></td>
      <td><input name="brand" type="text" id="brand" tabindex="7" value="" size="10" maxlength="30"  /></td>
      <td><input name="contact" type="text" id="contact" tabindex="8" value="" size="10" maxlength="20"  /></td>
    </tr>
    <tr>
      <td><span id="ingRowInfo"></span></td>
      <td><span id="qtyRowInfo"></span></td>
      <td>&nbsp;</td>
      <td><span id="rateRowInfo"></span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </table>
  <input type="button"  value="Add"  id="addG" name="Button" class="comment_button calcipeButton" tabindex="9"/>
  </td>
    
  </tr>
    
  </table><?php echo form_close(); ?>
        
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
