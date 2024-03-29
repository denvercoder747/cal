<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();

		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
    }

     public function index()
    {
			if($this->session->userdata('adminId'))
			{
			redirect('admin/dash_board');
			}
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Calcipe Admin';
//		$this->load->view('includes/header_login',$data);
//		$this->load->view('admin_login',$data);
		$this->load->view('login_admin',$data);
//		$this->load->view('includes/footer',$data);
    }
	function validate_credentials()
	{		
//		$this->admin_logged_in();
		$this->load->model('message_model');
		$query = $this->message_model->validate_Admin();
		
		if($query) // if the user's credentials validated...
		{
			//print_r($query);
			$data = array(
				'adminId' => $query['user_id'],
				'firstname' => $query['firstname'],
				'admin_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/dash_board');
//			redirect('site/members_area');
		}
		else // incorrect username or password
		{
//			$this->load->library('message');  
//			$this->message->set('Wrong Username or Password.', 'notice', TRUE);
            $this->session->set_flashdata('message', 'Oops, it seems your username or password is incorrect. <br>Please try again.');
	        redirect('admin/index');
			//$this->index();
		}
	}	
	function dash_board()
	{
		$this->admin_logged_in();
//load the View and Show results
		$this->load->view('admin_dashboard');
	}
	function data_management()
	{
		$this->admin_logged_in();
//load the View and Show results
		$this->load->view('admin_datamanage');
	}
     public function allUser()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/allUser';
		$config['total_rows'] =$this->admin_model->get_num_users('Active','');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_records($config['per_page'],$this->uri->segment(3),'Active',''))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allusers',$data);
    }
     public function allPlans()
    {
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('membership_model');
		$data=array();
		if($query = $this->membership_model->plansSettings())
		{
			$data['plans'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_AllPlans',$data);
    }
     public function recipes()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/recipes';
		$config['total_rows'] =$this->admin_model->get_num_recipes('Active');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_AllRecipes($config['per_page'],$this->uri->segment(3),'Active'))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allrecipes',$data);
    }
     public function blockRecipe()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/blockRecipe';
		$config['total_rows'] =$this->admin_model->get_num_recipes('Blocked');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_AllRecipes($config['per_page'],$this->uri->segment(3),'Blocked'))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allrecipes',$data);
    }
     public function Ingredients()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/Ingredients';
		$config['total_rows'] =$this->admin_model->get_num_ingredients('Active');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_AllGredient($config['per_page'],$this->uri->segment(3),'Active'))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allgredients',$data);
    }
     public function delUser()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/delUser';
		$config['total_rows'] =$this->admin_model->get_num_users('Deleted','User');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_records($config['per_page'],$this->uri->segment(3),'Deleted','User'))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allusers',$data);
    }
     public function delUserbyAdmin()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/delUser';
		$config['total_rows'] =$this->admin_model->get_num_users('Deleted','Admin');
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->get_records($config['per_page'],$this->uri->segment(3),'Deleted','Admin'))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		$this->load->view('admin_Allusers',$data);
    }
	function delete_recipe()
	{
		$this->load->model('admin_model');
//		$this->admin_model->delete_recipe();
			if($query = $this->admin_model->delete_recipe())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Recipe Deleted.</div>');
				redirect('admin/recipes',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/recipes',$query);
			}
	}
	function delete_request()
	{
		$this->load->model('admin_model');
//             $this->db->delete('request_history', array('id_request' => $this->uri->segment(3)));
				$this->db->set('status',"Deleted");
				$this->db->where('id_request', $this->uri->segment(3));
				$this->db->update('request_history');
				$this->session->set_flashdata('Failure_message', '<div id="message" class="success">Request Deleted </div>');
				redirect('admin/helpRequest',$query);
	}
	function delete_message()
	{
		$this->load->model('admin_model');
             $this->db->delete('message_board', array('id_message' => $this->uri->segment(3)));
				redirect('admin/allUser',$query);
	}
	function block_recipe()
	{
		$this->load->model('admin_model');
//		$this->admin_model->delete_recipe();
			if($query = $this->admin_model->block_recipe())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Recipe Blocked.</div>');
				redirect('admin/recipes',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/recipes',$query);
			}
	}
	function unblock_recipe()
	{
		$this->load->model('admin_model');
//		$this->admin_model->delete_recipe();
			if($query = $this->admin_model->unblock_recipe())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Recipe UnBlocked.</div>');
				redirect('admin/recipes',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/recipes',$query);
			}
	}
     public function searchUser()
    {
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
		$data=array();
		if($this->input->post('srchval')){
			$srchtxt=$this->input->post('srchval');
			$srchtype=$this->input->post('srchtype');
		if($srchtype=="recipe")
		{
//		$config['base_url'] = '/index.php/admin/searchUser';
//		$config['total_rows'] =$this->admin_model->get_num_Searchrecords('','','1',$srchtxt,$srchtype);
//		$config['per_page'] = 2;
//		$config['full_tag_open'] = '<div id="pagination">';
//		$config['full_tag_close'] = '</div>';
		
//		$this->pagination->initialize($config);
			
			if($query = $this->admin_model->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query;
			}
			$this->load->view('admin_Allrecipes',$data);
		}
		if($srchtype=="All")
		{
			if($query = $this->admin_model->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query[0];
				$data['records1'] = $query[1];
//				print_r($data);exit;
			}
			$this->load->view('admin_searchResult',$data);
		}
		if($srchtype=="user")
		{
//		$config['base_url'] = '/index.php/admin/allUser';
//		$config['total_rows'] =$this->admin_model->get_num_Searchrecords('','','Active',$srchtxt,$srchtype);
//		$config['per_page'] = 10;
//		$config['full_tag_open'] = '<div id="pagination">';
//		$config['full_tag_close'] = '</div>';
		
//		$this->pagination->initialize($config);
			
			if($query = $this->admin_model->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query;
			}
			$this->load->view('admin_Allusers',$data);
		}
		
		}
		else
		{
			if($query = $this->admin_model->get_records('','','Active',''))
			{
				$data['records'] = $query;
			}
			$this->load->view('admin_Allusers',$data);
		}
    }
	function delete_user()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->admin_model->delete_row();
			if($query = $this->admin_model->delete_row())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Profile Deleted.</div>');
				redirect('admin/allUser',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/allUser',$query);
			}
	}
	function delete_ad()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
			if($query = $this->admin_model->delete_ad())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Ad Deleted.</div>');
				redirect('admin/bannerAd',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/bannerAd',$query);
			}
	}
	function edit_user($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->edit($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_UserEdit',$data);
	}
	function edit_plans($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->edit_plan($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_updatePlans',$data);
	}
	function update_password($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->edit_password($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		redirect('admin/allUser');
	}
	function update_plan()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('Gallery_model');
		$data = array();
		if($query = $this->admin_model->update_plan())
		{
			$data['records'] = $query;
		}
//load the View and Show results
		redirect('admin/allPlans');
	}
	function chngPass($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
//load the View and Show results
		$this->load->view('admin_UserPass');
	}
	function view_user($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->edit($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_UserView',$data);
	}
	function view_recipe($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->recipe($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_viewrecipe',$data);
	}
	function add_message()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('Gallery_model');
		$data = array();
		if($query = $this->admin_model->add_message($this->uri->segment(4)))
		{
			//print_r($query);exit;
			$this->session->set_flashdata('Success_message', '<div id="message" class="error">Message Added Successfully.</div>');
			redirect('admin/msgBoard/'.$query['UserId'],$query);
		}
		
		else
		{
			//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
			redirect('admin/msgBoard/'.$query['UserId'],$query);
		}
//load the View and Show results
	}
	function edit_message()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('Gallery_model');
		$data = array();
		if($query = $this->admin_model->edit_message($this->uri->segment(3)))
		{
			//print_r($query);exit;
			$this->session->set_flashdata('Success_message', '<div id="message" class="error">Message Updated Successfully.</div>');
//			redirect('admin/msgBoard/'.$query['UserId'],$query);
			redirect('admin/allUser/');
		}
		
		else
		{
			//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
//			redirect('admin/msgBoard/'.$query['UserId'],$query);
			redirect('admin/allUser/');
		}
//load the View and Show results
	}
	function add_ads()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('Gallery_model');
		$data = array();
		if($query = $this->admin_model->add_ads($this->uri->segment(3)))
		{
			//print_r($query);exit;
			$this->session->set_flashdata('Success_message', '<div id="message" class="error">Ads Added Successfully.</div>');
			redirect('admin/bannerAd/',$query);
		}
		
		else
		{
			$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
			redirect('admin/bannerAd/',$query);
		}
//load the View and Show results
	}
	function edit_ads()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$this->load->model('Gallery_model');
		$data = array();
		if($query = $this->admin_model->edit_ads($this->uri->segment(3)))
		{
			//print_r($query);exit;
			$this->session->set_flashdata('Success_message', '<div id="message" class="error">Ads Edited Successfully.</div>');
			redirect('admin/bannerAd/',$query);
		}
		
		else
		{
			//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
			redirect('admin/bannerAd/',$query);
		}
//load the View and Show results
	}
	function msgBoard($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->msgBoard($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_messageboard',$data);
	}
	function bannerAd()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->bannerAd($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_ads_control',$data);
	}
	function bannerAdd()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->bannerAd($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_ads',$data);
	}
	function metakey()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->metainfo())
		{
			$data['records'] = $query;
		}
//		print_r($query);
//load the View and Show results
		$this->load->view('meta_settings',$data);
	}
	function Email($id)
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
//load the View and Show results
		$this->load->view('admin_groupmail',$data);
	}
	function send_mail()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->send_mail($this->uri->segment(3)))
		{
			//print_r($query);exit;
			$this->session->set_flashdata('Success_message', '<div id="message" class="error">Mail Send Successfully.</div>');
			redirect('admin/Alluser/',$query);
		}
		
		else
		{
			$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A error has occured, please contact your administrator.</div>');
			redirect('admin/Alluser/',$query);
		}
//load the View and Show results
	}
	function edit_messageboard()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data=array();
		//$data['message'] = $this->admin_model->retrieve_messagebrd($this->uri->segment(3)); // Retrieve an array with all products
		if($query = $this->admin_model->retrieve_messagebrd($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
	//	print_r($query);
//		print_r($this->db->last_query());
		$this->load->view('admin_messageboardEdit', $data); // Display the page
	}
	function edit_bannerAd()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->retrieve_ad($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_adsEdit',$data);
	}
	function view_ad()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->retrieve_ad($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_adsView',$data);
	}
	function update_profile()
	{
		$this->admin_logged_in();
			$this->load->model('admin_model');
			$this->load->model('Gallery_model');
			if($query = $this->admin_model->edit_profile())
			{
				$this->session->set_flashdata('Success_message', '<div id="message" class="success">Profile Information Updated.</div>');
				redirect('admin/allUser',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/allUser',$query);
			}
		
	}
	function change_plan()
	{
			$this->load->model('admin_model');
			if($this->admin_model->change_plan()== TRUE)
			{
				$this->session->set_flashdata('Success_message', 'Plan Updated Successfully.');
				redirect('admin/allUser',$query);
			}
			else if($this->admin_model->change_plan()== FALSE)
			{
				$this->session->set_flashdata('Success_message', 'Congratulations!! Plan Will Update from next Biling Cycle.');
				redirect('admin/allUser',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/allUser',$query);
			}
		
	}
	function reniew_plan()
	{
			$this->load->model('admin_model');
			if($this->admin_model->reniew_plan()== TRUE)
			{
				$this->session->set_flashdata('Success_message', 'Plan has Reniewed.');
				redirect('admin/allUser',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/allUser',$query);
			}
		
	}
	function change_banner()
	{
			$this->load->model('admin_model');
			if($this->admin_model->change_banner()== TRUE)
			{
				$this->session->set_flashdata('Success_message', 'Settings Updated Successfully.');
				redirect('admin/bannerAd',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/bannerAd',$query);
			}
		
	}
	function set_settings()
	{
			$this->load->model('admin_model');
			if($this->admin_model->set_settings($this->uri->segment(3))== TRUE)
			{
				$this->session->set_flashdata('Success_message', 'Settings Updated Successfully.');
				redirect('admin/bannerAd',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/bannerAd',$query);
			}
		
	}
	function benefitSettings()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
		if($query = $this->admin_model->limitSettings())
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_benefits',$data);
	}
	function set_benefits()
	{
			$this->load->model('admin_model');
			if($this->admin_model->set_benefits())
			{
				$this->session->set_flashdata('Success_message', 'Settings Updated Successfully.');
				redirect('admin/benefitSettings',$query);
			}
			else
			{
				//$this->session->set_flashdata('Failure_message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('admin/benefitSettings',$query);
			}
		
	}
	function update_meta()
	{
			$this->load->model('admin_model');
			if($this->admin_model->update_metadata())
			{
				$this->session->set_flashdata('Success_message', 'Settings Updated Successfully.');
				redirect('admin/metakey',$query);
			}
			else
			{
				$this->session->set_flashdata('Success_message', 'Settings Updated Successfully.');
				redirect('admin/metakey',$query);
			}
		
	}
	function helpRequest()
	{
		$this->admin_logged_in();
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
//		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/admin/Ingredients';
		$config['base_url'] = '/index.php/admin/helpRequest';
		$config['total_rows'] =$this->admin_model->get_num_helps();
		$config['per_page'] = 50;
//		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
		$data=array();
		if($query = $this->admin_model->helpRequest($config['per_page'],$this->uri->segment(3)))
//		if($query = $this->admin_model->helpRequest($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
		$this->load->view('admin_helpRequest',$data);
	}
	function reply_request()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
		$data = array();
//		$this->db->where('id_request', $this->uri->segment(3));
//		$query3 = $this->db->get('request_history');
//		$rs2=$query3->result();
//		print_r($rs2);
//				print_r($this->db->last_query());
//		$username=$rs2[0]->max_recipe;
//load the View and Show results
		if($query = $this->admin_model->getRequest($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
		$this->load->view('reply_request',$data);
	}
	function requestReply()
	{
		$this->admin_logged_in();
		$this->load->model('admin_model');
	
				$this->db->set('reply_message',$this->input->post("reply_content") );
				$this->db->set('reply_date',date("Y-m-d"));
				$this->db->set('status',"Replied");
				$this->db->where('id_request', $this->input->post("id_request"));
				$this->db->update('request_history');
				$this->session->set_flashdata('Success_message', 'Reply Send Successfully.');
		 $this->load->library('email');
				$mailbox=$this->input->post("user_email");
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
Hello User</p>
  <p  style='font-family:Verdana, Geneva, sans-serif; font-size:13px; text-align:left;'><br> 
    Admin has replied to your Query. You can check from your dashboard<br />
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
					$this->email->from('support@calcipe.com','Admin');
	//				$this->email->to('ibcablr@gmail.com ');
					$this->email->to($mailbox);
					//$this->email->cc('migirlfriend@domain.com');
					//$this->email->bcc('myothergirlfriend@domain.com');
					$this->email->subject('New Help Request');
					$this->email->message($message);
					$data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
			}
				redirect('admin/helpRequest');
	}
	function admin_logged_in()
	{
		$admin_logged_in = $this->session->userdata('admin_logged_in');
		if(!isset($admin_logged_in) || $admin_logged_in != true)
		{
//			echo 'You don\'t have permission to access this page. <a href="../admin">Login</a>';	
			redirect('admin');
			die();		
			//$this->load->view('login_form');
		}		
	}	
	function admin_logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
//		$this->index();
	}
}

?>

