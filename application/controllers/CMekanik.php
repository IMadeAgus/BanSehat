<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cmekanik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasimekanik();
        $this->load->model('mmekanik');
    }

    public function dashboard()
    {
        // Ambil data AkunMekanik dari sesi
        $AkunMekanik = $this->session->userdata('AkunMekanik');
        $data = [
            'header' => $this->load->view('partials/headermekanik', '', TRUE),
            'footer' => $this->load->view('partials/footer', '', TRUE),
        ];
        // Ambil informasi pesanan dan masukkan ke dalam $data['hasil']
        $data['hasil'] = $this->mmekanik->getOrderInfo($AkunMekanik);
        $data['status'] = $this->mmekanik->getStatus($AkunMekanik);
        $this->load->view('mekanik/homepage', $data);
        // Tampilkan view dengan data yang sudah diatur

    }

    function finishOrder($IdPesanan)
    {
        $this->mmekanik->finishOrder($IdPesanan);
        // $AkunMekanik = $this->session->userdata('AkunMekanik');
        // $data = [
        //     'header' => $this->load->view('partials/headermekanik', '', TRUE),
        //     'footer' => $this->load->view('partials/footer', '', TRUE),
        // ];
        // // Ambil informasi pesanan dan masukkan ke dalam $data['hasil']
        // $data['hasil'] = $this->mmekanik->getOrderInfo($AkunMekanik);

        // // Tampilkan view dengan data yang sudah diatur
        // $this->load->view('mekanik/homepage', $data);
        $redirectUrl = site_url('homepagemekanik');
        redirect($redirectUrl, 'refresh');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('clogin/index', 'refresh');
    }

    function formEditProfil($AkunMekanik)
    {
        $data = [
            'header' => $this->load->view('partials/headermekanik', '', TRUE),
            'footer' => $this->load->view('partials/footer', '', TRUE),
        ];
        $data['hasil'] = $this->mmekanik->getProfilMekanik($AkunMekanik);
        $this->load->view('mekanik/profil', $data);
    }
    public function editProfil()
    {
        $AkunMekanik = $this->session->userdata('AkunMekanik');
        $fotoProfil = $this->mmekanik->getFotoProfil($AkunMekanik);

        $this->mmekanik->editProfil($fotoProfil);
    }
}