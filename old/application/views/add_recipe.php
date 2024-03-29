<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>untitled</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/css/recipeForm.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/pogress.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec1.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_recipe.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/searchfield.js"></script>
</head>
<body onload="ref();">
	<h2>Welcome Back, <?php echo $this->session->userdata('username'); ?>!<?php echo $this->session->userdata('user_id'); ?></h2><h4 align="right"><?php echo anchor('login/logout', 'Logout'); ?></h4>
     <p>This section represents the area that only logged in members can access.</p><div><?php echo anchor('site/dash_board', 'Dash Board'); ?></div>
     <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="69%"><input name="textfield" type="text" id="textfield" size="20" maxlength="50"><div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text">0% Complete</div>
	</div><div id="test"></div></td>
    <td width="31%"><input type="submit" name="addr" id="addr" value="Add recipe">
      <input type="submit" name="addg" id="addg" value="Add Ingradient">
      <input type="submit" name="button3" id="button3" value="Submit">
    <input type="submit" name="button4" id="button4" value="Submit"></td>
  </tr>
  <tr>
    <td colspan="2">
    <?php 
		$attribute = array ("id" => "recipe", "Class "=>"Form");
		$hidden = array("Parent_id"=>"0");
	echo form_open_multipart("home/add_recipe", $attribute, $hidden); ?>

    <table width="100%" border="0">
      <tr>
        <td colspan="2"><div id="first_step">
        
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td colspan="2"><span id="nameInfo"></span><span id="recipe_nameInfo"></span><span id="descInfo"></span></td>
            </tr>
          <tr>
            <td><input type="submit" id="S1" name="S1" value="Submit" /><input type="button" name="slickbox" id="slickbox" value="Final"  /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="45%"><input type="file" name="userfile" id="userfile"></td>
            <td width="55%"><input type="text" name="recipe_name" id="recipe_name"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><textarea name="short_desc" id="short_desc" cols="45" rows="5"></textarea></td>
          </tr>
        </table>
        </div>
        </td>
        <td width="44%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="22%" align="center"><input name="rcp_weight" type="text" id="rcp_weight" size="10" onblur="calculate();"></td>
            <td width="18%" align="center"><input name="food_loss" type="text" id="food_loss" size="10" value="0" onblur="calculate();"></td>
            <td width="24%" align="center"><input name="finished_weight" type="text" id="finished_weight" size="10" readonly="readonly" onblur="calculate();"> </td>
            <td width="21%" align="center"><input name="weight" type="text" id="weight" size="10" onblur="calculate();"></td>
            <td width="15%" align="center"><input name="per_pc_cost" type="text" id="per_pc_cost" size="10" readonly="readonly" onblur="calculate();"></td>
            </tr>
          <tr>
            <td align="center">Recipe Weight</td>
            <td align="center">Food Loss</td>
            <td align="center">Finished Weight</td>
            <td align="center">Weight/Portion</td>
            <td align="center">Per PeiceCost</td>
            </tr>
          <tr>
            <td align="center"><input name="numbers" type="text" id="numbers" size="10"></td>
            <td align="center"><input name="yield" type="text" id="yield" size="10" readonly="readonly"></td>
            <td align="center"><input name="profit" type="text" id="profit" size="10"></td>
            <td align="center"><input name="selling_price" type="text" id="selling_price" size="10" readonly="readonly"></td>
            <td align="center"><input name="per_kilo_cost" type="text" id="per_kilo_cost" size="10" readonly="readonly"></td>
            </tr>
          <tr>
            <td align="center">Numbers</td>
            <td align="center">Yield</td>
            <td align="center">Profit%</td>
            <td align="center">Sellling Price</td>
            <td align="center">Per Kilo Cost</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2"><input name="tot_row" type="hidden" id="tot_row" value="0" >
            Total Quantity
            <input name="tot_qty" type="text" id="tot_qty" value="0" readonly="readonly" >
              Total Amt
              <input type="text" name="tot_amt" id="tot_amt" value="0" readonly="readonly"  >
            <table width="100%" border="0" cellspacing="2" cellpadding="2" id="tblSample">
              <tr>
        <td>Ingradients</td>
        <td>Quantity(in grams)</td>
        <td>Rate</td>
        <td>Amount</td>
        <td>&nbsp;<div class="suggestionsBox" id="suggestions" style="display: none;"></div>
        <img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        <div class="suggestionList" id="autoSuggestionsList"></div><a href="#">Delete</a></td>
      </tr>
    </table>
</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="11%"><input type="button" name="B1" id="B1" value="Add Gradients" onClick="addIng();"></td>
        <td width="45%"><input type="button" name="B2" id="B2"  value="Remove" onClick="removeRowFromTable();calculate();" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">Procedure:</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><textarea name="long_desc" cols="70" rows="5" id="long_desc"></textarea></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <?php  echo form_close(); ?></form>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-783567-1";
urchinTracker();
</script>
	
</body>
</html>	