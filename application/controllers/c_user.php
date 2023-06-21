<?php

class C_user extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_user','m_level'));
		
	}
	public function rows(){
        
        $this->load->model('m_user');
        $this->data['total_kamar'] =  $this->m_kamar->total_rows();
        $this->load->view('Main/home_admin',$data);
    }
	function index(){
		//untuk input id otomatis
		$dariDB = $this->m_user->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_user' => $id_skrg);
        $data['level'] = $this->m_level->getLevel()->result();
		$data['user'] = $this->m_user->select()->result();
		$this->load->view('Main/user', $data);
	}
	
	function daftar(){
		//untuk input id otomatis
		$dariDB = $this->m_user->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_user' => $id_skrg);
        $data['level'] = $this->m_level->getLevel()->result();
		$data['user'] = $this->m_user->select()->result();
		$this->load->view('Main/daftar', $data);
	}
	public function proses_tambah(){

		$id_user=$_POST['id_user'];
		$username=$_POST['username'];
		$password = md5($_POST['password']);
		$id_level=$_POST['id_level'];
		$nama_user=$_POST['nama_user'];
		$create_date=date("Y-m-d h:i:sa");
		$update_date=date("Y-m-d h:i:sa");

            $notif = '';
            $data = array(
                'id_user' => $id_user,
                'username' => $username,
                'password' =>$password,
                'id_level' =>$id_level,
                'nama_user' =>$nama_user,
                'create_date' => date("Y-m-d h:i:sa"),
                'update_date' => date("Y-m-d h:i:sa"),

			);
			
		$this->m_user->add($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Tersimpan.</div>');
		redirect('c_user/index');
	}
	public function proses_tambah2(){

		$id_user=$_POST['id_user'];
		$username=$_POST['username'];
		$password = md5($_POST['password']);
		$id_level=$_POST['id_level'];
		$nama_user=$_POST['nama_user'];
		$create_date=date("Y-m-d h:i:sa");
		$update_date=date("Y-m-d h:i:sa");

            $notif = '';
            $data = array(
                'id_user' => $id_user,
                'username' => $username,
                'password' =>$password,
                'id_level' =>"LVL0002",
                'nama_user' =>$nama_user,
                'create_date' => date("Y-m-d h:i:sa"),
                'update_date' => date("Y-m-d h:i:sa"),

			);
			
		$this->m_user->add($data);
		$this->session->set_flashdata('pesan','<marquee>Data Tersimpan</marquee>');
		redirect('c_user/daftar');
	}
	public function edit($kode=0){
		$data_user=$this->m_user->select("where id_user='$kode'")->result_array();

		$data=array(
			'id_user' => $data_user[0]['id_user'],
			'nama_user'=>$data_user[0]['nama_user'],
			'username'=>$data_user[0]['username'],
			'id_level'=>$data_user[0]['id_level'],
            'create_date'=>$data_user[0]['create_date'],
            'update_date'=>$data_user[0]['update_date'],
		);
		$data['level'] = $this->m_level->getLevel()->result();
		$this->load->view('Main/edit_user',$data);
	}
	public function update(){

		$data=array(
			'id_user'=>$this->input->post('id_user'),
			'nama_user'=>$this->input->post('nama_user'),
			'username'=>$this->input->post('username'),
			'id_level'=>$this->input->post('id_level'),
            'create_date'=>date("Y-m-d h:i:sa"),
            'update_date'=>date("Y-m-d h:i:sa")
		);
		$this->m_user->ubah($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terupdate.</div>');
		redirect('C_user/index');
	}
	public function delete($kode=0){
		$hasil=$this->m_user->hapus('user',array('id_user'=>$kode));
		if($hasil==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terhapus.</div>');
			redirect('C_user/index');
		}else{
			echo "Data Gagal Terhapus";
		}
	}
}
?>