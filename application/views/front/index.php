<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>css/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/nivo-slider.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/global_validations.js"></script>
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
    <div id="site_content_wrapper">
    	<div id="content_inner_tbl">
        	<div id="cnt_wrapper_left">
                <div id="cnt_introduction">
                <h1><strong>Introduction</strong></h1>
  Life is never measured and a healthy life is no simple measure. Measuring is a healthy technique to living a balanced life. We are what we consume and every day we consume different kinds of foods, grains, cereals and liquids. In the course of our daily intake of food, we experiment and try different types of food through new and innovative recipes.
   <p>It is important to evaluate new and old and we now offer you an evaluation tool – the Calcipe, an accurate mathematical derivative for all your recipes and the most efficient indicator of quality, cost and consumption. Each recipe is unique and distinct in terms of its ingredients and making process. Other factors include quantity, quality and costing. Calcipe is a conceptual platform that <a href="http://www.ibcablr.com/" target="_blank" style="color:#0C8417;text-decoration:none;">ibcablr.com</a> provides to help calculate the price, quantity and nutrition quotient of your recipe.</p>
   <h1><strong>How to use the Space</strong></h1>
   Calcipe the platform is simple, easy and user friendly. It gives you the opportunity to gauge and accurately calculate the cost of each and every ingredient in your recipe. Calcipe the space allows for recipe and ingredient evaluation and calculation but is not a blogosphere or space for recipes, ideas or innovations. Calcipe in fact is a prime indicator of market rates – increase and decrease.

<p>Calcipe in tune with its inherent functions also allows the space for substitution of ingredients to make our recipe cost effective.</p>

<p>As such Calcipe the space provides for calculations and alterations.</p>



              </div> 
            	<Br />
                <div id="feature_content">
                 <h1><span>Features</span></h1>
                    <ul>
                       <li><b>Name of the Recipe</b><Br />
                        Conjuring a name is synonymous with writing a book. With respect to name of recipe, factors such as ingredients, presentation and taste go a long way in creating a name <a href="/index.php/home/feature" style="text-decoration:none;color:#CC0000;">Read More</a>
                        </li>
                        <li><b>Recipe Image</b><Br />
                        This is the space which allows for visual display and reference where you can upload pictures of high resolution <a href="/index.php/home/feature" style="text-decoration:none;color:#CC0000;">Read More</a> 
                        </li>
                    </ul>
                </div>
                
            </div>
            <div id="cnt_wrapper_right">
            <div id="new_feature_block">
             <!-- <h1><span>New Features</span></h1>-->
             <div id="saveMoney">
                <img src="/images/save_money.gif" width="209" border="0" height="129" />
             </div>
            </div>
            <div class="break"></div>
            <div id="testimonial_block">
            <h1><span>Testimonials</span></h1>
            <div style="height:11px; clear:both;"></div>
            <p>" I usually cater to weddings and celebrations in the family, so this was a prudent way of balancing my costs". -  <font color="#72903A" style="font-weight:bold;">Avril</font></p>
            <p>"Calcipe gave me the opportunity of healthy comparison of costs of commodities across different cities in the country; I am from Calcutta and would like to open my own pattesterie" - <font color="#72903A" style="font-weight:bold;">Ishita</font></p>
            <p>"Calcipe is an innovative tool to intelligently substitute ingredients and thereby balance costs and food loss" -  <font color="#72903A" style="font-weight:bold;">Asha</font></p>
            
            </div>
            </div>
		</div>
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
        <?php $this->load->view('includes/front_footer'); ?>
    <!--End site main footer-->
</div>
</body>
</html>
