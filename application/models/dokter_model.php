<?php
	class dokter_model extends CI_Model{
		function get_data_antrian($id_dokter){
			$this->db->select('DF.NO_ANTRIAN, DF.NO_PENDAFTARAN,P.NAMA_PASIEN, DF.TGL_BEROBAT,DF.JAM_DAFTAR');
			$this->db->from('daftar_berobat AS DF');
			$this->db->join('jadwal AS J', 'DF.ID_JADWAL=J.ID_JADWAL');
			$this->db->join('dokter AS D', 'J.ID_DOKTER=D.ID_DOKTER');
			$this->db->join('pasien AS P', 'DF.ID_PASIEN=P.ID_PASIEN');
			$this->db->where('D.ID_DOKTER', $id_dokter);
			$this->db->where('DF.STATUS', 'Menunggu');
			$this->db->order_by('TGL_BEROBAT','ASC');
			$this->db->order_by('NO_ANTRIAN','ASC');
			
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

		function get_list_pasien(){
			$this->db->select('*');
			$this->db->from('pasien');
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

		function get_next_pasien($id_dokter){
			$this->db->select('*');
			$this->db->from('daftar_berobat AS DF');
			$this->db->join('jadwal AS J', 'DF.ID_JADWAL=J.ID_JADWAL');
			$this->db->join('dokter AS D', 'J.ID_DOKTER=D.ID_DOKTER');
			$this->db->join('pasien AS P', 'DF.ID_PASIEN=P.ID_PASIEN');
			$this->db->where('D.ID_DOKTER', $id_dokter);
			$this->db->where('DF.STATUS', 'Menunggu');
			$this->db->order_by('TGL_BEROBAT','ASC');
			$this->db->order_by('NO_ANTRIAN','ASC');
			$this->db->limit(1);
			
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}

		function get_data_pasien($id_pasien){
			$this->db->select('*');
			$this->db->from('pasien AS P');
			$this->db->where('P.ID_PASIEN', $id_pasien);
			$this->db->limit(1);
			
			$list = $this->db->get();
			if($list->num_rows() > 0){
				return $list->result_array();
			}else{
				return "kosong";
			}
		}
		
		function get_specific_pasien($id_pasien){
			$this->db->select('*');
			$this->db->from('pasien AS P');
			$this->db->like('P.ID_PASIEN', $id_pasien);
			$this->db->or_like('P.NAMA_PASIEN', $id_pasien);
			$this->db->or_like('P.TGL_LAHIR', $id_pasien);
			$this->db->or_like('P.ALAMAT_PASIEN', $id_pasien);
			$this->db->or_like('P.NO_TELP', $id_pasien);
			echo $this->db->last_query();
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

		function get_riwayat_pasien($id_pasien){
			$this->db->select('*');
			$this->db->from('rekam_medik AS RM');
			$this->db->join('daftar_berobat as DB', 'RM.NO_PENDAFTARAN = DB.NO_PENDAFTARAN');
			$this->db->join('jadwal as J', 'DB.ID_JADWAL = J.ID_JADWAL');
			$this->db->join('dokter as D', 'D.ID_DOKTER = J.ID_DOKTER');
			$this->db->join('poliklinik as P', 'P.ID_POLI = D.ID_POLI');
			$this->db->where('DB.ID_PASIEN', $id_pasien);
			$list = $this->db->get();
			if($list->num_rows() > 0){
					return $list->result_array();
			}else{
				return "kosong";
			}	
		}
		function get_data_rekam($id_pasien,$no_pendaftaran){
			$this->db->select('*');
			$this->db->from('daftar_berobat AS DF');
			$this->db->join('pasien AS P','DF.ID_PASIEN=P.ID_PASIEN');
			$this->db->where('P.ID_PASIEN', $id_pasien);
			$this->db->where('DF.NO_PENDAFTARAN', $no_pendaftaran);
			$list = $this->db->get();
			if($list->num_rows() > 0){
					return $list->result_array();
			}else{
				return "kosong";
			}	
		}
		function generate_id_rekam(){
			$this->db->select('*');
			$this->db->from('rekam_medik');
			$list = $this->db->get();
			if($list->num_rows() == 0){
				return "RKM001";
			}
			else{
				$data = $list->result();
				$kode = (int)substr($data[$list->num_rows-1]->NO_REKAM_MEDIK,3);
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
				$kode = "RKM".$kode;
				return $kode;
			}
		}

		function insert_rekam_medik($data){
			$this->db->insert('rekam_medik', $data);
			return $this->db->affected_rows() > 0;
		}

		function update_status_pendaftaran($no_pendataran){
			$data['STATUS'] = "Selesai";
			$this->db->where('NO_PENDAFTARAN',$no_pendataran);
			$this->db->update('daftar_berobat', $data);
			return $this->db->affected_rows() > 0;
		}

		function delete_antrian($data){
			$this->db->delete('daftar_berobat', array('NO_PENDAFTARAN' => $data));
			return $this->db->affected_rows() > 0;
		}
	}
?>