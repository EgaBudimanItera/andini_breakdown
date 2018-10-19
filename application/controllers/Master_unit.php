<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_unit extends CI_Controller {

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
		$query="SELECT * FROM unit JOIN merk ON unit.kdmerk=merk.kdmerk";
		$data = array(
			'link' => 'master_unit',
			'page' => 'unit/data_unit',
			'script' => 'unit/script',
			'row' => $this->Model->kueri($query),
			'jenis' => $this->Model->getdata('jenis'),
			'merk' => $this->Model->getdata('merk'),
			'jenis1' => $this->Model->getdata('jenis'),
			'merk1' => $this->Model->getdata('merk'),
			'type_unit' => $this->Model->getdata('type_unit')
		);
		$this->load->view('template/wrapper', $data);
	}

	public function get_unit(){
		$id = $this->input->post('kdunit', true);
		$getdata = $this->Model->getdata('unit', array('kdunit' => $id));
		echo json_encode($getdata->row());
	}

	public function get_type_unit(){
		$id = $this->input->post('kdunit', true);
		$getdata = $this->Model->getdata('type_unit',array('id_type_unit' => $id));
		echo json_encode($getdata->row());
	}

	public function save_unit(){
		$kodeunit = $this->input->post('kode_unit', true);
		$tipeunit = $this->input->post('tipe_unit', true);
		$kdjenis = $this->input->post('kode_jenis', true);
		$kdmerk = $this->input->post('kode_merk', true);
		$wilayah_unit = $this->input->post('wilayah_unit', true);
		$hmawal = $this->input->post('hmawal', true);
		$hmakhir = $this->input->post('hmakhir', true);
		
		//cek kode unit
		$cek = $this->Model->getdata('unit', array('kdunit' => $kodeunit));
		if($cek->num_rows() != 0){
			$msg = array(
				'status' => 'gagal',
				'txt' => "<div class='alert alert-danger'>Maaf, kode unit sudah digunakan..</div>",
			);
			echo json_encode($msg);
			exit();
		}

		//definisi data to save
		$data = array(
			'kdunit' => $kodeunit,
			'tipeunit' => $tipeunit,
			'kdjenis' => $kdjenis,
			'kdmerk' => $kdmerk,
			'wilayahunit' => $wilayah_unit,
			'hmawal' => $hmawal,
			'hmakhir' => $hmakhir,
		);

		//save data
		$simpan =  $this->Model->insertdata('unit', $data);

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

	public function update_unit(){
		$kodeunit = $this->input->post('kode_unit', true);
		$tipeunit = $this->input->post('tipe_unit', true);
		$kdjenis = $this->input->post('kode_jenis', true);
		$kdmerk = $this->input->post('kode_merk', true);
		$wilayah_unit = $this->input->post('wilayah_unit', true);
		$hmawal = $this->input->post('hmawal', true);
		$hmakhir = $this->input->post('hmakhir', true);
		$data = array(
			// 'kdunit' => $kodeunit,
			'tipeunit' => $tipeunit,
			'kdjenis' => $kdjenis,
			'kdmerk' => $kdmerk,
			'wilayahunit' => $wilayah_unit,
			'hmawal' => $hmawal,
			'hmakhir' => $hmakhir,
		);

		//save data
		$simpan =  $this->Model->updatedata('unit',array('kdunit' => $kodeunit), $data);

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

	public function delete_unit(){
		$kodeunit = $this->input->post('kdunit', true);
		//delete data
		$hapus =  $this->Model->removedata('unit',array('kdunit' => $kodeunit));

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
