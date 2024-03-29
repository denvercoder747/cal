<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
    }

     public function index()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
//		$this->load->helper('url');
//		$data['base']=$this->config->item('base_url');
//		$data['title']= 'Message form';
//		$this->load->view('includes/header_login',$data);
//		$this->load->view('login_view',$data);
//		$this->load->view('includes/footer',$data);
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Calcipe';
		$this->load->view('front/index',$data);
    }
     public function userlogin()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->view('front/userlogin');
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
//				'profit_amt' => $query['profit_amt'],
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
	        redirect('calcipe/relogin');
			//$this->index();
		}
	}	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	function show_form()
	{
		//	$this->load->view('front/registration');
			$this->load->view('front/pricingplan');
	}
	function show_form1()
	{
		//	$this->load->view('front/registration');
			$this->load->view('front/registration');
	}
	function ccavenue()
	{
		//	$this->load->view('front/registration');
			$this->load->view('ccavenue');
	}
	
	function free_confirm()
	{
		$this->load->model('membership_model');
		if($query = $this->membership_model->confirm_member())
		{
			$data['main_content'] = 'Congrats!!!';
			$data['email'] = $this->session->userdata('user_email');
			//$this->load->view('front/signup_confirm', $data);
			$this->load->view('front/signup_confirm');
		}
	}
	function ccavenue_confirm()
	{
		$this->load->model('membership_model');
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
				 if($AuthDesc=="")
				 {
					 redirect('home/pageerror');
				 }
				 
					if($Checksum=="true" && $AuthDesc=="Y")
					{
						//echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
						//Here you need to put in the routines/e-mail for a  "Batch Processing" order
						//This is only if payment for this transaction has been made by an American Express Card
						//since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
						if($query = $this->membership_model->confirm_member())
						{
							$data['main_content'] = 'Congrats!!!';
							$data['email'] = $this->session->userdata('user_email');
							$this->load->view('front/signup_confirm', $data);
						}
					}
					else if($Checksum=="true" && $AuthDesc=="B")
					{
						//echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
				 
						//Here you need to put in the routines/e-mail for a  "Batch Processing" order
						//This is only if payment for this transaction has been made by an American Express Card
						//since American Express authorisation status is available only after 5-6 hours by mail from ccavenue and at the "View Pending Orders"
							$this->load->view('front/ccavenue_error');
					}
					else if($Checksum=="true" && $AuthDesc=="N")
					{
//						echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
							$data['error_msg'] = 'Thank you for shopping with us.However,the transaction has been declined.';
						//Here you need to put in the routines for a failed
						//transaction such as sending an email to customer
						//setting database status etc etc
							$this->load->view('front/ccavenue_error');
					}
					else
					{
//						echo "<br>Security Error. Illegal access detected";
							$data['error_msg'] = 'Security Error. Illegal access detected';
						//Here you need to simply ignore this and dont need
						//to perform any operation in this condition
							$this->load->view('front/ccavenue_error');
					}
					
		
		
	}
	function create_member()
	{
		$this->load->library('form_validation');
		$this->load->model('membership_model');
		$this->load->model('Gallery_model');
		$data = array();
			if($query = $this->membership_model->temp_insert())
			{
//				$data['main_content'] = 'Congrats!!!';
				$data['email'] = $this->input->post('username');
				$data['first_name']=$this->input->post('first_name');
				$data['last_name']=$this->input->post('last_name');
				$data['currency']=$this->input->post('currency');
				$data['currency_amount']=$this->input->post('currency_amount');
				
				if($this->input->post('member_type')=="FREE")
				{
					$chars = '0123456789abcdefghjkmnoprstvwxyz';
					$Order_Id  = '';
					// Generate code
					for ($i = 0; $i < 12; ++$i)
					{
					$data['Order_Id']= substr($chars, (((int) mt_rand(0,strlen($chars))) - 1),1);
					}
					$this->load->view('profile_process',$data);
				}
				else
				{
					$this->load->view('ccavenue',$data);
				}
//				$this->load->view('front/signup_confirm', $data);
//print_r($this->input->post());exit;
//				$this->load->view('ccavenue',$data);
//				$this->load->view('signup_validate', $data);
//				$this->load->view('signup_success', $data);
			}
			else
			{
//				$this->load->view('signup_form1');
//				$this->load->view('front/signup_confirm');
			$this->load->view('front/registration');
			}
		
	}
	function activate()
	{
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->activate_member($this->uri->segment(3)))
			{
				$data['main_content'] = 'Congrats!!!';
				
				$this->load->view('front/signup_success', $data);
			}
			else
			{
				$this->load->view('front/signup_error');			
			}
		
	}
	function edit_member()
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
			$this->load->view('edit_profile');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->edit_member())
			{
				$data['main_content'] = 'Congrats!!!';
				$this->load->view('edit_profile', $data);
			}
			else
			{
				$this->load->view('edit_profile');			
			}
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
				redirect('site/recipe',$query);
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
				redirect('site/recipe',$query);
			}
			else
			{
				//$this->session->set_flashdata('message', '<div id="message" class="error">A database error has occured, please contact your administrator.</div>');
				redirect('site/recipe',$query);
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
				echo 'yes'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		else{
			echo 'no';
		}exit;
	}
    function feature()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->view('front/features');
    }
    function price()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->limitSettings())
		{
			$data['records'] = $query;
		}
		if($query = $this->membership_model->plansSettings())
		{
			$data['plans'] = $query;
		}
		$this->load->view('front/prices',$data);
    }
    function contactus()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->view('front/contactus');
    }
    function faq()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->view('front/faqs');
    }
	function terms()
	{
		$this->load->view('terms');
	}
	function donate()
	{
		$this->load->view('front/donation');
	}
	function test_script()
	{
		$this->load->view('test_script');
	}
	function txnfailure()
	{
		$this->load->view('ccavenue_error');
	}
	function pageerror()
	{
		$this->load->view('front/page404');
	}
}

?>

