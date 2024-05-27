<?php
defined('BASEPATH') or exit('No direct script access allowed');
class clogin extends CI_Controller
{
    function index()
    {
        $data = [
            'headerindex' => $this->load->view('partials/headerindex', '', TRUE),
            'footer' => $this->load->view('partials/footer', '', TRUE),
        ];
        $this->load->view('index', $data);

    }
    function login()
    {
        $this->load->model('mlogin');
        $this->mlogin->login();
    }
}
?>