<?php

class Usersettings extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('usersettings_model');
	}
	
	function index() {
		$this->load->view("header");
		$this->load->view("menu");
		
		if($this->session->userdata('logged_in')){
			$settings = $this->usersettings_model->get();
			$settings = $settings[0];
			$this->load->view("user/settings", 
					array(
							'userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), 
							"settings" => $settings));
		} else {
		
		}
	}
	
	
	function setUserData() {
		if($this->session->userdata('logged_in')){
				
		}
	}
	
	function upload() {
		if($this->input->post('submitimg')) {
			$config['upload_path'] = '././uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '100';
			$config['max_height']  = '100';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload()) {
				redirect(base_url().'');
			} else {
				
				$data = array('upload_data' => $this->upload->data());
				$data = $data['upload_data'];
				$data = $data['file_name'];
				//var_dump($data);
				$this->usersettings_model->setavatar($data);
				//$this->load->view('upload_success', $data);
				redirect(base_url().'/usersettings');
			}
		}

	}
	
}

?>