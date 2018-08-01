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
			// 'kdorder' => $this->input->post('kdorder', true),
			'kdorder' => $this->Model->id_breakdown(),
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
		$this->db->where(array('kdorder' => $kdorder));
		$row = $this->db->get();

		$this->db->from('komponen');
		$this->db->join('orderkomponen', 'orderkomponen.kdkomponen = komponen.kdkomp');
		$row_komp = $this->db->get();

		$this->db->from('komponen');
		$this->db->join('orderkomponen', 'orderkomponen.kdkomponen = komponen.kdkomp');
		$this->db->where(array('kdorder' => $kdorder));
		$list_komp = $this->db->get();

		$this->db->from('perbaikan');
		$this->db->join('orderperbaikan', 'orderperbaikan.kdperbaikan = perbaikan.kdperbaikan');
		$this->db->where(array('kdorder' => $kdorder));
		$list_perbaikan = $this->db->get();

		$data = array(
			'link' => 'list_breakdown',
			'page' => 'breakdown/detail_breakdown',
			'row' => $row,
			'script' => 'breakdown/script',
			'unit' => $this->Model->getdataall('unit'),
			'aksi' => $this->Model->getdata('orderaksi', array('kdorder' => $kdorder)),
			'komponen' => $this->Model->getdataall('komponen'),
			'perbaikan' => $this->Model->getdataall('perbaikan'),
			'komp' => $row_komp,
			'list_komp' => $list_komp,
			'list_mekanik' => $this->Model->getdata('ordermekanik', array('kdorder' => $kdorder)),
			'list_perbaikan' => $list_perbaikan,
			'list_problem' => $this->Model->getdata('orderproblem', array('kdorder' => $kdorder)),
		);
		$this->load->view('template/wrapper', $data);

	}

	public function simpanorderbreakdownjammulai(){
		$data = array(
			'tglmulai' => $this->input->post('tglmulai', true),
			'jammulai' => $this->input->post('jammulai', true),
			'statusbd' => 'BS'
		);
		$simpan = $this->Model->updatedata('orderbreakdown', array('kdorder' => $this->input->post('kdorder1', true)), $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder1', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder1', true).'";</script>';
		}
	}

	public function simpanorderbreakdownkomponen(){
		$data = array(
			'kdorder' => $this->input->post('kdorder3', true),
			'kdkomponen' => $this->input->post('kdkomponen', true),
		);
		$simpan = $this->Model->insertdata('orderkomponen', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder3', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder3', true).'";</script>';
		}
	}

	public function simpanorderbreakdownaksi(){
		$data = array(
			'aksi' => $this->input->post('aksibreakdown', true),
			'kdorder' =>$this->input->post('kdorder2', true),
		);
		
		$simpan = $this->Model->insertdata('orderaksi', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder2', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder2', true).'";</script>';
		}
		
	}

	public function hapus_aksi($kdaksi, $kdorder){
		$hapus = $this->Model->removedata('orderaksi', array('kd' => $kdaksi));

		if($hapus){
			echo '<script>alert("Data berhasil dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}else{
			echo '<script>alert("Data gagal dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}
	}

	public function hapus_komp($kdaksi, $kdorder){
		$hapus = $this->Model->removedata('orderkomponen', array('kd' => $kdaksi));

		if($hapus){
			echo '<script>alert("Data berhasil dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}else{
			echo '<script>alert("Data gagal dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}
	}

	public function simpanorderbreakdownmekanik(){
		$data = array(
			'namamekanik' => $this->input->post('namamekanik', true),
			'kdorder' =>$this->input->post('kdorder4', true),
		);
		
		$simpan = $this->Model->insertdata('ordermekanik', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder4', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder4', true).'";</script>';
		}
		
	}

	public function hapus_mekanik($kdaksi, $kdorder){
		$hapus = $this->Model->removedata('ordermekanik', array('kd' => $kdaksi));

		if($hapus){
			echo '<script>alert("Data berhasil dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}else{
			echo '<script>alert("Data gagal dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}
	}

	public function simpanorderbreakdownperbaikan(){
		$data = array(
			'kdperbaikan' => $this->input->post('kdperbaikan', true),
			'kdorder' =>$this->input->post('kdorder5', true),
		);
		
		$simpan = $this->Model->insertdata('orderperbaikan', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder5', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder5', true).'";</script>';
		}
		
	}

	public function hapus_perbaikan($kdaksi, $kdorder){
		$hapus = $this->Model->removedata('orderperbaikan', array('kd' => $kdaksi));

		if($hapus){
			echo '<script>alert("Data berhasil dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}else{
			echo '<script>alert("Data gagal dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}
	}

	public function simpanorderbreakdownproblem(){
		$data = array(
			'problem' => $this->input->post('problem', true),
			'kdorder' =>$this->input->post('kdorder6', true),
		);
		
		$simpan = $this->Model->insertdata('orderproblem', $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder6', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$this->input->post('kdorder6', true).'";</script>';
		}
		
	}

	public function hapus_problem($kdaksi, $kdorder){
		$hapus = $this->Model->removedata('orderproblem', array('kd' => $kdaksi));

		if($hapus){
			echo '<script>alert("Data berhasil dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}else{
			echo '<script>alert("Data gagal dihapus");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/detail/'.$kdorder.'";</script>';
		}
	}

	public function selesaikan($kdorder){
		$this->db->from('orderbreakdown');
		$this->db->join('unit', 'unit.kdunit = orderbreakdown.kdunit');
		$this->db->where(array('kdorder' => $kdorder));
		$row = $this->db->get();
		$data = array(
			'link' => 'list_breakdown',
			'page' => 'breakdown/selesaikan_breakdown',
			'row' => $row,
			'script' => 'breakdown/script',
			'unit' => $this->Model->getdataall('unit'),
			'kerusakan' => $this->Model->getdataall('kerusakan'),
			
		);
		$this->load->view('template/wrapper', $data);
	}

	public function simpanorderbreakdownselesaikan(){
		$data = array(
			'tglselesai' => $this->input->post('tglselesai', true),
			'jamselesai' => $this->input->post('jamselesai', true),
			'kdkerusakan' => $this->input->post('kdkerusakan', true),
			'statusbd' => $this->input->post('statusbd', true),
			'statusakhir' => $this->input->post('statusakhir', true),
		);

		$simpan = $this->Model->updatedata('orderbreakdown', array('kdorder' => $this->input->post('kdorder1', true)), $data);
		if($simpan){
			echo '<script>alert("Data berhasil disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/selesaikan/'.$this->input->post('kdorder1', true).'";</script>';
		}else{
			echo '<script>alert("Data gagal disimpan");</script>';
			echo '<script>window.location.href = "'.base_url().'order_breakdown/selesaikan/'.$this->input->post('kdorder1', true).'";</script>';
		}
	}

}
