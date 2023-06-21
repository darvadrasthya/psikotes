<?php

class C_transaksi extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model(array('m_transaksi','m_order','m_user','m_masakan'));
		
	}
	public function rows(){
        
        $this->load->model('m_transaksi');
        $this->data['total_transaksi'] =  $this->m_transaksi->total_rows();
        $this->load->view('Main/home_admin',$data);
    }
	function index(){
		$dariDB = $this->m_transaksi->cekkodebarang();
        $nourut = substr($dariDB, 3, 4);
        $id_skrg = $nourut + 1;
        $data = array('id_transaksi' => $id_skrg);
        $data['masakan'] = $this->m_masakan->getMasak()->result();
        $data['order'] = $this->m_order->getOrder()->result();
		$data['user'] = $this->m_user->getUser()->result();
		$data['transaksi'] = $this->m_transaksi->select()->result();
		$this->load->view("Main/transaksi",$data);
	}
	 public function cari_user()
    {
        $id_user = $this->input->post('id_user');
        $cari = $this->m_user->cekUser($id_user);
        //jika ada data ruang
        if($cari->num_rows() > 0) {
            $user = $cari->row_array();
            echo $user['nama_user'];
        }
    }
    public function cari_masakan()
    {
        $id_masakan = $this->input->post('id_masakan');
        $cari = $this->m_masakan->cekMasakan($id_masakan);
        //jika ada data ruang
        if($cari->num_rows() > 0) {
            $masakan = $cari->row_array();
            echo $masakan['nama_masakan'];
        }
    }
    public function cari_masakan2()
    {
        $id_masakan = $this->input->post('id_masakan');
        $cari = $this->m_masakan->cekMasakan2($id_masakan);
        //jika ada data ruang
        if($cari->num_rows() > 0) {
            $masakan = $cari->row_array();
            echo $masakan['harga'];
        }
    }
    public function cari_order()
    {
        $id_order = $this->input->post('id_order');
        $cari = $this->m_order->cekOrder($id_order);
        //jika ada data ruang
        if($cari->num_rows() > 0) {
            $order = $cari->row_array();
            echo $order['tanggal'];
        }
    }
    public function cari_order2()
    {
        $id_order = $this->input->post('id_order');
        $cari = $this->m_order->cekOrder2($id_order);
        //jika ada data ruang
        if($cari->num_rows() > 0) {
            $order = $cari->row_array();
            echo $order['id_masakan'];
        }
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