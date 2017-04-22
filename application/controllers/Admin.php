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

		// end function input data

		// update data
		
		// end update data

		// function delete

		// end function delete

		//function get_data

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
			echo "<table>";
			$data['id_user'] = $this->admin_model->generate_id_user();
			$this->load->view('admin/input_data_user',$data);
		}

		function show_input_dokter(){
			$data['id_dokter'] = $this->admin_model->generate_id_dokter();
			$this->load->view('admin/input_dokter', $data);
			$data['id_user'] = $this->admin_model->generate_id_user();
			$this->load->view('admin/input_data_user',$data);
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

		function show_update_poliklinik($kode){
			$data['result'] = $this->admin_model->get_specific_poli($kode);
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/update_data_poli', $data);
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