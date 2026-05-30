<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{
    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $this->db->like('category', $keyword);
            $this->db->order_by('id_category', 'DESC');
            $query = $this->db->get('category');
        } else {
            $this->db->order_by('id_category', 'DESC');
            $query = $this->db->get('category');
        }
        $count_all = $query->num_rows();
        $this->db->limit($start, $length);
        $data_tabel = $query->result();
        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = $hasil->category;
            $row[] = $hasil->type;
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'categoryadmin/update/' . $hasil->id_category . '"><i class="fa fa-eye"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $hasil->id_category . ');"><i class="fa fa-trash"></i> Delete</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $count_all,
            "recordsFiltered" => $count_all,
            "data" => $data,
        );
        return $output;
    }

    public function getType()
    {
        $this->db->select('type_id, type_name');
        return $this->db->get('type');


    }

    public function add()
    {
        $category = $this->input->post('category', true);
        $type = $this->input->post('type', true);
        $data = [
            'category' => $category,
            'type' => $type,
        ];
        return $this->db->insert('category', $data);
    }
    public function get_data($id)
    {
        return $this->db->get_where('category', ['id_category' => $id])->row();
    }

    public function update($id)
    {
        $category = $this->input->post('category', true);
        $type = $this->input->post('type', true);
        $data = [
            'category' => $category,
            'type' => $type,
        ];
        $this->db->where('id_category', $id);
        return $this->db->update('category', $data);
    }
    public function delete_category($id)
    {
        $this->db->where('id_category', $id);
        return $this->db->delete('category');
    }
}