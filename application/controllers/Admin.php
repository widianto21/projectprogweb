<?php
	class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->check_session();
			$this->load->model('admin_model');
		}

		function index(){
			$this->load->view('template/header');
			$this->load->view('admin/edituser');
			$this->load->view('template/footer');
		}

		function get_data_poliklinik(){
			// $list = $this->admin_model->get
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
						<td>EDIT | UPDATE</td>								
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
							<td>EDIT | UPDATE</td>								
						</tr>";
				}
				echo "</table>";
			}else{
				echO "tidak di temukan";
			}			
		}

		

		function show_view_user(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/edituser');
			$this->load->view('template/footer');
		}

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

		function show_view_poliklinik(){
			$this->load->view('template/header');
			$this->load->view('admin/nav_admin');
			$this->load->view('admin/editpoliklinik');
			$this->load->view('template/footer');
		}

	
		public function check_session(){
			if(isset($this->session->userdata['logged_in'])){
				if($this->session->userdata['logged_in']['tipe'] != "admin"){
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