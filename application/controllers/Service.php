<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
	
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_portofolio');
		$this->phone = '+6287888999073';
		//$this->phone ='+62 823-1184-9037';
		$this->office_phone ='021 8490 8050';
		$this->office_phone_space ='021 8490 8050';
		
    }
	
    public function index()
    {
		$this->output->cache(10);
		$data['category'] = $this->M_portofolio->category();
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
		$data['title_header'] = "Our Service";
		
		//Meta tags
		$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Our Service  | PT. Bildi Bangun Bersama";
		
        $this->template->load('template', 'service/service', $data);
    }	
	
    public function bangun()
    {
		$this->output->cache(10);
		
		$category="";
		$data['is_active']= "active" ;
		$data['category'] = $this->M_portofolio->category();
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);
		
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
		$data['title_header'] = "Jasa Bangun Rumah Profesional";
		
		//Meta tags
		$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Jasa Bangun Rumah Profesional | PT. Bildi Bangun Bersama";
		
        $this->template->load('template', 'service/bangun-rumah', $data);
    }
	
    public function renovasi()
    {
		$this->output->cache(10);
		
		$category="";
		$data['is_active']= "active" ;
		$data['category'] = $this->M_portofolio->category();
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);
		
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
		$data['title_header'] = "Jasa Renovasi Rumah Profesional";
$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Jasa Renovasi Rumah Profesional | PT. Bildi Bangun Bersama";
		
        $this->template->load('template', 'service/renovasi-rumah', $data);
    }

	public function desain()
    {
		$this->output->cache(10);
		
		$category="";
		$data['is_active']= "active" ;
		$data['category'] = $this->M_portofolio->category();
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);
		
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
		$data['title_header'] = "Jasa Interior/Exterior Desain";
$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Jasa Interior Desain | PT. Bildi Bangun Bersama";
        $this->template->load('template', 'service/interior-exterior-design', $data);
    }

    public function kanopi()
    {
		$this->output->cache(10);
		$category="";
		$data['is_active']= "active" ;
		$data['category'] = $this->M_portofolio->category();
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);
	
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
		$data['title_header'] = "Jasa Pemasangan Kanopi Profesional";
		$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Jasa Pemasangan Kanopi | PT. Bildi Bangun Bersama";
        $this->template->load('template', 'service/pemasangan-kanopi', $data);
    }

	    public function kitchenset()
    {
		$this->output->cache(10);
			
	    $category="";
		$data['is_active']= "active" ;
		$data['category'] = $this->M_portofolio->category();
		$data['filters'] = $this->M_portofolio->get_data_category();
		$data['all_data'] = $this->M_portofolio->get_all_data($category);		
	
		$data['phone'] = $this->phone;
        $data['office_phone'] = $this->office_phone;
        $data['office_phone_space'] = $this->office_phone_space;
			$data['title_header'] = "Jasa Pembuatan Kitchenset";
		$data['keywords']="jasa bangun rumah, jasa pemasangan kanopi, jasa renovasi rumah, layanan bangun rumah, layanan renovasi rumah, konstruksi rumah, renovasi interior, renovasi eksterior";
		
    	$data['description']="Kami menyediakan layanan pemasangan kanopi, jasa bangun rumah dan renovasi rumah berkualitas tinggi. Tim ahli kami siap membantu Anda dalam proses konstruksi.";
		
		$data['title'] = "Jasa Pembuatan Kitchen Set | PT. Bildi Bangun Bersama";
        $this->template->load('template', 'service/pembuatan-kitchen-set', $data);
    }
	
		 public function get_data_portofolio_json()
    {
        $data = $this->M_blog->get_data_portofolio_json();
        echo json_encode($data);
    }
	
}
