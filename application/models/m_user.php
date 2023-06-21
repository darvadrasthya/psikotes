<?php
	class M_user extends CI_model{

	public function select($where = ""){
		$data= $this->db->query("select * from user ".$where);
		return $data;
		
	}
	function total_rows() {
    	return $this->db->get('user')->num_rows();
  	}
	function cekUser($kode)
    {
        $this->db->where("id_user", $kode);
        return $this->db->get("user");
    }
	function getUser()
    {
        return $this->db->get('user');
    }
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_user) as id_user from user");
        $hasil = $query->row();
        return $hasil->id_user;
    }
  	
	public function add($data){
			$this->db->insert('user',$data);
	}

	public function ubah($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>