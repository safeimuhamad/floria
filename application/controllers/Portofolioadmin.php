<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolioadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_portofolio');
    }

    public function index()
    {
        $this->template->load('tmp_admin', 'admin/portofolio/list');
    }

    public function list()
    {
        $data = $this->M_portofolio->list();
        echo json_encode($data);
    }
	
    public function add() {
        ob_start();
        
        $this->form_validation->set_rules('portofolio_name', 'Portofolio Name', 'required|trim|xss_clean', ['required' => 'Portofolio Name cannot be empty!']);
        $this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean', ['required' => 'Category Name cannot be empty!']);
        
        if ($this->form_validation->run() == false) {
            $data['category'] = $this->M_portofolio->category();
            $this->template->load('tmp_admin', 'admin/portofolio/add', $data);
        } else {
            if ($this->M_portofolio->add()) {
                $this->session->set_flashdata('info', 'Portofolio data stored successfully!');
                redirect('portofolioadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('portofolioadmin');
            }
        }
        
        ob_end_flush();
    }

    public function update($id = null)
    {
        $this->form_validation->set_rules('portofolio_name', 'Portofolio Name', 'required|trim|xss_clean', ['required' => 'Portofolio Name cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['data_portofolio'] = $this->M_portofolio->get_data($id);
            $data['category'] = $this->M_portofolio->category();
            $this->template->load('tmp_admin', 'admin/portofolio/update', $data);
        } else {
            if ($this->M_portofolio->update($id)) {
                $this->session->set_flashdata('info', 'Portofolio data updated successfully!');
                redirect('portofolioadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('portofolioadmin');
            }
        }
    }

    public function delete_portofolio($id = null)
    {
        if ($this->M_portofolio->delete_portofolio($id)) {
            $this->session->set_flashdata('info', 'Portofolio has been deleted!');
            redirect('portofolioadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('portofolioadmin');
        }
    }
}
