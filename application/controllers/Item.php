<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("item_model");
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {

    }

    public function listAdmin()
    {
        $data["item"] = $this->item_model->getAll();
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/admin/list", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listDosenMhs()
    {
        $data["item"] = $this->item_model->getAll();
        $this->load->view("templates/dashboard/headerDosenMhs");
        $this->load->view("templates/dashboard/sidebarDosenMhs");
        $this->load->view("item/dosenMhs/list", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function listKaur()
    {
        $data["item"] = $this->item_model->getAll();
        $this->load->view("templates/dashboard/headerKaur");
        $this->load->view("templates/dashboard/sidebarKaur");
        $this->load->view("item/dosenMhs/list", $data);
        $this->load->view("templates/dashboard/footer");
    }

    public function add()
    {
        $item = $this->item_model;
        $validation = $this->form_validation;
        $validation->set_rules($item->rules());

        if ($validation->run()) {
            $item->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("templates/dashboard/headerAdmin");
        $this->load->view("templates/dashboard/sidebarAdmin");
        $this->load->view("item/admin/add");
        $this->load->view("templates/dashboard/footer");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('auth');

        $item = $this->item_model;
        $validation = $this->form_validation;
        $validation->set_rules($item->rules());

        if ($validation->run()) {
            $item->update();
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

        if ($this->item_model->delete($id)) {
            redirect(site_url('item/listAdmin'));
        }
    }

    public function search()
    {
        $search=  $this->input->post('search');
        $query = $this->item_model->searchItem($search);
        echo json_encode ($query);
    }

    public function listAdminAjax()
    {
        
    }
}
