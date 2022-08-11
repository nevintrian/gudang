<?php

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_supplier');
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_supplier->total_rows();
        $supplier = $this->m_supplier->get_limit_data();
        $this->pagination->initialize($config);
        $data = array(
            'supplier_data' => $supplier,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_supplier', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_supplier->insert($data);
        redirect(site_url('supplier'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_supplier->update($this->input->post('id'), $data);
        redirect(site_url('supplier'));
    }

    public function delete()
    {
        $this->m_supplier->delete($this->input->post('id'));
        redirect(site_url('supplier'));
    }
}
