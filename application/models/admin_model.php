<?php

class Admin_model extends CI_Model {

	function get_records($num, $offset,$cond,$cond1)
	{
		$this->db->where('status', $cond);
		if($cond1!='')
		{
		$this->db->where('deleted_by', $cond1);
		}
		$query = $this->db->get('user', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());
//				echo '</i>';
		return $query->result();
	}
	function metainfo()
	{
		$query = $this->db->get('meta_information');
		return $query->result();
	}
	function get_AllRecipes($num, $offset,$cond)
	{
		$this->db->where('status', $cond);
		$query = $this->db->get('recipe', $num, $offset);
				//echo '<i>';
//				print_r($this->db->last_query());
//				echo '</i>';
		return $query->result();
	}
	function get_num_recipes($cond)
	{
		$this->db->where('status', $cond);
		$query = $this->db->get('recipe')->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_num_ingredients($cond)
	{
		$this->db->distinct();
		$this->db->select('name');
		$this->db->where('status', $cond);
		$query = $this->db->get('gradients_list')->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_num_users($cond,$cond1)
	{
		$this->db->select('*');
		$this->db->where('status', $cond);
		if($cond1!='')
		{
		$this->db->where('deleted_by', $cond1);
		}
		$query = $this->db->get('user')->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_num_helps()
	{
		$this->db->select('*');
		$this->db->from('request_history');
		$this->db->where('status !=', 'Deleted');
		$this->db->order_by('reply_date');
		$query = $this->db->get()->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_AllGredient($num, $offset,$cond)
	{
		$this->db->distinct();
		$this->db->select('name');
		$this->db->where('status', $cond);
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get('gradients_list', $num, $offset);
//$query = $this->db->query("SELECT DISTINCT(name) FROM gradients ORDER BY name");
				//echo '<i>';
//				print_r($this->db->last_query());
//				echo '</i>';
		return $query->result();
	}
	function get_num_Searchrecords($num, $offset,$cond,$txt,$type)
	{
		$this->db->select('*');
		$this->db->or_like('name', $txt);
//		$this->db->where('status', $cond);
		$query = $this->db->get($type, $num, $offset)->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_num_SearchRecipes($num, $offset,$cond,$txt,$type)
	{
		$this->db->select('*');
		$this->db->or_like('first_name', $txt);
		$this->db->or_like('last_name', $txt); 
		$this->db->or_like('email', $txt); 
		$this->db->where('status', $cond);
		$query = $this->db->get($type, $num, $offset)->num_rows();
//				print_r($this->db->last_query());exit;
		return $query;
	}
	function get_Searchrecords($num, $offset,$cond,$txt,$type)
	{
		if($type=="user"){
		$this->db->or_like('first_name', $txt);
		$this->db->or_like('last_name', $txt); 
		$this->db->or_like('email', $txt); 
		$this->db->where('status', $cond);
		$query = $this->db->get($type, $num, $offset);
		return $query->result();
		}
		if($type=="All"){
			$ftable=array();
		$this->db->or_like('first_name', $txt);
		$this->db->or_like('last_name', $txt); 
		$this->db->or_like('email', $txt); 
		$this->db->where('status', $cond);
		$query = $this->db->get('user', $num, $offset);
		$ftable[0]=$query->result();
		$this->db->or_like('name', $txt);
//		$this->db->where('status', $cond);
		$query1 = $this->db->get('recipe', $num, $offset);
		$ftable[1]=$query1->result();
//				print_r($this->db->last_query());exit;
		return $ftable;
		}
		else{
		$this->db->or_like('name', $txt);
//		$this->db->where('status', $cond);
		$query = $this->db->get($type, $num, $offset);
		return $query->result();
		}
				//echo '<i>';
//				print_r($this->db->last_query());exit;
//				echo '</i>';
	}
	function get_userName($id)
	{
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('user_id', $this->uri->segment(3));
		$query = $this->db->get();
		//$query = $this->db->query("SELECT `username` FROM (`user`) WHERE `user_id` = ".$this->uri->segment(3));
//				print_r($this->db->last_query());
		$row = $query->row(); 
		return $row->username;
//		return $query->result();
	}
	function get_user($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $this->uri->segment(3));
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function edit($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $this->uri->segment(3));
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function edit_plan($id)
	{
		$this->db->select('*');
		$this->db->from('plans');
		$this->db->where('id_plan', $this->uri->segment(3));
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function recipe($id)
	{
		$this->db->select('*');
		$this->db->from('recipe');
		$this->db->where('recipe_id', $this->uri->segment(3));
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function get_gradients($id)
	{
		$this->db->select('*');
		$this->db->from('gradients');
		$this->db->where('gradients.user_id', $this->uri->segment(3));
		$this->db->where('gradients.recipe_id', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function get_recipe_photos($id)
	{
		$this->db->select('*');
		$this->db->from('recipe_photoes');
//		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('recipe_id', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function msgBoard($id)
	{
		$this->db->select('*');
		$this->db->from('message_board');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
//				print_r($this->db->last_query());
		return $query->result();
	}
	function getRequest($id)
	{
		$this->db->select('*');
		$this->db->from('request_history');
		$this->db->where('id_request', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function get_gradients1($id,$userid)
	{
		$this->db->select('*');
		$this->db->from('gradients');
		$this->db->where('user_id', $userid);
		$this->db->where('recipe_id', $id);
		$query = $this->db->get();
	//			print_r($this->db->last_query());
		return $query->result();
	}
	function bannerAd()
	{
		$this->db->select('*');
		$this->db->from('banner_ad');
		switch($this->uri->segment(3))
		{
			case "Advertisement":
		$this->db->where('type', "Advertisement");
			  break;
			case "Event":
		$this->db->where('type', "Event");
			  break;
			case "GoogleAd":
		$this->db->where('type', "GoogleAd");
			  break;
			  default:
		$this->db->where('type', "Advertisement");
		break;
		}
//		$this->db->where('user_id', $id);
		$query = $this->db->get();
//				print_r($this->db->last_query());exit;
		return $query->result();
	}
	function helpRequest($num, $offset)
	{
		$this->db->select('*');
//		$this->db->from('request_history');
		$this->db->where('status !=', 'Deleted');
		$this->db->order_by('reply_date');
		$query = $this->db->get('request_history',$num, $offset);
//				print_r($this->db->last_query());exit;
		return $query->result();
	}
	function add_message($id)
	{
//			print_r($this->input->post());exit;
			$this->Gallery_model->do_upload();		
				  $image_name="";
			if ($this->upload->data())
			  {
				$image = array('upload_data' => $this->upload->data());
				$image_name=$image['upload_data']['file_name'];
			  } 
			  else
			  {
				  $image_name="noimage.jpeg";
			  }
$date_from=$this->input->post('from_yy')."-".$this->input->post('from_mm')."-".$this->input->post('from_dd');
$date_to=$this->input->post('to_yy')."-".$this->input->post('to_mm')."-".$this->input->post('to_dd');
$msgType=$this->input->post('msgType');
if($msgType=="Image"){
$textMessage=$image_name;
}else{
$textMessage=$this->input->post('textMessage');
}

		$new_message = array(
			'user_id' => $this->input->post('UserId'),
			'message_title' => $this->input->post('msgtitle'),
			'message_type' => $this->input->post('msgType'),
			'message' => $textMessage,
			'date_from' => $date_from,
			'date_to' => $date_to,
			'status' => $this->input->post('status'));	
			$insert = $this->db->insert('message_board', $new_message);
//				print_r($this->db->last_query());exit;
			return $this->input->post();
	}
	function edit_message($id)
	{
//			print_r($this->input->post());exit;
			$this->Gallery_model->do_upload();		
				  $image_name="";
			if ($this->upload->data())
			  {
				$image = array('upload_data' => $this->upload->data());
				$image_name=$image['upload_data']['file_name'];
			  } 
			  else
			  {
				  $image_name="noimage.jpeg";
			  }
$date_from=$this->input->post('from_yy')."-".$this->input->post('from_mm')."-".$this->input->post('from_dd');
$date_to=$this->input->post('to_yy')."-".$this->input->post('to_mm')."-".$this->input->post('to_dd');
$msgType=$this->input->post('msgType');
if($msgType=="Image"){
$textMessage=$image_name;
}else{
$textMessage=$this->input->post('textMessage');
}

			$this->db->set('message_title', $this->input->post('msgtitle'));
			$this->db->set('message_type', $this->input->post('msgType'));
			$this->db->set('message', $this->input->post('textMessage'));
			$this->db->set('date_from', $date_from);
			$this->db->set('date_to', $date_to);
			$this->db->set('status', $this->input->post('status'));
			$this->db->where('id_message', $this->input->post('UserId'));
			
			$this->db->update('message_board');
//				print_r($this->db->last_query());exit;
			return $this->input->post();
	}
	function add_ads($id)
	{
//			print_r($this->input->post());exit;
			$this->Gallery_model->do_upload();		
				  $image_name="";
			if ($this->upload->data())
			  {
				$image = array('upload_data' => $this->upload->data());
				$image_name=$image['upload_data']['file_name'];
			  } 
			  else
			  {
				  $image_name="";
			  }
			  $date1=explode("/",$this->input->post('from_date'));
			  $date2=explode("/",$this->input->post('to_date'));
//$date_from=$this->input->post('from_yy')."-".$this->input->post('from_mm')."-".$this->input->post('from_dd');
//$date_to=$this->input->post('to_yy')."-".$this->input->post('to_mm')."-".$this->input->post('to_dd');
$date_from=$date1[2].$date1[0].$date1[1];
$date_to=$date2[2].$date2[0].$date2[1];
$msgType=$this->input->post('msgType');
		$new_message = array(
			'caption' => $this->input->post('msgtitle'),
			'type' => $this->input->post('msgType'),
			'section' => $this->input->post('sections'),
			'category' => $this->input->post('txt_category'),
			'open_new' => $this->input->post('msgType'),
			'url' => $this->input->post('ad_url'),
			'file_ad' => $image_name,
			'open_new' => $this->input->post('new_wind'),
			'script_banner' => $this->input->post('sel_script'),
			'script' => $this->input->post('textMessage'),
			'date_from' => $date_from,
			'date_to' => $date_to,
			'status' => $this->input->post('status'));	
			$insert = $this->db->insert('banner_ad', $new_message);
//				print_r($this->db->last_query());exit;
			return $this->input->post();
	}
	function edit_ads($id)
	{
//			print_r($this->input->post());exit;
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
			  $date1=explode("/",$this->input->post('from_date'));
			  $date2=explode("/",$this->input->post('to_date'));
//$date_from=$this->input->post('from_yy')."-".$this->input->post('from_mm')."-".$this->input->post('from_dd');
//$date_to=$this->input->post('to_yy')."-".$this->input->post('to_mm')."-".$this->input->post('to_dd');
$date_from=$date1[2].$date1[0].$date1[1];
$date_to=$date2[2].$date2[0].$date2[1];
$msgType=$this->input->post('msgType');
			
			$this->db->set('caption', $this->input->post('msgtitle'));
			$this->db->set('type', $this->input->post('msgType'));
			$this->db->set('section', $this->input->post('sections'));
			$this->db->set('category', $this->input->post('txt_category'));
			$this->db->set('open_new', $this->input->post('new_wind'));
			$this->db->set('url', $this->input->post('ad_url'));
			$this->db->set('script_banner', $this->input->post('sel_script'));
			$this->db->set('script', $this->input->post('textMessage'));
			$this->db->set('file_ad', $new_filename);
			$this->db->set('date_from', $date_from);
			$this->db->set('date_to', $date_to);
			$this->db->set('status', $this->input->post('status'));
			$this->db->where('id_banner', $this->input->post('banner_id'));
			
			$this->db->update('banner_ad');
//				print_r($this->db->last_query());exit;
			return $this->input->post();
	}
	function retrieve_messagebrd($id){
		$this->db->select('*');
		$this->db->from('message_board');
		$this->db->where('id_message', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());exit;
		return $query->result();
	}
	function retrieve_ad($id){
		$this->db->select('*');
		$this->db->from('banner_ad');
		$this->db->where('id_banner', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());exit;
		return $query->result();
	}
	function send_mail($id)
	{
//			print_r($this->input->post());exit;
			$subject=$this->input->post('msgtitle');	
			 $this->load->library('email');
				$mailbox=$this->input->post('msgto');
//				$firstname=$this->input->post('first_name');
//				$lastname=$this->input->post('last_name');
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
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>".
$this->input->post('textMessage')."<br />
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
<td style='padding-left:10px;'><img src='/mail_images/facebook.gif' /></td>
<td><p>Link us on Facebook</p></td>
<td><img src='/mail_images/tweeter.gif' /></td>
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
//					$message=$this->input->post('textMessage');
					$this->email->from('admin@calcipe.com','Calcipe Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject($subject);
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
//				print_r($this->db->last_query());exit;
			return $this->input->post();
	}
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
			
			$this->db->set('first_name', $this->input->post('first_name'));
			$this->db->set('middle_name', $this->input->post('middle_name'));
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
			$this->db->set('language', $this->input->post('lang'));
			$this->db->set('profit', $this->input->post('profit'));
			$this->db->set('currency', $this->input->post('currency'));
			$this->db->set('weight_per_portion', $this->input->post('weight_per_portion'));
			$this->db->set('food_loss', $this->input->post('food_loss'));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('user_id', $this->input->post('UserId'));
			
			$this->db->update('user');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function edit_password()
	{
		
			$this->db->set('password', md5($this->input->post('new_password')));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('user_id', $this->input->post('UserId'));
			
			$this->db->update('user');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function update_metadata()
	{
		
			$this->db->set('title', $this->input->post('title'));
			$this->db->set('meta_keyword', $this->input->post('keywords'));

			$this->db->where('meta_description', $this->input->post('description'));
			
			$this->db->update('meta_information');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function update_plan()
	{
		
			if (!empty($_FILES['userfile']['name']))
        {

			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			if($this->input->post('T3')<>'')
			{
				$new_filename=$this->input->post('T3');
			}
			else
			{
				$new_filename="noimage.jpeg";
			}
			
		}
			$this->db->set('image', $new_filename);
			$this->db->set('caption', $this->input->post('plan_caption'));
			$this->db->set('level_type', $this->input->post('level_type'));
			$this->db->set('price_INR', $this->input->post('price_inr'));
			$this->db->set('price_USD', $this->input->post('price_usd'));
//			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('id_plan', $this->input->post('PlanId'));
			
			$this->db->update('plans');
                    unlink(realpath('images/thumbs').'/'.$this->input->post('T3'));
                    unlink(realpath('images').'/'.$this->input->post('T3'));
//			echo $this->db->last_query();exit;
		return $this->db->affected_rows();
	}
	function delete_row()
	{
			$del_flag = 0;
             
                    $query       =  $this->db->get_where('user',array('user_id' => $this->uri->segment(3)));
             if( $query->num_rows() > 0 )
                 {
                    $row       = $query->row();
                    $picture = $row->photo;
				$this->db->set('status', "Deleted");
				$this->db->set('deleted_by', "Admin");
	
				$this->db->where('user_id', $this->uri->segment(3));
				
				$this->db->update('user');
 //            $this->db->delete('user', array('recipe_id' => $this->uri->segment(3)));
                    unlink(realpath('images').'/'.$picture);
                    $del_flag ++;
                 }
             return $del_flag;    
	}
	function delete_recipe()
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
	function delete_ad()
	{
			$del_flag = 0;
             
                    $query       =  $this->db->get_where('banner_ad',array('id_banner' => $this->uri->segment(3)));
//			echo $this->db->last_query();exit;
             if( $query->num_rows() > 0 )
                 {
                    $row       = $query->row();
                    $picture = $row->file_ad;
             $this->db->delete('banner_ad', array('id_banner' => $this->uri->segment(3)));
                    unlink(realpath('images/thumbs').'/'.$picture);
                    unlink(realpath('images').'/'.$picture);
                    $del_flag ++;
                 }
             return $del_flag;    
	}
	function block_recipe()
	{
		
			$this->db->set('status', 'Blocked');
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('recipe_id', $this->uri->segment(3));
			
			$this->db->update('recipe');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function unblock_recipe()
	{
		
			$this->db->set('status', 'Active');
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('recipe_id', $this->uri->segment(3));
			
			$this->db->update('recipe');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
	}
	function change_plan()
	{
		
			$query3 = $this->db->query("SELECT valid_upto,member_type FROM user WHERE user_id=".$this->input->post('hdn_userid'));
			if ($query3->num_rows() > 0)
			{
				$row3 = $query3->row_array(); 
			//	print_r($row3);
				$valid_upto =$row3['valid_upto'];
			}
			$query_rcp_limit = $this->db->query("SELECT max_recipe,multi_recipe_storage FROM recipe_limits WHERE recipe_value=".$this->input->post('plan_name'));
			if ($query_rcp_limit->num_rows() > 0)
			{
				$row_rcp_limit = $query_rcp_limit->row_array(); 
			}
			$query_rcp_cnt = $this->db->query("SELECT * FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status='Active' AND multi_recipe='False'");
			$row_rcp_cnt=$query_rcp_cnt->num_rows();
			$query_rcp_cnt_multi = $this->db->query("SELECT * FROM recipe WHERE user_id=".$this->input->post('hdn_userid'). " AND status='Active' AND multi_recipe='True' ");
			$row_rcp_cnt_multi=$query_rcp_cnt_multi->num_rows();
			if($row_rcp_cnt>=0)
			{
				
				if($row_rcp_cnt>$row_rcp_limit['max_recipe'])
				{
					$limit=$row_rcp_cnt-$row_rcp_limit['max_recipe'];
					//  Delete Recipe
				//$query_rcp_cnt = $this->db->query("UPDATE recipe SET status='TempBlocked' WHERE user_id=".$this->session->userdata('user_id')." ORDER BY created_date DESC  LIMIT $limit");
				$del_flag = 0;
//				 echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status='Active'  AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit"; exit;
				$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status='Active'  AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit ");
				if ($query_num->num_rows() > 0)
				{
					foreach ($query_num->result() as $row_num)
					{
						$valid_upto =$row_num->recipe_id;
							$query       =  $this->db->get_where('recipe',array('recipe_id' => $row_num->recipe_id));
						 if( $query->num_rows() > 0 )
							 {
								$row       = $query->row();
	/*							$picture = $row->image;
						 $this->db->delete('recipe', array('recipe_id' => $row_num->recipe_id));
						 $this->db->delete('gradients', array('recipe_id' => $row_num->recipe_id));
								unlink(realpath('images/thumbs').'/'.$picture);
								unlink(realpath('images').'/'.$picture);
	*/	
								$this->db->set('status', 'TempBlocked');
								$this->db->set('updated_date', date("Y-m-d"));
					
	//							$this->db->where('user_id', $this->session->userdata('user_id'));
								$this->db->where('recipe_id', $row_num->recipe_id);
								
								$this->db->update('recipe');
								$del_flag ++;
							 }
					}
					
				}
	//			echo $this->db->last_query();exit;
				}
				else
				
				{
					//echo "Dont Delete Recipe";
					$limit=$row_rcp_limit['max_recipe'];
	//				echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status!='Blocked' AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit";exit;
						$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status!='Blocked' AND multi_recipe='False' ORDER BY created_date DESC LIMIT $limit");
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
							
										$this->db->where('recipe_id', $row_num->recipe_id);
										
										$this->db->update('recipe');
									 }
							}
							
						}
				}
			}
			if($row_rcp_cnt_multi>=0)
			{
				if($row_rcp_cnt_multi>$row_rcp_limit['multi_recipe_storage'])
				{
					$limit=$row_rcp_cnt_multi-$row_rcp_limit['multi_recipe_storage'];
					//  Delete Recipe
				//$query_rcp_cnt = $this->db->query("UPDATE recipe SET status='TempBlocked' WHERE user_id=".$this->session->userdata('user_id')." ORDER BY created_date DESC  LIMIT $limit");
				$del_flag = 0;
//					echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status!='Blocked' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit";exit;
				$query_num_multi = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status='Active' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit");
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
					
								$this->db->where('user_id', $this->input->post('hdn_userid'));
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
//					echo "SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status!='Blocked' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit";exit;
						$query_num = $this->db->query("SELECT recipe_id  FROM recipe WHERE user_id=".$this->input->post('hdn_userid')." AND status!='Blocked' AND multi_recipe='True' ORDER BY created_date DESC LIMIT $limit");
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
							
										$this->db->where('user_id', $this->input->post('hdn_userid'));
										$this->db->where('recipe_id', $row_num->recipe_id);
										
										$this->db->update('recipe');
										$del_flag ++;
									 }
							}
							
						}
				   
				}
				
			}
			$valid_date  = date("Y-m-d",strtotime("+30 days"));
			$this->db->set('member_type', $this->input->post('plan_type'));
			$this->db->set('level', $this->input->post('plan_name'));
			$this->db->set('updated_date', date("Y-m-d"));
			$this->db->set('valid_upto', $valid_date);
			$this->db->set('total_amt', $this->input->post('plan_inr'));

			$this->db->where('user_id', $this->input->post('hdn_userid'));
			
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
<td style='padding-left:10px;'><img src='/mail_images/facebook.gif' /></td>
<td><p>Link us on Facebook</p></td>
<td><img src='/mail_images/tweeter.gif' /></td>
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
			
			
	}
	function reniew_plan()
	{
		
			$valid_date  = date("Y-m-d",strtotime("+30 days"));
			$this->db->set('valid_upto', $valid_date);
			$this->db->set('total_amt', $this->input->post('reniew_amt_inr'));
			$this->db->where('user_id', $this->input->post('hdn_userid'));
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
<td width='700px' height='16' valign='top' style='font-family:Verdana, Geneva, sans-serif; font-size:13px;'><p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'>
Hello $firstname,
You have Renewed Your Plan
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
<td style='padding-left:10px;'><img src='/mail_images/facebook.gif' /></td>
<td><p>Link us on Facebook</p></td>
<td><img src='/mail_images/tweeter.gif' /></td>
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
</html>
";
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
	function limitSettings(){
		$this->db->select('*');
		$this->db->from('recipe_limits');
//		$this->db->where('id_banner', $this->uri->segment(3));
		$query = $this->db->get();
	//			print_r($this->db->last_query());exit;
		return $query->result();
	}
		function change_banner()
	{
			$this->db->set('status', 'Active');
			$this->db->where('banner_type', $this->input->post('banner_val'));
			$this->db->update('banner_set');
			$this->db->set('status', 'Inactive');
			$this->db->where('banner_type !=', $this->input->post('banner_val'));
			$this->db->update('banner_set');
					return TRUE;
	}
		function set_settings($sett)
	{
			$this->db->set('status', $this->input->post('setting_val'));
			$this->db->where('setting_name', $sett);
			$this->db->update('settings_site');
					return TRUE;
	}
		function set_benefits()
	{
			for($i=1;$i<=4;$i++)
			{
				$this->db->set('add_recipe', $this->input->post('add_recipe_'.$i));
				$this->db->set('edit_recipe', $this->input->post('edit_recipe_'.$i));
				$this->db->set('multi_recipe', $this->input->post('multi_recipe_'.$i));
				$this->db->set('multi_recipe_storage', $this->input->post('multi_recipe_stor_'.$i));
				$this->db->set('recipe_print', $this->input->post('recipe_print_'.$i));
				$this->db->set('recipe_duplicate', $this->input->post('recipe_duplicate_'.$i));
				$this->db->set('recipe_pdf', $this->input->post('recipe_pdf_'.$i));
				$this->db->set('free_usage_validate', $this->input->post('usage_validity_'.$i));
				$this->db->set('add_ingredient', $this->input->post('add_ingredient_'.$i));
				$this->db->set('edit_ingredient', $this->input->post('edit_ingredient_'.$i));
				$this->db->set('service_ads', $this->input->post('service_ads_'.$i));
				$this->db->set('indent_calculation', $this->input->post('indent_calculation_'.$i));
				$this->db->where('id_limits', $i);
				$this->db->update('recipe_limits');
				//print_r($this->db->last_query());
			}
					return TRUE;
	}
}