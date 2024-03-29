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
<script src="/js/jquery/ui.checkbox1.js" type="text/javascript"></script>
<script src="/js/jquery/jquery.bind.js" type="text/javascript"></script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
			$('#err1').hide();
			$('#err2').hide();
			$('#err3').hide();
			$('#err4').hide();
			$('#err5').hide();

$("#phone").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
$("#fax").keydown(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
	$('#profit').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	});
	$('#weight_per_portion').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	});
	$('#food_loss').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
	});
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
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<script>
function validate()
{
			$('#err1').hide();
			$('#err2').hide();
			$('#err3').hide();
			$('#err4').hide();
			$('#err5').hide();
		$('#first_name').removeClass('inp-form-error').addClass('inp-form');
		$('#last_name').removeClass('inp-form-error').addClass('inp-form');
	//	$('#sel_script').removeClass('inp-form-error').addClass('inp-form');
	if(!$.trim($('#first_name').val()).length)
	{
		$('#first_name').removeClass('inp-form').addClass('inp-form-error');
		$('#err1').show();
		return false;
		
	}
	if(!$.trim($('#last_name').val()).length)
	{
		$('#last_name').removeClass('inp-form').addClass('inp-form-error');
		$('#err2').show();
		return false;
		
	}
//	if(!$.trim($('#phone').val()).length)
//	{
//		$('#phone').removeClass('inp-form').addClass('inp-form-error');
//		$('#err3').show();
//		return false;
//		
//	}
//	if(!$.trim($('#fax').val()).length)
//	{
//		$('#fax').removeClass('inp-form').addClass('inp-form-error');
//		$('#err4').show();
//		return false;
//		
//	}
	if(!$.trim($('#email').val()).length)
	{
		$('#email').removeClass('inp-form').addClass('inp-form-error');
		$('#err5').show();
		return false;
		
	}
	if(!($('#email').search(/^[A-Za-z0-9_]{3,20}$/) > -1)) {
		$('#email').removeClass('inp-form').addClass('inp-form-error');
		$('#err5').show();
		return false;
	}
}
</script>

</head>
<body> 
<!-- Start: page-top-outer -->
		<?php //$this->load->view('includes/admin/user_header');?>
		<?php $this->load->view('includes/admin/admin_header');?>

<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->

<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Edit Users</h1>
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
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

	
	
		<!--  start step-holder --><!--  end step-holder -->
	
		<!-- start id-form -->
<?php if(isset($records)) : foreach($records as $row) : ?>     

             <form name="profile" id="profile" action="../update_profile" method="post" enctype="multipart/form-data" class="standardForm"  onsubmit="return validate();">
    <input type="hidden" name="UserId" id="UserId" value="<?php echo $row->user_id; ?>"  />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">First Name:</th>
			<td><input name="first_name" type="text" class="inp-form" id="first_name" value="<?php echo $row->first_name; ?>" /></td>
			<td><div id="err1">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div></td>
		</tr>
		<tr>
			<th valign="top">Middle Name:</th>

			<td><input name="middle_name" type="text" class="inp-form" id="middle_name" value="<?php echo $row->middle_name; ?>" /></td>
			<td>
			</td>
		</tr>
		<tr>
		  <th valign="top">Last Name:</th>
		  <td><input name="last_name" type="text" class="inp-form" id="last_name" value="<?php echo $row->last_name; ?>" /></td>
		  <td><div id="err2">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div></td>
		  </tr>
		<tr>
		  <th valign="top">Company:</th>
		  <td><input name="company" type="text" class="inp-form" id="company" value="<?php echo $row->company; ?>" /></td>
		  <td></td>
		  </tr>
		<tr>
		  <th valign="top">Address Line1:</th>
		  <td><input name="address" type="text" class="inp-form" id="address" value="<?php echo $row->address1; ?>" maxlength="50" /></td>
		  <td></td>
		  </tr>
		<tr>
		  <th valign="top">Address Line2:</th>
		  <td><input name="address2" type="text" class="inp-form" id="address2" value="<?php echo $row->address2; ?>" maxlength="50" /></td>
		  <td></td>
		  </tr>
		<tr>
		  <th valign="top">Country:</th>
		  <td><input name="country" type="text" class="inp-form" id="country" value="<?php echo $row->country_name; ?>" /></td>
		  <td></td>
		  </tr>
	<tr>
		<th>State:</th>
		<td><input name="state" type="text" class="inp-form" id="state" value="<?php echo $row->state_name; ?>"></td>
		  <td></td>
	</tr>
	<tr>
		<th>City:</th>
		<td><input name="city" type="text" class="inp-form" id="city" value="<?php echo $row->city_name; ?>"></td>
		  <td></td>
	</tr>
	<tr>
		<th>Zipcode:</th>
		<td><input name="zip" type="text" class="inp-form" value="<?php echo $row->zip; ?>"></td>
		  <td></td>
	</tr>
	<tr>
		<th>Phone:</th>
		<td><input name="phone" type="text" id="phone" class="inp-form" value="<?php echo $row->contact_no; ?>"></td>
		  <td><div id="err3">
          <div class="error-left"></div>
          <div class="error-inner">Enter Valid Number.</div>
          </div></td>
	</tr>
	<tr>
		<th>Fax:</th>
		<td><input name="fax" type="text" id="fax" class="inp-form" value="<?php echo $row->fax_no; ?>"></td>
		  <td><div id="err4">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div></td>
	</tr>
	<tr>
		<th>* E-mail:</th>
		<td><input name="email" type="text" class="inp-form" id="email" readonly="readonly" value="<?php echo $row->email; ?>"></td>
		  <td><div id="err5">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div></td>
	</tr>
		<tr>
		  <th valign="top">* Profit Amount(%):</th>
		  <td><input name="profit" id="profit" class="inp-form" type="text" value="<?php echo $row->profit; ?>"></td>
		  <td></td>
		  </tr>
	    <tr>
	      <th valign="top">Currency:</th>
	      <td><select name="currency">
      <option value="INR" <?php if($row->currency=="INR"){?> selected="selected" <?php }?>>INR</option>
      <option value="USD" <?php if($row->currency=="USD"){?> selected="selected" <?php }?>>USD</option>
      </select></td>
	      <td></td>
	      </tr>
	    <tr>
	      <th valign="top">Weight Per Portion</th>
	      <td><input name="weight_per_portion" id="weight_per_portion" class="inp-form" type="text" value="<?php echo $row->weight_per_portion; ?>" /></td>
	      <td></td>
	      </tr>
	    <tr>
	      <th valign="top">Food Loss</th>
	      <td><input name="food_loss" id="food_loss" class="inp-form" type="text" value="<?php echo $row->food_loss; ?>" /></td>
	      <td></td>
	      </tr>

	<tr>
	<th>Photo:</th>
	<td><input type="file" name="userfile" id="userfile"  class="file_1" /><input type="hidden" id="T3" name="T3" size="20" value="<?php echo $row->photo;?>" />
    	                          </td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div>
	</td>

	</tr>

	<tr>
	  <th>&nbsp;</th>
	  <td valign="top"><?php if($row->photo != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->photo;?>" width="120" height="100" />
    	                          <?php } ?></td>
	  <td></td>
	  </tr>
	<tr>
	  <th>&nbsp;</th>
	  <td valign="top">  
      
</td>
	  <td></td>
	  </tr>
	<tr>
	  <th>&nbsp;</th>
	  <td valign="top">
	    <input type="submit" value="" class="form-submit" />
	    <input type="reset" value="" class="form-reset"  />
	    </td>
	  <td></td>
	  </tr>
	</table>
</form>
	<!-- end id-form  -->
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Profile were Found.</h2>
	<?php endif; ?>
	</td>
	<td>

	<!--  start related-activities -->
	<div id="related-activities">
		
		<!--  start related-act-top -->
		<div id="related-act-top">
		<img src="/images/forms/header_related_act.gif" width="271" height="43" alt="" />

		</div>
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div id="related-act-bottom">
		
			<!--  start related-act-inner -->
    <!-- Start Membership Form -->
 <form name="update_plan" method="post" action="<?php echo base_url();?>index.php/admin/change_plan">
                    <input type="hidden" name="username" id="username" value="<?php echo $row->username;?>"   />
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo $row->first_name;?>"   />
			<div id="related-act-inner">
			
				<div class="left"><a href=""><img src="/images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Upgrade Membership</h5>
<table cellpadding="5"><tr>  
                <input type="hidden" name="hdn_userid" value="<?php echo $row->user_id;?>"  />
      			<input type="hidden" value="<?php echo $row->total_amt;?>" name="reniew_amt_inr" id="reniew_amt_inr"  />
                <input type="hidden" value="<?php echo $row->level;?>" name="reniew_level" id="reniew_level"  />
               <?php
				$query1 = $this->db->query("SELECT * FROM plans");
				$i=1;
				foreach ($query1->result() as $row1)
				{?><td>
                 <?php
				 if($row->level==$row1->level){
				 ?>
                 <input type="radio" value="<?php echo $row1->level;?>" checked="checked" id="price_name2" name="plan_name" onclick="document.getElementById('plan_type<?php echo $i;?>').checked=true;document.getElementById('plan_inr<?php echo $i;?>').checked=true;document.getElementById('plan_usd<?php echo $i;?>').checked=true;" <?php if($row->level>$row1->level && $row1->level==70){ ?>disabled="disabled"<?php }?> />
                   <input type="radio" value="<?php echo $row1->level_type;?>" checked="checked" id="plan_type<?php echo $i;?>" name="plan_type" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_INR;?>" checked="checked" id="plan_inr<?php echo $i;?>" name="plan_inr" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_USD;?>" checked="checked" id="plan_usd<?php echo $i;?>" name="plan_usd" style="display:none" />
                 <?php }else{?>
                 <input type="radio" value="<?php echo $row1->level;?>" id="price_name2" name="plan_name" onclick="document.getElementById('plan_type<?php echo $i;?>').checked=true;document.getElementById('plan_inr<?php echo $i;?>').checked=true;document.getElementById('plan_usd<?php echo $i;?>').checked=true;" <?php if($row->level>$row1->level && $row1->level==70){ ?>disabled="disabled"<?php }?> />
                   <input type="radio" value="<?php echo $row1->level_type;?>" id="plan_type<?php echo $i;?>" name="plan_type" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_INR;?>"  id="plan_inr<?php echo $i;?>" name="plan_inr" style="display:none" />
                   <input type="radio" value="<?php echo $row1->price_USD;?>" id="plan_usd<?php echo $i;?>" name="plan_usd" style="display:none" />
                 
                 <?php }?>
                  <?php echo $row1->level_type;?> &nbsp;&nbsp;</td>
				 <?php $i++;}
				 ?>			  
                </tr>
     <tr>
     <td colspan="4" align="right"><input type="button" name="PlanB" id="PlanB" value="Upgrade" onclick="if (confirm('Are you sure you want to Upgrade ?')) {document.update_plan.submit();}" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: right;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"  /></td></tr>           
                </table>

				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				<div class="clear"></div>
				<div class="left"><a href=""><img src="/images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
				<div class="right">
					<h5>Reniew Plan</h5>
					<?php if($row->valid_upto<date("Y-m-d")){?>The Plan has Expired on &nbsp;<span style="color:#F00"><?php echo date('d-m-Y',strtotime($row->valid_upto));?></span><?php }else{?>The Plan Will Expire on&nbsp;<span style="color:#007F55"><strong><?php echo date('d-m-Y',strtotime($row->valid_upto));?></strong><?php }?></span>
					<ul class="greyarrow">
						<li><?php if($row->level!=70 ){?><input type="button" name="reniew" id="reniew" value="Reniew" onclick="document.update_plan.action='<?php echo base_url();?>index.php/admin/reniew_plan';document.update_plan.submit();" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: right;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"  />  Membership<?php }?></li> 

					</ul>
				</div>
				<div class="clear"></div>
				
			</div>
 </form>   
    
    <!-- End Membership Form -->
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div>

	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
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