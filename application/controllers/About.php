<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_portofolio');
		$this->load->library('form_validation');
		$this->load->model('M_contact');
	}
	public function index()
	{
	
		$data['keywords'] = "website floria, company profile floria, kontraktor taman, kontraktor landskap";
		$data['description'] = "floria merupakan perusahaan kontraktor landskap taman. Dengan pengalaman dan tim ahli yang berpengalaman, kami siap memberikan yang terbaik untuk Anda.";
		$data['title'] = "Kontraktor Landskap Taman - Floria.id";
		$data['canonical'] = "profil";

		$this->form_validation->set_rules('name', 'Your Name', 'required|trim|xss_clean', ['required' => 'Your Name cannot be empty!']);
		$this->form_validation->set_rules('telp', 'Phone', 'required|trim|xss_clean', ['required' => 'Phone cannot be empty!']);
		$this->form_validation->set_rules('service', 'Service', 'required|trim|xss_clean', ['required' => 'Service cannot be empty!']);
		$this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean', ['required' => 'Message cannot be empty!']);

		if ($this->form_validation->run() == false) {
			$this->template->load('template', 'about', $data);
		} else {
			//$this->M_home->add();
			$this->M_contact->add();
			$this->session->set_flashdata('info', 'Estimate service sent successfully!');
			redirect('about');
		}
	}
}
