<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_unit extends CI_Model
{
    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        // if (!empty($_POST['search']['value'])) {
        //     $keyword = $_POST['search']['value'];
        //     $this->db->like('unit', $keyword);
        //     $this->db->order_by('id_unit', 'DESC');
        //     $query = $this->db->get('unit');
        // } else {
        //     $this->db->order_by('id_unit', 'DESC');
        //     $query = $this->db->get('unit');
        // }
        // $count_all = $query->num_rows();
        // $this->db->limit($start, $length);
        // $data_tabel = $query->result();
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM unit WHERE
                unit LIKE '%$keyword%'
                ORDER BY id_unit DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM unit  ORDER BY id_unit DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = $hasil->unit;
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'unitadmin/update/' . $hasil->id_unit . '"><i class="fa fa-edit"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $hasil->id_unit . ');"><i class="fa fa-trash"></i> Delete</button>';
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
    public function add()
    {
        $unit = $this->input->post('unit', true);
        $data = [
            'unit' => $unit,
        ];
        return $this->db->insert('unit', $data);
    }
    public function get_data($id)
    {
        return $this->db->get_where('unit', ['id_unit' => $id])->row();
    }

    public function update($id)
    {
        $unit = $this->input->post('unit', true);
        $data = [
            'unit' => $unit,
        ];
        $this->db->where('id_unit', $id);
        return $this->db->update('unit', $data);
    }
    public function delete_unit($id)
    {
        $this->db->where('id_unit', $id);
        return $this->db->delete('unit');
    }
}
