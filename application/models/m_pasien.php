<?php
	class M_pasien extends CI_model{
		public function select($where = ""){
		$data= $this->db->query("select * from pasien ".$where);
		return $data;
		
	}
	function getPasien()
    {
        return $this->db->get('pasien');
    }
	function cekpasien($kode)
    {
        $this->db->where("id_pasien", $kode);
        return $this->db->get("pasien");
    }
    function total_rows() {
    	return $this->db->get('pasien')->num_rows();
  	}
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_pasien) as id_pasien from pasien");
        $hasil = $query->row();
        return $hasil->id_pasien;
   
    }
	public function add($data){
			$this->db->insert('pasien',$data);
	}

	public function ubah($data){
		$this->db->where('id_pasien',$data['id_pasien']);
		$this->db->update('pasien',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>