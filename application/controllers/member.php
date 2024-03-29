<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller{

    private $data = array(
        'dir' => array(
            'original' => 'assets/users/original/',
            'thumb' => 'assets/users/thumbs/'
        ),
        'total' => 0,
        'images' => array(),
        'error' => ''
    );
    public function __construct(){
        parent::__construct();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
    }

     public function index()
    {
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Message form';
		$this->load->view('includes/header_login',$data);
		$this->load->view('login_view',$data);
		$this->load->view('includes/footer',$data);
    }
	function validate_credentials()
	{		
		$this->load->model('message_model');
		$query = $this->message_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			//print_r($query);
			$data = array(
				'username' => $query['username'],
				'firstname' => $query['firstname'],
				'user_id' => $query['user_id'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('site/dash_board');
//			redirect('site/members_area');
		}
		else // incorrect username or password
		{
//			$this->load->library('message');  
//			$this->message->set('Wrong Username or Password.', 'notice', TRUE);
            $this->session->set_flashdata('message', 'Oops, it seems your username or password is incorrect. <br>Please try again.');
	        redirect('home/index');
			//$this->index();
		}
	}	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('retype_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]');
		
		
		if($this->form_validation->run() == FALSE)
		{
//			$this->load->view('signup_success');
			$this->load->view('signup_form1');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'Congrats!!!';
				$this->load->view('signup_success', $data);
			}
			else
			{
				$this->load->view('signup_form1');			
			}
		}
		
	}
	function edit_profile()
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->select_profile())
		{
			$data['records'] = $query;
		}
//load the View and Show results
//		$this->load->view('includes/header_profile');
		$this->load->view('edit_profile',$data);
//		$this->load->view('edit_profile_2',$data);
//		$this->load->view('includes/footer');
	}
	function update_profile()
	{
			$this->load->model('membership_model');
			$this->load->model('Gallery_model');
			if($query = $this->membership_model->edit_profile())
			{
				$this->session->set_flashdata('message', '<div id="message_new" class="success">Profile Information Updated.</div>');
				redirect('member/edit_profile',$query);
			}
			else
			{
				//$this->session->set_flashdata('message', '<div id="message_new" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('member/edit_profile',$query);
			}
		
	}
	function update_plan()
	{
			$this->load->model('membership_model');
			
				$data['plan_name'] = $this->input->post('plan_name');
				$data['plan_type']=$this->input->post('plan_type');
				$data['username']=$this->input->post('username');
				$data['plan_inr']=$this->input->post('plan_inr');
				$data['plan_usd']=$this->input->post('plan_usd');
				$data['currency']=$this->input->post('currency');
//				$data['currency_amount']=$this->input->post('currency_amount');
			if($this->input->post('currency')=="INR")
			{
				$data['currency_amount']=$this->input->post('plan_inr');
			}
			else
			{
				$data['currency_amount']=$this->input->post('plan_inr');
			}
				
				if($this->input->post('plan_type')=="FREE")
				{
					//$this->session->set_flashdata('message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
					redirect('site/changeplan');
				}
				else
				{
					$this->load->view('ccavenue_upgrade',$data);
				}
			
//			if($this->membership_model->edit_plan()== TRUE)
//			{
//				$this->session->set_flashdata('message', 'You have Updated your Plan.');
//				redirect('site/changeplan',$query);
//			}
//			if($this->membership_model->edit_plan()== FALSE)
//			{
//				$this->session->set_flashdata('message', 'Congratulations!! Your Plan Will Update from next Biling Cycle.');
//				redirect('site/changeplan',$query);
//			}
//			else
//			{
//				$this->session->set_flashdata('message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
//				redirect('site/changeplan',$query);
//			}
		
	}
	function confirm_update_plan()
	{
			$this->load->model('membership_model');
			
	////////////////// CCAVENUE CODE  //////////////////////////		
			
		$this->load->model('ccavenue');
		//	$this->load->view('front/registration');
		//print_r($this->input->post());
					$WorkingKey = "juni7rk6ush3dgk38j" ; //put in the 32 bit working key in the quotes provided here
					$Merchant_Id= $this->input->post('Merchant_Id');
					$Amount= $this->input->get_post('Amount');//$_REQUEST['Amount'];
					$Order_Id= $this->input->get_post('Order_Id');//$_REQUEST['Order_Id'];
					$Merchant_Param= $this->input->get_post('Merchant_Param');//$_REQUEST['Merchant_Param'];
					$Checksum= $this->input->get_post('Checksum');//$_REQUEST['Checksum'];
					$AuthDesc=$this->input->get_post('AuthDesc');//$_REQUEST['AuthDesc'];
				 
					$Checksum = $this->ccavenue->verifychecksum($Merchant_Id, $Order_Id , $Amount,$AuthDesc,$Checksum,$WorkingKey);
					if($Checksum=="true" && $AuthDesc=="Y")
					{
					//	echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
						if($this->membership_model->edit_plan()== TRUE)
						{
							$this->session->set_flashdata('message', 'You have Updated your Plan.');
							redirect('site/changeplan',$query);
						}
					}
					else if($Checksum=="true" && $AuthDesc=="B")
					{
						//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
				 
						//Here you need to put in the routines/e-mail for a  "Batch Processing" order
						//This is only if payment for this transaction has been made by an American Express Card
						//since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
							$this->session->set_flashdata('message', 'We will keep you posted regarding the status of your order through e-mail');
						redirect('site/changeplan',$query);
					}
					else if($Checksum=="true" && $AuthDesc=="N")
					{
//						echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
							$data['error_msg'] = 'Thank you for shopping with us.However,the transaction has been declined.';
						//Here you need to put in the routines for a failed
						//transaction such as sending an email to customer
						//setting database status etc etc
							$this->session->set_flashdata('message', 'The transaction has been declined.');
							redirect('site/changeplan',$query);
					}
					else
					{
//						echo "<br>Security Error. Illegal access detected";
							$data['error_msg'] = 'Security Error. Illegal access detected';
						//Here you need to simply ignore this and dont need
						//to perform any operation in this condition
							$this->session->set_flashdata('message', 'Security Error. Illegal access detected.');
							redirect('site/changeplan',$query);
					}
					
					
			
			
	/////////////////////////////////////////////////////////////		
			
	}
	function reniew_plan()
	{
			$this->load->model('membership_model');
			
				$data['reniew_level']=$this->input->post('reniew_level');
				$data['username']=$this->input->post('username');
				$data['reniew_amt_inr']=$this->input->post('reniew_amt_inr');
				$data['currency']=$this->input->post('currency');
				$data['currency_amount']=$this->input->post('currency_amount');
//				$data['currency_amount']=$this->input->post('reniew_amt_inr');
				
				if($this->input->post('plan_type')=="FREE")
				{
					//$this->session->set_flashdata('message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
					redirect('site/changeplan');
				}
				else
				{
					$this->load->view('ccavenue_reniew',$data);
				}

		
	}
	function confirm_reniew()
	{
			
			$this->load->model('membership_model');
			
	////////////////// CCAVENUE CODE  //////////////////////////		
			
		$this->load->model('ccavenue');
		//	$this->load->view('front/registration');
		//print_r($this->input->post());
					$WorkingKey = "juni7rk6ush3dgk38j" ; //put in the 32 bit working key in the quotes provided here
					$Merchant_Id= $this->input->post('Merchant_Id');
					$Amount= $this->input->get_post('Amount');//$_REQUEST['Amount'];
					$Order_Id= $this->input->get_post('Order_Id');//$_REQUEST['Order_Id'];
					$Merchant_Param= $this->input->get_post('Merchant_Param');//$_REQUEST['Merchant_Param'];
					$Checksum= $this->input->get_post('Checksum');//$_REQUEST['Checksum'];
					$AuthDesc=$this->input->get_post('AuthDesc');//$_REQUEST['AuthDesc'];
				 
					$Checksum = $this->ccavenue->verifychecksum($Merchant_Id, $Order_Id , $Amount,$AuthDesc,$Checksum,$WorkingKey);
					if($Checksum=="true" && $AuthDesc=="Y")
					{
					//	echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
						if($this->membership_model->reniew_plan()== TRUE)
						{
							$this->session->set_flashdata('message', 'You have Reniewed your Plan.');
							redirect('site/changeplan',$query);
						}
					}
					else if($Checksum=="true" && $AuthDesc=="B")
					{
						//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
				 
						//Here you need to put in the routines/e-mail for a  "Batch Processing" order
						//This is only if payment for this transaction has been made by an American Express Card
						//since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
							$this->session->set_flashdata('message', 'We will keep you posted regarding the status of your order through e-mail');
						redirect('site/changeplan',$query);
					}
					else if($Checksum=="true" && $AuthDesc=="N")
					{
//						echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
							$data['error_msg'] = 'Thank you for shopping with us.However,the transaction has been declined.';
						//Here you need to put in the routines for a failed
						//transaction such as sending an email to customer
						//setting database status etc etc
							$this->session->set_flashdata('message', 'The transaction has been declined.');
							redirect('site/changeplan',$query);
					}
					else
					{
//						echo "<br>Security Error. Illegal access detected";
							$data['error_msg'] = 'Security Error. Illegal access detected';
						//Here you need to simply ignore this and dont need
						//to perform any operation in this condition
							$this->session->set_flashdata('message', 'Security Error. Illegal access detected.');
							redirect('site/changeplan',$query);
					}
					
					
			
			
	/////////////////////////////////////////////////////////////		
			
			
	}
	function update_password()
	{
			$this->load->model('membership_model');
			$query = $this->membership_model->check_password();
//			echo $query;exit;
				if($query == 1)
				{
				$this->session->set_flashdata('message', '<div id="message" class="success">Password Updated.</div>');
				redirect('member/edit_profile',$query);
				}
				else if($query == 0)
				{
				$this->session->set_flashdata('message', '<div id="message" class="wrong">Old Password Is Incorrect.</div>');
				redirect('member/edit_profile',$query);
					
				}
				else
				{
				//$this->session->set_flashdata('message', '<div id="message" class="wrong">A database error has occured, please contact your administrator.</div>');
				redirect('member/edit_profile',$query);
					
				}
		
	}
	public function login()
    {
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['base']=$this->config->item('base_url');
			$data['title']= 'Message form';
			$this->load->model('message_model');
			$this->load->view('header_view',$data);
			$this->load->view('messageform_view',$data);
			$this->load->view('footer_view',$data);
		}
		else
		{
		$this->load->model('message_model');
        echo $ret=$this->message_model->signIn();
		
		}
		
    }
	public function insert_message()
    {
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('age', 'Age', 'required|is_natural');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('colors', 'Colors', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Message form';
		$this->load->model("message_model");
		$data['query']=$this->message_model->get_all();
		$this->load->view('header_view',$data);
		$this->load->view('messageform_view',$data);
		$this->load->view('footer_view',$data);
//		$this->load->view('formsuccess');
//		$this->load->model('message_model');
//        $this->message_model->add_message();
//		$this->load->helper('url');
//		redirect("");
		}
		else
		{
			$this->load->view('formsuccess');
		}
		
    }
     public function succesLogin()
    {
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Message form';
		$this->load->model("message_model");
		$this->load->view('formsuccess',$data);
    }
	function add_recipe()
	{
		
			$this->load->model('membership_model');
			$this->load->model('Gallery_model');
			if($query = $this->membership_model->add_recipe())
			{
				//$this->Gallery_model->do_upload();
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Information Added Successfully.</div>');
				redirect('site/dash_board',$query);
			}
			else
			{
				$this->load->view('logged_in_area');			
			}
		
	}
	function edit_recipe($userId)
	{
		
			$this->load->model('membership_model');
			$this->load->model('Gallery_model');
			if($query = $this->membership_model->edit_recipe($userId))
			{
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Information Updated.</div>');
				redirect('site/dash_board',$query);
			}
			else
			{
				//$this->session->set_flashdata('message', '<div id="message" class="error">A database error has occured, please contact your administrator.</div>');
				redirect('site/dash_board',$query);
			}
		
	}
     public function success()
    {
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Successful';
		$this->load->view('includes/success', $data);
    }
	function check_user()
	{
		$this->load->model('membership_model');
		if($this->membership_model->check_user() == TRUE){
			
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				//redirect('../home/create_member'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		else{
			echo 'false';
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
//			redirect('home/create_member'); 
		}
	}
    private function upload()
    {
        $c_upload['upload_path']    = $this->data['dir']['original'];
        $c_upload['allowed_types']  = 'gif|jpg|png|jpeg|x-png';
        $c_upload['max_size']       = '500';
		$c_upload['max_width']      = '1600';
		$c_upload['max_height']     = '1200';
        $c_upload['remove_spaces']  = TRUE;

        $this->load->library('upload', $c_upload);
        
        if ($this->upload->do_upload()) {
            
            $img = $this->upload->data();
            
            // create thumbnail
            $new_image = $this->data['dir']['thumb'].'thumb_'.$img['file_name'];
            
            $c_img_lib = array(
                'image_library'     => 'gd2',
                'source_image'      => $img['full_path'],
                'maintain_ratio'    => TRUE,
                'width'             => 100,
                'height'            => 100,
                'new_image'         => $new_image
            );
            
            $this->load->library('image_lib', $c_img_lib);
            $this->image_lib->resize();
        } else {
            $this->data['error'] = $this->upload->display_errors();
        }
    }

}

?>

