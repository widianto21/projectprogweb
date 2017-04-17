<?php
	class admin_model extends CI_Model{
		function get_list_user(){
			$this->db->select('*');
			$this->db->from('users');
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}
		function get_specific_user($data){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->like('nama', $data);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}	
		}
		function get_list_poli(){
			$this->db->selec('*');
			$this->db->from('poliklinik');
		}
	}
?>