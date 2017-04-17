<?php
	class Petugas extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('petugas_model');
			$this->check_session();
		}

		function index(){
				$data['pasien'] = $this->petugas_model->tampil_data()->result();
				$this->load->view('template/header');
				$this->load->view('petugas/nav_petugas');
				$this->load->view('petugas/view_pasien',$data);
				$this->load->view('template/footer');
		}

		function tambah(){
			$this->load->view('template/header');
			$this->load->view('petugas/nav_petugas');
			$this->load->view('petugas/input_pasien');
			$this->load->view('template/footer');
		}

		function tambah_aksi(){

			$id_pasien = $this->input->post('txtidpasien');
			$nama_pasien = $this->input->post('txtnamapasien');
			$nama_ibu_kandung = $this->input->post('txtnamaibu');
			$jenis_kelamin = $this->input->post('jk');
			$tempat_lahir = $this->input->post('tempatlahir');
			$tgl_lahir = $this->input->post('tanggallahir');
			$kewarganegaraan = $this->input->post('kwn');
			$agama = $this->input->post('agama');
			$alamat_pasien = $this->input->post('alamat');
			$no_telp = $this->input->post('txtnotelp');
	 
			$data = array(
				'id_pasien' => $id_pasien,
				'nama_pasien' => $nama_pasien,
				'nama_ibu_kandung' => $nama_ibu_kandung,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'kewarganegaraan' => $kewarganegaraan,
				'agama' => $agama,
				'alamat_pasien' => $alamat_pasien,
				'no_telp' => $no_telp,
				);

			$this->petugas_model->input_data($data,'pasien');
			redirect('petugas/index');
	}

	function tambah_daftar_berobat(){
			$this->load->view('template/header');
			$this->load->view('petugas/nav_petugas');
			$this->load->view('petugas/input_daftar_berobat');
			$this->load->view('template/footer');
		}

		function tambah_daftar_berobat_aksi(){

			$noantrian = $this->input->post('noantrian');
			$idpasien = $this->input->post('idpasien');
			$idjadwal = $this->input->post('idjadwal');
			$tglberobat = $this->input->post('tglberobat');
			$jamdaftar = $this->input->post('jamdaftar');
			
	 
			$data = array(
				'no_antrian' => $noantrian,
				'id_pasien' => $idpasien,
				'id_jadwal' => $idjadwal,
				'tgl_berobat' => $tglberobat,
				'jam_daftar' => $jamdaftar
				);

			$this->petugas_model->input_data($data,'daftar_berobat');
			redirect('petugas/index');
	}

	function lihat_antrian(){
				$data['daftar_berobat'] = $this->petugas_model->tampil_data_daftar_berobat()->result();
				$this->load->view('template/header');
				$this->load->view('petugas/nav_petugas');
				$this->load->view('petugas/view_antrian',$data);
				$this->load->view('template/footer');
		}

	function hapus($id_pasien){
		$where = array('ID_PASIEN' => $id_pasien);
		$this->petugas_model->hapus_data($where,'pasien');
		redirect('petugas/index');
	}

	function hapus_antrian($no_antrian){
		$where = array('NO_ANTRIAN' => $no_antrian);
		$this->petugas_model->hapus_data($where,'daftar_berobat');
		redirect('petugas/lihat_antrian');
	}


	function edit($id_pasien){
		$where = array('ID_PASIEN' => $id_pasien);
		$data['pasien'] = $this->petugas_model->edit_data($where,'pasien')->result();
		$this->load->view('template/header');
			$this->load->view('petugas/nav_petugas');
		$this->load->view('petugas/edit_pasien',$data);
			$this->load->view('template/footer');
		
	}
		

	function update(){

			$id_pasien = $this->input->post('txtidpasien');
			$nama_pasien = $this->input->post('txtnamapasien');
			$nama_ibu_kandung = $this->input->post('txtnamaibu');
			$jenis_kelamin = $this->input->post('jk');
			$tempat_lahir = $this->input->post('tempatlahir');
			$tgl_lahir = $this->input->post('tanggallahir');
			$kewarganegaraan = $this->input->post('kwn');
			$agama = $this->input->post('agama');
			$alamat_pasien = $this->input->post('alamat');
			$no_telp = $this->input->post('txtnotelp');
	 
			$data = array(
				'id_pasien' => $id_pasien,
				'nama_pasien' => $nama_pasien,
				'nama_ibu_kandung' => $nama_ibu_kandung,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'kewarganegaraan' => $kewarganegaraan,
				'agama' => $agama,
				'alamat_pasien' => $alamat_pasien,
				'no_telp' => $no_telp,
				);

				$where = array(
		'ID_PASIEN' => $id_pasien
	);
 
	$this->petugas_model->update_data($where,$data,'pasien');
	redirect('petugas/index');
	}

		public function check_session(){
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['tipe'] != "petugas"){
					redirect($this->session->userdata['logged_in']['tipe']);	
				}
			}else{
					redirect('users');
			}
		}

		function logout(){
			$this->session->sess_destroy();
			$this->check_session();
		}	
	}

	

?>