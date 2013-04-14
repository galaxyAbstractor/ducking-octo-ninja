<?php

class Listings_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	public function addListing($subject, $text) {
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
					'conversationSubject'	=>	$subject,
					'text'					=>	$text
			);
			
			$this->db->insert('available', $listingdata);
			return true;
		} else {
			return false;
		}

	}
	

	function getListings($id = null) {
		if($id == null){
			$this->db->select("available.id AS aid, username, conversationSubject, text", false);
			$this->db->from("available");
			$this->db->join("users", "users.ID = available.user");
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->select("available.id AS aid, username, conversationSubject, text, avatar", false);
			$this->db->from("available");
			$this->db->join("users", "users.ID = available.user");
			$this->db->where("available.id", $id);
			$query = $this->db->get();
			//var_dump($query->result());
			return $query->result();
		}
	}

	function getUserListings($id) {
	
		$this->db->select("available.id AS aid, username, conversationSubject", false);
		$this->db->from("available");
		$this->db->join("users", "users.ID = available.user");
		$this->db->where("available.user", $id);
		$query = $this->db->get();
		return $query->result();
		
	}

	function delete($id){
		$query = $this->db->query("SELECT * FROM available WHERE id = '$id' AND user = '".$this->session->userdata('uid')."'");
		if ($query->num_rows() > 0) {
			$this->db->delete('available', array('id' => $id)); 
		}
	}
}

?>