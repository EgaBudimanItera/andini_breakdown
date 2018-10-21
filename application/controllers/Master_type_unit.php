<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_type_unit extends CI_Controller {

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
		$query="SELECT * FROM type_unit join merk on type_unit.merk_type=merk.kdmerk join jenis on jenis_type=kdjenis";
		$data = array(
			'link' => 'master_type_unit',
			'page' => 'type_unit/data_type_unit',
			'script' => 'type_unit/script',
			'row' => $this->Model->kueri($query),
			'merk' => $this->Model->getdataall('merk'),
			'jenis'=>$this->Model->getdataall('jenis'),
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_type_unit(){
		$id = $this->input->post('kdunit', true);
		$getdata = $this->Model->getdata('type_unit', array('id_type_unit' => $id));
		echo json_encode($getdata->row());
	}

	public function save_type_unit(){
		$kode_type = $this->input->post('kode_tipe_unit', true);
		$merk_type = $this->input->post('merk_tipe_unit', true);
		$jenis_type = $this->input->post('jenis_tipe_unit', true);
		
		//cek kode unit
		$cek = $this->Model->getdata('type_unit', array('kode_type' => $kode_type));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode type sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kode_type' => $kode_type,
			'merk_type' => $merk_type,
			'jenis_type' => $jenis_type,
			
		);

		//save data
		$simpan =  $this->Model->insertdata('type_unit', $data);

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

	public function update_type_unit(){
		$kode_type = $this->input->post('kode_tipe_unit', true);
		$merk_type = $this->input->post('merk_tipe_unit', true);
		$jenis_type = $this->input->post('jenis_tipe_unit', true);
		$data = array(
			'kode_type' => $kode_type,
			'merk_type' => $merk_type,
			'jenis_type' => $jenis_type,
		);

		//save data
		$simpan =  $this->Model->updatedata('type_unit',array('id_type_unit' => $this->input->post('idtypeunit', true)), $data);

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

	public function delete_type_unit(){
		$kodeunit = $this->input->post('kdunit', true);
		//delete data
		$hapus =  $this->Model->removedata('type_unit',array('id_type_unit' => $kodeunit));

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