<?php
	class admin_model extends CI_Model{
		// function user
		

		function insert($data, $table){
			$this->db->insert($table, $data);
			return $this->db->affected_rows() > 0;
		}

		function delete($table, $condition){
			$this->db->delete($table, $condition);
			return $this->db->affected_rows() > 0;
		}

		function update($data, $table,$condition){
			foreach ($condition as $row) {
				$this->db->where($row['col'],$row['data']);	
			}
			$this->db->update($table, $data);
			return $this->db->affected_rows() > 0;
		}

		function get_list($table,$join = ""){
			$this->db->select('*');
			$this->db->from($table);
			if($join != ""){
				foreach ($join as $row) {
					$this->db->join($row['table'],$row['join']);
				}
			}
			$list = $this->db->get();
			if($list->num_rows()>0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

		function get_specific($table, $condition){
			$this->db->select('*');
			$this->db->from($table);
			if(isset($condition['join'])){
				$join = $condition['join'];
				$this->db->join($join['col'],$join['data']);
			}
			if(isset($condition['where'])){
				$where = $condition['where'];
				$this->db->where($where['col'],$where['data']);
			}
			if(isset($condition['like'])){
				$like = $condition['like'];
				$this->db->like($like['col'],$like['data']);	
			}
			if(isset($condition['or_like'])){
				foreach ($condition['or_like'] as $row) {
					$this->db->or_like($row['col'], $row['data']);
				}
			}
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
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
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_USER,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$kode); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				// }
				$kode = "USR".$kode;
				return $kode;
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
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_POLI,3);
				$kode++;
					for($i = strlen((string)$kode); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				$kode = "POL".$kode;
				return $kode;
			}
		}

		function generate_id_jam(){
			$this->db->select('*');
			$this->db->from('jam');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "J01";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_POLI,1);
				$kode++;
					for($i = strlen((string)$kode); $i < 2; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				$kode = "j".$kode;
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
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_DOKTER,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$kode); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				// }
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
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_PERAWAT,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$kode); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				// }
				$kode = "PRW".$kode;
				return $kode;
			}
		}
		function generate_id_jadwal(){
			$this->db->select('*');
			$this->db->from('jadwal');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "JDW001";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_JADWAL,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$kode); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				// }
				$kode = "JDW".$kode;
				return $kode;
			}
		}
	}
?>