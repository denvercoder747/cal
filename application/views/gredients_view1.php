	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/themes/blue/style.css" type="text/css" media="print, projection, screen" />
    <form name="editGre" method="post" action="<?php echo base_url();?>index.php/gredient/edit_gredientAll">
<table id="tablesorter-demo" border="0" cellpadding="0" cellspacing="1" width="100%" style="border-collapse:collapse;">
		<thead>
			<tr align="center" bgcolor="#9BBB58" style="color:#FFFBF0;height:30px;">
				<th width="6%">Sl No</th>
			  <th width="18%" align="left">Ingredient Name</th>
			  <th width="9%" align="right">Quantity</th>
			  <th width="9%" align="right">Measure</th>
			  <th width="5%" align="right">Rate</th>
			  <th width="16%" align="right">Amount Per KG</th>
			  <th width="16%">Purchased From</th>
			  <th width="6%">Brand</th>
			  <th width="8%">Contact</th>
				<th width="7%">&nbsp;</th>
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
        <td height="20" align="left"><span id="first_" class="text"><?php echo $grad->name; ?></span></td>
       <td align="right"><span id="second_" class="text"><?php echo $qty_tex; ?></span></td>
         <td align="right"><span id="third_" class="text"><?php echo $measure_tex; ?></span><input type="hidden" name="measure1[]" id="measure1_" value="<?php echo $grad->measure; ?>"  />
         </td>
       <td align="right"><span id="fourth_" class="text"><?php echo $grad->price; ?></span></td>
        <td align="right"><span id="fifth_" class="text"><?php echo $grad->amount_kg; ?></span></td>
        <td align="center"><span id="six_" class="text"><?php echo $grad->purchased_from ; ?></span></td>
        <td align="center"><span id="seven_" class="text"><?php echo $grad->brand; ?></span></td>
        <td align="center"><span id="eight_" class="text"><?php echo $grad->contact; ?></span></td>
        <td align="center"><a href="<?php echo base_url();?>index.php/gredient/gredient_edit/<?php echo $grad->gradient_id;?>"><img src="<?php echo base_url();?>images/edit_icon.png" width="20" height="20" title="Edit" /></a><input type="hidden" value="<?php echo $grad->gradient_id; ?>" id="ten_input_" name="ten_input[]" /></td>
      </tr>       <?php $incr++;//}?>
						<?php endforeach; ?>
                                
						<?php else : ?>	
	<tr class="edit_tr">
	  <td colspan="10" align="center">No Ingredients Found.</td>
	  </tr>
                       
                        <?php endif; ?>
        </tbody>
	</table>	
</form>