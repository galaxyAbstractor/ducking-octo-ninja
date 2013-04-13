<?php
class Listings extends CI_Controller {

	function __construct() {
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
	
	public function addListing() {
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')) {
			$this->load->view("index", array('userinfo' => $this->load->view("user/loginpanel","", true)));
		} else {
			$this->load->view("listings/addlistings", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true)));
		}
	}
	
	public function doAdd() {
		$subject = $this->input->post('subject');

		if($this->session->userdata('logged_in')) {
			$query = $this->listings_model->addListing($subject);
		}
		redirect(base_url().'/listings/addlisting/');
	}
}
?>