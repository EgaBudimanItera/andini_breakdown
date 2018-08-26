<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_merk extends CI_Controller {

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
			'link' => 'master_merk',
			'page' => 'merk/data_merk',
			'script' => 'merk/script',
			'row' => $this->Model->getdata('merk'),
			'kd_merk' => $this->Model->id_merk()
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_merk(){
		$id = $this->input->post('kdmerk', true);
		$getdata = $this->Model->getdata('merk', array('kdmerk' => $id));
		echo json_encode($getdata->row());
	}

	public function save_merk(){
		$kodemerk = $this->input->post('kode_merk', true);
		$namamerk = $this->input->post('nama_merk', true);

		//cek kode merk
		$cek = $this->Model->getdata('merk', array('kdmerk' => $kodemerk));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode merk sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdmerk' => $kodemerk,
			'namamerk' => $namamerk
		);

		//save data
		$simpan =  $this->Model->insertdata('merk', $data);

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

	public function update_merk(){
		$kodemerk = $this->input->post('kode_merk_edit', true);
		$namamerk = $this->input->post('nama_merk_edit', true);
		$data = array(
			// 'kdmerk' => $kodemerk,
			'namamerk' => $namamerk
		);

		//save data
		$simpan =  $this->Model->updatedata('merk',array('kdmerk' => $kodemerk), $data);

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

	public function delete_merk(){
		$kodemerk = $this->input->post('kdmerk', true);
		//delete data
		$hapus =  $this->Model->removedata('merk',array('kdmerk' => $kodemerk));

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
