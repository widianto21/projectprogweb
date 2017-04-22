<?php
	class admin_model extends CI_Model{
		// function user
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
		// function poli
		
		function generate_id_user(){
			$this->db->select('*');
			$this->db->from('users');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "usr001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "usr".$kode;
				return $kode;
			}
		}

		function generate_id_dokter(){
			$this->db->select('*');
			$this->db->from('dokter');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "dok001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "dok".$kode;
				return $kode;
			}
		}

		function insert_poli($data){
			$this->db->insert('poliklinik', $data);
		}
		function delete_poli($idpoli){
			$this->db->delete('poliklinik', array('ID_POLIKLINIK'=>$idpoli));
		}
	}
?>