<?php

class Jenis_barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_jenis_barang');
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_jenis_barang->total_rows();
        $jenis_barang = $this->m_jenis_barang->get_limit_data();
        $this->pagination->initialize($config);
        $data = array(
            'jenis_barang_data' => $jenis_barang,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_jenis_barang', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
        );
        $this->m_jenis_barang->insert($data);
        redirect(site_url('jenis_barang'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
        );
        $this->m_jenis_barang->update($this->input->post('id'), $data);
        redirect(site_url('jenis_barang'));
    }

    public function delete()
    {
        $this->m_jenis_barang->delete($this->input->post('id'));
        redirect(site_url('jenis_barang'));
    }
}
