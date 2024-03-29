<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/js_function.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/facebox.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider();
});
</script>
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
<div id="site_main_wrapper">
	<!--start site top header-->
    <?php $this->load->view('includes/front_header'); ?>
    <!--end site top header-->
	
    <!--Start site header part-->
        <?php $this->load->view('includes/front_banner'); ?>
    <!--End site header Part-->
    
    <!--Start site main content wrapper-->
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div id="new_user_header"><span>Features</span></div>
         <div class="break"></div>
         <div id="content_inner_wrapper">
			<div id="feature_content">
            <br />&nbsp;&nbsp;<b>Calcipe has a host of salient features which are as follows</b><Br /><Br />
                    <ul>
                        <li><b>Name of the Recipe</b><Br />
                        Conjuring a name is synonymous with writing a book. With respect to name of recipe, factors such as ingredients, presentation and taste go a long way in creating a name.
                        </li>
                        <li><b>Recipe Image</b><Br />
                        This is the space which allows for visual display and reference where you can upload pictures of high resolution. 
                        </li>
                        <li><b>Brief Description</b><Br />
                        This is up to the discretion of the creator of the recipe and contains basic information on the ingredients, method and creation of the recipe.
                        </li>
                        <li><b>Add Recipe Ingredients</b><Br />
                        When one is looking at a list of ingredients when you buy a product, please do know that the ingredients are listed in ascending order, i.e the ingredient with the maximum weight in the recipe is listed first with its uniqueness and the ingredient of the least quantity is listed last.
                        </li>
                        <li><b>Add Recipe Quantity</b><Br />
                        This space would quantify the list of ingredients used.
                        </li>
                        <li><b>Recipe Ingredient measure</b><Br />
                        This space indicates the unit of measure as in grams, kilograms, litres, milliliters, ounce, Pound of each and every ingredient used in the recipe.
                        </li>
                        <li><b>Rate of Ingredient</b><Br />
                        Buying ingredients is an intrinsic activity as prices and markets for each and every ingredient vary from location to location.

So this space is a brilliant indicator of changes in ingredient pricing across different locations in the country – to know and compare rise in price levels
                        </li>
                        <li><b>Food Loss</b><Br />
                        This space is of very important relevance as it is a prime indicator of food loss in percentage and how wastage can be minimized. As we all know a percentage of food is lost depending on the ingredients we use, the method or process and the amount of moisture present in the environment.
						<br />Eg – for 40-50 gms of flour used in baking bread, the loss is about 10-12%
                        </li>
                        <li><b>Calculate Amount from Ingredients used</b><Br />
                        The rates of  each ingredient helps in the calculation and cost of the recipe.
                        </li>
                        <li><b>Total Recipe Weight</b><Br />
                        Denotes the total weight of the recipe taking into consideration the weight of each and every ingredient in the recipe.
                        </li>
                        
                    </ul>
                    <Br />
                </div>
         </div>
         <div class="break"></div>
        </div>
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
        <?php $this->load->view('includes/front_footer'); ?>
    <!--End site main footer-->
</div>
</body>
</html>
