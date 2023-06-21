<?php
	class M_masakan extends CI_model{
		public function select($where = ""){
		$data= $this->db->query("select * from masakan ".$where);
		return $data;
		
	}
	function cekMasakan($kode)
    {
        $this->db->where("id_masakan", $kode);
        return $this->db->get("masakan");
    }
    function total_rows() {
    	return $this->db->get('masakan')->num_rows();
  	}
    function update_status(){
    	$id_masakan = $_REQUEST['sid'];
    	$status_masakan = $_REQUEST['sval'];
    	if($status_masakan>=1)
    	{
    		$status_masakan = 0;
    	}else{
    		$status_masakan = 1;
    	}
    	$data=array(
    		'status_masakan'=>$status_masakan
    	);
    	$this->db->where('id_masakan',$id_masakan);
    	return $this->db->update('masakan',$data);
    }
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_masakan) as id_masakan from masakan");
        $hasil = $query->row();
        return $hasil->id_masakan;
   
    }
	public function add($data){
			$this->db->insert('masakan',$data);
	}

	public function ubah($data){
		$this->db->where('id_masakan',$data['id_masakan']);
		$this->db->update('masakan',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>