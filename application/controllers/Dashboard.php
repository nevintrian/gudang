<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('pagination');
        $this->load->library('upload');
    }
    public function index()
    {
        $this->load->view('partials/v_sidebar');
        $this->load->view('v_dashboard');
        $this->load->view('partials/v_footer');
    }
}
