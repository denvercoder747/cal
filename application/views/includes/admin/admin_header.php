<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//$url = 'http://www.calcipe.com/index.php/admin/allUser';
$tokens = explode('/', $url);
$page= $tokens[sizeof($tokens)-1];
$page1= $tokens[sizeof($tokens)-2];
?>
<div id="page-top-outer">    
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="/images/cal_logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
             <form name="profile" id="profile" action="searchUser" method="post" class="standardForm">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" name="srchval" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select name="srchtype"  class="styledselect">
			<option value="All"> All</option>
			<option value="user"> Users</option>
			<option value="recipe"> Recipes</option>
		</select> 
		</td>
		<td>
		<input type="image" src="/images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
        </form>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo base_url();?>index.php/admin/admin_logout" id="logout"><img src="/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="<?php echo base_url();?>index.php/admin/metakey" id="acc-settings">SEO Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<?php 
		if($page=="dash_board"){$menuClass1='class="current"';}
		else{$menuClass1='class="select"';}
		?>
		
		<ul <?php echo $menuClass1;?>><li><a href="<?php echo base_url();?>index.php/admin/dash_board"><b>Dashboard</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="allUser" || $page=="addUser" || $page=="delUser" || $page=="delUserbyAdmin"){$menuClass2='class="current"';}
		else{$menuClass2='class="select"';}
		?>
		<ul <?php echo $menuClass2;?>>
		  <li><a href="<?php echo base_url();?>index.php/admin/allUser"><b>Users</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if($page=="allUser"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/allUser">View all users</a></li>
				<li<?php if($page=="addUser"){?>class="sub_show"<?php }?> style="display:none"><a href="#nogo">Add User</a></li>
				<li<?php if($page=="delUser"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/delUser">Delete By Users</a></li>
				<li<?php if($page=="delUserbyAdmin"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/delUserbyAdmin">Delete By Admin</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="recipes" || $page=="blockRecipe" || $page=="delRecipe"){$menuClass3='class="current"';}
		else{$menuClass3='class="select"';}
		?>
		<ul <?php echo $menuClass3;?>>
		  <li><a href="<?php echo base_url();?>index.php/admin/recipes"><b>Recipes</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if($page=="blockRecipe"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/blockRecipe">Block Recipe</a></li>
				<li <?php if($page=="recipes"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/recipes">View Recipes</a></li>
				<li <?php if($page=="delRecipe"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/delRecipe" style="display:none">Deleted Recipes</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="Ingredients"){$menuClass4='class="current"';}
		else{$menuClass4='class="select"';}
		?>
		<ul <?php echo $menuClass4;?>>
		  <li><a href="<?php echo base_url();?>index.php/admin/Ingredients"><b>Ingredients</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
<?php /*?>		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select">
		  <li><a href="<?php echo base_url();?>index.php/admin/data_management"><b>Data Management</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Import Data</a></li>
				<li><a href="#nogo">Export Data</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
<?php */?>		
<?php /*?>		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="allPlans" || $page=="bannerAd" || $page=="benefitSettings" || $page=="helpRequest"){$menuClass5='class="current"';}
		else{$menuClass5='class="select"';}
		?>
		<ul <?php echo $menuClass5;?>>
		<ul class="select">
		  <li><a href="<?php echo base_url();?>index.php/admin/allPlans"><b>Others</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li <?php if($page=="allPlans"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/allPlans">Plans</a></li>
				<li <?php if($page=="bannerAd"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/bannerAd">Ads</a></li>
				<li <?php if($page=="benefitSettings"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/benefitSettings">Benefits</a></li>
				<li <?php if($page=="helpRequest"){?> class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/helpRequest">Requests</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
<?php */?>		
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="allPlans" ){$menuClass5='class="current"';}
		else{$menuClass5='class="select"';}
		?>
		<ul <?php echo $menuClass5;?>>
		<ul class="select">
		  <li><a href="<?php echo base_url();?>index.php/admin/allPlans"><b>Plans</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="bannerAd" || $page=="bannerAdd" || $page1=="edit_bannerAd"){$menuClass6='class="current"';}
		else{$menuClass6='class="select"';}
		?>
		<ul <?php echo $menuClass6;?>>
            <ul class="select">
              <li><a href="<?php echo base_url();?>index.php/admin/bannerAd"><b>Ads</b></a>
                <div class="select_sub show">
                            <ul class="sub">
                                <li <?php if($page=="bannerAdd" || $page1=="edit_bannerAd"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/bannerAdd">Add/Edit</a></li>
                                <li <?php if($page=="bannerAd"){?>class="sub_show"<?php }?>><a href="<?php echo base_url();?>index.php/admin/bannerAd">Settings</a></li>
                            </ul>
                        </div>            
            </li>
            </ul>

		</li>
		</ul>
        
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="benefitSettings"){$menuClass7='class="current"';}
		else{$menuClass7='class="select"';}
		?>
		<ul <?php echo $menuClass7;?>>
            <ul class="select">
              <li><a href="<?php echo base_url();?>index.php/admin/benefitSettings"><b>Benefits</b></a>
            </li>
            </ul>

		</li>
		</ul>
        
		<div class="nav-divider">&nbsp;</div>
		<?php 
		if($page=="helpRequest"){$menuClass8='class="current"';}
		else{$menuClass8='class="select"';}
		?>
		<ul <?php echo $menuClass8;?>>
            <ul class="select">
              <li><a href="<?php echo base_url();?>index.php/admin/helpRequest"><b>Requests</b></a>
            </li>
            </ul>

		</li>
		</ul>


		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 