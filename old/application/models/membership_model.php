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
	
	function create_member()
	{
		$middle_name=$this->input->post('middle_name');
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $middle_name,
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),			
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
			'member_type' => "FREE",
			'level' => $this->input->post('level'),
			'language' => $this->input->post('lang'),
			'total_amt' => $this->input->post('total_amount'),
			'payment_method' => $this->input->post('payment_method'),
			'created_date' => date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'status' => 'Active'						
		);
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('user');
		
		if($query->num_rows == 1)
		{
            $this->session->set_flashdata('registration_error', '<div id="message" class="error">"'.$this->input->post('username').'" Name Already Exists!!!.</div>');
	        redirect('home/create_member');
		}
		else
		{
			$insert = $this->db->insert('user', $new_member_insert_data);
			return $insert;
		
		}
	}
	function add_recipe()
	{
			$this->Gallery_model->do_upload();		
				  $image_name="noimage.jpeg";
			if ($this->upload->data())
			  {
				$image = array('upload_data' => $this->upload->data());
				$image_name=$image['upload_data']['file_name'];
			  } 
			  else
			  {
				  $image_name="noimage.jpeg";
			  }
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
			'cost_per_piece' => $this->input->post('per_pc_cost'),
			'total_number' => $this->input->post('numbers'),
			'yield' => $this->input->post('yield'),
			'profit' => $this->input->post('profit'),
			'selling_price' => $this->input->post('selling_price'),
			'kilo_price' => $this->input->post('per_kilo_cost'),
			'created_date' =>date("Y-m-d"),
			'updated_date' => date("Y-m-d"),
			'photo_id' => "",
			'status' => 1);						
			$insert = $this->db->insert('recipe', $new_recipe_insert_data);
			
			/* SELECT FOR RECENT INSERT ID  */
			
//			$this->db->select('recipe_id, user_id');
//			$this->db->from('recipe');
//			$this->db->where('user_id', 1);
//			$this->db->order_by("recipe_id", "desc"); 
//			$this->db->limit(1);
			$id = $this->db->insert_id();	
			
			//$query = $this->db->get();
//			$query = $this->db->get('user');
    $tot_row = $this->input->post('tot_row');
    $tot_qty = $this->input->post('tot_qty');
    $tot_amt = $this->input->post('tot_amt');
	$ingRow = $this->input->post('ingRow');
	$qtyRow = $this->input->post('qtyRow');
	$rateRow = $this->input->post('rateRow');
	$amtRow = $this->input->post('amtRow');
	$unitRow = $this->input->post('unitRow');
	$measureRow = $this->input->post('measureRow');
for($i=0; $i<sizeof($ingRow); $i++){

		    $new_gradient_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'recipe_id' => $id,
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
			return $this->input->post();
	}
	function get_num_records()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
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
			$this->db->set('first_name', $this->input->post('first_name'));
			$this->db->set('middle_name', $this->input->post('middle_name'));
			$this->db->set('email', $this->input->post('email'));
			$this->db->set('company', $this->input->post('company'));
			$this->db->set('country_name', $this->input->post('country'));
			$this->db->set('state_name', $this->input->post('state'));
			$this->db->set('city_name', $this->input->post('city'));
			$this->db->set('zip', $this->input->post('zip'));
			$this->db->set('address1', $this->input->post('address'));
			$this->db->set('address2', $this->input->post('address2'));
			$this->db->set('contact_no', $this->input->post('phone'));
			$this->db->set('language', $this->input->post('lang'));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('user_id', $this->session->userdata('user_id'));
			
			$this->db->update('user');
//			echo $this->db->last_query();
		return $this->db->affected_rows();
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
			//$this->Gallery_model->do_upload();		
			//$image = array('upload_data' => $this->upload->data());
			if (!empty($_FILES['userfile']['name']))
        {

                    unlink(realpath('images/thumbs').'/'.$this->input->post('T3'));
                    unlink(realpath('images').'/'.$this->input->post('T3'));
			$this->Gallery_model->do_upload();		
			$image = array('upload_data' => $this->upload->data());
			$new_filename=$image['upload_data']['file_name'];
        }
		else
		{
			$new_filename=$this->input->post('T3');
			
		}
			
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
			$this->db->set('cost_per_piece', $this->input->post('per_pc_cost'));
			$this->db->set('total_number', $this->input->post('numbers'));
			$this->db->set('yield', $this->input->post('yield'));
			$this->db->set('profit', $this->input->post('profit'));
			$this->db->set('selling_price', $this->input->post('selling_price'));
			$this->db->set('kilo_price', $this->input->post('per_kilo_cost'));
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('recipe_id', $this->input->post('rcpId'));
			
			$this->db->update('recipe');
//			echo $this->db->last_query();
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
for($i=0; $i<sizeof($ingRow); $i++){

		    $new_gradient_data = array(
			'user_id' => $this->session->userdata('user_id'),
			'recipe_id' => $id,
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
	
}