<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_karya extends CI_Controller
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
            'title'     => 'karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerAdmin', $data);
        $this->load->view('templates/dashboard/sidebarAdmin', $data);
        $this->load->view('karya/admin_view', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function edit($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        $kategori = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'judul',
            'Judul',
            'required[tampilan.judul]',
            array(
                'required'      =>  '%s harus diisi'
            )
        );
        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/images/';
                $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4';
                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data = array(
                        'title'     =>  'Edit: ' . $tampilan->judul,
                        'kategori'  =>  $kategori,
                        'tampilan'  =>  $tampilan,
                        'error'     =>  $this->upload->display_errors()
                    );
                    $this->load->view('templates/dashboard/headerAdmin', $data);
                    $this->load->view('templates/dashboard/sidebarAdmin', $data);
                    $this->load->view('karya/edit', $data);
                    $this->load->view('templates/dashboard/footer');
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                    $i = $this->input;
                    $data = array(
                        'id_tampilan' => $id_tampilan,
                        'slug_tampilan' => $slug_tampilan,
                        'id_kategori'  =>  $i->post('id_kategori'),
                        'id_ck'   => $i->post('id_ck'),
                        'nim'       => $i->post('nim'),
                        'type'   =>  $i->post('type'),
                        'No_wa'       => $i->post('No_wa'),
                        'No_hp'       => $i->post('No_hp'),
                        'judul'       => $i->post('judul'),
                        'deskripsi'     => $i->post('deskripsi'),
                        'gambar'    =>  $upload_gambar['upload_data']['file_name'],
                    );
                    $this->tampilan_model->edit($data);
                    redirect(base_url('admin_karya'), 'refresh');
                }
            } else {
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $i = $this->input;
                $data = array(
                    'id_tampilan' => $id_tampilan,
                    'slug_tampilan' => $slug_tampilan,
                    'id_kategori'  =>  $i->post('id_kategori'),
                    'id_ck'   => $i->post('id_ck'),
                    'nim'       => $i->post('nim'),
                    'type'   =>  $i->post('type'),
                    'No_wa'       => $i->post('No_wa'),
                    'No_hp'       => $i->post('No_hp'),
                    'judul'       => $i->post('judul'),
                    'deskripsi'     => $i->post('deskripsi')
                );
                $this->tampilan_model->edit($data);
                redirect(base_url('admin_karya'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Edit: ' . $tampilan->judul,
            'kategori'  =>  $kategori,
            'tampilan'  =>  $tampilan
        );
        $this->load->view('templates/dashboard/headerAdmin', $data);
        $this->load->view('templates/dashboard/sidebarAdmin', $data);
        $this->load->view('karya/edit', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function delete($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        unlink('./assets/upload/images/' . $tampilan->gambar);
        unlink('./assets/upload/images/thumbs/' . $tampilan->gambar);
        $data = array('id_tampilan' => $id_tampilan);
        $this->tampilan_model->delete($data);
        redirect(base_url('admin_karya'), 'refresh');
    }

    function fetch()
    {
        if ($this->input->post('id_kategori')) {
            echo $this->kategori_model->fetch_child($this->input->post('id_kategori'));
        }
    }
}
