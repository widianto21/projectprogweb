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
			$data['ID_PASIEN'] = $this->petugas_model->generate_kode_pasien();
			$this->load->view('template/header');
			$this->load->view('petugas/nav_petugas');
			$this->load->view('petugas/input_pasien', $data);
			$this->load->view('template/footer');
		}

		function view_jadwal($ID_DOKTER){
			$list = $this->petugas_model->list_jadwal($ID_DOKTER);
			echo "<select name=\"idjadwal\" onchange=\"get_jadwal(this.value)\">";
			foreach ($list as $row) {
				echo "<option value=\"".$row['ID_JADWAL']."\">".$row['HARI']." | ".date("H:i",strtotime($row['JAM_AWAL']))."-".date("H:i",strtotime($row['JAM_AKHIR']))."</option>";
			}
			echo "</select>";
		}

		function show_list_dokter(){
			$list = $this->petugas_model->get_list_dokter();
			if($list != "kosong")
			echo "<td>DOKTER</td>
				<td>
					<select name=\"txtIdDokter\" onChange=\"get_jadwal(this.value);\">";
					echo "<option value=\"\">Pilih Dokter</option>";
						if($list != "kosong"){
							foreach ($list as $row) {
								echo "<option value=\"".$row['ID_DOKTER']."\">".$row['NAMA']."</option>";
							}	
						}						
					echo "</select>
				</td>
			</tr>";
		}

		function tambah_aksi(){

			$id_pasien = $this->input->post('txtidpasien');
			$nama_pasien = $this->input->post('txtnamapasien');
			$jenis_kelamin = $this->input->post('jk');
			$tempat_lahir = $this->input->post('tempatlahir');
			$tgl_lahir = $this->input->post('tanggallahir');
			$agama = $this->input->post('agama');
			$alamat_pasien = $this->input->post('alamat');
			$no_telp = $this->input->post('txtnotelp');
	 
			$data = array(
				'id_pasien' => $id_pasien,
				'nama_pasien' => $nama_pasien,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'agama' => $agama,
				'alamat_pasien' => $alamat_pasien,
				'no_telp' => $no_telp,
				);

			$this->petugas_model->input_data($data,'pasien');
			redirect('petugas/index');
	}



		function tambah_daftar_berobat(){
			//$view['daftar_berobat'] = $this->petugas_model->antrian()->result();
			$kode_pendaftaran = $this->petugas_model->generate_kode_pendaftaran();
			$list_dokter = $this->petugas_model->get_list_dokter();
			$data = array(
				'kode_pendaftaran' => $kode_pendaftaran,
				'list_dokter' => $list_dokter,
			);
			$this->load->view('template/header');
			$this->load->view('petugas/nav_petugas');
			$this->load->view('petugas/input_daftar_berobat',$data);
			$this->load->view('template/footer');
		}

		function tambah_daftar_berobat_aksi($kode=""){
			echo "kode : ".$kode;
			if($kode=="1"){
				$id_pasien = $this->input->post('txtidpasien');
				echo "id pasien:".$id_pasien;
				$nama_pasien = $this->input->post('txtnamapasien');
				$jenis_kelamin = $this->input->post('jk');
				$tempat_lahir = $this->input->post('tempatlahir');
				$tgl_lahir = $this->input->post('tanggallahir');
				$agama = $this->input->post('agama');
				$alamat_pasien = $this->input->post('alamat');
				$no_telp = $this->input->post('txtnotelp');
		 
				$data = array(
					'id_pasien' => $id_pasien,
					'nama_pasien' => $nama_pasien,
					'jenis_kelamin' => $jenis_kelamin,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'agama' => $agama,
					'alamat_pasien' => $alamat_pasien,
					'no_telp' => $no_telp,
					);
				$this->petugas_model->input_data($data,'pasien');	
			}

			$nopendaftaran = $this->input->post('nopendaftaran');
			$idpasien = $this->input->post('idpasien');
			$idjadwal = $this->input->post('idjadwal');
			$tglberobat = date("Y/m/d",strtotime($this->input->post('tglberobat')));
			$jamdaftar = $this->input->post('jamdaftar');
			$noantrian = $this->input->post('noantrian');
			
	 
			$data = array(

				'no_pendaftaran' => $nopendaftaran,
				'id_pasien' => $idpasien,
				'id_jadwal' => $idjadwal,
				'tgl_berobat' => $tglberobat,
				'jam_daftar' => $jamdaftar,
				'no_antrian' => $noantrian,
				'status' => 'Menunggu'
				);

			$this->petugas_model->input_data($data,'daftar_berobat');
			redirect('petugas/index');
		}

		function lihat_antrian(){
				$data['daftar_berobat'] = $this->petugas_model->tampil_data_daftar_berobat();
				if($data['daftar_berobat'] == null){
					$data['daftar_berobat'] = "kosong";
				}
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

		function check_jadwal($id_dokter){
			$date =date("Y-m-d");
			$date = date("D", strtotime($date));
			$hari = array(
				'Mon' => 'Senin',
				'Tue' => 'Selasa',
				'Wed' => 'Rabu',
				'Thu' => 'Kamis',
				'Fri' => 'Jumat',
				'Sat' => 'Sabtu',
				'Sun' => 'Minggu'
				);
			$result = "";
			foreach($hari as $key => $row){
				if($key == $date){
					$result = $row;
				}
			}
			$available = $this->petugas_model->check_jadwal($id_dokter, $result);		
			if($available != "kosong"){
				echo "<input class=\"short\" id=\"txtIdJadwal\" type=\"text\" name=\"idjadwal\" value=\"".$available[0]['ID_JADWAL']."\" readonly/>";
				echo ", Jam Praktek <input class=\"input-2\" type=\"text\" value=\"".$available[0]['JAM_AWAL']."|".$available[0]['JAM_AKHIR']."\" readonly/>";
			}else{
				echo "kosong";
			}
			
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
				$jenis_kelamin = $this->input->post('jk');
				$tempat_lahir = $this->input->post('tempatlahir');
				$tgl_lahir = $this->input->post('tanggallahir');
				$agama = $this->input->post('agama');
				$alamat_pasien = $this->input->post('alamat');
				$no_telp = $this->input->post('txtnotelp');
		 
				$data = array(
					'id_pasien' => $id_pasien,
					'nama_pasien' => $nama_pasien,
					'jenis_kelamin' => $jenis_kelamin,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
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
		function show_form_cari(){
			$this->load->view('petugas/cari_pasien');
		}
		function show_form_new(){
			$data['ID_PASIEN'] = $this->petugas_model->generate_kode_pasien();
			$this->load->view('petugas/form_input', $data);
		}
		function get_single_pasien($id_pasien){
			$list = $this->petugas_model->get_single_pasien($id_pasien);
			if($list != "kosong"){
				echo "
				<table>
					<tr>
						<th colspan=\"2\">Data Pasien</th>
					</tr>
					<tr>
						<td>Nama</td><td>".$list[0]['NAMA_PASIEN']."</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td>".$list[0]['JENIS_KELAMIN']."</td>
					</tr>
					<tr>
						<td>Tempat|Tgl Lahir</td><td>".$list[0]['TEMPAT_LAHIR']."|".$list[0]['TGL_LAHIR']."</td>
					</tr></table>";
			}
			else{
				echo "kosong";
			}
		}
		function get_no_antrian($id_jadwal){
						$date =date("Y-m-d");
			$date = date("D", strtotime($date));
			$hari = array(
				'Mon' => 'Senin',
				'Tue' => 'Selasa',
				'Wed' => 'Rabu',
				'Thu' => 'Kamis',
				'Fri' => 'Jumat',
				'Sat' => 'Sabtu',
				'Sun' => 'Minggu'
				);
			$result = "";
			foreach($hari as $key => $row){
				if($key == $date){
					$result = $row;
				}
			}

			$kd = $this->petugas_model->generate_no_antrian($id_jadwal,$result);
			echo $kd;
		}
	}
?>