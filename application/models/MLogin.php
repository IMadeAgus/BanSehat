<?php
class Mlogin extends CI_Model
{
    function login()
    {
        $Email = $this->input->post('Email');
        $Password = $this->input->post('Password');

        $sql = "select * from tbpengguna where Email='" . $Email . "'";
        $query = $this->db->query($sql);

        $sql_mekanik = "select * from tbmekanik where Email='" . $Email . "'";
        $query_mekanik = $this->db->query($sql_mekanik);

        $sql_admin = "select * from tbadmin where Email='" . $Email . "'";
        $query_admin = $this->db->query($sql_admin);

        // Hapus semua sesi sebelumnya
        // $this->session->unset_userdata(['AkunPengguna', 'Nama', 'AkunMekanik', 'NamaMekanik', 'AkunAdmin', 'NamaAdmin']);

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $hashedPassword = $data->Password;

            // Check the hashed password
            if (password_verify($Password, $hashedPassword)) {
                $array = array(
                    'AkunPengguna' => $data->AkunPengguna,
                    'Nama' => $data->Nama
                );
                $this->session->set_userdata($array);
                redirect('homepage', 'refresh');
            }
        } else if ($query_mekanik->num_rows() > 0) {
            $data = $query_mekanik->row();
            $hashedPassword = $data->Password;

            // Check the hashed password
            if (password_verify($Password, $hashedPassword)) {
                $array = array(
                    'AkunMekanik' => $data->AkunMekanik,
                    'NamaMekanik' => $data->NamaMekanik
                );
                $this->session->set_userdata($array);
                redirect('homepagemekanik', 'refresh');
            }
        } else if ($query_admin->num_rows() > 0) {
            $data = $query_admin->row();
            $array = array(
                'AkunAdmin' => $data->AkunAdmin,
                'NamaAdmin' => $data->NamaAdmin
            );
            $this->session->set_userdata($array);
            redirect('dashboardadmin', 'refresh');

        }

        // If none of the conditions match, display an error message
        $this->session->set_flashdata('pesan', 'Login gagal, email atau password salah');
        redirect('clogin/index', 'refresh');
    }
}
?>