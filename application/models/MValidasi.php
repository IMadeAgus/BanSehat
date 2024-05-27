<?php
class Mvalidasi extends CI_Model
{
    function validasi()
    {
        if ($this->session->userdata('AkunPengguna') == '') {
            echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
            redirect('clogin/index', 'refresh');
        }
    }
    function validasimekanik()
    {
        if ($this->session->userdata('AkunMekanik') == '') {
            echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
            redirect('clogin/index', 'refresh');
        }
    }
    function validasiadmin()
    {
        if ($this->session->userdata('AkunAdmin') == '') {
            echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
            redirect('clogin/index', 'refresh');
        }
    }
}
?>