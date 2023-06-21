<?php
	class M_level extends CI_model{
	public function select($where = ""){
		$data= $this->db->query("select * from level ".$where);
		return $data;
		
	}
	function getLevel()
    {
        return $this->db->get('level');
    }
	function total_rows() {
    	return $this->db->get('level')->num_rows();
  	}
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_level) as id_level from level");
        $hasil = $query->row();
        return $hasil->id_level;
    }
    
	public function add($data){
			$this->db->insert('level',$data);
	}

	public function ubah($data){
		$this->db->where('id_level',$data['id_level']);
		$this->db->update('level',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>