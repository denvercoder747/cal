<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('user');
		
		if($query->num_rows == 1)
		{
			$row=$query->row_array();
			 $uid=$row['user_id'];
			 return $uid;
			//return true;
		}
		
	}
	function temp_insert()
	{
			if (!empty($_FILES['userfile']['name']))
        {

			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			$new_filename="noimage.jpeg";
			
		}
		$chars = '0123456789abcdefghjkmnoprstvwxyz';
	
		$Code  = '';
		$RndSSN  = '';
		// Generate code
		for ($i = 0; $i < 12; ++$i)
		{
			$Code .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
		}
		for ($i = 0; $i < 8; ++$i)
		{
			$RndSSN .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
		}
			if($this->input->post('dob')!='')
			{
			  $date1=explode("/",$this->input->post('dob'));
			  $date2=$date1[2].$date1[0].$date1[1];
			}
			else
			{
				$date2="";
			}
		$array_items = array('sess_id' => '', 'verCode' => '', 'user_email' => '');
		$this->session->unset_userdata($array_items);
		$this->session->set_userdata('sess_id',$RndSSN);
		$this->session->set_userdata('verCode',$Code);
		$this->session->set_userdata('user_email',$this->input->post('username'));
		if($this->input->post('dob')<>'')
		{
			  $date1=explode("/",$this->input->post('dob'));
			  $date2=$date1[2].$date1[0].$date1[1];
		}
		else
		{
			$date2='';
		}
		//echo $Code;exit;	
		$valid_date  = date("Y-m-d",strtotime("+30 days"));
		$middle_name=$this->input->post('middle_name');
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $middle_name,
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'dob' => $date2,
			'email' => $this->input->post('email'),			
			'photo' => $new_filename,			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'pass_hint' => "",
			'company' => $this->input->post('company'),
			'country_name' => $this->input->post('country'),
			'state_name' => $this->input->post('state'),
			'city_name' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'address1' => $this->input->post('address'),
			'address2' => $this->input->post('address2'),
			'contact_no' => $this->input->post('phone'),
			'fax_no' => $this->input->post('fax'),
			'member_type' => $this->input->post('member_type'),
			'level' => $this->input->post('level'),
			'language' => $this->input->post('lang'),
			'total_amt' => $this->input->post('total_amount'),
			'payment_method' => $this->input->post('payment_method'),
			'created_date' => date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'valid_upto' => $valid_date,
			'verified_text' => $this->session->userdata('verCode'),
			'profit' => $this->input->post('profit'),
			'currency' => $this->input->post('currency'),
			'weight_per_portion' => $this->input->post('weight_per_portion'),
			'food_loss' => $this->input->post('food_loss'),
			'infrastructure_cost' => $this->input->post('infrastructure_cost'),
			'flag' => 0	,					
			'sess_id' => $this->session->userdata('sess_id')	,					
			'status' => 'Inactive'						
		);
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('user');
		//			echo $this->db->last_query();exit;

		if($query->num_rows == 1)
		{
            $this->session->set_flashdata('registration_error', '<div id="message" class="error">"'.$this->input->post('username').'" Name Already Exists!!!.</div>');
	        redirect('home/create_member');
		}
		else
		{
			$insert = $this->db->insert('temp_user', $new_member_insert_data);
				return $this->session->userdata('sess_id');
//			redirect('home/ccavenue',$mem_data);
			
		}
	}
	function confirm_member()
	{
//			$this->db->set('status', 'Active');
			$this->db->set('flag', 1);
			$this->db->set('order_id', $this->input->get_post('Order_Id'));
			$this->db->set('payment_status', "Success");
			$this->db->where('sess_id', $this->session->userdata('sess_id'));
			$this->db->update('temp_user');
			
			$this->db->query("insert into user(`first_name`,`middle_name`,`last_name`,`gender`,`dob`,`company`,`country_name`,`state_name`,`city_name`,`zip`,`address1`,`address2`,`contact_no`,`fax_no`,`email`,`username`,`password`,`pass_hint`,`member_type`,`level`,`language`,`profit`,`currency`,`weight_per_portion`,`food_loss`,`photo`,`total_amt`,`payment_method`,`created_date`,`valid_upto`,`updated_date`,`verified_text`,`flag`,`sess_id`,`order_id`,`status`,`payment_status`) select `first_name`,`middle_name`,`last_name`,`gender`,`dob`,`company`,`country_name`,`state_name`,`city_name`,`zip`,`address1`,`address2`,`contact_no`,`fax_no`,`email`,`username`,`password`,`pass_hint`,`member_type`,`level`,`language`,`profit`,`currency`,`weight_per_portion`,`food_loss`,`photo`,`total_amt`,`payment_method`,`created_date`,`valid_upto`,`updated_date`,`verified_text`,`flag`,`sess_id`,`order_id`,`status`,`payment_status` from temp_user WHERE sess_id='".$this->session->userdata('sess_id')."'");
//			echo $this->db->last_query();

		 $this->load->library('email');
				$mailbox=$this->session->userdata('user_email');
				$firstname=$this->input->post('first_name');
				$lastname=$this->input->post('last_name');
//				$name=$this->input->post('billing_cust_name');
			if($mailbox!='')
			{
					$message="<html>
								<head>
								<style type='text/css'>
								h2, p
								{
									font-family:Arial, Helvetica, sans-serif;
									padding:0px 10px 0px 10px
								}
								
								p
								{
	font-size:13px;
	color:#666666;
	text-align: justify;
								}
								</style>
</head>
								
								<body bgcolor='#000000'>
								<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
								<tr>
								<td>
								<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
								<tr>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/tlcurve.gif' /></td>
								<td width='332px' height='123px'><img src='http://www.calcipe.com/mail_images/logo2.gif' /></td>
								<td width='332px' height='123px' style='text-align:right;'><img src='http://www.calcipe.com/mail_images/mob2.gif' /></td>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/trcurve.gif' /></td>
								</tr>
								
								
								</table>
								</td>
								</tr>
								<tr>
								<tr>
								<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>WELCOME MAIL</p></td>
								</tr>
								<tr>
								<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td><p  style='line-height: 6px; font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hi <strong>$firstname $lastname</strong>
							          <span style='text-align: justify'></span>
									  <p>Welcome! To an innovative space where you have the opportunity of balancing money and consumption – Calcipe.
									    
									    Calcipe is an open and protected space where the cost of your recipe and the cost of each of the ingredients used in the recipe is calculated to avoid food loss.
									    
									    Calcipe gives you the opportunity to calculate, compare and review costs thereby introducing a new concept in Smart Cooking. 
									    
									    As an introductory offer, this facility is being offered free of cost for the first month only where we would like you to come experience, experiment and give us your feedback which we would value very much!								      </p>
									  <p>All you need to Verify by click on the link</p>
<p><a href='http://calcipe.com/index.php/home/activate/".$this->session->userdata('verCode')."'>Verify Account</a></p></td>
									<td align='right'><a href='http://calcipe.com/index.php/home/activate/".$this->session->userdata('verCode')."'><img src='http://www.calcipe.com/mail_images/clicktoconfirm.gif' border='0' ></a></td>
								  </tr>
								</table>
								<p>&nbsp;</p>
								<p>We look forward to updating you next time!<br />
								  <br />
								  <strong>Regards,</strong><br />
								<strong>The Calcipe Team</strong></p>
								
								</td>
								</tr>
								<tr>
								<td>
								<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
								<tr>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/blcurv.gif' height='83' width='18' /></td>
								<td width='664px' style='background-image:url(http://www.calcipe.com/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/brcurv.gif' height='83' width='18' /></td>
								</tr>
								</table>
								</td>
								</tr>
								<tr>
								<td bgcolor='#e6e6e6'>
								<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
								<tr height='20px'>
								<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='http://www.calcipe.com/mail_images/facebook.gif' border='0' /></a></td>
								<td><p>Link us on Facebook</p></td>
								<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='http://www.calcipe.com/mail_images/tweeter.gif' /></a></td>
								<td><p>Follow us on Twitter</p></td>
								<td width='450px'>&nbsp;</td>
								</tr>
								<tr>
								<td height='19' colspan='5'  style='margin:0'><img src='http://www.calcipe.com/mail_images/hr.gif' /></td>
								</tr>
								<tr>
								<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
								</tr>
								</table>
								<tr>
								</table>
								</table>
								</td>
								</tr>
								</table>
								</body>
								</html>";
					$this->email->from('support@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('WelCome To Calcipe');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
	
	//MAil Script End		
			}

		return $this->db->affected_rows();
		
	}
	function create_member()
	{
			if (!empty($_FILES['userfile']['name']))
        {

			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			$new_filename="noimage.jpeg";
			
		}
		$chars = '0123456789abcdefghjkmnoprstvwxyz';
	
		$Code  = '';
		$RndSSN  = '';
		// Generate code
		for ($i = 0; $i < 12; ++$i)
		{
			$Code .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
		}
		for ($i = 0; $i < 8; ++$i)
		{
			$RndSSN .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
		}
		$this->session->set_userdata('sess_id',$RndSSN);
			  $date1=explode("/",$this->input->post('dob'));
			  $date2=$date1[2].$date1[0].$date1[1];
		//echo $Code;exit;	
		$middle_name=$this->input->post('middle_name');
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $middle_name,
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'dob' => $date2,
			'email' => $this->input->post('email'),			
			'photo' => $new_filename,			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'pass_hint' => "",
			'company' => $this->input->post('company'),
			'country_name' => $this->input->post('country'),
			'state_name' => $this->input->post('state'),
			'city_name' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'address1' => $this->input->post('address'),
			'address2' => $this->input->post('address2'),
			'contact_no' => $this->input->post('phone'),
			'fax_no' => $this->input->post('fax'),
			'member_type' => $this->input->post('member_type'),
			'level' => $this->input->post('level'),
			'language' => $this->input->post('lang'),
			'total_amt' => $this->input->post('total_amount'),
			'payment_method' => $this->input->post('payment_method'),
			'created_date' => date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'verified_text' => $Code,
			'profit' => $this->input->post('profit'),
			'currency' => $this->input->post('currency'),
			'weight_per_portion' => $this->input->post('weight_per_portion'),
			'food_loss' => $this->input->post('food_loss'),
			'status' => 'Inactive'						
		);
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('user');
		//			echo $this->db->last_query();exit;

		if($query->num_rows == 1)
		{
            $this->session->set_flashdata('registration_error', '<div id="message" class="error">"'.$this->input->post('username').'" Name Already Exists!!!.</div>');
	        redirect('home/create_member');
		}
		else
		{
			$insert = $this->db->insert('user', $new_member_insert_data);
	// Mail Script
		 $this->load->library('email');
				$mailbox=$this->input->post('username');
				$firstname=$this->input->post('first_name');
				$lastname=$this->input->post('last_name');
			if($mailbox!='')
			{
					$message="<html>
								<head>
								<style type='text/css'>
								h2, p
								{
									font-family:Arial, Helvetica, sans-serif;
									padding:0px 10px 0px 10px
								}
								
								p
								{
	font-size:13px;
	color:#666666;
	text-align: justify;
								}
								</style>
</head>
								
								<body bgcolor='#000000'>
								<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
								<tr>
								<td>
								<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
								<tr>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/tlcurve.gif' /></td>
								<td width='332px' height='123px'><img src='http://www.calcipe.com/mail_images/logo2.gif' /></td>
								<td width='332px' height='123px' style='text-align:right;'><img src='http://www.calcipe.com/mail_images/mob2.gif' /></td>
								<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='http://www.calcipe.com/mail_images/trcurve.gif' /></td>
								</tr>
								
								
								</table>
								</td>
								</tr>
								<tr>
								<tr>
								<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>WELCOME MAIL</p></td>
								</tr>
								<tr>
								<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
								<table width='100%' border='0' cellspacing='0' cellpadding='0'>
								  <tr>
									<td><p  style='line-height: 6px; font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hi <strong>$firstname $lastname</strong>
							          <span style='text-align: justify'></span>
									  <p>Welcome! To an innovative space where you have the opportunity of balancing money and consumption – Calcipe.
									    
									    Calcipe is an open and protected space where the cost of your recipe and the cost of each of the ingredients used in the recipe is calculated to avoid food loss.
									    
									    Calcipe gives you the opportunity to calculate, compare and review costs thereby introducing a new concept in Smart Cooking. 
									    
									    As an introductory offer, this facility is being offered free of cost for the first month only where we would like you to come experience, experiment and give us your feedback which we would value very much!								      </p>
									  <p>All you need to Verify by click on the link</p>
<p><a href='http://calcipe.com/index.php/home/activate/".$this->session->userdata('verCode')."'>Verify Account</a></p></td>
									<td align='right'><a href='http://calcipe.com/index.php/home/activate/".$this->session->userdata('verCode')."'><img src='http://www.calcipe.com/mail_images/clicktoconfirm.gif' border='0' ></a></td>
								  </tr>
								</table>
								<p>&nbsp;</p>
								<p>We look forward to updating you next time!<br />
								  <br />
								  <strong>Regards,</strong><br />
								<strong>The Calcipe Team</strong></p>
								
								</td>
								</tr>
								<tr>
								<td>
								<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
								<tr>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/blcurv.gif' height='83' width='18' /></td>
								<td width='664px' style='background-image:url(http://www.calcipe.com/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
								<td width='18px'><img src='http://www.calcipe.com/mail_images/brcurv.gif' height='83' width='18' /></td>
								</tr>
								</table>
								</td>
								</tr>
								<tr>
								<td bgcolor='#e6e6e6'>
								<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
								<tr height='20px'>
								<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824'><img src='http://www.calcipe.com/mail_images/facebook.gif' border='0' /></a></td>
								<td><p>Link us on Facebook</p></td>
								<td><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='http://www.calcipe.com/mail_images/tweeter.gif' /></a></td>
								<td><p>Follow us on Twitter</p></td>
								<td width='450px'>&nbsp;</td>
								</tr>
								<tr>
								<td height='19' colspan='5'  style='margin:0'><img src='http://www.calcipe.com/mail_images/hr.gif' /></td>
								</tr>
								<tr>
								<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
								</tr>
								</table>
								<tr>
								</table>
								</table>
								</td>
								</tr>
								</table>
								</body>
								</html>";
					$this->email->from('support@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('WelCome To Calcipe');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
	
	//MAil Script End		
			
			return $insert;
		
		}
		}
	}
	
	function activate_member($text)
	{
			$this->db->set('status', 'Active');

			$this->db->where('verified_text', $text);
			
			$this->db->update('user');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function add_recipe()
	{
//			print_r($this->input->post());exit;
			$progress_status=$this->input->post('progress_status');
			$progress_val=$this->input->post('progress_val');
			$this->Gallery_model->do_upload();		
				  $image_name="noimage.jpeg";
			if ($this->upload->data())
			  {
				$image = array('upload_data' => $this->upload->data());
				$image_name=$image['upload_data']['file_name'];
				$progress_val=$progress_val+20;
			  } 
			  else
			  {
				  $image_name="noimage.jpeg";
			  }
			list($met_val, $metric) = explode(',', $this->input->post('wtpp'));
		$new_recipe_insert_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'name' => $this->input->post('recipe_name'),
			'description' => $this->input->post('short_desc'),
			'procedure' => $this->input->post('long_desc'),
			'image' => $image_name,
			'gradient_id' => "",
			'quantity' => $this->input->post('tot_qty'),
			'gradient_price' => $this->input->post('tot_amt'),
			'weight' => $this->input->post('rcp_weight'),
			'food_loss' => $this->input->post('food_loss'),
			'Finished_weight' => $this->input->post('finished_weight'),
			'Weight_portion' => $this->input->post('weight'),
			'weight_in_metric' => $this->input->post('temp_weight'),
			'weight_metric' => $metric,
			'cost_per_piece' => $this->input->post('per_pc_cost'),
			'total_number' => $this->input->post('numbers'),
			'yield' => $this->input->post('yield'),
			'profit' => $this->input->post('profit'),
			'infrastructure_cost' => $this->input->post('infrastructure_cost'),
			'selling_price' => $this->input->post('selling_price'),
			'kilo_price' => $this->input->post('per_kg_cost'),
			'created_date' =>date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'photo_id' => "",
			'multi_recipe' => $this->input->post('multi_recipe'),
			'progress_status' => $progress_status,
			'progress_value' => $progress_val,
			'status' => 'Active');	
			$insert = $this->db->insert('recipe', $new_recipe_insert_data);
			$id = $this->db->insert_id();	
			
			/* Update Recipe Counter*/
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('multi_recipe !=', 'True');
		$query2 = $this->db->get('recipe')->num_rows();
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('multi_recipe', 'True');
		$query3 = $this->db->get('recipe')->num_rows();
			$query = $this->db->query("SELECT total_recipe FROM recipe_counter WHERE user_id=".$this->session->userdata('user_id'));
			$rs=$query->result_array();
			if ($query->num_rows() > 0)
			{
				$inc=$query2;
				$inc1=$query3;
				$this->db->set('total_recipe', $inc);
				$this->db->set('total_multirecipe', $inc1);
	
				$this->db->where('user_id', $this->session->userdata('user_id'));
				$this->db->update('recipe_counter');
			}
			else
			{
				$inc=$query2;
				$inc1=$query3;
			$new_counter_data = array(
				'user_id' => $this->session->userdata('user_id'),
				'status' => "Active",
				'total_recipe' => $inc,
				'total_multirecipe' => $inc1);	
				$insert = $this->db->insert('recipe_counter', $new_counter_data);
				
			}
			
			/* SELECT FOR RECENT INSERT ID  */
			
//			$this->db->select('recipe_id, user_id');
//			$this->db->from('recipe');
//			$this->db->where('user_id', 1);
//			$this->db->order_by("recipe_id", "desc"); 
//			$this->db->limit(1);
			
			//$query = $this->db->get();
//			$query = $this->db->get('user');
    $tot_row = $this->input->post('tot_row');
    $tot_qty = $this->input->post('tot_qty');
    $tot_amt = $this->input->post('tot_amt');
	$ingRow = $this->input->post('ingRow');
	$gId = $this->input->post('gId');
	$rId = $this->input->post('rId');
	$qtyRow = $this->input->post('qtyRow');
	$rateRow = $this->input->post('rateRow');
	$amtRow = $this->input->post('amtRow');
	$unitRow = $this->input->post('unitRow');
	$measureRow = $this->input->post('measureRow');
for($i=0; $i<sizeof($ingRow); $i++){

		    $new_gradient_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'recipe_id' => $id,
			'id_gredient' => $gId[$i],
			'id_recipe' => $rId[$i],
			'name' => $ingRow[$i],
			'quantity' => $qtyRow[$i],
			'unit' => $unitRow[$i],
			'measure' => $measureRow[$i],
			'price' => $rateRow[$i],
			'amount' => $amtRow[$i],
			'created_date' => date('Y-m-d'),
			'updated_date' => date('Y-m-d'),
			'status' => 1);						
			$insert1 = $this->db->insert('gradients', $new_gradient_data);


}
//				print_r($ingRow);exit;
			return $this->input->post();
	}
	
	function get_num_records()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('status', 'Active');
		$this->db->order_by('recipe_id', 'DESC');
		$query = $this->db->get('recipe')->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_num_requests()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('request_history')->num_rows();
		return $query;
	}
	function get_num_records_inc()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('progress_status', 'Incmplete');
		$query = $this->db->get('recipe')->num_rows();
		return $query;
	}
	function get_num_records_com()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('progress_status', 'Complete');
		$query = $this->db->get('recipe')->num_rows();
		return $query;
	}
	function check_recipe()
	{
		$RcpName = $this->input->post('recipe_name'); 
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('name', $RcpName);
//		$query = $this->db->get('recipe')->num_rows();
//		return $query;
		$query = $this->db->get('recipe', 1); // Select the products where a match is found and limit the query by 1
		// Check if a row has been found
		if($query->num_rows < 1){
				return TRUE;
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}
	function check_recipe2()
	{
		$RcpName = $this->input->post('recipe_name'); 
		$this->db->where('user_id =', $this->session->userdata('user_id'));
		$this->db->where('name', $RcpName);
		$this->db->where('recipe_id !=', $this->input->post('rcpId'));
//		$query = $this->db->get('recipe')->num_rows();
//		return $query;
		$query = $this->db->get('recipe', 1); // Select the products where a match is found and limit the query by 1
//		echo $this->db->last_query();
		// Check if a row has been found
		if($query->num_rows > 0){
				return TRUE;
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}
	function check_user()
	{
		$UsrName = $this->input->post('user_name'); 
		$this->db->where('username', $UsrName);
//		$query = $this->db->get('recipe')->num_rows();
//		return $query;
		$query = $this->db->get('user', 1); // Select the User where a match is found and limit the query by 1
		// Check if a row has been found
		if($query->num_rows < 1){
				return FALSE;
		
		// Nothing found! Return FALSE!	
		}else{
			return TRUE;
		}
	}
	function get_records($num, $offset)
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('status =', 'Active');
		$this->db->order_by('recipe_id', 'DESC');
		$query = $this->db->get('recipe', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());exit;
//				echo '</i>';
		return $query->result();
	}
	function get_request_record($num, $offset)
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('status !=', 'Deleted');
		$query = $this->db->get('request_history', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());exit;
//				echo '</i>';
		return $query->result();
	}
	function get_records_com($num, $offset)
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('progress_status', 'Complete');
		$query = $this->db->get('recipe', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());
//				echo '</i>';
		return $query->result();
	}
	function get_records_inc($num, $offset)
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('progress_status', 'Incomplete');
		$query = $this->db->get('recipe', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());
//				echo '</i>';
		return $query->result();
	}
	function get_recipe($id)
	{
		$this->db->select('*');
		$this->db->from('recipe');
		$this->db->where('recipe.user_id', $this->session->userdata('user_id'));
		$this->db->where('recipe.recipe_id', $id);
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function get_gradients($id)
	{
		$this->db->select('*');
		$this->db->from('gradients');
		$this->db->where('gradients.user_id', $this->session->userdata('user_id'));
		$this->db->where('gradients.recipe_id', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function get_recipe_photos($id)
	{
		$this->db->select('*');
		$this->db->from('recipe_photoes');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('recipe_id', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function num_gradients($id)
	{
		$this->db->select('*');
		$this->db->from('gradients');
		$this->db->where('gradients.user_id', $this->session->userdata('user_id'));
		$this->db->where('gradients.recipe_id', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->num_rows();
	}
	function select_profile()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function edit_profile()
	{
		
			if (!empty($_FILES['userfile']['name']))
        {

				if ($this->input->post('T3'))
			{
				
						unlink(realpath('images/thumbs').'/'.$this->input->post('T3'));
						unlink(realpath('images').'/'.$this->input->post('T3'));
			}
			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			$new_filename=$this->input->post('T3');
			
		}

			  $date1=explode("/",$this->input->post('dob'));
			  $date2=$date1[2].$date1[0].$date1[1];

			$this->db->set('first_name', $this->input->post('first_name'));
			$this->db->set('middle_name', $this->input->post('middle_name'));
			$this->db->set('last_name', $this->input->post('last_name'));
			$this->db->set('dob',$date2);
			$this->db->set('email', $this->input->post('email'));
			$this->db->set('photo', $new_filename);
			$this->db->set('company', $this->input->post('company'));
			$this->db->set('country_name', $this->input->post('country'));
			$this->db->set('state_name', $this->input->post('state'));
			$this->db->set('city_name', $this->input->post('city'));
			$this->db->set('zip', $this->input->post('zip'));
			$this->db->set('address1', $this->input->post('address'));
			$this->db->set('address2', $this->input->post('address2'));
			$this->db->set('contact_no', $this->input->post('phone'));
			$this->db->set('fax_no', $this->input->post('fax'));
			$this->db->set('language', $this->input->post('lang'));
			$this->db->set('profit', $this->input->post('profit'));
			$this->db->set('infrastructure_cost', $this->input->post('infrastructure_cost'));
			$this->db->set('currency', $this->input->post('currency'));
			$this->db->set('weight_per_portion', $this->input->post('weight_per_portion'));
			$this->db->set('food_loss', $this->input->post('food_loss'));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('user_id', $this->session->userdata('user_id'));
			
			$this->db->update('user');
//			echo $this->db->last_query();exit;
		return $this->db->affected_rows();
	}
			function dateDiff($start, $end) {
			  $start_ts = strtotime($start);
			  $end_ts = strtotime($end);
			  $diff = $end_ts - $start_ts;
			  return round($diff / 86400);
			}
	function edit_plan()
	{
		
			$query3 = $this->db->query("SELECT valid_upto,member_type FROM user WHERE user_id=".$this->session->userdata('user_id'));
			if ($query3->num_rows() > 0)
			{
				$row3 = $query3->row_array(); 
			//	print_r($row3);
				$valid_upto =$row3['valid_upto'];
			}
			$query_rcp_limit = $this->db->query("SELECT max_recipe,	multi_recipe_storage FROM recipe_limits WHERE recipe_value=".$this->input->post('plan_name'));
			if ($query_rcp_limit->num_rows() > 0)
			{
				$row_rcp_limit = $query_rcp_limit->row_array(); 
			}
			$query_rcp_cnt = $this->db->query("SELECT * FROM recipe WHERE user_id=".$this->session->userdata('user_id'). " AND status='Active' AND multi_recipe='False' ");
			$row_rcp_cnt=$query_rcp_cnt->num_rows();
			$query_rcp_cnt_multi = $this->db->query("SELECT * FROM recipe WHERE user_id=".$this->session->userdata('user_id'). " AND status='Active' AND multi_recipe='True' ");
			$row_rcp_cnt_multi=$query_rcp_cnt_multi->num_rows();
			if($row_rcp_cnt>0)
			{
				
				if($row_rcp_cnt>$row_rcp_limit['max_recipe'])
				{
					$limit=$row_rcp_cnt-$row_rcp_limit['max_recipe'];
					//  Delete Recipe
				//$query_rcp_cnt = $this->db->query("UPDATE recipe SET status='TempBlocked' WHERE user_id=".$this->session->userdata('user_id')." ORDER BY created_date DESC  LIMIT $limit");
				$del_flag = 0;
//				 echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status='Active' AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit";exit;
				$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status='Active' AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit");
				if ($query_num->num_rows() > 0)
				{
					foreach ($query_num->result() as $row_num)
					{
						$valid_upto =$row_num->recipe_id;
							$query       =  $this->db->get_where('recipe',array('recipe_id' => $row_num->recipe_id));
						 if( $query->num_rows() > 0 )
							 {
								$row       = $query->row();
								$picture = $row->image;
	/*					 $this->db->delete('recipe', array('recipe_id' => $row_num->recipe_id));
						 $this->db->delete('gradients', array('recipe_id' => $row_num->recipe_id));
								unlink(realpath('images/thumbs').'/'.$picture);
								unlink(realpath('images').'/'.$picture);
	*/							
								$this->db->set('status', 'TempBlocked');
								$this->db->set('updated_date', date("Y-m-d"));
					
								$this->db->where('user_id', $this->session->userdata('user_id'));
								$this->db->where('recipe_id', $row_num->recipe_id);
								
								$this->db->update('recipe');
								$del_flag ++;
							 }
					}
					
				//	print_r($row3);
				}
				   
				
	//			echo $this->db->last_query();exit;
	
				}
				else
				
				{
					//echo "Dont Delete Recipe";
//					$limit=$row_rcp_limit['max_recipe']-$row_rcp_cnt;
					$limit=$row_rcp_limit['max_recipe'];
						$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status!='Blocked' AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit");
						if ($query_num->num_rows() > 0)
						{
							foreach ($query_num->result() as $row_num)
							{
								$valid_upto =$row_num->recipe_id;
									$query       =  $this->db->get_where('recipe',array('recipe_id' => $row_num->recipe_id));
								 if( $query->num_rows() > 0 )
									 {
										$row       = $query->row();
										$picture = $row->image;
										$this->db->set('status', 'Active');
										$this->db->set('updated_date', date("Y-m-d"));
							
										$this->db->where('user_id', $this->session->userdata('user_id'));
										$this->db->where('recipe_id', $row_num->recipe_id);
										
										$this->db->update('recipe');
									 }
							}
							
						}
				   
				}
			}
			
			if($row_rcp_cnt_multi>0)
			{
				if($row_rcp_cnt_multi>$row_rcp_limit['multi_recipe_storage'])
				{
					$limit=$row_rcp_cnt_multi-$row_rcp_limit['multi_recipe_storage'];
					//  Delete Recipe
				//$query_rcp_cnt = $this->db->query("UPDATE recipe SET status='TempBlocked' WHERE user_id=".$this->session->userdata('user_id')." ORDER BY created_date DESC  LIMIT $limit");
				$del_flag = 0;
	//			 echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status='Active' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit";exit;
				$query_num_multi = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status='Active' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit");
				if ($query_num_multi->num_rows() > 0)
				{
					foreach ($query_num_multi->result() as $row_num_multi)
					{
						$valid_upto =$row_num_multi->recipe_id;
							$query_multi =  $this->db->get_where('recipe',array('recipe_id' => $row_num_multi->recipe_id));
						 if( $query_multi->num_rows() > 0 )
							 {
								$this->db->set('status', 'TempBlocked');
								$this->db->set('updated_date', date("Y-m-d"));
					
								$this->db->where('user_id', $this->session->userdata('user_id'));
								$this->db->where('recipe_id', $row_num_multi->recipe_id);
								
								$this->db->update('recipe');
								$del_flag ++;
							 }
					}
					
				//	print_r($row3);
				}
				   
				
	//			echo $this->db->last_query();exit;
	
				}
				else
				
				{
					//echo "Dont Delete Recipe";
					
					$limit=$row_rcp_limit['multi_recipe_storage'];
						$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->session->userdata('user_id')." AND status!='Blocked' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit");
						if ($query_num->num_rows() > 0)
						{
							foreach ($query_num->result() as $row_num)
							{
								$valid_upto =$row_num->recipe_id;
									$query       =  $this->db->get_where('recipe',array('recipe_id' => $row_num->recipe_id));
								 if( $query->num_rows() > 0 )
									 {
										$row       = $query->row();
										$picture = $row->image;
										$this->db->set('status', 'Active');
										$this->db->set('updated_date', date("Y-m-d"));
							
										$this->db->where('user_id', $this->session->userdata('user_id'));
										$this->db->where('recipe_id', $row_num->recipe_id);
										
										$this->db->update('recipe');
										$del_flag ++;
									 }
							}
							
						}
				   
				}
				
			}
			//Date Difference
			
//  $start_ts = strtotime(date("Y-m-d"));
//  $end_ts = strtotime($valid_upto);
//  $diff = $end_ts - $start_ts;
//  $date_diff=round($diff / 86400);
//		
//		if($date_diff<1)
//		{
			$valid_date  = date("Y-m-d",strtotime("+30 days"));
			$this->db->set('member_type', $this->input->post('plan_type'));
			$this->db->set('level', $this->input->post('plan_name'));
			$this->db->set('updated_date', date("Y-m-d"));
			$this->db->set('valid_upto', $valid_date);
			$this->db->set('total_amt', $this->input->post('plan_inr'));

			$this->db->where('user_id', $this->session->userdata('user_id'));
			
			$this->db->update('user');
//			echo $this->db->last_query();exit;

		 $this->load->library('email');
				$mailbox=$this->input->post('username');
				$firstname=$this->input->post('firstname');
			if($mailbox!='')
			{
					$message="<html>
<head>
<style type='text/css'>
h2, p
{
	font-family:Arial, Helvetica, sans-serif;
	padding:0px 10px 0px 10px
}

p
{
	font-size:13px;
	color:#666666;
}
</style>
</head>

<body bgcolor='#000000'>
<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
<tr>
<td>
<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
<tr>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/tlcurve.gif' /></td>
<td width='332px' height='123px'><img src='/mail_images/logo2.gif' /></td>
<td width='332px' height='123px' style='text-align:right;'><img src='/mail_images/mob2.gif' /></td>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/trcurve.gif' /></td>
</tr>


</table>
</td>
</tr>
<tr>
<tr>
<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>&nbsp;</p></td>
</tr>
<tr>
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hello $firstname,<br> You have Changed Your Plan to ".$this->input->post('plan_type')."<br />
    <br />
    <strong>Regards,</strong><br />
  <strong>Admin</strong></p>

</td>
</tr>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
<tr>
<td width='18px'><img src='/mail_images/blcurv.gif' height='83' width='18' /></td>
<td width='664px' style='background-image:url(/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
<td width='18px'><img src='/mail_images/brcurv.gif' height='83' width='18' /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#e6e6e6'>
<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
<tr height='20px'>
<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='/mail_images/facebook.gif' /></a></td>
<td><p>Link us on Facebook</p></td>
<td><<a href='https://twitter.com/#!/calcipe' target='_blank'>img src='/mail_images/tweeter.gif' /></a></td>
<td><p>Follow us on Twitter</p></td>
<td width='450px'>&nbsp;</td>
</tr>
<tr>
<td height='19' colspan='5'  style='margin:0'><img src='/mail_images/hr.gif' /></td>
</tr>
<tr>
<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
</tr>


</table>
<tr>

</table>
</table>
</td>
</tr>
</table>
</body>
</html>";
					$this->email->from('info@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Updated Calcipe Plan');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
//					return $this->db->affected_rows();
					return TRUE;
			
//		}
//		else
//		{
//			$valid_from  = date("Y-m-d",strtotime("+30 days"));
//			$valid_to  = date($valid_from,strtotime("+30 days"));
//			$query3 = $this->db->query("INSERT INTO `plan_change_request` (`user_id` ,`id_plan` ,`request_date` ,`valid_from` ,`valid_to` ,`status`)VALUES ('".$this->session->userdata('user_id')."', '".date("Y-m-d")."', '$valid_date', '', '', '')");
//
//		}
//					return FALSE;
			
	}
	function reniew_plan()
	{
		
			$valid_date  = date("Y-m-d",strtotime("+30 days"));
			$this->db->set('valid_upto', $valid_date);
			$this->db->set('total_amt', $this->input->post('reniew_amt_inr'));
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('user');
			
		    $new_reniew_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'reniew_date' => date("Y-m-d"),
			'reniew_amount' => $this->input->post('reniew_amt_inr') ,
			'level' => $this->input->post('reniew_level'),
			'reniew_status' => 'Monthly Reniew' );	
			$insert1 = $this->db->insert('reniew_history', $new_reniew_data);
//			echo $this->db->last_query();exit;

		 $this->load->library('email');
				$mailbox=$this->input->post('username');
				$firstname=$this->input->post('firstname');
			if($mailbox!='')
			{
					$message="<html>
<head>
<style type='text/css'>
h2, p
{
	font-family:Arial, Helvetica, sans-serif;
	padding:0px 10px 0px 10px
}

p
{
	font-size:13px;
	color:#666666;
}
</style>
</head>

<body bgcolor='#000000'>
<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
<tr>
<td>
<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
<tr>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/tlcurve.gif' /></td>
<td width='332px' height='123px'><img src='/mail_images/logo2.gif' /></td>
<td width='332px' height='123px' style='text-align:right;'><img src='/mail_images/mob2.gif' /></td>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/trcurve.gif' /></td>
</tr>


</table>
</td>
</tr>
<tr>
<tr>
<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>&nbsp;</p></td>
</tr>
<tr>
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Hello $firstname,<br> You have Renewed Your Plan <br />
    <br />
    <strong>Regards,</strong><br />
  <strong>Admin</strong></p>

</td>
</tr>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
<tr>
<td width='18px'><img src='/mail_images/blcurv.gif' height='83' width='18' /></td>
<td width='664px' style='background-image:url(/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
<td width='18px'><img src='/mail_images/brcurv.gif' height='83' width='18' /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#e6e6e6'>
<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
<tr height='20px'>
<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='/mail_images/facebook.gif' /></a></td>
<td><p>Link us on Facebook</p></td>
<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='/mail_images/tweeter.gif' /></a></td>
<td><p>Follow us on Twitter</p></td>
<td width='450px'>&nbsp;</td>
</tr>
<tr>
<td height='19' colspan='5'  style='margin:0'><img src='/mail_images/hr.gif' /></td>
</tr>
<tr>
<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
</tr>


</table>
<tr>

</table>
</table>
</td>
</tr>
</table>
</body>
</html>";
					$this->email->from('info@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Updated Calcipe Plan');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
					return TRUE;
			
			
	}
	function check_password()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('old_password')));
		$query = $this->db->get();
//				print_r($this->db->last_query());exit;
		$num=$query->num_rows();
		if($num>0)
		{
			$this->db->set('password', md5($this->input->post('password')));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('user_id', $this->session->userdata('user_id'));
			
			$this->db->update('user');
			//echo $this->db->last_query();exit;
			return $this->db->affected_rows();
		}
		else
		{
			return $num;
		}
	}
	function edit($id)
	{
		$this->db->select('*');
		$this->db->from('recipe');
		$this->db->where('recipe.user_id', $this->session->userdata('user_id'));
		$this->db->where('recipe.recipe_id', $id);
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function edit_recipe($id)
	{
//			print_r($this->input->post());exit;
			//$this->Gallery_model->do_upload();		
			//$image = array('upload_data' => $this->upload->data());
			if (!empty($_FILES['userfile']['name']))
        {

//                    unlink(realpath('images/thumbs').'/'.$this->input->post('T3'));
//                    unlink(realpath('images').'/'.$this->input->post('T3'));
			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			$new_filename=$this->input->post('T3');
			
		}
			list($met_val, $metric) = explode(',', $this->input->post('wtpp'));
			$this->db->set('name', $this->input->post('recipe_name'));
			$this->db->set('description', $this->input->post('short_desc'));
			$this->db->set('image', $new_filename);
			$this->db->set('procedure', $this->input->post('long_desc'));
			$this->db->set('quantity', $this->input->post('tot_qty'));
			$this->db->set('gradient_price', $this->input->post('tot_amt'));
			$this->db->set('weight', $this->input->post('rcp_weight'));
			$this->db->set('food_loss', $this->input->post('food_loss'));
			$this->db->set('Finished_weight', $this->input->post('finished_weight'));
			$this->db->set('Weight_portion', $this->input->post('weight'));
			$this->db->set('weight_in_metric', $this->input->post('temp_weight'));
			$this->db->set('weight_metric', $metric);
			$this->db->set('cost_per_piece', $this->input->post('per_pc_cost'));
			$this->db->set('total_number', $this->input->post('numbers'));
			$this->db->set('yield', $this->input->post('yield'));
			$this->db->set('profit', $this->input->post('profit'));
			$this->db->set('infrastructure_cost', $this->input->post('infrastructure_cost'));
			$this->db->set('selling_price', $this->input->post('selling_price'));
			$this->db->set('kilo_price', $this->input->post('per_kg_cost'));
			$this->db->set('updated_date', date("Y-m-d"));
			$this->db->set('progress_status', $this->input->post('progress_status'));
			$this->db->set('progress_value', $this->input->post('progress_val'));

			$this->db->where('recipe_id', $this->input->post('rcpId'));
			
			$this->db->update('recipe');
//			echo $this->db->last_query();exit;
			$this->db->delete('gradients', array('recipe_id' => $this->input->post('rcpId')));
    $tot_row = $this->input->post('tot_row');
    $tot_qty = $this->input->post('tot_qty');
    $tot_amt = $this->input->post('tot_amt');
	$ingRow = $this->input->post('ingRow');
	$qtyRow = $this->input->post('qtyRow');
	$rateRow = $this->input->post('rateRow');
	$amtRow = $this->input->post('amtRow');
	$unitRow = $this->input->post('unitRow');
	$measureRow = $this->input->post('measureRow');
	$gId = $this->input->post('gId');
	$rId = $this->input->post('rId');
for($i=0; $i<sizeof($ingRow); $i++){

		    $new_gradient_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'recipe_id' => $id,
			'id_gredient' => $gId[$i],
			'id_recipe' => $rId[$i],
			'name' => $ingRow[$i],
			'quantity' => $qtyRow[$i],
			'unit' => $unitRow[$i],
			'measure' => $measureRow[$i],
			'price' => $rateRow[$i],
			'amount' => $amtRow[$i],
			'created_date' => date('Y-m-d'),
			'updated_date' => date('Y-m-d'),
			'status' => 1);						
			$insert1 = $this->db->insert('gradients', $new_gradient_data);


//			$this->db->set('recipe_id', $id);
/*			$this->db->set('name', $ingRow[$i]);
			$this->db->set('quantity', $qtyRow[$i]);
			$this->db->set('unit', $unitRow[$i]);
			$this->db->set('measure', $measureRow[$i]);
			$this->db->set('price', $rateRow[$i]);
			$this->db->set('amount', $amtRow[$i]);
			$this->db->set('updated_date', date('Y-m-d'));

			$this->db->where('recipe_id', $id);
			$this->db->where('id_gredient', $gId[$i]);
			
			$this->db->update('gradients');
*/				
//print_r($this->db->last_query());

}
	
		return $this->db->affected_rows();
	}
	function delete_row()
	{
			$del_flag = 0;
             
                    $query       =  $this->db->get_where('recipe',array('recipe_id' => $this->uri->segment(3)));
             if( $query->num_rows() > 0 )
                 {
                    $row       = $query->row();
                    $picture = $row->image;
             $this->db->delete('recipe', array('recipe_id' => $this->uri->segment(3)));
             $this->db->delete('gradients', array('recipe_id' => $this->uri->segment(3)));
                    unlink(realpath('images/thumbs').'/'.$picture);
                    unlink(realpath('images').'/'.$picture);
                    $del_flag ++;
                 }
             return $del_flag;    
	}
	function get_message()
	{
		$this->db->select('*');
		$this->db->from('message_board');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('status', 'Active');
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function close_msg()
	{
		if($this->input->post('type')=="All")
		{
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->delete('message_board'); 
		}
		else
		{
//			$this->db->where('user_id', $this->session->userdata('user_id'));
//			$this->db->where('message_type', $this->input->post('type'));
//			$this->db->delete('message_board'); 
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('id_message', $this->input->post('msgId'));
			$this->db->delete('message_board'); 
		}
//				print_r($this->db->last_query());
		return 'TRUE';	
	}
	function chk_profile()
	{
		$query3 = $this->db->query("SELECT * FROM `user` WHERE `user_id` =".$this->session->userdata('user_id')."
		                            AND (`first_name` = ''
									OR `last_name` = ''
									OR `contact_no` = ''
									OR `address1` = ''
									OR `state_name` = ''
									OR `city_name` = ''
									)");
//				print_r($this->db->last_query());exit;
		
		if ($query3->num_rows() > 0)
		{
			return 'TRUE';	
		}   
		else
		{
			return 'FALSE';	
		} 
	}
	function checkPassword(){
		$query = $this->db->query("SELECT first_name,last_name,username FROM user WHERE username='".$this->input->post("username1")."'");
		$rs=$query->result_array();
		if ($query->num_rows() > 0)
		{
				$chars = '0123456789abcdefghjkmnoprstvwxyz@#';
				
				$Code  = '';
				// Generate code
				for ($i = 0; $i < 8; ++$i)
				{
				$Code .= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
				}
//				$this->db->set('password', md5("Cal02@56"));
	
				$this->db->set('password', md5($Code));
				$this->db->where('username', $this->input->post("username1"));
				$this->db->update('user');
	//Send Mail			
		 $this->load->library('email');
				$mailbox=$rs[0]['username'];
				$firstname=$rs[0]['first_name'];
				$lastname=$rs[0]['last_name'];
			if($mailbox!='')
			{
					$message="<html>
<head>
<style type='text/css'>
h2, p
{
	font-family:Arial, Helvetica, sans-serif;
	padding:0px 10px 0px 10px
}

p
{
	font-size:13px;
	color:#666666;
}
</style>
</head>

<body bgcolor='#000000'>
<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
<tr>
<td>
<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
<tr>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/tlcurve.gif' /></td>
<td width='332px' height='123px'><img src='/mail_images/logo2.gif' /></td>
<td width='332px' height='123px' style='text-align:right;'><img src='/mail_images/mob2.gif' /></td>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/trcurve.gif' /></td>
</tr>


</table>
</td>
</tr>
<tr>
<tr>
<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>&nbsp;</p></td>
</tr>
<tr>
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Dear ".$firstname." ".$lastname.",\n
			To reset your Calcipe.com Membership password, please note your new password sent in this mail. Request you to change your password in your next login.\n
			Username: <strong>".$rs[0]['username']."</strong>\n
			Password: <strong>$Code</strong>\n
			\n
			For additional assistance, please write a mail to admin@calcipe.com \n</p>

</td>
</tr>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
<tr>
<td width='18px'><img src='/mail_images/blcurv.gif' height='83' width='18' /></td>
<td width='664px' style='background-image:url(/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
<td width='18px'><img src='/mail_images/brcurv.gif' height='83' width='18' /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#e6e6e6'>
<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
<tr height='20px'>
<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='/mail_images/facebook.gif' /></a></td>
<td><p>Link us on Facebook</p></td>
<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='/mail_images/tweeter.gif' /></a></td>
<td><p>Follow us on Twitter</p></td>
<td width='450px'>&nbsp;</td>
</tr>
<tr>
<td height='19' colspan='5'  style='margin:0'><img src='/mail_images/hr.gif' /></td>
</tr>
<tr>
<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
</tr>


</table>
<tr>

</table>
</table>
</td>
</tr>
</table>
</body>
</html>";
					$this->email->from('admin@calcipe.com','Calcipe Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Urgent: Calcipe - Change of password');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
		return TRUE;
		}
		else
		{
		return FALSE;
		}
	}
	function limitSettings(){
		$this->db->select('*');
		$this->db->from('recipe_limits');
//		$this->db->where('id_banner', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());exit;
		return $query->result();
	}
	function plansSettings(){
		$this->db->select('*');
		$this->db->from('plans');
//		$this->db->where('id_banner', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());exit;
		return $query->result();
	}
	function send_request()
	{
		
			$new_reniew_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'add_date' => date("Y-m-d"),
			'title' => $this->input->post('msgtitle') ,
			'status' => 'Not Replied',
			'message' => $this->input->post('textMessage'),
			'user_email' => $this->session->userdata('username') );	
			$insert1 = $this->db->insert('request_history', $new_reniew_data);
//			echo $this->db->last_query();exit;

		 $this->load->library('email');
//				$mailbox="ibcablr@gmail.com ";
				$mailbox="support@calcipe.com";
			if($mailbox!='')
			{
					$message="<table align='center' border='0' cellpadding='0' cellspacing='0' width='750'>
				  <tbody>
				  <tr>
					<td width='546' colspan='2'>Hello Admin<br> One of the Registered send a Help Request.<br> So Please Check the Request in Admin Panel</td>
				  </tr>
				</tbody></table>";
					$this->email->from($this->session->userdata('username'),'Registerd Member');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('New Help Request');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
					return TRUE;
			
	}
	function delete_account()
	{
			$del_flag = 0;
             
                    $query       =  $this->db->get_where('user',array('user_id' => $this->session->userdata('user_id')));
             if( $query->num_rows() > 0 )
                 {
                    $row       = $query->row();
                    $picture = $row->photo;
	///
		if($this->input->post('chk')=='Reason 4'){$msg=$this->input->post('reason');}else{$msg=$this->input->post('chk');}
		$close_details = array(
			'user_id' => $row->user_id,
			'reason' => $msg,
		);
		$this->db->insert('close_detail', $close_details);
//					echo $this->db->last_query();exit;

	// Mail Script
		 $this->load->library('email');
				$mailbox=$row->username;
				$firstname=$row->first_name;
				$lastname=$row->last_name;
			if($mailbox!='')
			{
					$message="<html>
<head>
<style type='text/css'>
h2, p
{
	font-family:Arial, Helvetica, sans-serif;
	padding:0px 10px 0px 10px
}

p
{
	font-size:13px;
	color:#666666;
}
</style>
</head>

<body bgcolor='#000000'>
<table width='700px' height='367' cellpadding='0' cellspacing='0' align='center' bgcolor='#FFFFFF' >
<tr>
<td>
<table cellpadding='0' width='100%' height='100%' bgcolor='#0576c6' cellspacing='0' align='center'>
<tr>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/tlcurve.gif' /></td>
<td width='332px' height='123px'><img src='/mail_images/logo2.gif' /></td>
<td width='332px' height='123px' style='text-align:right;'><img src='/mail_images/mob2.gif' /></td>
<td width='18px' height='123px' style='text-align:right; vertical-align:top;'><img src='/mail_images/trcurve.gif' /></td>
</tr>


</table>
</td>
</tr>
<tr>
<tr>
<td bgcolor='#dededd' align='right' height='40px' style='color:#007432; border-top:2px solid #333;'><p style='font-size:20px; font-weight:bold; margin:0; color:#009933;'>&nbsp;</p></td>
</tr>
<tr>
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>Dear User</p>
  <p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>You Have Successfully Close Your Account($mailbox)</p>

</td>
</tr>
<tr>
<td>
<table cellpadding='0' cellspacing='0' align='center' width='100%' height='100%'>
<tr>
<td width='18px'><img src='/mail_images/blcurv.gif' height='83' width='18' /></td>
<td width='664px' style='background-image:url(/mail_images/bg.gif); background-repeat:repeat-x; background-position:center;'>&nbsp;</td>
<td width='18px'><img src='/mail_images/brcurv.gif' height='83' width='18' /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor='#e6e6e6'>
<table width='700px' cellpadding='0' cellspacing='0' style='margin:0px'>
<tr height='20px'>
<td style='padding-left:10px;'><a href='https://www.facebook.com/pages/Calcipe/231668930231824' target='_blank'><img src='/mail_images/facebook.gif' /></a></td>
<td><p>Link us on Facebook</p></td>
<td><a href='https://twitter.com/#!/calcipe' target='_blank'><img src='/mail_images/tweeter.gif' /></a></td>
<td><p>Follow us on Twitter</p></td>
<td width='450px'>&nbsp;</td>
</tr>
<tr>
<td height='19' colspan='5'  style='margin:0'><img src='/mail_images/hr.gif' /></td>
</tr>
<tr>
<td height='16' colspan='5' style='margin:0'><p>Unsubscribe | Privacy Policy<br />For support requests, please contact us by going to our support page.</p></td>
</tr>


</table>
<tr>

</table>
</table>
</td>
</tr>
</table>
</body>
</html>";
					$this->email->from('support@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox,$firstname.' '. $lastname);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Successfully Closed Account');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
				$mailbox1="support@calcipe.com";
				$firstname1=$row->first_name;
				$lastname1=$row->last_name;
			if($mailbox!='')
			{
					$message="One User($mailbox) Closed His Account";
					$this->email->from('support@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox1,$firstname1.' '. $lastname1);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('Successfully Closed Account');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
	
	//MAil Script End		
	
	///				
					
					
					
					
				$this->db->set('status', "Deleted");
				$this->db->set('deleted_by', "User");
	
				$this->db->where('user_id', $this->session->userdata('user_id'));
				
				$this->db->update('user');
 //            $this->db->delete('user', array('recipe_id' => $this->uri->segment(3)));
//                    unlink(realpath('images').'/'.$picture);
                    $del_flag ++;
                 }
             return $del_flag;    
	}
	
}