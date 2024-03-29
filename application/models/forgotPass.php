<?php

class Forgotpass extends CI_Model {

	
	function checkPassword(){
		$query = $this->db->query("SELECT first_name,last_name,username FROM user WHERE username=".$this->input->post("username"));
		$rs=$query->result_array();
		if ($query->num_rows() > 0)
		{
				$this->db->set('password', md5("Cal02@56"));
	
				$this->db->where('username', $this->input->post("username"));
				$this->db->update('user');
			
		}
		return TRUE;
	}
}