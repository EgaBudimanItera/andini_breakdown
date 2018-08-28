<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_grafik extends CI_Controller {

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
			'link' => 'laporan_grafik',
			'page' => 'laporan/laporan_grafik',
			'script' => 'breakdown/script',
		);
		$this->load->view('template/wrapper', $data);
	}

	public function lihat_grafik_periode(){
		$tgl_awal = date('Y-m-d', strtotime($this->input->post('dari', true)));
		$tgl_akhir = date('Y-m-d', strtotime($this->input->post('sampai', true)));
		$diff = abs(strtotime($tgl_akhir)-strtotime($tgl_awal));
		$jml_hari_bln_ini = $diff/86400;
		$query = $this->db->query("select count(*) as jumlah, unit.kdunit, namajenis, namamerk from orderbreakdown left join unit on unit.kdunit = orderbreakdown.kdunit left join jenis on jenis.kdjenis = unit.kdjenis left join merk on merk.kdmerk = unit.kdmerk where tglorder between '$tgl_awal' and '$tgl_akhir' group by kdunit order by jumlah DESC limit 5");
		$data = array(			
			'script' => 'script_welcome',
			'jumlah_hari' => $jml_hari_bln_ini,
			'row' => $query,
			'tanggal_awal' => $tgl_awal,
			'tanggal_akhir' => $tgl_akhir
		);
		$this->load->view('lihat_laporan_grafik', $data);
	}

	public function grafik_komponen(){
		$data = array(
			'link' => 'laporan_grafik_komponen',
			'page' => 'laporan/laporan_grafik_komponen',
			'script' => 'breakdown/script',
		);
		$this->load->view('template/wrapper', $data);
	}

	public function lihat_grafik_periode_komponen(){
		$tgl_awal = date('Y-m-d', strtotime($this->input->post('dari', true)));
		$tgl_akhir = date('Y-m-d', strtotime($this->input->post('sampai', true)));
		$diff = abs(strtotime($tgl_akhir)-strtotime($tgl_awal));
		$jml_hari_bln_ini = $diff/86400;
		$query = $this->db->query("select count(*) as jumlah, orderkomponen.kdkomponen, komponen.namakomp from orderkomponen left join orderbreakdown on orderbreakdown.kdorder =  orderkomponen.kdorder left join komponen on komponen.kdkomp = orderkomponen.kdkomponen where tglorder between '$tgl_awal' and '$tgl_akhir' group by orderkomponen.kdkomponen");
		$data = array(			
			// 'script' => 'script_welcome',
			'jumlah_hari' => $jml_hari_bln_ini,
			'row' => $query,
			'tanggal_awal' => $tgl_awal,
			'tanggal_akhir' => $tgl_akhir
		);
		$this->load->view('lihat_laporan_grafik_komponen', $data);
	}

	public function grafik_kerusakan(){
		$data = array(
			'link' => 'laporan_grafik_kerusakan',
			'page' => 'laporan/laporan_grafik_kerusakan',
			'script' => 'breakdown/script',
		);
		$this->load->view('template/wrapper', $data);
	}

	public function lihat_grafik_periode_kerusakan(){
		$tgl_awal = date('Y-m-d', strtotime($this->input->post('dari', true)));
		$tgl_akhir = date('Y-m-d', strtotime($this->input->post('sampai', true)));
		$diff = abs(strtotime($tgl_akhir)-strtotime($tgl_awal));
		$jml_hari_bln_ini = $diff/86400;
		$query = $this->db->query("SELECT COUNT(*) AS jumlah, kerusakan.kdkerusakan, kerusakan.keterangan FROM orderbreakdown LEFT JOIN kerusakan ON orderbreakdown.kdkerusakan =  kerusakan.kdkerusakan WHERE tglorder between '$tgl_awal' and '$tgl_akhir' AND orderbreakdown.kdkerusakan IS NOT NULL GROUP BY kerusakan.kdkerusakan");
		$data = array(			
			// 'script' => 'script_welcome',
			'jumlah_hari' => $jml_hari_bln_ini,
			'row' => $query,
			'tanggal_awal' => $tgl_awal,
			'tanggal_akhir' => $tgl_akhir
		);
		$this->load->view('lihat_laporan_grafik_kerusakan', $data);
	}
}