<div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<li><a href="<?php echo base_url();?>index.php/site/dash_board" class=" active"><span class="l"></span><span class="r"></span><span class="t">Dashboard</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/site/recipe"><span class="l"></span><span class="r"></span><span class="t">Recipes</span></a>
                		</li>
                		<li><a href="<?php echo base_url();?>index.php/gredient/"><span class="l"></span><span class="r"></span><span class="t">Ingredients</span></a></li>
                		<li><a href="<?php echo base_url();?>index.php/member/edit_profile"><span class="l"></span><span class="r"></span><span class="t">Profile</span></a></li>
                        	<li><a href="<?php echo base_url();?>index.php/login/logout"><span class="l"></span><span class="r"></span><span class="t">Logout</span></a></li>
                	</ul>
               <div id="loggedUser">
                    Logged as <?php echo $this->session->userdata('username'); ?>
                    </div>            
                 </div>
                 
                 
