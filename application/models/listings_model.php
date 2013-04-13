<?php

class Listings_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function addListing($subject) {
		if($this->session->userdata('logged_in')) {
			$user = $this->session->userdata('username');
			//$query = $this->db->query("SELECT id FROM users WHERE username = '$user'");
			
			$this->db->select('id');
			$this->db->where('username', $user);
			$q = $this->db->get('users');
			$data = array_shift($q->result_array());
			$q = $data['id'];
			
			
			$listingdata = array(
					'user'					=>	$q,
					'conversationSubject'	=>	$subject
			);
			
			$this->db->insert('available', $listingdata);
			return true;
		} else {
			return false;
		}

	}
	
}

?>