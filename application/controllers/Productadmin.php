<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_product');
        $this->load->helper('custom');
    }
    public function index()
    {
        $this->template->load('tmp_admin', 'admin/product/list');
    }

    public function list()
    {
        $data = $this->M_product->list();
        echo json_encode($data);
    }
    public function add()
    {

        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        $this->ckeditor->basePath = base_url() . 'template/assets/js/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
        $this->ckeditor->config['language'] = 'it';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';

        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../../assets/ckfinder/');

        $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim|xss_clean', ['required' => 'Product Name cannot be empty!']);
        $this->form_validation->set_rules('category', 'Category', 'required|trim|xss_clean', ['required' => 'Category Name cannot be empty!']);
        $this->form_validation->set_rules('buy_price', 'Buy Price', 'required|trim|xss_clean', ['required' => 'Price cannot be empty!']);
        $this->form_validation->set_rules('sell_price', 'Sell Price', 'required|trim|xss_clean', ['required' => 'Price cannot be empty!']);
        $this->form_validation->set_rules('content', 'Description', 'required|trim|xss_clean', ['required' => 'Description cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['category'] = $this->M_product->get_data_category_product();
            $data['uom'] = $this->M_product->getDataUnit();
            $data['type'] = $this->M_product->getDataType();
            $this->template->load('tmp_admin', 'admin/product/add', $data);
        } else {
            if ($this->M_product->add()) {
                $this->session->set_flashdata('info', 'Product data stored successfully!');
                redirect('productadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('productadmin');
            }
        }
    }

    public function update($id = null)
    {
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        $this->ckeditor->basePath = base_url() . 'template/assets/js/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
        $this->ckeditor->config['language'] = 'it';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';

        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../../assets/ckfinder/');

        $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim|xss_clean', ['required' => 'Product Name cannot be empty!']);
        $this->form_validation->set_rules('buy_price', 'Buy Price', 'required|trim|xss_clean', ['required' => 'Price cannot be empty!']);
        $this->form_validation->set_rules('sell_price', 'Sell Price', 'required|trim|xss_clean', ['required' => 'Price cannot be empty!']);
        $this->form_validation->set_rules('content', 'Description', 'required|trim|xss_clean', ['required' => 'Description cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['data_product'] = $this->M_product->get_data($id);
            $data['category'] = $this->M_product->get_data_category_product();
            $data['uom'] = $this->M_product->getDataUnit();
            $data['type'] = $this->M_product->getDataType();
            $this->template->load('tmp_admin', 'admin/product/update', $data);
        } else {
            if ($this->M_product->update($id)) {
                $this->session->set_flashdata('info', 'Product data updated successfully!');
                redirect('productadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('productadmin');
            }
        }
    }

    public function delete_product($id = null)
    {
        if ($this->M_product->delete_product($id)) {
            $this->session->set_flashdata('info', 'Product has been deleted!');
            redirect('productadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('productadmin');
        }
    }
}