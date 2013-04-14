<?php

class Message_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function listmessages($uid) {
		$this->db->from("messages");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users", "messages_users.from = users.id");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->where("messages_users.to", $uid);
		$this->db->where(array('messages.parent' => NULL));
		$query = $this->db->get();
		return $query->result();
	}

	function hasUnread($uid){
		$this->db->from("messages");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users", "messages_users.from = users.id");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->where("messages_users.to", $uid);
		$this->db->where("messages_users.read", 0);
		$query = $this->db->get();
		$result = $query->result();
		if(!empty($result)){
			return true;
		} else {
			return false;
		}
	}

	function getMessage($mid) {
		$this->db->from("messages");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->where("messages.id", $mid);
		$query = $this->db->get();
		return $query->result();
	}
}

?>