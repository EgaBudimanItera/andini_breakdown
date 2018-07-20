<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('Model');
	}

	public function index()
	{
		$data = array(
			'link' => 'master_user',
			'page' => 'user/data_user',
			'script' => 'user/script',
			'row' => $this->Model->getdata('user')
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_user(){
		$id = $this->input->post('kduser', true);
		$getdata = $this->Model->getdata('user', array('id_user' => $id));
		echo json_encode($getdata->row());
	}

	public function save_user(){
		$kodeuser = $this->input->post('kode_user', true);
		$namauser = $this->input->post('nama_user', true);
		$username = $this->input->post('username', true);
		$hak_akses = $this->input->post('hak_akses', true);
		$password = $this->input->post('password', true);
		//cek kode user
		$cek = $this->Model->getdata('user', array('id_user' => $kodeuser));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode user sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//cek kode user
		$cek = $this->Model->getdata('user', array('username' => $username));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, username sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'id_user' => $kodeuser,
			'nama' => $namauser,
			'username' => $username,
			'hak_akses' => $hak_akses,
			'password' => $password
		);

		//save data
		$simpan =  $this->Model->insertdata('user', $data);

		if($simpan){
			$msg = array(
				'status' => 'sukses',
				'txt' => "<div class='alert alert-success'>Data berhasil disimpan</div>",
			);
			echo json_encode($msg);
			exit();
		}else{
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, data gagal disimpan</div>",
			);
			echo json_encode($msg);
			exit();
		}

	}

	public function update_user(){
		$kodeuser = $this->input->post('kode_user_edit', true);
		$namauser = $this->input->post('nama_user_edit', true);		
		$username = $this->input->post('username_edit', true);
		$hak_akses = $this->input->post('hak_akses_edit', true);
		$password = $this->input->post('password_edit', true);
		$data = array(
			// 'id_user' => $kodeuser,
			'nama' => $namauser,
			// 'username' => $username,
			'hak_akses' => $hak_akses,
			'password' => $password
		);

		//save data
		$simpan =  $this->Model->updatedata('user',array('id_user' => $kodeuser), $data);

		if($simpan){
			$msg = array(
				'status' => 'sukses',
				'txt' => "<div class='alert alert-success'>Data berhasil disimpan</div>",
			);
			echo json_encode($msg);
			exit();
		}else{
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, data gagal disimpan</div>",
			);
			echo json_encode($msg);
			exit();
		}
	}

	public function delete_user(){
		$kodeuser = $this->input->post('kduser', true);
		//delete data
		$hapus =  $this->Model->removedata('user',array('id_user' => $kodeuser));

		if($hapus){
			$msg = array(
				'status' => 'sukses',
				'txt' => "<div class='alert alert-success'>Data berhasil dihapus</div>",
			);
			echo json_encode($msg);
			exit();
		}else{
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, data gagal dihapus</div>",
			);
			echo json_encode($msg);
			exit();
		}
	}
}
