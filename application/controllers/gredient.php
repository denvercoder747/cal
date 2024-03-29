<?php

class Gredient extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	}
	function index()
	{
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
//		print_r($this->db->last_query());
		$data['content'] = 'gredients_view1'; // Select view to display
		$data['content2'] = 'gredients_view2'; // Select view to display
//		$this->load->view('includes/gredient_header');
		$this->load->view('gredients_view', $data); // Display the page
//		$this->load->view('includes/footer');
	}
	function edit_Allrecipe()
	{
		
			$this->load->model('gradients');
			if($query = $this->gradients->edit_allrecipe())
			{
				//$this->Gallery_model->do_upload();
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Information Updated Successfully.</div>');
				redirect('gredient/');
			}
			else
			{
				$this->session->set_flashdata('message', '<div id="message" class="error">Recipe Information Updated Successfully.</div>');
				redirect('gredient/');
			}
		
	}
	function gredient_edit()
	{
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
		if($query = $this->gradients->retrieve_gredient($this->uri->segment(3)))
		{
			$data['records'] = $query;
		//print_r($_SESSION);
		}
		//print_r($_SESSION);
//		print_r($this->db->last_query());
		$data['content'] = 'gredients_view1'; // Select view to display
		$data['content2'] = 'gredients_view2'; // Select view to display
	//	$this->load->view('includes/gredient_edit');
		$this->load->view('edit_gredient', $data); // Display the page
		$this->load->view('includes/footer');
	}
	
//	function gredient_checktest()
//	{
//		$this->load->model('gradients');
//		if($data = $this->gradients->update_re())
//		{
//		//print_r($data); // Retrieve an array with all products
//		 for($i=0;$i<count($data);$i++)
//		 {
//			$this->gradients->update_re1($data[0]->recipe_id);
//		//	print_r($data[0]->recipe_id);
//			 
//		 }
//		}
//	}
	
	function add_new()
	{
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
//		print_r($this->db->last_query());
		$this->load->view('gredients_add'); // Display the page
	}
	
	function add_gredient(){

			$this->load->model('membership_model');
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->add_ingredient=="Yes")
		{
			$this->load->model('gradients');
			if($this->gradients->validate_add_gredient_item() == TRUE){
				
				// Check if user has javascript enabled
				if($this->input->post('ajax') != '1'){
					redirect('gredient'); // If javascript is not enabled, reload the page with new data
				}else{
					echo 'true'; // If javascript is enabled, return true, so the cart gets updated
				}
			}
			else{
				echo 'false';
				redirect('gredient'); 
			}
			
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
		
		
	}
	function edit_gredient(){
			$this->load->model('membership_model');
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->edit_ingredient=="Yes")
		{
			$this->load->model('gradients');
			if($this->gradients->validate_update_gredient_item() == TRUE){
					$this->load->model('gradients');
					if($data = $this->gradients->update_re())
					{
					//print_r($data); exit;// Retrieve an array with all products
					 for($i=0;$i<count($data);$i++)
					 {
						$this->gradients->update_re1($data[$i]->recipe_id);
						//print_r($data[0]->recipe_id);
						 
					 }
					}//exit;
					// Show/Hide Message after Update
					
			//		$this->session->set_flashdata('message1', '<div id="message">Gredient  Updated Successfully.</div>');
					redirect('gredient');
				// Check if user has javascript enabled
				if($this->input->post('ajax') != '1'){
					redirect('gredient'); // If javascript is not enabled, reload the page with new data
				}else{
					echo 'true'; // If javascript is enabled, return true, so the cart gets updated
				}
			}
			
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
		
		
	}
	function edit_gredientAll(){
			$this->load->model('membership_model');
			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
			$rs_member=$query_member->result_array();
		$this->db->where('recipe_type', $rs_member[0]['member_type']);
		$this->db->where('recipe_value', $rs_member[0]['level']);
		$query3 = $this->db->get('recipe_limits');
		$rs2=$query3->result();
		
		//Query for Benefit Check
		if($rs2[0]->edit_ingredient=="Yes")
		{
			$this->load->model('gradients');
			if($this->gradients->validate_update_gredient_itemAll() == TRUE){
				
	//				$this->session->set_flashdata('message1', '<div id="message">Gredient  Updated Successfully.</div>');
					redirect('gredient');
				// Check if user has javascript enabled
				if($this->input->post('ajax') != '1'){
					redirect('gredient'); // If javascript is not enabled, reload the page with new data
				}else{
					echo 'true'; // If javascript is enabled, return true, so the cart gets updated
				}
			}
			else
			{
					$this->session->set_flashdata('message1', '<div id="message">Gredient  Cannot Updated.</div>');
					redirect('gredient');
			}
			
		}
		else
		{
				redirect("/site/upgrade_member");
			
		}
		
		
	}
	function show_gredient(){
		$this->load->model('gradients');
		$data['gredients'] = $this->gradients->retrieve_gredients(); // Retrieve an array with all products
		$this->load->view('gredients_view1',$data);
	}
	function auto_search()
	{
		$this->load->view('auto_search2'); // Display the page
	}
public function searching() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
                echo "<ul>";
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
//						echo "<li>Ingredients</li>";
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onMouseover=\"fill_over('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\" onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\">".$keyword->name."</li>";
                }
 //               echo '</ul>';
            }
			else
			{
//						echo "<li><a href=\"#\" onclick=\"javascript:void window.open('../gredient/add_new','1317104463241','width=800,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=200');return false;\">Add this Ingredient</a></li>";
 echo '<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$("a[rel*=facebox]").facebox({
		loadingImage : "/images/loading.gif",
		closeImage   : "/images/close.png"
		})
	});
	</script>';
						echo "<a href=\"../gredient/add_new\"  rel=\"facebox\" onclick=\"drop_close(".$this->input->post('Id').");\">Add this Ingredient</a>";
			}
                echo '</ul>';
        } 
    }  	
public function searching_multi() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('recipe');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('user_id', $this->session->userdata('user_id'));
            $query_rcp = $this->db->get();
			
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
                echo "<ul>";
            if ($query_rcp->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
//						echo "<li>Recipes</li>";
                foreach ($query_rcp->result() as $keyword1) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onMouseover=\"fill_over('".$keyword1->name."',".$this->input->post('Id').",'".$keyword1->quantity."','".$keyword1->gradient_price."','".$keyword1->kilo_price."','KiloGram','".$keyword1->recipe_id."')\"  onClick=\"fill_rcp('".$keyword1->name."',".$this->input->post('Id').",'".$keyword1->quantity."','".$keyword1->gradient_price."','".$keyword1->kilo_price."','KiloGram','".$keyword1->recipe_id."')\">".$keyword1->name."</li>";
                }
 //               echo '</ul>';
            }
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
//						echo "<li>Ingredients</li>";
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onMouseover=\"fill_over('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\" onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\">".$keyword->name."</li>";
                }
 //               echo '</ul>';
            }
			else
			{
//						echo "<li><a href=\"#\" onclick=\"javascript:void window.open('../gredient/add_new','1317104463241','width=800,height=150,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=200,top=200');return false;\">Add this Ingredient</a></li>";
 echo '<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$("a[rel*=facebox]").facebox({
		loadingImage : "/images/loading.gif",
		closeImage   : "/images/close.png"
		})
	});
	</script>';
						echo "<a href=\"/index.php/gredient/add_new\"  rel=\"facebox\"  onclick=\"drop_close(".$this->input->post('Id').");\">Add this Ingredient</a>";
			}
                echo '</ul>';
        } 
    }  	
public function searching_cont() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
//		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
					$i=0;
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."')\">".$keyword->name."</li>";
						$a[$i++]= $keyword->name;
                }
					
//					print_r($a);
					$possibilities = array();
					foreach ($a as $term) {
					if (strpos(strtolower($term), strtolower($this->input->post('hint')))=== 0) {
					$possibilities[] = "'". str_replace("'", "\\'", $term)."'";
					}
					}
					print ('['. implode(', ', $possibilities) .']');
            }
        } 
    }  	
public function searching3() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->like('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
                foreach ($query->result() as $keyword) {
                    // Format the results, im using <li> for the list, you can change it.     
//						echo "<li class=\"tagadd\">".$keyword->name."</li>";
						echo "<li onMouseover=\"fill_over('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\" onClick=\"fill('".$keyword->name."',".$this->input->post('Id').",'".$keyword->quantity."','".$keyword->price."','".$keyword->amount_kg."','".$keyword->measure."','".$keyword->gradient_id."')\">".$keyword->name."</li>";
                }
 //               echo '</ul>';
            }
			else
			{
//						echo "<li><a href=\"#\" onclick=\"javascript:void window.open('../../gredient/add_new','1317104463241','width=700,height=200,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;\">Add this Ingredient</a></li>";
 echo '<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		//for Popup window
		$("a[rel*=facebox]").facebox({
		loadingImage : "/images/loading.gif",
		closeImage   : "/images/close.png"
		})
	});
	</script>';
						echo "<a href=\"../../gredient/add_new\"  rel=\"facebox\" onclick=\"drop_close(".$this->input->post('Id').");\">Add this Ingredient</a>";
			}
        } 
    }  	
public function searching2() {
        //Set validation rules for the form input
		$this->load->library('form_validation');
        $this->form_validation->set_rules('queryString', 'queryString', 'required|trim|min_length[1]|xss_clean');

        // Validate all of the input, if it passes then show results
        if($this->form_validation->run() !== FALSE) {
		$this->db->select('*');
		$this->db->from('gradients_list');
		$this->db->where('name', $this->input->post('queryString')); 
		$this->db->where('gradients_list.user_id', $this->session->userdata('user_id'));
            $query = $this->db->get();
//echo $this->db->last_query();
            if ($query->num_rows() > 0) {
                // While there are results loop through them
//                echo '<ul>';
                foreach ($query->result() as $keyword) {
					$search=array("name" => $keyword->name, 
						  "id" => $this->input->post('Id'),
						  "quantity" => $keyword->quantity,
						  "price" => $keyword->price,
						  "amount_kg" => $keyword->amount_kg,
						  "measure" => $keyword->measure
						  );

                }
            }
				else
				{
					$search=array( 
						  "id" => $this->input->post('Id')
						  );
					
				}
				print_r(json_encode($search));
        } 
    }  	
	function import_ex()
	{
		
		$this->load->view('excelwriter');
		$times  = time ();  
		//$fileName = date("g-i-s-A_F_jS_Y",$times)."_monthlyReport.xls";
		$fileName = "gredient_".$this->session->userdata('user_id').".xls";
		$excel=new ExcelWriter($fileName);
// All Artist Monthly Report query
if($excel==false)	
		echo $excel->error;
		$myArr=array("<b>Gradient Name</b>","<b>Quantity</b>","<b>Measure</b>","<b>Rate</b>","<b>Amount Per KG</b>","<b>Purchased From</b>","<b>Brand</b>","<b>Contact</b>");
		$excel->writeLine($myArr);
		$myArr=array("","","");
		$excel->writeLine($myArr);
		$cnt = 1;
		$query = $this->db->query("SELECT name,quantity,measure,Price, amount_kg,purchased_from,brand,contact FROM gradients_list WHERE user_id=".$this->session->userdata('user_id')." ORDER BY name ");
		
		foreach ($query->result_array() as $row)
		{
				$myArr=$row;
			//	print_r($row);
				$excel->writeLine($myArr);
				$cnt = $cnt + 1;
		   
		}		
	$excel->close();
	redirect(base_url()."/".$fileName);
/*//	echo "Monthly Report is write into montlyReport.xls Successfully.";	
//		$this->load->view('import');
		//$this->load->model('gradients');
//		$this->load->view('import');
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$fileName");
		header ('Content-Transfer-Encoding: binary');
		header ('Content-Length: '.filesize($fileName));
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header ('Cache-Control: cache, must-revalidate');
		header ('Pragma: public'); 		
*/	}
	function promptToDownload()
	{
	$path="/gredient.xls" ;
	$browserFilename="mygredient.xls"; 
	$mimeType="application/vnd.ms-excel";
		if (!file_exists($path) || !is_readable($path)) {
		
		return null;
		}
		header("Content-Type: " . $mimeType);
		header("Content-Disposition: attachment; filename=\"$browserFilename\"");
		header('Expires: ' . gmdate('D, d M Y H:i:s', gmmktime() - 3600) . ' GMT');
		header("Content-Length: " . filesize($path));
		// If you wish you can add some code here to track or log the download
		
		// Special headers for IE 6
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		$fp = fopen($path, "r");
		fpassthru($fp);
	}
	function export_ex()
	{
		$this->load->view('excel_reader3');
		$this->load->view('example2');
	}
	function export_ex1()
	{
			$this->load->view('export2');
//			$this->load->model('membership_model');
//			$query_member = $this->db->query("SELECT member_type,level FROM user WHERE user_id=".$this->session->userdata('user_id'));
//			$rs_member=$query_member->result_array();
//		$this->db->where('recipe_type', $rs_member[0]['member_type']);
//		$this->db->where('recipe_value', $rs_member[0]['level']);
//		$query3 = $this->db->get('recipe_limits');
//		$rs2=$query3->result();
//		
//		//Query for Benefit Check
//		if($rs2[0]->add_ingredient=="Yes")
//		{
//		}
//		else
//		{
//				redirect("/site/upgrade_member");
//			
//		}
		
	}
     public function searchRecipe()
    {
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
			$this->load->view('recipes',$data);
		}
		if($srchtype=="ingredients")
		{
			if($query = $this->gradients->get_Searchrecords('','','Active',$srchtxt,$srchtype))
			{
				$data['records'] = $query;
			}
			$this->load->view('admin_Allusers',$data);
		}
		
		}
    }
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo "You don\'t have permission to access this page. <a href=\"".$this->config->item('base_url')."\">Login</a>";	
			die();		
			//$this->load->view('login_form');
		}		
	}	
}
