<?php

class Gredient extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index()
	{
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
//		print_r($this->db->last_query());
		$data['content'] = 'gredients_view1'; // Select view to display
		$this->load->view('includes/gredient_header');
		$this->load->view('gredients_view', $data); // Display the page
		$this->load->view('includes/footer');
	}
	
	function add_new()
	{
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
//		print_r($this->db->last_query());
		$this->load->view('gredients_add'); // Display the page
	}
	
	function add_gredient(){
		
		$this->load->model('gradients');
		if($this->gradients->validate_add_gredient_item() == TRUE){
			
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				redirect('gredient'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		else{
			echo 'false';
			redirect('gredient'); 
		}
		
	}
	function edit_gredient(){
		
		$this->load->model('gradients');
		if($this->gradients->validate_update_gredient_item() == TRUE){
			
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				redirect('gredient'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		
	}
	function show_gredient(){
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
		$this->load->view('gredients_view1',$data);
	}
	function auto_search()
	{
		$this->load->view('auto_search'); // Display the page
	}
public function searching() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."')\">".$keyword->name."</li>";
                }
 //               echo '</ul>';
            }
			else
			{
						echo "<li><a href=\"#\" onclick=\"javascript:void window.open('../gredient/add_new','1317104463241','width=700,height=200,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;\">Add this Gredient</a></li>";
			}
        } 
    }  	
public function searching3() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."')\">".$keyword->name."</li>";
                }
 //               echo '</ul>';
            }
			else
			{
						echo "<li><a href=\"#\" onclick=\"javascript:void window.open('../../gredient/add_new','1317104463241','width=700,height=200,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;\">Add this Gredient</a></li>";
			}
        } 
    }  	
public function searching2() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
                foreach ($query->result() as $keyword) {
					$search=array("name" => $keyword->name, 
						  "id" => $this->input->post('Id'),
						  "quantity" => $keyword->quantity,
						  "price" => $keyword->price,
						  "amount_kg" => $keyword->amount_kg,
						  "measure" => $keyword->measure
						  );

                }
            }
				else
				{
					$search=array( 
						  "id" => $this->input->post('Id')
						  );
					
				}
				print_r(json_encode($search));
        } 
    }  	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo "You don\'t have permission to access this page. <a href=\"".$this->config->item('base_url')."\">Login</a>";	
			die();		
			//$this->load->view('login_form');
		}		
	}	
}
