<?php
class Listings extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('listings_model');

	}
	public function index(){
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')){
			$listings = $this->listings_model->getListings();
			$this->load->view("listings/list", array('userinfo' => $this->load->view("user/loginpanel","", true), 'listings' => $listings));
		} else {
			$listings = $this->listings_model->getListings();
			$this->load->view("listings/list", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), 'listings' => $listings));
		}
	}

	public function show($id){
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')){
			$listings = $this->listings_model->getListings($id);
			$this->load->view("listings/show", array('userinfo' => $this->load->view("user/loginpanel","", true), 'listings' => $listings));
		} else {
			$listings = $this->listings_model->getListings($id);
			$this->load->view("listings/show", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), 'listings' => $listings));
		}
	}
}
?>