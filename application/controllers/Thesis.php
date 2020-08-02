<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Thesis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('thesis_model');
        is_logged_in();
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == '3' or $this->session->userdata('role_id') == '4')
        {
            $this->load->view("templates/dashboard/headerDosenMhs");
            $this->load->view("templates/dashboard/sidebarDosenMhs");
            $this->load->view("thesis/editor");
            $this->load->view("templates/dashboard/footer");
        }
        // $this->load->view("thesis/test");
    }
    
}

