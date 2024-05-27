<?php

class madmin extends CI_Model
{
    // Pesanan
    public function getAllOrder()
    {
        $this->db->select('tbpesanan.*, tbpengguna.Nama, tbpengguna.NoHandphone ');
        $this->db->from('tbpesanan');
        $this->db->join('tbpengguna', 'tbpesanan.AkunPengguna = tbpengguna.AkunPengguna');
        $this->db->order_by('IdPesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getYearRevenue()
    {
        $Year = date('Y');
        $this->db->select_sum('Harga', 'total_pendapatan');
        $this->db->where("YEAR(TanggalPemesanan) =", $Year);
        $query = $this->db->get('tbpesanan');
        $result = $query->row();
        return $result->total_pendapatan;
    }
    public function getMonthRevenue()
    {

        $Month = date('m');
        $Year = date('Y');
        $this->db->select_sum('Harga', 'total_pendapatan');
        $this->db->where("Month(TanggalPemesanan) =", $Month);
        $this->db->where("Year(TanggalPemesanan) =", $Year);
        $query = $this->db->get('tbpesanan');
        $result = $query->row();
        return $result->total_pendapatan;
    }
    public function getTodayRevenue()
    {
        $Today = date('Y-m-d');
        $this->db->select_sum('Harga', 'total_pendapatan');
        $this->db->where("DATE(TanggalPemesanan) =", $Today);
        $query = $this->db->get('tbpesanan');
        $result = $query->row();
        if ($result->total_pendapatan < 0) {
            return 0;
        } else {
            return $result->total_pendapatan;
        }

    }

    function cancelorder($IdPesanan, $buktiPembayaran)
    {
        $buktiPembayaranPath = FCPATH . 'assets/img/buktipembayaran/';
        $pathBuktiLengkap = $buktiPembayaranPath . $buktiPembayaran;
        if (file_exists($pathBuktiLengkap)) {
            unlink($pathBuktiLengkap);
        }
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', array('StatusPesanan' => 'Pesanan Ditolak'));
    }

    // Mekanik

    function addmekanik()
    {
        $data = $_POST;
        $AkunMekanik = $data['AkunMekanik'];
        if ($AkunMekanik == "") {
            //simpan
            $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);
            $this->db->insert('tbmekanik', $data);
            $this->session->set_flashdata('pesan', 'Data sudah disimpan...');
            redirect('cadmin/showData', 'refresh');
        } else {
            //edit	
            $update = array(
                'AkunMekanik' => $AkunMekanik
            );
            $this->db->where($update);
            $this->db->update('tbmekanik', $data);
            $this->session->set_flashdata('pesan', 'Data sudah diedit...');
            redirect('cadmin/showData', 'refresh');
        }
    }
    function showData()
    {
        $sql = "select * from tbmekanik";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function deleteData($AkunMekanik)
    {
        $sql = "delete from tbmekanik where AkunMekanik='" . $AkunMekanik . "'";
        $this->db->query($sql);
        redirect('cadmin/showData', 'refresh');
    }

    function editData($AkunMekanik)
    {
        $sql = "select * from tbmekanik where AkunMekanik='" . $AkunMekanik . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $data = $query->row();
            echo "<script>$('#AkunMekanik').val('" . $data->AkunMekanik . "')</script>";
            echo "<script>$('#NamaMekanik').val('" . $data->NamaMekanik . "')</script>";
            echo "<script>$('#NoHandphone').val('" . $data->NoHandphone . "')</script>";
            // echo "<script>$('#Email').val('" . $data->Email . "')</script>";
            // echo "<script>$('#Password').val('" . $data->Password . "')</script>";
        }
    }
    public function updateAkunMekanik($IdPesanan, $AkunMekanik)
    {
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('tbpesanan', array('AkunMekanik' => $AkunMekanik, 'StatusPesanan' => 'Sedang Dikerjakan'));
    }



}
?>