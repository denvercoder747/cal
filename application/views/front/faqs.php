<?php
    $error_message = "";
	if(isset($_POST['S1'])) {
		 
		// EDIT THE 2 LINES BELOW AS REQUIRED
		$email_to = "support@calcipe.com";
		$email_subject = "FAQ From User";
		 
		 
		function died($error) {
			// your error code can go here
			$error.="We are very sorry, but there were error(s) found with the form you submitted. ";
			 $error.="These errors appear below.<br /><br />";
			$error.="<br /><br />";
			$error.="Please go back and fix these errors.<br /><br />";
			//die();
		}
		 
		// validation expected data exists
		if(!isset($_POST['frmName']) ||
			!isset($_POST['email_address']) ||
			!isset($_POST['companyName']) ||
			!isset($_POST['subject']) ||
			!isset($_POST['comments'])) {
			died('We are sorry, but there appears to be a problem with the form you submitted.');      
		}
		 
		$first_name = $_POST['frmName']; // required
		$companyName = $_POST['companyName']; // not required
		$email_address = $_POST['email_address']; // required
		$subject = $_POST['subject']; // required
		$comments = $_POST['comments']; // required
		 
		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	  if(!preg_match($email_exp,$email_address)) {
		$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
	  }
		$string_exp = "/^[A-Za-z .'-]+$/";
	  if(!preg_match($string_exp,$first_name)) {
		$error_message .= 'The First Name you entered does not appear to be valid.<br />';
	  }
	  if(strlen($comments) < 2) {
		$error_message .= 'The Comments you entered do not appear to be valid.<br />';
	  }
	  if(strlen($error_message) > 0) {
	   // died($error_message);
		$error_message1="We are very sorry, but there were error(s) found with the form you submitted. ";
		$error_message1.="These errors appear below.<br /><br />";
		$error_message=$error_message1." ".$error_message."<br /><br />";
	
	  }
		$email_message = "Form details below.\n\n";
		 
		function clean_string($string) {
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		}
		 
	
		$email_message .= "First Name: ".clean_string($first_name)."\n";
		$email_message .= "CompanyName: ".clean_string($companyName)."\n";
		$email_message .= "Email: ".clean_string($email_address)."\n";
		$email_message .= "Subject: ".clean_string($subject)."\n";
		$email_message .= "FAQ: ".clean_string($comments)."\n";
		 
		 
	// create email headers
	$headers = 'From: '.$email_address."\r\n".
	'Reply-To: '.$email_address."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers); 
	header("location:/index.php/home/faq/success");
//	header("location:/index.php/home/faq/success");
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<style type="text/css">
p
{
	text-align:justify;
	padding:5px 10px  5px 10px;
	color:#2C2C2C;
	margin:0 auto;
	
	
}

ul
{
	padding-left:70px;
}

ul p
{
	padding-left:100px;
}

strong
{
	color:#383838;
}
</style>
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
         <div id="new_user_header"><span>FAQ&rsquo;s</span></div>
         <div class="break"></div>
         <div id="content_inner_wrapper">
         <div id="feature_content">
            <br />&nbsp;&nbsp;<b>Frequently Asked Questions</b><Br /><Br />
           <p><strong>Calcipe – Features </strong></p>
            <p><strong>Recipe costing </strong><br />
              To understand the weight of finished  products by portion /piece and kilogram, to achieve this one needs to key in  the recipe along with the price of each ingredient used in the recipe. Both the recipe as well as the ingredient pricing is saved for future reference. </p>
            <p><strong>Comprehensive understanding </strong><br />
              The cost of ingredients to a single  finished product or multiple stored recipes with or without added ingredients  is required to achieve multiple recipe costs. </p>
            <p><strong>DASHBOARD </strong><br />
              On completing your registration, you  can use the Calcipe dashboard effectively and productively to&nbsp;monitor the  following: </p>
            <ul>
              <li style="border:none;"> <strong>Change of&nbsp;Plans </strong></li>
            </ul>
            <p style="padding-left:75px; border:none;">Choice of plan you select to suit your  requirements and needs and the freedom to change&nbsp; it as per  your time needs. </p>
            <ul>
              <li style="border:none;"><strong>Recipe  Dashboard  </strong></li>
            </ul>
            <p style="padding-left:75px; border:none;">To reach the recipe dashboard where  one can view/ add/ edit / print a recipe or save the recipe in&nbsp;pdf format for  future reference. </p>
            <ul>
              <li style="border:none;"><strong>Ingredients </strong></li>
            </ul>
            <p>You can also add new ingredients, edit  the variables (cost fluctuation), cost price of stored ingredients, one can  also upload ingredients in an excel format or download saved ingredient costs  in excel format. </p>
            
            <p>The dashboard will also help you to  get to know new features as a message from Administration; you could also send  a &ldquo;Help  Request&rdquo;  in cases wherein you are faced with an obstacle or confronted with an error.  The dashboard will&nbsp;also offer links to other web  spaces related to food through News Highlights. </p>
            
            <p>Recipe Dashboard  - The Recipe Dashboard is designed and conceptualized in a manner that it  enables you to view your stored recipe/formula at ease. The number of stored  recipes will depend on the plan that you have chosen for that period. </p>
            
            <p>You also have the option of&nbsp;using the  dropdown icon for quick reference. This icon appears next to the name of the  recipe for you to get a quick gist of the recipe. You can also use the icons on  the right panel wherein you can edit/ change recipe content/ cost calculation;  you also have the choice as in using the print option as well as the save  option in pdf format. </p>
            <p>Saved recipes can also be duplicated  to change/alter content (description), ingredients, direction  (methodology/process) as well as cost calculation with different rate of  finished products. </p>
           <p><strong>Ingredients Dashboard </strong><br />
              Ingredients, raw materials purchased /  none purchased always vary in weight&nbsp;and its proportionate cost.              </p>
           <p>
              Calcipe has made it for you to  constantly engage in a space created for fluctuating market rates (change in  market rates of&nbsp;materials)&nbsp;which helps in&nbsp;updating all  saved recipes with the latest cost price. </p>
            <p>
              The Ingredient dashboard has multiple  utilities such as upload/ download,&nbsp;add new ingredients in excel  format, edit costs and many more to come. </p>
           <p><strong>Add new ingredients </strong></p>
            <ul>
              <li style="border:none">One can key  the name of the new ingredient / raw material, quantity, time purchased,  measure and rate. </li>
              <li style="border:none">The measure  relates to the purchase as in kilo or gram. </li>
             <li style="border:none">The actual  price / rate of the product purchased will help you in calculation of the  amount per kilo. </li>
              <li style="border:none">You could also  refer to the space for details such as purchased from, brand, place for future  reference and updating. </li>
              <li style="border:none">This space can  also be utilized to view previously saved data of ingredients which furnish the  measure and pricing details. </li>
            </ul>
            <p><strong>Upload ingredients in Excel format </strong><br />
              Here you can download a sample of the  excel format and this tab facilitates the adding of all ingredients and their  relevant pricing. This tab also gives you the facility of uploading bulk  ingredient costs in one shot. </p>
            <p>Download Excel(.xls)<strong> </strong><br />
              This tab shows you all the saved  ingredients with their costs and other details such as purchase, brand and can  be downloaded and edited to be saved and uploaded for future reference. </p>
            <p><strong>Edit </strong><br />
              Facilitates a convenient mode of  editing online- ingredient, cost, place and other details easily which can be  saved for future reference. </p>
            <p><strong>Profile/Edit/Changes Dashboard </strong><br />
              You as a member of Calcipe can edit  information details as in a/c details, billing calculation as well as your  Profile information. This space also facilitated change of password for  security reasons. </p>
            <p><strong>Calculation basis </strong><br />
              Under this, one can add /edit few  default numbers/measures which can be used as a basis for all your recipes. <br />
              This default number/ measure such as  food loss percentage is available in different forms of cooking practices and  is used in individual process requirements. <br />
              Adding a default figure in food  calculation basics will help in giving you accurate information about new  recipes recently added. <br />
              You can edit / change the food loss(  moisture and other) for each recipe and each individual recipe will be saved  with the changes. </p>
            <p><strong>Profit amount in Percentage </strong><br />
              This is a variable cost calculator  required as an input for your production, sales and service. </p>
            <p><strong>What is profit?  </strong><br />
              Profit simply means the difference  between your input and output. <br />
              The excess of your input after taking  into consideration your output and all other overheads involved. </p>
            <p><strong>What is food loss? </strong><br />
              Food loss can be broadly defined as  food loss that occurs&nbsp; greatly among individual foods based on a number of  factors, such as cooking, time moisture, environment, process, a food&rsquo;s perish-  ability or shelf life, the likelihood of a food being used as an ingredient or  eaten without further preparation, and the degree to which a food is typically  consumed by children or an adult. </p>
            <p><strong>Selecting currency </strong><br />
              To choose a default currency value to  recipe pricing. </p>
            <p>Rate <br />
              For entering the ingredients, you  could select already saved ingredients from the drop down; to get the rate and  finally calculate the amount <br />
              eg: Quantity measure x Rate = Amount </p>
            <p>In case of&nbsp;new ingredients  of the new recipe which are not listed in our comprehensive list, you could add  your new ingredient to the list say for eg&nbsp;melon seeds by  copying the ingredient (control C)&nbsp;and clicking on add ingredient,  a pop up window add ingredient will appear with details such as Ingredient  name, quantity purchased, its measure and rate which will be finished kilo  pricing. Click on Add and Save on the Ingredient dashboard successfully. Close  the pop up window and go back and add your new recipe and your new ingredient  will reflect in the list. </p>
            <p>The final action before saving the  recipe, choose weight per portion. <br />
              Eg: Type in 100 and measure as grams  and you will see food loss percentage, recipe weight, finished weight per kilo, selling price per kilo, selling price per piece / portion automatically  calculated. Remember to save your recipe by clicking on the Save recipe button. </p>
            <p><strong>Adding New Multi Recipe </strong></p>
            <p><strong> Multi recipe costing </strong><br />
              This will operate in the same way as adding  a new recipe wherein you can choose from an already save recipe or multi  recipes and you could add a few more ingredients. This enables for the recipe  and the ingredients to be taken into consideration together and get the cost  for the finished product according to per piece weight. </p>
            <p><strong>Checking your Costs </strong><br />
              You can always go back to the recipe  dashboard wherein you can view all the saved recipes. Click on the chosen  recipe, you can view the cost details and the cost per portion of each saved  recipe. </p>
            <p><strong> Changing recipe portion weight</strong><br />
              After uploading the recipe and its  weight per portion and saving, you can go back by clicking on the edit button  to change portion weight of the recipe and measure the new cost price, now of  portions and price per portion. </p>
            <p>You can also choose to duplicate a  recipe by clicking on the duplicate icon and save it as a new recipe with  changed portion weight. </p>
            <p><strong>Recipe Print </strong><br />
              Click on the print icon and a pop up  window will appear. Here you choose the required field as of date to print as  of print default date,&nbsp;you can choose the fields you  require as in name, brief description, cost, formula, direction (method) along  with the image. </p>
            <p><strong>Download Recipe in pdf </strong><br />
              You can save your recipe for future  reference or sharing with others by saving and downloading the recipe in pdf  format by clicking on the pdf icon (You would require to download Adobe Reader  to perform this action). </p>
            <p><strong>Duplicate New Recipe </strong><br />
              You can always click on the duplicate  icon of the recipe panel on the dashboard to replicate an entire recipe which  can be altered or edited according to your recipe in terms of name, ingredient,  direction(method) as well as weight per portion and finished cost price </p>
            <p><strong> Who should use Calcipe? </strong><br />
              Calcipe can be used across a range of  industries –  Food and Beverages, Chemical and Manufacturing and Service industries. And  pertains to each every individual / professional who needs to work a recipe to develop food or non food products / items. Companies involved in formulating Recipes using dry powder, semi-soft paste or firm dough and any  place where you use more than one ingredient to blend in or churn out to a finished product. </p>
            <p>Examples<strong></strong><br />
              Personal  Care  –  Toothpaste, Gel paste, Mouth washers, Soaps and face washes, creams, body  lotions, perfumes, nail polish, lipsticks. <br />
              Food  and  Beverages  –  Rasam powder, Sambhar powder, Spice powders, sauces, jams and preserves and  pizza spreads and toppings, mayonnaise, ready to eat food mixes. <br />
              Hospitality  Industry  –  Hotels, restaurants, take aways which serve plated meals. <br />
              Snack industry – Fryums,  chips, kurkure, golden fingers, smiley faces, wedges, tacos. </p>
  <Br />
                    <div style="text-align:right; display:none">            
                    <div id="error_msg"></div>
            <form name="suggestion" id="suggestion" method="post" action="">
            <table align="left" cellpadding="2" cellspacing="2" width="400">
              <tbody>
                <tr>
                  <td colspan="2" align="center"><div style="color:#F00; font-size:9px"><?php echo $error_message;?></div><div style="color:#00BF00; font-size:10px"><?php if($this->uri->segment(3)){echo "Your FAQ has been Send";}?></div></td>
                  </tr>
                <tr>
                  <td width="85">Name:<span class="text-login">* </span></td>
                  <td width="269" valign="middle"><input name="frmName" id="frmName" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
    
                </tr>
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td width="85">E mail:<span class="text-login">*</span></td>
                  <td height="5"><input name="email_address" id="email_address" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
    
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td>Company:</td>
                  <td><input name="companyName" id="companyName" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
                <tr>
    
                  <td height="10" colspan="2" valign="top"></td>
                </tr>
                <tr>
                  <td>Subject:<span class="text-login">*</span></td>
                  <td><input name="subject" id="subject" size="40" maxlength="100" type="text" class="textbox_blur" onfocus="javascript: this.className = 'textbox_focus';" onblur="javascript: this.className = 'textbox_blur';"></td>
                </tr>
                <tr>
                  <td height="10" colspan="2" valign="top"></td>
    
                </tr>
                <tr>
                  <td valign="top">Remarks:<span class="text-login">*</span></td>
                  <td valign="top"><textarea rows="5" cols="30" name="comments" id="comments" class="textarea_box_blur" onfocus="javascript: this.className = 'textarea_box_focus';" onblur="javascript: this.className = 'textarea_box_blur';"></textarea></td>
                </tr>
                <tr>
                  <td height="2" colspan="2" valign="top"></td>
    
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input class="feedback_mail_icon" value="Send Your Feedback" name="S1" type="submit" onclick="return validateForm();" ></td>
                </tr>
              </tbody>
           </table>
          </form>
            </div>
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
