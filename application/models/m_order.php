<?php
	class M_order extends CI_model{
	public function select($where = ""){
		$data= $this->db->query("select * from `order` ".$where);
		return $data;
		
	}
	
	public function cekkodebarang(){
        $query = $this->db->query("SELECT MAX(id_order) as id_order from `order`");
        $hasil = $query->row();
        return $hasil->id_order;
    }
    function cekOrder($kode)
    {
        $this->db->where("id_order", $kode);
        return $this->db->get("order");
    }
    function cekOrder2($kode)
    {
        $this->db->where("id_order", $kode);
        return $this->db->get("order");
    }
    function total_rows() {
    	return $this->db->get('order')->num_rows();
  	}
    function getOrder()
    {
        return $this->db->get('order');
    }
	function add($table,$data){
    	$query = $this->db->insert($table, $data);
    	return $query;
	}
	public function ubah($data){
		$this->db->where('id_order',$data['id_order']);
		$this->db->update('order',$data);
	}
	public function hapus($table,$where){
		return $this->db->delete($table,$where);
	}
}

?>