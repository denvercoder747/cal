
<?php if(isset($records)) : foreach($records as $row) : ?>     

		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" style="color:#000; border:1px solid #CBE3F8">
        <tr>
            <td colspan="2"><h4>Billing Information</h4></td>
          </tr>
		<tr>
			<td valign="top">First Name:</td>
			<td><?php echo $row->first_name; ?></td>
		  </tr>
		<tr>
			<td valign="top">Middle Name:</td>

			<td><?php echo $row->middle_name; ?></td>
		  </tr>
		<tr>
		  <td valign="top">Last Name:</td>
		  <td><?php echo $row->last_name; ?></td>
		  </tr>
		<tr>
		  <td valign="top">Company:</td>
		  <td><?php echo $row->company; ?></td>
		  </tr>
		<tr>
		  <td valign="top">Address Line1:</td>
		  <td><?php echo $row->address1; ?></td>
		  </tr>
		<tr>
		  <td valign="top">Address Line2:</td>
		  <td><?php echo $row->address2; ?></td>
		  </tr>
		<tr>
		  <td valign="top">Country:</td>
		  <td><?php echo $row->country_name; ?></td>
		  </tr>
	<tr>
		<td>State:</td>
		<td><?php echo $row->state_name; ?></td>
		  </tr>
	<tr>
		<td>City:</td>
		<td><?php echo $row->city_name; ?></td>
		  </tr>
	<tr>
		<td>Zipcode:</td>
		<td><?php echo $row->zip; ?></td>
		  </tr>
	<tr>
		<td>Phone:</td>
		<td><?php echo $row->contact_no; ?></td>
		  </tr>
	<tr>
		<td>Fax:</td>
		<td><?php echo $row->fax_no; ?></td>
		  </tr>
	<tr>
		<td>* E-mail:</td>
		<td><?php echo $row->email; ?></td>
		  </tr>
	    <tr>
	      <td valign="top">&nbsp;</td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <td valign="top"><h4>Calculation Basics</h4></td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <td valign="top">Currency</td>
	      <td><?php echo $row->currency; ?></td>
	      </tr>
	    <tr>
	      <td valign="top">Weight Per Portion</td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	      <td valign="top">Food Loss</td>
	      <td><?php echo $row->food_loss; ?></td>
	      </tr>
	    <tr>
	      <td valign="top">Profit Amount</td>
	      <td><?php echo $row->profit; ?></td>
	      </tr>
	    <tr>
	      <td valign="top">&nbsp;</td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
	  <td valign="top">About Me:</td>
	  <td>&nbsp;</td>
	  </tr>

	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>

	<tr>
	  <td>Photo:</td>
	  <td valign="top"><?php if($row->photo != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->photo;?>" width="120" height="100" />
    	                          <?php } ?></td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td valign="top">
	    </td>
	  </tr>
	</table>
	<!-- end id-form  -->
<?php endforeach;?>
	<?php else : ?>	
<h2>No Profile were Found.</h2>
	<?php endif; ?>
