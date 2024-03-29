<?php

class Gradients extends CI_Model {

	
	function retrieve_gredients(){
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
		$query = $this->db->get();
		return $query->result();
	}
	function validate_add_gredient_item(){
		
		$ingRow = $this->input->post('ingRow'); 
		$qtyRow = $this->input->post('qtyRow'); 
		$measure = $this->input->post('measure'); 
		$measure1 = $this->input->post('measure1'); 
		$rateRow = $this->input->post('rateRow'); 
		$amtKg = $this->input->post('amtKg'); 
		$purFrom = $this->input->post('purFrom'); 
		$brand = $this->input->post('brand'); 
		$contact = $this->input->post('contact'); 
		$purFrom = $this->input->post('purFrom'); 
		
		$this->db->where('name', $ingRow); // Select where id matches the posted id
		$query = $this->db->get('gradients_list', 1); // Select the products where a match is found and limit the query by 1
		// Check if a row has been found
		if($query->num_rows < 1){
		
			    $data = array(
               		'user_id'      => $this->session->userdata('user_id'),
               		'name'     => $ingRow,
               		'quantity'   => $qtyRow,
               		'measure'   => $measure1,
               		'measure_amt'   => $measure,
               		'price'   => $rateRow,
               		'amount_kg'   => $amtKg,
               		'purchased_from'   => $purFrom,
               		'brand'   => $brand,
               		'contact'   => $contact,
               		'created_date'   => date('Y-m-d'),
               		'updated_date '   => date('Y-m-d'),
               		'status'   => 'Active'
            	);

				$this->db->insert('gradients_list',$data); 
				
				return TRUE;
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}
	function validate_update_gredient_item(){
		
		$ingId = $this->input->post('ingId'); 
		$ingRow = $this->input->post('ingRow'); 
		$qtyRow = $this->input->post('qtyRow'); 
		$measure = $this->input->post('measure'); 
		$measure1 = $this->input->post('measure1'); 
		$rateRow = $this->input->post('rateRow'); 
		$amtKg = $this->input->post('amtKg'); 
		$purFrom = $this->input->post('purFrom'); 
		$brand = $this->input->post('brand'); 
		$contact = $this->input->post('contact'); 
		$purFrom = $this->input->post('purFrom'); 
		
		$this->db->where('name', $ingRow);
		$this->db->where('gradient_id !=', $ingId);
		$query = $this->db->get('gradients_list', 1); // Select the products where a match is found and limit the query by 1
		// Check if a row has been found
		if($query->num_rows < 1){
		
			$this->db->set('name', $ingRow);
			$this->db->set('quantity', $qtyRow);
			$this->db->set('measure', $measure1);
			$this->db->set('measure_amt', $measure);
			$this->db->set('price', $rateRow);
			$this->db->set('amount_kg', $amtKg);
			$this->db->set('purchased_from', $purFrom);
			$this->db->set('brand', $brand);
			$this->db->set('contact', $contact);
			$this->db->set('updated_date', date("Y-m-d"));

			$this->db->where('gradient_id', $ingId);
			$this->db->update('gradients_list');
				return TRUE;exit;
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}
/*	function get_num_records()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('recipe')->num_rows();
		return $query;
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
	function get_gradients_list()
	{
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
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
*/	
}