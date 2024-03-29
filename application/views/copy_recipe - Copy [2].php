<?php 
	$query3 = $this->db->query("SELECT profit,weight_per_portion,food_loss FROM user WHERE user_id=".$this->session->userdata('user_id'));
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	  $profitval =$row3['profit'];
	  $food_loss =$row3['food_loss'];
	  $weight_per_portion =$row3['weight_per_portion'];
	}    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Calcipe </title>
     <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
    <script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$('a[rel*=facebox]').facebox({
		loadingImage : '/images/loading.gif',
		closeImage   : '/images/close.png'
		})
	});
	</script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_edit.js"></script>
    <script type="text/javascript">
    
    jQuery(document).ready(function() {
        jQuery('#mycarousel').jcarousel();
    });
    
    </script>
	<!-- end of slide -->
<script>
function lookup(inputString,id) {
	var link = "/index.php/gredient";

    if(inputString.length < 1) {

        // Hide the suggestion box.
        $('#suggestions').hide();

    } else if(inputString.length >= 1) {
        $.post(link + "/searching3", {

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
//	setTimeout("$('#suggestions').hide();", 200);
//	setTimeout($('#suggestions'+id).hide(), 200);
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
				}
            }
			else
			{
			}

        });

    }
}
</script>
<style>
.tagadd
{
	font-size:12px;
}
.suggestionsBox {
	position: absolute;
	width: 200px;
	background-color: #212427;
	border: 2px solid #000;
	color: #fff;
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
	width:585px;
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
	background-color:#ffff00;
}


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
	font-size:14px;
	color:#000000;
	padding:5px 10px 5px 10px;
	line-height:20px;
	width:98%;
	float:left;
	background-color:#e2eee0;
	border-top:1px solid #b2bbaf;
	border-bottom:1px solid #fafff3;
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
	border-top:1px solid #333333;
	border-bottom:1px solid #333333;
}

#photo-gallery
{
	width:415px;
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
<!-- TWO STEPS TO INSTALL RANDOM IMAGE:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  -->

<!-- STEP ONE: Paste this code into the HEAD of your HTML document  -->


<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
// Set up the image files to be used.
var theImages = new Array() // do not change this
// To add more image files, continue with the
// pattern below, adding to the array.

theImages[0] = '/images/Calcipe-ad-1.gif'
theImages[1] = '/images/Calcipe-ad-2.gif'
//theImages[2] = '3.gif'
//theImages[3] = '4.gif'

// do not edit anything below this line

var j = 0
var p = theImages.length;
var preBuffer = new Array()
for (i = 0; i < p; i++){
   preBuffer[i] = new Image()
   preBuffer[i].src = theImages[i]
}
var whichImage = Math.round(Math.random()*(p-1));
function showImage(){
document.write('<img src="'+theImages[whichImage]+'">');
}

//  End -->
</script>


<!-- STEP TWO: Copy this code into the BODY of your HTML document  -->


</head>
<body onload="calculate();">
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
	
<?php if(isset($records)) : foreach($records as $row) : ?>     
        <?php 
		$attribute = array ("id" => "recipe", "Class "=>"Form");
		$hidden = array("Parent_id"=>"0");
	echo form_open_multipart("home/add_recipe/".$row->recipe_id, $attribute, $hidden); ?>
                    <input type="hidden" id="progress_status" name="progress_status"  />
                    <input type="hidden" id="progress_val" name="progress_val"  />
    	                <input type="hidden" name="rcpId" id="rcpId" value="<?php echo $row->recipe_id;?>"  />
	<div id="add-recipe-main">
<div class="h1-edit">Add Recipe</div> 
  	  <div id="add_recipe_left_part">
        	<div id="recipe_green_box">
        	  <div class="h2"><input id="recipe_name" name="recipe_name" type="text" value="" class="h2" /><div id="ProcessBar" style="display:none">
                    <div id="count" style="float:left;">0%</div>
                    <div id="barbox">
                      <div id="progressbar"></div>
                    </div>
              </div></div>
            <div class="main-text">
            Photo of Recipe : <input type="file" name="userfile" id="userfile" /><input type="hidden" id="T3" name="T3" size="20" value="" />
            </div>
            <div class="main-text" style="background-color:#ffffff;">
            <textarea name="short_desc" id="short_desc" cols="65" rows="5"><?php echo $row->description;?></textarea>
            </div>
        </div>
        <div class="main-text">
       	  <div class="h3">DIRECTION</div>
        </div>
        <div class="main-text" style="background-color:#ffffff;">
        <textarea name="long_desc" cols="65" rows="5" id="long_desc"><?php echo $row->procedure; ?></textarea>
        </div>
          
          
          <div class="main-text">
          	<div class="h3">RECIPE</div>
          </div>
          <div class="main-text">
<input name="tot_row1" type="hidden" id="tot_row1" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_row" type="hidden" id="tot_row" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_qty" type="hidden" id="tot_qty" value="<?php echo $row->quantity; ?>" size="5" readonly="readonly" />
    	                      <input name="tot_amt" type="hidden" id="tot_amt" value="<?php echo $row->gradient_price; ?>" size="5" readonly="readonly" />
          	<table width="98%" border="0" cellspacing="" cellpadding="4" id="tblSample">
      <tr>
        <td class="" width="22%" height="24px"><strong>Ingredients</strong></td>
        <td class="" width="13%"><strong>Quantity</strong></td>
        <td class="" width="24%"><strong>Measure</strong></td>
        <td class="" width="13%"><strong>Rate</strong></td>
        <td class="" width="20%"><strong>Amount</strong></td>
        <td class="" width="8%">&nbsp;</td>
      </tr>
    	                        <?php 
				$incr=1;
				foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
        <tr height="33px">
        <td class=""><input type="checkbox" name="chk" id="chk<?php echo $incr;?>" style="display:none" />
        <input class="calcipeMediumBox" autocomplete="OFF" type="text" name="ingRow[]" id="ingRow<?php echo $incr;?>" size="15" value="<?php echo $grad->name; ?>"  onkeyup="lookup(this.value,<?php echo $incr;?>);" />
        <div class="suggestionsBox" id="suggestions<?php echo $incr;?>" style="display: none;"> <img src="<?php echo base_url();?>/images/upArrow.png" style="position: relative; top: -17px; left: 100px;" alt="upArrow" />
        <div class="suggestionList" id="autoSuggestionsList<?php echo $incr;?>"> </div>
        </div></td>
        <td class=""><input class="calcipeAmtBox" type="text" size="3" name="qtyRow[]" id="qtyRow<?php echo $incr;?>" value="<?php echo $grad->quantity; ?>" style="text-align:right"  /></td><td>
        <select class="calSelectBox" onchange="calculate();" name="unitRow[]" id="unitRow<?php echo $incr;?>">
    	                              <option value="1" <?php if($grad->measure=="KiloGram"){?> selected="selected"<?php }?>>KiloGram</option>
    	                              <option value="1" <?php if($grad->measure=="Liter"){?> selected="selected"<?php }?>>Liter</option>
    	                              <option value="1000" <?php if($grad->measure=="Mililiter"){?> selected="selected"<?php }?>>Mililiter</option>
    	                              
                                      <option value="4.35" <?php if($grad->measure=="Cup"){?> selected="selected"<?php }?>>Cup</option>
    	                              <option value="1000" <?php if($grad->measure=="Gram"){?> selected="selected"<?php }?>>Gram</option>
    	                              <option value="200" <?php if($grad->measure=="TeaSpoon"){?> selected="selected"<?php }?>>TeaSpoon</option>
    	                              <option value="66.67" <?php if($grad->measure=="TableSpoon"){?> selected="selected"<?php }?>>TableSpoon</option>
    	                              <option value="2.2" <?php if($grad->measure=="Ounce"){?> selected="selected"<?php }?>>Ounce</option>
    	                              <option value="35.71" <?php if($grad->measure=="Pound"){?> selected="selected"<?php }?>>Pound</option>
        </select></td>
        <td class=""><input class="calcipeAmtBox" name="rateRow[]" id="rateRow<?php echo $incr;?>" type="text" value="<?php echo $grad->price; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td class=""><input class="calcipeAmtBox" name="amtRow[]" id="amtRow<?php echo $incr;?>" type="text" value="<?php echo $grad->amount; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td class="" width="8%" align="center" valign="middle"><img src="<?php echo base_url();?>/images/minus_image.png" width="14" height="14" onclick="if(confirm('Are you sure you want to Remove'))check_box(<?php echo $incr;?>);deleteRow('tblSample');hideMsg2();calculate();"/>
        <input name="measureRow[]" id="measureRow<?php echo $incr;?>" type="hidden" value="<?php echo $grad->measure; ?>" size="10" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>        
    	                        <?php $incr++;}?>
            </table>
<div style="height:25px; float:left; width:110px;"><img src="<?php echo base_url();?>images/addingredient.jpg" name="B1" id="B1" width="110" height="23" onClick="addIng();calculate();" />
</div>
<div style="height:33px; float:right; right:10px;">
<input type="image" src="/images/save-recipe.jpg" id="S1" name="S1" value="Save Recipe"  />
</div>          </div>
          
      </div>

        <div id="add_recipe_right_part">
        	<div id="portion_size">
        	  <table cellspacing="0" cellpadding="2" class="small-text" width="340">
                        <tr style="width:100%;">
                       		 <td width="49%">Recipe Weight :</td><td width="51%"><input class="calcipeCal" name="rcp_weight" type="text" id="rcp_weight" value="<?php echo $row->weight; ?>" size="3"  style="text-align:right" readonly="readonly"  />Kg.</td>
                        </tr>
                        <tr style="width:100%;">
                          <td class="custom_font1">Food Loss % :</td>
                          <td><input class="calcipeCal" name="food_loss" type="text" id="food_loss" value="<?php echo $row->food_loss; ?>" size="3" onblur="calculate();"  style="text-align:right" /><img src="<?php echo base_url();?>images/percent-icon.png" width="10" height="10"/></td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="49%" class="custom_font1">Finished Weight :</td><td><input class="calcipeCal" name="finished_weight" type="text" id="finished_weight" value="<?php echo $row->Finished_weight; ?>" size="3"   style="text-align:right" readonly="readonly" />Kg.</td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="49%" class="custom_font1">Weight Per Portion :</td><td><input class="calcipeCal" name="weight" type="text" id="weight" value="<?php echo $row->Weight_portion; ?>" size="3"  style="text-align:right" onblur="calculate();" />Kg.</td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="49%" class="custom_font1">Per Piece Cost:</td><td><input class="calcipeCal" name="per_pc_cost" type="text" id="per_pc_cost" value="<?php echo $row->cost_per_piece; ?>" size="3"  style="text-align:right" readonly="readonly"  /><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/></td>
                        </tr>
                        <tr style="width:100%;" >
                        <td width="48%" class="custom_font1">Per Kg Cost</td>
                        <td><input class="calcipeCal" name="per_kg_cost" type="text" id="per_kg_cost" size="10" style="text-align:right"  /><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/></td>
                        </tr>
                      <tr style="width:100%;display:none" >
                        <td width="49%" class="custom_font1">Numbers</td>
                        <td><input name="numbers" type="text" class="calcipeCal" id="numbers" value="<?php echo $row->total_number; ?>" size="10" style="text-align:right" readonly="readonly" /></td>
                        </tr>
                      <tr style="width:100%;display:none">
                        <td width="49%" class="custom_font1">Yeild</td>
                        <td><input name="yield" type="text" class="calcipeCal" id="yield" value="<?php echo $row->yield; ?>" size="10" readonly="readonly"  style="text-align:right"/></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="49%" class="custom_font1">Profit %</td>
                        <td><input class="calcipeCal" name="profit" type="text" id="profit" value="<?php echo $row->profit; ?>" size="10" onblur="calculate();"  style="text-align:right"/><img src="<?php echo base_url();?>images/percent-icon.png" width="10" height="10"/></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="49%" class="custom_font1">Per Kilo Selling Price</td>
                        <td><input name="per_kilo_cost" type="text" class="calcipeCal" id="per_kilo_cost" value="<?php echo $row->kilo_price; ?>" size="10" readonly="readonly" style="text-align:right" /><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="49%" class="custom_font1">Per Piece Selling Price</td>
                        <td><input name="selling_price" type="text" class="calcipeCal" id="selling_price" value="<?php echo $row->selling_price; ?>" size="10" readonly="readonly" style="text-align:right" /><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/></td>
                        </tr>
                        </table>        	</div>
        <div id="add-space">
                                                 <a href="#"><SCRIPT LANGUAGE="JavaScript">
														<!-- Begin
														showImage();
														//  End -->
														</script></a>
        </div>
        </div>
       
       
       <div id="add-recipi-btm-part">
       <div id="print-part"></div>
        <div id="photo-gallery"> 
            <div class="jcarousel-skin-tango">
          <div style="position: relative; display: block;" class="jcarousel-container jcarousel-container-horizontal">
          <div style="position: relative;" class="jcarousel-clip jcarousel-clip-horizontal">
          <ul style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: 0px; width: 950px;" id="mycarousel" class="jcarousel-list jcarousel-list-horizontal">
                                                 <?php
//													$this->load->model('membership_model');
													$data = array();
													if($query_recent1 = $this->membership_model->get_records('',''))
													{
														$data['recent'] = $query_recent1;
													}
													$norec=1;
													foreach($query_recent1 as $row_recent):?>
     <li jcarouselindex="1" style="float: left; list-style: none outside none;" class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal">
    <a target="_blank" href="<?php echo base_url()."index.php/site/view_recipe/".$row_recent->recipe_id;?>"><?php if($row_recent->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row_recent->image; ?>" width="75" height="75" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/noimage-small.jpg" width="75" height="75" /><?php }?></a><br />
<div style="color:#000;"><?php echo $row_recent->name;?></div>
     </li>
													<?php
													$norec++;
                                                    endforeach;
												 ?>
          
  </ul></div>
  <div disabled="true" style="display: block;" class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"></div>
  <div disabled="false" style="display: block;" class="jcarousel-next jcarousel-next-horizontal"></div>
     	 	</div>
     	 </div>
        </div>
        </div>
        <br />
<br />

    </div>
    
	<?php  echo form_close(); ?>      
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe Found.</h2>
	<?php endif; ?>
                      
                   <!--  Right Side bar Informations -->
                                       <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
