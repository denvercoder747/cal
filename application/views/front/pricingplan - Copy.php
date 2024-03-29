<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title>:::.Welcome to CalCipe.:::</title>
<link href="CStyle/calcipe.css" type="text/css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="CStyle/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="CStyle/nivo-slider.css" type="text/css" media="screen" />
<script language="javascript" type="text/javascript" src="JScript/js_function.js"></script>
<script language="javascript" type="text/javascript" src="JScript/jquery-1.6.1.min.js"></script>
<script language="javascript" type="text/javascript" src="JScript/facebox.js"></script>
<script language="javascript" type="text/javascript" src="JScript/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider();
});
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
	//for Popup window
	$('a[rel*=facebox]').facebox({
	loadingImage : 'images/loading.gif',
	closeImage   : 'images/close.png'
	})
});
</script>
</head>
<body>
<div id="site_main_wrapper">
	<!--start site top header-->
    <div id="site_top_header">
    	<div id="site_top_header_layout">
    		<div id="company_logo"></div>
            <div id="site_top_menu">
            	<ul>
                	<li><a href="index.php">Home</a></li>
                    <li><a href="features.php">Features</a></li>
                    <li><a href="pricingplan.php">Pricing</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="userlogin.php" rel="facebox">Sign In</a></li>
            	</ul>
            </div>
        </div>
    </div>
    <!--end site top header-->
	
    <!--Start site header part-->
    <div id="site_main_header">
    	<div id="site_main_header_layout">
            <div class="slider-wrapper theme-default">
                <div class="ribbon"></div>
                <div id="slider" class="nivoSlider">
                    <img src="images/001.jpg" alt="Calcipe Banner No1" border="0" />
                    <img src="images/002.jpg" alt="Calcipe Banner No2" border="0" />
                    <img src="images/003.jpg" alt="Calcipe Banner No3" border="0" />
                    <img src="images/004.jpg" alt="Calcipe Banner No4" border="0" />
                    <img src="images/005.jpg" alt="Calcipe Banner No5" border="0" />
                </div>
           </div>
        </div>
    </div>
    <!--End site header Part-->
    
    <!--Start site main content wrapper-->
    <div id="rigister_content_wrapper">
    	<div id="content_inner_tbl">
         <div id="pricing_plan_header"><span>Pricing Plan</span></div>
         <div class="break"></div>
           <div id="pricing_plan_left">
           	<ul>
            	<li><img src="images/plan_change.png" width="20" height="20" /><a href="#">Pricing Plan No 1</a></li>
                <li><img src="images/plan_change.png" width="20" height="20" /><a href="#">Pricing Plan No 1</a></li>
                <li><img src="images/plan_change.png" width="20" height="20" /><a href="#">Pricing Plan No 1</a></li>
                <li><img src="images/plan_change.png" width="20" height="20" /><a href="#">Pricing Plan No 1</a></li>
                <li><img src="images/plan_change.png" width="20" height="20" /><a href="#">Pricing Plan No 1</a></li>
            </ul>
           </div>
		   <div id="pricing_plan_right">
           	<p>We offer two simple ways to pay for your email campaigns and you can switch between the two at any time that suits.</p>
            <div class="break"></div>
            <h1>Pay per Campaign</h1>
            <p>Great if you only send emails occasionally. You'll only pay when you send an email campaign to more than 5 people. Each campaign costs $5 plus 1¢ for each recipient.</p>
            <div class="break"></div>
             <h1>Pay monthly for unlimited Campaign</h1>
             <p>Perfect for anyone who sends at least one campaign a month. We'll bill your card monthly based on the size of your subscriber list. The monthly fee adjusts automatically as your list grows and shrinks.</p>
             <div class="break"></div>
             <table align="center" cellspacing="1" cellpadding="2" width="97%" class="pricing_table">
              <tr>
                <th height="25">SUBSCRIBERS</th>
                <td align="center">0 - 500</td>
                <td align="center">501 - 2,500</td>
                <td align="center">2,501 - 5,000</td>
                <td align="center">5,001 - 10,000</td>
                <td align="center">10,001 - 25,000</td>
                <td align="center">25,001 - 50,000</td>
              </tr>
              <tr>
                <th height="25">MONTHLY COST</th>
                <td align="center" class="pricing_big">$15</td>
                <td align="center" class="pricing_big">$30</td>
                <td align="center" class="pricing_big">$55</td>
                <td align="center" class="pricing_big">$100</td>
                <td align="center" class="pricing_big">$250</td>
                <td align="center" class="pricing_big">$500</td>
              </tr>
              <tr>
                <th height="25">SEND LIMIT</th>
                <td align="center">Unlimited</td>
                <td align="center">Unlimited</td>
                <td align="center">Unlimited</td>
                <td align="center">Unlimited</td>
                <td align="center">Unlimited</td>
                <td align="center">Unlimited</td>
              </tr>
            </table>
            <div class="break"></div>
            <p>No matter how you pay, there are <strong>no contracts</strong>, <strong>setup fees,</strong> or <strong>nasty lock-ins,</strong> and you can <strong>cancel at any time.</strong></p>
            <div class="break"></div>
            <div id="pricing_signup">
           	  <div id="pricing_page_signup_btn"><span>SIGNUP NOW</span></div>
           	  <h1>Try Campaign monitor for free</h1>
              <h2 style="float:left;">Choose how to pay when you start sending Campaign.</h2>
            </div>
            </div>
         <div class="break"></div>
        </div>
    </div>
    <!--End site main Content Wrapper-->
    
    <!--Start site main footer-->
    <div id="site_footer_top"></div>
    <div id="site_footer">
    	<div id="site_inner_footer">
        	<div id="foter_cnt_left">
            <div class="break"></div>
            	<ul>
                	<li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Sitemap</a></li>
            	</ul> 
            </div>
            <div id="foter_cnt_right">
            <div class="break"></div>
            <div id="footer_copyright">
                <div id="footer_copyright_cpy">All rights and Copyrights © 2011 by <a href="#">Bakers Machinery & Consultancy Co.</a></div>
                <div id="footer_copyright_cpy">Supported by <a href="#">Institute of Baking & Cake Art.</a></div>
                <div id="footer_copyright_cpy">Powered by <a href="#">Paramount Tech Labs.</a></div>
            </div>
            </div>
        </div>
       </div>
    <!--End site main footer-->
</div>
</body>
</html>
