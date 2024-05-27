<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfview extends CI_Controller
{
    public function index()
    {
        $this->load->library('pdfgenerator');

        // Set data for the view
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // Set filename for the PDF when downloaded
        $file_pdf = 'laporan_penjualan_toko_kita';

        // Set paper size
        $paper = 'A4';

        // Set paper orientation (portrait / landscape)
        $orientation = "portrait";

        // Load the 'Cetaknota' view and store the HTML content
        $html = $this->load->view('Cetaknota', $this->data, true);

        // Generate PDF using pdfgenerator library
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
