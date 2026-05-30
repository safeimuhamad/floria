<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_quotation extends CI_Model
{
    public function getCustomers()
    {
        return $this->db->get('contact')->result();
    }

    public function getProducts($type = null, $sortByName = false)
    {
        if ($type !== null) {
            $this->db->where('type', $type);
        }

        if ($sortByName) {
            $this->db->order_by('product_name', 'asc');
        }

        return $this->db->get('product')->result();
    }

    public function getItems($table_name, $where_conditions)
    {
        $this->db->select('*');
        $this->db->from($table_name);

        if ($table_name === 'quotation_detail') {
            $this->db->join('product p', 'quotation_detail.product_id = p.id_product', 'left');
            $this->db->select('p.product_name, p.unit, quotation_detail.price_unit, p.type');
        }

        // Kondisi baru untuk join dengan tabel contact
        if ($table_name === 'quotation') {
            $this->db->join('contact c', 'quotation.customer = c.id_contact', 'left');
            $this->db->select('c.name, c.company, c.email, c.telp');
        }

        $this->db->where($where_conditions);

        return $this->db->get()->result();
    }



    public function addQuotationData($data_header)
    {
        $this->db->insert('quotation', $data_header);
    }


    public function addQuotationDetail($data_detail)
    {
        //var_dump($data_detail);
        $this->db->insert_batch('quotation_detail', $data_detail);
    }

    public function updateQuotationData($data_header, $no)
    {
        $this->db->where('no', $no);
        $this->db->update('quotation', $data_header);
    }
    public function updateQuotationDetail($data_detail, $no)
    {
        $this->db->where('no_ref', $no);

        // Mengambil kolom 'product_id' untuk dijadikan indeks dalam update batch
        $product_ids = array_column($data_detail, 'product_id');

        // Batch update dengan indeks 'product_id'
        $this->db->update_batch('quotation_detail', $data_detail, 'product_id');
    }

    public function delete_data($table_name, $where_conditions)
    {
        $this->db->where($where_conditions);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }

    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        // Gunakan SQL JOIN untuk menggabungkan tabel quotation dengan tabel customer
        $query = "SELECT q.*, c.name AS customer_name FROM quotation q LEFT JOIN contact c ON q.customer = c.id_contact";

        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query .= " WHERE c.name LIKE '%$keyword%' OR q.no LIKE '%$keyword%'";
        }

        $query .= " ORDER BY q.id DESC";

        $count_all = $this->db->query($query)->num_rows();
        $query .= " LIMIT $start,$length";

        $data_tabel = $this->db->query($query)->result();

        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = $hasil->create_at;
            $row[] = $hasil->no;
            $row[] = $hasil->customer_name;
            $row[] = $hasil->total;
            $row[] = $hasil->status;
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'salesquote/generate_pdf/' . $hasil->no . '" target="_blank"><i class="fa fa-print"></i></a> <a class="btn btn-success" href="' . base_url() . 'salesquote/update/' . $hasil->no . '"><i class="fa fa-eye"></i></a>
            <button class="btn btn-danger" onclick="buttonDelete(\'' . base_url() . '\', \'' . $hasil->no . '\');"><i class="fa fa-trash"></i></button>';
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

    // Fungsi untuk mendapatkan nomor quotation terakhir
    public function getLastQuotationNumber()
    {
        $this->db->select('no');
        $this->db->from('quotation');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row();

        if ($row) {
            return $row->no;
        } else {
            return false;
        }
    }


}