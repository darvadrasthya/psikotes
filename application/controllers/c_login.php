<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	class C_login extends CI_controller{
		function __construct(){
			parent::__construct();
			$this->load->model('m_login');
			$this->load->model('m_user');
		}
		
		public function auth(){
			if(isset($_POST['submit'])){
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$cek = $this->m_login->login($username,$password);
				$data= $this->m_user->select("where username = '$username'");
				if($cek == 1){
					foreach($data->result()as $session){
						$session_data['id_level']=$session->id_level;
						$this->session->set_userdata($session_data);
					}
					if ($this->session->userdata('id_level')=='LVL0001'){
						$this->session->set_flashdata('pesan',"<div class='alert alert-success alert-dismissible'>
    				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    				<strong>Selamat Datang! </strong>$username.</div>");
						redirect('Main/home_admin');
					}else{
						$this->session->set_flashdata('pesan',"<div class='alert alert-success alert-dismissible'>
    				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    				<strong>Selamat Datang! </strong>$username.</div>");
						redirect('Main/home_admin');
					}
				}else{
					echo " <script>alert('Periksa lagi username dan password !!!'); history.go(-1);</script>";
				}
			} else{
				$this->load->view('Main/login');
			}
		 }

		function logout() {
			$this->session->sess_destroy();
			redirect('Main/index');		
		}	
	}
?>