<?php

class Listings_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function getListings($id = null) {
		if($id == null){
			$this->db->select("available.id AS aid, username, conversationSubject", false);
			$this->db->from("available");
			$this->db->join("users", "users.ID = available.user");
			$query = $this->db->get();
			return $query->result();
		} else {
			$this->db->from("available");
			$this->db->join("users", "users.ID = available.user");
			$this->db->where("available.id", $id);
			$query = $this->db->get();
			return $query->result();
		}
	}
}

?>