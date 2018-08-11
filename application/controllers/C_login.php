<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

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
			'link' => 'dashboard',
			'page' => 'login',
		);
		$this->load->view('login', $data);
		
	}

	public function proses_login(){
		$username = $this->input->post('username', true);
		$password = $this->input->post('pass', true);
		$cek = $this->Model->getdata('user', array('username' => $username, 'password' => $password));
		if($cek->num_rows() != 0){
			$newdata = array(
		        'username'  => $username,
		        'nama'     => $cek->row()->nama,
		        'id_user' => $cek->row()->id_user,
		        'hak_akses' => $cek->row()->hak_akses,
		        'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			echo '<script>alert("user ditemukan!");window.location = "'.base_url().'welcome";</script>';
		}else{
			echo '<script>alert("Maaf, username atau password salah!");window.location = "'.base_url().'c_login";</script>';
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		echo '<script>alert("Berhasil keluar!");window.location = "'.base_url().'";</script>';
	}
}
