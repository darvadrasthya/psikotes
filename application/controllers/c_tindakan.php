<?php

class C_tindakan extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_tindakan','m_pasien','m_obat'));
		
	}
	public function rows(){
        $this->load->model('m_tindakan');
        $this->data['total_tindakan'] =  $this->m_tindakan->total_rows();
        $this->load->view('Main/home_admin',$data);
    }
	function index(){
		$dariDB = $this->m_tindakan->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_tindakan' => $id_skrg);
		$data['obat'] = $this->m_obat->getObat()->result();
		$data['pasien'] = $this->m_pasien->getPasien()->result();
		$data['tindakan'] = $this->m_tindakan->select()->result();
		$this->load->view('Main/tindakan',$data);
	}
	public function proses_tambah(){

		$id_tindakan=$_POST['id_tindakan'];
		$bentuk_tindakan=$_POST['bentuk_tindakan'];
		$id_pasien=$_POST['id_pasien'];
		$id_obat=$_POST['id_obat'];

            $notif = '';
            $data = array(
                'id_tindakan' => $id_tindakan,
                'bentuk_tindakan' => $bentuk_tindakan,
                'id_pasien' => $id_pasien,
                'id_obat' => $id_obat,
			);
		
		$this->m_tindakan->add($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Tersimpan.</div>');
		redirect('c_tindakan/index');
	}
	public function edit($kode=0){
		$data_tindakan=$this->m_tindakan->select("where id_tindakan='$kode'")->result_array();
		
		$data=array(
			'id_tindakan'=>$data_tindakan[0]['id_tindakan'],
			'bentuk_tindakan'=>$data_tindakan[0]['bentuk_tindakan'],
			'id_pasien'=>$data_tindakan[0]['id_pasien'],
			'id_obat'=>$data_tindakan[0]['id_obat'],
		);
		$this->load->view('Main/edit_tindakan',$data);
	}
	public function update(){
		$data=array(
			'id_tindakan'=>$this->input->post('id_tindakan'),
			'bentuk_tindakan'=>$this->input->post('bentuk_tindakan'),
			'id_pasien'=>$this->input->post('id_pasien'),
			'id_obat'=>$this->input->post('id_obat')
            
		);
		$this->m_tindakan->ubah($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terupdate.</div>');
		redirect('C_tindakan/index');
	}
	public function delete($kode=0){
		$hasil=$this->m_tindakan->hapus('tindakan',array('id_tindakan'=>$kode));
		if($hasil==1){
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
    				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    				<strong>Succes! </strong>Data Terhapus.</div>');
			redirect('C_tindakan/index');
		}else{
			echo "Data Gagal Terhapus";
		}
	}
}
?>