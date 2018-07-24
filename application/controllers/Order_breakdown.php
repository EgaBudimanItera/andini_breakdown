<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_breakdown extends CI_Controller {

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
			'link' => 'order_breakdown',
			'page' => 'breakdown/order_breakdown',
			'unit' => $this->Model->getdataall('unit')
		);
		$this->load->view('template/wrapper', $data);
		
	}

	public function simpanorderbreakdown(){
		//cek kode merk
		$cek = $this->Model->getdata('orderbreakdown', array('kdorder' => $this->input->post('kdorder', true)));
		if($cek->num_rows() != 0){
			echo '<script>alert("Kode Order Sudah digunakan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown";</script>';
			exit();
		}

		$data = array(
			'kdorder' => $this->input->post('kdorder', true),
			'orderbyname' => $this->input->post('nama', true),
			'orderbydiv' => $this->input->post('divisi', true),
			'tglorder' => date('Y-m-d'),
			'jamorder' => date('H:i:s'),
			'kdunit' => $this->input->post('unit', true),
		);
		$simpan = $this->Model->insertdata('orderbreakdown', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown";</script>';
		}
	}

	public function list_breakdown(){
		$this->db->from('orderbreakdown');
		$this->db->join('unit', 'unit.kdunit = orderbreakdown.kdunit');
		$row = $this->db->get();
		$data = array(
			'link' => 'list_breakdown',
			'page' => 'breakdown/list_breakdown',
			'row' => $row,
			'script' => 'breakdown/script',
		);
		$this->load->view('template/wrapper', $data);
	}

	public function detail($kdorder){
		$this->db->from('orderbreakdown');
		$this->db->join('unit', 'unit.kdunit = orderbreakdown.kdunit');
		$row = $this->db->get();
		$data = array(
			'link' => 'list_breakdown',
			'page' => 'breakdown/detail_breakdown',
			'row' => $row,
			'script' => 'breakdown/script',
			'unit' => $this->Model->getdataall('unit')
		);
		$this->load->view('template/wrapper', $data);

	}
}
