<?php
	class M_detail extends CI_model{
	public function select($where = ""){
		$data= $this->db->query("select * from detail_order ".$where);
		return $data;
		
	}
	
    public function cekkodebarang2(){
        $query = $this->db->query("SELECT MAX(id_detail_order) as id_detail_order from detail_order");
        $hasil = $query->row();
        return $hasil->id_detail_order;
    }
    public function getDetail(){
    	return $this->db->get('detail_order');
    }
    
    public function ubah($data){
        $this->db->where('id_detail_order',$data['id_detail_order']);
        $this->db->update('detail_order',$data);
    }

}

?>