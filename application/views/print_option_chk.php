<?php 
	$query3 = $this->db->query("SELECT currency FROM user WHERE user_id=".$this->session->userdata('user_id'));
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	  $currency =$row3['currency'];
	}    

?>
<style>
#facebox {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  text-align: left;
}
#facebox .content {
  display:table;
  width: 595px;
  /*padding: 10px;*/
  background: #fafcfd;
  -webkit-border-radius:4px;
  -moz-border-radius:4px;
  border-radius:4px;
  height:auto;
}
</style>
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
  <script type="text/javascript">
var win=null;
function printIt(printThis)
{

	win = window.open();
	self.focus();
	win.document.open();
	win.document.write('<'+'html'+'><'+'head'+'><'+'title'+'>www.calcipe.com<'+'/title'+'><'+'style'+'>');
	win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
	win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
	win.document.write(printThis);
	win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
	win.document.close();
	win.print();
	document.getElementById('prnt').style.display='block';
	win.close();
}
</script>

<script language="javascript" type="text/javascript">
function print_doc()
{
document.getElementById('prnt').style.display='none';
window.print() ;	
}
function showContent()
{
	document.getElementById('prnt_cont').style.display='block';	
	document.getElementById('opn_cont').style.display='none';	
}
function CheckAll(chk)
{
for (i = 0; i < chk.length; i++)
chk[i].checked = true ;
}
</script>
<script type="text/javascript">
function validate(form) {
// Checking if at least one period button is selected. Or not.

var total=""
var did;
for(var i=0; i < document.form1.chk.length; i++){
if(document.form1.chk[i].checked)
{
//total +=document.form1.chk[i].value + "\n"
did=document.form1.chk[i].value;
	document.getElementById('dv'+did).style.display='block';
}
}
//if(total=="")
//alert("select scripts"); 
//else
//alert (total)

return false;
} 
function calculate1()
{
	var yield1=0.00;
	var inc1=0.00;
	var quantity1=0.00;
	var per_piece_weight1=parseFloat(document.getElementById('weight1').value);
//	var cookloss=0.00;
	var cookloss1=parseFloat(document.getElementById('food_loss1').value);
	var cook_loss_weight1=0.00;
	var inc_cook_loss_weight1=0.00;
	var finished_product1=0.00;
	var inc_finished_product1=0.00;
	var per_kg_cost1=0.00;
	var inc_per_kg_cost1=0.00;
//	var per_piece_weight=0.05;
	var no_of_pieces1=0.00;
	var inc_no_of_pieces1=0.00;
	var per_piece_cost1=0.00;
	var finished_cost1=0.00;
	var inc_finished_cost1=0.00;
	var new_formula1=0.00;
	var amount1=0.00;
	var total_amount1=0.00;
	var total_rate1=0.00;
	var indent1=230;
	var new_formula1=0;
	var total_weight1=0;
	var profit1=parseFloat(document.getElementById('profit1').value);


	total1=0;
	total_amt1=0;
 	var qtyRow1 = document.getElementsByName('qtyRow1[]');
  	var rateRow1 = document.getElementsByName('rateRow1[]');
  	var amtRow1 = document.getElementsByName('amtRow1[]');
   	var unitRow1 = document.getElementsByName('unitRow1[]');
   	var measureRow1 = document.getElementsByName('measureRow1[]');
	var count1 = 0;
//	alert(qtyRow.length);
//	alert(qtyRow1.length);
	for(i=0;i<qtyRow1.length;i++)
	{
	var rr1=qtyRow1[i].value;
//		total=total+parseFloat(document.getElementById('qtyRow'+i).value);
		total1=total1+parseFloat((rr1)*(1/parseFloat(unitRow1[i].options[unitRow1[i].selectedIndex].value)));
//		total_amt2=total_amt2+(parseFloat(document.getElementById('qtyRow'+i).value)*parseFloat(document.getElementById('rateRow'+i).value));
		total_amt1=total_amt1+(parseFloat(qtyRow1[i].value*(1/parseFloat(unitRow1[i].options[unitRow1[i].selectedIndex].value)))*parseFloat(rateRow1[i].value));
		total_rate1=total_rate1+parseFloat(rateRow1[i].value);
	    amtrw1=parseFloat(qtyRow1[i].value*(1/parseFloat(unitRow1[i].options[unitRow1[i].selectedIndex].value)))*parseFloat(rateRow1[i].value);
		amtRow1[i].value=parseFloat(amtrw1.toFixed(4));
		measureRow1[i].value=unitRow1[i].options[unitRow1[i].selectedIndex].text;
	}
//	alert(total_amt1);
	if(total1<=0)return false;
	document.getElementById('tot_qty1').value=total1.toFixed(4);
//	alert(document.getElementById('tot_amt').value);
	document.getElementById('tot_amt1').value=total_amt1.toFixed(4);
	
	quantity1=parseFloat(document.getElementById('tot_qty1').value);
	quantity1=parseFloat(quantity1.toFixed(4));
	total_amount1=document.getElementById('tot_amt1').value;
	
	
//	cook_loss_weight=quantity*parseFloat(document.getElementById('food_loss').value);
	cook_loss_weight1=quantity1*parseFloat(cookloss1/100);
	cook_loss_weight1=parseFloat(cook_loss_weight1.toFixed(4));
	finished_product1=parseFloat(quantity1-cook_loss_weight1);
	finished_product1=parseFloat(finished_product1.toFixed(4));
	per_kg_cost1=total_amount1/finished_product1;
	no_of_pieces1=parseFloat(finished_product1.toFixed(4)/per_piece_weight1.toFixed(4));
	per_piece_cost1=total_amount1/no_of_pieces1;
	per_piece_cost1=parseFloat(per_piece_cost1.toFixed(4));
//	yield=quantity.toFixed(4)/per_piece_cost.toFixed(4);
	yield=quantity1.toFixed(4)/no_of_pieces1.toFixed(4);
	new_formula1=indent1/yield1;
	finished_cost1=per_piece_cost1*parseFloat(document.getElementById('profit1').value)/100;
	sell_per_kg_cost1=per_kg_cost1*parseFloat(document.getElementById('profit1').value)/100;
	total_weight1=indent1.toFixed(4)/yield1.toFixed(4);
	document.getElementById('rcp_weight1').value=document.getElementById('tot_qty1').value;
	document.getElementById('food_loss1').value=parseFloat(cookloss1.toFixed(4));
	document.getElementById('finished_weight1').value=finished_product1.toFixed(4);
//	document.getElementById('numbers').value=quantity.toFixed(4);
	document.getElementById('numbers1').value=no_of_pieces1.toFixed(4);
	document.getElementById('yield1').value=yield1.toFixed(4);
	document.getElementById('selling_price1').value=finished_cost1.toFixed(4);
	//document.getElementById('weight').value=per_piece_weight;
	document.getElementById('per_pc_cost1').value=per_piece_cost1.toFixed(4);
	document.getElementById('per_kilo_cost1').value=per_kg_cost1.toFixed(4);
	document.getElementById('per_kilo_cost1').value=sell_per_kg_cost1.toFixed(4);
	document.getElementById('per_kg_cost1').value=per_kg_cost1.toFixed(4);
}
</script>
<div id="printable">
<div id="opn_cont">
<form name="form1">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox" value="1" checked disabled></td>
    <td>Recipe Name</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox2" value="2" checked disabled></td>
    <td>Brief Description</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox5" value="3"></td>
    <td>Cost</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox3" value="4"></td>
    <td>Formulas</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox4" value="5"></td>
    <td>Description</td>
  </tr>
  <tr>
    <td height="30" align="right"><input name="chk" type="checkbox" id="checkbox6" value="6"></td>
    <td>Photo</td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td><input type="button" name="chk_all" id="chk_all" value="Check All" onClick="CheckAll(document.form1.chk);">
    <input type="button" name="Done" id="Done" value="Done" onClick="showContent();validate(this);calculate1();"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>
<div id="prnt_cont" style="display:none;">
<?php if(isset($records)) : foreach($records as $row) : ?>
<table width="100%" height="542" border="0" cellspacing="0" cellpadding="0">
  <tr>
            <td width="1%">&nbsp;</td>
            <td  rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
              <tr class="recipe_header">
                <td class="custom_font"><div id="dv1">&nbsp;Recipe Name : <strong><?php echo ucfirst($row->name);?></strong></div></td>
              </tr>
              <tr class="recipe_header">
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="2"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="90%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="custom_font"><strong>Short Description</strong></td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td width="80%" class="custom_font"><div id="dv2"><?php echo $row->description;?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="custom_font">
                        <div id="dv3" style="display:none">
<input name="tot_row1" type="hidden" id="tot_row2" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_row" type="hidden" id="tot_row1" value="<?php echo $this->membership_model->num_gradients($row->recipe_id); ?>" />
    	                      <input name="tot_qty" type="hidden" id="tot_qty1" value="<?php echo $row->quantity; ?>" size="5" readonly="readonly" />
    	                      <input name="tot_amt" type="hidden" id="tot_amt1" value="<?php echo $row->gradient_price; ?>" size="5" readonly="readonly" />
<table width="98%" border="0" cellspacing="" cellpadding="4" id="tblSample" style="display:none">
    	                        <?php 
				$incr=1;
				foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
        <tr height="33px">
        <td width="22%" bgcolor="#FFFFFF" class=""><input type="checkbox" name="chk" id="chk<?php echo $incr;?>" style="display:none" />
        <input class="calcipeMediumBox"type="text" name="ingRow1[]" id="ingRow1<?php echo $incr;?>" size="15" value="<?php echo $grad->name; ?>"/>
</td>
        <td width="13%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" type="text" size="3" name="qtyRow1[]" id="qtyRow1<?php echo $incr;?>" value="<?php echo $grad->quantity; ?>" /></td><td width="24%" bgcolor="#FFFFFF">
        <select class="calSelectBox" name="unitRow1[]" id="unitRow1<?php echo $incr;?>" >
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
        <td width="13%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="rateRow1[]" id="rateRow1<?php echo $incr;?>" type="text" value="<?php echo $grad->price; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td width="20%" align="right" bgcolor="#FFFFFF" class=""><input class="calcipeAmtBox" name="amtRow1[]" id="amtRow1<?php echo $incr;?>" type="text" value="<?php echo $grad->amount; ?>" size="3" readonly="readonly"  style="text-align:right" /></td>
        <td width="8%" align="center" valign="middle" bgcolor="#FFFFFF" class=""><input type="hidden" name="gId1[]" id="gId1<?php echo $incr;?>" value="<?php echo $grad->id_gredient; ?>"  />
        <input name="measureRow1[]" id="measureRow1<?php echo $incr;?>" type="hidden" value="<?php echo $grad->measure; ?>" size="10" readonly="readonly" class="calcipeAmtBox"  /></td>
        </tr>        
    	                        <?php $incr++;}?>
            </table>          
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><strong>Costing</strong></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><table width="100%" border="0" cellpadding="3">
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Recipe Weight</td>
                                <td width="2%" align="right"><span class="custom_font1"> :</span></td>
                                <td width="22%" align="right"><?php echo $row->weight; ?></td>
                                <td width="31%">Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td class="custom_font1">Food Loss % </td>
                                <td align="right"><span class="custom_font1">:</span></td>
                                <td align="right"><?php echo $row->food_loss; ?></td>
                                <td><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Finished Weight </td>
                                <td align="right"><span class="custom_font1">:</span></td>
                                <td align="right"><?php echo $row->Finished_weight; ?></td>
                                <td>Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Weight Per Portion</td>
                                <td align="right"><span class="custom_font1"> :</span></td>
                                <td align="right"><?php echo $row->Weight_portion; ?></td>
                                <td>Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Per Piece Cost</td>
                                <td align="right"><span class="custom_font1">:</span></td>
                                <td align="right"><?php echo $row->cost_per_piece; ?></td>
                                <td><?php if($currency=="INR"){?>
                                  <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
                                  <?php }else{?>
                                  <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
                                  <?php }?></td>
                              </tr>
                              <tr style="width:100%;" >
                                <td width="45%" class="custom_font1">Per Kg Cost</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo number_format($row->kilo_price/3,2); ?></td>
                                <td><?php if($currency=="INR"){?>
                                  <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
                                  <?php }else{?>
                                  <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
                                  <?php }?></td>
                              </tr>
                              <tr style="width:100%;display:none" >
                                <td width="45%" class="custom_font1">Numbers</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo $row->total_number; ?></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr style="width:100%;display:none">
                                <td width="45%" class="custom_font1">Yeild</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo $row->yield; ?></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Profit %</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo $row->profit; ?></td>
                                <td><img src="<?php echo base_url();?>images/percent-icon.png" width="10" height="10"/></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Per Kilo Selling Price</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo $row->kilo_price; ?></td>
                                <td><?php if($currency=="INR"){?>
                                  <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
                                  <?php }else{?>
                                  <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
                                  <?php }?></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="45%" class="custom_font1">Per Piece Selling Price</td>
                                <td align="right">:</td>
                                <td align="right"><?php echo $row->selling_price; ?></td>
                                <td><?php if($currency=="INR"){?>
                                  <img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/>
                                  <?php }else{?>
                                  <img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/>
                                  <?php }?></td>
                              </tr>
                            </table></td>
                            </tr>
                        </table>
                        </div>
                        </td>
                      </tr>
                    </table></td>
                    <td></td>
                    <td >
					<div id="dv6"  style="display:none"><?php if($row->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row->image; ?>" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/no_image.jpg"  /><?php }?>
                    </div>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" class="custom_font"><div id="dv4" style="display:none">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left"><strong>Formulas</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><div id="tabvanilla" class="widget">
                    
                        <div id="popular" class="tabdiv">
                                	<ul style="color:#000;"> 
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
    
                                        <li type="circle"> <?php echo $qty_tex; ?> <?php echo $measure_tex; ?> <?php echo $grad->name; ?> </li>
	  <?php }?>
                                   </ul>
                        </div><!--/popular-->
                        
                     </div></td>
    </tr>
</table>
</div></td>
                  </tr>
                  <tr>
                    <td valign="top" class="custom_font">
                    <div id="dv5" style="display:none">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left"><strong>Description</strong></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" align="left"><?php echo $row->procedure; ?></td>
                        </tr>
                    </table>

                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="custom_font">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" class="custom_font">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top"><div id="prnt" style="cursor:pointer" onclick="document.getElementById('prnt').style.display='none';printIt(document.getElementById('prnt_cont').innerHTML);"><img src="<?php echo base_url();?>images/ClickPrint design.png" height="70" width="70" title="Print Recipe" /></div></td>
  </tr>
        </table>
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe Found.</h2>
	<?php endif; ?>
</div>
</div>