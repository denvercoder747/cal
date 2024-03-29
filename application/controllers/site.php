<?php

class Site extends CI_Controller 
{
	
    private $data = array(
        'dir' => array(
            'original' => 'assets/uploads/original/',
            'thumb' => 'assets/uploads/thumbs/'
        ),
        'total' => 0,
        'images' => array(),
        'error' => ''
    );
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	}

	function members_area()
	{
		$this->load->model('membership_model');
//		$this->load->view('includes/add_recipe_header');
//		$this->load->view('logged_in_area');
//		$this->load->view('includes/footer');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('multi_recipe !=', "TRUE");
		$this->db->where('status', "Active");
		$query2 = $this->db->get('recipe')->num_rows();
			$query_member = $this->db->query("SELECT member_type,level,valid_upto FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		$limit_recipe=$rs2[0]->max_recipe;
				if($rs2[0]->add_recipe=="Yes")
		{

			if($query2<$limit_recipe)
			{
			$this->load->view('add_recipe');
			}
			else if($rs_member[0]['valid_upto']<date("Y-m-d"))
			{
				redirect("/site/changeplan");
			}
			else
			{
				redirect("/site/upgrade_member");
			}
		}
		else
		
		{
				redirect("/site/upgrade_member");
			
		}

	}
	function multi_recipe()
	{
		$this->load->model('membership_model');
//		$this->load->view('includes/add_recipe_header');
//		$this->load->view('logged_in_area');
//		$this->load->view('includes/footer');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('multi_recipe', "TRUE");
		$this->db->where('status', "Active");
		$query2 = $this->db->get('recipe')->num_rows();
			$query_member = $this->db->query("SELECT member_type,level,valid_upto FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		$limit_recipe=$rs2[0]->multi_recipe_storage;
				if($rs2[0]->multi_recipe=="Yes")
		{

			if($query2<$limit_recipe)
			{
			$this->load->view('multi_recipe');
			}
			else if($rs_member[0]['valid_upto']<date("Y-m-d"))
			{
				redirect("/site/changeplan");
			}
			else
			{
				redirect("/site/upgrade_member");
			}
		}
		else
		
		{
				redirect("/site/upgrade_member");
			
		}

	}
	function gredients()
	{
		$this->load->library('pagination');
		$this->load->model('gradients');
//load the View and Show results
		$this->load->view('gredients_view');
	}
	function changePlan()
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->select_profile())
		{
			$data['records'] = $query;
		}
		$this->load->view('changePlan',$data);
	}
	function upgrade_member()
	{
		$this->load->view('upgrade_plan');
	}
	function upgrade_error()
	{
		$this->load->view('upgrade_error');
	}
	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
	function gredient_insert()
	{
		$this->load->library('pagination');
		$this->load->model('gradients');
		$str = addslashes($_POST['str']);
		
		if($query = $this->gradients->add())
		{
		$unscheduled_activities_qry = $this->gradients->find_unscheduled_activities($str);
		echo '<ul>';
		foreach ($unscheduled_activities_qry->result() as $activity) {
		echo '<li onclick="set_activity(\''.addslashes($activity->name).'\'';
		echo ', '.$activity->id.');">'.$activity->name.'</li>'; 
		}
		echo '</ul>';	
		}
		// echo a list where each li has a set_activity function bound to its onclick() event
	}
//	function dash_board()
//	{
//		$this->load->model('membership_model');
//		$data1=array();
//		if($query = $this->membership_model->get_records('',''))
//		{
//			$data1['records'] = $query;
////				print_r($query);
//		}
////load the View and Show results
//		$this->load->view('includes/header_dashboard');
//		$this->load->view('dashboard',$data1);
//		$this->load->view('includes/footer');
//	}
	function dash_board()
	{
		$this->load->model('membership_model');
		$data1=array();
		if($query = $this->membership_model->get_records('',''))
		{
			$data1['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
//		$this->load->view('includes/header_dashboard');
		$this->load->view('dashboard',$data1);
//		$this->load->view('includes/footer');
	}
	function send_helpRequest()
	{
		$this->load->model('membership_model');
		$this->load->view('help_request');
	}
	function recipe()
	{
		$this->load->library('pagination');
		$this->load->model('membership_model');
		
		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/site/recipe';
		$config['base_url'] = '/index.php/site/recipe';
		$config['total_rows'] =$this->membership_model->get_num_records();
		$config['per_page'] = 15;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
//load the model and get results
		$data = array();
		if($query = $this->membership_model->get_records($config['per_page'],$this->uri->segment(3)))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		//$this->load->view('includes/header_recipe');
//		$this->load->view('includes/view_recipe_header');
//		$this->load->view('recipes',$data);
		$this->load->view('recipes',$data);
//		$this->load->view('includes/footer');
	}
	function incompleterecipe()
	{
		$this->load->library('pagination');
		$this->load->model('membership_model');
		
		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/site/recipe';
		$config['base_url'] = '/index.php/site/recipe';
		$config['total_rows'] =$this->membership_model->get_num_records_inc();
		$config['per_page'] = 15;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
//load the model and get results
		$data = array();
		if($query = $this->membership_model->get_records_inc($config['per_page'],$this->uri->segment(3)))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		//$this->load->view('includes/header_recipe');
		$this->load->view('includes/view_recipe_header');
		$this->load->view('incomplete_recipes',$data);
		$this->load->view('includes/footer');
	}
	function completerecipe()
	{
		$this->load->library('pagination');
		$this->load->model('membership_model');
		
		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/site/recipe';
		$config['base_url'] = '/index.php/site/recipe';
		$config['total_rows'] =$this->membership_model->get_num_records_com();
		$config['per_page'] = 15;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
//load the model and get results
		$data = array();
		if($query = $this->membership_model->get_records_com($config['per_page'],$this->uri->segment(3)))
		{
			$data['records'] = $query;
//				print_r($query);
		}
//load the View and Show results
		//$this->load->view('includes/header_recipe');
		$this->load->view('includes/view_recipe_header');
		$this->load->view('complete_recipes',$data);
		$this->load->view('includes/footer');
	}
	function delete_recipe()
	{
		$this->load->model('membership_model');
		
			if($this->membership_model->delete_row())
			{
				//$this->Gallery_model->do_upload();
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Deleted Successfully.</div>');
				redirect('site/recipe');
			}
			else
			{
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Couldnot Deleted.</div>');
				redirect('site/recipe');
			}
		
	}
	function view_recipe($id)
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->get_recipe($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
//load the View and Show results
//		$this->load->view('includes/header_recipe');
		$this->load->view('view_recipe',$data);
//		$this->load->view('includes/footer');
	}
	function print_recipe($id)
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->get_recipe($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
		
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		//Query for Benefit Check
		if($rs2[0]->recipe_print=="Yes")
		{
		$this->load->view('print_recipe',$data);
		}
		else
		{
				redirect("/site/upgrade_error");
			
		}
		
	}
	function chk_option()
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->get_recipe($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		//Query for Benefit Check
		if($rs2[0]->recipe_print=="Yes")
		{
		$this->load->view('print_option_chk',$data);
		}
		else
		{
				redirect("/site/upgrade_error");
			
		}
//load the View and Show results
	}
	function radio_close()
	{
		$this->load->view('save_reason');
//load the View and Show results
	}
	function show_image()
	{
		$this->load->view('viewRecipe_image');
	}
	function recipePic()
	{
//load the View and Show results
			$data['image'] = $this->uri->segment(3);
		$this->load->view('recipe_pic',$data);
	}
	function edit_recipe($id)
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->edit($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
		
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->edit_recipe=="Yes")
		{
				$this->load->view('edit_recipe',$data);
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
//load the View and Show results
//		$this->load->view('includes/edit_recipe_header');
//		$this->load->view('includes/footer');
	}
	function copy_recipe($id)
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->edit($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query2 = $this->db->get('recipe')->num_rows();
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		$limit_recipe=$rs2[0]->max_recipe;
		
		//Query for Benefit Check
		if($rs2[0]->recipe_duplicate=="Yes")
		{
			if($query2<$limit_recipe)
			{
			$this->load->view('copy_recipe',$data);
			}
			else
			{
				redirect("/site/upgrade_member");
			}
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
		
//load the View and Show results
//		$this->load->view('includes/edit_recipe_header');
//		$this->load->view('includes/footer');
	}
	function copy_multi_recipe($id)
	{
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->edit($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query2 = $this->db->get('recipe')->num_rows();
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		$limit_recipe=$rs2[0]->max_recipe;
		
		//Query for Benefit Check
		if($rs2[0]->recipe_duplicate=="Yes")
		{
			if($query2<$limit_recipe)
			{
			$this->load->view('copy_multi_recipe',$data);
			}
			else
			{
				redirect("/site/upgrade_member");
			}
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
		
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
//			echo 'You don\'t have permission to access this page. <a href="../home">Login</a>';	
//			die();	
redirect('./calcipe/index');
		$this->load->view('front/index');
			//$this->load->view('login_form');
		}		
	}	

	public function more_image($start = 0)
	{
        if ($this->input->post('btn_upload')) {
            $this->upload();
			$image = array('upload_data' => $this->upload->data());
		$new_recipe_photo_data = array(
			'recipe_id' => $this->input->post('rcpId'),
			'user_id' => $this->session->userdata('user_id'),
			'image' => $image['upload_data']['file_name'],
			'created_date' =>date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'status' => 1);						
			$insert = $this->db->insert('recipe_photoes', $new_recipe_photo_data);
        }

        $this->load->library('pagination');

        $c_paginate['base_url'] = site_url('site/more_image');
        $c_paginate['per_page'] = '9';
        $finish = $start + $c_paginate['per_page'];
        
                
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('recipe_id', $this->uri->segment(3, 0));
		$query = $this->db->get('recipe_photoes');
	//					print_r($this->db->last_query());
$data = array(
        'dir' => array(
            'original' => 'assets/uploads/original/',
            'thumb' => 'assets/uploads/thumbs/'
        ),
        'total' => 0,
        'images' => array(),
        'error' => ''
    );
/*            if ($dh = opendir($this->data['dir']['thumb'])) {
				$i = 0;
		 foreach ($query->result() as $row)
		   {
                    $file = $row->image;
					$ext = strrev(strstr(strrev($file), ".", TRUE));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                        if ($start <= $this->data['total'] && $this->data['total'] < $finish) {
                            $data['images'] = $file;
                            $this->data['images'][$i]['thumb'] = $file;
                            $this->data['images'][$i]['original'] = str_replace('thumb_', '', $file);
                            $i++;
                        }
                        $this->data['total']++;
                    }
			  
		   }
//		   print_r($data);
            }

        $c_paginate['total_rows'] = $this->data['total'];

*/        
        
        if (is_dir($this->data['dir']['thumb']))
        {
			$i = 0;
		 foreach ($query->result() as $row)
		   {
 //                  print_r($row);
				    $file = $row->image;
 //                   echo $ext = strrev(strstr(strrev($file), "."));
                    $ext = substr(strrchr($file,'.'),1);
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png') {
//						echo "start=".$start;
//						echo "<br>";
//						echo "total=".$this->data['total'];
//						echo "<br>";
//						echo "finish=".$finish;
//						echo "<br>";
//                        if ($start <= $this->data['total'] && $this->data['total'] < $finish) {
                            $this->data['images'][$i]['thumb'] = 'thumb_'.$file;
                            $this->data['images'][$i]['original'] = str_replace('thumb_', '', $file);
                            $i++;
  //                      }
                        $this->data['total']++;
                    }
		   }
//		print_r($this->data['images']);   
	//		print_r($this->data);   
			   
			   
        }

        $c_paginate['total_rows'] = $this->data['total'];
		
		
		$this->pagination->initialize($c_paginate);

		$this->load->view('images/index', $this->data);
	}
/*	public function all_images($start = 0)
	{
        if ($this->input->post('btn_upload')) {
            $this->upload();
			$image = array('upload_data' => $this->upload->data());
		$new_recipe_photo_data = array(
			'recipe_id' => $this->input->post('rcpId'),
			'user_id' => $this->session->userdata('user_id'),
			'image' => $image['upload_data']['file_name'],
			'created_date' =>date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'status' => 1);						
			$insert = $this->db->insert('recipe_photoes', $new_recipe_photo_data);
        }

        $this->load->library('pagination');

        $c_paginate['base_url'] = site_url('site/more_image');
        $c_paginate['per_page'] = '100';
        $finish = $start + $c_paginate['per_page'];
        
        if (is_dir($this->data['dir']['thumb']))
        {
            $i = 0;
            if ($dh = opendir($this->data['dir']['thumb'])) {
                while (($file = readdir($dh)) !== false) {
                    // get file extension
                    $ext = strrev(strstr(strrev($file), ".", TRUE));
                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                        if ($start <= $this->data['total'] && $this->data['total'] < $finish) {
                            $this->data['images'][$i]['thumb'] = $file;
                            $this->data['images'][$i]['original'] = str_replace('thumb_', '', $file);
                            $i++;
                        }
                        $this->data['total']++;
                    }
                }
                closedir($dh);
            }
        }

        $c_paginate['total_rows'] = $this->data['total'];

        $this->pagination->initialize($c_paginate);

		$this->load->view('images/index', $this->data);
	}
*/
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

    public function delete($ori_img)
    {
        unlink($this->data['dir']['original'].$ori_img);
        unlink($this->data['dir']['thumb'].'thumb_'.$ori_img);
        redirect('/');
    }

	function check_recipe()
	{
		$this->load->model('membership_model');
		if($this->membership_model->check_recipe() == TRUE){
			
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				redirect('site/members_area'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		else{
			echo 'false';
			redirect('site/members_area'); 
		}
		$RcpName = $this->input->post('recipe_name'); 
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('name', "");
		$query = $this->db->get('recipe')->num_rows();
		return $query;
	}
	function check_recipe2()
	{
		$this->load->model('membership_model');
		if($this->membership_model->check_recipe2() == 	FALSE){
			
			// Check if user has javascript enabled
			if($this->input->post('ajax') != '1'){
				redirect('site/members_area'); // If javascript is not enabled, reload the page with new data
			}else{
				echo 'true'; // If javascript is enabled, return true, so the cart gets updated
			}
		}
		else{
			echo 'false';
//			redirect('site/members_area'); 
		}
		$RcpName = $this->input->post('recipe_name'); 
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('name', "");
		$query = $this->db->get('recipe')->num_rows();
	//	return $query;
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

	public function total_recipe_number()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('recipe')->num_rows();
		return $query;
	}
	function share()
	{
		$this->load->view('share');
	}
	function shareFriend()
	{
		$this->load->view('shareFriend');
	}
	function recipe_pdf()
	{
		$this->load->library('mpdf');
		$this->load->model('membership_model');
		$data = array();
		if($query = $this->membership_model->get_recipe($this->uri->segment(3)))
		{
			$data['records'] = $query;
		}
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->recipe_pdf=="Yes")
		{
		//load the View and Show results
				$filename=$query[0]->name;
				$html = $this->load->view('recipe_pdf',$data, TRUE);
		/*		$html="<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			  <tr>
				<td width='70%' valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				  <tr>
					<td colspan='2' bgcolor='#999900' class='recipe_header_sub'>Short Description</td>
				  </tr>
				  <tr>
					<td width='7%'>&nbsp;</td>
					<td width='93%'>xcvxcv xcvxcv xcv xcv xcv</td>
				  </tr>
				  <tr>
					<td colspan='2' class='recipe_header_sub'>Directions</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>xcv xcvc xvc vxcvcx v xcvxc</td>
				  </tr>
				</table></td>
				<td width='0%' valign='top'></td>
				<td width='0%' valign='top'><img src='C://wamp/calcipe/images/thumbs/no_image.jpg' width='134' height='103' /></td>
			  </tr>
			</table>";
		*///		echo $html;exit;
				$this->mpdf->WriteHTML($html);
				$this->mpdf->Output($filename,'D');	
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
    }
     public function searchRecipe()
    {
		$this->load->library('pagination');
//		$this->load->model('membership_model');
//
//		$data = array();
//		if($query = $this->membership_model->get_records('',$this->uri->segment(3)))
//		{
//			$data['records'] = $query;
////				print_r($query);
//		}
//		$this->load->view('recipes',$data);

		$this->is_logged_in();
		$this->load->model('gradients');
		$data=array();
		if($this->input->post('srchval')){
			$srchtxt=$this->input->post('srchval');
			$srchtype=$this->input->post('srchtype');
		
		if($srchtype=="recipe")
		{
			if($query = $this->gradients->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query;
			}
//				print_r($query);exit;
			$this->load->view('recipes_srch',$data);
		}
		if($srchtype=="ingredients")
		{
			if($query = $this->gradients->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query;
			}
			
		$data['gredients'] = $this->gradients->get_Searchrecords('','','Active',$srchtxt,$srchtype); // Retrieve an array with all products
//		print_r($this->db->last_query());
		$data['content'] = 'gredients_view1'; // Select view to display
			$this->load->view('gradient_srch',$data);
		}
		
		}
    }
	function send_request()
	{
		$this->load->model('membership_model');
			if($this->membership_model->send_request())
			{
				//$this->Gallery_model->do_upload();
				$this->session->set_flashdata('message', '<div id="message_new" class="error">Request Sent Successfully.</div>');
				redirect('site/send_helpRequest');
			}
			else
			{
				$this->session->set_flashdata('message', '<div id="message_new" class="error">Request Couldnot Send.</div>');
				redirect('site/send_helpRequest');
			}
	}
	function viewRequests()
	{
		$this->load->library('pagination');
		$this->load->model('membership_model');
		
		$config['base_url'] = "/".$_SERVER['HTTP_HOST'].'/index.php/site/viewRequests';
		$config['base_url'] = '/index.php/site/viewRequests';
		$config['total_rows'] =$this->membership_model->get_num_requests();
		$config['per_page'] = 15;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
//load the model and get results
		$data = array();
		if($query = $this->membership_model->get_request_record($config['per_page'],$this->uri->segment(3)))
		{
			$data['records'] = $query;
//				print_r($query);
		}
		$this->load->view('viewRequest',$data);
	}
	function delete_request()
	{
		$this->load->model('membership_model');
//             $this->db->delete('request_history', array('id_request' => $this->uri->segment(3)));
				$this->db->set('status',"Deleted");
				$this->db->where('id_request', $this->uri->segment(3));
				$this->db->update('request_history');
				$this->session->set_flashdata('message', '<div id="message" class="success">Request Deleted </div>');
				redirect('site/viewRequests/',$query);
	}
	function close_msg()
	{
			$this->load->model('membership_model');
			if($this->membership_model->close_msg() == TRUE){
				
				// Check if user has javascript enabled
				if($this->input->post('ajax') != '1'){
					redirect('../dashboard'); // If javascript is not enabled, reload the page with new data
				}else{
					echo 'true'; // If javascript is enabled, return true, so the cart gets updated
				}
			}
			else{
				echo 'false';
				redirect('../dashboard'); 
			}
	}
	function chk_profile()
	{
			$this->load->model('membership_model');
			if($this->membership_model->chk_profile() == "TRUE"){
				
				// Check if user has javascript enabled
				if($this->input->post('ajax') != '1'){
//					redirect('../dashboard'); // If javascript is not enabled, reload the page with new data
				}else{
					echo 'true'; // If javascript is enabled, return true, so the cart gets updated
				}
			}
			else
			{
					echo 'false'; // If javascript is enabled, return true, so the cart gets updated
			
			}
	}
	function delete_user()
	{
		$this->load->model('membership_model');
		$this->membership_model->delete_account();
			if($query = $this->membership_model->delete_account())
			{
				$this->session->sess_destroy();
				redirect('../');
			}
			else
			{
				//$this->session->set_flashdata('message', '<div id="message" class="success">A database error has occured, please contact your administrator.</div>');
				redirect('site/dash_board',$query);
			}
	}
}
