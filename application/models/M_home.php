<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function add()
    {
        $name = $this->input->post('name', true);
        $phone = $this->input->post('phone', true);
        $service = $this->input->post('service', true);
        $message = $this->input->post('message', true);
        $data = [
            'name' => $name,
            'telp' => $phone,
            'ins_opsi' => $service,
            'message' => $message,
        ];
        return $this->db->insert('contact', $data);
    }
}
