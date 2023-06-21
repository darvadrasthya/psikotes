<?php
	class M_obat extends CI_model{
		public function select($where = ""){
		$data= $this->db->query("select * from obat ".$where);
		return $data;
		
	}
	function getObat()
    {
        return $this->db->get('obat');
    }
	function cekobat($kode)
    {
        $this->db->where("id_obat", $kode);
        return $this->db->get("obat");
    }
    function total_rows() {
    	return $this->db->get('obat')->num_rows();
  	}
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_obat) as id_obat from obat");
        $hasil = $query->row();
        return $hasil->id_obat;
   
    }
	public function add($data){
			$this->db->insert('obat',$data);
	}

	public function ubah($data){
		$this->db->where('id_obat',$data['id_obat']);
		$this->db->update('obat',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>