<?php 

class M_data extends CI_Model{
  //untuk menampilkan data dari database yang terhubung
	function tampil_data(){
    //mengambil data pada tabel user
		return $this->db->get('user');
    }
    //untuk input data
    function input_data($data,$table){
    //proses input data ke tabel yang telah dipilih pada controler crud 
		$this->db->insert($table,$data);
    }
    //fungsi hapus data pada database
    function hapus_data($where,$table){
      //proses select data menggunakan parameter where yang telah di deklarasikan di controller crud
        $this->db->where($where);
      //proses hapus data yang telah di select 
        $this->db->delete($table);
    }
    //fungsi hapus data
    function edit_data($where,$table){		
      //mengambil data dari database dengan tabel dan data yang telah dipilih untuk ditampilkan
        return $this->db->get_where($table,$where);
    }
    //fungsi update data 
    function update_data($where,$data,$table){
      //proses select data menggunakan parameter where yang telah di deklarasikan di controller crud
    $this->db->where($where);
    //proses update data yang telah di select dengan parameter
		$this->db->update($table,$data);
	}
}