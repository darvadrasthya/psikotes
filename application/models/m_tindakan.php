<?php
	class M_tindakan extends CI_model{
		public function select($where = ""){
		$data= $this->db->query("select * from tindakan ".$where);
		return $data;
		
	}
	function cektindakan($kode)
    {
        $this->db->where("id_tindakan", $kode);
        return $this->db->get("tindakan");
    }
    function total_rows() {
    	return $this->db->get('tindakan')->num_rows();
  	}
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_tindakan) as id_tindakan from tindakan");
        $hasil = $query->row();
        return $hasil->id_tindakan; 
    }
	public function add($data){
			$this->db->insert('tindakan',$data);
	}

	public function ubah($data){
		$this->db->where('id_tindakan',$data['id_tindakan']);
		$this->db->update('tindakan',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>