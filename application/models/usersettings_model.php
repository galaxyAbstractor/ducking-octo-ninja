<?php

class Usersettings_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function set($user, $data) {
		
	}
	
	function get() {
		$user = $this->session->userdata('username');
		$query = "SELECT * FROM users WHERE users.username = '$user'";
		$query = $this->db->query($query);
		
		
		if($query->num_rows() > 0) {
			$query = $query->result_array();
			return $query;
		}
	}
	
	function setAvatar($path) {
		$user = $this->session->userdata('username');
		
		$avatar = array('avatar' => '././uploads/'.$path);
		$this->db->where('username', $user);
		$this->db->update('users', $avatar);
		
		redirect(base_url().'usersettings');
	}
}


?>