<?php 

class M_login extends CI_Model{	
	//fungsi cek login
	function cek_login($table,$where){		
		//menampilkan data dari database
		return $this->db->get_where($table,$where);
	}	
}