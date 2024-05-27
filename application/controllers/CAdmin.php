<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiadmin();
        $this->load->model('madmin');
        $this->load->model('morder');
    }

    public function dashboard()
    {
        $data = [
            'headeradmin' => $this->load->view('partials/headeradmin', '', TRUE),
        ];
        // Tampilkan view dengan data yang sudah diatur
        $this->load->view('admin/dashboard', $data);
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect('clogin/index', 'refresh');
    }


    function listOrder()
    {
        $data = [
            'headeradmin' => $this->load->view('partials/headeradmin', '', TRUE),

        ];
        $getAllOrder = [
            'hasil' => $this->madmin->getAllOrder(),
            'yearrevenue' => $this->madmin->getYearRevenue(),
            'monthrevenue' => $this->madmin->getMonthRevenue(),
            'todayrevenue' => $this->madmin->getTodayRevenue()
        ];
        $data['table'] = $this->load->view('admin/listpesanan', $getAllOrder, TRUE);
        $this->load->view('admin/dashboard', $data);
    }

    function updateAkunMekanik($IdPesanan)
    {
        $AkunMekanik = $this->morder->getRandomAktifMekanik();
        if ($AkunMekanik) {
            // Melakukan update pada tbpesanan
            $this->madmin->updateAkunMekanik($IdPesanan, $AkunMekanik['AkunMekanik'], );
            $redirectUrl = site_url('cadmin/listOrder');
            redirect($redirectUrl, 'refresh');
        }
        // else {
        //     $this->session->set_flashdata('pesan', 'Mohon maaf, saat ini tidak ada mekanik yang tersedia, silahkan coba beberapa saat lagi');
        //     redirect('paymentform/' . $IdPesanan);
        // }
    }
    function cancelorder($IdPesanan)
    {
        $buktiPembayaran = $this->morder->getBuktiPembayaran($IdPesanan);
        // Hapus gambar dari folder dan data dari database
        $this->madmin->cancelorder($IdPesanan, $buktiPembayaran);
        $redirectUrl = site_url('cadmin/listOrder');
        redirect($redirectUrl, 'refresh');
    }

    // Mekanik
    function showData()
    {
        $data = [
            'headeradmin' => $this->load->view('partials/headeradmin', '', TRUE),
        ];
        $showData['hasil'] = $this->madmin->showData();
        $data['konten'] = $this->load->view('admin/formmekanik', '', TRUE);
        $data['table'] = $this->load->view('admin/tablemekanik', $showData, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    function addMekanik()
    {
        $this->madmin->addMekanik();
    }
    function deleteData($AkunMekanik)
    {
        $this->madmin->deleteData($AkunMekanik);
    }

    function editData($AkunMekanik)
    {
        $this->madmin->editData($AkunMekanik);
    }

    public function cetakMekanik()
    {
        $this->load->library('pdfgenerator');

        // Fetch data from the model
        $data['hasil'] = $this->madmin->showData();

        // Set data for the view
        $this->data['title_pdf'] = 'Nota Pembayaran';

        // Set filename for the PDF when downloaded
        $file_pdf = 'Nota_Pembayaran.pdf'; // Berikan ekstensi .pdf pada nama file

        // Set paper size
        $paper = 'A3';

        // Set paper orientation (portrait / landscape)
        $orientation = "portrait";

        // Load the 'Cetaknota' view and store the HTML content
        $html = $this->load->view('admin/cetakmekanik', $data, true);

        // Generate PDF using pdfgenerator library
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}