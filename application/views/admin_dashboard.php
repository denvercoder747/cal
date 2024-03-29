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
          image: "images/forms/choose-file.gif",
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
</head>
<body> 
<!-- Start: page-top-outer -->

<!-- Start: page-top -->
		<?php //$this->load->view('includes/admin/dashboard_header');?>
		<?php $this->load->view('includes/admin/admin_header');?>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading --><!-- end page-heading -->

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
            <p><strong>Welcome back, Admin</strong></p>
            <p><br />
              
              
              
            </p>	
			<?php 
//			$this->db->where('user_id', $this->session->userdata('user_id'));
//			$this->db->where('progress_status', 'Complete');
			$query = $this->db->get('user')->num_rows();
			?>
			<?php 
//			$this->db->where('user_id', $this->session->userdata('user_id'));
//			$this->db->where('progress_status', 'Incomplete');
			$query1 = $this->db->get('recipe')->num_rows();
			?>
			<?php 
//			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('status', 'Active');
			$query2 = $this->db->get('user')->num_rows();
			?>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="400" class="data info_table" style="border-bottom:1px dotted #C8AB89">
                  <tbody>
                    <tr style="border-bottom:1px dotted #C8AB89">
                      <td valign="middle" class="value"><h2><?php echo $query;?></h2></td>
                      <td valign="middle" class="full">Total Users</td>
                    </tr>
                    <tr style="border-bottom:1px dotted #C8AB89">
                      <td valign="middle" class="value"><h2><?php echo $query1;?></h2></td>
                      <td valign="middle" class="full">Total Recipes</td>
                    </tr>
                    <tr style="border-bottom:1px dotted #C8AB89">
                      <td valign="middle" class="value"><h2><?php echo $query2;?></h2></td>
                      <td valign="middle" class="full">Active Users</td>
                    </tr>
                  </tbody>
                </table></td>
                <td><ul class="shortcut-buttons-set">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <li><a class="shortcut-button" href="allUser"><span> <img src="/images/users.png" alt="icon" /><br />
                      Users </span></a></li>
                      
                      
                     
                      
                    </td>
                    <td>&nbsp;<li><a class="shortcut-button" href="#"><span> <img src="/images/admin_icons/3.gif" alt="icon" width="48" height="48" /><br />
                        Plans </span></a></li></td>
                    <td><li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="/images/admin_icons/1.gif" alt="icon" width="48" height="48" /><br />
                        Ads </span></a></li></td>
                    <td><li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="/images/admin_icons/13.gif" alt="icon" width="48" height="48" /><br />
                        Requests </span></a></li></td>
                  </tr>
                  <tr>
                    <td>&nbsp;<li><a class="shortcut-button" href="recipes"><span> <img src="/images/admin_icons/2.gif" alt="icon" width="48" height="48" /><br />
                      Recipes </span></a></li></td>
                    <td>&nbsp; <li><a class="shortcut-button" href="Ingredients"><span> <img src="/images/admin_icons/icon_ingredients.gif" alt="icon" width="48" height="48" /><br />
                      Ingredients </span></a></li></td>
                    <td>&nbsp;<li><a class="shortcut-button" href="benefitSettings"><span> <img src="/images/admin_icons/6.gif" alt="icon" width="48" height="48" /><br />
                      Benefits </span></a></li></td>
                    <td>&nbsp;</td>
                  </tr>
                  </table></ul></td>
              </tr>
            </table>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<!-- end actions-box........... -->
			
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
		<?php $this->load->view('includes/admin/admin_footer');?>
<!-- end footer -->
 
</body>
</html>