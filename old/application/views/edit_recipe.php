	<link rel="stylesheet" href="<?php echo base_url();?>/css/recipeForm.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/pogress.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_edit.js"></script>
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

</style>
<style>
input, textarea {
	padding: 3px;
}

label {
	cursor: pointer;
}

.block {
	display: block;
}

small {
	letter-spacing: 1px;
	font-size: 11px;
	font-style: italic;
	color: #9e9e9e;
}

.info {
	text-align: left;
	padding: 5px;
	font: normal 11px Verdana, Arial, Helvetica, sans-serif;
	color: #fff;
	position: absolute;
	display: none;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: -1px 1px 2px #a9a9a9;
	-moz-box-shadow: -1px 1px 2px #a9a9a9;
	box-shadow: -1px 1px 2px #a9a9a9;
}

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

#send {
	background: #3f5a81;
	width: 100%;
	border: 5px solid #0F1620;
	font: bold 30px Verdana, sans-serif;
	color: #fafafa;
	text-shadow: 1px 1px 1px #0F1620;
	-webkit-border-radius: 7px;
	-moz-border-radius: 7px;
	border-radius: 7px;
}

#send:hover {
	background: #4d76b1;
	border: 5px solid #253750;
	color: #fff;
}

#send:active {
	text-indent: -10px;
}
.suggestionsBox1 {	position: absolute;
	width: 200px;
	background-color: #212427;
	border: 2px solid #000;
	color: #fff;
	padding: 5px;
	margin:10px 0px 0px 0px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
}
</style>
   	<div id="contentWrapper">
<div id="dashboard_style">
<?php if(isset($records)) : foreach($records as $row) : ?>     
         <div id="siteLink"><span><a href="#">Dash Board</a></span>/ Edit Recipe/ <?php echo $row->name;?></div>
    	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    	    <tr>
    	      <td width="17%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	        <tr>
    	          <td class="recipe_header">Recipe Informations</td>
  	          </tr>
    	      <tr>
    	          <td>Completed Recipe (10)</td>
  	          </tr>
    	      <tr>
    	          <td>InComplete Recipe (10)</td>
  	          </tr>
    	      <tr>
    	          <td>Total Recipe (20)</td>
  	          </tr>
    	      <tr>
    	        <td>&nbsp;</td>
  	        </tr>
    	      <tr>
    	        <td>&nbsp;</td>
  	        </tr>
  	          </table></td>
    	      <td width="1%" align="right" valign="top">&nbsp;</td>
    	      <td width="82%" align="right" valign="top"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" class="innerTable">
    	        <tr>
    	          <td width="100%" class="recipe_header">Edit Recipe Informations</td>
  	          </tr>
    	        <tr>
    	          <td height="5"></td>
  	          </tr>
    	        <tr>
    	          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	            <tr>
    	              <td><div id="progress_bar">
    	                <div id="progress"></div>
    	                <div id="progress_text">0% Complete</div>
  	                </div>
    	                <?php 
		$attribute = array ("id" => "recipe", "Class "=>"Form");
		$hidden = array("Parent_id"=>"0");
	echo form_open_multipart("home/edit_recipe/".$row->recipe_id, $attribute, $hidden); ?>
    	                <input type="hidden" name="rcpId" id="rcpId" value="<?php echo $row->recipe_id;?>"  />
    	                <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0" >
    	                  <tr>
    	                    <td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	                      <tr>
    	                        <td>Recipe Image:</td>
    	                        <td><input type="file" name="userfile" id="userfile" /></td>
  	                        </tr>
    	                      <tr>
    	                        <td><input type="hidden" name="T3" size="20" value="<?php echo $row->image;?>" />
    	                          <?php if($row->image != "") { ?>
    	                          <br />
    	                          <img border="0" src="<?php echo base_url();?>images/thumbs/<?php print $row->image;?>" width="120" height="100" />
    	                          <?php } ?></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Recipe Name :</td>
    	                        <td><input name="recipe_name" type="text" id="recipe_name" value="<?php echo $row->name;?>" size="30" /></td>
  	                        </tr>
    	                      <tr>
    	                        <td>Short Description :</td>
    	                        <td><textarea name="short_desc" id="short_desc" cols="30" rows="3"><?php echo $row->description;?></textarea></td>
  	                        </tr>
    	                      <tr>
    	                        <td>&nbsp;</td>
    	                        <td>&nbsp;</td>
  	                        </tr>
  	                      </table></td>
    	                    <td width="4%">&nbsp;</td>
    	                    <td width="46%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	                      <tr>
    	                        <td width="35%">Recipe Weight</td>
    	                        <td width="35%"><input name="rcp_weight" type="text" id="rcp_weight" size="10" onblur="calculate();" value="<?php echo $row->weight; ?>" /></td>
    	                        <td width="30%">&nbsp;</td>
  	                        </tr>
    	                      <tr class="recipe_header_sub">
    	                        <td>Food Loss %</td>
    	                        <td><input name="food_loss" type="text" id="food_loss" size="10" value="<?php echo $row->food_loss; ?>" onblur="calculate();" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Finished Weight</td>
    	                        <td><input name="finished_weight" type="text" id="finished_weight" value="<?php echo $row->Finished_weight; ?>" size="10" readonly="readonly" onblur="calculate();" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr class="recipe_header_sub">
    	                        <td>Weight / Portion</td>
    	                        <td><input name="weight" type="text" id="weight" size="10" value="<?php echo $row->Weight_portion; ?>" onblur="calculate();" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Per Piece Cost</td>
    	                        <td><input name="per_pc_cost" type="text" id="per_pc_cost" value="<?php echo $row->cost_per_piece; ?>" size="10" readonly="readonly" onblur="calculate();" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr class="recipe_header_sub">
    	                        <td>Numbers</td>
    	                        <td><input name="numbers" type="text" id="numbers" size="10" value="<?php echo $row->total_number; ?>" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Yeild</td>
    	                        <td><input name="yield" type="text" id="yield" size="10" value="<?php echo $row->yield; ?>" readonly="readonly" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Profit %</td>
    	                        <td><input name="profit" type="text" id="profit" value="<?php echo $row->profit; ?>" size="10" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Selling Price</td>
    	                        <td><input name="selling_price" type="text" id="selling_price" value="<?php echo $row->selling_price; ?>" size="10" readonly="readonly" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
    	                      <tr>
    	                        <td>Per Kilo Cost</td>
    	                        <td><input name="per_kilo_cost" type="text" id="per_kilo_cost" value="<?php echo $row->kilo_price; ?>" size="10" readonly="readonly" /></td>
    	                        <td>&nbsp;</td>
  	                        </tr>
  	                      </table></td>
  	                    </tr>
    	                  <tr>
    	                    <td colspan="3" valign="top"><input name="tot_row1" type="hidden" id="tot_row1" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_row" type="hidden" id="tot_row" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      Total Quantity
    	                      <input name="tot_qty" type="text" id="tot_qty" value="<?php echo $row->quantity; ?>" size="5" readonly="readonly" />
    	                      Total Amt
    	                      <input name="tot_amt" type="text" id="tot_amt" value="<?php echo $row->gradient_price; ?>" size="5" readonly="readonly" />
    	                      <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tblSample">
    	                        <tr class="recipe_header_sub">
    	                          <td width="32%">Ingredients</td>
    	                          <td width="39%">Quantity</td>
    	                          <td width="12%">Rate</td>
    	                          <td width="12%">Amount</td>
    	                          <td width="5%" align="center" valign="middle">&nbsp;</td>
  	                          </tr>
    	                        <?php 
				$incr=1;
				foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
    	                        <tr>
    	                          <td><input type="checkbox" name="chk" />
    	                            <input type="text" name="ingRow[]" id="ingRow<?php echo $incr;?>" size="20" value="<?php echo $grad->name; ?>" onkeyup="lookup(this.value,<?php echo $incr;?>);" />
    	                            <div class="suggestionsBox1" id="suggestions<?php echo $incr;?>" style="display: none;"> <img src="<?php echo base_url();?>images/upArrow.png" style="position: relative; top: -18px; left: 100px;" alt="upArrow" />
    	                              <div class="suggestionList" id="autoSuggestionsList<?php echo $incr;?>"> </div>
  	                              </div></td>
    	                          <td><input type="text" size="10" name="qtyRow[]" id="qtyRow<?php echo $incr;?>" value="<?php echo $grad->quantity; ?>"  />
    	                            <select onchange="calculate();" name="unitRow[]" id="unitRow<?php echo $incr;?>" style="width:100px; height:25px;">
    	                              <option value="1" <?php if($grad->measure=="KiloGram"){?> selected="selected"<?php }?>>KiloGram</option>
    	                              <option value="1" <?php if($grad->measure=="Liter"){?> selected="selected"<?php }?>>Liter</option>
    	                              <option value="4.35" <?php if($grad->measure=="Cup"){?> selected="selected"<?php }?>>Cup</option>
    	                              <option value="1000" <?php if($grad->measure=="Gram"){?> selected="selected"<?php }?>>Gram</option>
    	                              <option value="200" <?php if($grad->measure=="TeaSpoon"){?> selected="selected"<?php }?>>TeaSpoon</option>
    	                              <option value="66.67" <?php if($grad->measure=="TableSpoon"){?> selected="selected"<?php }?>>TableSpoon</option>
    	                              <option value="2.2" <?php if($grad->measure=="Ounce"){?> selected="selected"<?php }?>>Ounce</option>
    	                              <option value="35.71" <?php if($grad->measure=="Pound"){?> selected="selected"<?php }?>>Pound</option>
  	                              </select></td>
    	                          <td><input name="rateRow[]" type="text" id="rateRow<?php echo $incr;?>" value="<?php echo $grad->price; ?>" size="3" readonly="readonly"  /></td>
    	                          <td><input name="amtRow[]" type="text" id="amtRow<?php echo $incr;?>" value="<?php echo $grad->amount; ?>" size="3" readonly="readonly"  /></td>
    	                          <td align="center" valign="middle"><img src="<?php echo base_url();?>images/minus_image.png" width="14" height="14" onclick="\&quot;deleteRow('tblSample');calculate();\&quot;"/>
    	                            <input name="measureRow[]" type="hidden" id="measureRow<?php echo $incr;?>" value="<?php echo $grad->measure; ?>" size="10" readonly="readonly"  /></td>
  	                          </tr>
    	                        <?php $incr++;}?>
  	                        </table>
    	                      <table width="100%" border="0" cellspacing="2" cellpadding="2" id="tblSample1">
    	                        <tr class="recipe_header_sub">
    	                          <td>Ingradients</td>
    	                          <td>Quantity</td>
    	                          <td>Rate</td>
    	                          <td>Amount</td>
    	                          <td>&nbsp;</td>
  	                          </tr>
  	                        </table>
    	                      <script type="text/javascript">
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
    	                      <img src="<?php echo base_url();?>images/addmore.png" name="B1" id="B1" width="91" height="23" onclick="addIng();calculate();" /><a href="JavaScript:newPopup('<?php echo base_url();?>index.php/site/more_image/<?php echo $row->recipe_id;?>');"><img src="<?php echo base_url();?>images/addmore_images.png" width="144" height="31" border="0" /></a></td>
  	                    </tr>
    	                  <tr>
    	                    <td colspan="3" align="center">Directions: 
    	                      <textarea name="long_desc" cols="70" rows="5" id="long_desc"><?php echo $row->procedure; ?></textarea></td>
  	                    </tr>
    	                  <tr>
    	                    <td colspan="3" align="center"><input type="submit" id="E1" name="S1" value="Submit" class="green-button" />
    	                      <input type="button" name="slickbox" id="slickbox" value="Final" style="display:none"  /></td>
  	                    </tr>
  	                  </table>
    	                <?php  echo form_close(); ?></td>
  	              </tr>
  	            </table></td>
  	          </tr>
  	        </table></td>
  	        </tr>
  	    </table>
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe were Found.</h2>
	<?php endif; ?>
    	</div>	
    </div>