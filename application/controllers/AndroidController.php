<?php
	class AndroidController extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('android_model');
		}

		function parseDokter(){
			$list = $this->android_model->get_dokter();
			if($list != ""){
				$list_dokter['list_dokter'] = $list;
				echo json_encode($list_dokter);
			}
		}
	}
?>