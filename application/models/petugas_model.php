<?php 
 
class petugas_model extends CI_Model{
	// function tampil_data(){
	// 	return $this->db->get('user');
	// }
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_data_daftar_berobat(){
			$this->db->select('*');
			$this->db->from('daftar_berobat');
			$this->db->where('STATUS', 'Menunggu');
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

	function tampil_data(){
		return $this->db->get('pasien');
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function list_jadwal($KODE_DOKTER){
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('ID_DOKTER', $KODE_DOKTER);
		$this->db->order_by('FIELD(HARI,\'Senin\',\'Selasa\',\'Rabu\',\'Kamis\',\'Jumat\')');
		$list = $this->db->get();
		if($list->num_rows() > 0){
			return $list->result_array();
		}else{
			return "kosong";
		}
	}

	function antrian(){
           $this->db->select('*');
			$this->db->from('daftar_berobat');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "A001";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->no_antrian,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						$kode = "0".$kode;
					}
				// }
				$kode = "A".$kode;
				return $kode;
			}
    }

    function generate_kode_pendaftaran(){
           	$this->db->select('*');
			$this->db->from('daftar_berobat');
			$this->db->order_by('NO_PENDAFTARAN');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "DFT001";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->NO_PENDAFTARAN,3);
				$kode++;
				// $kode = (string)$list->num_rows()+1;
				// if((strlen((string)$list->num_rows())) < 3){
					for($i = strlen((string)$list->num_rows()); $i < 3; $i++){
						if(strlen((string)$kode)==3){
							break;
						}
						$kode = "0".$kode;
					}
				// }
				$kode = "DFT".$kode;
				return $kode;
			}
        }

        function generate_kode_pasien(){
           $this->db->select('*');
			$this->db->from('pasien');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "PSN001";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->ID_PASIEN,3);
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
				$kode = "PSN".$kode;
				return $kode;
			}
        }

        function generate_no_antrian(){
           $this->db->select('*');
			$this->db->from('daftar_berobat');
			$this->db->where('TGL_BEROBAT', date('Y-m-d'));
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "01";
			}
			else{
				$data = $list->result();
				$kode = (int)$data[0]->NO_ANTRIAN;
				$kode++;
				return $kode;
			}
        }

        function get_list_dokter(){
        	$this->db->select('*');
        	$this->db->from('dokter');
        	$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
        }

        function update_status_antri($kode_pendaftaran){
			$this->db->where('NO_PENDAFTARAN', $kode_pendaftaran);
			$this->db->update('daftar_berobat', array('STATUS' => 'Sudah Berobat'));
			return $this->db->affected_rows() > 0;
		}
		function get_specific_pasien($id_pasien){
			$this->db->select('*');
			$this->db->from('pasien');
			$this->db->where('ID_PASIEN', $id_pasien);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}
		function get_single_pasien($data){
			$this->db->select('*');
			$this->db->from('pasien');
			$this->db->where('ID_PASIEN', $data);
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}	
		}
	}
?>