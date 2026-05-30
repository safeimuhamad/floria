<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pricing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['phone'] = "+6281384250674";
        $data['office_phone'] = "02184908050";
        $data['office_phone_space'] = "021-8490-8050";
        $this->template->load('template', 'pricing', $data);
    }
}
