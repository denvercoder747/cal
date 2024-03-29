<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Calcipe Admin Panel</title>
<link rel="stylesheet" href="/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "/images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="/css/datePicker.css" type="text/css" />
<script src="/js/jquery/date.js" type="text/javascript"></script>
<script src="/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
$('#date-pick2')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects2($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects2(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects2(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d1 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m1 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y1 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
var updateSelects2 = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d2 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m2 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y2 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d1, #m1, #y1')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y1').val(),
						$('#m1').val()-1,
						$('#d1').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);
$('#d2, #m2, #y2')
	.bind(
		'change',
		function()
		{
			var d2 = new Date(
						$('#y2').val(),
						$('#m2').val()-1,
						$('#d2').val()
					);
			$('#date-pick2').dpSetSelected(d2.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());
updateSelects2(today.getTime());

// and update the datePicker to reflect it...
$('#d1').trigger('change');
$('#d2').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->

		<?php //$this->load->view('includes/admin/user_header');?>
		<?php $this->load->view('includes/admin/admin_header');?>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
    
		<h1>Membership Benefits Settings</h1>
	</div>
	<!-- end page-heading -->
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red --><?php if($this->session->flashdata('Failure_message')){ ?>
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left"><?php echo $this->session->flashdata('Failure_message'); ?></td>
					<td class="red-right"><a class="close-red"><img src="/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php }?>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue" style="display:none">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="/images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green --><?php if($this->session->flashdata('Success_message')){ ?>
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo $this->session->flashdata('Success_message'); ?></td>
					<td class="green-right"><a class="close-green"><img src="/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div><?php }?>
				<!--  end message-green -->
    <form name="profile" id="profile" action="set_benefits" method="post" >
		<table width="100%" border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr><td align="left"><input type="submit" value="Update" name="S1" onclick="if (!confirm('Are you sure you want to Update ?')) {return false;}" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: left;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"   /></td></tr>
		<tr>
		  <td style="width:250px;" rowspan="14" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  id="id-form2">
		  <tr>
		    <th align="left">BENEFITS</th>
		    </tr>
		  <tr>
		    <td height="42">Add Recipe:</td>
		    </tr>
		  <tr>
		    <td height="42">Edit Recipe:</td>
		    </tr>
		  <tr>
		    <td height="42">Multi Recipe:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Multi Recipe Storage:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Recipe Print:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Recipe Duplicate:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Recipe to PDF:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Free Usage Validity:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Add Ingredients:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Edit Ingredients:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Service Ads:</td>
		    </tr>
		  <tr>
		    <td height="42" valign="top">Recipe Indent Calculation:</td>
		    </tr>
		  </table></td>
<?php if(isset($records)) : foreach($records as $row) : ?>     
		  <td rowspan="14" align="left" valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  id="id-form2">
		  <tr>
		    <th align="left"><?php echo $row->recipe_type;?></th>
		    </tr>
		  <tr>
		    <td height="38"><select name="add_recipe_<?php echo $row->id_limits;?>" id="add_recipe_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->add_recipe=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->add_recipe=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38"><select name="edit_recipe_<?php echo $row->id_limits;?>" id="edit_recipe_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->edit_recipe=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->edit_recipe=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38"><select name="multi_recipe_<?php echo $row->id_limits;?>" id="multi_recipe_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->multi_recipe=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->multi_recipe=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="multi_recipe_stor_<?php echo $row->id_limits;?>" id="multi_recipe_stor_<?php echo $row->id_limits;?>" class="styledselect_pages">
		      <option value="10000" <?php if($row->multi_recipe_storage==10000){?> selected="selected" <?php }?>>Unlimited</option>
		      <?php for($ifree=0;$ifree<=100;$ifree++)
		  {?>
		      <option value="<?php echo $ifree;?>" <?php if($row->multi_recipe_storage==$ifree){?> selected="selected" <?php }?>><?php echo $ifree;?></option>
		      <?php }?>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="recipe_print_<?php echo $row->id_limits;?>" id="recipe_print_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->recipe_print=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->recipe_print=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="recipe_duplicate_<?php echo $row->id_limits;?>" id="recipe_duplicate_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->recipe_duplicate=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->recipe_duplicate=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="recipe_pdf_<?php echo $row->id_limits;?>" id="recipe_pdf_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->recipe_pdf=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->recipe_pdf=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="usage_validity_<?php echo $row->id_limits;?>" id="usage_validity_<?php echo $row->id_limits;?>" class="styledselect_pages">
		      <option value="15" <?php if($row->free_usage_validate==15){?> selected="selected" <?php }?>>15 Days</option>
		      <option value="30" <?php if($row->free_usage_validate==30){?> selected="selected" <?php }?>>30 Days</option>
		      <option value="45" <?php if($row->free_usage_validate==45){?> selected="selected" <?php }?>>45 Days</option>
		      <option value="60" <?php if($row->free_usage_validate==60){?> selected="selected" <?php }?>>60 Days</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="add_ingredient_<?php echo $row->id_limits;?>" id="add_ingredient_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->add_ingredient=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->add_ingredient=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="edit_ingredient_<?php echo $row->id_limits;?>" id="edit_ingredient_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->edit_ingredient=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->edit_ingredient=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="service_ads_<?php echo $row->id_limits;?>" id="service_ads_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->service_ads=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->service_ads=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  <tr>
		    <td height="38" valign="top"><select name="indent_calculation_<?php echo $row->id_limits;?>" id="indent_calculation_<?php echo $row->id_limits;?>" class="styledselect_form_2">
		      <option value="No" <?php if($row->indent_calculation=="No"){?> selected="selected" <?php }?>>No</option>
		      <option value="Yes" <?php if($row->indent_calculation=="Yes"){?> selected="selected" <?php }?>>Yes</option>
		      </select></td>
		    </tr>
		  </table>          </td>
          
<?php endforeach;?>
		  </tr>
	<?php else : ?>	
		<tr>
		  <th valign="top" rowspan="14"></th>
	<h2>No Plans were Found.</h2>
	<?php endif; ?>
</table>
		
    </form>
             <!--  start product-table ..................................................................................... -->
				
			  <!--  end product-table................................... --> 
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... --><!-- end actions-box........... -->
			
			<!--  start paging..................................................... --><!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<?php $this->load->view('includes/admin/admin_footer');?><!-- end footer -->
 
</body>
</html>