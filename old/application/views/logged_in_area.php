	<link rel="stylesheet" href="<?php echo base_url();?>/css/pogress.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/validation_rec2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/calculation_recipe.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
<script>
function lookup(inputString,id) {
	var link = "/index.php/gredient";

    if(inputString.length < 1) {

        // Hide the suggestion box.
        $('#suggestions').hide();

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
.delete
{
	
}
</style>
   	<div id="contentWrapper">
    	<div id="dashboard_style">
         <div id="siteLink"><span><a href="index.php">Dash Board</a></span>/ Add Recipe</div>
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
    	          <td width="100%" class="recipe_header">Add Recipe Informations</td>
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
	echo form_open_multipart("home/add_recipe", $attribute, $hidden); ?>
                     
    	                <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
    	                  <tr>
    	                    <td width="50%" valign="top">
                            <input name="tot_row1" type="hidden" id="tot_row1" value="0" ><input name="tot_row" type="hidden" id="tot_row" value="0" >
            Total Quantity
            <input name="tot_qty" type="text" id="tot_qty" value="0" size="5" readonly="readonly" >
              Total Amt
              <input name="tot_amt" type="text" id="tot_amt" value="0" size="5" readonly="readonly"  >
    	 
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="tblSample">
    	                      <tr class="recipe_header_sub">
    	                        <td width="32%">Ingredients</td>
    	                        <td width="39%">Quantity</td>
    	                        <td width="12%">Rate</td>
    	                        <td width="12%">Amount</td>
    	                        <td width="5%" align="center" valign="middle">&nbsp;</td>
  	                        </tr>
  	                      </table><img src="<?php echo base_url();?>images/addmore.png" name="B1" id="B1" width="91" height="23" onClick="addIng();calculate();" /></td>
    	                    <td width="4%">&nbsp;</td>
    	                    <td width="46%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	                      <tr>
    	                        <td height="24" colspan="2" align="center" valign="top"></td>
  	                        </tr>
    	                      <tr>
    	                        <td valign="top">&nbsp;</td>
    	                        <td height="24"><input type="file" name="userfile" id="userfile" /></td>
  	                        </tr>
    	                      <tr>
    	                        <td width="28%" valign="top">&nbsp;</td>
    	                        <td width="72%" height="24"><input type="text" name="recipe_name" id="recipe_name" /></td>
  	                        </tr>
    	                      <tr>
    	                        <td width="28%" valign="top">&nbsp;</td>
    	                        <td><textarea name="short_desc" id="short_desc" cols="35" rows="4"></textarea></td>
  	                        </tr>
    	                      <tr>
    	                        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    	                          <tr>
    	                            <td width="35%">Recipe Weight</td>
    	                            <td width="35%"><input name="rcp_weight" type="text" id="rcp_weight" size="10" onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Food Loss %</td>
    	                            <td><input name="food_loss" type="text" id="food_loss" size="10" value="0" onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Finished Weight</td>
    	                            <td><input name="finished_weight" type="text" id="finished_weight" size="10" readonly="readonly" onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Weight / Portion</td>
    	                            <td><input name="weight" type="text" id="weight" size="10" onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Per Piece Cost</td>
    	                            <td><input name="per_pc_cost" type="text" id="per_pc_cost" size="10" readonly="readonly" onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Numbers</td>
    	                            <td><input name="numbers" type="text" id="numbers" size="10" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Yeild</td>
    	                            <td><input name="yield" type="text" id="yield" size="10" readonly="readonly" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Profit %</td>
    	                            <td><input name="profit" type="text" id="profit" size="10"onblur="calculate();" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Per Kilo Cost</td>
    	                            <td><input name="per_kilo_cost" type="text" id="per_kilo_cost" size="10" readonly="readonly" /></td>
    	                            </tr>
    	                          <tr>
    	                            <td>Selling Price</td>
    	                            <td><input name="selling_price" type="text" id="selling_price" size="10" readonly="readonly" /></td>
    	                            </tr>
  	                            </table></td>
  	                        </tr>
  	                      </table></td>
  	                    </tr>
    	                  <tr>
    	                    <td colspan="3" align="center">Directions: 
    	                      <textarea name="long_desc" cols="60" rows="5" id="long_desc"></textarea></td>
  	                    </tr>
    	                  <tr>
    	                    <td colspan="3" align="center"><input type="submit" id="S1" name="S1" value="Submit" /><input type="button" name="slickbox" id="slickbox" value="Final"  /></td>
  	                    </tr>
  	                  </table>
  	               <?php  echo form_close(); ?></td>
  	              </tr>
  	            </table></td>
  	          </tr>
  	        </table></td>
  	        </tr>
  	    </table>
    	</div>
    </div>
