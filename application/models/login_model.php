<?php
	class login_model extends CI_Model{
		public function registration_insert($data){
			$condition = "USERNAME='".$data['username']."'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 0){
				$this->db->insert('users', $data);
				if($this->db->affected_rows() > 0){
					return true;
				}
				else{
					return false;
				}
			}
		}
		public function login($data){
			$condition = array(
				'username' => $data['username'],
				'password' => $data['password']
				);
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result_array();
			}else{
				return null;
			}
		}
	}
?>