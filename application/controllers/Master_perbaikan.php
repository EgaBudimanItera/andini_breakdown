<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_perbaikan extends CI_Controller {

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
			'link' => 'master_perbaikan',
			'page' => 'perbaikan/data_perbaikan',
			'script' => 'perbaikan/script',
			'row' => $this->Model->getdata('perbaikan')
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_perbaikan(){
		$id = $this->input->post('kdperbaikan', true);
		$getdata = $this->Model->getdata('perbaikan', array('kdperbaikan' => $id));
		echo json_encode($getdata->row());
	}

	public function save_perbaikan(){
		$kodeperbaikan = $this->input->post('kode_perbaikan', true);
		$namaperbaikan = $this->input->post('nama_perbaikan', true);

		//cek kode perbaikan
		$cek = $this->Model->getdata('perbaikan', array('kdperbaikan' => $kodeperbaikan));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode perbaikan sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdperbaikan' => $kodeperbaikan,
			'keterangan' => $namaperbaikan
		);

		//save data
		$simpan =  $this->Model->insertdata('perbaikan', $data);

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

	public function update_perbaikan(){
		$kodeperbaikan = $this->input->post('kode_perbaikan_edit', true);
		$namaperbaikan = $this->input->post('nama_perbaikan_edit', true);
		$data = array(
			// 'kdperbaikan' => $kodeperbaikan,
			'keterangan' => $namaperbaikan
		);

		//save data
		$simpan =  $this->Model->updatedata('perbaikan',array('kdperbaikan' => $kodeperbaikan), $data);

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

	public function delete_perbaikan(){
		$kodeperbaikan = $this->input->post('kdperbaikan', true);
		//delete data
		$hapus =  $this->Model->removedata('perbaikan',array('kdperbaikan' => $kodeperbaikan));

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
