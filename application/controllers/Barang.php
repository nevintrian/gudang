<?php

class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_barang');
        $this->load->model('m_jenis_barang');
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_barang->total_rows();
        $barang = $this->m_barang->get_limit_data();
        $this->pagination->initialize($config);
        $jenis_barang = $this->m_jenis_barang->get_limit_data();
        $data = array(
            'barang_data' => $barang,
            'jenis_barang_data' => $jenis_barang,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_barang', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_barang_id' => $this->input->post('jenis_barang_id'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok' => $this->input->post('stok'),
            'terjual' => $this->input->post('terjual'),
        );
        $this->m_barang->insert($data);
        redirect(site_url('barang'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_barang_id' => $this->input->post('jenis_barang_id'),
            'harga_beli' => $this->input->post('harga_beli'),
            'harga_jual' => $this->input->post('harga_jual'),
            'stok' => $this->input->post('stok'),
            'terjual' => $this->input->post('terjual'),
        );
        $this->m_barang->update($this->input->post('id'), $data);
        redirect(site_url('barang'));
    }

    public function delete()
    {
        $this->m_barang->delete($this->input->post('id'));
        redirect(site_url('barang'));
    }
}
