<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unitadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_unit');
    }
    public function index()
    {
        $this->template->load('tmp_admin', 'admin/unit/list');
    }

    public function list()
    {
        $data = $this->M_unit->list();
        echo json_encode($data);
    }

    public function add()
    {
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|xss_clean', ['required' => 'Unit cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $this->template->load('tmp_admin', 'admin/unit/add');
        } else {
            if ($this->M_unit->add()) {
                $this->session->set_flashdata('info', 'unit data stored successfully!');
                redirect('unitadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('unitadmin');
            }
        }
    }

    public function update($id = null)
    {
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|xss_clean', ['required' => 'Unit cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['data_unit'] = $this->M_unit->get_data($id);
            $this->template->load('tmp_admin', 'admin/unit/update', $data);
        } else {
            if ($this->M_unit->update($id)) {
                $this->session->set_flashdata('info', 'unit data updated successfully!');
                redirect('unitadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('unitadmin');
            }
        }
    }

    public function delete_unit($id = null)
    {
        if ($this->M_unit->delete_unit($id)) {
            $this->session->set_flashdata('info', 'Unit has been deleted!');
            redirect('unitadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('unitadmin');
        }
    }
}
