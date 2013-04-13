<?php
class Don extends CI_Controller {

	public function index(){
		$this->load->view("header");
		$this->load->view("index", array('userinfo' => $this->load->view("login","", true)));
	}
}
?>