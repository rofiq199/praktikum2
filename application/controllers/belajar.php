<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('data');
	}

	public function index(){
		echo "ini method index pada controller belajar";
	}

	public function halo(){
		echo "ini method halo pada controller belajar";
	}

    public function hai(){
        $data=array(
			'judul' => "Cara Membuat View Pada CodeIgniter",
			'nama' => "rofiq");
        $this->load->view('viewbelajar',$data);
	}
	function user(){
		$data['user'] = $this->data->ambil_data()->result();
		$this->load->view('v_user',$data);
	}
}