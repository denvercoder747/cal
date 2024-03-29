	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>tablesort/themes/blue/style.css" type="text/css" media="print, projection, screen" />
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/js/chili/chili-1.8b.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>tablesort/js/docs.js"></script>
	<script type="text/javascript">
	$(function() {		
		$("#tablesorter-demo").tablesorter({sortList:[[0,0],[2,1]], widgets: ['zebra']});
		$("#options").tablesorter({sortList: [[0,0]], headers: { 3:{sorter: false}, 4:{sorter: false}}});
	});	
	</script>
<div id="display" align="left">
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
			</tr>
		</thead>
		<tbody>
				<?php 
				$incr=1;
				foreach($gredients as $grad){ ?>
      <tr>
        <td><?php echo $incr;?></td>
        <td><?php echo $grad->name; ?></td>
        <td><?php echo $grad->quantity; ?></td>
         <td><?php echo $grad->measure; ?></td>
       <td><?php echo $grad->price; ?></td>
        <td><?php echo $grad->amount_kg; ?></td>
        <td><?php echo $grad->purchased_from ; ?></td>
        <td><?php echo $grad->brand; ?></td>
        <td><?php echo $grad->contact; ?></td>
      </tr>
       <?php $incr++;}?>
			</tr>
		</tbody>
	</table>	
 </div>