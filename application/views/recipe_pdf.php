<?php if(isset($records)) : foreach($records as $row) : ?>     
     
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="82%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
              <tr class="recipe_header">
                <td height="30">Recipe Name : <strong><?php echo ucfirst($row->name);?></strong></td>
              </tr>
              <tr>
                <td height="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="70%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" colspan="2" class="recipe_header_sub"><strong>Short Description</strong></td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td width="93%"><?php echo $row->description;?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr><script type="text/javascript">
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top">
                    
                        <div id="popular" class="tabdiv">
                           		<h3>Recipes</h3>
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
                                        <li type="circle"> <?php echo $qty_tex; ?> <?php echo $measure_tex; ?> <?php echo $grad->name; ?> </li>
	  <?php }?>
                                   </ul>
                        </div><!--/popular-->
                                </td>
                                </tr>
                      <tr>
                        <td height="30" class="recipe_header_sub"><strong>Directions</strong></td>
                        </tr>
                      <tr>
                        <td><?php echo nl2br($row->procedure); ?></td>
                      </tr>
                            </table>
                            
                        <!--featured-->
                     <!--/widget-->                    
                </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table>
<?php endforeach;?>
	<?php else : ?>	
<h2>No Recipe Found.</h2>
	<?php endif; ?>
