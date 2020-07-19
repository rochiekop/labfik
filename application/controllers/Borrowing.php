<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Borrowing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("borrowing_model");
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
    }

    public function listAll()
    {
        $data["borrowing"] = $this->borrowing_model->getAllBorrowing();
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllWithStatus($status)
    {
        $data["borrowing"] = $this->borrowing_model->getAllWithStatus($status);
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllById($user_id)
    {
        $data["borrowing"] = $this->borrowing_model->getByUserId($user_id);
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listAllByIdWithStatus($user_id, $status)
    {
        $data["borrowing"] = $this->borrowing_model->getByUserIdWithStatus($user_id, $status);
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/kaur/log", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function add()
    {
        $borrowing = $this->borrowing_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        if ($validation->run()) {
            $borrowing->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("item/dosenMhs/borrow");
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            redirect(site_url('borrowing/listAll'));
        }
    }
}
