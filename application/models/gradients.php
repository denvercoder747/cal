<?php

class Gradients extends CI_Model {

	
	function retrieve_gredients(){
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get();
		return $query->result();
	}
	function retrieve_gredient($id){
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
		$this->db->where('gradient_id', $id);
		$this->db->order_by("name", "asc"); 
		$query = $this->db->get();
//				print_r($this->db->last_query());exit;
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
		$this->db->where('user_id', $this->session->userdata('user_id')); // Select where id matches the posted id
		$query = $this->db->get('gradients_list', 1); // Select the products where a match is found and limit the query by 1
//				print_r($this->db->last_query());exit;
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
		$this->db->where('user_id =', $this->session->userdata('user_id'));
		$query = $this->db->get('gradients_list', 1); // Select the products where a match is found and limit the query by 1
//				print_r($this->db->last_query());exit;
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
			
			$gAmt=($rateRow/$measure)*$qtyRow;
			$this->db->set('name', $ingRow);
//			$this->db->set('quantity', $qtyRow);
//			$this->db->set('measure', $measure1);
//			$this->db->set('unit', $measure);
			$this->db->set('price', $rateRow);
//			$this->db->set('amount', $gAmt);
//			$this->db->set('amount', '(quantity/unit)*price');

			$this->db->where('id_gredient', $ingId);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('gradients');
	$query3 = $this->db->query("UPDATE gradients SET amount=(quantity/unit)*price WHERE user_id=".$this->session->userdata('user_id')." AND id_gredient=".$ingId);
			
	//			print_r($this->db->last_query());
				return TRUE;//exit;
		
		// Nothing found! Return FALSE!	
		}else{
			return FALSE;
		}
	}
	
	function update_re()
	
	{
		$this->db->distinct('recipe_id');
		$this->db->where('id_gredient =', $this->input->post('ingId'));
		$this->db->where('user_id =', $this->session->userdata('user_id'));
		$query = $this->db->get('gradients'); // Select the products where a match is found and limit the query by 1
		$query1 =$query->result();
//				print_r($this->db->last_query());exit;
		return $query1;
	}
	function update_re1($rcpID)
	
	{
		$indent=230;
		$total=0;
		$total_amt=0;
		$total_rate=0;
		$query = $this->db->query("SELECT * FROM recipe WHERE recipe_id=".$rcpID." AND user_id=".$this->session->userdata('user_id'));
		$rs=$query->result_array();
			$query1 = $this->db->query("SELECT * FROM gradients WHERE recipe_id=".$rcpID);
			foreach ($query1->result_array() as $row)
			{
			   $total+=($row['quantity']*(1/$row['unit']));
			   $total_amt+=($row['quantity']*(1/$row['unit']))*$row['price'];
			   $total_rate+=+$row['price'];
			}			
			$cook_loss_weight=$total*($rs[0]['food_loss']/100);
			$finished_product=($total-$cook_loss_weight);
			$per_kg_cost=$total_amt/$finished_product;
			$no_of_pieces=($finished_product/$rs[0]['Weight_portion']);
			$per_piece_cost=$total_amt/$no_of_pieces;
			$yield=$total/$no_of_pieces;
			$new_formula=$indent/$yield;
			$finished_cost=$per_piece_cost*($rs[0]['profit']/100);
			$sell_per_kg_cost=$per_kg_cost*($rs[0]['profit']/100);
			$total_weight=$indent/$yield;
			
	//		exit;


            $this->db->set('quantity', $total);
			$this->db->set('gradient_price', $total_amt);
			$this->db->set('weight', $total);
			$this->db->set('Finished_weight', $finished_product);
			$this->db->set('cost_per_piece', $per_piece_cost);
			$this->db->set('total_number', $no_of_pieces);
			$this->db->set('yield', $yield);
			$this->db->set('selling_price', $finished_cost);
			$this->db->set('kilo_price', $sell_per_kg_cost);

			$this->db->where('recipe_id',$rcpID);
			
			$this->db->update('recipe');
		//		print_r($this->db->last_query());//exit;
		return $query1;
				//print_r($this->db->last_query());
	}
	
	function validate_update_gredient_itemAll(){
		
		$totrow=$this->input->post('total_row'); 
		$ten_input=$this->input->post("ten_input");
		$first_input=$this->input->post("first_input");
		$second_input=$this->input->post("second_input");
		$third_input=$this->input->post("third_input");
		$measure2=$this->input->post("measure1");
		$fourth_input=$this->input->post("fourth_input");
		$fifth_input=$this->input->post("fifth_input");
		$six_input=$this->input->post("six_input");
		$seven_input=$this->input->post("seven_input");
		$eight_input=$this->input->post("eight_input");
		$ten_input=$this->input->post("ten_input");
		for($i=0;$i<=$totrow-1;$i++)
		{
			$ingId = $ten_input[$i]; 
			$ingRow = $first_input[$i]; 
			$qtyRow = $second_input[$i]; 
			$measure = $third_input[$i]; 
			$measure1 = $measure2[$i]; 
			$rateRow = $fourth_input[$i]; 
			$amtKg = $fifth_input[$i]; 
			$purFrom = $six_input[$i]; 
			$brand = $seven_input[$i]; 
			$contact = $eight_input[$i]; 
			
			$this->db->where('name', $ingRow);
			$this->db->where('gradient_id !=', $ingId);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$query = $this->db->get('gradients_list', 1); // Select the products where a match is found and limit the query by 1
	//			print_r($this->db->last_query());
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
	//				print_r($this->db->last_query());
					//return TRUE;//exit;
	//		print_r($this->db->last_query());
			// Nothing found! Return FALSE!	
//				print_r($this->db->last_query());
			}else{
//				print_r($this->db->last_query());exit;
//				echo $ingId;exit;
				return FALSE;
			}
				

		}return TRUE;
	}
	function get_Searchrecords($num, $offset,$cond,$txt,$type)
	{
		if($type=="recipe"){
		$this->db->or_like('name', $txt);
		$this->db->where('status', $cond);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get($type, $num, $offset);
	//			print_r($this->db->last_query());exit;
		return $query->result();
		}
		if($type=="ingredients"){
		$this->db->or_like('name', $txt);
		$this->db->where('user_id', $this->session->userdata('user_id'));
//		$this->db->where('status', $cond);
		$query = $this->db->get("gradients_list", $num, $offset);
	//			print_r($this->db->last_query());exit;
		return $query->result();
		}
				//echo '<i>';
//				echo '</i>';
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