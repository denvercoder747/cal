<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();

    }

	function delete(){
        $data['delete_me']=$_POST['id'];
    
        if (!empty($data['delete_me'])){
            $this->load->model('message_model', '', TRUE);
            $this->properties->deleteElevations($data['delete_me']);
            $this->output->set_output('works');
        } else {
            $this->output->set_output('dontwork');

        }
    }
}

?>

