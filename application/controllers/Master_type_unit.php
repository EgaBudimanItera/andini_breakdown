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
		$data = array(
			'link' => 'master_type_unit',
			'page' => 'type_unit/data_type_unit',
			'script' => 'type_unit/script',
			'row' => $this->Model->getdata('type_unit')
		);
		$this->load->view('template/wrapper', $data);
	}

}