<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_portofolio extends CI_Model
{
    public function get_data_category()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function getPortofolioByKategori($kategori)
    {
        // Query database untuk mengambil portofolio dengan kategori yang sesuai
        $query = $this->db->get_where('portofolio', array('category' => $kategori));

        // Mengembalikan hasil query sebagai array
        return $query->result_array();
    }



    public function getAllPortofolio_lama()
    {
        // Query database untuk mengambil semua portofolio 
        $query = $this->db->get('portofolio');

        // Mengembalikan hasil query sebagai array
        return $query->result_array();
    }

    public function getAllPortofolio()
    {
    // Hardcode kategori yang ingin diambil
        $categories = ['Taman Villa', 'Taman Rumah', 'Taman Hotel', 'Taman Kantor'];

    // Filter berdasarkan kategori yang telah di-hardcode
        $this->db->where_in('category', $categories);

    // Batasi hasil hanya 10 data
        $this->db->limit(10);

    // Query database untuk mengambil portofolio yang sesuai
        $query = $this->db->get('portofolio');

    // Mengembalikan hasil query sebagai array
        return $query->result_array();
    }

    public function getPotongRumput()
    {
        // Hardcode kategori yang ingin diambil
        $categories = ['Potong Rumput'];

        // Filter berdasarkan kategori yang telah di-hardcode
        $this->db->where_in('category', $categories);

        $this->db->limit(10);

        // Query database untuk mengambil portofolio yang sesuai
        $query = $this->db->get('portofolio');

        // Mengembalikan hasil query sebagai array
        return $query->result_array(); 
    }

    public function getSewaTanaman()
    {
        // Hardcode kategori yang ingin diambil
        $categories = ['Sewa Tanaman'];

        // Filter berdasarkan kategori yang telah di-hardcode
        $this->db->where_in('category', $categories);

        $this->db->limit(10);

        // Query database untuk mengambil portofolio yang sesuai
        $query = $this->db->get('portofolio');

        // Mengembalikan hasil query sebagai array
        return $query->result_array(); 
    }


    public function getTebangPohon()
    {
        // Hardcode kategori yang ingin diambil
        $categories = ['Tebang Pohon'];

        // Filter berdasarkan kategori yang telah di-hardcode
        $this->db->where_in('category', $categories);

        $this->db->limit(10);

        // Query database untuk mengambil portofolio yang sesuai
        $query = $this->db->get('portofolio');

        // Mengembalikan hasil query sebagai array
        return $query->result_array(); 
    }

    public function getDesain()
    {
        // Hardcode kategori yang ingin diambil
        $categories = ['Desain Taman'];

        // Filter berdasarkan kategori
        $this->db->where_in('category', $categories);

        // Urutkan berdasarkan data terbaru
        $this->db->order_by('id_portofolio', 'DESC');

        // Batasi hasil query sebanyak 6 data
        $this->db->limit(10);

        // Query database
        $query = $this->db->get('portofolio');

        // Mengembalikan hasil query sebagai array
        return $query->result_array();
    }



    public function add()
    {
        $portofolio_name = $this->input->post('portofolio_name', true);
        $category = $this->input->post('category', true);
        echo $portofolio_name . "|" . $_FILES['foto']['name'];
        $no_random = rand(1, 10000);
        $this->load->library('upload');
        $config['upload_path'] = './template/assets_admin/portofolio';
        $config['allowed_types'] = 'webp|jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size'] = '5020';
        $config['file_name'] = $no_random . '.webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $data = [
                    'portofolio_name' => $portofolio_name,
                    'category' => $category,
                    'foto' => base64_encode($no_random . '.webp'),
                ];
                return $this->db->insert('portofolio', $data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_all_data()
    {
        $this->db->order_by('id_portofolio', 'DESC');
        $query = $this->db->get('portofolio');
        return $query->result_array();
    }

    public function get_portofolio_limit()
    {
        $this->db->order_by('id_portofolio', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get('portofolio');
        return $query->result_array();
    }

    public function get_data_by_category($category)
    {
        $this->db->where('category', $category);
        $this->db->order_by('id_portofolio', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get('portofolio');

        // Debugging: Tampilkan query yang dijalankan
        // echo $this->db->last_query();

        return $query->result_array();
    }

    public function get_data_portofolio_json()
    {
        $filter = $this->input->post("filter");
        if ($filter != 'all') {
            $this->db->where("category", $filter);
        }
        return $this->db->get('portofolio')->result();
    }

    public function get_data($id)
    {
        return $this->db->get_where('portofolio', ['id_portofolio' => $id])->row();
        //return $query->result_array();
    }

    public function category()
    {
        // $query = $this->db->get_where('category',['type' => 'portofolio']);
        //return $query->result_array();

        //$query = $this->db->get_where('category',['type' => "portofolio"]);
        //return $query->result_array();
        return $this->db->get_where('category', ['type' => 'portofolio'])->result();
    }

    public function get_data_all()
    {
        return $this->db->get('portofolio')->result();
    }

    public function update($id)
    {
        $portofolio_name = $this->input->post('portofolio_name', true);
        $category = $this->input->post('category', true);
        $no_random = rand(1, 10000);
        $this->load->library('upload');
        $config['upload_path'] = './template/assets_admin/portofolio/';
        $config['allowed_types'] = 'webp|jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size'] = '5020';
        $config['file_name'] = $no_random . '.webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $data = [
                    'portofolio_name' => $portofolio_name,
                    'category' => $category,
                    'foto' => base64_encode($no_random . '.webp'),
                ];
                $this->db->where('id_portofolio', $id);
                return $this->db->update('portofolio', $data);
            } else {
                // echo "gagal1";
                return false;
            }
        } else {
            // echo "gagal2";
            $data = [
                'portofolio_name' => $portofolio_name,
                'category' => $category,
            ];
            $this->db->where('id_portofolio', $id);
            return $this->db->update('portofolio', $data);
        }
    }

    public function list()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        // if (!empty($_POST['search']['value'])) {
        //     $keyword = $_POST['search']['value'];
        //     $this->db->like('portofolio_name', $keyword);
        //     $this->db->or_like('category', $keyword);
        //     $this->db->order_by('id_portofolio', 'DESC');
        //     $query = $this->db->get('portofolio');
        // } else {
        //     $this->db->order_by('id_portofolio', 'DESC');
        //     $query = $this->db->get('portofolio');
        // }
        // $count_all = $query->num_rows();
        // $this->db->limit($start, $length);
        // $data_tabel = $query->result();
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM portofolio WHERE
            portofolio_name LIKE '%$keyword%'
            OR category LIKE '%$keyword%'
            ORDER BY id_portofolio DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM portofolio ORDER BY id_portofolio DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = '<center><a target="_blank" href="' . base_url() . 'template/assets_admin/portofolio/' . base64_decode($hasil->foto) . '" ><img height="60px" src="' . base_url() . 'template/assets_admin/portofolio/' . base64_decode($hasil->foto) . '" /></a></center>';
            $row[] = $hasil->portofolio_name;
            $row[] = $hasil->category;
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'portofolioadmin/update/' . $hasil->id_portofolio . '"><i class="fa fa-edit"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $hasil->id_portofolio . ');"><i class="fa fa-trash"></i> Delete</button>';
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

    public function delete_portofolio($id)
    {
        $this->db->where('id_portofolio', $id);
        $foto = $this->db->get('portofolio')->row();
        $foto = base64_decode($foto->foto);
        $path_mhs = './template/assets_admin/portofolio/';
        @unlink($path_mhs . $foto);
        $this->db->where('id_portofolio', $id);
        return $this->db->delete('portofolio');
    }
}
