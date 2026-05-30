<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->model('M_contact');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('tmp_admin', 'admin/contact/list');
    }

    public function add()
    {

        $this->form_validation->set_rules('name', 'Contact Name', 'required|trim|xss_clean', ['required' => 'Contact Name cannot be empty!']);
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|xss_clean', ['required' => 'Phone number cannot be empty!']);

        if ($this->form_validation->run() == false) {
            $data['services'] = $this->M_contact->getService();
            $this->template->load('tmp_admin', 'admin/contact/add', $data);
        } else {
            $this->M_contact->addFromAdmin();
            $this->template->load('tmp_admin', 'admin/contact/list');
        }


    }

    public function list()
    {
        $data = $this->M_contact->list();
        echo json_encode($data);
    }
    public function delete($id = null)
    {
        if ($this->M_contact->delete_contact($id)) {
            $this->session->set_flashdata('info', 'Contact has been deleted!');
            redirect('contactadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('contactadmin');
        }
    }
}