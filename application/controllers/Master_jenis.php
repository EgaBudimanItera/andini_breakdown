<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jenis extends CI_Controller {

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
			'link' => 'master_jenis',
			'page' => 'jenis/data_jenis',
			'script' => 'jenis/script',
			'row' => $this->Model->getdata('jenis'),
			'kd_jenis' => $this->Model->id_jenis()
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_jenis(){
		$id = $this->input->post('kdjenis', true);
		$getdata = $this->Model->getdata('jenis', array('kdjenis' => $id));
		echo json_encode($getdata->row());
	}

	public function save_jenis(){
		$kodejenis = $this->input->post('kode_jenis', true);
		$namajenis = $this->input->post('nama_jenis', true);

		//cek kode jenis
		$cek = $this->Model->getdata('jenis', array('kdjenis' => $kodejenis));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode jenis sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdjenis' => $kodejenis,
			'namajenis' => $namajenis
		);

		//save data
		$simpan =  $this->Model->insertdata('jenis', $data);

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

	public function update_jenis(){
		$kodejenis = $this->input->post('kode_jenis_edit', true);
		$namajenis = $this->input->post('nama_jenis_edit', true);
		$data = array(
			// 'kdjenis' => $kodejenis,
			'namajenis' => $namajenis
		);

		//save data
		$simpan =  $this->Model->updatedata('jenis',array('kdjenis' => $kodejenis), $data);

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

	public function delete_jenis(){
		$kodejenis = $this->input->post('kdjenis', true);
		//delete data
		$hapus =  $this->Model->removedata('jenis',array('kdjenis' => $kodejenis));

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
