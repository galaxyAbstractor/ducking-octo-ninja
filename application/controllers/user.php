<?php
class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');

	}

	public function index() {
		if($this->session->userdata('username') != "") {
			$this->userIsLoggedIn();
		} else {
			$this->loginScreen();
		}
	}

	private function register() {
		if($this->input->post("submit")){}
			$userdata = array(
				'username'	=> $this->input->post("username"),
				'password'	=> $this->input->post("password"),
				'email'		=> $this->input->post("email"),
				'city'		=> $this->input->post("city"),
				'country'	=> $this->input->post("country"),
				'birthdate'	=> $this->input->post("birthdate")
			);
			
			$request = $this->user_model->adduser($userdata);

			if($request) {
				$this->userIsLoggedIn();
			} else {
				// Username already taken
				// Retry
			}
		} else {
			$this->load->view("header");
			$this->load->view("register", array('userinfo' => $this->load->view("login","", true)));
		}
		
		
	}

	private function loginScreen() {
		$this->load->view('user/loginscreen');
		
	}
	
	private function userIsLoggedIn() {
		$this->load->view('user/loggedin');
	}

	public function login() {
		if(isset($this->input->post('submit'))) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//TODO: Encrypt password
			
			$result = $this->user_model->doLogin($username, $password);
			
			if($result) {
				$this->userIsLoggedIn();
			} else {
				$this->loginScreen();
			}
		}

	}
	
	public function logout() {
		
	}
}
?>