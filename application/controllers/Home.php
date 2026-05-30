<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_blog');
		$this->load->model('M_portofolio');
		$this->load->model('M_product');
	}


	public function index()
	{
		$data['title'] = "Tukang Taman Terdekat, Murah & Profesional | Floria.id";
		$data['keywords'] = "tukang taman, tukang taman terdekat, jasa taman, jasa tukang taman, tukang taman minimalis, pembuat taman, jasa taman terdekat, tukang taman vertikal, tukang taman murah, jasa taman murah, jasa tukang taman terdekat, jasa taman minimalis, harga jasa tukang taman, tukang taman hias, tukang taman profesional";
		$data['description'] = "Jasa tukang taman minimalis, vertical garden, & kolam ikan. Harga terjangkau, siap survei ke lokasi. Layanan Jabodetabek. Klik untuk konsultasi!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'home', $data);
	}
}