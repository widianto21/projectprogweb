<?php 
	class Android_model extends CI_Model{
		function get_dokter(){
			$this->db->select('*');
			$this->db->from('dokter');
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}	
		}
	}
?>