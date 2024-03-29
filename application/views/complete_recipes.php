	<link rel="stylesheet" href="<?php echo base_url();?>css/pogress.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
   	
    <div id="contentWrapper">
    	<div id="dashboard_style">
        	 <div id="siteLink"><span><a href="<?php echo base_url();?>index.php/site/dash_board">Dash Board</a></span>/ View All Recipe
				<div id="add_items_link"><a href="members_area">Add Recipe</a></div>
                </div>
        	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="17%" valign="top"><?php $this->load->view('includes/left_panel'); ?></td>
                 <td width="1%">&nbsp;</td>
                 <td width="82%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr class="recipe_header">
                     <td width="32%">View All Recipe's</td>
                     <td width="68%" align="right"><!--<div id="show"></div>-->
					 <?php echo $this->session->flashdata('message'); ?></td>
                   </tr>
                   <tr>
                     <td height="5" colspan="2"></td>
                   </tr>
					<?php 
                    $i=1;
                    if(isset($records)) : foreach($records as $row) : ?>
                   <tr>
                     <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
                       <tr>
                         <td colspan="2" class="recipe_header_name">
						 <?php echo anchor("site/view_recipe/$row->recipe_id", $row->name); ?></td>
                       </tr>
                       <tr>
                         <td height="2" colspan="2"></td>
                       </tr>
                       <tr>
                         <td width="57%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td width="31%"><?php if($row->image){ ?><img src="<?php echo base_url();?>images/thumbs/<?php echo $row->image; ?>" width="134" height="103" /><?php }else{?><img src="<?php echo base_url();?>images/thumbs/no_image.jpg" width="134" height="103" /><?php }?></td>
                             <td width="69%" align="left" valign="top"><?php echo $row->description; ?></td>
                           </tr>
                         </table></td>
                         <td width="43%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr class="recipe_header_sub">
                             <td>Indent</td>
                             <td>Per Piece Weight</td>
                             <td>Per Kilo Price</td>
                           </tr>
                           <tr>
                             <td><input name="indent<?php echo $i;?>" type="text" id="indent<?php echo $i;?>" size="8" value="230" onblur="new_formula(<?php echo $i;?>);" /></td>
                             <td><input name="weight<?php echo $i;?>" type="text" id="weight<?php echo $i;?>" size="8" value="0.05" onblur="new_formula(<?php echo $i;?>);"  /></td>
                             <td><input name="per_kilo_cost<?php echo $i;?>" type="text" id="per_kilo_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->kilo_price; ?>" /></td>
                           </tr>
                           <tr class="recipe_header_sub">
                             <td>Add Profit</td>
                             <td>Selling Price</td>
                             <td>Per Piece Price</td>
                           </tr>
                           <tr>
                             <td><input name="profit<?php echo $i;?>" type="text" id="profit<?php echo $i;?>" size="10" value="<?php echo $row->profit; ?>"  onblur="new_formula(<?php echo $i;?>);"/></td>
                             <td><input name="selling_price<?php echo $i;?>" type="text" id="selling_price<?php echo $i;?>" size="10" value="<?php echo $row->selling_price; ?>" readonly="readonly" /></td>
                             <td><input name="per_pc_cost<?php echo $i;?>" type="text" id="per_pc_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->cost_per_piece; ?>" onblur="calculate();" /></td>
                           </tr>
                           <tr>
                             <td><input name="new_formula<?php echo $i;?>" type="hidden" id="new_formula<?php echo $i;?>" size="10" value="<?php echo $row->quantity; ?>" />
                             <input name="yield<?php echo $i;?>" type="hidden" id="yield<?php echo $i;?>" size="10" value="<?php echo $row->yield; ?>" />
                             <input name="inc_cook_loss<?php echo $i;?>" type="hidden" id="inc_cook_loss<?php echo $i;?>" size="10" value="<?php echo $row->food_loss; ?>" />
                             <input name="total_price<?php echo $i;?>" type="hidden" id="total_price<?php echo $i;?>" size="10" value="<?php echo $row->gradient_price; ?>" />
                             <input name="per_pc_weight<?php echo $i;?>" type="hidden" id="per_pc_weight<?php echo $i;?>" size="10" value="<?php echo $row->Weight_portion; ?>" /></td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                           </tr>
                         </table></td>
                       </tr>
                       <tr>
                         <td colspan="2" align="right"><?php echo anchor('site/view_recipe/'. $row->recipe_id, 'Goto Recipe','class=recipe_link'); ?> | <?php echo anchor('site/edit_recipe/'. $row->recipe_id, 'Edit Recipe','class=recipe_link'); ?> | <?php echo anchor('site/delete_recipe/' . $row->recipe_id, 'Delete',"onClick=\" return confirm('Are you sure you want to '+ 'delete the record for".addslashes( $row->name)."?')\"") ; ?></td>
                       </tr>
                     </table></td>
                   </tr>
	<?php $i++;endforeach; ?>
                   <tr>
                     <td height="5" colspan="2"><?php echo $this->pagination->create_links(); ?></td>
                   </tr>
                   <tr>
                     <td colspan="2">
						<?php else : ?>	
                        <h2>No Recipe Found.</h2>
                        <?php endif; ?>
                      </td>
                    </tr>
                 </table></td>
               </tr>
             </table>
    	</div>
    </div>