<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karya extends CI_Controller
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
        $tampilan = $this->tampilan_model->listing();
        $data = array(
            'title'     => 'karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/upload_gambar', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function tambah()
    {
        $prodi = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang'
            )
        );
        $valid->set_rules(
            'kode_tampilan',
            'Kode Tampilan',
            'required|is_unique[tampilan.kode_tampilan]',
            array(
                'required'      =>  '%s harus diisi',
                'is_unique'     =>  '%s sudah ada. Buat kode karya baru!'
            )
        );
        $valid->set_rules(
            'judul',
            'Judul',
            'required[tampilan.judul]',
            array(
                'required'      =>  '%s harus diisi'
            )
        );
        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/images/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '10000';
            $config['max_width'] = 2024;
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     =>  'Tambah tampilan',
                    'kategori'  =>  $prodi,
                    'error'     =>  $this->upload->display_errors(),
                );
                $this->load->view('templates/dashboard/headerDosenMhs', $data);
                $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
                $this->load->view('karya/tambah', $data);
                $this->load->view('templates/dashboard/footer');
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/images/' . $upload_gambar['upload_data']['file_name'];
                $config['new_image']    = './assets/upload/images/thumbs/';
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 1200;
                $config['height']       = 480;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                $i = $this->input;
                $slug_tampilan = url_title($this->input->post('judul') . '-' . $this->input->post('kode_tampilan'), 'dash', TRUE);
                $data = array(
                    'id' =>  $this->session->userdata('id'),
                    'slug_tampilan' => $slug_tampilan,
                    'id_kategori'  =>  $i->post('id_kategori'),
                    'id_ck'   => $i->post('id_ck'),
                    'nim'       => $i->post('nim'),
                    'judul'       => $i->post('judul'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'keywords'    => $i->post('keywords'),
                    'gambar'    =>  $upload_gambar['upload_data']['file_name'],
                    'kode_tampilan' =>  $i->post('kode_tampilan'),
                    'tanggal_post'  =>  date('Y-m-d H:i:s'),
                    'status'    =>  'Menunggu Acc'
                );
                $this->tampilan_model->tambah($data);
                redirect(base_url('karya'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Tambah tampilan',
            'kategori'  =>  $prodi,
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/tambah', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function delete($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        unlink('./assets/upload/images/' . $tampilan->gambar);
        unlink('./assets/upload/images/thumbs/' . $tampilan->gambar);
        $data = array('id_tampilan' => $id_tampilan);
        $this->tampilan_model->delete($data);
        redirect(base_url('karya'), 'refresh');
    }

    function fetch()
    {
        if ($this->input->post('id_kategori')) {
            echo $this->kategori_model->fetch_child($this->input->post('id_kategori'));
        }
    }
}
