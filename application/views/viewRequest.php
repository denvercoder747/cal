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
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
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
            <div id="allHeader">
                    <div id="company_logo"></div>
                    <div id="header_css">
                   			 <!--<img src="/images/recipe_logo.png" width="372" height="57" />-->
                    </div>
                    <!--<div id="loggedUser">
                    Logged as <?php echo $this->session->userdata('firstname'); ?>
                    </div>-->
            </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li><a href="<?php echo base_url();?>index.php/site/dash_board"><span class="l"></span><span class="r"></span><span class="t">Dashboard</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/site/recipe" ><span class="l"></span><span class="r"></span><span class="t">Recipes</span></a>
                		</li>
                		<li><a href="<?php echo base_url();?>index.php/gredient/"><span class="l"></span><span class="r"></span><span class="t">Ingredients</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/member/edit_profile"><span class="l"></span><span class="r"></span><span class="t">Profile</span></a></li>
                        	<li><a href="<?php echo base_url();?>index.php/login/logout"><span class="l"></span><span class="r"></span><span class="t">Logout</span></a></li>
                		<!--<li><a href="#"><span class="l"></span><span class="r"></span><span class="t">Contact</span></a></li>-->
                        
                	</ul>
               <div id="loggedUser">
                    Logged as <?php echo $this->session->userdata('firstname'); ?>
                    </div>            
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
                                <div id="bigFont">View Requests </div><Br /><div style="color:#F00; text-align:center; font-size:12px"><?php echo $this->session->flashdata('message'); ?></div>
                                <table width="100%" cellpadding="" cellspacing="" border="0" >
                                <tr><td>
                                	<div id="reqRecipeIcons"></div></td></tr>
					<?php 
                    $i=1;
                    if(isset($records)) : foreach($records as $row) : ?>
                                <tr class="trActive"><td>
                                <div id="reqRecipeIcons">
<table border="0" cellpadding="" cellspacing="" width="170px">
                                <tr>
                                  <td align="right"; style="color:#000000;"><?php echo date("d-m-Y",strtotime($row->add_date)); ?></td>
                                  <td align="right" width="16"><?php if($row->reply_message<>""){?><img src="<?php echo base_url();?>images/mail_reply.png" width="16px" height="16px" /><?php }?>&nbsp;</td>
                                  </tr>
                                </table>                                
                                </div>
                                
                                <div style="width:700px;">
                                <div class="recipeLink"><?php echo $row->title; ?></div>
                                </div>
                                <div class="dhtmlgoodiesView"><img src="/images/slideshow.png" width="24" height="24" title="Slide" /></div>
                                <div class="dhtmlgoodiesSlide">
                                    <div>
                                        <ul>
                                            <li>
                                              <div class="SliceContentRight">
                                                <table width="100%" cellpadding="3" cellspacing="" border="0">
                                                <tr>
                                                  <td width="3%" class="trFont">Q:</td>
                                                	<td width="56%" class="trFont"><?php echo $row->message; ?></td>
                                                	<td width="21%" class="trFont">&nbsp;</td>
                                                	<td width="20%" class="trFont">&nbsp;</td>
                                                  </tr>
                                                 <tr>
                                                   <td class="trFont">A:</td>
                                                   <td class="trFont"><?php echo $row->reply_message; ?><?php if($row->reply_message<>""){?>&nbsp;(<?php echo date("d-m-Y",strtotime($row->reply_date)).")"; }?></td>
                                                   <td class="trFont"></td>
                                                   <td align="right" ><?php echo anchor('site/delete_request/' . $row->id_request, 'Delete',"onClick=\" return confirm('Are you sure you want to '+ 'delete the record?')\"") ; ?></td>
                                                 </tr>
                                                 </table>
                                                </div>
                                            </li>
                                
                                        </ul>
                                    </div>
                                </div>
                                </td></tr>
						<?php $i++;endforeach; ?>
                        <tr><td>
						<?php echo $this->pagination->create_links(); ?>						
                        </td></tr>
						<?php else : ?>	
                        <tr><td>
                        <h2>No Request were Found.</h2>
                        </td></tr>
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
