<?php

class Message_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function listmessages($uid) {
		$this->db->select("messages.id AS mid, users.username AS username, available.conversationSubject AS conversationSubject", false);
		$this->db->from("messages");
		$this->db->join("messages_users", "messages.id = messages_users.mid");
		$this->db->join("users", "messages_users.author = users.id");
		$this->db->join("available", "available.id = messages.aid");
		$this->db->where("messages_users.to", $uid);
		$this->db->where(array('messages.parent' => NULL));
		$query = $this->db->get();
		
		$messages = array();
		foreach ($query->result() as $row) {
			
			$replies = $this->getMessage($row->mid, false);

			foreach ($replies as $reply) {
				if($reply->read == 0){
					$row->hasunread = true;
					$messages[] =$row;
					break;
				} else {
					$row->hasunread = false;
					$messages[] =$row;
					break;
				}
			}
					
		}

		return $messages;

		
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

	function getMessage($mid, $markread = true) {

		$this->db->select("fromu.username AS author, tou.username AS touser, available.conversationSubject, content, mid, messages.date, available.id AS aid, fromu.avatar, messages_users.read", false);
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
			if($markread){
				$nd = array("read" => 1);
				$this->db->where("mid" , $row->mid);
				$this->db->where("to" , $this->session->userdata('uid'));
				$this->db->update("messages_users", $nd);
			}
			$parent = $row->mid;
			while(true) {
				$this->db->select("fromu.username AS author, tou.username AS touser, available.conversationSubject, content, mid, messages.date, available.id AS aid, fromu.avatar, messages_users.read", false);

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
						if($markread){
							$nd = array("read" => 1);
							$this->db->where("mid" , $row1->mid);
							$this->db->where("to" , $this->session->userdata('uid'));
							$this->db->update("messages_users", $nd);
						}
						$messages[] = $row1;
						$parent = $row1->mid;
					}
					continue;

				} else {
					break;
				}
			}

		}
		
		return $messages;
	}

	function addMessage($parent, $aid, $message, $from){
		date_default_timezone_set('CET');
		$this->db->select("to");
		$this->db->from("messages_users");
		$this->db->where("mid", $parent);
		$this->db->not_like("to", $from);

		$query = $this->db->get();
		$result = $query->result();

		$to = "";
		foreach ($query->result() as $row){
			$to = $row->to;
		} 

		if(empty($to)) {
			$this->db->select("user");
			$this->db->from("available");
			$this->db->where("id", $aid);

			$subquery = $this->db->get();

			foreach ($subquery->result() as $row){
				$to = $row->user;
			} 
		}

		$data = array("parent" => $parent, "content" => $message, "date" => date('Y-m-d H:i:s'), "aid" => $aid);
		$this->db->insert('messages', $data);

		$mid = $this->db->insert_id();

		$data = array("mid" => $mid, "to" => $to, "author" => $from, "read" => 0);
		$this->db->insert('messages_users', $data);
		$data = array("mid" => $mid, "to" => $from, "author" => $from, "read" => 0);
		$this->db->insert('messages_users', $data);

	
	}
}

?>