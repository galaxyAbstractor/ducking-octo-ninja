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

	public function show($id = null){
		$this->load->view("header");
		$this->load->view("menu");
		if(is_null($id)) {
			redirect(base_url());
		} else {
			if(!$this->session->userdata('logged_in')){
				$listings = $this->listings_model->getListings($id);
				$this->load->view("listings/show", array('userinfo' => $this->load->view("user/loginpanel","", true), 'listings' => $listings));
			} else {
				$listings = $this->listings_model->getListings($id);
				
				$this->load->view("listings/show", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), 'listings' => $listings));
			}
		}
	}
	
	public function addListing() {
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		} else {
			$this->load->view("listings/addlistings", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true)));
		}
	}
	
	public function doAdd() {
		$subject = 	$this->input->post('subject');
		$text = 	$this->input->post('message');
		
		
		if($this->session->userdata('logged_in')) {
			$query = $this->listings_model->addListing($subject, $text);
		}
		redirect(base_url().'/listings/my/');
	}

	public function book($aid = null) {
		if(is_null($aid)) {
			redirect(base_url());
		} else {
		if($this->input->post("submit") && $this->session->userdata('logged_in')){
			} else {
				$this->load->view("header");
				$this->load->view("menu");
				if(!$this->session->userdata('logged_in')) {
					redirect(base_url().'/');
				} else {
					$this->load->view("listings/book", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), "aid" => $aid));
				}
			}
		}
	}

	public function my(){
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		} else {

			$listings = $this->listings_model->getUserListings($this->session->userdata('uid'));
			$this->load->view("listings/mylist", array('userinfo' => $this->load->view("user/userpanel",array("username" => $this->session->userdata('username')), true), 'listings' => $listings));
		}
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in') OR is_null($id)){
			redirect(base_url());
		} else {
			$this->listings_model->delete($id);
			redirect(base_url().'listings/my');
		}

	}
}
?>