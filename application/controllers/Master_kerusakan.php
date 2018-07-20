<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kerusakan extends CI_Controller {

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
			'link' => 'master_kerusakan',
			'page' => 'kerusakan/data_kerusakan',
			'script' => 'kerusakan/script',
			'row' => $this->Model->getdata('kerusakan')
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_kerusakan(){
		$id = $this->input->post('kdkerusakan', true);
		$getdata = $this->Model->getdata('kerusakan', array('kdkerusakan' => $id));
		echo json_encode($getdata->row());
	}

	public function save_kerusakan(){
		$kodekerusakan = $this->input->post('kode_kerusakan', true);
		$namakerusakan = $this->input->post('nama_kerusakan', true);

		//cek kode kerusakan
		$cek = $this->Model->getdata('kerusakan', array('kdkerusakan' => $kodekerusakan));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode kerusakan sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdkerusakan' => $kodekerusakan,
			'keterangan' => $namakerusakan
		);

		//save data
		$simpan =  $this->Model->insertdata('kerusakan', $data);

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

	public function update_kerusakan(){
		$kodekerusakan = $this->input->post('kode_kerusakan_edit', true);
		$namakerusakan = $this->input->post('nama_kerusakan_edit', true);
		$data = array(
			// 'kdkerusakan' => $kodekerusakan,
			'keterangan' => $namakerusakan
		);

		//save data
		$simpan =  $this->Model->updatedata('kerusakan',array('kdkerusakan' => $kodekerusakan), $data);

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

	public function delete_kerusakan(){
		$kodekerusakan = $this->input->post('kdkerusakan', true);
		//delete data
		$hapus =  $this->Model->removedata('kerusakan',array('kdkerusakan' => $kodekerusakan));

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
