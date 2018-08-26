<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_komponen extends CI_Controller {

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
			'link' => 'master_komponen',
			'page' => 'komponen/data_komponen',
			'script' => 'komponen/script',
			'row' => $this->Model->getdata('komponen'),
			'kd_komp' => $this->Model->id_komponen()
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_komponen(){
		$id = $this->input->post('kdkomponen', true);
		$getdata = $this->Model->getdata('komponen', array('kdkomp' => $id));
		echo json_encode($getdata->row());
	}

	public function save_komponen(){
		$kodekomponen = $this->input->post('kode_komponen', true);
		$namakomponen = $this->input->post('nama_komponen', true);
		$keterangankomponen = $this->input->post('keterangan_komponen', true);

		//cek kode komponen
		$cek = $this->Model->getdata('komponen', array('kdkomp' => $kodekomponen));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode komponen sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdkomp' => $kodekomponen,
			'namakomp' => $namakomponen,
			'ketkomp' => $keterangankomponen
		);

		//save data
		$simpan =  $this->Model->insertdata('komponen', $data);

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

	public function update_komponen(){
		$kodekomponen = $this->input->post('kode_komponen_edit', true);
		$namakomponen = $this->input->post('nama_komponen_edit', true);
		$keterangankomponen = $this->input->post('keterangan_komponen_edit', true);

		//definisi data to save
		$data = array(
			// 'kdkomp' => $kodekomponen,
			'namakomp' => $namakomponen,
			'ketkomp' => $keterangankomponen
		);

		//save data
		$simpan =  $this->Model->updatedata('komponen',array('kdkomp' => $kodekomponen), $data);

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

	public function delete_komponen(){
		$kodekomponen = $this->input->post('kdkomponen', true);
		//delete data
		$hapus =  $this->Model->removedata('komponen',array('kdkomp' => $kodekomponen));

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
