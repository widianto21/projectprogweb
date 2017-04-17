<?php
	class Users extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('login_model');
		}
		public function index(){
			$this->show_login();
			$this->check_session();
		}
		public function show_login(){
			$this->load->view('login/login_page');
		}
		public function user_login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = array(
				'username' => $username,
				'password' => $password);
			$res = $this->login_model->login($data);
			if($res != null){
				$session_data = array(
					'username' => $res[0]['username'],
					'nama' => $res[0]['nama'],
					'tipe' => $res[0]['tipe']);
				$this->session->set_userdata('logged_in', $session_data);
				$view = $this->session->userdata['logged_in']['tipe'];
				echo $view;
				redirect($this->session->userdata['logged_in']['tipe']);
			}else{
				$error_msg = "username atau password salah";
				$this->load->view('login/login_page', $error_msg);
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect('Users/index');
		}
		public function check_session(){
			if(isset($this->session->userdata['logged_in'])){
				redirect($this->session->userdata['logged_in']['tipe']);
			}
		}
	}
?>