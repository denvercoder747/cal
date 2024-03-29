<?php 
	$query3 = $this->db->query("SELECT profit,weight_per_portion,food_loss,currency,infrastructure_cost FROM user WHERE user_id=".$this->session->userdata('user_id'));
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	  $profitval =$row3['profit'];
	  $food_loss =$row3['food_loss'];
	  $currency =$row3['currency'];
	  $weight_per_portion =$row3['weight_per_portion'];
	  $infa_cost =$row3['infrastructure_cost'];
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
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_edit.js"></script>
    
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
	width:580px;
	height:auto;
	margin:0;
	padding:0;
	float:left;
	clear:left;
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
	width:200px;
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
	font-weight:bold;
}


.main-text
{
	font-family:arial, verdana;
	font-size:13px;
	color:#000000;
	padding:5px 10px 5px 10px;
	line-height:17px;
	width:95%;
	float:left;
	background-color:#FFFFFF;
	text-align:justify
/*	font-weight:normal;
	background-color:#e2eee0;
	border-top:1px solid #b2bbaf;
	border-bottom:1px solid #fafff3;
*/}

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
	font-size:11px;
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

<link rel="stylesheet" type="text/css" href="/css/contentslider.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/contentslider.js"></script>
</head>
<body onload="calculate_view();">
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
	echo form_open_multipart("home/edit_recipe/".$row->recipe_id, $attribute, $hidden); ?>
                    <input type="hidden" id="progress_status" name="progress_status"  />
                    <input type="hidden" id="progress_val" name="progress_val"  />
    	                <input type="hidden" name="rcpId" id="rcpId" value="<?php echo $row->recipe_id;?>"  />
	<div id="add-recipe-main">
<div class="h1-edit" style="float:left"><span style="color:#CAD2B7">View Recipe</span></div>
<div class="h1-edit" style="float:right; padding-right:15px"><table border="0" cellpadding="" cellspacing="" width="170px" style="float:right">
                                <tr><td>
                                	<a href="<?php echo base_url();?>index.php/site/edit_recipe/<?php echo $row->recipe_id;?>"><img src="/images/edit_recipe.png"  title="Edit" width="24" height="24" border="0" /></a>
                                </td><?php /*?><td>
                             	  <a href="<?php echo base_url();?>index.php/site/share/<?php echo $row->name; ?>" rel="facebox" ><img src="/images/share_recipe.png"  title="Share" width="24" height="24" /></a>
                                </td><?php */?><td>
                             	  <a href="<?php echo base_url();?>index.php/site/chk_option/<?php echo $row->recipe_id; ?>" rel="facebox iframe" ><img src="/images/print_recipe.png"  title="Share" width="24" height="24"  border="0"  /></a>
                                </td><?php /*?><td>
                               		<a href="JavaScript:newPopup('<?php echo base_url();?>index.php/site/print_recipe/<?php echo $row->recipe_id;?>');"><img src="/images/print_recipe.png"  title="Print" width="24" height="24" /></a>
                               </td><?php */?><td align="center">
                             	   <?php if($row->multi_recipe =='True'){?><a href="<?php echo base_url();?>index.php/site/copy_multi_recipe/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/duplicate_recipe.png" width="24"  title="Duplicate" height="24" /></a><?php }else{?>
                             	   <a href="<?php echo base_url();?>index.php/site/copy_recipe/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/duplicate_recipe.png" width="24"  title="Duplicate" height="24" /></a><?php }?>
                                </td><td align="right";>
                               		 <a href="<?php echo base_url();?>index.php/site/recipe_pdf/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/pdf_recipe.png"  title="Pdf" width="24" height="24"  border="0"  /></a>
                                </td></tr>
                                </table></div> 
  	  <div id="add_recipe_left_part">
        	<div>
			<?php if($row->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row->image; ?>" style="float:right; padding:5px 20px 0 20px"  /><?php }else{?><img src="<?php
			
			
			 echo base_url();?>images/thumbs/no_image.jpg" style="float:right; padding:5px 20px 0 20px"  /><?php }?>
            <div class="h2"><?php echo $row->name;?></div>
            <?php if($row->description<>""){?>
            <div class="main-text" style="width:365px;"><?php echo $row->description;?></div>
            <?php }?>
        </div>
          
          
          <div class="main-text">
          	<div class="h3">RECIPE</div>
          </div>
          <div class="main-text" style="background-color:#FFF;">
          
          <!-- Edit Code -->
<input name="tot_row1" type="hidden" id="tot_row1" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_row" type="hidden" id="tot_row" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_qty" type="hidden" id="tot_qty" value="<?php echo $row->quantity; ?>" size="5" readonly="readonly" />
    	                      <input name="tot_amt" type="hidden" id="tot_amt" value="<?php echo $row->gradient_price; ?>" size="5" readonly="readonly" />
<table width="98%" border="0" cellspacing="" cellpadding="4" id="tblSample" style="display:none">
    	                        <?php 
				$incr=1;
				foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
        <tr height="33px">
        <td width="22%" bgcolor="#FFFFFF" class=""><input type="checkbox" name="chk" id="chk<?php echo $incr;?>" style="display:none" />
        <input class="calcipeMediumBox"type="hidden" name="ingRow[]" id="ingRow<?php echo $incr;?>" size="15" value="<?php echo $grad->name; ?>"/>
</td>
        <td width="13%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" type="hidden" size="3" name="qtyRow[]" id="qtyRow<?php echo $incr;?>" value="<?php echo $grad->quantity; ?>" /></td><td width="24%" bgcolor="#FFFFFF">
        <select class="calSelectBox" name="unitRow[]" id="unitRow<?php echo $incr;?>" style="display:none">
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
        <td width="13%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="rateRow[]" id="rateRow<?php echo $incr;?>" type="hidden" value="<?php echo $grad->price; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td width="20%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="amtRow[]" id="amtRow<?php echo $incr;?>" type="hidden" value="<?php echo $grad->amount; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF" class=""><input type="hidden" name="gId[]" id="gId<?php echo $incr;?>" value="<?php echo $grad->id_gredient; ?>"  />
        <input name="measureRow[]" id="measureRow<?php echo $incr;?>" type="hidden" value="<?php echo $grad->measure; ?>" size="10" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>        
    	                        <?php $incr++;}?>
            </table>          
          	<div id="left-menu">
            	<ul>
                                                         <li>
                                                           <ul> 
  <?php foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
                                                             
                                                             <?php
					$measure_tex="";
					$qty_tex="";
					$number = $grad->quantity;
					$dpart = $number - (int)$number;
					if($dpart==00)
					{
					$qty_tex=number_format($grad->quantity,0);;
					}
					else
					{
					$qty_tex=number_format($grad->quantity,2);;
					}
				switch ($grad->measure) {
				case "KiloGram":
					$measure_tex="Kg";
					break;
				case "Gram":
					$measure_tex="g";
					break;
				case "Liter":
					$measure_tex="ltr";
					break;
				case "Mililiter":
					$measure_tex="ml";
					break;
				case "Cup":
					$measure_tex="cup";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "TeaSpoon":
					$measure_tex="tsp";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "TableSpoon":
					$measure_tex="tbsp";
					$qty_tex=number_format($grad->quantity,0);;
					break;
				case "Ounce":
					$measure_tex="Oz";
					break;
				case "Pound":
					$measure_tex="lb";
					break;
			}		
						?>
                                                             <li style="line-height:30px; font-size:12px;"><img src="<?php echo base_url();?>images/arrow.png" width="10" height="10" /> <?php echo $qty_tex; ?> <?php echo $measure_tex; ?> <?php echo $grad->name; ?> </li>
                                                             <?php }?>
                                                           </ul>
                  </li>
              </ul>
            </div>
          </div>
        <div class="main-text">
       	  <div class="h3">DIRECTION</div>
        </div>
        <div class="main-text" style="background-color:#ffffff;"><?php echo $row->procedure;?></div>
      </div>

        <div id="add_recipe_right_part">
        	<div id="portion_size">
        	  <table cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" height="350px" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; width:99%" border="0">
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
    <td width="50%" valign="bottom"><p><strong>Weight Per Portion</strong></p></td>
    <td align="right" style="color:#000;" width="37%"><input name="weight" type="hidden" class="calcipeCal" id="weight" style="text-align:right; color:#000; font-weight:bold;" onblur="calculate();" value="<?php echo $row->Weight_portion; ?>" size="2" readonly="readonly"   />
      <strong><?php echo $row->weight_in_metric; ?> <?php echo $row->weight_metric; ?></strong></td>
    <td>&nbsp;</td>
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
    <td width="52%"><input name="food_loss" type="text" class="calcipeCal" id="food_loss" style="text-align:right; color:#000; font-weight:bold;" onblur="calculate();" value="<?php echo $row->food_loss; ?>" size="2" readonly="readonly"  /></td>
  </tr>
  <tr>
    <td width="40%" valign="bottom"><p><strong>Benefit %</strong></p></td>
    <td><input name="profit" type="text" class="calcipeCal" id="profit" style="text-align:right; color:#000; font-weight:bold;" onblur="calculate();" value="<?php echo $row->profit; ?>" size="10" readonly="readonly"  /></td>
  </tr>
  <tr>
    <td width="40%" valign="bottom"><p><strong>Infrastructure Cost %</strong></p></td>
    <td><input name="infrastructure_cost" type="text" class="calcipeCal" id="infrastructure_cost" style="text-align:right; color:#000; font-weight:bold;" onblur="calculate();" value="<?php echo $row->infrastructure_cost; ?>" size="10" readonly="readonly"  /></td>
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
    <td width="44%"><input name="rcp_weight" type="text" class="calcipeCal" id="rcp_weight" style="text-align:right; color:#000; font-weight:bold;" value="<?php echo $row->weight; ?>" size="2" readonly="readonly"   /></td>
    <td width="21%" style="color:#000;">Kg</td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>Finished Weight</strong></p></td>
    <td><input name="finished_weight" type="text" class="calcipeCal" id="finished_weight" style="text-align:right; color:#000; font-weight:bold;" value="<?php echo $row->Finished_weight; ?>" size="2" readonly="readonly"  /></td>
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
    <td width="44%"><input name="per_kg_cost" type="text" class="calcipeCal" id="per_kg_cost" style="text-align:right; color:#000; font-weight:bold;" size="10" readonly="readonly"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>SP / Kilo</strong></p></td>
    <td><input class="calcipeCal" name="per_kilo_cost" type="text" value="<?php echo $row->kilo_price; ?>" id="per_kilo_cost" size="10" readonly="readonly" style="text-align:right; color:#000; font-weight:bold;"  /></td>
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
    <td width="50%" valign="bottom"><p><strong>Cost / Piece</strong></p></td>
    <td width="44%"><input name="per_pc_cost" type="text" class="calcipeCal" id="per_pc_cost"  style="text-align:right; color:#000; font-weight:bold;" value="<?php echo $row->cost_per_piece; ?>" size="2" readonly="readonly"  /></td>
    <td style="color:#000;"><?php if($currency=="INR"){?>
      <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
      <?php }else if($currency=="USD"){?>
      <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
      <?php }else { echo "$currency"; }?></td>
  </tr>
  <tr>
    <td valign="bottom"><p><strong>SP / Piece</strong></p></td>
    <td><input class="calcipeCal" name="selling_price" value="<?php echo $row->selling_price; ?>" type="text" id="selling_price" size="10" readonly="readonly" style="text-align:right; color:#000; font-weight:bold;"  /></td>
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
<td height="1px" colspan="3"></td>
</tr>





<tr height="30px">
<td width="8" height="30px"  bgcolor="#5fa3c8" style="border-top-left-radius: 10px 10px; border-bottom-left-radius: 10px 10px;">&nbsp;</td>
<td height="30" bgcolor="#5fa3c8"><input class="calcipeCal" name="yield" type="text" id="yield" size="13" readonly style="text-align:right; display:none; color:#000; font-weight:bold;"  />
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="50%" valign="bottom"><p><strong>Number of Pieces</strong></p></td>
      <td><input name="numbers" type="text" class="calcipeCal" id="numbers" style="text-align:right; color:#000; font-weight:bold;" value="<?php echo $row->total_number; ?>" size="10" readonly="readonly"  />
        <input name="yield2" type="text" class="calcipeCal" id="yield2" value="<?php echo $row->yield; ?>" size="10" readonly="readonly"  style="text-align:right; display:none;; color:#000; font-weight:bold;"/></td>
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
<?php /*?><div id="add-recipi-btm-part">
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
<p style="color:#000;"><?php echo $row_recent->name;?></p>
     </li>
													
													<?php
													$norec++;
                                                    endforeach;
												 ?>
                
        
            </ul> <!-- end Slider #1 -->
        </div>       
         
        </div>       
<?php */?>        <br />
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
