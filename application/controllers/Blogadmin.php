<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->library('sitemap_generator');
        $this->load->model('M_blog');
    }
    public function index()
    {
        $this->template->load('tmp_admin', 'admin/blog/list');
    }

    public function list_blog()
    {
        $data = $this->M_blog->listBlog();
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

        $this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean', ['required' => 'Title cannot be empty!']);
        $this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean', ['required' => 'Content cannot be empty!']);
        $this->form_validation->set_rules('date', 'Date', 'required|trim|xss_clean', ['required' => 'Date cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $this->template->load('tmp_admin', 'admin/blog/add');
        } else {
            if (!empty($this->M_blog->check())) {
                $this->session->set_flashdata('danger', 'Artikel yang sama telah di buat sebelumnya!');
                $this->template->load('tmp_admin', 'admin/blog/add');
            } elseif ($this->M_blog->add()) {
                $article = $this->M_blog->get_new_article();
                // Panggil fungsi generate_sitemap
                $this->sitemap_generator->generate_sitemap($article);
                $this->session->set_flashdata('info', 'Blog data stored successfully!');
                redirect('blogadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('blogadmin');
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
        $this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean', ['required' => 'Title cannot be empty!']);
        $this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean', ['required' => 'Content cannot be empty!']);
        $this->form_validation->set_rules('date', 'Date', 'required|trim|xss_clean', ['required' => 'Date cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $data['data_blog'] = $this->M_blog->get_data_by($id);
            $this->template->load('tmp_admin', 'admin/blog/update', $data);
        } else {
            if ($this->M_blog->update($id)) {
                $this->session->set_flashdata('info', 'Blog data updated successfully!');
                redirect('blogadmin');
            } else {
                $this->session->set_flashdata('danger', 'Sorry, There is something wrong!');
                redirect('blogadmin');
            }
        }
    }

    public function delete_blog($id = null)
    {
        if ($this->M_blog->delete_blog($id)) {
            $this->session->set_flashdata('info', 'Blog has been deleted!');
            redirect('blogadmin');
        } else {
            $this->session->set_flashdata('info', 'Sorry, There is something wrong!');
            redirect('blogadmin');
        }
    }
}
