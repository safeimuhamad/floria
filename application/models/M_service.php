<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_service extends CI_Model
{
    public function get_data_unit()
    {
        return $this->db->get('unit')->result();
    }
    public function get_data($id)
    {
        return $this->db->get_where('service', ['id_service' => $id])->row();
    }
    public function add($type)
    {
        $service_name = $this->input->post('service_name', true);
        $unit = $this->input->post('unit', true);
        $price = $this->input->post('price', true);
        $data = [
            'service_name' => $service_name,
            'unit' => $unit,
            'price' => $price,
            'type' => $type,
        ];
        return $this->db->insert('service', $data);
    }
    public function update($type, $id)
    {
        $service_name = $this->input->post('service_name', true);
        $unit = $this->input->post('unit', true);
        $price = $this->input->post('price', true);
        $data = [
            'service_name' => $service_name,
            'unit' => $unit,
            'price' => $price,
            'type' => $type,
        ];
        $this->db->where('id_service', $id);
        return $this->db->update('service', $data);
    }
    public function srv_list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM service WHERE type='srv' AND (
                service_name LIKE '%$keyword%'
                OR unit LIKE '%$keyword%'
                OR price LIKE '%$keyword%')
                ORDER BY id_service DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM service WHERE type='srv' ORDER BY id_service DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $type = "'" . $hasil->type . "'";
            $row[] = $no++;
            $row[] = $hasil->service_name;
            $row[] = $hasil->unit;
            $row[] = $hasil->price==0?'Hubungi Kami':'Rp ' . nominal($hasil->price);
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'serviceadmin/update/' . $hasil->type . '/' . $hasil->id_service . '"><i class="fa fa-eye"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $type . ',' . $hasil->id_service . ');"><i class="fa fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $count_all,
            "recordsFiltered"   => $count_all,
            "data"              => $data,
        );
        return $output;
    }
    public function ins_list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM service WHERE type='ins' AND (
                service_name LIKE '%$keyword%'
                OR unit LIKE '%$keyword%'
                OR price LIKE '%$keyword%')
                ORDER BY id_service DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM service WHERE type='ins' ORDER BY id_service DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $type = "'" . $hasil->type . "'";
            $row[] = $no++;
            $row[] = $hasil->service_name;
            $row[] = $hasil->unit;
            $row[] = $hasil->price==0?'Hubungi Kami':'Rp ' . nominal($hasil->price);
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'serviceadmin/update/' . $hasil->type . '/' . $hasil->id_service . '"><i class="fa fa-eye"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $type . ',' . $hasil->id_service . ');"><i class="fa fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $count_all,
            "recordsFiltered"   => $count_all,
            "data"              => $data,
        );
        return $output;
    }
    public function delete_service($id)
    {
        $this->db->where('id_service', $id);
        return $this->db->delete('service');
    }
}
