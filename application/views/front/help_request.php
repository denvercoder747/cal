<?php $this->load->view('includes/header_new'); ?>
            <div class="art-Sheet-body">
            <div id="allHeader">
                    <div id="company_logo"></div>
                       <div id="header_css">
                   			<!-- <img src="/images/dashboard.png" width="242" height="61" />-->
                   		</div>
                    <!--<div id="loggedUser">
                   		 Logged as <?php echo $this->session->userdata('firstname') ;?>
                    </div>-->
            	</div>
                <?php $this->load->view('includes/menu'); ?>
                <div class="art-contentLayout">
                    <?php $this->load->view('includes/left_sidebar'); ?>
                    <div class="art-content">
     <script type="text/javascript">
	 function validate()
	 {
		if(document.getElementById('msgtitle').value=='')
		{
			alert('Please Enter the Title');
			return false;
		}
		if(document.getElementById('textMessage').value =='')
		{
			alert('Please Enter the Message');
			return false;
		}
	 }
	 </script>               
                    
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
                        <div class="art-PostContent">                           
                  <table class="table" width="100%">
                                	<tr>
                                	  <td colspan="2" valign="top"><span style="color:#CC6666; font-size:14px; font-weight:bold">Help Request Form</span></td>
                               	  </tr>
                                	<tr>
                                	  <td valign="top">&nbsp;</td>
                                	  <td valign="top"><?php echo $this->session->flashdata('message');?></td>
                              	  </tr>
                                	<tr>
                                		<td width="0%" valign="top">&nbsp;</td>
                                		<td width="87%" valign="top"><form name="profile" id="profile" action="<?php echo base_url();?>index.php/site/send_request" method="post" onsubmit="return validate();" >
                                		  <input type="hidden" name="UserId" id="UserId" value="<?php echo $this->session->userdata('user_id');?>"  />
                                		  <table width="100%" border="0" cellpadding="2" cellspacing="3"  id="id-form">
                                		    <tr>
                                		      <th width="20%" align="right" valign="top">Message Title:</th>
                                		      <td width="3%">&nbsp;</td>
                                		      <td width="73%"><input type="text" name="msgtitle" id="msgtitle"/></td>
                                		      <td width="4%"></td>
                               		        </tr>
                                		    
                                		    <tr>
                                		      <th align="right" valign="top">Message:</th>
                                		      <td>&nbsp;</td>
                                		      
                                		      <td><textarea name="textMessage" cols="50" rows="5" id="textMessage" ></textarea></td>
                                		      <td>			
                                		        
                               		          </td>
                               		        </tr>
                                		    <tr>
                                		      <th>&nbsp;</th>
                                		      <td valign="top">&nbsp;</td>
                                		      <td valign="top">
                                		        <input class="calcipeButton" type="submit" value="Submit" /></td>
                                		      <td></td>
                               		        </tr>
</table></form></td>
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
