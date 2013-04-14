<?php

class Message_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function listmessages($uid) {
		$this->db->from("messages");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users", "messages_users.author = users.id");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->where("messages_users.to", $uid);
		$this->db->where(array('messages.parent' => NULL));
		$query = $this->db->get();
		return $query->result();
	}

	function hasUnread($uid){
		$this->db->from("messages");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users", "messages_users.author = users.id");
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
		$this->db->select("fromu.username AS author, tou.username AS touser, available.conversationSubject, content, mid, messages.date, fromu.avatar", false);
		$this->db->from("messages");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users AS fromu", "fromu.id = messages_users.author");
		$this->db->join("users AS tou", "tou.id = messages_users.to");
		$this->db->where("messages.id", $mid);
		$this->db->group_by("messages_users.author");
		$query = $this->db->get();


		$messages = array();
		foreach ($query->result() as $row){
			$messages[] = $row;

			$parent = $row->mid;
			while(true) {
				$this->db->select("fromu.username AS author, tou.username AS touser, available.conversationSubject, content, mid, messages.date, fromu.avatar", false);
				$this->db->from("messages");
				$this->db->join("available", "available.id = messages.aid");
				$this->db->join("messages_users", "messages.id = messages_users.mid");
				$this->db->join("users AS fromu", "fromu.id = messages_users.author");
				$this->db->join("users AS tou", "tou.id = messages_users.to");
				$this->db->where("messages.parent", $parent);
				$this->db->group_by("messages_users.author");
				$subquery = $this->db->get();
				$subresult = $subquery->result();
				if(!empty($subresult)){
					foreach ($subresult as $row1){
						$messages[] = $row1;
						$parent = $row1->mid;
					}
					continue;

				} else {
					break;
				}
			}

		}
		var_dump($messages);
		return $messages;
	}

	function addMessage($parent, $message){
		$data = array("parent" => $parent, "content" => $message, "date" => time());
		$this->db->insert('messages', $data);
	}
}

?>