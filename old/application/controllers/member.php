<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class member extends CI_Controller{

    public function __construct(){
        parent::__construct();

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
            $this->session->set_flashdata('message', 'Oopss, it seems your username or password is incorrect, <br>Please try again.');
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
		$this->load->view('includes/header_profile');
		$this->load->view('edit_profile',$data);
		$this->load->view('includes/footer');
	}
	function update_profile()
	{
			$this->load->model('membership_model');
			if($query = $this->membership_model->edit_profile())
			{
				$this->session->set_flashdata('message', '<div id="message" class="success">Profile Information Updated.</div>');
				redirect('member/edit_profile',$query);
			}
			else
			{
				$this->session->set_flashdata('message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
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
				$this->session->set_flashdata('message', '<div id="message" class="error">A database error has occured, please contact your administrator.</div>');
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

?>

