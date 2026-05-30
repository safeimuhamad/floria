<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean', ['required' => 'The username cannot be empty!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean', ['required' => 'The password cannot be empty!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $isUser = $this->M_login->check_user();
            if ($isUser->num_rows() > 0) {
                $data = $isUser->row_array();
                if (password_verify($this->input->post('password'), $data['password'])) {
                    $setdata = [
                        'id_user' => $data['id_user'],
                        'username' => $data['username'],
                        'level' => $data['level'],
                        'micool_app' => true
                    ];
                    $this->session->set_userdata($setdata);
                    redirect('productadmin');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-times-circle"></i> Wrong password!
                        </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-times-circle"></i> Username is not registered!
                </div>');
                redirect('login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        session_destroy();
        redirect('login');
    }
}
