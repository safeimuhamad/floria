<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_product_web');
    }
    public function index()
    {
        $data['title_header'] = "Product";
        $data['canonical'] = "produk";
        //Meta tags
        $data['keywords'] = "penjual tanaman";
        $data['description'] = "Cari penjual tanaman terpercaya? Kami menyediakan berbagai jenis tanaman berkualitas dengan harga terjangkau. Pesan sekarang!";
        $data['title'] = "Penjual Tanaman Berkualitas – Pilihan Terbaik untuk Rumah & Taman";
        $this->template->load('template', 'product', $data);
    }

    public function detail($slug = null)
    {
        $data['keywords'] = "Atap Alderon, Atap Kanopi Rumah, Bahan Bahan Kanopi, Besi Hollow Galvanis, Stainless Stell, Rangka Baja Ringan, Material Bangunan";
        $data['description'] = "Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";

        $data['phone'] = "+6281384250674";
        $data['office_phone'] = "02184908050";
        $data['office_phone_space'] = "021-8490-8050";

        $data['data_product'] = $this->M_product_web->get_data($slug);
        $data['data_product_all'] = $this->M_product_web->get_data_all(5);
        $data['title'] = $data['data_product']->product_name; // Mengatur judul berdasarkan produk yang sedang di-detail
        $data['title_header'] = $data['data_product']->product_name; // Mengatur judul header berdasarkan produk yang sedang di-detail

        $this->template->load('template', 'product_detail', $data);
    }


    public function get_data_product_json()
    {
        $data = $this->M_product_web->get_data_product_json();
        echo json_encode($data);
    }

    public function get_data_product_tanaman_hias()
    {
        $data = $this->M_product_web->get_data_product_tanaman_hias();
        echo json_encode($data);
    }

    public function get_data_product_buket()
    {
        $data = $this->M_product_web->get_data_product_buket();
        echo json_encode($data);
    }
}