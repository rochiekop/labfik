<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaur_karya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tampilan_model');
        $this->load->library('form_validation');
        $this->load->model('kategori_model');
        $this->load->model('gambar_model');
    }

    public function index()
    {
        $tampilan = $this->tampilan_model->listingad();
        $data = array(
            'title' => 'LABFIK | List Semua Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerKaur', $data);
        $this->load->view('templates/dashboard/sidebarKaur', $data);
        $this->load->view('karya/listallkarya', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function minta()
    {
        $tampilan = $this->gambar_model->mintaacc();
        $data = array(
            'title' => 'LABFIK | List Semua Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerKaur', $data);
        $this->load->view('templates/dashboard/sidebarKaur', $data);
        $this->load->view('karya/listallkarya', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function listacc()
    {
        $tampilan = $this->gambar_model->listingacc();
        $data = array(
            'title' => 'LABFIK | List Semua accepted Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerKaur', $data);
        $this->load->view('templates/dashboard/sidebarKaur', $data);
        $this->load->view('karya/listacc', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function listdec()
    {
        $tampilan = $this->gambar_model->listingdec();
        $data = array(
            'title' => 'LABFIK | List Semua Declined Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerKaur', $data);
        $this->load->view('templates/dashboard/sidebarKaur', $data);
        $this->load->view('karya/listacc', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function accepted($id)
    {
        $this->gambar_model->changeStatusAccepted($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman tempat disetujui!</div>');
        redirect('kaur_karya');
    }

    public function Declined($id)
    {
        $this->gambar_model->changeStatusDeclined($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman tempat ditolak!</div>');
        redirect('kaur_karya');
    }
}
