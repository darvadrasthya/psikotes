<?php

class C_pasien extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_pasien');
		
	}
	public function rows(){
        
        $this->load->model('m_pasien');
        $this->data['total_pasien'] =  $this->m_pasien->total_rows();
        $this->load->view('Main/home_admin',$data);
    }
	function index(){
		$dariDB = $this->m_pasien->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_pasien' => $id_skrg);
		$data['pasien'] = $this->m_pasien->select()->result();
		$this->load->view("Main/pasien",$data);
	}
	public function update_status(){
        if (isset($_REQUEST['sval']))
        {
            $this->load->model('m_pasien','pasien');

            $up_status = $this->pasien->update_status();

            if($up_status>0){
                $this->session->set_flashdata('msg','Status pasien Updated Succesfully');
                $this->session->set_flashdata('msg_class','alert-success');
            }
            else{
                $this->session->set_flashdata('msg','Status pasien Not Updated Succesfully');
                $this->session->set_flashdata('msg_class','alert-danger');
            }
            return redirect('C_pasien/index');
        }
    }
	public function proses_tambah(){

		$id_pasien=$_POST['id_pasien'];
		$nama_pasien=$_POST['nama_pasien'];
		$keluhan=$_POST['keluhan'];

            $notif = '';
            $data = array(
                'id_pasien' => $id_pasien,
                'nama_pasien' => $nama_pasien,
                'keluhan' => $keluhan,
			);
		
		$this->m_pasien->add($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Tersimpan.</div>');
		redirect('c_pasien/index');
	}
	public function edit($kode=0){
		$data_pasien=$this->m_pasien->select("where id_pasien='$kode'")->result_array();
		
		$data=array(
			'id_pasien'=>$data_pasien[0]['id_pasien'],
			'nama_pasien'=>$data_pasien[0]['nama_pasien'],
			'keluhan'=>$data_pasien[0]['keluhan'],
		);
		$this->load->view('Main/edit_pasien',$data);
	}
	public function update(){
		$data=array(
			'id_pasien'=>$this->input->post('id_pasien'),
			'nama_pasien'=>$this->input->post('nama_pasien'),
			'keluhan'=>$this->input->post('keluhan')
            
		);
		$this->m_pasien->ubah($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terupdate.</div>');
		redirect('C_pasien/index');
	}
	public function delete($kode=0){
		$hasil=$this->m_pasien->hapus('pasien',array('id_pasien'=>$kode));
		if($hasil==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terhapus.</div>');
			redirect('C_pasien/index');
		}else{
			echo "Data Gagal Terhapus";
		}
	}
}
?>