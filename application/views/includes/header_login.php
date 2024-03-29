<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('../front/meta.php'); ?>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<title><?php echo $res_meta[0]->title;?></title>
<meta name="keyword" content="<?php echo $res_meta[0]->meta_keyword;?>" />
<meta name="description" content="<?php echo $res_meta[0]->meta_description;?>"  />
<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
<link href="<?php echo base_url();?>css/calcipe.css" type="text/css" rel="stylesheet" media="all" />
</head>

<body>
<div id="mainwrapper">
	<!--Start TopLayer-->
	<div id="top_layer_wrapper">
    	<div id="top_layer_wrapper_inner"></div>
    </div>
	<!--End Top Layer-->
    <!--Start Top Container-->
   	<div id="banner_wrapper">
   		 <div id="banner_wrapper_inner">
       	   <div id="companyLogo"></div>
            <div id="banner_right">
            <div id="user_image_name">
            	<img src="<?php echo base_url();?>images/user_image.png" width="32" height="32" /><span>Welcome Guest</span>
            </div>      
            <div id="quick_search">
            	<form name="quickSearch" id="quickSearch" method="post" action="#">
            	<span>Quick Search</span> <input name="quicksearch" class="searchText" type="text" />
                <input name="Search Here" class="search_button" type="submit" value="" />
                </form>
            </div>
           </div>
         </div>
    </div>
    <!--End Top Container-->
    <!--Start Menu Container-->
     <div id="menuWrapper">
     </div>
    <!--End Menu Container-->