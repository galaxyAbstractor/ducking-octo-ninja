<?php

class Usersettings extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('usersettings_model');
	}
	
	function getUser() {
		
		if($this->session->userdata('logged_in')){
			
		}
	}
	
	function setUserData($param) {
		if($this->session->userdata('logged_in')){
				
		}
	}
	
}

?>