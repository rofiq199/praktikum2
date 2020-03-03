<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login'); //loading model m_login

	}

	function index(){
		$this->load->view('v_login'); //loading halaman v_login pada folder view
	}

	function aksi_login(){
		$username = $this->input->post('username'); //mengambil values dari username
		$password = $this->input->post('password'); //mengambil values dari password
		//menjadikan data yang diambil tadi menjadi array
		$where = array(
			'nama' => $username, //diberi penamaan nama karena pada database nama rownya adalah nama
			'pekerjaan' => $password //diberi penamaan pekerjaan karena pada database nama rownya adalah pekerjaan
			);
		//cek kesamaan inputan 
		$cek = $this->m_login->cek_login("user",$where)->num_rows();
		if($cek > 0){
		//apabila data telah ditemukan maka
		//membuat array
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			//membuat session
			$this->session->set_userdata($data_session);
			//direct ke halaman admin 
			redirect(base_url("admin/index"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		//menghapus session
		$this->session->sess_destroy();
		redirect(base_url('login'));
    }
}