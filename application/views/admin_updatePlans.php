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
	var level_type=document.getElementById('level_type').value
	var caption=document.getElementById('caption').value
	var price_inr=document.getElementById('price_inr').value
	var price_usd=document.getElementById('price_usd').value
		document.getElementById('level_type').style.display='none';
		document.getElementById('caption').style.display='none';
		document.getElementById('price_inr').style.display='none';
		document.getElementById('price_usd').style.display='none';
		document.getElementById('level_typeerr').style.display='none';
		document.getElementById('captionerr').style.display='none';
		document.getElementById('price_inrerr').style.display='none';
		document.getElementById('price_usderr').style.display='none';
		
	if(level_type=="")
	{
		document.getElementById('price_usderr').style.display='block';
		document.getElementById('price_usd').className='inp-form-error'
		return false;
	}
	if(caption=="")
	{
		document.getElementById('captionerr').style.display='block';
		document.getElementById('caption').className='inp-form-error'
		return false;
	}
	if(price_inr="")
	{
		document.getElementById('price_inrerr').style.display='block';
		document.getElementById('price_inr').className='inp-form-error'
		return false;
	}
	if(price_usd=="")
	{
		document.getElementById('price_usderr').style.display='block';
		document.getElementById('price_usd').className='inp-form-error'
		return false;
	}
}
</script>
</head>
<body> 
<p><!-- Start: page-top-outer -->
  <?php //$this->load->view('includes/admin/user_header');?>
  <?php $this->load->view('includes/admin/admin_header');?>
</p>
<p>
  <!-- End: page-top-outer -->
  
</p>
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
		<h1>Edit Plan </h1>
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
             <form name="plans" id="plans" action="../update_plan" method="post" class="standardForm" enctype="multipart/form-data" onsubmit="return validate();">
    <input type="hidden" name="PlanId" id="PlanId" value="<?php echo $this->uri->segment(3); ?>"  />
    <input type="hidden" name="PlanType" id="PlanType" value="<?php echo $row->level_type; ?>"  />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Level Type</th>
			<td><input name="level_type" readonly="readonly" type="text" class="inp-form" id="level_type" value="<?php echo $row->level_type; ?>" /></td>
			<td><div id="level_typeerr" style="display:none"><div class="error-left"></div>
			<div class="error-inner">This field is required.</div></div></td>
		</tr>
		<tr>
		  <th valign="top">Caption</th>
		  
		  <td><input name="plan_caption" type="text" class="inp-form" id="plan_caption" value="<?php echo $row->caption; ?>" /></td>
		  <td><div id="plan_captionerr" style="display:none"><div class="error-left"></div>
		    <div class="error-inner">This field is required.</div></div>
		    </td>
		  </tr>
		<tr>
		  <th valign="top">Price in INR</th>
		  <td><input name="price_inr" type="text" class="inp-form" id="price_inr" value="<?php echo $row->price_INR; ?>" /></td>
		  <td><div id="price_inrerr" style="display:none">
		    <div class="error-left"></div>
		    <div class="error-inner">This field is required.</div>
		    </div></td>
		  </tr>
		<tr>
		  <th valign="top">Price in USD</th>
		  <td><input name="price_usd" type="text" class="inp-form" id="price_usd" value="<?php echo $row->price_USD; ?>" /></td>
		  <td><div id="price_usderr" style="display:none">
		    <div class="error-left"></div>
		    <div class="error-inner">This field is required.</div>
		    </div></td>
		  </tr>
		<tr>
		  <th valign="top">Image</th>
		  
		  <td><input type="file" name="userfile" id="userfile"  class="file_1" /><input type="hidden" id="T3" name="T3" size="20" value="<?php echo $row->image;?>" /></td>
		  <td><div id="userfileerr" style="display:none"><div class="error-left"></div>
		    <div class="error-inner">This field is required.</div></div>
		    </td>
		  </tr>
	    <tr>
	      <th>&nbsp;</th>
	      <td valign="top"><?php if($row->image != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->image;?>" width="120" height="100" />
    	                          <?php } ?></td>
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
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Plans were Found.</h2>
	<?php endif; ?>
	<!-- end id-form  -->
	</td>
	<td>

	<!--  start related-activities --><!-- end related-activities -->

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