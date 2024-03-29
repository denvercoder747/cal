<?php

/*Controller to load forgotPassword.php - view */

class ForgotPassword extends CI_Controller {

	function index() {
		
		$this->load->view('front/forgotPassword');
		
	}
	function sendMail() {
		
			$this->load->model('membership_model');
			if($query = $this->membership_model->checkPassword())
			{
				//$this->Gallery_model->do_upload();
				$this->session->set_flashdata('message', '<div id="message" class="error">Your new Password has been sent to your email-id.</div>');
				redirect('forgotPassword/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div id="message" class="error">The Email Id you entered is not registered with calcipe.</div>');
				redirect('forgotPassword/');
			}
		
		
	}
	
}


?>