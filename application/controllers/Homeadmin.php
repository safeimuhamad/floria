<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homeadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
    }
    public function index()
    {
        $this->template->load('tmp_admin', 'admin/home');
    }
}
