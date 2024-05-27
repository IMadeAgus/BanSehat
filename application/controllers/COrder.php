<?php
defined('BASEPATH') or exit('No direct script access allowed');

class corder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mvalidasi');
		$this->mvalidasi->validasi();
		$this->load->model('MOrder');
	}
	function order()
	{
		$this->MOrder->order();
		$redirectUrl = site_url('orderdetail/' . $this->session->userdata('AkunPengguna'));
		redirect($redirectUrl, 'refresh');
	}


	public function cancelorder($IdPesanan)
	{
		$namaGambar = $this->morder->getGambarName($IdPesanan);
		$buktiPembayaran = $this->morder->getBuktiPembayaran($IdPesanan);
		$this->morder->cancelorder($IdPesanan, $namaGambar, $buktiPembayaran);
		redirect('cuser/dashboard', 'refresh');
	}

	function payment()
	{
		$this->morder->orderupdate();
		$AkunMekanik = $this->morder->getRandomAktifMekanik();
		if ($AkunMekanik) {
			$redirectUrl = site_url('paymentform/' . $this->input->post('IdPesanan'));
			redirect($redirectUrl, 'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Mohon maaf, saat ini tidak ada mekanik yang tersedia, silahkan coba beberapa saat lagi');
			redirect('orderdetail/' . $this->session->userdata('AkunPengguna'));
		}
	}

	function paymentform($IdPesanan)
	{
		$data = [
			'header' => $this->load->view('partials/header', '', TRUE),
			'footer' => $this->load->view('partials/footer', '', TRUE),
		];
		$data['hasil'] = $this->morder->paymentform($IdPesanan);
		$this->load->view('user/paymentform', $data);
	}


	public function cetaknota($IdPesanan)
	{
		$this->load->library('pdfgenerator');
		$data['hasil'] = $this->morder->nota($IdPesanan);
		$this->data['title_pdf'] = 'Nota Pembayaran';
		$file_pdf = 'Nota_Pembayaran.pdf';
		$paper = 'A3';
		$orientation = "portrait";
		$html = $this->load->view('user/nota', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

	}
	function updateOrder()
	{
		$MetodePembayaran = $this->input->post('MetodePembayaran');
		$IdPesanan = $this->input->post('IdPesanan');
		$this->morder->updateOrder($IdPesanan, $MetodePembayaran);
		$redirectUrl = site_url('orderdetail/' . $this->session->userdata('AkunPengguna'));
		redirect($redirectUrl, 'refresh');

	}
	function finishOrder($IdPesanan)
	{
		$this->morder->finishOrder($IdPesanan);
		$redirectUrl = site_url('orderdetail/' . $this->session->userdata('AkunPengguna'));
		redirect($redirectUrl, 'refresh');
	}
	function refuseFinishOrder($IdPesanan)
	{
		$this->morder->refuseFinishOrder($IdPesanan);
		$redirectUrl = site_url('orderdetail/' . $this->session->userdata('AkunPengguna'));
		redirect($redirectUrl, 'refresh');
	}

	function orderdetail($AkunPengguna)
	{
		// $IdPesanan = $this->morder->getIdPesanan($AkunPengguna);
		$AkunMekanik = $this->morder->getAccountMekanik($AkunPengguna);
		$Infomekanik['hasil'] = $this->morder->getMekanikInfo($AkunMekanik);
		$Data['hasil'] = $this->morder->orderdetail($AkunPengguna);
		$data = [
			'header' => $this->load->view('partials/header', '', TRUE),
			'footer' => $this->load->view('partials/footer', '', TRUE),
			'order' => $this->load->view('user/order', $Data, TRUE),
			'rating' => $this->load->view('user/rating', $Data, TRUE),
			'InfoMekanik' => $this->load->view('user/infomekanik', $Infomekanik, TRUE)
		];
		$data['hasil'] = $this->morder->orderdetail($AkunPengguna);
		// Menangani pesan jika daftar pesanan kosong
		if (empty($data['hasil'])) {
			$this->session->set_flashdata('pesan', 'Daftar pesanan kosong, silahkan buat pesanan');
			redirect('homepage#pesanlayanan', $data);
		} else {
			// Memuat view dengan data yang telah diambil dari model
			$this->load->view('user/orderdetail', $data);
		}
	}


	function rating()
	{
		$this->morder->rating();
		$redirectUrl = site_url('homepage');
		redirect($redirectUrl, 'refresh');
	}
}
