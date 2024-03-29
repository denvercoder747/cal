<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<?php require_once('front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/slidediv.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/ingredientTab.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".tab_content").hide(); //Hide all content
	$("ul.ingredientTabMenus li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.ingredientTabMenus li").click(function() {
		$("ul.ingredientTabMenus li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
/* Core JS */

 
	/*place jQuery actions here*/ 
	var link = "/index.php/gredient";
	
//	$("#dv_edit").hide();
//	$(".edit_tr").click(function()
	$(".editlnk").click(function()
		{
			alert('c');	
		var ID=$(this).attr('id');
		$("#first_"+ID).hide();
		$("#second_"+ID).hide();
		$("#third_"+ID).hide();
		$("#fourth_"+ID).hide();
		$("#fifth_"+ID).hide();
		$("#six_"+ID).hide();
		$("#seven_"+ID).hide();
		$("#eight_"+ID).hide();
		$("#nine_"+ID).hide();
//		$("#last_"+ID).hide();
		$("#first_input_"+ID).show();
		$("#second_input_"+ID).show();
		$("#third_input_"+ID).show();
		$("#fourth_input_"+ID).show();
		$("#fifth_input_"+ID).show();
		$("#six_input_"+ID).show();
		$("#seven_input_"+ID).show();
		$("#eight_input_"+ID).show();
		$("#nine_input_"+ID).show();
		$("#ten_input_"+ID).show()
		$("#tweleve_input_"+ID).show()
$(".editlnk").hide();
});
/*$(".editbox").mouseup(function() 
{
return false
});
*/
// Outside click action
//$(document).mouseup(function()
$('.editbot').click(function()
{
$(".editbox").hide();
$(".editbot").hide();
$(".text").show();
});
                                                //  GRADIENT ADD HERE WITH VALIDATION
	$("#addG").click(function() {
		// Get the product ID and the quantity 
/*		var id = $(this).find('input[name=product_id]').val();
		var qty = $(this).find('input[name=quantity]').val();
		//alert('ID:' + id + '\n\rQTY:' + qty);  
		 $.post(link + "cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
*/		
	var ingRow = $("#ingRow");
	var rateRow = $("#rateRow");
	var qtyRow1 = $("#qtyRow");
	var ingRowInfo = $("#ingRowInfo");
	var rateRowInfo = $("#rateRowInfo");
	var qtyRowInfo = $("#qtyRowInfo");
//		if(validateGradients() & validateName() & validateMessage() )
	function validateGre(){
		//if it's NOT valid
		if(ingRow.val().length < 1){
			ingRow.addClass("error_bord");
			ingRowInfo.text("Gredient Name Should Not Blank!");
			ingRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			ingRow.removeClass("error_bord");
			ingRowInfo.text("");
			ingRowInfo.removeClass("error");
			return true;
		}
	}
	function validateRate(){
		//if it's NOT valid
		if(rateRow.val() <= 0){
			rateRow.addClass("error_bord");
			rateRowInfo.text("Rate must be valid!");
			rateRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			rateRow.removeClass("error_bord");
			rateRowInfo.text("");
			rateRowInfo.removeClass("error");
			return true;
		}
	}
	function validateQty(){
		//if it's NOT valid
		if(qtyRow1.val() <= 0){
			qtyRow1.addClass("error_bord");
			qtyRowInfo.text("Quantity should be Valid!");
			qtyRowInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			qtyRow1.removeClass("error_bord");
			qtyRowInfo.text("");
			qtyRowInfo.removeClass("error");
			return true;
		}
	}
		
		if(validateGre() && validateQty() && validateRate()){
//			return true;
			}
		else{
			return false;
			}
			
		var ingRow = $("#ingRow").val();
		var qtyRow = $("#qtyRow").val();
		var measure = $("#measure").val();
		var measure1 = $("#measure").find("option:selected").text();
		var rateRow = $("#rateRow").val();
		var amtKg = $("#amtKg").val();
		var purFrom = $("#purFrom").val();
		var brand = $("#brand").val();
		var contact = $("#contact").val();
		 $.post(link + "/add_gredient", { ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
  					$("#message").html('Gredient Added Successfully');
				});

    		}else{
  					$("#message").html('');
  					$("#message").hide();
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 

		return false;
	});
	$(".cancellnk").click(function()
	{
		 $.post(link + "/show_gredient", { ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    		}	
    		
 		 }); 
	});
//$("#measure").change(function() {
//    alert($("#measure").find("option:selected").text()+' clicked!');
//});	
	
	$('#rateRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});
	$('#qtyRow').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	event.preventDefault();
	}
});

/* End Core JS*/
});
	function saveg(ID)
	{

		var ingId = $("#ten_input_"+ID).val();
		var ingRow = $("#first_input_"+ID).val();
		var qtyRow = $("#second_input_"+ID).val();
		var measure = $("#third_input_"+ID).val();
		var measure1 = $("#third_input_"+ID).find("option:selected").text();
		var rateRow = $("#fourth_input_"+ID).val();
		var amtKg = $("#fifth_input_"+ID).val();
		var purFrom = $("#six_input_"+ID).val();
		var brand = $("#seven_input_"+ID).val();
		var contact = $("#eight_input_"+ID).val();
	var link = "/index.php/gredient";
		 $.post(link + "/edit_gredient", { ingId: ingId,ingRow: ingRow, qtyRow: qtyRow,measure: measure,measure1: measure1,rateRow: rateRow,amtKg: amtKg,purFrom: purFrom,brand: brand,contact: contact, ajax: '1' },
  			function(data){
  			if(data == 'true'){
//    		alert(ingRow);	
    			$.get(link + "/show_gredient", function(cart){
//  					$("#cart_content").html(cart);
  					$("#display").html(cart);
				});

    		}else{
    			$.get(link + "/show_gredient", function(cart){
  					$("#display").html(cart);
				});
    			alert("Gredient Already Exist");
    		}	
    		
 		 }); 
//		alert('clicked');

		return false;
	}
</script>
    <script>
	function calc()
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		rate=parseFloat(document.getElementById('rateRow').value);
		qty=parseFloat(document.getElementById('qtyRow').value);
		units=parseFloat(document.getElementById('measure').value);
		perkg=parseFloat((rate/qty*units));
		document.getElementById('amtKg').value=perkg.toFixed(2);
	}
	function calc1(iD)
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		rate=parseFloat(document.getElementById('fourth_input_'+iD).value);
		qty=parseFloat(document.getElementById('second_input_'+iD).value);
		units=parseFloat(document.getElementById('third_input_'+iD).value);
		perkg=parseFloat((rate/qty*units));
		document.getElementById('fifth_input_'+iD).value=perkg.toFixed(2);
		var measure1 = $("#third_input_"+iD).find("option:selected").text();
		document.getElementById('measure1_'+iD).value=measure1;

	}
	function editAll()
	{
		var rate=0;
		var qty=0;
		var units=0;
		var perkg=0;
		var totrow=document.getElementById('total_row').value
		for(iD=1;iD<=totrow;iD++)
		{
			$("#first_"+iD).hide();
			$("#second_"+iD).hide();
			$("#third_"+iD).hide();
			$("#fourth_"+iD).hide();
			$("#fifth_"+iD).hide();
			$("#six_"+iD).hide();
			$("#seven_"+iD).hide();
			$("#eight_"+iD).hide();
			$("#nine_"+iD).hide();
	//		$("#last_"+iD).hide();
			$("#first_input_"+iD).show();
			$("#second_input_"+iD).show();
			$("#third_input_"+iD).show();
			$("#fourth_input_"+iD).show();
			$("#fifth_input_"+iD).show();
			$("#six_input_"+iD).show();
			$("#seven_input_"+iD).show();
			$("#eight_input_"+iD).show();
			$("#nine_input_"+iD).show();
			$("#ten_input_"+iD).show()
			$("#tweleve_input_"+iD).show()
		}
			$("#S1").show()
	}
	function ref1()
	{
		document.getElementById('rateRow').value=1;
		document.getElementById('qtyRow').value=1;
		document.getElementById('measure').selectedIndex=1;
		document.getElementById('amtKg').value=1;
	}
	</script>
    <style>
	div.display table thead tr td{
		border-bottom: 1px solid #d3d3d3;
		padding: 5px;
	}
	
	div.display table tbody tr td{
		padding: 5px;
	}
	
	div.display table tbody tr td input[type=text]{
		background: #FFF;
		border: 1px solid #d3d3d3;
		width: 85px;
	}
	
	div.display table tbody tr.alt{
		background: #f5f5f5;
	}	
	.editbox
	{
	display:none
	}
	.editbot
	{
	display:none
	}
	.editdrop
	{
	display:none
	}
	td
	{
	padding:5px;
	}
	.editbox
	{
	font-size:14px;
	width:40px;
	background-color:#ffffcc;
	border:solid 1px #000;
	padding:4px;
	}
	.edit_tr:hover
	{
	background:url(edit.png) right no-repeat #80C8E5;
	cursor:pointer;
	}    
	.error
	{
		color:#F00;
	}
	.error_bord
	{
		border: 1px solid #efefef;
	}    
	.editlnk
	{
	
	}
	.cancellnk
	{
	display:none
	
	}
</style>
</head>
<body onload="ref1();">
<div id="art-page-background-simple-gradient">
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
                <!--<div id="header_css">
                <img src="/images/recipe_logo.png" width="372" height="57" />	
                </div>-->
					<?php $this->load->view('includes/add_gredient_header'); ?>
                <div class="art-contentLayout">
                    <div class="art-content-inner">
                        <div class="art-Post">
                            <div class="art-Post-tl"></div>
                            <div class="art-Post-tr"></div>
                            <div class="art-Post-bl"></div>
                            <div class="art-Post-br"></div>
                            <div class="art-Post-tc"></div>
                            <div class="art-Post-bc"></div>
                            <div class="art-Post-cl"></div>
                            <div class="art-Post-cr"></div>
                            <div class="art-Post-cc"></div>
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                        <div id="viewRecipe">
                                <Br />
<!--<div class="container">
    <ul class="ingredientTabMenus">
        <li><a href="#tab1">Add New Ingredient</a></li>
        <li><a href="#tab2">Upload Ingredient Excel(.xls)</a></li>
        <li><a href="#tab3">Download Sample Excel(.xls)</a></li>
        <li><a href="#tab4" onclick="editAll();">Edit All Cost</a></li>
        <li><a href="#tab5">Compare Price</a></li>
    </ul>
    <div class="ingredientTab">
        <div id="tab1" class="tab_content">
<div id="message"><?php //print_r($this->session);print_r($_SESSION);//
	echo $this->session->flashdata('message1'); ?></div>
      <div align="left" id="dv_add">
  <?php echo form_open('gredient/add_gredient'); ?>
  <table cellpadding="0" cellspacing="0" width="100%">
    
  <td style="border:#E6EEEE" class="comment_box">
  <table width="100%" border="0">
    <tr style="background-color:#E6EEEE;">
      <th width="14%" height="20">Ingredient Name</th>
      <th width="7%">Quantity</th>
      <th width="12%">Measure</th>
      <th width="5%">Rate</th>
      <th width="16%">Amount Per KG</th>
      <th width="16%">Purchased From</th>
      <th width="10%">Brand</th>
      <th colspan="2">Contact</th>
      </tr>
    <tr>
      <td align="center"><input type="text" name="ingRow" id="ingRow" size="20" value=""   /><span id="ingRowInfo"></span></td>
      <td align="center"><input type="text" style="text-align:right;" name="qtyRow" id="qtyRow" size="5" value="0"  onkeyup="calc();"/><span id="qtyRowInfo"></span></td>
      <td align="center">
        <select name="measure" id="measure" onchange="calc();">
          <option value="1000">Gram</option>
          <option value="1">KiloGram</option>
          <option value="1">Liter</option>
          <option value="4.35">Cup</option>
          <option value="200">TeaSpoon</option>
          <option value="66.67">TableSpoon</option>
          <option value="35.71">Ounce</option>
          <option value="2.20">Pound</option>
          </select>
        </td>
      <td align="center"><input type="text" style="text-align:right;" name="rateRow" id="rateRow" size="5" value="0" onkeyup="calc();" /><span id="rateRowInfo"></span></td>
      <td align="center"><input type="text" style="text-align:right;" name="amtKg" id="amtKg" size="5" value="0" readonly="readonly"  /></td>
      <td align="center"><input type="text" name="purFrom" id="purFrom" size="10" value=""  /></td>
      <td align="center"><input type="text" name="brand" id="brand" size="10" value=""  /></td>
      <td width="7%" align="center"><input type="text" name="contact" id="contact" size="10" value=""  /></td>
      <td width="13%" align="center"><span class="comment_box" style="padding:4px; padding-left:10px;">
        <input type="button"  value="Add"  id="addG" name="Button" class="comment_button calcipeButton"/>
      </span></td>
      </tr>
    </table></td>
    
  </tr>
    
  </table>
  <?php echo form_close(); ?>
        
  </div>
             </div>
        <div id="tab2" class="tab_content">
            Sample Excel File
        </div>  
        <div id="tab3" class="tab_content">
           <a href="/index.php/gredient/import_ex"> Download As Excel(.xls)</a>
        </div>  
    </div>
</div>-->
<center><div id="bigFontNew">Ingredient Search Results</div></center>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><!--<input type="button" name="editall" value="Edit All" class="calcipeButton" onclick="editAll();"  />-->
<div style="height:7px"></div>
<div id="flash" align="left"  ></div>
<div class="display">
		<div id="display">
			<?php 
			echo $this->view($content); ?>
		</div>
</div>
    </td>
    </tr>
  <tr>
    <td width="69%"></td>
    <td width="31%">&nbsp;</td>
  </tr>
</table>                        </div>
                        </div>
                      
                        
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
