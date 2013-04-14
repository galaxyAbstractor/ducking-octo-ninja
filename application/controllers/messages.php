<?php
class Messages extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('message_model');

	}

	public function index() {
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		} else {
			$messages = $this->message_model->listmessages($this->session->userdata('uid'));
			$this->load->view("messages/list", array("messages" => $messages));
		}
	}

	public function show($id) {
		$this->load->view("header");
		$this->load->view("menu");
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url());
		} else {
			$message = $this->message_model->getMessage($id);
			$this->load->view("messages/show", array("message" => $message));
		}
	}

	public function reply($id) {
		$this->load->view("header");
		$this->load->view("menu");
		if($this->input->message){
			$this->message_model->addMessage($this->input->mid, $this->input->message);
		} else {
			if(!$this->session->userdata('logged_in')) {
				redirect(base_url());
			} else {
				$this->load->view("messages/reply", array("mid" => $id));
			}
		}
	}

}
?>