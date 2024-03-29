<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<?php require_once('front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/slidediv.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
    
    <link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/js_function.js"></script>

    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$('a[rel*=facebox]').facebox({
		loadingImage : '/images/loading.gif',
		closeImage   : '/images/close.png'
		})
	});
	</script>
</head>
<body>
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
                            <div class="art-Post-tl"></div>
                            <div class="art-Post-tr"></div>
                            <div class="art-Post-bl"></div>
                            <div class="art-Post-br"></div>
                            <div class="art-Post-tc"></div>
                            <div class="art-Post-bc"></div>
                            <div class="art-Post-cl"></div>
                            <div class="art-Post-cr"></div>
                            <div class="art-Post-cc"></div>
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                        <div id="viewRecipe">
                                <div id="bigFont">Recipe Search Results </div><Br /><div style="color:#F00; text-align:center; font-size:12px"><?php echo $this->session->flashdata('message'); ?></div>
                                <table width="100%" cellpadding="" cellspacing="" border="0" >
                                <tr><td>
                                	<div id="reqRecipeIcons">
                                    		Edit&nbsp;
                                            Share&nbsp;
                                            Print&nbsp;
                                            Duplicate&nbsp;
                                            Pdf&nbsp;
                               		</div></td></tr>
<script type="text/javascript">
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
function newPopup1(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=200,width=700,left=300,top=300,resizable=yes,scrollbars=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>                                <!--<img src="/images/view-edit.png" width="920px" height="700px;" />-->
					<?php 
                    $i=1;
                    if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="trActive"><td>
                                <div id="reqRecipeIcons">
                                <table border="0" cellpadding="" cellspacing="" width="170px">
                                <tr><td>
                                	<a href="<?php echo base_url();?>index.php/site/edit_recipe/<?php echo $row->recipe_id;?>"><img src="/images/edit_recipe.png"  title="Edit" width="24" height="24" /></a>
                                </td><td>
                             	  <a href="<?php echo base_url();?>index.php/site/share/<?php echo $row->name; ?>" rel="facebox" ><img src="/images/share_recipe.png"  title="Share" width="24" height="24" /></a>
                                </td><td>
                               		<a href="JavaScript:newPopup('<?php echo base_url();?>index.php/site/print_recipe/<?php echo $row->recipe_id;?>');"><img src="/images/print_recipe.png"  title="Print" width="24" height="24" /></a>
                               </td><td align="center">
                             	   <a href="<?php echo base_url();?>index.php/site/copy_recipe/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/duplicate_recipe.png" width="24"  title="Duplicate" height="24" /></a>
                                </td><td align="right";>
                               		 <a href="<?php echo base_url();?>index.php/site/recipe_pdf/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/pdf_recipe.png"  title="Pdf" width="24" height="24" /></a>
                                </td></tr>
                                </table>
                                
                                
                                
                               
                               
                                </div>
                                <div style="width:700px;">
                                <div class="recipeLink"><a href="<?php echo base_url();?>index.php/site/view_recipe/<?php echo $row->recipe_id;?>" style="text-decoration:none;"><?php echo $row->name; ?></a></div>
                                </div>
                                <div class="dhtmlgoodiesView"><img src="/images/slideshow.png" width="24" height="24" title="Slide" /></div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                            	<div class="SliceContentLeft">
                                                 <p> <?php echo $row->description; ?></p>
                                              </div>
                                                <div class="SliceContentRight">
                                                <table width="" cellpadding="3" cellspacing="" border="0">
                                                <tr>
                                                	<td class="trFont">Indent</td>
                                                    <td class="trFont">Per Piece Weight</td>
                                                    <td class="trFont">Per Kilo Price</td>
                                                 </tr>
                                                 <tr>
                                                	<td><input class="smallTxtBox" name="indent<?php echo $i;?>" type="text" id="indent<?php echo $i;?>" size="8" value="230" onblur="new_formula(<?php echo $i;?>);" /></td>
                                                    <td><input class="smallTxtBox"  name="weight<?php echo $i;?>" type="text" id="weight<?php echo $i;?>" size="8" value="0.05" onblur="new_formula(<?php echo $i;?>);"  /></td>
                                                    <td><input class="smallTxtBox"  name="per_kilo_cost<?php echo $i;?>" type="text" id="per_kilo_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->kilo_price; ?>" /></td>
                                                 </tr>
                                                <tr>
                                                    <td class="trFont">Add Profit</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Per Piece Price</td>
                                                 </tr>
                                                 <tr>
                                                    <td><input name="profit<?php echo $i;?>" type="text" id="profit<?php echo $i;?>" size="10" value="<?php echo $row->profit; ?>"  onblur="new_formula(<?php echo $i;?>);"/></td>
                                                    <td><input name="selling_price<?php echo $i;?>" type="text" id="selling_price<?php echo $i;?>" size="10" value="<?php echo $row->selling_price; ?>" readonly="readonly" /></td>
                                                    <td><input name="per_pc_cost<?php echo $i;?>" type="text" id="per_pc_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->cost_per_piece; ?>" onblur="calculate();" /></td>
                                                 </tr>
                                                 <tr>
                                                   <td colspan="3"><?php echo anchor('site/view_recipe/'. $row->recipe_id, 'Goto Recipe','class=recipe_link'); ?> | <?php echo anchor('site/edit_recipe/'. $row->recipe_id, 'Edit Recipe','class=recipe_link'); ?> | <?php echo anchor('site/delete_recipe/' . $row->recipe_id, 'Delete',"onClick=\" return confirm('Are you sure you want to '+ 'delete the record for".addslashes( $row->name)."?')\"") ; ?></td>
                                                 </tr>
                                                 <tr>
                                                   <td colspan="3"><input name="new_formula<?php echo $i;?>" type="hidden" id="new_formula<?php echo $i;?>" size="10" value="<?php echo $row->quantity; ?>" />
                             <input name="yield<?php echo $i;?>" type="hidden" id="yield<?php echo $i;?>" size="10" value="<?php echo $row->yield; ?>" />
                             <input name="inc_cook_loss<?php echo $i;?>" type="hidden" id="inc_cook_loss<?php echo $i;?>" size="10" value="<?php echo $row->food_loss; ?>" />
                             <input name="total_price<?php echo $i;?>" type="hidden" id="total_price<?php echo $i;?>" size="10" value="<?php echo $row->gradient_price; ?>" />
                             <input name="per_pc_weight<?php echo $i;?>" type="hidden" id="per_pc_weight<?php echo $i;?>" size="10" value="<?php echo $row->Weight_portion; ?>" /></td>
                                                  </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
                                
						<?php $i++;endforeach; ?>
                                
						<?php echo $this->pagination->create_links(); ?>						
						<?php else : ?>	
                        No Recipe Found.
                        <?php endif; ?>
                          </table>
                        </div>
                        </div>
                      
                        
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 
