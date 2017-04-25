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
			$this->db->like('ID_USER', $data);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->row_array();
			}else{
				return "kosong";
			}	
		}
		
		function get_specific_dokter($data){
			$this->db->select('*');
			$this->db->from('dokter');
			$this->db->like('ID_DOKTER', $data);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->row_array();
			}else{
				return "kosong";
			}	
		}

		function get_specific_perawat($data){
			$this->db->select('*');
			$this->db->from('dokter');
			$this->db->like('ID_DOKTER', $data);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->row_array();
			}else{
				return "kosong";
			}	
		}

		function generate_id_user(){
			$this->db->select('*');
			$this->db->from('users');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "USR001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "USR".$kode;
				return $kode;
			}
		}

		function get_specific_poli($id_poli){
			$this->db->select('*');
			$this->db->from('poliklinik');
			$this->db->like('ID_POLI', $id_poli);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}	
		}

		function get_list_poli(){
			$this->db->select('*');
			$this->db->from('poliklinik');
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

		function generate_id_poli(){
			$this->db->select('*');
			$this->db->from('poliklinik');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "POL001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "POL".$kode;
				return $kode;
			}
		}

		function generate_id_dokter(){
			$this->db->select('*');
			$this->db->from('dokter');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "DOK001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "DOK".$kode;
				return $kode;
			}
		}

		function generate_id_perawat(){
			$this->db->select('*');
			$this->db->from('perawat');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "PRW001";
			}
			else{
				$kode = (string)$list->num_rows()+1;
				if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				}
				$kode = "PRW".$kode;
				return $kode;
			}
		}

		function insert_dokter($data){
			$this->db->insert('dokter', $data);
			return $this->db->affected_rows() > 0;
		}

		function insert_perawat($data){
			$this->db->insert('perawat', $data);
			return $this->db->affected_rows() > 0;
		}

		function insert_user($data){
			$this->db->insert('users', $data);
			return $this->db->affected_rows() > 0;
		}		

		function insert_poli($data){
			$this->db->insert('poliklinik', $data);
			return $this->db->affected_rows() > 0;
		}

		function delete_user($id_user){
			$this->db->delete('users', array('ID_USER'=>$id_users));
			return $this->db->affected_rows() > 0;
		}

		function delete_dokter($id_dokter){
			$this->db->delete('dokter', array('ID_DOKTER'=>$id_dokter));
			return $this->db->affected_rows() > 0;
		}

		function delete_perawat($id_users){
			$this->db->delete('perawat', array('ID_PERAWAT'=>$id_perawat));
			return $this->db->affected_rows() > 0;
		}

		function delete_poli($id_poli){
			$this->db->delete('poliklinik', array('ID_POLI'=>$id_poli));
			return $this->db->affected_rows() > 0;
		}

		function update_user($data){
			$this->db->where('ID_USER', $data['ID_USER']);
			$this->db->update('users', $data);
			return $this->db->affected_rows() > 0;
		}

		function update_dokter($data){
			$this->db->where('ID_DOKTER', $data['ID_DOKTER']);
			$this->db->update('dokter', $data);
			return $this->db->affected_rows() > 0;
		}

		function update_perawat($data){
			$this->db->where('ID_PERAWAT', $data['ID_PERAWAT']);
			$this->db->update('perawat', $data);
			return $this->db->affected_rows() > 0;
		}

		function update_poli($data){
			$this->db->where('ID_POLI', $data['ID_POLI']);
			$this->db->update('poliklinik', $data);
			return $this->db->affected_rows() > 0;
		}
	}
?>