<?php
class Mregister extends CI_Model
{
    function register()
    {

        $data = $_POST;

        // Hash password sebelum disimpan
        $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

        $this->db->insert('tbpengguna', $data);
        echo "<script>alert ('Data berhasil di simpan'); </script>";
        redirect('cregister/index', 'refresh');

    }
}