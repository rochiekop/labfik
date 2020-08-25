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
    // public function _remap()
    {
        $post = $this->input->post();
        $thesis_id = $post['thesis_id'];
        $pdf_file = $post['pdf_file'];

        $this->correction = $post['correction'];
        $this->db->update('thesis', $this, array('id' => $post['thesis_id']));

        $data['thesis_id'] = $thesis_id;
        $data['pdf_file'] = $pdf_file;
        $data['file'] = $this->thesis_model->getFile($thesis_id, $pdf_file);
        $data['correction'] = $this->thesis_model->getCorrection($thesis_id)->correction;

        $this->load->view('templates/dashboard/headerDosenMhs');
        $this->load->view('templates/dashboard/sidebarDosenMhs');
        $this->load->view("thesis/pdf_viewer", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function add()
    {
        $this->thesis_model->saveCorrection();

        $data["correction"] = $this->thesis_model->getCorrection();

        $this->load->view("templates/dashboard/headerDosenMhs");
        $this->load->view("templates/dashboard/sidebarDosenMhs");
        $this->load->view("thesis/pdf_viewer", $data);
        $this->load->view("templates/dashboard/footer");
    }

    // public function getCorrection($thesis_id, $page)
    // {
    //     if ($this->thesis_model->countCorrection($thesis_id, $page) == 0)
    //     {
    //         $this->thesis_model->makeCorrection($thesis_id, $page);
    //     }
    //     echo $this->thesis_model->getCorrection($thesis_id, $page)->correction;
    //     // echo "test berhasil";
    // }

    public function saveCorrection()
    {
        $this->thesis_model->saveCorrection();
    }

    public function checkCorrectionEmpty($thesis_id, $page)
    {
        $this->thesis_model->checkCorrectionEmpty($thesis_id, $page);
    }
    
}

