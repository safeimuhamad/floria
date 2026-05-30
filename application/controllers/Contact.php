<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_contact');
    }
    
    public function index()
    {
        $data['keywords'] = "contact floria, alamat floria";
        $data['description'] = "Kami siap membantu mewujudkan pembangunan taman impian anda. Hubungi kami untuk berkonsultasi lebih lanjut. Gratis tanpa dikenakan biaya.";

        $data['title'] = "Kontak Kami  - Floria.id";
        $data['canonical'] = "kontak";
        $this->form_validation->set_rules('name', 'Your Name', 'required|trim|xss_clean', ['required' => 'Your Name cannot be empty!']);
        $this->form_validation->set_rules('telp', 'Phone', 'required|trim|xss_clean', ['required' => 'Phone number cannot be empty!']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email', ['required' => 'Email cannot be empty!']);
        $this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean', ['required' => 'Message cannot be empty!']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'contact', $data);
        } else {
            $this->M_contact->add();
            $this->session->set_flashdata('info', 'Message sent successfully!');
            redirect('kontak');
        }
    }


}
