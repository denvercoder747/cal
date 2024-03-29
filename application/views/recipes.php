<?php
if($this->session->userdata('recipe_counter'))
{
	$cnt_val=$this->session->userdata('recipe_counter')+1;
	$this->session->set_userdata('recipe_counter',$cnt_val);
}
else
{
$this->session->set_userdata('recipe_counter',1);
}
?>
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
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
 <link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />

    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$('a[rel*=facebox]').facebox({
		loadingImage : '/images/loading.gif',
		closeImage   : '/images/close.png'
		})
//		alert(document.getElementById('hdn_counter').value);
		if(document.getElementById('hdn_counter').value>10)
		{
		 jQuery.facebox({ 
		 ajax: '<?php echo base_url();?>index.php/site/shareFriend/' ,
			loadingImage : '/images/loading.gif',
			closeImage   : '/images/close.png'
		 })
		}
	});
	</script>
    <style>
.pagination{
padding: 2px;
}

.pagination ul{
margin: 0;
padding: 0;
text-align: left; /*Set to "right" to right align pagination interface*/
font-size: 16px;
}

.pagination li{
list-style-type: none;
display: inline;
padding-bottom: 1px;
text-align:center;
vertical-align:middle;
}

.pagination a, .pagination a:visited{
padding: 0 5px;
/*border: 1px solid #9aafe5;
*/text-decoration: none;
color: #2e6ab1;
}

.pagination a:hover, .pagination a:active{
/*border: 1px solid #2b66a5;
*/color: #000;
background-color:#FFF;
}

.pagination a.currentpage{
background-color: #2e6ab1;
color: #FFF !important;
border-color: #2b66a5;
font-weight: bold;
cursor: default;
}

.pagination a.disablelink, .pagination a.disablelink:hover{
background-color: white;
cursor: default;
color: #929292;
border-color: #929292;
font-weight: normal !important;
}

.pagination a.prevnext{
font-weight: bold;
}

	</style>
</head>
<body><input type="hidden" value="<?php echo $this->session->userdata('recipe_counter');?>" name="hdn_counter" id="hdn_counter"  />
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
                                <div id="bigFont"><span style="color:#CAD2B7">View Recipes </span><div class="paginationCsss"><div class="pagination"><?php echo $this->pagination->create_links(); ?> </div></div></div><Br /><div style="color:#F00; text-align:center; font-size:12px"><?php echo $this->session->flashdata('message'); ?></div>
                                <?php
								if(isset($records)){?>
                                <table width="100%" cellpadding="" cellspacing="" border="0" >
                                <tr><td>
                                	<div id="reqRecipeIcons">
                                    		Edit&nbsp;&nbsp;&nbsp;
                                            Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Duplicate&nbsp;
                                            Pdf&nbsp;&nbsp;&nbsp;
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
                    foreach($records as $row) : ?>
                                <tr class="trActive"><td>
                                <div id="reqRecipeIcons">
                                <table border="0" cellpadding="" cellspacing="" width="170px">
                                <tr><td>
                                	<a href="<?php echo base_url();?>index.php/site/edit_recipe/<?php echo $row->recipe_id;?>"><img src="/images/edit_recipe.png"  title="Edit" width="24" height="24" /></a>
                                </td><td><a href="<?php echo base_url();?>index.php/site/chk_option/<?php echo $row->recipe_id; ?>" rel="facebox iframe" >
                               		<img src="/images/print_recipe.png"  title="Print" width="24" height="24" /></a>
                               </td><td align="center"><?php if($row->multi_recipe =='True'){?><a href="<?php echo base_url();?>index.php/site/copy_multi_recipe/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/duplicate_recipe.png" width="24"  title="Duplicate" height="24" /></a><?php }else{?>
                             	   <a href="<?php echo base_url();?>index.php/site/copy_recipe/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/duplicate_recipe.png" width="24"  title="Duplicate" height="24" /></a><?php }?>
                                </td><td align="right";>
                               		 <a href="<?php echo base_url();?>index.php/site/recipe_pdf/<?php echo $row->recipe_id;?>" target="_blank"><img src="/images/pdf_recipe.png"  title="Pdf" width="24" height="24" /></a>
                                </td></tr>
                                </table>
                                
                                
                                
                               
                               
                                </div>
                                <div style="width:700px;">
                                <div class="recipeLink"><a href="<?php echo base_url();?>index.php/site/view_recipe/<?php echo $row->recipe_id;?>" style="text-decoration:none; color:#000;"><?php echo $row->name; ?></a><?php if($row->multi_recipe =='True'){?>&nbsp;<img src="/images/m-icon.gif" width="20" height="20" border="0" title="Multi Recipe"  /><?php }?></div>
                                </div>
                                <div class="dhtmlgoodiesView"><img src="/images/slideshow.png" width="24" height="24" title="Slide" /></div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                            	<div class="SliceContentLeft">
                                                 <p style="color:#000;"> <?php echo $row->description; ?></p>
                                              </div>
                                                <div class="SliceContentRight">
                                                <table width="" cellpadding="3" cellspacing="" border="0">
   <?php
			$this->load->model('membership_model');
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->indent_calculation=="Yes"){?>
                                                <tr>
                                                	<td class="trFont">Indent</td>
                                                    <td class="trFont">Per Piece Weight</td>
                                                    <td class="trFont">Per Kilo Price</td>
                                                 </tr>
                                                 <tr>
                                                	<td><input class="smallTxtBox" name="indent<?php echo $i;?>" type="text" id="indent<?php echo $i;?>" size="8" value="230" onblur="new_formula(<?php echo $i;?>);" style="text-align:right" /></td>
                                                    <td><input class="smallTxtBox"  name="weight<?php echo $i;?>" type="text" id="weight<?php echo $i;?>" size="8" value="0.05" onblur="new_formula(<?php echo $i;?>);"  style="text-align:right" /></td>
                                                    <td><input class="smallTxtBox"  name="per_kilo_cost<?php echo $i;?>" type="text" id="per_kilo_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->kilo_price; ?>" style="text-align:right" /></td>
                                                 </tr>
                                                <tr>
                                                    <td class="trFont">Add Profit</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Per Piece Price</td>
                                                 </tr>
                                                 <tr>
                                                    <td><input name="profit<?php echo $i;?>" type="text" id="profit<?php echo $i;?>" size="10" value="<?php echo $row->profit; ?>"  onblur="new_formula(<?php echo $i;?>);" style="text-align:right"/></td>
                                                    <td><input name="selling_price<?php echo $i;?>" type="text" id="selling_price<?php echo $i;?>" size="10" value="<?php echo $row->selling_price; ?>" readonly="readonly"  style="text-align:right"/></td>
                                                    <td><input name="per_pc_cost<?php echo $i;?>" type="text" id="per_pc_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->cost_per_piece; ?>" onblur="calculate();"  style="text-align:right"/></td>
                                                 </tr>
                                                 <tr>
                                                   <td colspan="3"><input name="new_formula<?php echo $i;?>" type="hidden" id="new_formula<?php echo $i;?>" size="10" value="<?php echo $row->quantity; ?>" />
                             <input name="yield<?php echo $i;?>" type="hidden" id="yield<?php echo $i;?>" size="10" value="<?php echo $row->yield; ?>" />
                             <input name="inc_cook_loss<?php echo $i;?>" type="hidden" id="inc_cook_loss<?php echo $i;?>" size="10" value="<?php echo $row->food_loss; ?>" />
                             <input name="total_price<?php echo $i;?>" type="hidden" id="total_price<?php echo $i;?>" size="10" value="<?php echo $row->gradient_price; ?>" />
                             <input name="per_pc_weight<?php echo $i;?>" type="hidden" id="per_pc_weight<?php echo $i;?>" size="10" value="<?php echo $row->Weight_portion; ?>" /></td>
                                                  </tr>
                                                  <?php }?>
                                                 <tr>
                                                   <td colspan="3"><?php echo anchor('site/view_recipe/'. $row->recipe_id, 'Goto Recipe','class=recipe_link'); ?> | <?php echo anchor('site/edit_recipe/'. $row->recipe_id, 'Edit Recipe','class=recipe_link'); ?> | <?php echo anchor('site/delete_recipe/' . $row->recipe_id, 'Delete',"onClick=\" return confirm('Are you sure you want to '+ 'delete the record for".addslashes( $row->name)."?')\"") ; ?></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
						<?php $i++;endforeach; ?>
                                
                          </table>
						<?php }else { ?>	
                        <h2>No Recipe Found.</h2>
                        <?php }; ?>
                        </div>
                        </div>
                      
                        
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
<?php $this->load->view('includes/footer_new'); ?> 
