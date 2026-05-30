<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_product_web extends CI_Model
{
    public function get_data_category()
    {
        return $this->db->get('category')->result();
    }

    public function get_data_category_product()
    {
        $this->db->where('type', 'product');
        $result = $this->db->get('category')->result();
        return $result;
    }

    public function getDataUnit()
    {
        return $this->db->get('unit')->result();
    }

    public function getDataType()
    {
        return $this->db->get('type')->result();

    }

    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM product WHERE
                product_name LIKE '%$keyword%'
                OR description LIKE '%$keyword%'
                ORDER BY id_product DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM product  ORDER BY id_product DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }

        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = '<center><a target="_blank" href="' . base_url() . 'template/assets_admin/images/user/' . base64_decode($hasil->foto) . '" ><img height="60px" src="' . base_url() . 'template/assets_admin/images/user/' . base64_decode($hasil->foto) . '" /></a></center>';
            $row[] = $hasil->product_name;
            $row[] = $hasil->category;
            $row[] = formatRupiah($hasil->buy_price);
            $row[] = formatRupiah($hasil->sell_price);
            $row[] = strlen($hasil->description) >= 35 ? substr($hasil->description, 0, 35) . "..." : $hasil->description;
            $row[] = '<a class="btn btn-success" href="' . base_url() . 'productadmin/update/' . $hasil->id_product . '"><i class="fa fa-eye"></i></a>
            <button class="btn btn-danger" onclick="buttonDelete(' . $hasil->id_product . ');"><i class="fa fa-trash"></i></button>';
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

    public function get_data_product_json()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where_in('type', array('material', 'product')); 
        $this->db->order_by('id_product', 'DESC');
        return $query = $this->db->get()->result();
    }

    public function get_data_product_tanaman_hias()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where_in('category', array('Tanaman Hias')); 
        $this->db->order_by('id_product', 'DESC');
        return $query = $this->db->get()->result();
    }

    public function get_data_product_buket()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where_in('category', array('Buket Bunga')); 
        $this->db->order_by('id_product', 'DESC');
        return $query = $this->db->get()->result();
    }


    public function get_data($slug = null)
    {
        return $this->db->get_where('product', ['slug' => $slug])->row();
    }

    public function get_alat_sewa()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('category', 'alat'); // Filter berdasarkan tipe alat
        $this->db->order_by('id_product', 'DESC');
        return $query = $this->db->get()->result();
    }

    public function get_data_all($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit);
        }
        return $this->db->get('product')->result();
    }
}