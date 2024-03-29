 <!--  Right Side bar Informations -->  
<script type="text/javascript">
function searchVal(){
	if(document.getElementById('srchval').value==""){
		alert("Please Fill Respective Fields");
		return false;
	}
}
</script>            
<div class="art-sidebar2">
                        
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
                            
                            <div id="header-mdi">
                                <div id="header-left">
                                <div id="header-right">
                                <div class="blockHeaderIcon"><img border="0" src="/images/Search.png" height="24" width="24" /></div>
                                        <div class="t">Search</div>                                                </div></div></div>                               
                            </div><div class="art-BlockContent">
                                <div class="art-BlockContent-body">
                                    <div><form id="Search" name="Search" method="post"  action="<?php echo base_url();?>index.php/site/searchRecipe" onsubmit="return searchVal();">
                                    <table border="0" align="center" width="100%" >
                                    	<tr><td width="33%">
                                    Type&nbsp;&nbsp; : </td><td width="67%"> <select name="srchtype" id="srchtype">
                                    <option value="recipe">Recipes</option>
                                    <option value="ingredients">Ingredients</option>
                                    </select></td></tr>
                                    <tr><td>
                                    Name : </td><td><input type="text" value="" name="srchval" id="srchval" style="width: 70%;" /></td></tr>
                                    <tr><td colspan="2" align="center">
                                       <span class="art-button-wrapper">
                                        	<span class="l"> </span>
                                        	<span class="r"> </span>
                                        	<input class="art-button" type="submit" name="search" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />
                                        </span>
                                    </td></tr></table>
                                    </form></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                
                                <div id="header-mdi">
                                <div id="header-left">
                                <div id="header-right">
                                <div class="blockHeaderIcon"><img border="0" src="/images/Recipe-Info.png" height="24" width="24" /></div>
                                        <div class="t">Recipe Information</div>                                                </div></div></div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="<?php echo base_url();?>index.php/site/members_area" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/add_new.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/site/members_area" style="text-decoration:none">
                                          			 <div id="menu_css">Add Recipe</div>
                                            </a>
                                    		
                                     </p>
                                      <p>
                                      		<a href="<?php echo base_url();?>index.php/site/recipe" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/view_edit.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/site/recipe" style="text-decoration:none">
                                          			 <div id="menu_css">View/Edit Recipe</div>
                                            </a>
                                            
                                     </p>
                                      <p>
                                      		<a href="#" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/multiple_cost.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/site/multi_recipe" style="text-decoration:none">
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
                                
                                <div id="header-mdi">
                                <div id="header-left">
                                <div id="header-right">
                                <div class="blockHeaderIcon"><img border="0" src="/images/Ingredient-Info.png" height="24" width="24" /></div>
                                        <div class="t">Ingredient Information</div>                                                </div></div></div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="<?php echo base_url();?>index.php/gredient/" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/add_ingred.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/gredient/" style="text-decoration:none">
                                          			 <div id="menu_css">Add Ingredient</div>
                                            </a>
                                     		
                                     </p>
                                      <p>
                                      		<a href="<?php echo base_url();?>index.php/gredient/" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/view_ingred.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/gredient/" style="text-decoration:none">
                                          			 <div id="menu_css">View/Edit Ingredient</div>
                                            </a>
                                     </p>
                                </div>
                            </div>
                        </div>
                         <!-- Help Request Related Informations -->
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
                                
                                <div id="header-mdi">
                                <div id="header-left">
                                <div id="header-right">
                                <div class="blockHeaderIcon"><img border="0" src="/images/help_request.png" height="24" width="24" /></div>
                                        <div class="t">Help Request/Feedback</div>                                                </div></div></div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="<?php echo base_url();?>index.php/site/send_helpRequest/" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/forward.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/site/send_helpRequest/" style="text-decoration:none">
                                          			 <div id="menu_css">Send Request</div>
                                            </a>
                                     		
                                     </p>
                                      <p>
                                      		<a href="<?php echo base_url();?>index.php/site/viewRequests/" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/email_open.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/site/viewRequests/" style="text-decoration:none">
                                          			 <div id="menu_css">View Requests</div>
                                            </a>
                                     </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Profile Related Informaiton-->
                        <!--<div class="art-Block">
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
                                    <div class="blockHeaderIcon"><img border="0" src="/images/Profile-Info.png" height="24" width="24" /></div>
                                        <div class="t">Profile Information</div>
                                </div>
                                <div class="art-BlockContent">
                                	 <p>
                                     		<a href="#" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/profile_view.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="#" style="text-decoration:none">
                                          			 <div id="menu_css">View Profile</div>
                                            </a>
                                     </p>
                                      <p>
                                      		<a href="<?php echo base_url();?>index.php/member/edit_profile" style="text-decoration:none">
                                                <div id="menuIcon">
                                                    <img border="0" src="/images/profile_edit.png" height="24" width="24" />
                                                 </div>
                                             </a>
                                            <a href="<?php echo base_url();?>index.php/member/edit_profile" style="text-decoration:none">
                                          			 <div id="menu_css">Edit Profile</div>
                                            </a>
                                     </p>
                                </div>
                            </div>
                        </div>--> 

                </div>