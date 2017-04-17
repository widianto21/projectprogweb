<?php
	class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->check_session();
			$this->load->model('admin_model');
		}

		//function index

		function index(){
			$this->show_view_user();
		}

		// function input data
		function input_data_poli(){
			$idpoli = $this->input->post('txtIdPoli');
			$namapoli = $this->input->post('txtNamaPoli');
			$ruangan = $this->input->post('txtRuangan');
			$spesialis= $this->input->post('txtSpesialis');

			$data = array(
				'id_poliklinik' => $idpoli,
				'nama_poliklinik' => $namapoli,
				'ruangan' => $ruangan,
				'spesialis' => $spesialis
			);
			$res = $this->admin_model->insert_poli($data);
			redirect('admin/show_input_poliklinik', $res);
		}
		// end function input data

		// function delete
		function delete_data_poli($idpoli){
			$res = $this->admin_model->delete_poli($idpoli);
			if($res){
				echo "<script>alert(\"data dengan id : ".$idpoli." berhasil dihapus\");</script>";
				redirect('admin/show_view_poliklinik');
			}else{
				echo "<script>aler('data dengan id : ".$idpoli." gagal dihapus')</script>";
				redirect('admin/show_view_poliklinik');
			}
		}
		// end function delete

		//function get_data

		function get_data_poli(){
			$list = $this->admin_model->get_list_poli();
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>Id Poliklinik</td>
							<th>Nama Poliklinik</td>
							<th>Ruangan</td>
							<th>Spesiali</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_POLIKLINIK']."</td>
							<td>".$row['NAMA_POLIKLINIK']."</td>
							<td>".$row['RUANGAN']."</td>
							<td>".$row['SPESIALIS']."</td>
							<td>EDIT | <a href=\"". base_url()."admin/delete_data_poli/".$row['ID_POLIKLINIK']."\">DELETE</a></td>						
						</tr>";
				}
				echo "</table>";	
			}else{
				echO "Table Kosong";
			}
			
		}

		function get_single_poli($nama){
			$list = $this->admin_model->get_specific_poli($nama);
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>Id Poliklinik</td>
							<th>Nama Poliklinik</td>
							<th>Ruangan</td>
							<th>Spesiali</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['ID_POLIKLINIK']."</td>
							<td>".$row['NAMA_POLIKLINIK']."</td>
							<td>".$row['RUANGAN']."</td>
							<td>".$row['SPESIALIS']."</td>
							<td>EDIT | <a href=\"". base_url()."admin/delete_data_poli/".$row['ID_POLIKLINIK']."\">DELETE</a></td>
						</tr>";
				}
				echo "</table>";
			}else{
				echO "tidak di temukan";
			}			
		}

		function get_data_user(){
			$list = $this->admin_model->get_list_user();
			echo "<table>
					<tr>
						<th>Id</td>
						<th>Nama</td>
						<th>Tipe User</td>
						<th>Action</td>
					</tr>";
			foreach($list as $row){
				echo "<tr>
						<td>".$row['id']."</td>
						<td>".$row['nama']."</td>
						<td>".$row['tipe']."</td>
						<td>EDIT | DELETE</td>								
					</tr>";
			}
			echo "</table>";
		}

		function get_single_user($nama){
			$list = $this->admin_model->get_specific_user($nama);
			if($list != "kosong"){
				echo "<table>
						<tr>
							<th>Id</td>
							<th>Nama</td>
							<th>Tipe User</td>
							<th>Action</td>
						</tr>";
				foreach($list as $row){
					echo "<tr>
							<td>".$row['id']."</td>
							<td>".$row['nama']."</td>
							<td>".$row['tipe']."</td>
							<td>EDIT | DELETE</td>								
						</tr>";
				}
				echo "</table>";
			}else{
				echO "tidak di temukan";
			}			
		}

		// end funciton get_data

		// show function

		function show_input_user(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_user');
			$this->load->view('template/footer');
		}

		function show_input_perawat(){
			$this->load->view('admin/input_perawat');
			$this->load->view('admin/input_data_user');
		}

		function show_input_dokter(){
			$this->load->view('admin/input_dokter');
			$this->load->view('admin/input_data_user');
		}

		function show_view_user(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/edituser');
			$this->load->view('template/footer');
		}

		function show_input_poliklinik($res = null){
			$data['kode'] = $this->admin_model->generate_idpoli();
			if($res != null)$data['res'] = $res;
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/input_poliklinik', $data);
			$this->load->view('template/footer');
		}

		function show_view_poliklinik(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editpoliklinik');
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
	}
?>