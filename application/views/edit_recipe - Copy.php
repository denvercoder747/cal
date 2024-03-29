<?php 
	$query3 = $this->db->query("SELECT profit FROM user WHERE user_id=".$this->session->userdata('user_id'));
	
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	   $profitval =$row3['profit'];
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
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <!-- slide show -->
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <!--
      jCarousel library
    -->
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
function fill(thisValue,id,qty,price,pricekg,mes) {
//	$('#unitRow1').attr('selectedIndex', 2);
//	alert(mes);
	$('#ingRow'+id).val(thisValue);
	$('#qtyRow'+id).val(qty);
	$('#rateRow'+id).val(pricekg);
//	$('#unitRow'+id).val(66.67);
	$('#amtRow'+id).val(price);
	$('#measureRow'+id).val(mes);
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
.error {
	background: #f60000;
	border: 3px solid #d50000;

}

.correct {
	background: #56d800;
	border: 3px solid #008000;
}

.wrong {
	font-weight: bold;
	color: #e90000;
}

.normal {
	font-weight: normal;
	color: #222;
}
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
	width:0px;
	height:16px;
}
#barbox {
	float:right;
	height:16px;
	background-color:#FFFFFF;
	width:200px;
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
</head>
<body onload="ref();">
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
                    <div class="art-content-inner">
                        <div class="art-Post">
<?php if(isset($records)) : foreach($records as $row) : ?>     
        <?php 
		$attribute = array ("id" => "recipe", "Class "=>"Form");
		$hidden = array("Parent_id"=>"0");
	echo form_open_multipart("home/edit_recipe/".$row->recipe_id, $attribute, $hidden); ?>
    <script>
function ref()
{
var cnt =<?php echo $row->progress_value; ?>;//Get the values in the textarea
var max_numb_of_words = 100;//Set the Maximum Number of words
var main = cnt*100;//Multiply the lenght on words x 100

var value= (main / max_numb_of_words);//Divide it by the Max numb of words previously declared
	$("#progressbar").css("background-color","#5fbbde");//Set the background of the progressbar to blue
	$('#count').html(cnt+'%');//Output the count variable previously calculated into the div with id= count
	$('#progressbar').animate(//Increase the width of the css property "width"
	{
	"width": value+'%',
	}, 1);//Increase the progress bar
					if(cnt <= 20)
					{
					$("#progressbar").css("background-color","#F30808");//Set the background of the progressbar to blue
					$('#count').html(cnt+'%');//Output the count variable previously calculated into the div with id= count
					$('#progressbar').animate(//Increase the width of the css property "width"
					{
					"width": value+'%',
					}, 1);//Increase the progress bar
					}
					if(cnt > 20 && cnt <= 40)
					{
					$("#progressbar").css("background-color","#F3EA08");//Set the background of the progressbar to blue
					$('#count').html(cnt+'%');//Output the count variable previously calculated into the div with id= count
					$('#progressbar').animate(//Increase the width of the css property "width"
					{
					"width": value+'%',
					}, 1);//Increase the progress bar
					}
					if(cnt > 40 && cnt <= 80)
					{
					$("#progressbar").css("background-color","#EC5109");//Set the background of the progressbar to blue
					$('#count').html(cnt+'%');//Output the count variable previously calculated into the div with id= count
					$('#progressbar').animate(//Increase the width of the css property "width"
					{
					"width": value+'%',
					}, 1);//Increase the progress bar
					}
					if(cnt > 80 && cnt <= 100)
					{
					$("#progressbar").css("background-color","#24F308");//Set the background of the progressbar to blue
					$('#count').html(cnt+'%');//Output the count variable previously calculated into the div with id= count
					$('#progressbar').animate(//Increase the width of the css property "width"
					{
					"width": value+'%',
					}, 1);//Increase the progress bar
					}
				if(cnt==100)
				{
					
					$('#progress_status').val('Complete');
				//	$('#slickbox').show('slow');
				}
				else
				{
					$('#progress_status').val('Incomplete');
					$('#slickbox').hide('fast');
				}
					$('#progress_val').val(cnt);
					
					return false;
}
	</script>   
                                <div class="contentDivCss" style="">
                                        <div id="leftInnerpage">
                                                 <div class="spiralCSS"></div>
                                                 <div class="ruledPaper"><br />
                                                  <div style="position:relative;margin-top:12px;">
                                                        <div id="bigFont">View Recipe </div>
                                                        <div style="float:right;">
                    <div id="barbox">
                      <div id="progressbar"></div>
                    </div>
                    </div>
                    <div id="count"><?php echo $row->progress_value; ?>%</div>
                    <input type="hidden" id="progress_status" name="progress_status"  />
                    <input type="hidden" id="progress_val" name="progress_val"  /></div><div id="processBar"><img src="/images/processbar.png" width="48" height="48" />
                                                        
                                                  </div>     
    	                <input type="hidden" name="rcpId" id="rcpId" value="<?php echo $row->recipe_id;?>"  />
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="6">
                                                   <tr><th class="tblLeft">Name of Recipe :</th><td class="tblhtmlBox" width="74%"><?php echo $row->name;?></td></tr>
                                                   
                                                   <tr><th class="">Photo of Recipe :</th><td width="74%">
    	                          <?php if($row->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row->image; ?>" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/no_image.jpg" width="134" height="103" /><?php }?></td></tr>
                                                   <tr><th class="" style="vertical-align:top;">Brief of Recipe :</th><td width="74%"><?php echo $row->description;?></td></tr>
                                                   <tr><th class="" style="vertical-align:top;">Description of Recipe :</th><td width="74%"><?php echo $row->procedure; ?></td></tr>
                                                   <tr>
                                                     <th class="" style="vertical-align:top;">&nbsp;</th>
                                                     <td><div id="popular" class="tabdiv">
                           <ul>
                           		<li><h2>Ingredients</h2>
                                	<ul> 
<?php foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
    
                                        <li><img src="<?php echo base_url();?>images/arrow.png" width="10" height="10" /> <?php echo $grad->quantity; ?> <?php echo $grad->measure; ?> <?php echo $grad->name; ?> </li>
	  <?php }?>
                                   </ul>
                                </li>
                            </ul>
                        </div></td>
                                                   </tr>
                                                   </table>
                                                   <tr>
                                                     <th class="" style="vertical-align:top;">&nbsp;</th>
                                                     <td>                                 <ul>
<?php foreach($this->membership_model->get_recipe_photos($row->recipe_id) as $grad){ ?>
                                        <li><a href="<?php echo base_url();?>assets/uploads/original/<?php echo $grad->image;?>" rel="lightbox"><img class="hover_img_speed" src="<?php echo base_url();?>assets/uploads/thumbs/thumb_<?php echo $grad->image;?>" alt="text" /></a></li>
	  <?php }?>
                                 
                                </ul>
</td>
                                                   </tr>
                                                   
                                                 <!-- Sanjay Code --></div>
                                         </div>
                                       <!-- <div id="rightInnerPage"></div>-->
                                        <div id="rightInnerPage">
                                        		<div id="recipeCost">             
                       <div id="recipeCostView">
                        
                        <table width="100%" border="0">
                        <tr style="width:100%;">
                       		 <td width="55%">Recipe Weight :</td><td><input class="calcipeCal" name="rcp_weight" type="text" id="rcp_weight" value="<?php echo $row->weight; ?>" size="3"   /></td>
                        </tr>
                        <tr style="width:100%;">
                          <td>Food Loss % :</td>
                          <td><input class="calcipeCal" name="food_loss" type="text" id="food_loss" value="<?php echo $row->food_loss; ?>" size="3"   /></td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="55%">Finished Weight :</td><td><input class="calcipeCal" name="finished_weight" type="text" id="finished_weight" value="<?php echo $row->Finished_weight; ?>" size="3"   /></td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="55%">Weight Per Portion :</td><td><input class="calcipeCal" name="weight" type="text" id="weight" value="<?php echo $row->Weight_portion; ?>" size="3"   /></td>
                        </tr>
                        <tr style="width:100%;">
                       		 <td width="55%">Per Piece Cost:</td><td><input class="calcipeCal" name="per_pc_cost" type="text" id="per_pc_cost" value="<?php echo $row->cost_per_piece; ?>" size="3"   /></td>
                        </tr>
                        
                      <tr style="width:100%;display:none" >
                        <td width="55%">Numbers</td>
                        <td><input name="numbers" type="text" class="calcipeCal" id="numbers" value="<?php echo $row->total_number; ?>" size="10" /></td>
                        </tr>
                      <tr style="width:100%;display:none">
                        <td width="55%">Yeild</td>
                        <td><input name="yield" type="text" class="calcipeCal" id="yield" value="<?php echo $row->yield; ?>" size="10" readonly="readonly" /></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="55%">Profit %</td>
                        <td><input class="calcipeCal" name="profit" type="text" id="profit" value="<?php echo $row->profit; ?>" size="10"onblur="calculate();" /></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="55%">Per Kilo Cost</td>
                        <td><input name="per_kilo_cost" type="text" class="calcipeCal" id="per_kilo_cost" value="<?php echo $row->kilo_price; ?>" size="10" readonly="readonly" /></td>
                        </tr>
                      <tr style="width:100%;">
                        <td width="55%">Selling Price</td>
                        <td><input name="selling_price" type="text" class="calcipeCal" id="selling_price" value="<?php echo $row->selling_price; ?>" size="10" readonly="readonly" /></td>
                        </tr>
                        </table>
                        </div>
                                                
                                                </div><br />
                                                <div id="buyNow"><a href="#"><img src="/images/buynow.png" width="330px" height="140px" /></a></div><Br />
                                                <div id="slideRecipe">
                                                <center><B>Recipes</B></center>
                                                 <ul id="mycarousel" class="jcarousel-skin-tango">
                                                    <li><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" /></li>
                                                
                                                    <li><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" /></li>
                                                    <li><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="75" height="75" alt="" /></li>
                                                  </ul>
                                                </div>
                                        </div>
                                </div>
                                
	<?php  echo form_close(); ?>      
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe Found.</h2>
	<?php endif; ?>
                </div>
                    </div>
                   <!--  Right Side bar Informations -->
                                       <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 

