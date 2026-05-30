<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jual extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_portofolio');
		$this->load->model('M_blog');
		$this->load->model('M_product_web');
		$this->load->model('M_product');
		$this->load->library('CI_URI');

	}

	public function index()
	{
	    redirect('jual/pupuk');
	}

	public function pupuk()
	{
	    $data['canonical'] = "jual/pupuk";
	    $data['keywords'] = "jual pupuk terdekat, pupuk tanaman, pupuk kandang, pupuk kandang kambing, pupuk kandang sapi, pupuk kandang ayam, harga pupuk organik, jual pupuk, jual pupuk kandang terdekat, jual pupuk tanaman terdekat, harga pupuk kandang, harga pupuk kompos, penjual pupuk terdekat, harga kompos, jual pupuk kompos terdekat, jual pupuk kandang";
	    $data['description'] = "Temukan berbagai jenis pupuk terdekat dengan harga terbaik! Jual pupuk tanaman, pupuk kandang kambing, sapi, ayam, kompos, dan lainnya. Dapatkan pupuk berkualitas untuk tanaman Anda.";
	    $data['all_data'] = $this->M_portofolio->getAllPortofolio();
	    $data['new_article'] = $this->M_blog->get_data_all(3);
	    $data['title'] = "Jual Pupuk Kandang & Kompos Terdekat | Harga Mulai Rp.2rb/Kg";
	    $this->template->load('template', 'jual/pupuk', $data);
	}

	public function media_tanam()
	{
	    $data['canonical'] = "jual/media-tanam";
	    $data['keywords'] = "jual media tanam terdekat, jual media tanam, media tanam, media tanam organik, media tanam tanaman hias, media tanam bunga, media tanam anggrek, media tanam aglonema, media tanam tanah, harga media tanam, jual media tanam murah, penjual media tanam terdekat, harga cocopeat, harga cocopeat 1 karung, cocopeat terdekat, jual cocopeat, cocopeat karungan, cocopeat murah";
	    $data['description'] = "Temukan berbagai jenis media tanam terdekat dengan harga terbaik! Jual media tanam organik untuk anggrek, aglonema dan lainnya. Media tanam berkualitas untuk pertumbuhan tanaman optimal.";
	    $data['all_data'] = $this->M_portofolio->getAllPortofolio();
	    $data['new_article'] = $this->M_blog->get_data_all(3);
	    $data['title'] = "Jual Media Tanam Terdekat - Media Tanam Terbaik untuk Tanaman Anda";
	    $this->template->load('template', 'jual/media_tanam', $data);
	}

	public function kayu_bakar()
	{
	    $data['canonical'] = "jual/kayu-bakar";
	    $data['keywords'] = "jual kayu bakar, kayu bakar, jual kayu bakar terdekat, kayu bakar terdekat, harga kayu bakar, harga kayu bakar 1 ikat, kayu bakar 1 ikat, kayu bakar untuk api unggun, kayu bakar api unggun, harga kayu bakar per pick up, kayu bakar 1 meter, penjual kayu bakar terdekat, toko kayu bakar, harga kayu bakar 1 pick up, harga kayu bakar per ikat, kayu bakar rambutan, 1 ikat kayu bakar, harga kayu bakar 1 truk, penjual kayu bakar, kayu bakar 50 cm";
	    $data['description'] = "Temukan penjual kayu bakar terdekat dengan berbagai pilihan ukuran: 1 ikat, 1 meter, hingga 1 truk. Jual kayu bakar rambutan, kayu bakar untuk api unggun, masak sate, dan kebutuhan lainnya. Harga kayu bakar terbaik dan terjangkau!";
	    $data['all_data'] = $this->M_portofolio->getAllPortofolio();
	    $data['new_article'] = $this->M_blog->get_data_all(3);
	    $data['title'] = "Jual Kayu Bakar Berkualitas - Harga Kayu Bakar per Ikat, Pickup & Truk";
	    $this->template->load('template', 'jual/kayu_bakar', $data);
	}

	public function gazebo()
	{
	    $data['canonical'] = "jual/gazebo-kayu-dan-bambu";
	    $data['keywords'] = "gazebo kayu, saung bambu, gazebo bambu, gazebo modern minimalis, gazebo kayu sederhana, gazebo kayu minimalis, saung bambu unik, gazebo kayu jati, harga gazebo kayu ukuran 2x2, saung kayu, gazebo joglo, harga gazebo kayu jati ukuran 3x3, harga gazebo kayu sederhana, gazebo minimalis dari kayu, gazebo minimalis murah, saung bambu minimalis, saung gazebo bambu, jual gazebo, jual saung, jual gazebo bambu, jual gazebo kayu, jual saung bambu, jual saung kayu.";
	    $data['description'] = "Temukan berbagai pilihan gazebo kayu dan bambu untuk taman, dengan desain minimalis dan harga terjangkau. Kami menawarkan gazebo kayu dan bambu untuk berbagai kebutuhan outdoor Anda. Cek harga gazebo kayu dan bambu terbaik di sini!";
	    $data['all_data'] = $this->M_portofolio->getAllPortofolio();
	    $data['new_article'] = $this->M_blog->get_data_all(3);
	    $data['title'] = "Jual Gazebo Kayu dan Bambu - Harga Saung Kayu & Bambu";
	    $this->template->load('template', 'jual/gazebo', $data);
	}

	public function tanaman_hias()
	{
	    $data['canonical'] = "jual/tanaman-hias";
	    $data['keywords'] = "jual tanaman hias terdekat, jual tanaman terdekat, toko tanaman terdekat, aglunema, lohansung, tanam hias daun, jual tanaman, toko tanaman hias terdekat, harga bonsai, pohon hiasan, bunga gantung, jual tanaman hias, harga bunga anggrek, harga bunga mawar, jual anggrek terdekat, toko bunga hias terdekat, calathea pisang, daun janda bolong, daun monstera, harga pohon pule, harga bunga edelweis, penjual tanaman hias terdekat, harga tanaman hias, ketapang kencana varigata, harga pohon bonsai";
	    $data['description'] = "Jual berbagai jenis tanaman hias untuk indoor dan outdoor dengan harga terjangkau. Tersedia tanaman hias segar, unik, dan cantik untuk memperindah rumah, kantor, maupun taman Anda. Cek koleksi tanaman hias terbaik kami di sini!";
	    $data['title'] = "Jual Tanaman Hias Indoor & Outdoor - Harga Murah dan Segar";
	    $this->template->load('template', 'jual/tanaman_hias', $data);
	}

	public function buket_bunga()
	{
	    $data['canonical'] = "jual/buket-bunga";
	    $data['new_article'] = $this->M_blog->get_data_all(3);
	    $data['keywords'] = "buket bunga, buket bunga terdekat, jual buket bunga terdekat, harga buket bunga, buket bunga wisuda, bunga buket, buket bunga mawar, buket bunga satin, bouquet bunga, toko bunga mawar terdekat, buket bunga asli, buket mawar merah, toko bunga buket terdekat, buket bunga matahari, buket bunga tulip, buket bunga mawar merah, penjual buket bunga terdekat, toko buket bunga, buket bunga artificial, buket bunga pink";
	    $data['description'] = "Cari buket bunga terdekat dan terindah? Kami menyediakan buket bunga mawar, tulip, bunga matahari, hingga buket wisuda dan buket satin. Bisa pesan custom, harga bersahabat, dan pengiriman cepat!";
	    $data['title'] = "Buket Bunga Cantik & Terdekat – Mawar, Wisuda, Tulip, & Custom";
	    $this->template->load('template', 'bunga/buket', $data);
	}

	public function karangan_bunga()
	{
		$data['canonical'] = "jual/karangan-bunga";
		$data['title'] = "Jual Papan & Karangan Bunga | Duka Cita, Pernikahan, Wisuda & Ucapan";
		$data['keywords'] = "papan bunga, karangan bunga duka cita, bunga papan, karangan bunga pernikahan, bunga duka cita, papan bunga pernikahan, papan bunga duka cita, karangan bunga ucapan selamat, harga karangan bunga duka cita, harga papan bunga, karangan bunga grand opening, bunga papan duka cita, bunga ucapan selamat, bunga papan wedding, karangan bunga turut berduka cita, harga karangan bunga pernikahan, karangan bunga duka, harga papan bunga pernikahan, bunga standing duka cita, harga papan bunga ucapan, harga karangan bunga, karangan bunga terdekat, karangan bunga nikah, papan bunga nikah, papan ucapan, papan bunga wisuda, papan bunga terdekat, karangan bunga wisuda, papan ucapan selamat, papan bunga turut berduka cita, papan karangan bunga, papan bunga grand opening, karangan bunga wedding, karangan bunga happy wedding, papan bunga happy wedding, papan bunga kekinian";
		$data['description'] = "Jual papan bunga & karangan bunga untuk duka cita, pernikahan, wisuda, grand opening & ucapan selamat. Kirim cepat, harga terjangkau, pesan sekarang!";
		$data['duka'] = $this->M_product->getKaranganPapanDuka();
		$data['nikah'] = $this->M_product->getKaranganPapanNikah();
		$data['selamat'] = $this->M_product->getKaranganPapanSelamat();
		$data['wisuda'] = $this->M_product->getKaranganPapanWisuda();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'jual/karangan-bunga', $data);
	}

}