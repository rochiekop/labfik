<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Borrowing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('borrowing_model');
        $this->load->model('item_model');
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

    public function addBorrowing($id = null)
    {
        $borrowing = $this->borrowing_model;
        $item = $this->item_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        $data["item"] = $item->getById($id);
        if (!$data["item"]) show_404();

        if ($validation->run()) {
            $borrowing->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("templates/dashboard/headerDosenMhs");
        $this->load->view("templates/dashboard/sidebarDosenMhs");
        $this->load->view("item/dosenMhs/borrow", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function addBorrowAdmin($id = null)
    {
        $borrowing = $this->borrowing_model;
        $item = $this->item_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        if ($validation->run()) {
            $borrowing->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["item"] = $item->getById($id);
        if (!$data["item"]) show_404();

        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/admin/borrow", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('auth');

        $borrowing = $this->borrowing_model;
        $validation = $this->form_validation;
        $validation->set_rules($borrowing->rules());

        if ($validation->run()) {
            $borrowing->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["item"] = $item->getById($id);
        if (!$data["item"]) show_404();

        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/admin/edit", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->product_model->delete($id)) {
            redirect(site_url('borrowing/listAll'));
        }
    }
}
