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

    // public function index($thesis_id)
    public function _remap($thesis_id)
    {
        // $this->load->view('templates/dashboard/headerDosenMhs');
        // $this->load->view('templates/dashboard/sidebarDosenMhs');
        // $this->load->view("thesis/pdf_viewer");
        // $this->load->view("templates/dashboard/footer");

        // $data['title'] = 'LABFIK | Daftar Bimbingan';
        $data['thesis_id'] = "test";
        $data['file'] = $this->thesis_model->getFile("test");
        // $data['correction'] = $this->thesis_model->public function getCorrection($thesis_id, $page);
        // $data['mhsbyid'] = $this->user_model->getmhsbimbinganbyid($thesis_id);

        $this->load->view('templates/dashboard/headerDosenMhs');
        $this->load->view('templates/dashboard/sidebarDosenMhs');
        $this->load->view("thesis/pdf_viewer", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function view($thesis_id){
        // $data['title'] = 'LABFIK | Daftar Bimbingan';
        $data['id'] = $thesis_id;
        $data['file'] = $this->thesis_model->getFile($thesis_id);
        // $data['correction'] = $this->thesis_model->public function getCorrection($thesis_id, $page);
        // $data['mhsbyid'] = $this->user_model->getmhsbimbinganbyid($thesis_id);

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

    public function getCorrection($thesis_id, $page)
    {
        if ($this->thesis_model->checkCorrectionEmpty($thesis_id, $page) == 0)
        {
            $this->thesis_model->makeCorrection($thesis_id, $page);
        }
        $data = $this->thesis_model->getCorrection($thesis_id, $page);
        json_encode($data);
    }

    public function makeCorrection($thesis_id, $page)
    {
        $this->thesis_model->makeCorrection($thesis_id, $page);
    }

    public function saveCorrection($thesis_id, $page, $correction)
    {
        $this->thesis_model->saveCorrection($thesis_id, $page, $correction);
        
    }

    public function save($thesis_id, $page)
    {
        $this->thesis_model->save();

        $data['correction'] = $this->thesis_model->getCorrection($thesis_id, $page);
        $data['thesis_id'] = $thesis_id;
        $data['file'] = $this->thesis_model->getFile($thesis_id); 

        $this->load->view('templates/dashboard/headerDosenMhs');
        $this->load->view('templates/dashboard/sidebarDosenMhs');
        $this->load->view("thesis/pdf_viewer", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function checkCorrectionEmpty($thesis_id, $page)
    {
        $this->thesis_model->checkCorrectionEmpty($thesis_id, $page);
    }
    
}

