<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_contact extends CI_Model
{
    public function add()
    {
        $name = $this->input->post('name', true);
        $telp = $this->input->post('telp', true);
        $service = $this->input->post('service', true);
        $email = $this->input->post('email', true);
        $message = $this->input->post('message', true);
        if (empty($service)) {
            $service = "Lainnya";
        }

        if (empty($email)) {
            $email = "-";
        }

        $data = [
            'name' => $name,
            'telp' => $telp,
            'email' => $email,
            'ins_opsi' => $service,
            'message' => $message,
        ];


        return $this->db->insert('contact', $data);

        /*
              if ($this->db->insert('contact', $data)) {
                  // Insert berhasil
                  return true;
              } else {
                  //Insert gagal, tampilkan pesan error
                  echo $this->db->error();
                  return false;
              }
              */

    }

    public function addFromAdmin()
    {
        $name = $this->input->post('name', true);
        $company = $this->input->post('company', true);
        $phone = $this->input->post('phone', true);
        $email = $this->input->post('email', true);
        $message = $this->input->post('message', true);
        $service = $this->input->post('service', true);

        $data = [
            'name' => $name,
            'company' => $company,
            'telp' => $phone,
            'email' => $email,
            'message' => $message,
            'ins_opsi' => $service,
        ];
        return $this->db->insert('contact', $data);

    }

    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM contact WHERE
                name LIKE '%$keyword%'
                OR email LIKE '%$keyword%'
                OR message LIKE '%$keyword%'
                ORDER BY id_contact DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM contact  ORDER BY id_contact DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }

        foreach ($data_tabel as $hasil) {
            $row = array();
            $message = "'" . base64_encode($hasil->message) . "'";
            $row[] = $no++;
            $row[] = $hasil->date;
            $row[] = $hasil->company;
            $row[] = $hasil->name;
            $row[] = $hasil->telp;
            $row[] = $hasil->ins_opsi;
            $row[] = $hasil->email;
            //$row[] = strlen($hasil->message) > 30 ? substr($hasil->message, 0, 30) . '...' : $hasil->message;
            $row[] = '<button class="btn btn-success btn-xs" onclick="buttonMessage(' . $message . ');"><i class="fa fa-eye"></i></button>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $hasil->id_contact . ');"><i class="fa fa-trash"></i></button>';
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

    public function delete_contact($id)
    {
        $this->db->where('id_contact', $id);
        return $this->db->delete('contact');
    }

    public function getService()
    {

        // Get the data from the 'services' table
        $query = $this->db->get_where('category', array('type' => 'service'));

        // Check if there are any rows returned
        if ($query->num_rows() > 0) {
            // Return the result as an array of objects
            return $query->result();
        } else {
            // Return an empty array if no data found
            return array();
        }
    }
}