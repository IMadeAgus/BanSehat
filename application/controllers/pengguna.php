<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $this->load->model('morder');
        $this->load->library('pdf');
        $AkunPengguna = 2;
        $data['hasil'] = $this->morder->orderdetail($AkunPengguna);
        $data = [
            'header' => $this->load->view('partials/header', '', TRUE),
            'footer' => $this->load->view('partials/footer', '', TRUE),
        ];
        $this->load->view('test', $data);

    }
}