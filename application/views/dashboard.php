<?php $this->load->view('includes/header_new'); 
?>
            <div class="art-Sheet-body">
            <div id="allHeader">
                    <div id="company_logo"></div>
                       <div id="header_css">
                   			<!-- <img src="/images/dashboard.png" width="242" height="61" />-->
                   		</div>
                    <!--<div id="loggedUser">
                   		 Logged as <?php echo $this->session->userdata('username') ;?>
                    </div>-->
            	</div>
                <?php $this->load->view('includes/menu'); ?>
                <div class="art-contentLayout">
                    <?php $this->load->view('includes/left_sidebar'); ?>
                    <div class="art-content">
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.1.min.js"></script>
<script>
function del_msg(type,msgId)
{
		var link = "/index.php/site";
//		type="Image";
		 $.post(link + "/close_msg", { type: type,msgId: msgId, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
//    			$.get(link + "/show_message_board", function(cart){
////  					$("#cart_content").html(cart);
//  					$("#display").html(cart);
//				});

    		}
    		
 		 }); 

		return false;
}
/*$(document).ready(function(){
	$("#closeAll").click(function() {
		var link = "/index.php/site";
		type="All";
		 $.post(link + "/close_msg", { type: type, ajax: '1' },
  			function(data){
  			if(data == 'true'){alert(data);return;
    			
//    			$.get(link + "/show_message_board", function(cart){
////  					$("#cart_content").html(cart);
//  					$("#display").html(cart);
//				});

    		}
    		
 		 }); 

		return false;
	});
	$("#closeImg").click(function() {
		var link = "/index.php/site";
		type="Image";
		 $.post(link + "/close_msg", { type: type, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
//    			$.get(link + "/show_message_board", function(cart){
////  					$("#cart_content").html(cart);
//  					$("#display").html(cart);
//				});

    		}
    		
 		 }); 

		return false;
	});
	$("#closeText").click(function() {
		var link = "/index.php/site";
		type="Text";
		 $.post(link + "/close_msg", { type: type , ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
//    			$.get(link + "/show_message_board", function(cart){
////  					$("#cart_content").html(cart);
//  					$("#display").html(cart);
//				});

    		}
    		
 		 }); 

		return false;
	});
	$("#closeVideo").click(function() {
		var link = "/index.php/site";
		type="Embed Video";
		 $.post(link + "/close_msg", { type: type, ajax: '1' },
  			function(data){
  			if(data == 'true'){
    			
//    			$.get(link + "/show_message_board", function(cart){
////  					$("#cart_content").html(cart);
//  					$("#display").html(cart);
//				});

    		}
    		
 		 }); 

		return false;
	});
});
*/
</script>
<script type="text/javascript">
$(document).ready(function() {	

		var link = "/index.php/site";
		userId=<?php echo $this->session->userdata('user_id');?>;
		 $.post(link + "/chk_profile", { userId: userId, ajax: '1' },
  			function(data){
//			alert(data);return false;
  			if(data == 'true'){
 // Set Cookie   			
				var d = new Date();
				 d.setTime(d.getTime() + (60 * 60 * 1000)); 
				 
				 // write value to cookie
				 <?php 
$svar=$this->session->userdata('user_id');

				 if(isset($_COOKIE["$svar"]))
				 {
				 }
				 else{
				 setcookie("$svar","SETTEED", time()+180);
				 ?>
//				 SetCookie("username", "displayed", d);
//				 alert("Data written successfully");

//
				var id = '#dialog';
			
				//Get the screen height and width
				var maskHeight = $(document).height();
				var maskWidth = $(window).width();
			
				//Set heigth and width to mask to fill up the whole screen
				$('#mask').css({'width':maskWidth,'height':maskHeight});
				
				//transition effect		
				$('#mask').fadeIn(1000);	
				$('#mask').fadeTo("slow",0.8);	
			
				//Get the window height and width
				var winH = $(window).height();
				var winW = $(window).width();
					  
				//Set the popup window to center
				$(id).css('top',  winH/2-$(id).height()/2);
				$(id).css('left', winW/2-$(id).width()/2);
			
				//transition effect
				$(id).fadeIn(2000); 	

			<?php }?>
    		}
    		
 		 }); 




	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});		
	
});

</script>
					<?php
	$query3 = $this->db->query("SELECT id_message FROM message_board WHERE user_id=".$this->session->userdata('user_id'));
	if ($query3->num_rows() > 0)
	{
					?>
                    <div id="msgbrd" class="art-Post">
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
								Message Board  
        <div id="usermsg">
		<?php 
			$this->load->model('membership_model');
			$message = $this->membership_model->get_message();
			if(isset($message)) : foreach($message as $row) : ?>
            <?php if($row->message_type=="Image"){?>
			<div id="imgmsg"><img src="<?php echo base_url()."/images/".$row->message;?>" /><img src="<?php echo base_url();?>images/remove.png" style="vertical-align:top; cursor:pointer" onclick="document.getElementById('imgmsg').style.display='none';del_msg('Image',<?php echo $row->id_message;?>);" id="closeImg" /></div>
            <?php }?>
            <?php if($row->message_type=="Text"){?>
			<div id="txtmsg"><?php echo $row->message;?><img src="<?php echo base_url();?>images/remove.png" style="vertical-align:top; cursor:pointer" onclick="document.getElementById('txtmsg').style.display='none';del_msg('Text',<?php echo $row->id_message;?>);"  id="closeText"/></div>
            <?php }?>
            <?php if($row->message_type=="Embed Video"){?>
			<div id="vdomsg"><?php echo $row->message;?><img src="<?php echo base_url();?>images/remove.png" style="vertical-align:top; cursor:pointer" onclick="document.getElementById('vdomsg').style.display='none';del_msg('Embed Video',<?php echo $row->id_message;?>);"  id="closeVideo" /></div>
            <?php }?>
        <?php endforeach; ?>
		<?php endif; ?>
        </div>
        <div id="messageClose"><img src="<?php echo base_url();?>images/remove.png" style="vertical-align:top; text-align:right; cursor:pointer" onclick="document.getElementById('msgbrd').style.display='none';del_msg('All',<?php echo $row->id_message;?>);" id="closeAll"  /></div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                    <?php }?>
                      <!-- content Board -->
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
                        <div id="dabshobardLogo">
                   			 <img src="/images/dashboard.png" width="200" height="50" />
                   		</div>
                        <?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $this->db->where('progress_status', 'Complete');
                                $query = $this->db->get('recipe')->num_rows();
                                ?>
                                <?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $this->db->where('progress_status', 'Incomplete');
                                $query1 = $this->db->get('recipe')->num_rows();
                                ?>
                                <?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $query2 = $this->db->get('recipe')->num_rows();
                                ?>
                            <div>
                            <table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#C1D5AD">
                                <tr>
                                   <!-- <td width="4%" align="right" ><a href="<?php echo base_url();?>index.php/site/completerecipe" style="color:#000000;"><strong><?php echo $query;?></strong></a></td>
                                    <td width="17%" align="left">Completed Recipe</td>
                             
                                    <td width="3%" align="right"><a href="<?php echo base_url();?>index.php/site/incompleterecipe" style="color:#000000;"><strong><?php echo $query1;?></strong></a></td>
                                    <td width="18%" align="left">InComplete Recipe</td>
                                    -->
                            
                                    <td width="3%" align="right"><a href="<?php echo base_url();?>index.php/site/recipe" style="color:#000000;"><strong><?php echo $query2;?></strong></a></td>
                                    <td width="55%" align="left">Total Recipe</td>
                                </tr>
                            </table>
                            </div> 
                            <div class="art-PostContent">                           
                                <table class="table" width="100%">
                                	<tr>
                                		<td width="33%" valign="top">
                                		<div class="art-Block">
                                			<div class="art-Block-body">
                                				<div class="art-BlockHeader">
                                                <div id="header-mdi">
                                                	<div id="header-left">
                                                    <div id="header-right">
                                                    <center><a href="<?php echo base_url();?>index.php/site/changePlan"><b>Change of Plans</b></a></center>
                                                </div></div></div>
                                                                              				  
                                			  </div>
                                				<div class="art-BlockContent">
                                					<div class="art-PostContent">
                                						<a href="<?php echo base_url();?>index.php/site/changePlan"><img src="/images/plan-change.png" width="128px" height="128px" alt="an image" style="margin: 0 auto; display: block; border: 0" /></a>
                                						<p>This  option allows you to the flexibility of altering your plan or recipe and  welcomes you to experience a host of new features; where you can experiment and  enjoy additional benefits too !
                                                      </p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                		<td width="33%" valign="top">
                                		<div class="art-Block">
                                			<div class="art-Block-body">
                                				<div class="art-BlockHeader">
                                          <div id="header-mdi">
                                                	<div id="header-left">
                                                    <div id="header-right">
                                                    <center><a href="<?php echo base_url();?>index.php/site/recipe"><center><b>Recipes</b></center></a></center>
                                                </div></div></div>
                                				 
                                			  </div>
                                				<div class="art-BlockContent">
                                					<div class="art-PostContent">
                                						<a href="<?php echo base_url();?>index.php/site/recipe"><img src="/images/recipe.png" width="128px" height="128px" alt="an image" style="margin: 0 auto; display: block; border: 0" /></a>
                                						<p>Recipes  are a form of  culinary creativity  expressed or unleashed .In this space you can upload the recipes you have  created; a useful suggestion would be the order of ingredients – maximum usage  to minimum, measurements as in gms / kg, methodology and useful tips.</p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                		<td width="33%" valign="top">
                                		<div class="art-Block">
                                			<div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                         <div id="header-mdi">
                                                	<div id="header-left">
                                                    <div id="header-right">
                                                    <center><a href="<?php echo base_url();?>index.php/gredient/"><b>Ingredients</b></a></center>
                                                </div></div></div>
                                          
                                			  </div>
                                				<div class="art-BlockContent">
                                					<div class="art-PostContent">
                                						<a href="<?php echo base_url();?>index.php/gredient/"><img src="/images/ingredients.png" width="128px" height="128px" alt="an image" style="margin: 0 auto; display: block; border: 0" /></a>
                                						<p>Ingredients  form the core of any food and they are the main elements around which a recipe  is created. In This space, you can enter each and every ingredient that is put  into to create a new recipe along with suitable measurements.</p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                	</tr>
                                </table>
                                    
                            </div>
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>
                        <!--  All Informations   -->
                        <!--<div class="art-Post">
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
								<?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $this->db->where('progress_status', 'Complete');
                                $query = $this->db->get('recipe')->num_rows();
                                ?>
                                <?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $this->db->where('progress_status', 'Incomplete');
                                $query1 = $this->db->get('recipe')->num_rows();
                                ?>
                                <?php 
                                $this->db->where('user_id', $this->session->userdata('user_id'));
                                $query2 = $this->db->get('recipe')->num_rows();
                                ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                <tr>
                                    <td width="46%" align="right"><a href="<?php echo base_url();?>index.php/site/completerecipe"><?php echo $query;?></a></td>
                                    <td width="54%" align="left">Completed Recipe</td>
                              </tr>
                                <tr>
                                    <td align="right"><a href="<?php echo base_url();?>index.php/site/incompleterecipe"><?php echo $query1;?></a></td>
                                    <td align="left">InComplete Recipe</td>
                              </tr>
                                <tr>
                                    <td align="right"><a href="<?php echo base_url();?>index.php/site/recipe"><?php echo $query2;?></a></td>
                                    <td align="left">Total Recipe</td>
                              </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </table>                            
                            <div class="cleared"></div>
                        </div>
                        
                            </div>
                        </div>-->
                        
                    </div>
                   <!--  Right Side bar Informations -->
                     <!--  Right Side bar Informations -->
                   <?php $this->load->view('includes/right_sidebar'); ?> 
 <!--  Right Side bar Informations -->
                
              <!--  Right Side bar Informations -->
                   
<?php $this->load->view('includes/footer_new'); ?>
