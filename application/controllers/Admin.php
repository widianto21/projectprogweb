<?php
	class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->check_session();
			$this->load->model('admin_model');
			$this->load->model('petugas_model');
			$this->load->model('dokter_model');
		}

		//function index

		function index(){
			$this->show_view_user();
		}
		
		// function input data

		function input_data_dokter($mod = 0){
			$this->form_validation->set_rules('txtId', 'ID','required');
			$this->form_validation->set_rules('txtNama', 'Nama','required', array('required' => 'Nama Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtNoTelp', 'No. Telpon','required', array('required' => 'No. Telpon Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtAlamat', 'Alamat','required', array('required' => 'Alamat Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtIDUser', 'ID User','required', array('required' => 'ID User Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtUsername', 'Username','required', array('required' => 'Username Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtPassword', 'Password','required', array('required' => 'Password Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtTipe', 'Tipe','required', array('required' => 'Tipe User Tidak Boleh Kosong'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_dokter();
			}else{
				$data = array(
					'data_dokter' => array(
						'ID_DOKTER' => $this->input->post('txtId'),
						'ID_POLI' => $this->input->post('txtPoliklinik'),
						'NAMA' => $this->input->post('txtNama'),
						'ALAMAT' => $this->input->post('txtAlamat'),
						'NO_TELP' => $this->input->post('txtNoTelp')
					),
					'data_user' => array(
						'ID_USER' => $this->input->post('txtIDUser'),
						'USERNAME' => $this->input->post('txtUsername'),
						'PASSWORD' => $this->input->post('txtPassword'),
						'TIPE' => $this->input->post('txtTipe'),
						'ID_POLIKLINIK' => $this->input->post('txtId')
					)
				);
				if($mod != 0){
					$dokter = $this->admin_model->update_dokter($data['data_dokter']);
					$user = $this->admin_model->update_user($data['data_user']);
					if($dokter == TRUE || $user == TRUE){
						$this->show_input_dokter("Data Berhasil Dirubah");
					}
				}else{
					$dokter = $this->admin_model->insert_dokter($data['data_dokter']);
					$user = $this->admin_model->insert_user($data['data_user']);
					if($dokter == TRUE || $user == TRUE){
						$this->show_input_dokter("Data Berhasil Dirubah");
					}	
				}
				
			}
		}

		function input_data_perawat(){
			$this->form_validation->set_rules('txtId', 'ID','required');
			$this->form_validation->set_rules('txtNama', 'Nama','required', array('required' => 'Nama Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtNoTelp', 'No. Telpon','required', array('required' => 'No. Telpon Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtAlamat', 'Alamat','required', array('required' => 'Alamat Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtIDUser', 'ID User','required', array('required' => 'ID User Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtUsername', 'Username','required', array('required' => 'Username Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtPassword', 'Password','required', array('required' => 'Password Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtTipe', 'Tipe','required', array('required' => 'Tipe User Tidak Boleh Kosong'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_dokter();
			}else{
				$data = array(
					'data_perawat' => array(
						'ID_PERAWAT' => $this->input->post('txtId'),
						'NAMA' => $this->input->post('txtNama'),
						'ALAMAT' => $this->input->post('txtAlamat'),
						'NO_TELP' => $this->input->post('txtNoTelp')
					),
					'data_user' => array(
						'ID_USER' => $this->input->post('txtIDUser'),
						'USERNAME' => $this->input->post('txtUsername'),
						'PASSWORD' => $this->input->post('txtPassword'),
						'TIPE' => $this->input->post('txtTipe'),
						'ID_POLIKLINIK' => $this->input->post('txtId')
					)
				);
				$perawat = $this->admin_model->insert_perawat($data['data_perawat']);
				$user = $this->admin_model->insert_user($data['data_user']);
				if($perawat == TRUE && $user == TRUE){
					$this->show_input_perawat("Data Ditambahkan");
				}
			}
		}

		function input_data_jadwal(){
			$this->form_validation->set_rules('txtIdJadwal', 'ID','required');
			$this->form_validation->set_rules('txtIdDokter', 'Dokter','required', array('required' => 'ID Dokter Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtHari', 'Hari Praktek','required', array('required' => 'Pilih Hari Praktek'));
			$this->form_validation->set_rules('txtRuangan', 'Ruangan','required', array('required' => 'Masukkan Ruang Praktek'));
			$this->form_validation->set_rules('txtJamAwal', 'Jam Awal', 'trim|min_length[3]|max_length[5]|callback_validate_time',array('validate_time' => 'Jam Awal Salah'));
			$this->form_validation->set_rules('txtJamAkhir', 'Jam Akhir', 'callback_validate_time',array('validate_time' => 'Jam Akhir Salah'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_jadwal($this->input->post('txtIdDokter'));
			}else{
				$data = array(
						'ID_JADWAL' => $this->input->post('txtIdJadwal'),
						'ID_DOKTER' => $this->input->post('txtIdDokter'),
						'HARI' => $this->input->post('txtHari'),
						'RUANGAN' => $this->input->post('txtRuangan'),
						'JAM_AWAL' => $this->input->post('txtJamAwal'),
						'JAM_AKHIR' => $this->input->post('txtJamAkhir')
				);
				$jadwal = $this->admin_model->insert_jadwal($data);
				if($jadwal == TRUE){
					$this->show_input_jadwal($this->input->post('txtIdDokter'),'Data Jadwal Berhasil Ditambahkan');
				}
				
			}
		}

		function update_data_jadwal(){
			$this->form_validation->set_rules('txtIdJadwal', 'ID','required');
			$this->form_validation->set_rules('txtIdDokter', 'Dokter','required', array('required' => 'ID Dokter Tidak Boleh Kosong'));
			$this->form_validation->set_rules('txtHari', 'Hari Praktek','required', array('required' => 'Pilih Hari Praktek'));
			$this->form_validation->set_rules('txtRuangan', 'Ruangan','required', array('required' => 'Masukkan Ruang Praktek'));
			$this->form_validation->set_rules('txtJamAwal', 'Jam Awal', 'trim|min_length[3]|max_length[5]|callback_validate_time',array('validate_time' => 'Jam Awal Salah'));
			$this->form_validation->set_rules('txtJamAkhir', 'Jam Akhir', 'callback_validate_time',array('validate_time' => 'Jam Akhir Salah'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_jadwal($this->input->post('txtIdDokter'));
			}else{
				$data = array(
						'ID_JADWAL' => $this->input->post('txtIdJadwal'),
						'ID_DOKTER' => $this->input->post('txtIdDokter'),
						'HARI' => $this->input->post('txtHari'),
						'RUANGAN' => $this->input->post('txtRuangan'),
						'JAM_AWAL' => $this->input->post('txtJamAwal'),
						'JAM_AKHIR' => $this->input->post('txtJamAkhir')
				);
				$jadwal = $this->admin_model->update_jadwal($data);
				if($jadwal == TRUE){
					$this->show_update_jadwal($this->input->post('txtIdJadwal'),'Data Jadwal Update Ditambahkan');
				}
				
			}
		}

		function validate_time($str){
			//Assume $str SHOULD be entered as HH:MM
			if($str != ""){
				if(strpos($str, ':')){
					list($hh, $mm) = explode(':', $str);

					if (!is_numeric($hh) || !is_numeric($mm))
					{
					    $this->form_validation->set_message('validate_time', 'Not numeric');
					    return FALSE;
					}
					else if ((int) $hh > 24 || (int) $mm > 59)
					{
					    $this->form_validation->set_message('validate_time', 'Invalid time');
					    return FALSE;
					}
					else if (mktime((int) $hh, (int) $mm) === FALSE)
					{
					    $this->form_validation->set_message('validate_time', 'Invalid time');
					    return FALSE;
					}

					return TRUE;	
				}
				else{
					return FALSE;
				}
			}else{
				return FALSE;
			}
			
		}

		function input_data_poliklinik(){
			$this->form_validation->set_rules('txtIdPoli','ID Poliklinik', 'required');
			$this->form_validation->set_rules('txtNamaPoli','Nama Poliklinik', 'required',array('required' => 'Nama Poliklinik tidak boleh kosong'));
			if($this->form_validation->run() == FALSE){
				$this->show_input_poliklinik();
				return;
			}
			$data = array(
				'ID_POLI' => $this->input->post('txtIdPoli'),
				'NAMA_POLI' => $this->input->post('txtNamaPoli')
			);
			$res = $this->admin_model->insert_poli($data);
			$this->show_input_poliklinik($res);
		}

		// function input_data_jam(){
		// 	$this->form_validation->set_rules('txtIdJam','Id Jam', 'required');
		// 	$this->form_validation->set_rules('txtNamaPoli','Nama Poliklinik', 'required',array('required' => 'Nama Poliklinik tidak boleh kosong'));
		// 	if($this->form_validation->run() == FALSE){
		// 		$this->show_input_poliklinik();
		// 		return;
		// 	}
		// 	$data = array(
		// 		'ID_POLI' => $this->input->post('txtIdPoli'),
		// 		'NAMA_POLI' => $this->input->post('txtNamaPoli')
		// 	);
		// 	$res = $this->admin_model->insert_poli($data);
		// 	$this->show_input_poliklinik($res);
		// }

		// end function input data

		// update data

		function update_data_poliklinik(){
			$this->form_validation->set_rules('txtIdPoli','ID Poliklinik', 'required');
			$this->form_validation->set_rules('txtNamaPoli','Nama Poliklinik', 'required',array('required' => 'Nama Poliklinik tidak boleh kosong'));
			if($this->form_validation->run() == FALSE){
				$this->show_update_poliklinik($this->input->post('txtIdPoli'));
				return;
			}
			$data = array(
				'ID_POLI' => $this->input->post('txtIdPoli'),
				'NAMA_POLI' => $this->input->post('txtNamaPoli')
			);
			$res = $this->admin_model->update_poli($data);
			$this->show_update_poliklinik($data['ID_POLI'],$res);
		}

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
			redirect('admin/show_view_pasien');
		}		
		// end update data

		// function delete

		function delete_data_poliklinik($ID_POLI){
			$res = $this->admin_model->delete_poli($ID_POLI);
			$this->show_view_poliklinik();
		}

		function delete_data_pasien($id_pasien){
			$where = array('ID_PASIEN' => $id_pasien);
			$this->petugas_model->hapus_data($where,'pasien');
			redirect('admin/show_view_pasien');
		}

		function delete_data_dokter($ID_DOKTER = ""){
			if($ID_DOKTER == ""){
				$this->show_view_user();	
			}else{
				$res1 = $this->admin_model->delete_dokter($ID_DOKTER);
				$res2 = $this->admin_model->delete_user($ID_DOKTER);
				if($res1 == TRUE && $res2 == TRUE){
					$this->show_view_user("Data Berhasil Dihapus");	
				}
			}
		}

		function delete_data_perawat($ID_PERAWAT = ""){
			if($ID_PERAWAT == ""){
				$this->show_view_user();	
			}else{
				$res1 = $this->admin_model->delete_perawat($ID_PERAWAT);
				$res2 = $this->admin_model->delete_user($ID_PERAWAT);
				if($res1 == TRUE && $res2 == TRUE){
					$this->show_view_user("Data Berhasil Dihapus");	
				}	
				else if($res1 == FALSE){
					echo $res1;
				}
			}
		}

		function delete_jadwal($ID_JADWAL,$ID_DOKTER = ""){
			if($ID_DOKTER == "" || $ID_JADWAL == ""){
				$this->show_jadwal_dokter($ID_DOKTER);	
			}else{
				$res1 = $this->admin_model->delete_jadwal($ID_JADWAL);
				if($res1 == TRUE){
					$this->show_jadwal_dokter($ID_DOKTER,"Data Berhasil Dihapus");	
				}	
				else if($res1 == FALSE){
					echo $res1;
				}
			}
		}

		// end function delete

		//function get_data

		function get_data_dokter(){
			$list = $this->admin_model->get_list_dokter();
			echo "<table>
					<tr>
						<th>ID DOKTER</td>
						<th>NAMA</td>
						<th>ALAMAT</td>
						<th>NO. TELP</td>
						<th>ID POLI</td>
						<th>ACTION</td>
					</tr>";
			foreach($list as $row){
				echo "<tr>
						<td>".$row['ID_DOKTER']."</td>
						<td>".$row['NAMA']."</td>
						<td>".$row['ALAMAT']."</td>
						<td>".$row['NO_TELP']."</td>
						<td>".$row['NAMA_POLI']."</td>";
					echo "<td><a href=\"".base_url()."admin/show_jadwal_dokter/".$row['ID_DOKTER']."\">JADWAL</a>|<a href=\"".base_url()."admin/show_update_dokter/".$row['ID_DOKTER']."\">EDIT</a>|<a href=\"".base_url()."admin/delete_data_dokter/".$row['ID_DOKTER']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}

		function get_single_dokter($data){
			$list = $this->admin_model->get_specific_dokter($data);
			echo "<table>
					<tr>
						<th>ID DOKTER</td>
						<th>NAMA</td>
						<th>ALAMAT</td>
						<th>NO. TELP</td>
						<th>ID POLI</td>
						<th>ACTION</td>
					</tr>";
			if($data == "kosong"){
				echo "kosong";
			}
			foreach($list as $row){
				echo "<tr>
						<td>".$row['ID_DOKTER']."</td>
						<td>".$row['NAMA']."</td>
						<td>".$row['ALAMAT']."</td>
						<td>".$row['NO_TELP']."</td>
						<td>".$row['NAMA_POLI']."</td>";
					echo "<td><a href=\"".base_url()."admin/show_jadwal_dokter/".$row['ID_DOKTER']."\">JADWAL</a>|<a href=\"".base_url()."admin/show_update_dokter/".$row['ID_DOKTER']."\">EDIT</a>|<a href=\"".base_url()."admin/delete_data_dokter/".$row['ID_DOKTER']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
			}
			echo "</table>";
		}

		function get_data_user(){
			$list = $this->admin_model->get_list_user();
			echo "<table>
					<tr>
						<th>ID USER</td>
						<th>ID POLIKLINIK</td>
						<th>USERNAME</td>
						<th>TIPE</td>
						<th>Action</td>
					</tr>";
			foreach($list as $row){
				echo "<tr>
						<td>".$row['ID_USER']."</td>
						<td>".$row['ID_POLIKLINIK']."</td>
						<td>".$row['USERNAME']."</td>
						<td>".$row['TIPE']."</td>";
				if($row['TIPE'] == "admin"){
					echo "<td>Tidak Tersedia</td>";
				}else{
					echo "<td><a href=\"".base_url()."admin/show_detail_pasien/".$row['TIPE']."/".$row['ID_POLIKLINIK']."\">EDIT</a> | <a href=\"".base_url()."admin/delete_data_".$row['TIPE']."/".$row['ID_POLIKLINIK']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

		function get_data_pasien(){
			$list = $this->admin_model->get_list_pasien();
			echo "<table>
					<tr>
						<th>ID PASIEN</td>
						<th>NAMA</td>
						<th>JENIS KELAMIN</td>
						<th>TEMPAT LAHIR</td>
						<th>TGL. LAHIR</td>
						<th>NO. TELP</td>
						<th>ACTION</td>
					</tr>";
			if($list == "kosong"){
				echo "<tr><td colspan=\"6\">kosong</td></tr>";
			}else{
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_PASIEN']."</td>
							<td>".$row['NAMA_PASIEN']."</td>
							<td>".$row['JENIS_KELAMIN']."</td>
							<td>".$row['TEMPAT_LAHIR']."</td>
							<td>".$row['TGL_LAHIR']."</td>
							<td>".$row['NO_TELP']."</td>";
						echo "<td><a href=\"".base_url()."admin/show_detail_pasien/".$row['ID_PASIEN']."\">DETAIL</a> | <a href=\"".base_url()."admin/show_update_pasien/".$row['ID_PASIEN']."\">EDIT</a>|<a href=\"".base_url()."admin/delete_data_pasien/".$row['ID_PASIEN']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
				}
				echo "</table>";
			}
		}

		function get_single_pasien($data){
			$list = $this->admin_model->get_specific_pasien($data);
			echo "<table>
					<tr>
						<th>ID PASIEN</td>
						<th>NAMA</td>
						<th>JENIS KELAMIN</td>
						<th>TEMPAT LAHIR</td>
						<th>TGL. LAHIR</td>
						<th>NO. TELP</td>
						<th>ACTION</td>
					</tr>";
			if($list != "kosong"){
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_PASIEN']."</td>
							<td>".$row['NAMA_PASIEN']."</td>
							<td>".$row['JENIS_KELAMIN']."</td>
							<td>".$row['TEMPAT_LAHIR']."</td>
							<td>".$row['TGL_LAHIR']."</td>
							<td>".$row['NO_TELP']."</td>";
						echo "<td><a href=\"".base_url()."admin/show_detail_pasien/".$row['ID_PASIEN']."\">DETAIL</a> | <a href=\"".base_url()."admin/show_update_pasien/".$row['ID_PASIEN']."\">EDIT</a>|<a href=\"".base_url()."admin/delete_data_pasien/".$row['ID_PASIEN']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
				}
				echo "</table>";	
			}else{
				echo "<tr><td>kosong</td></tr>";
			}
		}

		function get_single_user($nama){
			$list = $this->admin_model->get_specific_user($nama);
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>ID USER</td>
							<th>ID POLIKLINIK</td>
							<th>USERNAME</td>
							<th>TIPE</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_USER']."</td>
							<td>".$row['ID_POLIKLINIK']."</td>
							<td>".$row['USERNAME']."</td>
							<td>".$row['TIPE']."</td>";
					if($row['TIPE'] == "admin"){
							echo "<td>Tidak Tersedia</td>";
						}else{
							echo "<td><a href=\"".base_url()."admin/show_update_".$row['TIPE']."/".$row['ID_POLIKLINIK']."\">EDIT</a> | <a href=\"".base_url()."admin/delete_data_".$row['TIPE']."/".$row['ID_POLIKLINIK']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>";
						}
						echo "</tr>";
				}
				echo "</table>";
			}else{
				echO "tidak di temukan";
			}			
		}

		function get_data_poli(){
			$list = $this->admin_model->get_list_poli();
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>ID POLIKLINIK</td>
							<th>NAMA POLIKLINIK</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_POLI']."</td>
							<td>".$row['NAMA_POLI']."</td>
							<td><a href=\"".base_url()."admin/show_update_poliklinik/".$row['ID_POLI']."\">EDIT</a> | <a href=\"".base_url()."admin/delete_data_poliklinik/".$row['ID_POLI']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>								
						</tr>";
				}
				echo "</table>";
			}else{
				echo "<table>
					<tr>
						<td>Data Kosong</td>
					</tr>
					";
			}

		}

		function get_data_jam(){
			$list = $this->admin_model->get_list_jam();
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>ID JAM</td>
							<th>JAM</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_JAM']."</td>
							<td>".$row['JAM']."</td>
							<td><a href=\"".base_url()."admin/show_update_poliklinik/".$row['ID_POLI']."\">EDIT</a> | <a href=\"".base_url()."admin/delete_data_poliklinik/".$row['ID_POLI']."\" onclick=\"return confirm('Are you sure?')\">DELETE</a></td>								
						</tr>";
				}
				echo "</table>";
			}else{
				echo "<table>
					<tr>
						<td>Data Kosong</td>
					</tr>
					";
			}

		}

		// end funciton get_data

		// show function

		function show_input_user($tipe = ""){
			$data['jenis'] = "";
			$data['tipe'] = $tipe;
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_user', $data);
			$this->load->view('template/footer');
		}

		function show_input_perawat($msg = ""){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$data['id_perawat'] = $this->admin_model->generate_id_perawat();
			if($msg != ""){
				$data['msg'] = $msg;
			}	
			$this->load->view('admin/input_perawat',$data);
			$data['id_user'] = $this->admin_model->generate_id_user();
			$data['tipe'] = "petugas";
			$this->load->view('admin/input_data_user',$data);
			$this->load->view('template/footer');
		}

		function show_input_dokter($msg = ""){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$data['id_dokter'] = $this->admin_model->generate_id_dokter();
			$data['poli'] = $this->admin_model->get_list_poli();
			if($msg != ""){
				$data['msg'] = $msg;
			}
			$this->load->view('admin/input_dokter', $data);
			$data['id_user'] = $this->admin_model->generate_id_user();
			$data['tipe'] = "dokter";
			$this->load->view('admin/input_data_user',$data);
			$this->load->view('template/footer');
		}

		function show_input_jadwal($kode_dokter = "", $msg = ""){
			$data['kode'] = $this->admin_model->generate_id_jadwal();
			$data['data_dokter'] = $this->admin_model->get_single_dokter($kode_dokter);
			if($kode_dokter == ""){
				echo "Data Dokter TIdak Boleh Kosong";
			}
			if($msg != ""){
				$data['msg'] = $msg;
			}
			
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_jadwal', $data);
			$this->load->view('template/footer');
		}

		function show_view_user($msg = ""){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			if($msg != ""){
				$data['msg'] = $msg;
				$this->load->view('admin/edituser', $data);
			}else{
				$this->load->view('admin/edituser');
			}
			$this->load->view('template/footer');
		}

		function show_input_poliklinik($res = FALSE){
			$data['kode'] = $this->admin_model->generate_id_poli();
			if($res == TRUE){
				$data['res'] = $res;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_poliklinik', $data);
			$this->load->view('template/footer');
		}

		function show_input_jam($res = FALSE){
			$data['kode'] = $this->admin_model->generate_id_jam();
			if($res == TRUE){
				$data['res'] = $res;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_jam', $data);
			$this->load->view('template/footer');
		}

		function show_view_poliklinik(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editpoliklinik');
			$this->load->view('template/footer');
		}

		function show_view_jam(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editjam');
			$this->load->view('template/footer');
		}

		function show_view_dokter(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editdokter');
			$this->load->view('template/footer');
		}

		function show_view_pasien(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editpasien');
			$this->load->view('template/footer');
		}

		function show_update_poliklinik($kode, $res= FALSE){
			$data['result'] = $this->admin_model->get_specific_poli($kode);
			if($res == TRUE){
				$data['res'] = $res;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_data_poli', $data);
			$this->load->view('template/footer');
		}

		function show_update_dokter($kode, $res= FALSE){
			// $data_user= $this->admin_model->get_specific_user($kode);
			$data_dokter = $this->admin_model->get_specific_dokter($kode);
			$data_poliklinik = $this->admin_model->get_list_poli();
			//$data['data_user'] = $data_user;
			$data['data_dokter'] = $data_dokter;
			$data['data_poliklinik'] = $data_poliklinik;
			if($res == TRUE){
				$data['res'] = $res;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_data_dokter', $data);
			$this->load->view('template/footer');
		}
		function show_update_perawat($kode, $res= FALSE){
			$data_user= $this->admin_model->get_specific_user($kode);
			$data_perawat = $this->admin_model->get_specific_perawat($data_user[0]['ID_POLIKLINIK']);
			echo $data_user[0]['ID_POLIKLINIK'];
			$data['data_user'] = $data_user;
			$data['data_perawat'] = $data_perawat;
			if($res == TRUE){
				$data['res'] = $res;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_data_perawat', $data);
			$this->load->view('template/footer');
		}

		function show_jadwal_dokter($kode = ""){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			if($kode == ""){
				$this->load->view('admin/data_dokter', $data['msg'] = "kosong");
			}else{
				$data_dokter = $this->admin_model->get_specific_dokter($kode);
				$data_jadwal = $this->admin_model->get_list_jadwal($kode);
				$data['data_dokter'] = $data_dokter;
				$data['data_jadwal'] = $data_jadwal;
				$this->load->view('admin/data_dokter', $data);
			}
			$this->load->view('template/footer');
		}
		function show_update_jadwal($kode, $msg = ""){
			$data['data_dokter'] = $this->admin_model->get_specific_jadwal($kode);
			if($msg != ""){
				$data['msg'] = $msg;
			}
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_data_jadwal', $data);
			$this->load->view('template/footer');
		}

		function show_update_pasien($id_pasien){
			$where = array('ID_PASIEN' => $id_pasien);
			$data['pasien'] = $this->petugas_model->edit_data($where,'pasien')->result();	
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_pasien',$data);
			$this->load->view('template/footer');
		}
		// end show function

		//function check session
		public function check_session(){
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['tipe'] != "admin"){
					redirect($this->session->userdata['logged_in']['tipe']);	
				}
			}else{
					redirect('users');
			}
		}

		//function logout
		function logout(){
			$this->session->sess_destroy();
			$this->check_session();
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
				$this->load->view('admin/nav_admin');
				$this->load->view('dokter/nextpasien',$data);
				$this->load->view('template/footer');	
			}
			else{
				$this->show_view_pasien();
				echo "<script>alert('tidak ada pasien yang perlu ditangani')</script>";
			}
		}
	}
?>