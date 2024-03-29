<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Calcipe Admin Panel</title>
<link rel="stylesheet" href="/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->
	<link rel="stylesheet" type="text/css" href="/css/tcal.css" />
	<script type="text/javascript" src="/js/tcal.js"></script> 
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
			$('#err1').hide();
			$('#err2').hide();
			$('#err3').hide();
			$('#err4').hide();

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
			updateSelects2(selected[2]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d1 option[value=' + selectedDate.getDate() + ']').attr('', '');
	$('#m1 option[value=' + (selectedDate.getMonth()+1) + ']').attr('', '');
	$('#y1 option[value=' + (selectedDate.getFullYear()) + ']').attr('', '');
}
var updateSelects2 = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d2 option[value=' + selectedDate.getDate() + ']').attr('', '');
	$('#m2 option[value=' + (selectedDate.getMonth()+1) + ']').attr('', '');
	$('#y2 option[value=' + (selectedDate.getFullYear()) + ']').attr('', '');
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
<script>
function validate()
{
			$('#err1').hide();
			$('#err2').hide();
			$('#err3').hide();
			$('#err4').hide();
		$('#msgtitle').removeClass('inp-form-error').addClass('inp-form');
	//	$('#sel_script').removeClass('inp-form-error').addClass('inp-form');
	if(!$.trim($('#msgtitle').val()).length)
	{
		$('#msgtitle').removeClass('inp-form').addClass('inp-form-error');
		$('#err1').show();
		return false;
		
	}
	if($('#new_wind').val()=='Yes' && !$.trim($('#sel_script').val()).length)
	{
//		$('#sel_script').removeClass('inp-form').addClass('inp-form-error');
		$('#err2').show();
		return false;
		
	}
	if($('#sel_script').val()=='Yes' && !$.trim($('#textMessage').val()).length)
	{
		$('#err3').show();
		return false;
		
	}
	if($('#sel_script').val()=='No' && ! $('input[type=file]').val())
	{
		if(!$.trim($('#T3').val()).length)
		{
			$('#err4').show();
			return false;
		}
		
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
		<h1>Edit Ads</h1>
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
             
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">
				<?php 
				foreach($records as $msg){ 
				$from_date=explode("-",$msg->date_from);
				$to_date=explode("-",$msg->date_to);
				?>
    <form name="bannerAds" id="bannerAds" action="../edit_ads" enctype="multipart/form-data" method="post" onsubmit="return validate();" >
    <input type="hidden" name="banner_id" id="banner_id" value="<?php echo $this->uri->segment(3); ?>"  />
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		  <th valign="top">Caption:</th>
		  <td><input type="text" name="msgtitle" id="msgtitle" class="inp-form" value="<?php echo $msg->caption; ?>" /></td>
		  <td><div id="err1">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div>
          </td>
		  </tr>
		<tr>
			<th valign="top">Ads Type:</th>
			<td><select name="msgType" id="msgType"  class="styledselect_form_1">
			  <option value="Advertisement" <?php if($msg->type=="Advertisement"){?> selected="selected" <?php }?> >Advertisement</option>
			  <option value="Event" <?php if($msg->type=="Event"){?> selected="selected" <?php }?> >Event</option>
			  <option value="Google Ad" <?php if($msg->type=="Google Ad"){?> selected="selected" <?php }?> >Google Ad</option>
			  </select></td>
			<td></td>
		</tr>
		<tr>
		  <th valign="top">Section:</th>
		  <td><select name="sections" id="sections"  class="styledselect_form_1">
			  <option value="Dashboard" <?php if($msg->section=="Dashboard"){?> selected="selected" <?php }?>>Dashboard</option>
			  <option value="Recipes" <?php if($msg->section=="Recipes"){?> selected="selected" <?php }?>>Recipes</option>
			  </select></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <th valign="top">Category:</th>
		  <td><input name="txt_category" type="text" class="inp-form" id="txt_category" value="<?php echo $msg->category; ?>" /></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <th valign="top">Open a New Window:</th>
		  <td>
          <select name="new_wind" id="new_wind" class="styledselect_form_2">
          <option value="No" <?php if($msg->open_new=="No"){?> selected="selected" <?php }?>>No</option>
          <option value="Yes" <?php if($msg->open_new=="Yes"){?> selected="selected" <?php }?>>Yes</option>
          </select></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <th valign="top">Url:</th>
		  <td><input type="text" name="ad_url" class="inp-form" id="ad_url" value="<?php echo $msg->url; ?>" /></td>
		  <td><div id="err2">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div></td>
		  </tr>
		<tr>
		  <th valign="top">File:</th>
	<td><input type="file" name="userfile" id="userfile" class="file_1" /><input type="hidden" name="T3" id="T3" value="<?php echo $msg->file_ad; ?>"  /></td>
	<td>
	<div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 2MB max per image(300px X 150px)</div>
	<div class="bubble-right"></div>
    <div id="err4">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div>
	</td>
		  </tr>
		<tr>
		  <th valign="top">Script Ads:</th>
		  <td><select name="sel_script" id="sel_script" class="styledselect_form_2">
          <option value="No" <?php if($msg->script_banner=="No"){?> selected="selected" <?php }?>>No</option>
          <option value="Yes" <?php if($msg->script_banner=="Yes"){?> selected="selected" <?php }?>>Yes</option>
          </select></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <th valign="top">Script:</th>
		  
		  <td><textarea id="textMessage" name="textMessage" cols="" rows="" class="form-textarea"><?php echo $msg->script; ?></textarea></td>
		  <td><div id="err3">
          <div class="error-left"></div>
          <div class="error-inner">This field is required.</div>
          </div>			
		    
		    </td>
		  </tr>
		<tr>
			<th valign="top">Date From:</th>

			<td><?php /*?><table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<select id="d1" name="from_dd" class="styledselect-day">
					<option value="">dd</option>
                    <?php 
					for($dt=1;$dt<=31;$dt++){
					?>
					<option value="<?php echo $dt;?>"<?php if($from_date[2]==$dt){ ?> selected="selected" <?php }?>><?php echo $dt;?></option>
                    <?php }?>
				</select>
				</td>
				<td>
					<select id="m1" name="from_mm" class="styledselect-month">
						<option value="">mmm</option>
						<option value="1" <?php if($from_date[1]==1){?> selected="selected" <?php }?>>Jan</option>
						<option value="2" <?php if($from_date[1]==2){?> selected="selected" <?php }?>>Feb</option>
						<option value="3" <?php if($from_date[1]==3){?> selected="selected" <?php }?>>Mar</option>
						<option value="4" <?php if($from_date[1]==4){?> selected="selected" <?php }?>>Apr</option>
						<option value="5" <?php if($from_date[1]==5){?> selected="selected" <?php }?>>May</option>
						<option value="6" <?php if($from_date[1]==6){?> selected="selected" <?php }?>>Jun</option>
						<option value="7" <?php if($from_date[1]==7){?> selected="selected" <?php }?>>Jul</option>
						<option value="8" <?php if($from_date[1]==8){?> selected="selected" <?php }?>>Aug</option>
						<option value="9" <?php if($from_date[1]==9){?> selected="selected" <?php }?>>Sep</option>
						<option value="10" <?php if($from_date[1]==10){?> selected="selected" <?php }?>>Oct</option>
						<option value="11" <?php if($from_date[1]==11){?> selected="selected" <?php }?>>Nov</option>
						<option value="12" <?php if($from_date[1]==12){?> selected="selected" <?php }?>>Dec</option>
					</select>
				</td>
				<td>
					<select  id="y1" name="from_yy"  class="styledselect-year">
						<option value="">yyyy</option>
						<option value="2005" <?php if($from_date[0]==2005){?> selected="selected" <?php }?>>2005</option>
						<option value="2006" <?php if($from_date[0]==2006){?> selected="selected" <?php }?>>2006</option>
						<option value="2007" <?php if($from_date[0]==2007){?> selected="selected" <?php }?>>2007</option>
						<option value="2008" <?php if($from_date[0]==2008){?> selected="selected" <?php }?>>2008</option>
						<option value="2009" <?php if($from_date[0]==2009){?> selected="selected" <?php }?>>2009</option>
						<option value="2010" <?php if($from_date[0]==2010){?> selected="selected" <?php }?>>2010</option>
						<option value="2011" <?php if($from_date[0]==2011){?> selected="selected" <?php }?>>2011</option>
					</select>
				</td>
				<td><a href=""  id="date-pick"><img src="/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table><?php */?><input type="text" name="from_date" class="tcal" value="<?php echo $from_date[1]."/".$from_date[2]."/".$from_date[0];?>" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">Date To:</th>

			<td><?php /*?><table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				
				<select id="d2" name="to_dd" class="styledselect-day">
					<option value="">dd</option>
					<option value="">dd</option>
                    <?php 
					for($dt1=1;$dt1<=31;$dt1++){
					?>
					<option value="<?php echo $dt1;?>"<?php if($to_date[2]==$dt1){ ?> selected="selected" <?php }?>><?php echo $dt1;?></option>
                    <?php }?>
				</select>
				</td>
				<td>
					<select id="m2" name="to_mm" class="styledselect-month">
						<option value="">mmm</option>
						<option value="1" <?php if($to_date[1]==1){?> selected="selected" <?php }?>>Jan</option>
						<option value="2" <?php if($to_date[1]==2){?> selected="selected" <?php }?>>Feb</option>
						<option value="3" <?php if($to_date[1]==3){?> selected="selected" <?php }?>>Mar</option>
						<option value="4" <?php if($to_date[1]==4){?> selected="selected" <?php }?>>Apr</option>
						<option value="5" <?php if($to_date[1]==5){?> selected="selected" <?php }?>>May</option>
						<option value="6" <?php if($to_date[1]==6){?> selected="selected" <?php }?>>Jun</option>
						<option value="7" <?php if($to_date[1]==7){?> selected="selected" <?php }?>>Jul</option>
						<option value="8" <?php if($to_date[1]==8){?> selected="selected" <?php }?>>Aug</option>
						<option value="9" <?php if($to_date[1]==9){?> selected="selected" <?php }?>>Sep</option>
						<option value="10" <?php if($to_date[1]==10){?> selected="selected" <?php }?>>Oct</option>
						<option value="11" <?php if($to_date[1]==11){?> selected="selected" <?php }?>>Nov</option>
						<option value="12" <?php if($to_date[1]==12){?> selected="selected" <?php }?>>Dec</option>
					</select>
				</td>
				<td>
					<select  id="y2" name="to_yy"  class="styledselect-year">
						<option value="">yyyy</option>
						<option value="2005" <?php if($to_date[0]==2005){?> selected="selected" <?php }?>>2005</option>
						<option value="2006" <?php if($to_date[0]==2006){?> selected="selected" <?php }?>>2006</option>
						<option value="2007" <?php if($to_date[0]==2007){?> selected="selected" <?php }?>>2007</option>
						<option value="2008" <?php if($to_date[0]==2008){?> selected="selected" <?php }?>>2008</option>
						<option value="2009" <?php if($to_date[0]==2009){?> selected="selected" <?php }?>>2009</option>
						<option value="2010" <?php if($to_date[0]==2010){?> selected="selected" <?php }?>>2010</option>
						<option value="2011" <?php if($to_date[0]==2011){?> selected="selected" <?php }?>>2011</option>
					</select>
				</td>
				<td><a href=""  id="date-pick2"><img src="/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table><?php */?><input type="text" name="to_date" class="tcal" value="<?php echo $to_date[1]."/".$to_date[2]."/".$to_date[0];?>" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">Status:</th>

			<td><select name="status"  class="styledselect_form_1">
			<option value="Active" <?php if($msg->status=="Active"){?> selected="selected" <?php }?>>Active</option>
			<option value="Inactive" <?php if($msg->status=="Inactive"){?> selected="selected" <?php }?>>Inactive</option>
		</select></td>
			<td>
			</td>
		</tr>
	<tr>
	  <th>&nbsp;</th>
	  <td valign="top">
	    <input type="submit" value="" class="form-submit" />
	    <input type="reset" value="" class="form-reset"  />
	    </td>
	  <td></td>
	  </tr>
</table></form>
						<?php } ?>
	</td>
    <td align="left" valign="top"></td>
  </tr>
</table>

             <!--  start product-table ..................................................................................... -->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table" style="display:none">
				<tr>
				  <th>&nbsp;</th>
				  <th>&nbsp;</th>
				  <th>&nbsp;</th>
				  <th>&nbsp;</th>
				  <th>&nbsp;</th>
				  <th>&nbsp;</th>
				  <th><?php $passval=$this->uri->segment(3);?>
                  <select name="filter_ad" id="filter_ad" class="styledselect_form" onchange="window.location=this.options[this.selectedIndex].value;">
				    <option value="/index.php/admin/bannerAd/Advertisement" <?php if($passval=="Advertisement"){?> selected="selected"<?php }?>>Advertisement</option>
				    <option value="/index.php/admin/bannerAd/Event" <?php if($passval=="Event"){?> selected="selected"<?php }?>>Event</option>

				    <option value="/index.php/admin/bannerAd/GoogleAd" <?php if($passval=="GoogleAd"){?> selected="selected"<?php }?>>Google Ad</option>
			      </select></th>
				  </tr>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Caption</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Type</a></th>
					<th class="table-header-repeat line-left"><a href="">From Date</a></th>
					<th class="table-header-repeat line-left"><a href="">To Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
					<?php 
                    $i=1;
                    if(isset($records)) : foreach($records as $row) : 
					if(($i%2)==1){$classrpw="";}else{$classrpw="class=\"alternate-row\"";}
					?>
				<tr <?php echo $classrpw;?>>
					<td><input  type="checkbox"/></td>
					<td><?php echo $row->caption; ?></td>
					<td><?php echo $row->type; ?></td>
					<td><a href=""><?php echo date("d-m-Y",strtotime($row->date_from)); ?></a></td>
					<td><?php echo date("d-m-Y",strtotime($row->date_to)); ?></td>
					<td><a href=""><?php echo $row->status; ?></a></td>
					<td class="options-width">
					<a href="#" title="View" class="icon-1 info-tooltip"></a>
					<a href="/index.php/admin/delete_ad/<?php echo $row->id_banner;?>" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="/index.php/admin/edit_bannerAd/<?php echo $row->id_banner;?>" title="Edit" class="icon-3 info-tooltip"></a></td>
				</tr>
						<?php $i++;endforeach; ?>
						<?php else : ?>	
                    <tr >
                        <td colspan="7">No Records Found </td>
                      </tr>
                        <?php endif; ?>
				</table>
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