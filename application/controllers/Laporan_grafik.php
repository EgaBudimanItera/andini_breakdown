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

	public function mttr(){
		$data = array(
			'link' => 'laporan_mttr',
			'page' => 'laporan/laporan_mttr',
			'script' => 'breakdown/script',
			'unit' => $this->db->get("unit")
		);
		$this->load->view('template/wrapper', $data);
	}

	public function lihat_tabel_mttr(){
		$kdunit = $this->input->post('kdunit', true);
		$tgl_awal = date('Y-m-d', strtotime($this->input->post('dari', true)));
		$tgl_akhir = date('Y-m-d', strtotime($this->input->post('sampai', true)));
		$query = $this->db->query("SELECT kdorder, tglmulai, tglselesai, jammulai, jamselesai, DATEDIFF(tglselesai, tglmulai) AS dur_by_date , TIMESTAMPDIFF(HOUR,CONCAT(tglmulai,' ',jammulai), CONCAT(tglselesai,' ',jamselesai) ) AS dur_by_time, statusakhir FROM orderbreakdown WHERE tglorder between '$tgl_awal' and '$tgl_akhir' and statusakhir = 'RFU' and kdunit = '$kdunit'");
		$no =1;
		echo '<table class="table table-striped">
			<tr>
				<td>No.</td>
				<td>Kode Order</td>
				<td>Tanggal Mulai</td>
				<td>Tanggal Selesai</td>
				<td>Jam Mulai</td>
				<td>Jam Selesai</td>
				<td>Duration by date</td>
				<td>Duration by time</td>
				<td>Status Akhir</td>
			</tr>';
		$total_date = 0;
		$total_time = 0;
		foreach($query->result() as $row_data){
			$total_date += $row_data->dur_by_date;
			$total_time += $row_data->dur_by_time;
	?>
			<tr>
				<td><?=$no++?>.</td>
				<td><?=$row_data->kdorder?></td>
				<td><?=$row_data->tglmulai?></td>
				<td><?=$row_data->tglselesai?></td>
				<td><?=$row_data->jammulai?></td>
				<td><?=$row_data->jamselesai?></td>
				<td><?=$row_data->dur_by_date?></td>
				<td><?=$row_data->dur_by_time?></td>
				<td><?=$row_data->statusakhir?></td>
			</tr>
	<?php
		}
		if($query->num_rows()==NULL){
			$rata_kerusakan_by_date = 0;
			$rata_kerusakan_by_time = 0;
		}else{
			$rata_kerusakan_by_date = $total_date/$query->num_rows();
			$rata_kerusakan_by_time = $total_time/$query->num_rows();	
		}
		

		echo '</table><hr/>';
		echo "Periode $tgl_awal s/d $tgl_akhir unit $kdunit mengalami rata - rata kerusakan $rata_kerusakan_by_date Hari<br/><br/>";
		echo "Periode $tgl_awal s/d $tgl_akhir unit $kdunit mengalami rata - rata kerusakan $rata_kerusakan_by_time Jam<br/><br/>";
	}
}