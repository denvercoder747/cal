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
		$('#err4').show();
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
		<h1>Manage Ads</h1>
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
    <div>
		
		<!--  start related-act-top -->
		<!-- end related-act-top -->
		
		<!--  start related-act-bottom -->
		<div >
		
			<!--  start related-act-inner -->
    <!-- Start Membership Form -->
 <form name="update_banner" method="post" action="<?php echo base_url();?>index.php/admin/change_banner">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div class="right">
					<h5>Display Status</h5>
<?php 
	$query_ban = $this->db->query("SELECT * FROM settings_site WHERE setting_name='AD_BANNER'");
	if ($query_ban->num_rows() > 0)
	{
	   $row_ban = $query_ban->row_array(); 
	  $stat =$row_ban['status'];
	}    

?>
<table cellpadding="5"><tr>  
<td>               
                    <select name="setting_val" class="styledselect_form_1">
                    <option value="YES" <?php if($stat=="YES"){ ?>selected="selected" <?php }?>>Yes</option>
                    <option value="NO" <?php if($stat=="NO"){ ?>selected="selected" <?php }?>>No</option>
                 
                     </select>
</td>                </tr>
     <tr>
     <td colspan="4" align="right">&nbsp;</td></tr>           
                </table>

				</div></td>
    <td><div class="right"><h5>Set Ads to Display</h5>
<table cellpadding="5"><tr>  
<td>               
                    <select name="banner_val" class="styledselect_form_1">
<?php
				$query1 = $this->db->query("SELECT * FROM banner_set");
				$i=1;
				foreach ($query1->result() as $row1)
				{?>
                 <?php
				 if($row1->status=="Active"){
				 ?>
                    <option value="<?php echo $row1->banner_type;?>" selected="selected"><?php echo $row1->banner_type;?></option>
                 <?php }else{?>
                    <option value="<?php echo $row1->banner_type;?>"><?php echo $row1->banner_type;?></option>
                 
                 <?php }?>
                 
				 <?php $i++;}
				 ?>			  
                     </select>
</td>                </tr>
     <tr>
     <td colspan="4" align="right">&nbsp;</td></tr>           
                </table></div>
</td>
    <td><div class="right">
					<h5>Search Ads</h5><br />
<?php $passval=$this->uri->segment(3);?>
                  <select name="filter_ad" id="filter_ad" class="styledselect_form_1" onchange="window.location=this.options[this.selectedIndex].value;">
				    <option value="/index.php/admin/bannerAd/Advertisement" <?php if($passval=="Advertisement"){?> selected="selected"<?php }?>>Advertisement</option>
				    <option value="/index.php/admin/bannerAd/Event" <?php if($passval=="Event"){?> selected="selected"<?php }?>>Event</option>

				    <option value="/index.php/admin/bannerAd/GoogleAd" <?php if($passval=="GoogleAd"){?> selected="selected"<?php }?>>Google Ad</option>
			      </select><br />
    </div></td>
  </tr>
  <tr>
    <td align="left"><input type="button" name="BannerS1" id="BannerS1" value="Set" onclick="document.update_banner.action='<?php echo base_url();?>index.php/admin/set_settings/AD_BANNER';document.update_banner.submit();" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: left;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"  /></td>
    <td><input type="button" name="BannerS2" id="BannerS2" value="Update" onclick="document.update_banner.submit();" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: left;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"  /></td>
    <td><span class="right">
      <input type="button" name="BannerS" id="BannerS" value="Search" onclick="window.location=document.getElementById('filter_ad').options[document.getElementById('filter_ad').selectedIndex].value;" style="background: url('/images/forms/button_background.gif') no-repeat scroll 0 0 transparent;border: medium none;cursor: pointer;display: block;float: left;height: 30px;margin: 0 4px 0 0;padding: 0;;width: 80px; font-size:9px; font-weight:bold; color:#FFFBF0"  />
    </span></td>
  </tr>
  </table>
 </form>   
    
    <!-- End Membership Form -->
			<!-- end related-act-inner -->
			<div class="clear"></div>
		
		</div>
		<!-- end related-act-bottom -->
	
	</div></td>
    </tr>
</table>

             <!--  start product-table ..................................................................................... --><!--  end product-table................................... --> 
			</div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
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
					<a href="/index.php/admin/view_ad/<?php echo $row->id_banner;?>" title="View" class="icon-1 info-tooltip"></a>
					<a href="/index.php/admin/delete_ad/<?php echo $row->id_banner;?>" onClick=" return confirm('Are you sure you want to '+ 'delete the record for'+ '<?php echo addslashes($row->caption);?>'+'?')" title="Delete" class="icon-2 info-tooltip"></a>
					<a href="/index.php/admin/edit_bannerAd/<?php echo $row->id_banner;?>" title="Edit" class="icon-3 info-tooltip"></a></td>
				</tr>
						<?php $i++;endforeach; ?>
						<?php else : ?>	
                    <tr >
                        <td colspan="7">No Records Found </td>
                      </tr>
                        <?php endif; ?>
				</table>			<!--  end content-table  -->
		
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