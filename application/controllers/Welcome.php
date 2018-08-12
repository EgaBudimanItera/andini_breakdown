<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$jml_hari_bln_ini = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		$tgl_awal = date('Y-m-').'01';
		$tgl_akhir = date('Y-m-').$jml_hari_bln_ini;
		$query = $this->db->query("select count(*) as jumlah, unit.kdunit, namajenis, namamerk from orderbreakdown left join unit on unit.kdunit = orderbreakdown.kdunit left join jenis on jenis.kdjenis = unit.kdjenis left join merk on merk.kdmerk = unit.kdmerk where tglorder between '2018-08-01' and '2018-08-31' group by kdunit order by jumlah DESC limit 5");
		
		$data = array(
			'link' => 'dashboard',
			'page' => 'welcome_message',
			'jumlah_hari' => $jml_hari_bln_ini,
			'script' => 'script_welcome',
			'row' => $query
		);
		$this->load->view('template/wrapper', $data);
		
	}
}
