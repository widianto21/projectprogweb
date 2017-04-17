<?php 
 
class petugas_model extends CI_Model{
	// function tampil_data(){
	// 	return $this->db->get('user');
	// }
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function tampil_data_daftar_berobat(){
		return $this->db->get('daftar_berobat');
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
}

?>