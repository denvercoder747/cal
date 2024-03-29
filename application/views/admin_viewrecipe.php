    <!--Start Main Container-->
   	<div id="contentWrapper">
    	<div id="dashboard_style">
<?php if(isset($records)) : foreach($records as $row) : ?>
<?php 
	$query3 = $this->db->query("SELECT currency FROM user WHERE user_id=".$row->user_id);
	if ($query3->num_rows() > 0)
	{
	   $row3 = $query3->row_array(); 
	  $currency =$row3['currency'];
	}    

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
              <tr class="recipe_header">
                <td><h3>Recipe Name :</h3> <?php echo ucfirst($row->name);?></td>
      </tr>
              <tr>
                <td height="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="70%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="recipe_header_sub"><h3>Short Description</h3></td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td width="93%"><?php echo $row->description;?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><h3>Costing</h3></td>
                      </tr>
                      <tr>
                        <td colspan="2"><table width="100%" border="0">
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Recipe Weight :</td>
                                <td width="56%"><?php echo $row->weight; ?>Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td class="custom_font1">Food Loss % :</td>
                                <td><?php echo $row->food_loss; ?><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Finished Weight :</td>
                                <td><?php echo $row->Finished_weight; ?>Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Weight Per Portion :</td>
                                <td><?php echo $row->Weight_portion; ?>Kg</td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Per Piece Cost:</td>
                                <td><?php echo $row->cost_per_piece; ?><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                              <tr style="width:100%;" >
                                <td width="48%" class="custom_font1">Per Kg Cost</td>
                                <td><?php echo number_format($row->kilo_price/3,2); ?><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                              <tr style="width:100%;display:none" >
                                <td width="44%" class="custom_font1">Numbers</td>
                                <td><?php echo $row->total_number; ?></td>
                              </tr>
                              <tr style="width:100%;display:none">
                                <td width="44%" class="custom_font1">Yeild</td>
                                <td><?php echo $row->yield; ?></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Profit %</td>
                                <td><?php echo $row->profit; ?><img src="<?php echo base_url();?>images/percent-icon.png" width="10" height="10"/></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Per Kilo Selling Price</td>
                                <td><?php echo $row->kilo_price; ?><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                              <tr style="width:100%;">
                                <td width="44%" class="custom_font1">Per Piece Selling Price</td>
                                <td><?php echo $row->selling_price; ?><?php if($currency=="INR"){?><img src="<?php echo base_url();?>images/rupees-icon.png" width="10" height="10"/><?php }else{?><img src="<?php echo base_url();?>images/dollar_icon.png" width="14" height="14"/><?php }?></td>
                              </tr>
                            </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    <td width="0%" valign="top"></td>
                    <td width="0%" valign="top"><?php if($row->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row->image; ?>" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/no_image.jpg" width="134" height="103" /><?php }?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" colspan="2">
                           		  <h3>Formulas</h3>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?php foreach($this->admin_model->get_gradients1($row->recipe_id,$row->user_id) as $grad){ ?>
                                                             
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
                                  <tr>
                                    <td><img src="<?php echo base_url();?>images/arrow.png" width="10" height="10" /></td>
                                    <td><?php echo $qty_tex; ?> <?php echo $measure_tex; ?> <?php echo $grad->name; ?></td>
                                  </tr>
								  <?php }?>
                                </table>
                    </td>
                  </tr>
                      <tr>
                        <td colspan="2" class="recipe_header_sub"><h3>Descriptions</h3></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><?php echo nl2br($row->procedure); ?></td>
                      </tr>
                </table></td>
              </tr>
          </table><?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe Found.</h2>
	<?php endif; ?>
        </div>
    </div>
    <!--End Main Container-->
