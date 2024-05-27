<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cregister extends CI_Controller
{
    function index()
    {
        $data = [
            'headerindex' => $this->load->view('partials/headerindex', '', TRUE),
            'footer' => $this->load->view('partials/footer', '', TRUE),
        ];
        $this->load->view('user/register', $data);

    }

    function register()
    {
        $this->load->model('mregister');
        $this->mregister->register();

    }
    function login()
    {
        $this->load->model('mlogin');
        $this->mlogin->login();
    }
}
?>