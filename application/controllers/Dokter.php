<?php
	class Dokter extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->check_session();
			$this->load->model('dokter_model');
			$this->load->model('petugas_model');
		}
		function index(){
			$this->show_list_antrian();
		}

		// input function
		function input_rekam_medik(){
			$this->form_validation->set_rules('txtIdRekam', 'ID Rekam Medik','required');
			$this->form_validation->set_rules('txtIdPasien', 'ID Pasien','required', array('get_required_files()' => 'Nama Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtKeluhan', 'Keluhan','required', array('required' => 'Keluhan pasien harus di isi'));
			$this->form_validation->set_rules('txtPengobatan', 'Tindakan Pengobatan','required', array('required' => 'Tindakan Pengobatan tidak boleh kosong'));
			$this->form_validation->set_rules('txtResep', 'Resep','required', array('required' => 'Bila pasien tidak diberika obat, isis resep pasien dengan keterangan "Tidak ada"'));
			$this->form_validation->set_rules('txtTagihan', 'Tagihan','required', array('required' => 'Tagihan Tidak Boleh Kosong'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_rekam($this->input->post('txtIdPasien'),$this->input->post('txtNoPendaftaran'));
			}else{
				$data = array(
					'NO_REKAM_MEDIK' => $this->input->post('txtIdRekam'),
					'ID_PASIEN' => $this->input->post('txtIdPasien'),
					'TGL_BEROBAT' => date('Y-m-d',strtotime($this->input->post('txtTglBerobat'))),
					'KELUHAN' => $this->input->post('txtKeluhan'),
					'PENGOBATAN' => $this->input->post('txtPengobatan'),
					'RESEP' => $this->input->post('txtResep'),
					'TAGIHAN' => $this->input->post('txtTagihan')
				);
				$rekam_medik = $this->dokter_model->insert_rekam_medik($data);
				if($rekam_medik == TRUE){
					$data_pendaftaran = $this->dokter_model->update_status_pendaftaran($this->input->post('txtNoPendaftaran'));
					if($data_pendaftaran == TRUE){
						$this->show_list_antrian("Berhasil");
					}
				}else{
						$this->show_input_rekam($this->input->post('txtIdPasien'),$this->input->post('txtNoPendaftaran'),'Gagal');
				}
			}
		}

		// update function
		function update_pasien(){

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
			redirect('dokter/show_list_pasien');
		}

		// show function
		function get_list_pasien(){
			$list = $this->dokter_model->get_list_pasien();
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>ID PASIEN</th>
							<th>NAMA</th>
							<th>JENIS KELAMIN</th>
							<th>TTL</th>
							<th>AGAMA</th>
							<th>ALAMAT</th>
							<th>NO. TELP</th>
							<th>ACTION</th>
						</tr>";
				foreach ($list as $row) {
					echo "<tr>
							<td>".$row['ID_PASIEN']."</td>
							<td>".$row['NAMA_PASIEN']."</td>
							<td>".$row['JENIS_KELAMIN']."</td>
							<td>".$row['TEMPAT_LAHIR']."|".date('d-m-Y',strtotime($row['TGL_LAHIR']))."</td>
							<td>".$row['AGAMA']."</td>
							<td>".$row['ALAMAT_PASIEN']."</td>
							<td>".$row['NO_TELP']."</td>
							<td><a href=\"".base_url()."dokter/show_detail_pasien/".$row['ID_PASIEN']."\">Riwayat</a> | <a href=\"".base_url()."dokter/show_update_pasien/".$row['ID_PASIEN']."\">Edit</a></td>
						</tr>";
				}
				echo "</table>";
			}else{
				echo "Tidak Ada Pasien";
			}
		}

		function get_list_antrian(){
			$list = $this->dokter_model->get_data_antrian($this->session->userdata['logged_in']['id_poli']);
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>NO. Antrian</td>
							<th>NAMA PASIEN</td>
							<th>TGL. BEROBAT</td>
							<th>JAM DAFTAR</td>
						</tr>";
						// <th>ACTION</td>
				foreach($list as $row){
					echo "<tr>
							<td>".$row['NO_ANTRIAN']."</td>
							<td>".$row['NAMA_PASIEN']."</td>
							<td>".$row['TGL_BEROBAT']."</td>
							<td>".$row['JAM_DAFTAR']."</td>";
						// echo "<td><a href=\"".base_url()."admin/show_update_dokter/".$row['NO_PENDAFTARAN']."\">EDIT</a>|<a href=\"".base_url()."admin/delete_data_dokter/".$row['NO_PENDAFTARAN']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
					echo "</tr>";
				}
					echo "</table>";
			}
			else{
				echo "<table>
						<tr>
							<th>NO. Antrian</td>
							<th>NAMA PASIEN</td>
							<th>TGL. BEROBAT</td>
							<th>JAM DAFTAR</td>
						</tr>";
				echo "<tr><td colspan=\"4\">antrian kosong</td></tr></table>";

			}
		}

		function show_list_antrian($msg = ""){
			$this->load->view('template/header');
			$this->load->view('dokter/nav_dokter');
			if($msg != ""){
				$data['msg'] ='Pasien Selesai Di Obati, Pasien Selanjutnya';
				$this->load->view('dokter/editantrian');	
			}else{
				$this->load->view('dokter/editantrian');	
			}
			$this->load->view('template/footer');
		}

		function show_list_pasien($msg = ""){
			$this->load->view('template/header');
			$this->load->view('dokter/nav_dokter');
			if($msg != ""){
				$data['msg'] ='Pasien Selesai Di Obati, Pasien Selanjutnya';
				$this->load->view('dokter/editpasien',$data);	
			}else{
				$this->load->view('dokter/editpasien');	
			}
			$this->load->view('template/footer');
		}

		function show_detail_pasien($id_pasien){
			$list = $this->dokter_model->get_data_pasien($id_pasien);
			if($list != "kosong"){
				$kode_rekam = $this->dokter_model->generate_id_rekam();
				$riwayat = $this->dokter_model->get_riwayat_pasien($list[0]['ID_PASIEN']);				
				$data['data_antrian'] = $list;
				$data['riwayat'] = $riwayat;
				$data['kode_rekam'] = $kode_rekam;
				$this->load->view('template/header');
				$this->load->view('dokter/nav_dokter');
				$this->load->view('dokter/nextpasien',$data);
				$this->load->view('template/footer');	
			}
			else{
				$this->show_view_pasien();
				echo "<script>alert('tidak ada pasien yang perlu ditangani')</script>";
			}
		}

		function show_input_rekam($id_pasien, $no_pendaftaran,$msg = ""){
			if($id_pasien == "" || $no_pendaftaran == ""){
				echo "data tidak lengkap";
			}else{
			$kode_rekam = $this->dokter_model->generate_id_rekam();
			$data_rekam = $this->dokter_model->get_data_rekam($id_pasien,$no_pendaftaran);
			$data['ID_PASIEN'] = $id_pasien;
			$data['data_rekam'] = $data_rekam;
			$data['kode_rekam'] = $kode_rekam;

			$this->load->view('template/header');
			$this->load->view('dokter/nav_dokter');
			if($msg != ""){
				$data['msg'] = "gagal input data";
				
			}
			$this->load->view('dokter/input_rekam',$data);	
			$this->load->view('template/footer');	
			}
		}

		function show_update_pasien($id_pasien){
			$where = array('ID_PASIEN' => $id_pasien);
			$data['pasien'] = $this->petugas_model->edit_data($where,'pasien')->result();
			$this->load->view('template/header');
			$this->load->view('dokter/nav_dokter');
			$this->load->view('dokter/edit_pasien',$data);
			$this->load->view('template/footer');
		}
		// end show function

		//check session
		public function check_session(){
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['tipe'] != "dokter"){
					redirect($this->session->userdata['logged_in']['tipe']);	
				}
			}else{
					redirect('users');
			}
		}

		function show_berobat_pasien(){
			$list = $this->dokter_model->get_next_pasien($this->session->userdata['logged_in']['id_poli']);
			if($list != "kosong"){
				$kode_rekam = $this->dokter_model->generate_id_rekam();
				$riwayat = $this->dokter_model->get_riwayat_pasien($list[0]['ID_PASIEN']);				
				$data['data_antrian'] = $list;
				$data['riwayat'] = $riwayat;
				$data['kode_rekam'] = $kode_rekam;
				$this->load->view('template/header');
				$this->load->view('dokter/nav_dokter');
				$this->load->view('dokter/nextpasien',$data);
				$this->load->view('template/footer');	
			}
			else{
				$this->show_list_antrian();
				echo "<script>alert('tidak ada pasien yang perlu ditangani')</script>";
			}
		}

		//function logout
		function logout(){
			$this->session->sess_destroy();
			$this->check_session();
			redirect('users');
		}
	}
?>