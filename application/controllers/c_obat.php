<?php

class C_obat extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_obat');
		
	}
	public function rows(){
        
        $this->load->model('m_obat');
        $this->data['total_obat'] =  $this->m_obat->total_rows();
        $this->load->view('Main/home_admin',$data);
    }
	function index(){
		$dariDB = $this->m_obat->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_obat' => $id_skrg);
		$data['obat'] = $this->m_obat->select()->result();
		$this->load->view("Main/obat",$data);
	}
	public function proses_tambah(){

		$id_obat=$_POST['id_obat'];
		$nama_obat=$_POST['nama_obat'];
		$dosis=$_POST['dosis'];
        $indikasi=$_POST['indikasi'];

            $notif = '';
            $data = array(
                'id_obat' => $id_obat,
                'nama_obat' => $nama_obat,
                'dosis' => $dosis,
                'indikasi' => $indikasi,
			);
		
		$this->m_obat->add($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Tersimpan.</div>');
		redirect('c_obat/index');
	}
	public function edit($kode=0){
		$data_obat=$this->m_obat->select("where id_obat='$kode'")->result_array();
		
		$data=array(
			'id_obat'=>$data_obat[0]['id_obat'],
			'nama_obat'=>$data_obat[0]['nama_obat'],
			'dosis'=>$data_obat[0]['dosis'],
            'indikasi'=>$data_obat[0]['indikasi'],
		);
		$this->load->view('Main/edit_obat',$data);
	}
	public function update(){
		$data=array(
			'id_obat'=>$this->input->post('id_obat'),
			'nama_obat'=>$this->input->post('nama_obat'),
			'dosis'=>$this->input->post('dosis'),
			'indikasi'=>$this->input->post('indikasi')
            
		);
		$this->m_obat->ubah($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terupdate.</div>');
		redirect('C_obat/index');
	}
	public function delete($kode=0){
		$hasil=$this->m_obat->hapus('obat',array('id_obat'=>$kode));
		if($hasil==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terhapus.</div>');
			redirect('C_obat/index');
		}else{
			echo "Data Gagal Terhapus";
		}
	}
}
?>