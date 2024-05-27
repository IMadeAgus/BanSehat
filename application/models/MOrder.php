<?php
class morder extends CI_Model
{
    function order()
    {
        $data = $this->input->post();
        $this->load->library('upload');
        $uploadResult = $this->uploadImage('FotoKerusakan', 'assets/img/uploads', 'jpg|png', 2048, TRUE);
        if ($uploadResult['success']) {
            $upload_data = $uploadResult['data'];
            $data['FotoKerusakan'] = $upload_data['file_name'];
            $data['TanggalPemesanan'] = date('Y-m-d H:i:s');

            $AkunPengguna = $data['AkunPengguna'];
            $sql = "SELECT * FROM tbpesanan WHERE AkunPengguna='" . $AkunPengguna . "' ORDER BY IdPesanan DESC LIMIT 1";
            $query = $this->db->query($sql);

            if ($query->num_rows() < 1) {
                $this->db->insert('tbpesanan', $data);
            } else {
                $existingOrder = $query->row();
                if ($existingOrder->StatusPesanan == 'Pesanan Selesai') {
                    $this->db->insert('tbpesanan', $data);
                } else {
                    $this->session->set_flashdata('pesan', 'Pesan Layanan gagal, silahkan selesaikan atau hapus pesanan sebelumnya pada Daftar Pesanan');
                    redirect('homepage#pesanlayanan', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('pesan', 'Pesan Layanan gagal, silahkan upload gambar dengan format Jpg dan Png dengan ukuran maksimal 2mb');
            redirect('homepage#pesanlayanan', 'refresh');
        }
    }


    function orderdetail($AkunPengguna)
    {
        $this->db->order_by('IdPesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('tbpesanan', array('AkunPengguna' => $AkunPengguna));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }


    public function cancelorder($IdPesanan, $namaGambar, $buktiPembayaran)
    {
        // Hapus gambar dari folder
        $gambarPath = FCPATH . 'assets/img/uploads/';
        $pathGambarLengkap = $gambarPath . $namaGambar;
        $buktiPembayaranPath = FCPATH . 'assets/img/buktipembayaran/';
        $pathBuktiLengkap = $buktiPembayaranPath . $buktiPembayaran;

        if (file_exists($pathGambarLengkap)) {
            unlink($pathGambarLengkap);
        }

        if (file_exists($pathBuktiLengkap)) {
            unlink($pathBuktiLengkap);
        }

        // Hapus data dari database
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->delete('tbpesanan');
    }

    public function getGambarName($IdPesanan)
    {
        // Ambil nama gambar dari database berdasarkan IdPesanan
        $this->db->select('FotoKerusakan');
        $this->db->where('IdPesanan', $IdPesanan);
        $query = $this->db->get('tbpesanan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->FotoKerusakan;
        } else {
            return null;
        }
    }

    public function getBuktiPembayaran($IdPesanan)
    {
        // Ambil nama gambar dari database berdasarkan IdPesanan
        $this->db->select('BuktiPembayaran');
        $this->db->where('IdPesanan', $IdPesanan);
        $query = $this->db->get('tbpesanan');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->BuktiPembayaran;
        } else {
            return null;
        }
    }

    function orderupdate()
    {
        $Harga = $this->input->post('Harga');
        $IdPesanan = $this->input->post('IdPesanan');
        $data = array(
            'Harga' => $Harga
        );
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', $data);
    }
    function paymentform($IdPesanan)
    {
        $query = $this->db->get_where('tbpesanan', array('IdPesanan' => $IdPesanan));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    // public function getIdPesanan($AkunPengguna)
    // {
    //     $this->db->select('IdPesanan');
    //     $this->db->where('AkunPengguna', $AkunPengguna);
    //     $this->db->where_in('StatusPesanan', ['Sedang Dikerjakan', 'Verifikasi Pesanan Selesai']);
    //     $query = $this->db->get('tbpesanan');
    //     if ($query->num_rows() > 0) {
    //         return $query->row()->IdPesanan;
    //     }
    // }

    public function getAccountMekanik($AkunPengguna)
    {
        $this->db->select('AkunMekanik');
        $this->db->where('AkunPengguna', $AkunPengguna);
        $this->db->order_by('tbpesanan.IdPesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbpesanan');
        return $query->row() ? $query->row()->AkunMekanik : null;
    }
    public function getRandomAktifMekanik()
    {
        $this->db->where('status !=', 'Mengerjakan Pesanan');
        $this->db->order_by('RAND()');
        $this->db->limit(1);
        $query = $this->db->get('tbmekanik');
        return $query->row_array();
    }
    public function updateAkunMekanik($IdPesanan, $AkunMekanik, $MetodePembayaran)
    {
        $RatingBintangDefault = 1;
        $this->db->where('IdPesanan', $IdPesanan);
        $data = array(
            'AkunMekanik' => $AkunMekanik,
            'StatusPesanan' => 'Sedang Dikerjakan',
            'MetodePembayaran' => $MetodePembayaran,
            'RatingBintang' => $RatingBintangDefault,

        );
        $this->db->update('tbpesanan', $data);
    }
    public function updateOrder($IdPesanan, $MetodePembayaran)
    {
        if ($MetodePembayaran != 'Tunai') {
            $this->load->library('upload');
            $uploadResult = $this->uploadImage('BuktiPembayaran', 'assets/img/buktipembayaran', 'jpg|png', 2048, TRUE);
            if ($uploadResult['success']) {
                $upload_data = $uploadResult['data'];
                // $data['BuktiPembayaran'] = $upload_data['file_name'];
                $this->db->where('IdPesanan', $IdPesanan);
                $this->db->update('tbpesanan', array('StatusPesanan' => 'Menunggu Verifikasi', 'MetodePembayaran' => $MetodePembayaran, 'BuktiPembayaran' => $upload_data['file_name']));
                echo "<script>alert ('Terima Kasih Sudah Melakukan Pembayaran'); </script>";
            } else {
                $this->session->set_flashdata('pesan', 'Upload bukti gagal, silahkan upload gambar dengan format Jpg dan Png dengan ukuran maksimal 2mb');
                redirect('homepage#pesanlayanan', 'refresh');
            }
        } else {
            $this->db->where('IdPesanan', $IdPesanan);
            $this->db->update('tbpesanan', array('StatusPesanan' => 'Menunggu Verifikasi', 'MetodePembayaran' => $MetodePembayaran));
            echo "<script>alert ('Terima Kasih Sudah Melakukan Pembayaran'); </script>";
        }
    }

    public function finishOrder($IdPesanan)
    {
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', array('StatusPesanan' => 'Pesanan Selesai'));
    }

    public function refuseFinishOrder($IdPesanan)
    {
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', array('StatusPesanan' => 'Sedang Dikerjakan'));
    }

    public function nota($IdPesanan)
    {
        $this->db->select('tbpengguna.Nama , tbmekanik.NamaMekanik, tbmekanik.NoHandphone, tbpesanan.*');
        $this->db->from('tbpesanan');
        $this->db->join('tbmekanik', 'tbmekanik.AkunMekanik = tbpesanan.AkunMekanik');
        $this->db->join('tbpengguna', 'tbpengguna.AkunPengguna = tbpesanan.AkunPengguna');
        $this->db->where('tbpesanan.IdPesanan', $IdPesanan);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMekanikInfo($AkunMekanik)
    {

        $this->db->select('tbmekanik.*, tbpesanan.IdPesanan , tbpesanan.StatusPesanan');
        $this->db->from('tbpesanan');
        $this->db->join('tbmekanik', 'tbpesanan.AkunMekanik = tbmekanik.AkunMekanik');
        $this->db->order_by('tbpesanan.IdPesanan', 'DESC');
        $this->db->limit(1);
        $this->db->where('tbpesanan.AkunMekanik', $AkunMekanik);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return array();
        }
    }

    function rating()
    {
        $IdPesanan = $this->input->post('IdPesanan');
        $RatingBintang = $this->input->post('RatingBintang');
        $UlasanText = $this->input->post('UlasanText');

        // Data yang akan diupdate
        $data = array(
            'RatingBintang' => $RatingBintang,
            'UlasanText' => $UlasanText
        );
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', $data);
    }



    function uploadImage($field, $uploadPath, $allowedTypes, $maxSize, $encryptName)
    {
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = $allowedTypes;
        $config['max_size'] = $maxSize;
        $config['encrypt_name'] = $encryptName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload($field)) {
            $upload_data = $this->upload->data();
            return array('success' => true, 'data' => $upload_data);
        } else {
            $error = $this->upload->display_errors();
            return array('success' => false, 'error' => $error);
        }
    }
}
?>