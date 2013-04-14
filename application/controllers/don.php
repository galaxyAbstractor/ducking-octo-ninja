<?php
class Don extends CI_Controller {

	public function index(){
		if(!$this->session->userdata('logged_in')){
			
			$this->load->view("header");
			$this->load->view("menu");
			$this->load->view("index", array('userinfo' => $this->load->view("user/loginpanel","", true)));
			
			
		} else {
			$this->load->view("header");
			$this->load->view("menu");
			$this->load->view("index", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true)));
		}
	}
}
?>