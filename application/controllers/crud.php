<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
  //halaman utama
	function index(){
    //untuk menampilkan data dari database melalui file model m_data 
    $data['user'] = $this->m_data->tampil_data()->result();
    //menampilkan halaman v_tampil pada folder view dengan data yang telah diambil dari database
    $this->load->view('v_tampil',$data);
    }
    //halaman tambah data
    function tambah(){
      //untuk menampilkan halaman v_input pada folder views
		$this->load->view('v_input');
    }
    //fungsi proses tambah data dari halaman v_input
    function tambah_aksi(){
		$nama = $this->input->post('nama'); //menangkap values nama dari variabel nama pada form tambah data
		$alamat = $this->input->post('alamat'); //menangkap values alamat dari variabel alamt pada form tambah data
		$pekerjaan = $this->input->post('pekerjaan'); //menangkap values pekerjaan dari variabel pekerjaan pada form tambah data
      //membentuk array dari value yang ditangkap
		$data = array(
			'nama' => $nama, //menyesuaikan nama variabel nama untuk di input ke database
			'alamat' => $alamat, //menyesuaikan nama variabel alamat untuk di input ke database
			'pekerjaan' => $pekerjaan //menyesuaikan nama variabel pekerjaan untuk di input ke database
      );
      //proses pengiriman array yang telah dibuat ke folder model yang nama filenya m_data
		$this->m_data->input_data($data,'user');
    //apabila proses pengiriman berhasil maka akan membuka halaman utama dari crud
    redirect('/crud/');
    }
    
    //fungsi hapus berdasarkan id yang dipilih
    function hapus($id){
		$where = array('id' => $id); 
		$this->m_data->hapus_data($where,'user'); //pengiriman array where pada model m_data yang ditujukan pada tabel user
    //apabila proses pengiriman berhasil maka akan membuka halaman utama dari crud
    redirect('crud/');
    }

    //fungsi ini berguna untuk men select data yang akan kita rubah berdasarkan id nya
    function edit($id){
        //membuat variabel where yang berisi array id
        $where = array('id' => $id);
        //generate hasil query menjadi array
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        //menampilkan halaman v_tampil pada folder view dengan data yang telah dipilih
        $this->load->view('v_edit',$data);
    }

    //proses update 
    function update(){
        $id = $this->input->post('id'); //menangkap id yang telah di update
        $nama = $this->input->post('nama'); //menangkap values nama dari variabel nama pada form edit data
        $alamat = $this->input->post('alamat'); //menangkap values alamat dari variabel alamat pada form edit data
        $pekerjaan = $this->input->post('pekerjaan'); //menangkap values pekerjaan dari variabel pekerjaan pada form tambah data
        //membuat data yang telah ditangkap tadi menjadi array untuk di input ke database 
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        //array khusus untuk parameter id
        $where = array(
            'id' => $id
        );
        //proses pengiriman array yang telah dibuat ke folder model yang nama filenya m_data
        $this->m_data->update_data($where,$data,'user');
        //apabila berhasil akan langsung direct ke halaman utama crud
        redirect('crud/');
    }
}