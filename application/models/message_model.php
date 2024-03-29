<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status', 'Active');
//		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('user');
//						print_r($this->db->last_query());
		if($query->num_rows() == 1)
		{
			$row=$query->row_array();
			$data = array(
				'user_id' => $row['user_id'],
				'username' => $row['username'],
				'firstname' => $row['first_name'],
				'lastname' => $row['last_name'],
//				'profit_amt' => $row['profit'],
				'is_logged_in' => true
			);
//			 $uid=$row['user_id'];
//			 return $uid;
			return $data;
		}
		
	}
	function validate_Admin()
	{
		if($this->input->post()){
		$this->db->where('username', $this->input->post('username'));
//		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('admin');
	//					print_r($this->db->last_query());exit;
		if($query->num_rows == 1)
		{
			$row=$query->row_array();
			$data = array(
				'adminId' => $row['user_id'],
				'username' => $row['username'],
				'firstname' => $row['first_name'],
				'lastname' => $row['last_name'],
//				'profit_amt' => $row['profit'],
				'is_logged_in' => true
			);
//			 $uid=$row['user_id'];
//			 return $uid;
			return $data;
		}
		}
		
	}
    public function add_message()
    {
        $data=array(
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'message'=>$_POST['message']
            );
        $this->db->insert('message',$data);
    }
    public function signIn()
    {
		$name=$_POST['username'];
		$password=$_POST['password'];
		$status="Active";
		$this->db->where('username', $name);
		$this->db->where('password', $password);
		$this->db->where('status', $status); 
		$query=$this->db->get('user');
		//return $query->result();
		$this->load->helper('url');
		if ($query->num_rows() > 0)
		{
		return 1;
		//redirect("/home/succesLogin");
		}
		else
		{
		return 2;
		//redirect("/home/logerror");
		}
    }
	public function get_all()
	{
		$query=$this->db->get('message');
		return $query->result();
	}
}
?>

