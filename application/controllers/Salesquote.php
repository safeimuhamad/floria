<?php
defined('BASEPATH') or exit('No direct script access allowed');

class salesquote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('micool_app') != TRUE) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('M_quotation');
    }

    public function index()
    {
        $this->template->load('tmp_admin', 'admin/quote/list');
    }

    public function list()
    {
        $data = $this->M_quotation->list();
        echo json_encode($data);
    }


    public function add()
    {
        $this->form_validation->set_rules('customer', 'Customer', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['customers'] = $this->M_quotation->getCustomers();
            $data['products'] = $this->M_quotation->getProducts('product', true);
            $data['services'] = $this->M_quotation->getProducts('service', true);
            $data['materials'] = $this->M_quotation->getProducts('material', true);
            $this->template->load('tmp_admin', 'admin/quote/add', $data);
        } else {
            $current_year = date('Y');
            $last_quotation_number = $this->M_quotation->getLastQuotationNumber();
            $new_number = ($last_quotation_number) ? intval(substr($last_quotation_number, strrpos($last_quotation_number, '-') + 1)) + 1 : 1;
            $new_quotation_number = "QUO-$current_year-" . sprintf('%04d', $new_number);

            $customer_id = $this->input->post('customer');
            $subtotal = $this->input->post('subtotal');
            $note = $this->input->post('note');

            $data_header = [
                'customer' => $customer_id,
                'no' => $new_quotation_number,
                'total' => $subtotal,
                'note' => $note,
            ];

            $data_detail = [];

            // Loop untuk produk, material, dan service
            $entities = [
                'selected_product' => 'product',
                'select_material' => 'material',
                'select_service' => 'service'
            ];

            foreach ($entities as $entity_key => $entity_type) {
                $entity_ids = $this->input->post($entity_key);
                $qtys = $this->input->post("qty_$entity_type");
                $prices = $this->input->post("price_$entity_type");
                $totals = $this->input->post("hidden_price_{$entity_type}_total");

                for ($i = 0; $i < count($entity_ids); $i++) {
                    $data_detail[] = [
                        'no_ref' => $new_quotation_number,
                        'product_id' => $entity_ids[$i],
                        'qty' => $qtys[$i],
                        'price_unit' => $prices[$i],
                        'total_price' => $totals[$i],
                    ];
                }
            }

            $this->M_quotation->addQuotationData($data_header);
            $this->M_quotation->addQuotationDetail($data_detail);
            redirect('salesquote');
        }
    }

    public function update($no = null)
    {

        $this->form_validation->set_rules('customer', 'Customer', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['items'] = $this->M_quotation->getItems('quotation', array('no' => $no));
            $data['item_detail'] = $this->M_quotation->getItems('quotation_detail', array('no_ref' => $no));
            $data['customers'] = $this->M_quotation->getCustomers();
            $data['products'] = $this->M_quotation->getProducts('product', true);
            $data['services'] = $this->M_quotation->getProducts('service', true);
            $data['materials'] = $this->M_quotation->getProducts('material', true);
            $data['item_detail_product'] = $this->M_quotation->getItems('quotation_detail', array('no_ref' => $no, 'type' => 'product'));
            $data['item_detail_material'] = $this->M_quotation->getItems('quotation_detail', array('no_ref' => $no, 'type' => 'material'));
            $data['item_detail_service'] = $this->M_quotation->getItems('quotation_detail', array('no_ref' => $no, 'type' => 'service'));
            $this->template->load('tmp_admin', 'admin/quote/update', $data);
        } else {
            $customer_id = $this->input->post('customer');
            $subtotal = $this->input->post('subtotal');
            $note = $this->input->post('note');

            $data_header = [
                'customer' => $customer_id,
                'total' => $subtotal,
                'note' => $note,
            ];

            $data_detail = [];

            // Loop untuk produk, material, dan service
            $entities = [
                'selected_product' => 'product',
                'select_material' => 'material',
                'select_service' => 'service',
            ];

            foreach ($entities as $entity_key => $entity_type) {
                $entity_ids = $this->input->post($entity_key);
                $qtys = $this->input->post("qty_$entity_type");
                $prices = $this->input->post("price_$entity_type");
                $totals = $this->input->post("hidden_price_{$entity_type}_total");

                for ($i = 0; $i < count($entity_ids); $i++) {
                    $data_detail[] = [
                        'product_id' => $entity_ids[$i],
                        'qty' => $qtys[$i],
                        'price_unit' => $prices[$i],
                        'total_price' => $totals[$i],
                    ];
                }
            }

            $this->M_quotation->updateQuotationData($data_header, $no);
            $this->M_quotation->updateQuotationDetail($data_detail, $no);
            redirect('salesquote');
        }
    }

    public function generate_pdf($no = null)
    {
        // Load library TCPDF
        $this->load->library('pdf');

        // Set judul dokumen PDF
        $this->pdf->SetTitle('Quotation #' . $no);

        // Ambil data quotation header dari model
        $data['items'] = $this->M_quotation->getItems('quotation', array('no' => $no));

        // Ambil data quotation detail dari model
        $data['item_detail'] = $this->M_quotation->getItems('quotation_detail', array('no_ref' => $no));
        //var_dump($data);
        //die();

        // Load view yang akan dicetak dalam PDF
        $html = $this->load->view('admin/quote/pdf_template', $data, true);

        // Buat PDF
        $this->pdf->AddPage();
        $this->pdf->writeHTML($html);
        $this->pdf->Output('Quotation #' . $no . '.pdf', 'I'); // 'I' akan menampilkan PDF dalam browser, 'D' akan mengunduh PDF
    }

    public function delete($id = null)
    {
        if ($this->M_quotation->delete_data('quotation', array('no' => $id))) {
            $this->M_quotation->delete_data('quotation_detail', array('no_ref' => $id));

            $this->session->set_flashdata('info', 'Quotation telah dihapus!');

        } else {

            $this->session->set_flashdata('info', 'Maaf, terdapat kesalahan!');
        }

        redirect('salesquote');
    }

}