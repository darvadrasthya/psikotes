<?php

class C_level extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_level');
		
	}
	
	function index(){
		$dariDB = $this->m_level->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_level' => $id_skrg);
		$data['level'] = $this->m_level->select()->result();
		$this->load->view("Main/level",$data);
	}
	public function proses_tambah(){

		$id_level=$_POST['id_level'];
		$nama_level=$_POST['nama_level'];

            $notif = '';
            $data = array(
                'id_level' => $id_level,
                'nama_level' => $nama_level,
               
			);
		
		$this->m_level->add($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Tersimpan.</div>');
		redirect('c_level/index');
	}
	public function edit($kode=0){
		$data_level=$this->m_level->select("where id_level='$kode'")->result_array();
		
		$data=array(
			'id_level'=>$data_level[0]['id_level'],
			'nama_level'=>$data_level[0]['nama_level'],
		);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terupdate.</div>');
		$this->load->view('Main/edit_level',$data);
	}
	public function update(){
		$data=array(
			'id_level'=>$this->input->post('id_level'),
			'nama_level'=>$this->input->post('nama_level')
			
		);
		$this->m_level->ubah($data);
		redirect('C_level/index');
	}
	public function delete($kode=0){
		$hasil=$this->m_level->hapus('level',array('id_level'=>$kode));
		if($hasil==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terhapus.</div>');
			redirect('C_level/index');
		}else{
			echo "Data Gagal Terhapus";
		}
	}
}
?>