<?php

class Pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->model('m_pelanggan');
        $this->load->library('pagination');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $config['total_rows'] = $this->m_pelanggan->total_rows();
        $pelanggan = $this->m_pelanggan->get_limit_data();
        $this->pagination->initialize($config);
        $data = array(
            'pelanggan_data' => $pelanggan,
            'total_rows' => $config['total_rows'],
        );

        $this->load->view('v_pelanggan', $data);
        $this->load->view('partials/v_footer');
    }

    public function save()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_pelanggan->insert($data);
        redirect(site_url('pelanggan'));
    }

    public function update()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_pelanggan->update($this->input->post('id'), $data);
        redirect(site_url('pelanggan'));
    }

    public function delete()
    {
        $this->m_pelanggan->delete($this->input->post('id'));
        redirect(site_url('pelanggan'));
    }
}
