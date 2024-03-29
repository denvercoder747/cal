	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/themes/blue/style.css" type="text/css" media="print, projection, screen" />
    <script type="text/javascript">
		function numbersonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if ((unicode != 46) && (unicode<48||unicode>57)) //if not a number
		return false //disable key press
		}	
		function stringsonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if ((unicode<65 || unicode>90) && (unicode<97 || unicode>122)) //if not a number
		return false //disable key press
		}
		}	
		function alphanumberonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
		if ((unicode<65 || unicode>90) && (unicode<97 || unicode>122) && (unicode<48||unicode>57)) //if not a number
		return false //disable key press
		}
		}	
	</script>
    <form name="editGre" method="post" action="<?php echo base_url();?>index.php/gredient/edit_gredientAll">
<table id="tablesorter-demo" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
		<thead>
			<tr align="center" bgcolor="#9BBB58" style="color:#FFFBF0;height:30px;">
				<th>Sl No</th>
			  <th>Ingredient Name</th>
			  <th align="right">Quantity</th>
			  <th>Measure</th>
			  <th align="right">Rate</th>
			  <th align="right">Amount Per KG</th>
			  <th>Purchased From</th>
			  <th>Brand</th>
			  <th>Contact</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
				<?php 
				$incr=1; if(count($gredients)) : foreach($gredients as $grad) : 
					if(($incr%2)==1){$classrpw="style=\"background-color:#FFFFFF\"";}else{$classrpw="style=\"background-color:#E6EED6\"";}
			//	foreach($gredients as $grad){ 
				$id=$incr;
				$gid=$grad->gradient_id;
				?>
                        <?php
					$measure_tex="";
					$qty_tex="";
					$number = $grad->quantity;
					$dpart = $number - (int)$number;
					if($dpart==00)
					{
					$qty_tex=number_format($grad->quantity,1);;
					}
					else
					{
					$qty_tex=number_format($grad->quantity,2);;
					}
				switch ($grad->measure) {
				case "KiloGram":
					$measure_tex="Kg";
					break;
				case "Gram":
					$measure_tex="g";
					break;
				case "Liter":
					$measure_tex="ltr";
					break;
				case "Mililiter":
					$measure_tex="ml";
					break;
				case "Cup":
					$measure_tex="cup";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "TeaSpoon":
					$measure_tex="tsp";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "TableSpoon":
					$measure_tex="tbsp";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "Ounce":
					$measure_tex="Oz";
					break;
				case "Pound":
					$measure_tex="lb";
					break;
			}		
						?>
<?php /*?>      <tr id="<?php echo $id; ?>" class="edit_tr">
        <td align="center"><?php echo $incr;?></td>
        <td align="left"><span id="first_<?php echo $id; ?>" class="text"><?php echo $grad->name; ?></span></td>
      <td align="center"><span id="second_<?php echo $id; ?>" class="text"><?php echo $grad->quantity; ?></span></td>
         <td align="center"><span id="third_<?php echo $id; ?>" class="text"><?php echo $grad->measure; ?></span></td>
       <td align="center"><span id="fourth_<?php echo $id; ?>" class="text"><?php echo $grad->price; ?></span></td>
        <td align="center"><span id="fifth_<?php echo $id; ?>" class="text"><?php echo $grad->amount_kg; ?></span></td>
        <td align="center"><span id="six_<?php echo $id; ?>" class="text"><?php echo $grad->purchased_from ; ?></span></td>
        <td align="center"><span id="seven_<?php echo $id; ?>" class="text"><?php echo $grad->brand; ?></span></td>
        <td align="center"><span id="eight_<?php echo $id; ?>" class="text"><?php echo $grad->contact; ?></span></td>
        <td align="center"><a href="<?php echo base_url();?>index.php/gredient/gredient_edit/<?php echo $id;?>"><img src="<?php echo base_url();?>images/edit_icon.jpeg" width="20" height="20" title="Edit" /></a></td>
        </tr>
<?php */?>
	<tr id="<?php echo $id; ?>" class="edit_tr" <?php echo $classrpw;?>>
        <td align="right"><?php echo $incr;?></td>
        <td align="left"><span id="first_<?php echo $id; ?>" class="text"><?php echo $grad->name; ?></span><input name="first_input[]" type="text" class="editbox" id="first_input_<?php echo $id; ?>" style="height:16px;"  onkeypress="return stringsonly(event)" value="<?php echo $grad->name; ?>" maxlength="50" /></td>
       <td align="right"><span id="second_<?php echo $id; ?>" class="text"><?php echo $qty_tex; ?></span><input type="text" value="<?php echo $grad->quantity; ?>" class="editbox"   name="second_input[]" id="second_input_<?php echo $id; ?>" onkeyup="calc1(<?php echo $id; ?>);"  style="width:65px;height:16px;text-align:right;" onkeypress="return numbersonly(event)"/></td>
         <td align="center"><span id="third_<?php echo $id; ?>" class="text"><?php echo $measure_tex; ?></span>
         <select class="editdrop" id="third_input_<?php echo $id; ?>" name="third_input[]" onchange="calc1(<?php echo $id; ?>);">
         <option value="1000"<?php if($grad->measure=="Gram"){?> selected="selected"<?php } ?>>Gram</option>
         <option value="1"<?php if($grad->measure=="KiloGram"){?> selected="selected"<?php } ?>>KiloGram</option>
         <option value="1"<?php if($grad->measure=="Liter"){?> selected="selected"<?php } ?>>Liter</option>
         <option value="1000"<?php if($grad->measure=="Mililiter"){?> selected="selected"<?php } ?>>Mililiter</option>
         <option value="4.35"<?php if($grad->measure=="Cup"){?> selected="selected"<?php } ?>>Cup</option>
         <option value="200"<?php if($grad->measure=="TeaSpoon"){?> selected="selected"<?php } ?>>TeaSpoon</option>
         <option value="66.67"<?php if($grad->measure=="TableSpoon"){?> selected="selected"<?php } ?>>TableSpoon</option>
         <option value="35.71"<?php if($grad->measure=="Ounce"){?> selected="selected"<?php } ?>>Ounce</option>
         <option value="2.20"<?php if($grad->measure=="Pound"){?> selected="selected"<?php } ?>>Pound</option>
         </select><input type="hidden" name="measure1[]" id="measure1_<?php echo $id; ?>" value="<?php echo $grad->measure; ?>"  />
         </td>
       <td align="right"><span id="fourth_<?php echo $id; ?>" class="text"><?php echo $grad->price; ?></span><input type="text" value="<?php echo $grad->price; ?>" class="editbox" name="fourth_input[]" id="fourth_input_<?php echo $id; ?>" onkeyup="calc1(<?php echo $id; ?>);"  style="width:65px;height:16px;text-align:right;" onkeypress="return numbersonly(event)" /></td>
        <td align="right"><span id="fifth_<?php echo $id; ?>" class="text"><?php echo $grad->amount_kg; ?></span><input type="text" value="<?php echo $grad->amount_kg; ?>" class="editbox" name="fifth_input[]" id="fifth_input_<?php echo $id; ?>" readonly="readonly" style="width:65px;height:16px;text-align:right;" /></td>
        <td align="center"><span id="six_<?php echo $id; ?>" class="text"><?php echo $grad->purchased_from ; ?></span><input name="six_input[]" type="text" class="editbox" id="six_input_<?php echo $id; ?>"  style="height:16px;" value="<?php echo $grad->purchased_from; ?>" maxlength="30" onkeypress="return alphanumberonly(event)"/></td>
        <td align="center"><span id="seven_<?php echo $id; ?>" class="text"><?php echo $grad->brand; ?></span><input name="seven_input[]" type="text" class="editbox" id="seven_input_<?php echo $id; ?>" style="height:16px;" value="<?php echo $grad->brand; ?>" maxlength="30"  onkeypress="return alphanumberonly(event)"/></td>
        <td align="center"><span id="eight_<?php echo $id; ?>" class="text"><?php echo $grad->contact; ?></span><input name="eight_input[]" type="text" class="editbox" id="eight_input_<?php echo $id; ?>" style="height:16px;" value="<?php echo $grad->contact; ?>" maxlength="20"  onkeypress="return alphanumberonly(event)"/></td>
        <input type="hidden" value="<?php echo $grad->gradient_id; ?>" id="ten_input_<?php echo $id; ?>" name="ten_input[]" />
      </tr>       <?php $incr++;//}?>
						<?php endforeach; ?>
	<tr class="edit_tr">
	  <td colspan="10"><input class="calcipeButton" type="submit" name="S1" id="S1" value="Update All" style="display:none"  /><input type="hidden" name="total_row" value="<?php echo $incr-1; ?>" id="total_row"  /></td>
	  </tr>
                                </td></tr>
                                
						<?php else : ?>	
	<tr class="edit_tr">
	  <td colspan="10" align="center">No Ingredients Found.</td>
	  </tr>
                       
                        <?php endif; ?>
        </tbody>
	</table>	
    
</form>