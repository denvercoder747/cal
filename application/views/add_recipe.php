<?php 
	$query3 = $this->db->query("SELECT profit,weight_per_portion,food_loss,currency,infrastructure_cost FROM user WHERE user_id=".$this->session->userdata('user_id'));
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	  $profitval =$row3['profit'];
	  $food_loss =$row3['food_loss'];
	  $infa_cost =$row3['infrastructure_cost'];
	  $currency =$row3['currency'];
	  $weight_per_portion =$row3['weight_per_portion'];
	}    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<?php require_once('front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    

    <link href="<?php echo base_url();?>css/validation_jquery.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>    
    <link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />

	<link href="/css/movingboxes.css" media="screen" rel="stylesheet">
	<script src="/js/jquery.movingboxes.js"></script>
	
	<!-- Demo only -->
	<link href="/demo/demo.css" media="screen" rel="stylesheet">
	<script src="/demo/demo.js"></script>
	<style>
		/* Overall & panel width defined using css in MovingBoxes version 2.2.2+ */
		ul#slider-one { width: 840px; }
		ul#slider-one > li { width: 150px; }
	</style>


    <script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$('a[rel*=facebox]').facebox({
		loadingImage : '/images/loading.gif',
		closeImage   : '/images/close.png'
		})
	});
	</script>
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_recipe.js"></script>
	<!-- end of slide -->
<script>
function lookup(inputString,id) {
	var link = "/index.php/gredient";

    if(inputString.length < 1) {

        // Hide the suggestion box.
        $('#suggestions'+id).hide();

    } else if(inputString.length >= 1) {
        $.post(link + "/searching", {

            queryString: ""+inputString+"",
			Id: id

        }, function(data){

            if(data.length > 0) {

                $('#suggestions'+id).show();
                $('#autoSuggestionsList'+id).html(data);

            }

        });

    }

} // end function lookup  
function fill(thisValue,id,qty,price,pricekg,mes,gid) {
//	$('#unitRow1').attr('selectedIndex', 2);
//	alert(mes);
	$('#ingRow'+id).val(thisValue);
	$('#qtyRow'+id).val(qty);
	$('#rateRow'+id).val(pricekg);
//	$('#unitRow'+id).val(66.67);
	$('#amtRow'+id).val(price);
	$('#measureRow'+id).val(mes);
	$('#gId'+id).val(gid);
//	$('#testselect').val("Value 2");
//	$("#unitRow"+id+" :selected").text('gram');
	$("#unitRow"+id+" option:contains(" + mes + ")").attr('selected', 'selected');
			//$("#inputString"+id).hide();
$('#suggestions'+id).hide();
calculate();
//	setTimeout("$('#suggestions').hide();", 200);
//	setTimeout($('#suggestions'+id).hide(), 200);
}
function drop_close(id)
{
$('#suggestions'+id).hide();
$('#ingRow'+id).val("");
}
function fill_out(id) {
$('#suggestions'+id).hide();
}

function fill_over(thisValue,id,qty,price,pricekg,mes,gid) {
//	$('#unitRow1').attr('selectedIndex', 2);
//	alert(mes);
	$('#ingRow'+id).val(thisValue);
	$('#qtyRow'+id).val(qty);
	$('#rateRow'+id).val(pricekg);
//	$('#unitRow'+id).val(66.67);
	$('#amtRow'+id).val(price);
	$('#measureRow'+id).val(mes);
	$('#gId'+id).val(gid);
	$("#unitRow"+id+" option:contains(" + mes + ")").attr('selected', 'selected');
calculate();
}
function fill_rcp(thisValue,id,qty,price,pricekg,mes,rid) {
//	$('#unitRow1').attr('selectedIndex', 2);
//	alert(mes);
	$('#ingRow'+id).val(thisValue);
	$('#qtyRow'+id).val(qty);
	$('#rateRow'+id).val(pricekg);
//	$('#unitRow'+id).val(66.67);
	$('#amtRow'+id).val(price);
	$('#measureRow'+id).val(mes);
	$('#rId'+id).val(rid);
//	$('#testselect').val("Value 2");
//	$("#unitRow"+id+" :selected").text('gram');
	$("#unitRow"+id+" option:contains(" + mes + ")").attr('selected', 'selected');
			//$("#inputString"+id).hide();
$('#suggestions'+id).hide();
calculate();
//	setTimeout("$('#suggestions').hide();", 200);
//	setTimeout($('#suggestions'+id).hide(), 200);
}
	function fill2(thisValue,id) {
		$('#ingRow'+id).val(thisValue);
	setTimeout($('#suggestions'+id).hide(), 200);
	}
function fill1(inputString,id) {
	var link = "/index.php/gredient";

    if(inputString.length < 1) {

        // Hide the suggestion box.

    } else if(inputString.length >= 1) {
        $.post(link + "/searching2", {

            queryString: ""+inputString+"",
			Id: id

        }, function(data){
            if(data.length > 0) {
				var enc=eval('(' + data + ')');
				if(enc.name!=undefined)
				{
					$('#ingRow'+enc.id).val(enc.name);
					$('#qtyRow'+enc.id).val(enc.quantity);
					$('#rateRow'+enc.id).val(enc.price);
					$('#amtRow'+enc.id).val(enc.amount_kg);
					$('#measureRow'+enc.id).val(enc.measure);
					$("#unitRow"+enc.id+" option:contains(" + enc.measure + ")").attr('selected', 'selected');
					$('#suggestions'+enc.id).hide();
				}
				else
				{
//					$('#ingRow'+enc.id).val('');
					$('#qtyRow'+enc.id).val(1);
					$('#rateRow'+enc.id).val(1);
					$('#amtRow'+enc.id).val(1);
					$('#measureRow'+enc.id).val('');
					$("#unitRow"+enc.id+" option:contains(KiloGram)").attr('selected', 'selected');
					$('#suggestions'+enc.id).hide();
//					alert('Please Add this Gradient for Proceed');
					$('#suggestions'+enc.id).hide();
//					$('#ingRow'+enc.id).focus();
					calculate();
				}
            }
			else
			{
			}

        });

    }
}
</script>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<style>

p
{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000;
}


.tagadd
{
	font-size:12px;
}
.suggestionsBox {
	position: absolute;
	width: 200px;
	background-color: #212427;
/*	border: 2px solid #000;
*/	color: #fff;
	padding: 5px;
	margin:10px 0px 0px 0px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
}

#inputString { width: 200px; padding: 5px; font-size: 18px;}

.suggestionList { margin: 0px; padding: 0px; }

/*  Individual Search Results  */
.suggestionList li {
	margin: 0px 0px 3px 0px;
	padding: 7px;
	cursor: pointer;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	list-style-type: none;
}

/*  Hover effect  */
.suggestionList li:hover { background-color: #009900; font-weight: bold;}
.delete
{
	
}
#text_area_input {
	width:508px;
	min-height:36px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	border-color:#AEAEAE #BBBBBB #BBBBBB;
	border-style:solid;
	border-width:1px;
	border-top:2px solid #E8E8E8;
}
#progressbar {
	width:150px;
	height:16px;
}
#barbox {
	float:left;
	height:16px;
	background-color:#FFFFFF;
	width:180px;
	border:solid 2px #DFDFDF;
	margin-right:3px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
}
#count {
	float:right;
	margin-right:8px;
	font-family:'Georgia', Times New Roman, Times, serif;
	font-size:16px;
	font-weight:bold;
	color:#000000
}
</style>
<style type="text/css">
#add-recipe-main
{
	width:925px;
	height:auto;
	margin:10px 0 0 20px;
	padding:0 0 20px 0;
	float:left;
	border:1px solid #a1bb5f;
	background-color:#FFFFFF;
}

#add_recipe_left_part
{
	width:585px;
	height:auto;
	margin:0;
	padding:0;
	float:left;
}

#recipe_green_box
{	
	width:575px;
	height:auto;
	margin:0;
	padding:0;
	float:left;
	background-color:#a1bb5f;
}

#add_recipe_right_part
{
	width:340px;
	height:auto;
	margin:0;
	padding:0;
	float:left;
}

#portion_size
{
	width:340px;
	height:auto;
	margin:0;
	padding:0;
	float:left;
/*	background-color:#ffff00;
*/}


.h1-edit
{
	font-family:arial narrow, verdana;
	font-size:24px;
	font-weight:bold;
	color:#a1bb5f;
}

.h2
{
	font-family:arial narrow, verdana;
	font-size:20px;
	font-weight:bold;
	color:#000000;
	padding:0 0 5px 10px;
	width:auto;
}

.h3
{
	font-family:arial narrow, verdana;
	font-size:18px;
	color:#555555;
	padding:3px 0 3px 10px;
}


.main-text
{
	font-family:arial, verdana;
	font-size:12px;
	color:#000000;
	padding:5px 10px 5px 10px;
	line-height:20px;
	width:98%;
	float:left;
	background-color:#ffffff;
	font-weight:bold;
/*	background-color:#e2eee0;

	border-top:1px solid #b2bbaf;
*/	border-bottom:1px solid #fafff3;
	}

.small-text
{
	font-family:arial, verdana;
	font-size:12px;
	color:#000000;
	padding:0;
	line-height:20px;
	float:left;
	border-top:1px solid #b2bbaf;
	border-bottom:1px solid #fafff3;
	padding-left:26px;
}

#left-menu
{
	z-index:100000;
	height:auto;
	width:270px;
	float:left;
	padding:0 0 5px 0;

}

#left-menu ul
{
	height:auto;
	width:270px;
	margin:0;
	padding:0;
}

#left-menu li
{
	height:auto;
	width:260px;
	margin:0;
	padding:0 0 0 10px;
	float:left;
	list-style-type:none;
	font-family:arial, verdana;
	font-size:13px;
	color:#000000;
	background-image:url(../images/arrow.jpg);
	background-position:left center;
	background-repeat:no-repeat;
}

#left-menu a
{
	height:auto;
	width:240px;
	margin:0;
	padding:5px 0 5px 20px;
	float:left;
	display:block;
	font-family:arial, verdana;
	font-size:13px;
	color:#000000;
	text-decoration:none;
}

#left-menu a:hover
{
	width:247px;
	color:#ff7800;
	text-decoration:none;
}

#bdr_btm_top
{	
	border-top:1px solid #b2bbaf;
	border-bottom:1px solid #fafff3;
}

#add-space
{
	width:320px;
	height:auto;
	margin:0;
	padding:10px;
	float:left;
}

#add-recipi-btm-part
{
	width:915px;
	height:auto;
	margin:0;
	padding:5px;
	float:left;
/*	border-top:1px solid #333333;
	border-bottom:1px solid #333333;
*/}

#photo-gallery
{
	width:915px;
	height:auto;
	margin:0;
	padding:5px;
	float:right;
}

.calcipeCal {
	background:none;
	border-bottom:1px solid #bababa;
	border-bottom-style:dashed;
	border-left:none;
	border-top:none;
	border-right:none;
	width:120px;
	height:20px;
	font-family:arial;
	font-size:12px;
	color:#333333;	
}

#print-part
{
	width:300px;
	height:auto;
	margin:0;
	padding:50px 5px 5px 5px;
	float:left;
}


</style>
<script>

$(document).ready(function() {	
                <?php
				 if(isset($_COOKIE["popmsg"]))
				 {
				 }
				 else{
				 setcookie("popmsg","SETTEED", time()+60);
				 ?>

		
		//Get the A tag
				var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	

			<?php }?>
});
			</script>
<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
  border:#5c8802 5px dashed;
  -webkit-border-radius: 11px;
  -moz-border-radius: 11px;
   border-radius: 11px;
}
.class1
{
 float:right;margin-top:-27px;position:absolute; margin-left:358px;
}
</style>

<link rel="stylesheet" type="text/css" href="/css/contentslider.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/contentslider.js"></script>
</head>
<body onload="ref();">
<div id="boxes">

<div id="dialog" class="window">
<span class="class1"><a href="#"class="close"/><img src="/images/popclose.png"  border="0"/></a></span>
<div class="d-header"><br />

      You can Update <strong>Food Loss, Wt./ Portion</strong> or <strong>Benefits</strong> To get Accurate Calculation</div>

</div>
					
  <div id="mask"></div>
</div>

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
					<?php $this->load->view('includes/add_recipe_header'); ?>

                <div class="art-contentLayout">
	
   <?php 
		$attribute = array ("id" => "recipe", "Class "=>"Form");
		$hidden = array("Parent_id"=>"0");
	echo form_open_multipart("home/add_recipe", $attribute, $hidden); ?>
    <input type="hidden" name="multi_recipe" id="multi_recipe" value="False"  />
	<div id="add-recipe-main">
<div class="h1-edit"><span style="color:#CAD2B7">Add Recipe</span></div> 
  	  <div id="add_recipe_left_part">
        	<div id="recipe_green_box">
        	  <div class="h2"><input id="recipe_name" name="recipe_name" type="text" value="Name Of Recipe" class="h2" /><div id="ProcessBar" style="display:none">
                    <div id="count" style="float:left;">0%</div>
                    <div id="barbox">
                      <div id="progressbar"></div>
                    </div>
              </div></div>
            <div class="main-text">
            Photo of Recipe : <input type="file" name="userfile" id="userfile" /><input type="hidden" id="T3" name="T3" size="20" value="" />
            </div>
            <div class="main-text" style="background-color:#ffffff;">
            <textarea name="short_desc" id="short_desc" cols="65" rows="5"></textarea>
            </div>
        </div>
        <div class="main-text">
       	  <div class="h3">DIRECTION</div>
        </div>
        <div class="main-text" style="background-color:#ffffff;">
        <textarea name="long_desc" cols="65" rows="5" id="long_desc"></textarea>
        </div>
          
          
          <div class="main-text">
          	<div class="h3">RECIPE</div>
          </div>
          <div class="main-text">
                            <input name="tot_row1" type="hidden" id="tot_row1" value="3" ><input name="tot_row" type="hidden" id="tot_row" value="3" >
            
            <input name="tot_qty" type="hidden" id="tot_qty" value="1" size="5" readonly="readonly" >
            
              <input name="tot_amt" type="hidden" id="tot_amt" value="1" size="5" readonly="readonly">
          	<table width="98%" border="0" cellspacing="" cellpadding="4" id="tblSample">
      <tr>
        <td width="22%" height="24px" align="left" class=""><strong>Ingredients</strong></td>
        <td width="13%" align="right" class=""><strong>Quantity</strong></td>
        <td width="24%" align="center" class=""><strong>Measure</strong></td>
        <td width="13%" align="right" class=""><strong>Rate</strong></td>
        <td width="20%" align="right" class=""><strong>Amount</strong></td>
        <td class="" width="8%">&nbsp;</td>
      </tr>
      
      <tr height="24px">
        <td bgcolor="#FFFFFF" class=""><input type="checkbox" name="chk" id="chk1" style="display:none" />
        <input class="calcipeMediumBox" autocomplete="OFF" type="text" name="ingRow[]" id="ingRow1" size="13"  onkeyup="lookup(this.value,1);" />
        
        
        <div class="suggestionsBox" id="suggestions1" style="display: none;z-index:1000;"> <img src="<?php echo base_url();?>/images/upArrow1.png" style="position: relative; top: -17px; left: 100px;" alt="upArrow" />
        <div class="suggestionList" id="autoSuggestionsList1" > </div>
        </div></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" type="text" size="3" name="qtyRow[]" id="qtyRow1" value="1" style="text-align:right" onblur="calculate();"  /></td><td bgcolor="#FFFFFF">
        <select class="calSelectBox" onchange="calculate();" name="unitRow[]" id="unitRow1">
        <option value="1" >KiloGram</option>
        <option value="1" >Liter</option>
        <option value="1000" >Mililiter</option>
        <option value="4.35">Cup</option>
        <option value="1000" >Gram</option>
        <option value="200" >TeaSpoon</option>
        <option value="66.67" >TableSpoon</option>
        <option value="2.2">Ounce</option>
        <option value="35.71">Pound</option>
        </select></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="rateRow[]" id="rateRow1" type="text" value="1" size="3" style="text-align:right" readonly="readonly"  /></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="amtRow[]" id="amtRow1" type="text" value="1" size="3" style="text-align:right" readonly="readonly"  /></td>
        <td width="6%" align="center" valign="middle" bgcolor="#FFFFFF" class=""><img src="<?php echo base_url();?>/images/minus_image.png" width="14" height="14" onclick="if(confirm('Are you sure you want to Remove'))check_box(1);deleteRow('tblSample');hideMsg2();calculate();"/>
        <input name="measureRow[]" id="measureRow1" type="hidden" value="" size="10" readonly="readonly" class="calcipeAmtBox"  /><input name="gId[]" id="gId1" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /><input name="rId[]" id="rId1" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>
        <tr height="24px">
          <td bgcolor="#FFFFFF" class=""><input type="checkbox" name="chk" id="chk2" style="display:none" />
            <input class="calcipeMediumBox" autocomplete="OFF" type="text" name="ingRow[]" id="ingRow2" size="13"  onkeyup="lookup(this.value,2);" />
            <div class="suggestionsBox" id="suggestions2" style="display: none;z-index:1000;"> <img src="<?php echo base_url();?>/images/upArrow1.png" style="position: relative; top: -17px; left: 100px;" alt="upArrow" />
              <div class="suggestionList" id="autoSuggestionsList2"> </div>
          </div></td>
          <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" type="text" size="3" name="qtyRow[]" id="qtyRow2" value="1" onblur="calculate();" style="text-align:right" /></td><td bgcolor="#FFFFFF">
            <select class="calSelectBox" onchange="calculate();" name="unitRow[]" id="unitRow2" style="border:none;background:transparent;">
              <option value="1" >KiloGram</option>
              <option value="1" >Liter</option>
              <option value="1000" >Mililiter</option>
              <option value="4.35">Cup</option>
              <option value="1000" >Gram</option>
              <option value="200" >TeaSpoon</option>
              <option value="66.67" >TableSpoon</option>
              <option value="2.2">Ounce</option>
              <option value="35.71">Pound</option>
            </select></td>
          <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="rateRow[]" id="rateRow2" type="text"  value="1" size="3" readonly="readonly" style="text-align:right"  /></td>
          <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="amtRow[]" id="amtRow2" type="text"  value="1" size="3" readonly="readonly" style="text-align:right" /></td>
          <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF" class=""><img src="<?php echo base_url();?>/images/minus_image.png" width="14" height="14" onclick="if(confirm('Are you sure you want to Remove'))check_box(2);deleteRow('tblSample');hideMsg2();calculate();"/>
          <input name="measureRow[]" type="hidden" id="measureRow2" value="" size="10" readonly="readonly" class="calcipeAmtBox"  /><input name="gId[]" id="gId2" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /><input name="rId[]" id="rId2" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>
        <tr height="24px">
        <td bgcolor="#FFFFFF" class=""><input type="checkbox" name="chk" id="chk3" style="display:none" />
        <input class="calcipeMediumBox" autocomplete="OFF" type="text" name="ingRow[]" id="ingRow3" size="13"  onkeyup="lookup(this.value,3);" />
        <div class="suggestionsBox" id="suggestions3" style="display: none;z-index:1000;"> <img src="<?php echo base_url();?>/images/upArrow1.png" style="position: relative; top: -17px; left: 100px;" alt="upArrow" />
        <div class="suggestionList" id="autoSuggestionsList3"> </div>
        </div></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" type="text" size="3" name="qtyRow[]" id="qtyRow3" value="1" onblur="calculate();"style="text-align:right"  /></td><td bgcolor="#FFFFFF">
        <select class="calSelectBox" onchange="calculate();" name="unitRow[]" id="unitRow3" style="border:none;">
        <option value="1" >KiloGram</option>
        <option value="1" >Liter</option>
        <option value="1000" >Mililiter</option>
        <option value="4.35">Cup</option>
        <option value="1000" >Gram</option>
        <option value="200" >TeaSpoon</option>
        <option value="66.67" >TableSpoon</option>
        <option value="2.2">Ounce</option>
        <option value="35.71">Pound</option>
        </select></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="rateRow[]" type="text" id="rateRow3" value="1" size="3" readonly="readonly" style="text-align:right" /></td>
        <td align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="amtRow[]" type="text" id="amtRow3" value="1" size="3" readonly="readonly" style="text-align:right"  /></td>
        <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF" class=""><img src="<?php echo base_url();?>/images/minus_image.png" width="14" height="14" onclick="if(confirm('Are you sure you want to Remove'))check_box(3);deleteRow('tblSample');hideMsg2();calculate();"/>
        <input name="measureRow[]" type="hidden" id="measureRow3" value="" size="10" readonly="readonly" class="calcipeAmtBox"  /><input name="gId[]" id="gId3" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /><input name="rId[]" id="rId3" type="hidden" value="" size="5" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>                                                          
            </table>
<div style="height:25px; float:left; width:110px;"><img src="<?php echo base_url();?>images/addingredient.jpg" name="B1" id="B1" width="110" height="23" onClick="addIng();calculate();" />
</div>
<div style="height:33px; float:right; right:10px;">
<input type="image" src="/images/save-recipe.jpg" id="S1" name="S1" value="Save Recipe"  />
</div>          </div>
          
      </div>

        <div id="add_recipe_right_part">
        	<div id="portion_size">
<table cellpadding="0" cellspacing="0" width="98%" bgcolor="#FFFFFF" height="350px" style="font-family:Arial, Helvetica, sans-serif; font-size:13px;" border="0">
<tr style="border:thin solid #5fa3c8; -moz-border-radius: 5px;
border--radius: 5px;">


<td width="10" height="30px" bgcolor="#5fa3c8" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;">&nbsp;</td>
<td height="37" bgcolor="#66a0c9">
<script type="text/javascript">
function conv()
{
	var calval=parseFloat((document.getElementById('temp_weight').value)*(1/parseFloat(document.getElementById('wtpp').options[document.getElementById('wtpp').selectedIndex].value)));
	document.getElementById('weight').value=calval;
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="bottom"><p style="font-size:13px;"><strong>Weight Per Portion</strong></p></td>
    <td><input class="calcipeCal" name="temp_weight" type="text" id="temp_weight" size="5" value="<?php echo $weight_per_portion;?>" style="text-align:right; color:#000; font-weight:bold; width:50px;" onblur="conv();calculate();"  />
      <input type="hidden" name="weight" id="weight"  /></td>
    <td style="font-size:10px; font-family:Arial, Helvetica, sans-serif;"><select name="wtpp" id="wtpp"  onchange="conv();calculate();" style="font-size:11px;">
      <option value="1,KiloGram" selected="selected" >KiloGram</option>
      <option value="1,Liter" >Liter</option>
      <option value="1000,Mililiter" >Mililiter</option>
      <option value="4.35,Cup">Cup</option>
      <option value="1000,Gram" >Gram</option>
      <option value="200,TeaSpoon" >TeaSpoon</option>
      <option value="66.67,TableSpoon" >TableSpoon</option>
      <option value="2.2,Ounce">Ounce</option>
      <option value="35.71,Pound">Pound</option>
    </select></td>
  </tr>
</table></td>
<td width="10" height="30" bgcolor="#5fa3c8" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>
<tr>
<td height="1px" colspan="3"></td>
</tr>



<tr height="25px">
<td width="10" height="25" bgcolor="#69b1c0" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;" >&nbsp;</td>
<td height="25" bgcolor="#69b1c1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="bottom"><p><strong> Loss %</strong></p></td>
    <td width="52%"><input class="calcipeCal" name="food_loss" type="text" id="food_loss" value="<?php echo $food_loss;?>" size="2" onblur="calculate();" style="text-align:right; color:#000; font-weight:bold;"  /></td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>Benefit %</strong></p></td>
    <td><input class="calcipeCal" name="profit" type="text" id="profit" value="<?php echo $profitval;?>" size="10" onblur="calculate();" style="text-align:right; color:#000; font-weight:bold;"  /></td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>Infrastructure Cost %</strong></p></td>
    <td><input class="calcipeCal" name="infrastructure_cost" type="text" id="infrastructure_cost" value="<?php echo $infa_cost; ?>" size="10" onblur="calculate();" style="text-align:right; color:#000; font-weight:bold;"  /></td>
  </tr>
</table></td>
<td width="10" height="25" bgcolor="#69b1c0" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>

<tr>
<td height="1px" colspan="3"></td>
</tr>




<tr height="25px">
<td width="10" height="25" bgcolor="#86b7c5" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;" >&nbsp;</td>
<td height="25" bgcolor="#85b8c4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="bottom"><p><strong>Recipe Weight</strong></p></td>
    <td><input name="rcp_weight" type="text" class="calcipeCal" id="rcp_weight" style="text-align:right; color:#000; font-weight:bold;" value="" size="2" readonly="readonly"   /></td>
    <td style="color:#000;">Kg</td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>Finished Weight</strong></p></td>
    <td><input name="finished_weight" type="text" class="calcipeCal" id="finished_weight" style="text-align:right; color:#000; font-weight:bold;" value="" size="2" readonly="readonly"  /></td>
    <td style="color:#000;">Kg</td>
  </tr>
</table></td>
<td width="10" height="56"  bgcolor="#86b7c5" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>
<tr>
<td height="1px" colspan="3"></td>
</tr>






<tr height="25px">
<td width="10" height="25"  bgcolor="#92bec7" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;" >&nbsp;</td>
<td height="25" bgcolor="#92bec7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="bottom"><p><strong>Cost / Kilo</strong></p></td>
    <td width="45%"><input name="per_kg_cost" type="text" class="calcipeCal" id="per_kg_cost" style="text-align:right; color:#000; font-weight:bold;" size="10" readonly="readonly"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>SP / Kilo</strong></p></td>
    <td><input class="calcipeCal" name="per_kilo_cost" type="text" id="per_kilo_cost" size="10" readonly="readonly" style="text-align:right; color:#000; font-weight:bold;"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
</table></td>
<td width="10" height="56"  bgcolor="#92bec7" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>

<tr>
<td height="1px" colspan="3"></td>
</tr>




<tr height="37px">
<td width="10" height="37px" bgcolor="#9bc4c8"style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;" >&nbsp;</td>
<td height="25px" bgcolor="#9bc4c9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom"><p><strong>Cost / Piece</strong></p></td>
    <td width="45%"><input name="per_pc_cost" type="text" class="calcipeCal" id="per_pc_cost"  style="text-align:right; color:#000; font-weight:bold;" value="" size="2" readonly="readonly"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
  <tr>
    <td width="50%" valign="bottom"><p><strong>SP / Piece</strong></p></td>
    <td><input class="calcipeCal" name="selling_price" type="text" id="selling_price" size="10" readonly="readonly"style="text-align:right; color:#000; font-weight:bold;"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
</table></td>
<td width="10" height="37"  bgcolor="#9bc4c8" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>
<tr>
<td height="1px"colspan="3"></td>
</tr>





<tr height="30px">
<td width="8" height="30px"  bgcolor="#5fa3c8" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;">&nbsp;</td>
<td height="30" bgcolor="#66a0c9"><input class="calcipeCal" name="yield" type="text" id="yield" size="13" readonly style="text-align:right; display:none; color:#000; font-weight:bold;"  />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%" valign="bottom"><p><strong>Number of Pieces</strong></p></td>
      <td><input name="numbers" type="text" class="calcipeCal" id="numbers" style="text-align:right; color:#000; font-weight:bold;" size="10" readonly="readonly"  /></td>
      <td>&nbsp;</td>
    </tr>
  </table></td>
<td width="10" height="37" bgcolor="#5fa3c8" style="border-top-right-radius: 10px 10px; border-bottom-right-radius: 10px 10px;">&nbsp;</td>
</tr>
<tr height="30px">
  <td height="25" colspan="3" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;">* SP = Selling Price</td>
  </tr></table>                        
                        
                        
                        
                        
                        
                             	</div>
   <?php
			$this->load->model('membership_model');
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->service_ads=="Yes"){?>
		<?php 
            $query_sett = $this->db->query("SELECT status FROM settings_site WHERE setting_name ='AD_BANNER'");
            if ($query_sett->num_rows() > 0)
            {
               $row_sett = $query_sett->row_array(); 
              $sett_status =$row_sett['status'];
            }    
        if($sett_status=='YES'){
        ?>
                <div id="add-space">
                                                            <div id="slider1" class="sliderwrapper">
                                                            
        
                                                                <?php 
                                                                $query_sett1 = $this->db->query("SELECT banner_type FROM banner_set WHERE status ='Active'");
                                                                if ($query_sett1->num_rows() > 0)
                                                                {
                                                                   $row_sett1 = $query_sett1->row_array(); 
                                                                  $banner_type =$row_sett1['banner_type'];
                                                                }    
                                                                    $query_ad = $this->db->query("SELECT * FROM banner_ad WHERE status='Active' AND type='$banner_type'");
                                                                    if ($query_ad->num_rows() > 0)
                                                                    {
                                                                        foreach ($query_ad->result() as $row_ad)
                                                                        {
                                                                           $script_banner =$row_ad->script_banner;
                                                                           $script =$row_ad->script;
                                                                           $file_ad =$row_ad->file_ad;
                                                                           $open_new =$row_ad->open_new;
                                                                           $url =$row_ad->url;
                                                                           $daterange_from =$row_ad->date_from;
                                                                           $daterange_to =$row_ad->date_to;
																		   $today=date("Y-m-d");
																		   if($daterange_from<=$today && $daterange_to>=$today)
																		   {
																			   if($script_banner=="Yes")
																			   {?>
																				   
																<div class="contentdiv"><?php if($open_new=="Yes"){?><a href="<?php echo $url;?>" target="_blank"><div style="width:300px;"><?php echo $script;?></div></a><?php }else{?><div style="width:300px;"><?php echo $script;?></div><?php }?>
																	
																</div>
																			   <?php }else{?>
																<div class="contentdiv">
																	<div style="width:300px;"><?php if($open_new=="Yes"){?><a href="<?php echo $url;?>" target="_blank"><img src="/images/<?php echo $file_ad;?>"  /></a><?php }else{?><img src="/images/<?php echo $file_ad;?>"  /><?php }?></div>
																</div>
																			   <?php }
																			   
																		   }
                                                                        }                                                              
                                                                    }    
                                                                
                                                                ?>
        </div>
        
        <div id="paginate-slider1" class="pagination" style="display:none">
        
        </div>
        <!--Inner content DIVs should always carry "contentdiv" CSS class-->
        <!--Pagination DIV should always carry "paginate-SLIDERID" CSS class-->
        
        
        <script type="text/javascript">
        
        featuredcontentslider.init({
            id: "slider1",  //id of main slider DIV
            contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
            toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
            nextprev: ["Previous", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
            revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
            enablefade: [true, 0.2],  //[true/false, fadedegree]
            autorotate: [true, 3000],  //[true/false, pausetime]
            onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
                //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
                //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
            }
        })
        
        </script>
        
        
        
        
             </div>
             
             <?php }?>
	 <?php }   ?>     
        
        </div>
   <?php
			$query_total = $this->db->query("SELECT total_recipe FROM recipe_counter WHERE user_id=".$this->session->userdata('user_id'));
			$rs_total=$query_total->result_array();
			if ($query_total->num_rows() > 0)
			{
            if($rs_total[0]['total_recipe']>0)
            {?>
       <div id="add-recipi-btm-part">
        <div id="wrapper">
        
            <!-- Slider #1 -->
            <ul id="slider-one">
        
                                                 <?php
//													$this->load->model('membership_model');
													$data = array();
													if($query_recent1 = $this->membership_model->get_records('',''))
													{
														$data['recent'] = $query_recent1;
													}
													$norec=1;
													foreach($query_recent1 as $row_recent):?>
     <li>
    <a target="_blank" href="<?php echo base_url()."index.php/site/view_recipe/".$row_recent->recipe_id;?>"><?php if($row_recent->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row_recent->image; ?>" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/noimage-small.jpg"/><?php }?></a><br />
<p style="color:#000; font-size:12px; color:#868686"><?php echo $row_recent->name;?></p>
     </li>
													
													<?php
													$norec++;
                                                    endforeach;
												 ?>
                
        
            </ul> <!-- end Slider #1 -->
        </div>       
         
        </div>
            
            <?php }
            
           
			}
		   ?>    
       
        <br />
<br />

    </div>
    
	<?php  echo form_close(); ?>                      
                   <!--  Right Side bar Informations -->
                                       <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
