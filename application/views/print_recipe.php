<script language="javascript" type="text/javascript">
function print_doc()
{
document.getElementById('prnt').style.display='none';
window.print() ;	
}

</script>

    <!--Start Main Container-->
   	<div id="contentWrapper">
    	<div id="dashboard_style">
<?php if(isset($records)) : foreach($records as $row) : ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
            <td width="1%">&nbsp;</td>
            <td width="100%" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
              <tr class="recipe_header">
                <td bgcolor="#FF9393">&nbsp;Recipe Name : <strong><?php echo ucfirst($row->name);?></strong></td>
              </tr>
              <tr class="recipe_header">
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="60%" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="2" class="recipe_header_sub">Short Description</td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td width="93%"><?php echo $row->description;?></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="recipe_header_sub">Directions</td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><?php echo $row->procedure; ?></td>
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
                    <td height="320" valign="top">
                    <div id="tabvanilla" class="widget">
                    
                        <div id="popular" class="tabdiv">
                           <h2>Ingredients</h2>
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
    
                                        <li><img src="<?php echo base_url();?>images/arrow.png" width="10" height="10" /> <?php echo $qty_tex; ?> <?php echo $measure_tex; ?> <?php echo $grad->name; ?> </li>
	  <?php }?>
                                   </ul>
                        </div><!--/popular-->
                        
                     </div><!--/widget-->                    
                    </td>
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
    <td align="center" valign="top"><div id="prnt" style="cursor:pointer" onclick="print_doc();"><img src="<?php echo base_url();?>images/printer.png" title="Print Recipe" />Click to Print</div></td>
  </tr>
        </table>
<?php endforeach;?>
	<?php else : ?>	
	<h2>No Recipe Found.</h2>
	<?php endif; ?>
      </div>
    </div>
    <!--End Main Container-->
