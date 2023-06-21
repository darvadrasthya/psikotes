<?php
	class M_transaksi extends CI_model{

	function simpan_masakan()
    {
        $nama_masakan    =  $this->input->post('masakan');
        $qty            =  $this->input->post('qty');
        $idmasakan       = $this->db->get_where('masakan',array('nama_masakan'=>$nama_masakan))->row_array();
        $data           = array('id_masakan'=>$idmasakan['id_masakan'],
                                'qty'=>$qty,
                                'harga'=>$idmasakan['harga'],
                                'status_detail_order'=>'0');
        $this->db->insert('detail_order',$data);
    }
    
    function tampilkan_detail_transaksi()
    {
        $query  ="SELECT td.id_detail_order,td.qty,td.harga,b.nama_masakan
                FROM detail_order as td,masakan as b
                WHERE b.id_masakan=td.id_masakan and td.status_detail_order='0'";
        return $this->db->query($query);
    }
    function hapusitem($id)
    {
        $this->db->where('id_detail_order',$id);
        $this->db->delete('detail_order');
    }
     function selesai_belanja($data)
    {
        $this->db->insert(`order`,$data);
        $last_id=  $this->db->query("select id_order from `order`")->row_array();
        $this->db->query("update detail_order set id_order='".$last_id['id_order']."' where status_detail_order='0'");
        $this->db->query("update detail_order set status_detail_order='1' where status_detail_order='0'");
    }
}
?>