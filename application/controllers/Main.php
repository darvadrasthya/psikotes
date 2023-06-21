<?php
	class Main extends CI_controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');

	}
		
		public function index(){
			$this->load->view("Main/index");
		}
		//public function order(){
			//$data['masakan'] = $this->M_masakan->select_masakan();
			//$this->load->view("Main/order",$data);
		//}
		public function login(){
			$this->load->view("Main/login");
		}
		function home_admin(){
			$this->load->model(array('m_user','m_pasien','m_obat', 'm_tindakan'));
			$data['total_user'] = $this->m_user->total_rows();
			$data['total_pasien'] = $this->m_pasien->total_rows();
			$data['total_obat'] = $this->m_obat->total_rows();		
			$data['total_tindakan'] = $this->m_tindakan->total_rows();		
			$this->load->view("Main/home_admin",$data);
		}
		function home_user(){
			$this->load->view("Main/home_user");
		}
}
?>