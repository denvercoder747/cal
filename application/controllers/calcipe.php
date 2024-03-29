<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calcipe extends CI_Controller{

    public function __construct(){
        parent::__construct();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

    }

     public function index()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Calcipe';
		$this->load->view('front/index',$data);
    }
     public function relogin()
    {
			if($this->session->userdata('username'))
			{
			redirect('site/dash_board');
			}
		$this->load->helper('url');
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Calcipe';
		$this->load->view('front/relogin',$data);
    }
}

?>

