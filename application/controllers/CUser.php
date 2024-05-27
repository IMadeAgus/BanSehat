<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cuser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('mvalidasi');
		// $this->mvalidasi->validasi();
	}

	public function dashboard()
	{
		$data = [
			'header' => $this->load->view('partials/header', '', TRUE),
			'footer' => $this->load->view('partials/footer', '', TRUE),
		];
		$this->load->view('user/homepage', $data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('clogin/index', 'refresh');
	}




}