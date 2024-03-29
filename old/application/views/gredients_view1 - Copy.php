<div id="display" align="left">
    <table width="100%" border="0">
 	<thead>
		<tr>
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
	</thead>
	<tbody>
				<?php 
				$incr=1;
				foreach($gredients as $grad){ ?>
      <tr <?php if($incr&1){ echo 'class="alt"'; }?>>
        <td>&nbsp;</td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->name; ?>"  /></td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->quantity; ?>"  /></td>
         <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->measure; ?>"  /></td>
       <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->price; ?>"  /></td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->amount_kg; ?>"  /></td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->purchased_from; ?>"  /></td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->brand; ?>"  /></td>
        <td><input type="text" name="ingRow[]" id="ingRow[]" size="20" value="<?php echo $grad->contact; ?>"  /></td>
      </tr>
       <?php $incr++;}?>
      <tr>
        <td colspan="9">&nbsp;</td>
        </tr>
       </tbody>
  </table>
 </div>