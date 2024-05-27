<?php
class mmekanik extends CI_Model
{

    public function getOrderInfo($AkunMekanik)
    {
        $this->db->select('tbpesanan.*, tbpengguna.Nama, tbpengguna.NoHandphone, tbmekanik.Status ');
        $this->db->from('tbmekanik');
        $this->db->join('tbpesanan', 'tbmekanik.AkunMekanik = tbpesanan.AkunMekanik');
        $this->db->join('tbpengguna', 'tbpesanan.AkunPengguna = tbpengguna.AkunPengguna');
        $this->db->order_by('tbpesanan.IdPesanan', 'DESC');
        $this->db->limit(1);
        $this->db->where('tbmekanik.AkunMekanik', $AkunMekanik);

        $query = $this->db->get();
        return $query->result();

    }

    public function getStatus($AkunMekanik)
    {
        $this->db->select('tbmekanik.Status ');
        $this->db->from('tbmekanik');
        $this->db->where('tbmekanik.AkunMekanik', $AkunMekanik);

        $query = $this->db->get();
        return $query->result();

    }
    public function finishOrder($AkunMekanik)
    {
        $this->db->order_by('tbpesanan.IdPesanan', 'DESC');
        $this->db->limit(1);
        $this->db->where('AkunMekanik', $AkunMekanik);
        $this->db->update('tbpesanan', array('StatusPesanan' => 'Verifikasi Pesanan Selesai'));
    }

    public function getProfilMekanik($AkunMekanik)
    {

        $this->db->select('*');
        $this->db->from('tbmekanik');
        $this->db->where('AkunMekanik', $AkunMekanik);
        $query = $this->db->get();

        return $query->result();
    }
    public function editProfil($fotoProfil)
    {
        $config['upload_path'] = 'assets/img/fotomekanik';
        $config['allowed_types'] = 'pdf|jpg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $data = $this->input->post(); // Menggunakan $this->input->post() untuk mengambil data POST
        $AkunMekanik = $data['AkunMekanik'];

        if ($this->upload->do_upload('FotoProfil')) {
            $upload_data = $this->upload->data();
            $data['FotoProfil'] = $upload_data['file_name'];

            $gambarPath = FCPATH . 'assets/img/fotomekanik/';
            $pathFotoProfil = $gambarPath . $fotoProfil;

            if (file_exists($pathFotoProfil)) {
                unlink($pathFotoProfil);
            }

            // Edit
            $this->db->where('AkunMekanik', $AkunMekanik);
            $this->db->update('tbmekanik', $data);

            $this->session->set_flashdata('pesan', 'Data sudah diedit...');
            $redirectUrl = site_url('formEditProfil/' . $AkunMekanik);
            redirect($redirectUrl, 'refresh');
        } else {
            // Edit
            $this->db->where('AkunMekanik', $AkunMekanik);
            $this->db->update('tbmekanik', $data);

            $this->session->set_flashdata('pesan', 'Data sudah diedit...');
            $redirectUrl = site_url('formEditProfil/' . $AkunMekanik);
            redirect($redirectUrl, 'refresh');
        }
    }

    public function getFotoProfil($AkunMekanik)
    {
        // Ambil nama gambar dari database berdasarkan AkunMekanik
        $this->db->select('FotoProfil');
        $this->db->where('AkunMekanik', $AkunMekanik);
        $query = $this->db->get('tbmekanik');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->FotoProfil; // Mengganti dari FotoKerusakan menjadi FotoProfil
        } else {
            return null;
        }
    }
}