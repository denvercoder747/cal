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
	}

	function members_area()
	{
		$this->load->view('includes/add_recipe_header');
		$this->load->view('logged_in_area');
		$this->load->view('includes/footer');
	}
	function gredients()
	{
		$this->load->library('pagination');
		$this->load->model('gradients');
//load the View and Show results
		$this->load->view('gredients_view');
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
	function dash_board()
	{
		$this->load->model('membership_model');
//load the View and Show results
		$this->load->view('includes/header_dashboard');
		$this->load->view('dashboard');
		$this->load->view('includes/footer');
	}
	function recipe()
	{
		$this->load->library('pagination');
		$this->load->model('membership_model');
		
		$config['base_url'] = $_SERVER['HTTP_HOST'].'/index.php/site/recipes';
		$config['total_rows'] =$this->membership_model->get_num_records();
		$config['per_page'] = 5;
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
		$this->load->view('includes/header_recipe');
		$this->load->view('recipes',$data);
		$this->load->view('includes/footer');
	}
	function delete_recipe()
	{
		$this->load->model('membership_model');
		$this->membership_model->delete_row();
		redirect('site/dash_board');
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
		$this->load->view('includes/header_recipe');
		$this->load->view('view_recipe',$data);
		$this->load->view('includes/footer');
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
//load the View and Show results
		$this->load->view('includes/edit_recipe_header');
		$this->load->view('edit_recipe',$data);
		$this->load->view('includes/footer');
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../home">Login</a>';	
			die();		
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
		return $query;
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

}
