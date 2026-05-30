<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_portofolio');
	}

	public function index2()
	{

		$this->output->cache(10);
		//Mete tags
		$data['keywords'] = "portofolio, jasa bangun rumah, jasa renovasi rumah, jasa pemasangan kanopi, desain interior, eksterior rumah, proyek bangun rumah, proyek renovasi rumah";
		$data['description'] = "Lihat berbagai proyek bangun dan renovasi rumah yang telah kami selesaikan dengan hasil yang memuaskan.";

		$kategori = $this->input->get('kategori');
		$data['title'] = "Portofolio - PT. Bima Yanfa Una";
		$category = "";
		$data['phone'] = "+6281384250674";
		$data['office_phone'] = "02184908050";
		$data['office_phone_space'] = "021-8490-8050";
		$data['is_active'] = "active";
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['category'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);
		$data['title_header'] = "Portofolio Kami";
		$this->template->load('template', 'portfolio', $data);
	}

	public function index()
	{

		$this->output->cache(10);
		//Mete tags
		$data['keywords'] = "portofolio, jasa bangun rumah, jasa renovasi rumah, jasa pemasangan kanopi, desain interior, eksterior rumah, proyek bangun rumah, proyek renovasi rumah";
		$data['description'] = "Lihat berbagai proyek bangun dan renovasi rumah yang telah kami selesaikan dengan hasil yang memuaskan.";
		//$category="";
		$data['title'] = "Portofolio - PT. Bima Yanfa Una";
		$data['phone'] = "+6281384250674";
		$data['office_phone'] = "02184908050";
		$data['office_phone_space'] = "021-8490-8050";

		$kategori = $this->input->get('kategori');
		$kategori = "kanopi";
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['category'] = $this->M_portofolio->get_data_category();
		// Pastikan $kategori tidak kosong dan ada pada daftar kategori yang diizinkan
		if (!empty($kategori)) {

			// Ambil daftar portofolio berdasarkan kategori yang dipilih
			$data['portofolio'] = $this->M_portofolio->getPortofolioByKategori($kategori);

		} else {
			// Jika kategori kosong ambil all portofoilo
			$data['portofolio'] = $this->M_portofolio->getAllPortofolio();
		}
		$data['title_header'] = "Portofolio Kami";
		$this->template->load('template', 'portfolio', $data);
	}
}