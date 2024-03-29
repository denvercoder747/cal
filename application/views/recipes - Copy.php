<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Calcipe </title>
     <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/slidediv.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/dashboard_calculation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
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
                <img src="images/recipe_logo.png" width="372" height="57" />	
                </div>-->
                <div id="allHeader">
                    <div id="company_logo"></div>
                    <div id="header_css">
                   			 <img src="images/recipe_logo.png" width="372" height="57" />
                    </div>
                    <div id="loggedUser">
                    Logged as Sathiya
                    </div>
            </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li><a href="index.html" class=" active"><span class="l"></span><span class="r"></span><span class="t">Dashboard</span></a></li>
                		<li><a href="view-edit-recipe.html"><span class="l"></span><span class="r"></span><span class="t">Recipes</span></a>
                		</li>
                		<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Ingredients</span></a></li>
                		<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Profile</span></a></li>
                		<!--<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Contact</span></a></li>-->
                	</ul>
                </div>
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
                                <div id="bigFont">View Recipes </div><br /><Br /><Br />
                                <!--<img src="images/view-edit.png" width="920px" height="700px;" />-->
					<?php 
                    $i=1;
                    if(isset($records)) : foreach($records as $row) : ?>
                                <table width="100%" cellpadding="" cellspacing="" border="0">
                                <tr><td>
                                	<div id="reqRecipeIcons">
                                    		Edit&nbsp;
                                            Share&nbsp;
                                            Print&nbsp;
                                            Duplicate&nbsp;
                                            Pdf&nbsp;
                               		</div></td></tr>
                                <tr class="trActive"><td>
                                <div id="reqRecipeIcons">
                                <a href="http://www.google.com"><img src="images/edit_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/share_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/print_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/duplicate_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/pdf_recipe.png" width="32" height="32" /></a>
                                </div>
                                <div class="dhtmlgoodiesView"><?php echo anchor("site/view_recipe/$row->recipe_id", $row->name); ?></div>
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
                                                	<td></td>
                                                    <td class="trFont">Add Profit</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Per Piece Price</td>
                                                 </tr>
                                                 <tr>
                                                    <td><input name="profit<?php echo $i;?>" type="text" id="profit<?php echo $i;?>" size="10" value="<?php echo $row->profit; ?>"  onblur="new_formula(<?php echo $i;?>);"/></td>
                                                    <td><input name="selling_price<?php echo $i;?>" type="text" id="selling_price<?php echo $i;?>" size="10" value="<?php echo $row->selling_price; ?>" readonly="readonly" /></td>
                                                    <td><input name="per_pc_cost<?php echo $i;?>" type="text" id="per_pc_cost<?php echo $i;?>" size="10" readonly="readonly" value="<?php echo $row->cost_per_piece; ?>" onblur="calculate();" /></td>
                                                    <td></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
                                <tr class="trInactive"><td>
                                <div id="reqRecipeIcons">
                                <a href="http://www.google.com"><img src="images/edit_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/share_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/print_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/duplicate_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/pdf_recipe.png" width="32" height="32" /></a>
                                </div>
                                <div class="dhtmlgoodiesView">Cake</div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                            	<div class="SliceContentLeft">
                                                 <p> Brief of Recipe, as to what it is made of, how to make(not the method) the 
                                                 sample procedure and presentation ideas.....</p>
                                                 </div>
                                                <div class="SliceContentRight">
                                                <table width="" cellpadding="3" cellspacing="" border="0">
                                                <tr>
                                                	<td class="trFont">Per Piece Weight</td>
                                                    <td class="trFont">Per Kilo Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Kilo</td>
                                                 </tr>
                                                 <tr>
                                                	<td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                <tr>
                                                	<td></td>
                                                    <td class="trFont">Per Piece Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Piece</td>
                                                 </tr>
                                                 <tr>
                                                    <td></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
                                <tr class="trActive"><td>
                                <div id="reqRecipeIcons">
                                <a href="http://www.google.com"><img src="images/edit_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/share_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/print_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/duplicate_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/pdf_recipe.png" width="32" height="32" /></a>
                                </div>
                                <div class="dhtmlgoodiesView">Cake</div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                            	<div class="SliceContentLeft">
                                                 <p> Brief of Recipe, as to what it is made of, how to make(not the method) the 
                                                 sample procedure and presentation ideas.....</p>
                                                 </div>
                                                <div class="SliceContentRight">
                                                <table width="" cellpadding="3" cellspacing="" border="0">
                                                <tr>
                                                	<td class="trFont">Per Piece Weight</td>
                                                    <td class="trFont">Per Kilo Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Kilo</td>
                                                 </tr>
                                                 <tr>
                                                	<td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                <tr>
                                                	<td></td>
                                                    <td class="trFont">Per Piece Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Piece</td>
                                                 </tr>
                                                 <tr>
                                                    <td></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
                                <tr class="trInactive"><td>
                                <div id="reqRecipeIcons">
                                <a href="http://www.google.com"><img src="images/edit_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/share_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/print_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/duplicate_recipe.png" width="32" height="32" /></a>
                                <a href="http://www.google.com"><img src="images/pdf_recipe.png" width="32" height="32" /></a>
                                </div>
                                <div class="dhtmlgoodiesView">Cake</div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                            	<div class="SliceContentLeft">
                                                 <p> Brief of Recipe, as to what it is made of, how to make(not the method) the 
                                                 sample procedure and presentation ideas.....</p>
                                                 </div>
                                                <div class="SliceContentRight">
                                                <table width="" cellpadding="3" cellspacing="" border="0">
                                                <tr>
                                                	<td class="trFont">Per Piece Weight</td>
                                                    <td class="trFont">Per Kilo Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Kilo</td>
                                                 </tr>
                                                 <tr>
                                                	<td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                <tr>
                                                	<td></td>
                                                    <td class="trFont">Per Piece Price</td>
                                                    <td class="trFont">Selling Price</td>
                                                    <td class="trFont">Piece</td>
                                                 </tr>
                                                 <tr>
                                                    <td></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td><input type="text" class="smallTxtBox" name="aa" /></td>
                                                    <td></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
						<?php endforeach; ?>
						<?php echo $this->pagination->create_links(); ?>						
						<?php else : ?>	
                        <h2>No Recipe Found.</h2>
                        <?php endif; ?>
                                
                          </table>
                        </div>
                        </div>
                      
                        
                            </div>
                        </div>
                        
                    </div>
                   <!--  Right Side bar Informations -->
                    <div class="art-sidebar2">
                     <!-- Recipe Related Informations -->
                        <div class="art-Block">
                            <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>
                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">Recipe Information</div>
                                    </div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="addrecipe.html" style="text-decoration:none">
                                            <img border="0" src="images/add_new.png" height="32" width="32" />
                                           <div id="menu_css">Add Recipe</div>
                                    		</a>
                                     </p>
                                      <p>
                                     		<a href="view-edit-recipe.html" style="text-decoration:none">
                                            <img border="0" src="images/view_edit.png" height="32" width="32" />
                                           <div id="menu_css">View/Edit Recipe</div>
                                    		</a>
                                     </p>
                                      <p>
                                     		<a href="#" style="text-decoration:none">
                                            <img border="0" src="images/multi.png" height="32" width="32" />
                                           <div id="menu_css">Multi Recipe Cost</div>
                                    		</a>
                                     </p>
                                      
                                </div>
                            </div>
                        </div>
                         <!-- Ingredient Related Informations -->
                        <div class="art-Block">

                            <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>
                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">Ingredient Information</div>
                                    </div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="#" style="text-decoration:none">
                                            <img border="0" src="images/add_ingred.png" height="32" width="32" />
                                           <div id="menu_css">Add Ingredient</div>
                                    		</a>
                                     </p>
                                      <p>
                                     		<a href="#" style="text-decoration:none">
                                            <img border="0" src="images/view_ingred.png" height="32" width="32" />
                                           <div id="menu_css">View/Edit Ingredient </div>
                                    		</a>
                                     </p>
                                     <!-- <p>
                                     		<a href="http://www.google.com" style="text-decoration:none">
                                            <img border="0" src="images/add_rec.png" height="32" width="32" />
                                           <div id="menu_css"></div>
                                    		</a>
                                     </p>-->
                                    
                                      
                                </div>
                            </div>
                        </div>
                         <!-- Profile Related Informaiton-->
                        <div class="art-Block">
                            <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>
                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                <div class="art-BlockHeader">
                                    <div class="l"></div>
                                    <div class="r"></div>
                                    <div class="art-header-tag-icon">
                                        <div class="t">Profile Information</div>
                                    </div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="#" style="text-decoration:none">
                                            <img border="0" src="images/profile_view.png" height="32" width="32" />
                                           <div id="menu_css">View Profile</div>
                                    		</a>
                                     </p>
                                      <p>
                                     		<a href="#" style="text-decoration:none">
                                            <img border="0" src="images/profile_edit.png" height="32" width="32" />
                                           <div id="menu_css">Edit Profile</div>
                                    		</a>
                                     </p>
                                     <!-- <p>
                                     		<a href="http://www.google.com" style="text-decoration:none">
                                            <img border="0" src="images/add_rec.png" height="32" width="32" />
                                           <div id="menu_css"></div>
                                    		</a>
                                     </p>-->
                                    
                                      
                                </div>
                            </div>
                        </div>
                        <!-- Search -->
                      <div class="art-Block">
                        <div class="art-Block-tl"></div>
                        <div class="art-Block-tr"></div>
                        <div class="art-Block-bl"></div>
                        <div class="art-Block-br"></div>
                        <div class="art-Block-tc"></div>
                        <div class="art-Block-bc"></div>
                        <div class="art-Block-cl"></div>
                        <div class="art-Block-cr"></div>
                        <div class="art-Block-cc"></div>
                        <div class="art-Block-body">
                            <div class="art-BlockHeader">
                                <div class="l"></div>
                                <div class="r"></div>
                                <div class="art-header-tag-icon">
                                    <div class="t">Search</div>
                                </div>
                            </div><div class="art-BlockContent">
                                <div class="art-BlockContent-body">
                                    <div><form method="get" id="newsletterform" action="javascript:void(0)">
                                    <input type="text" value="" name="email" id="s" style="width: 95%;" />
                                    <span class="art-button-wrapper">
                                        <span class="l"> </span>
                                        <span class="r"> </span>
                                        <input class="art-button" type="submit" name="search" value="Search"/>
                                    </span>
                                    </form></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cleared"></div><div class="art-Footer">
                <div class="art-Footer-background"></div>
                    <div class="art-Footer-inner">
                        <div class="art-Footer-text">
                            <p><a href="index.html">Dashboard</a> | <a href="view-edit-recipe.html">Recipes</a> | <a href="#">Ingredients</a> | <a href="#">Profile</a><BR />
                                Copyright &copy; 2011 ---. All Rights Reserved.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
       <!-- <div class="cleared"></div>-->
        <p class="art-page-footer"><font color="#CC6">Powered By&nbsp;&nbsp;<a href="http://www.calcipe.com/" style="color:#CC6;">Paramount Tech Labs</a></font></p>
    </div>
    </div>
</body>
</html>
