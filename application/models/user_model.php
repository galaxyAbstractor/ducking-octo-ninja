<?php

class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function doLogin($username, $password) {
		$query = $this->db->query("SELECT * FROM Users WHERE username = '$username' AND password = '$password'");
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function addUser($userdata) {
		$query = $this->db->query("SELECT username FROM users WHERE username = '$userdata[username]'");
		if($query->num_rows() > 0) {
			return false;
		} else {
			$this->db->insert('users', $userdata);
			return true;
		}
	}
}

?>