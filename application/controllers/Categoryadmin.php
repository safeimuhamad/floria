<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoryadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_category');
    }
    public function index()
    {
        $this->template->load('tmp_admin', 'admin/category/list');
    }

    public function list()
    {
        $data = $this->M_category->list();
        echo json_encode($data);
    }

    public function add()
    {
        $this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean', ['required' => 'Category cannot be empty!']);
        $this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean', ['required' => 'Category cannot be empty!']);

        if ($this->form_validation->run() == false) {
            $data['data_type'] = $this->M_category->getType()->result();
            $this->template->load('tmp_admin', 'admin/category/add', $data);

        } else {
            if ($this->M_category->add()) {
                $this->session->set_flashdata('info', 'Category data stored successfully!');
                redirect('categoryadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('categoryadmin');
            }
        }
    }

    public function update($id = null)
    {
        $this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean', ['required' => 'Category cannot be empty!']);
        $this->form_validation->set_rules('type', 'Type', 'required|trim|xss_clean', ['required' => 'Category cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['data_category'] = $this->M_category->get_data($id);
            $data['data_type'] = $this->M_category->getType()->result();
            $this->template->load('tmp_admin', 'admin/category/update', $data);
        } else {
            if ($this->M_category->update($id)) {
                $this->session->set_flashdata('info', 'Category data updated successfully!');
                redirect('categoryadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('categoryadmin');
            }
        }
    }

    public function delete_category($id = null)
    {
        if ($this->M_category->delete_category($id)) {
            $this->session->set_flashdata('info', 'Category has been deleted!');
            redirect('categoryadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('categoryadmin');
        }
    }
}