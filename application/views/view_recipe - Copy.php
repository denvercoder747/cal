<script language="javascript" type="text/javascript">
$(window).load(function() {
  $(".hover_img_speed").insetBorder({
	speed: 500
  });
});
</script>

    <!--Start Main Container-->
   	<div id="contentWrapper">
    	<div id="dashboard_style">
<?php if(isset($records)) : foreach($records as $row) : ?>     
       	  <div id="siteLink"><span><a href="<?php echo base_url();?>index.php/site/dash_board">Dash Board</a></span>/<span><a href="#">View Recipe</a></span>/ <?php echo ucfirst($row->name);?></div>
     
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
            <td width="1%">&nbsp;</td>
            <td width="82%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="recipeTable">
              <tr class="recipe_header">
                <td>Recipe Name : <?php echo ucfirst($row->name);?></td>
              </tr>
              <tr>
                <td height="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="70%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              </tr><script type="text/javascript">
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
              <tr>
                <td align="right">&nbsp;<a href="JavaScript:newPopup('<?php echo base_url();?>index.php/site/print_recipe/<?php echo $row->recipe_id;?>');"><img src="<?php echo base_url();?>images/printer.png" title="Print Recipe" /></a><a href="../../site/members_area/<?php echo $row->recipe_id;?>"><img src="<?php echo base_url();?>images/add_text.png" title="Add Recipe" /></a><a href="../../site/edit_recipe/<?php echo $row->recipe_id;?>"><img src="<?php echo base_url();?>images/Edit_Text.png" title="Edit Recipe" /></a></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="320" valign="top">
                    <div id="tabvanilla" class="widget">
                        <ul class="tabnav">
                            <li><a href="#popular">Full Recipe Information</a></li>
                        </ul>
                    
                        <div id="popular" class="tabdiv">
                           <ul>
                           		<li><h2>Ingredients</h2>
                                	<ul> 
<?php foreach($this->membership_model->get_gradients($row->recipe_id) as $grad){ ?>
    
                                        <li><img src="<?php echo base_url();?>images/arrow.png" width="10" height="10" /> <?php echo $grad->quantity; ?> <?php echo $grad->measure; ?> <?php echo $grad->name; ?> </li>
	  <?php }?>
                                   </ul>
                                </li>
                            </ul>
                        </div><!--/popular-->
                        <ul class="tabnav">
                            <li><a href="#featured">More Recipe Images</a></li>
                        </ul>
                        <div id="featured" class="tabdiv">
                            <div id="recipe_more_image">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top">
                                 <ul>
<?php foreach($this->membership_model->get_recipe_photos($row->recipe_id) as $grad){ ?>
                                        <li><a href="<?php echo base_url();?>assets/uploads/original/<?php echo $grad->image;?>" rel="lightbox"><img class="hover_img_speed" src="<?php echo base_url();?>assets/uploads/thumbs/thumb_<?php echo $grad->image;?>" alt="text" /></a></li>
	  <?php }?>
                                 
                                </ul>
                                </td>
                                </tr>
                            </table>
                            </div>
                        </div><!--featured-->
                     </div><!--/widget-->                    
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
        </div>
    </div>
    <!--End Main Container-->
