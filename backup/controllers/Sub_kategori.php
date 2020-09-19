<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kategori = $this->kategori_model->listing();
        $data = array(
            'title'     =>  'Kategori',
            'user'      =>  $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'kategori'  =>  $kategori
        );
        $this->load->view('templates/dashboard/headerAdmin', $data);
        $this->load->view('templates/dashboard/sidebarAdmin', $data);
        $this->load->view('sub_kategori/L_kategori', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function tambah()
    {
        $valid = $this->form_validation;
        $kategori = $this->kategori_model->listing_kat();
        $valid->set_rules(
            'nama_child',
            'Nama child',
            'required|is_unique[child_kategori.nama_child]',
            array(
                'required'      =>  '%s harus diisi',
                'is_unique'     =>  '%s sudah ada. Buat kategori baru!'
            )
        );
        if ($valid->run() === FALSE) {
            $data = array(
                'title'     =>  'Tambah kategori',
                'kategori'  =>  $kategori
            );
            $this->load->view('templates/dashboard/headerAdmin', $data);
            $this->load->view('templates/dashboard/sidebarAdmin', $data);
            $this->load->view('sub_kategori/Tambah_kategori', $data);
            $this->load->view('templates/dashboard/footer');
        } else {
            $i = $this->input;
            $data = array(
                'nama_child'     => $i->post('nama_child'),
                'id_kategori'   => $i->post('id_kategori')
            );
            $this->kategori_model->tambah($data);
            redirect(base_url('sub_kategori'), 'refresh');
        }
    }

    public function edit($id_ck)
    {
        $child_kategori = $this->kategori_model->detail($id_ck);
        $kategori = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_child',
            'Nama child',
            'required',
            array(
                'required'      =>  '%s harus diisi'
            )
        );
        if ($valid->run() === FALSE) {
            $data = array(
                'title'     =>  'Edit sub kategori',
                'child_kategori'  =>  $child_kategori,
                'kategori'  =>  $kategori
            );
            $this->load->view('templates/dashboard/headerAdmin', $data);
            $this->load->view('templates/dashboard/sidebarAdmin', $data);
            $this->load->view('sub_kategori/edit_kategori', $data);
            $this->load->view('templates/dashboard/footer');
        } else {
            $i = $this->input;
            $data = array(
                'id_ck'       =>  $id_ck,
                'nama_child'     => $i->post('nama_child'),
                'id_kategori'   => $i->post('id_kategori')
            );
            $this->kategori_model->edit($data);
            redirect(base_url('sub_kategori'), 'refresh');
        }
    }

    public function delete($id_ck)
    {
        $data = array('id_ck' => $id_ck);
        $this->kategori_model->delete($data);
        redirect(base_url('sub_kategori'), 'refresh');
    }
}
