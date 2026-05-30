<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_portofolio');
		$this->load->model('M_blog');
		$this->load->model('M_product_web');
		$this->load->model('M_product');
		$this->phone = '+628111378337';
		//$this->phone ='+62 823-1184-9037';
		$this->office_phone = '021 8490 8050';
		$this->office_phone_space = '021 8490 8050';
		$this->load->library('CI_URI');

	}

	public function index()
	{
		$data['canonical'] = "jasa";
		$data['keywords'] = "layanan tanaman hias";
		$data['description'] = "Telah berpengalaman lebih dari 10 tahun memberikan layanan tanaman profesional. Hubungi kami untuk berkonsultasi lebih lanjut.";
		$data['title'] = "Our Service  - Floria.id";
		$this->template->load('template', 'services', $data);
	}

	public function potong_rumput()
	{
		$data['canonical'] = "jasa/potong-rumput";
		$data['keywords'] = "jasa potong rumput, jasa potong rumput terdekat, tukang potong rumput terdekat, tarif jasa potong rumput, harga jasa potong rumput per meter, tukang potong rumput, tukang potong rumput panggilan, jasa potong rumput panggilan, harga jasa potong rumput, jasa babat rumput";
		$data['description'] = "Butuh jasa potong rumput atau tukang potong rumput berpengalaman? Kami siap merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau! 🌱";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput | Tukang Potong Rumput Terdekat";
		$this->template->load('template', 'service/potong-rumput', $data);
	}

	public function potong_rumput_bekasi()
	{
		$data['lokasi'] = "Bekasi"; 
		$data['canonical'] = "jasa/potong-rumput-bekasi";
		$data['keywords'] = "jasa potong rumput bekasi";
		$data['description'] = "Butuh jasa potong rumput bekasi? Kami siap potong rumput untuk merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput Bekasi - Cepat & Rapih";
		$this->template->load('template', 'service/potong-rumput-bekasi', $data);
	}

	public function potong_rumput_jakarta()
	{
		$data['lokasi'] = "Jakarta"; 
		$data['canonical'] = "jasa/potong-rumput-jakarta";
		$data['keywords'] = "jasa potong rumput jakarta";
		$data['description'] = "Butuh jasa potong rumput Jakarta? Kami siap potong rumput untuk merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput Jakarta - Cepat & Rapi";
		$this->template->load('template', 'service/potong-rumput-jakarta', $data);
	}

	public function potong_rumput_depok()
	{
		$data['lokasi'] = "Depok"; 
		$data['canonical'] = "jasa/potong-rumput-depok";
		$data['keywords'] = "jasa potong rumput depok";
		$data['description'] = "Butuh jasa potong rumput Depok? Kami siap potong rumput untuk merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput Depok - Cepat & Rapi";
		$this->template->load('template', 'service/potong-rumput-depok', $data);
	}

	public function potong_rumput_bogor()
	{
		$data['lokasi'] = "Bogor"; 
		$data['canonical'] = "jasa/potong-rumput-bogor";
		$data['keywords'] = "jasa potong rumput bogor";
		$data['description'] = "Butuh jasa potong rumput Bogor? Kami siap potong rumput untuk merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput Bogor - Cepat & Rapi";
		$this->template->load('template', 'service/potong-rumput-bogor', $data);
	}

	public function potong_rumput_tangerang()
	{
		$data['lokasi'] = "Tangerang"; 
		$data['canonical'] = "jasa/potong-rumput-tangerang";
		$data['keywords'] = "jasa potong rumput tangerang";
		$data['description'] = "Butuh jasa potong rumput Tangerang? Kami siap potong rumput untuk merapikan taman Anda dengan layanan cepat, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getPotongRumput();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Rumput Tangerang - Cepat & Rapi";
		$this->template->load('template', 'service/potong-rumput-tangerang', $data);
	}


	public function tebang_pohon()
	{
		$data['canonical'] = "jasa/tebang-pohon";
		$data['keywords'] = "jasa tebang pohon, jasa tebang pohon gratis, jasa tebang pohon terdekat, jasa potong pohon, jasa tebang pohon terdekat dari lokasi saya, tukang tebang pohon terdekat, jasa potong pohon terdekat, biaya tebang pohon mangga, jasa penebangan pohon, jasa tebang pohon murah, biaya tebang pohon, jasa pangkas pohon, tukang potong pohon terdekat, jasa tukang tebang pohon, biaya jasa tebang pohon, jasa nebang pohon, tukang tebang pohon, tukang potong pohon, jasa tukang potong pohon, tebangpohon, potong pohon, biaya tebang pohon mangga, tebang pohon";
		$data['description'] = "Butuh jasa tebang pohon? Kami siap potong & pangkas pohon dengan aman dan murah. Cek biaya tebang pohon mangga & jasa tebang pohon terdekat";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Tebang Pohon | Tukang Pangkas, Potong & Tebang Pohon";
		$this->template->load('template', 'service/tebang-pohon', $data);
	}

	public function tebang_pohon_jakarta()
	{
		$data['lokasi'] = "Jakarta"; 
		$data['canonical'] = "jasa/tebang-pohon-jakarta";
		$data['keywords'] = "jasa tebang pohon jakarta, jasa tebang pohon jakarta selatan, jasa tebang pohon jakarta timur, jasa tebang pohon jakarta barat, tebang pohon jakarta, jasa potong pohon jakarta, tukang tebang pohon jakarta, biaya tebang pohon di jakarta, biaya tebang pohon jakarta, harga jasa tebang pohon jakarta, harga tebang pohon di jakarta, jasa potong pohon jakarta timur, jasa tebang pohon dki jakarta
		";
		$data['description'] = "Layanan jasa tebang & potong pohon Jakarta, Jakarta Selatan, Timur, Barat. Harga terjangkau, aman, dan profesional. Cek biaya tebang pohon sekarang!";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Tebang Pohon Jakarta - Cepat & Aman";
		$this->template->load('template', 'service/tebang-pohon-jakarta', $data);
	}

	public function tebang_pohon_bekasi()
	{
		$data['lokasi'] = "Bekasi"; 
		$data['canonical'] = "jasa/tebang-pohon-bekasi";
		$data['keywords'] = "jasa tebang pohon bekasi, jasa potong pohon bekasi, tukang tebang pohon bekasi, jasa tebang pohon gratis bekasi";
		$data['description'] = "Layanan jasa tebang pohon Bekasi, termasuk potong & pangkas pohon. Tukang profesional, harga terjangkau, bahkan tersedia jasa tebang pohon gratis!";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Tebang Pohon Bekasi | Cepat & Profesional";
		$this->template->load('template', 'service/tebang-pohon-bekasi', $data);
	}

	public function tebang_pohon_tangerang()
	{
		$data['lokasi'] = "Tangerang"; 
		$data['canonical'] = "jasa/tebang-pohon-tangerang";
		$data['keywords'] = "jasa potong pohon tangerang, jasa tebang pohon tangerang";
		$data['description'] = "Butuh jasa potong atau tebang pohon di Tangerang? Kami siap bantu dengan layanan aman, cepat, dan berpengalaman. Hubungi kami untuk survey & harga gratis!";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong & Tebang Pohon Tangerang | Cepat & Profesional";
		$this->template->load('template', 'service/tebang-pohon-tangerang', $data);
	}

	public function tebang_pohon_depok()
	{
		$data['lokasi'] = "Depok"; 
		$data['canonical'] = "jasa/tebang-pohon-depok";
		$data['keywords'] = "jasa tebang pohon depok, jasa potong pohon depok, biaya jasa tebang pohon depok, jasa tebang pohon di depok";
		$data['description'] = "Butuh jasa tebang pohon depok? Kami siap bantu dengan biaya jasa potong pohon depok murah, aman, cepat, dan berpengalaman. Hubungi kami untuk konsultasi!";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Potong Pohon Depok | Biaya Murah, Cepat & Profesional";
		$this->template->load('template', 'service/tebang-pohon-depok', $data);
	}

	public function tebang_pohon_bogor()
	{
		$data['lokasi'] = "Bogor"; 
		$data['canonical'] = "jasa/tebang-pohon-bogor";
		$data['keywords'] = "jasa tebang pohon bogor, jasa potong pohon bogor, jasa tebang pohon di bogor";
		$data['description'] = "Butuh tebang pohon di Bogor? Kami siap bantu dengan tebang dan potong pohon bogor yang aman, cepat, dan berpengalaman. Hubungi kami untuk konsultasi lebih lanjut!";
		$data['all_data'] = $this->M_portofolio->getTebangPohon();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Tebang Pohon Bogor | Cepat & Profesional";
		$this->template->load('template', 'service/tebang-pohon-bogor', $data);
	}

	public function perawatan_taman()
	{
		$data['jasa'] = "Jasa Perawatan Taman";
		$data['canonical'] = "jasa/perawatan-taman";
		$data['keywords'] = "jasa perawatan taman, jasa rawat taman, jasa perawatan taman, harga perawatan taman per meter, jasa perawatan tanaman, biaya perawatan taman, jasa perawatan taman rumah";
		$data['description'] = "Cari jasa perawatan taman? Kami menyediakan jasa perawatan taman profesional untuk rumah, kantor, dan area publik. Hubungi kami sekarang!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$data['title'] = "Jasa Perawatan Taman | Harga Jasa Mulai 500rb";
		$this->template->load('template', 'service/perawatan-taman', $data);
	}

	public function sewa_tanaman()
	{
		$data['canonical'] = "jasa/sewa-tanaman";
		$data['jasa'] = "Sewa Tanaman";
		$data['keywords'] = "sewa tanaman, sewa tanaman hias, rental tanaman hias, rental tanaman, harga sewa tanaman hias indoor kantor, sewa tanaman indoor, harga sewa tanaman hias untuk panggung, jasa sewa tanaman hias, sewa tanaman hias untuk panggung, sewa tanaman kantor, harga sewa tanaman hias, harga sewa tanaman hias untuk kantor, jasa sewa tanaman indoor, paket sewa tanaman hias, penyewaan tanaman, penyewaan tanaman hias, rental tanaman hias indoor, sewa bunga hias, sewa tanaman dekorasi, sewa tanaman hias untuk kantor, sewa tanaman hidup, sewa tanaman untuk event, sewa tanaman untuk kantor, tanaman rental";
		$data['description'] = "Cari sewa tanaman? Kami menyediakan sewa tanaman hias indoor maupun outdoor berkualitas dengan berbagai pilihan menarik untuk dekorasi. Hubungi kami sekarang!";
		$data['title'] = "Sewa Tanaman - Tanaman Hias Indoor Untuk Dekorasi";
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['all_data'] = $this->M_portofolio->getSewaTanaman();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/sewa-tanaman', $data);
	}

	public function tukang_taman_jakarta()
	{
		$data['lokasi'] = "Jakarta";
		$data['canonical'] = "jasa/tukang-taman-jakarta";
		$data['title'] = "Tukang Taman Jakarta | Jasa Taman Jakarta & Sekitarnya";
		$data['keywords'] = "tukang taman jakarta, jasa taman jakarta, jasa tukang taman jakarta, jasa taman jakarta, tukang taman jakarta selatan, tukang taman jakarta barat, jasa tukang taman jakarta, tukang taman jakarta timur, tukang taman jakarta utara, tukang taman kelapa gading, tukang taman cilandak, tukang taman kalibata, tukang taman jakarta pusat, tukang taman pasar minggu, tukang taman cawang, tukang taman lebak bulus, tukang taman pondok indah, tukang taman pantai indah kapuk, tukang taman lenteng agung, tukang taman kemang, tukang taman kebayoran, tukang taman setiabudi, jasa pembuatan taman jakarta, jasa vertical garden jakarta, jasa pembuatan taman di jakarta, jasa pembuatan vertical garden jakarta";
		$data['description'] = "Butuh tukang taman Jakarta? Kami melayani taman rumah & kantor di Jakarta Selatan, Barat, Timur, Utara, Pusat, Kalibata, Cilandak, Cawang & lainnya.";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio(6);
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-jakarta', $data);
	}

	public function tukang_taman_bekasi()
	{
		$data['lokasi'] = "Bekasi";
		$data['canonical'] = "jasa/tukang-taman-bekasi";
		$data['title'] = "Tukang Taman Bekasi | Jatibening, Jatiwarna & Sekitarnya";
		$data['keywords'] = "tukang taman bekasi, jasa taman bekasi, jasa tukang taman bekasi, tukang taman bekasi timur, tukang taman di bekasi, tukang taman jatibening, tukang taman jatiranggon, tukang taman jatisampurna, tukang taman jatiwarna, jasa pembuatan taman bekasi, jasa vertical garden bekasi, jasa pembuatan taman di bekasi, jasa pembuatan vertical garden bekasi";
		$data['description'] = "Layanan tukang taman Bekasi, termasuk Bekasi Timur, Jatibening, Jatiwarna, Jatisampurna, dan sekitarnya. Taman minimalis, rapi, dan harga terjangkau!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio(6);
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-bekasi', $data);
	}

	public function tukang_taman_depok()
	{
		$data['lokasi'] = "Depok";
		$data['canonical'] = "jasa/tukang-taman-depok";
		$data['title'] = "Tukang Taman Depok | Jasa Taman Cinere, Cimanggis, Sawangan";
		$data['keywords'] = "tukang taman depok, tukang taman cinere, jasa taman depok, tukang taman cimanggis, jasa tukang taman depok, tukang taman sawangan depok, tukang taman cilodong, tukang taman di depok, jasa pembuatan taman depok, jasa vertical garden depok, jasa pembuatan taman di depok, jasa pembuatan vertical garden depok";
		$data['description'] = "Butuh tukang taman depok? Kami melayani pembuatan & perawatan taman rumah di Cinere, Cimanggis, Sawangan, Cilodong, dan seluruh area Depok.";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-depok', $data);
	}

	public function tukang_taman_bogor()
	{
		$data['lokasi'] = "Bogor";
		$data['canonical'] = "jasa/tukang-taman-bogor";
		$data['title'] = "Tukang Taman Bogor | Jasa Taman Ciomas, Bubulak, Rancamaya";
		$data['keywords'] = "tukang taman bogor, jasa taman bogor, tukang taman ciomas, jasa tukang taman bogor, jasa tukang taman di bogor, tukang taman bubulak, tukang taman di bogor, tukang taman minimalis bogor, tukang taman murah bogor, tukang taman rancamaya, jasa pembuatan taman bogor, jasa vertical garden bogor, jasa pembuatan taman di bogor, jasa pembuatan vertical garden bogor, tukang taman parung panjang, tukang taman cilebut";
		$data['description'] = "Layanan jasa tukang taman di Bogor untuk taman minimalis & taman rumah. Melayani Ciomas, Bubulak, Rancamaya & sekitarnya. Harga tukang taman murah Bogor!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-bogor', $data);
	}

	public function tukang_taman_tangerang()
	{
		$data['lokasi'] = "Tangerang";
		$data['canonical'] = "jasa/tukang-taman-tangerang";
		$data['title'] = "Tukang Taman Tangerang | Jasa Taman BSD, Bintaro, Cikupa & Sekitarnya ";
		$data['keywords'] = "tukang taman tangerang, jasa taman tangerang, tukang taman karawaci, jasa tukang taman tangerang, tukang taman ciledug, tukang taman cipondoh, tukang taman di tangerang, tukang taman bintaro, tukang taman cikupa, jasa taman bsd, tukang taman pondok cabe, jasa pembuatan taman tangerang, jasa vertical garden tangerang, jasa pembuatan taman di tangerang, jasa pembuatan vertical garden tangerang";
		$data['description'] = "Cari jasa tukang taman di Tangerang? Kami siap bantu pembuatan & perawatan taman di Karawaci, Ciledug, Cipondoh, dan seluruh area Tangerang.";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-tangerang', $data);
	}

	public function tukang_taman_serang()
	{
		$data['lokasi'] = "Serang";
		$data['canonical'] = "jasa/tukang-taman-serang";
		$data['title'] = "Tukang Taman Serang | Jasa Taman Serang Banten Terpercaya";
		$data['keywords'] = "tukang taman serang, jasa taman serang, jasa tukang taman serang, tukang taman serang banten, jasa pembuatan taman serang, jasa vertical garden serang, jasa pembuatan taman di serang, jasa pembuatan vertical garden serang";
		$data['description'] = "Butuh jasa tukang taman di Serang? Kami siap bantu desain & perawatan taman rumah/kantor di Serang, Banten. Profesional, cepat, dan harga bersaing!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/tukang-taman-serang', $data);
	}

	public function pembuatan_taman()
	{
		$data['canonical'] = "jasa/pembuatan-taman";
		$data['title'] = "Jasa Pembuatan Taman | Pembuatan Taman Terpercaya";
		$data['keywords'] = "jasa pembuatan taman, jasa buat taman, jasa taman minimalis, jasa taman murah, jasa pembuatan taman terdekat, jasa pembuatan vertical garden, jasa bikin taman, jasa pembuatan taman minimalis, harga borongan bikin taman, jasa buat taman terdekat, jasa pembuatan taman kantor, jasa pembuatan taman rumah";
		$data['description'] = "Butuh jasa pembuatan taman? Kami siap bantu desain dan pembuatan taman rumah, kantor, hotel dan bangunan lainnya. Profesional, cepat, dan harga bersaing!";
		$data['all_data'] = $this->M_portofolio->getAllPortofolio();
		$data['tanaman'] = $this->M_product->getTanaman();
		$data['desain'] = $this->M_portofolio->getDesain();
		$data['new_article'] = $this->M_blog->get_data_all(3);
		$this->template->load('template', 'service/pembuatan-taman', $data);
	}

}