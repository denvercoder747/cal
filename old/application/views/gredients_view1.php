	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/themes/blue/style.css" type="text/css" media="print, projection, screen" />
	
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/jquery.tablesorter.js"></script>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0],[2,1]], widgets: ['zebra']});
		$("#options").tablesorter({sortList: [[0,0]], headers: { 3:{sorter: false}, 4:{sorter: false}}});
	});	
	</script>
<table id="tablesorter-demo" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead>
			<tr>
				<th>Sl No</th>
				<th>Gradient Name</th>
				<th>Quantity</th>
				<th>Measure</th>
				<th>Rate</th>
				<th>Amount Per KG</th>
				<th>Purchased From</th>
				<th>Brand</th>
				<th>Contact</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
				<?php 
				$incr=1;
				foreach($gredients as $grad){ 
				$id=$grad->gradient_id;
				?>
      <tr id="<?php echo $id; ?>" class="edit_tr">
        <td><?php echo $incr;?></td>
        <td><span id="first_<?php echo $id; ?>" class="text"><?php echo $grad->name; ?></span><input type="text" value="<?php echo $grad->name; ?>" class="editbox" id="first_input_<?php echo $id; ?>" /></td>
        <td><span id="second_<?php echo $id; ?>" class="text"><?php echo $grad->quantity; ?></span><input type="text" value="<?php echo $grad->quantity; ?>" class="editbox" id="second_input_<?php echo $id; ?>" onkeypress="calc1(<?php echo $id; ?>);" /></td>
         <td><span id="third_<?php echo $id; ?>" class="text"><?php echo $grad->measure; ?></span>
         <select class="editdrop" id="third_input_<?php echo $id; ?>" onchange="calc1(<?php echo $id; ?>);">
         <option value="1000"<?php if($grad->measure=="Gram"){?> selected="selected"<?php } ?>>Gram</option>
         <option value="1"<?php if($grad->measure=="KiloGram"){?> selected="selected"<?php } ?>>KiloGram</option>
         <option value="1"<?php if($grad->measure=="Liter"){?> selected="selected"<?php } ?>>Liter</option>
         <option value="4.35"<?php if($grad->measure=="Cup"){?> selected="selected"<?php } ?>>Cup</option>
         <option value="200"<?php if($grad->measure=="TeaSpoon"){?> selected="selected"<?php } ?>>TeaSpoon</option>
         <option value="66.67"<?php if($grad->measure=="TableSpoon"){?> selected="selected"<?php } ?>>TableSpoon</option>
         <option value="35.71"<?php if($grad->measure=="Ounce"){?> selected="selected"<?php } ?>>Ounce</option>
         <option value="2.20"<?php if($grad->measure=="Pound"){?> selected="selected"<?php } ?>>Pound</option>
         </select>
         </td>
       <td><span id="fourth_<?php echo $id; ?>" class="text"><?php echo $grad->price; ?></span><input type="text" value="<?php echo $grad->price; ?>" class="editbox" id="fourth_input_<?php echo $id; ?>" onkeypress="calc1(<?php echo $id; ?>);" /></td>
        <td><span id="fifth_<?php echo $id; ?>" class="text"><?php echo $grad->amount_kg; ?></span><input type="text" value="<?php echo $grad->amount_kg; ?>" class="editbox" id="fifth_input_<?php echo $id; ?>" readonly="readonly" /></td>
        <td><span id="six_<?php echo $id; ?>" class="text"><?php echo $grad->purchased_from ; ?></span><input type="text" value="<?php echo $grad->purchased_from; ?>" class="editbox" id="six_input_<?php echo $id; ?>" /></td>
        <td><span id="seven_<?php echo $id; ?>" class="text"><?php echo $grad->brand; ?></span><input type="text" value="<?php echo $grad->brand; ?>" class="editbox" id="seven_input_<?php echo $id; ?>" /></td>
        <td><span id="eight_<?php echo $id; ?>" class="text"><?php echo $grad->contact; ?></span><input type="text" value="<?php echo $grad->contact; ?>" class="editbox" id="eight_input_<?php echo $id; ?>" /></td>
        <td><span id="nine_<?php echo $id; ?>" class="text"></span><input type="button" value="Save" class="editbot" id="nine_input_<?php echo $id; ?>" onclick="saveg(<?php echo $id; ?>);"  /><input type="button" value="Cancel" class="cancellnk" id="tweleve_input_<?php echo $id; ?>"  /><input type="hidden" value="<?php echo $grad->gradient_id; ?>" class="editbox" id="ten_input_<?php echo $id; ?>"  /><input name="eve_input_<?php echo $id; ?>" type="button" class="editlnk" id="<?php echo $id; ?>" value="Edit" ></td>
      </tr>
       <?php $incr++;}?>
		</tbody>
	</table>	
