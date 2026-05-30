<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_blog extends CI_Model
{
    public function listBlog()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        // if (!empty($_POST['search']['value'])) {
        //     $keyword = $_POST['search']['value'];
        //     $this->db->like('title', $keyword);
        //     $this->db->or_like('content', $keyword);
        //     $this->db->or_like('date', $keyword);
        //     $this->db->order_by('id_blog', 'DESC');
        //     $query = $this->db->get('blog');
        // } else {
        //     $this->db->order_by('id_blog', 'DESC');
        //     $query = $this->db->get('blog');
        // }
        // $count_all = $query->num_rows();
        // $this->db->limit($start, $length);
        // $data_tabel = $query->result();
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM blog WHERE
                title LIKE '%$keyword%'
                OR content LIKE '%$keyword%'
                OR date LIKE '%$keyword%'
                ORDER BY id_blog DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            $query = "SELECT * FROM blog  ORDER BY id_blog DESC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $row[] = $no++;
            $row[] = '<center><a target="_blank" href="' . base_url() . 'template/assets_admin/images/blog/' . base64_decode($hasil->foto) . '" ><img height="60px" src="' . base_url() . 'template/assets_admin/images/blog/' . base64_decode($hasil->foto) . '" /></a></center>';
            $row[] = $hasil->title;
            $row[] = strlen($hasil->content) > 30 ? substr($hasil->content, 0, 30) . "..." : $hasil->content;
            $row[] = date_format(date_create($hasil->date), "d M Y");
            $row[] = '<a class="btn btn-success btn-xs" href="' . base_url() . 'blogadmin/update/' . $hasil->id_blog . '"><i class="fa fa-edit"></i> Update</a>
            <button class="btn btn-danger btn-xs" onclick="buttonDelete(' . $hasil->id_blog . ');"><i class="fa fa-trash"></i> Delete</button>';
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
    public function get_data_blog_json()
    {
        //return $this->db->get('blog')->result();

        $this->db->select('*');
        $this->db->from('blog');
        $this->db->order_by('id_blog', 'DESC');
        return $query = $this->db->get()->result();

    }

    public function get_new_article()
    {
        $this->db->order_by('date', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('blog');

        return $query->row(); // Pastikan data yang dikembalikan adalah objek
    }

    public function check()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        return $this->db->get_where('blog', ['slug' => $slug])->row();
    }

    public function add()
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $content = $this->input->post('content', true);
        $date = $this->input->post('date', true);
        $no_random = rand(1, 10000);
        $this->load->library('upload');
        $config['upload_path'] = './template/assets_admin/images/blog';
        $config['allowed_types'] = 'webp|jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size'] = '5020';
        $config['file_name'] = $slug . '.webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'content' => $content,
                    'date' => $date,
                    'foto' => base64_encode($slug . '.webp'),
                ];
                return $this->db->insert('blog', $data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_data($slug)
    {
        return $this->db->get_where('blog', ['slug' => $slug])->row();
    }

    public function cariIdArtikelTerdekat($id_cari)
    {
        $this->db->select('id_blog');
        $this->db->from('blog');
        $this->db->where('id_blog !=', $id_cari); // Memastikan tidak mengambil artikel yang sedang ditampilkan
        $this->db->order_by('ABS(id_blog - ' . $id_cari . ')', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_blog;
        } else {
            return null;
        }
    }

    public function get_data_by($id)
    {
        return $this->db->get_where('blog', ['id_blog' => $id])->row();
    }



    public function get_data_all($limit = null)
    {

        $this->db->order_by('date', 'DESC');

        if ($limit != null) {
            $this->db->limit($limit);
        }

        return $this->db->get('blog')->result();
    }



    public function update($id)
    {
        $title = $this->input->post('title', true);
        $slug = url_title($title, '-', true);
        $content = $this->input->post('content', true);
        $date = $this->input->post('date', true);
        $no_random = rand(1, 10000);
        $this->load->library('upload');
        $config['upload_path'] = './template/assets_admin/images/blog';
        $config['allowed_types'] = 'webp|jpg|jpeg|png|JPG|JPEG|PNG';
        $config['max_size'] = '5020';
        $config['file_name'] = $no_random . '.webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'content' => $content,
                    'date' => $date,
                    'foto' => base64_encode($no_random . '.webp'),
                ];
                $this->db->where('id_blog', $id);
                return $this->db->update('blog', $data);
            } else {
                return false;
            }
        } else {
            $data = [
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'date' => $date,
            ];
            $this->db->where('id_blog', $id);
            return $this->db->update('blog', $data);
        }
    }
    public function delete_blog($id)
    {
        $this->db->where('id_blog', $id);
        $foto = $this->db->get('blog')->row();
        $foto = base64_decode($foto->foto);
        $path_mhs = './template/assets_admin/images/blog/';
        @unlink($path_mhs . $foto);
        $this->db->where('id_blog', $id);
        return $this->db->delete('blog');
    }
}
