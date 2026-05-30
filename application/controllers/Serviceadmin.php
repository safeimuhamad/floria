<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serviceadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_service');
		//$this->load->model('M_portofolio');
    }

    public function ac_service()
    {
        $this->template->load('tmp_admin', 'admin/service/ac_service/list');
    }

    public function ac_installation()
    {
		//$data['category'] = $this->M_portofolio->get_data_category();
        $this->template->load('tmp_admin', 'admin/service/ac_installation/list');
    }

    public function add($type = null)
    {
        $this->form_validation->set_rules('service_name', 'Service Name', 'required|trim|xss_clean', ['required' => 'Service Name cannot be empty!']);
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|xss_clean', ['required' => 'Unit Name cannot be empty!']);
        $this->form_validation->set_rules('price', 'Price', 'required|trim|xss_clean', ['required' => 'Price Name cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['unit'] = $this->M_service->get_data_unit();
            $this->template->load('tmp_admin', 'admin/service/add', $data);
        } else {
            if ($this->M_service->add($type)) {
                $this->session->set_flashdata('info', 'Service data stored successfully!');
                if ($type == 'srv') {
                    redirect('serviceadmin/ac_service/list');
                } else {
                    redirect('serviceadmin/ac_installation/list');
                }
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                if ($type == 'srv') {
                    redirect('serviceadmin/ac_service/list');
                } else {
                    redirect('serviceadmin/ac_installation/list');
                }
            }
        }
    }

    public function update($type = null, $id = null)
    {
        $this->form_validation->set_rules('service_name', 'Service Name', 'required|trim|xss_clean', ['required' => 'Service Name cannot be empty!']);
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim|xss_clean', ['required' => 'Unit Name cannot be empty!']);
        $this->form_validation->set_rules('price', 'Price', 'required|trim|xss_clean', ['required' => 'Price Name cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['unit'] = $this->M_service->get_data_unit();
            $data['data_service'] = $this->M_service->get_data($id);
            $this->template->load('tmp_admin', 'admin/service/update', $data);
        } else {
            if ($this->M_service->update($type, $id)) {
                $this->session->set_flashdata('info', 'Service data stored successfully!');
                if ($type == 'srv') {
                    redirect('serviceadmin/ac_service/list');
                } else {
                    redirect('serviceadmin/ac_installation/list');
                }
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                if ($type == 'srv') {
                    redirect('serviceadmin/ac_service/list');
                } else {
                    redirect('serviceadmin/ac_installation/list');
                }
            }
        }
    }

    public function srv_list()
    {
        $data = $this->M_service->srv_list();
        echo json_encode($data);
    }
    public function ins_list()
    {
        $data = $this->M_service->ins_list();
        echo json_encode($data);
    }

    public function delete_service($type = null, $id = null)
    {
        if ($this->M_service->delete_service($id)) {
            $this->session->set_flashdata('info', 'Service has been deleted!');
            if ($type == 'srv') {
                redirect('serviceadmin/ac_service/list');
            } else {
                redirect('serviceadmin/ac_installation/list');
            }
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            if ($type == 'srv') {
                redirect('serviceadmin/ac_service/list');
            } else {
                redirect('serviceadmin/ac_installation/list');
            }
        }
    }
}
