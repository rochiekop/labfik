<?php

use function PHPSTORM_META\type;

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

    public function listbymhs()
    {
        $tampilan = $this->tampilan_model->listing();
        $data = array(
            'title'     => 'List Semua Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/upload_gambar', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function listbydsn()
    {
        $tampilan = $this->tampilan_model->listing();
        $data = array(
            'title'     => 'List Semua Karya',
            'tampilan'  => $tampilan
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/viewdsn', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function tambahbydsn()
    {
        $prodi = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_wa',
            'No_Wa',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_hp',
            'No_Hp',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
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
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     =>  'Tambah tampilan',
                    'kategori'  =>  $prodi,
                    'error'     =>  $this->upload->display_errors(),
                );
                $this->load->view('templates/dashboard/headerDosenMhs', $data);
                $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
                $this->load->view('karya/tambahbydsn', $data);
                $this->load->view('templates/dashboard/footer');
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                $i = $this->input;
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $data = array(
                    'id' =>  $this->session->userdata('id'),
                    'nama' =>  $i->post('nama'),
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
                    'tanggal_post'  =>  date('Y-m-d H:i:s'),
                    'status'    =>  'Menunggu Acc'
                );
                $this->tampilan_model->tambah($data);
                redirect(base_url('karya/listbydsn'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Tambah tampilan',
            'kategori'  =>  $prodi,
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/tambahbydsn', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function tambahbydsnvid()
    {
        $prodi = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_wa',
            'No_Wa',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_hp',
            'No_Hp',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
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
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     =>  'Tambah tampilan',
                    'kategori'  =>  $prodi,
                    'error'     =>  $this->upload->display_errors(),
                );
                $this->load->view('templates/dashboard/headerDosenMhs', $data);
                $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
                $this->load->view('karya/tambahbydsnvideo', $data);
                $this->load->view('templates/dashboard/footer');
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                $i = $this->input;
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $data = array(
                    'id' =>  $this->session->userdata('id'),
                    'nama' =>  $i->post('nama'),
                    'slug_tampilan' => $slug_tampilan,
                    'id_kategori'  =>  $i->post('id_kategori'),
                    'id_ck'   => $i->post('id_ck'),
                    'nim'       => $i->post('nim'),
                    'type'   =>  'Video',
                    'No_wa'       => $i->post('No_wa'),
                    'No_hp'       => $i->post('No_hp'),
                    'judul'       => $i->post('judul'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'gambar'    =>  $upload_gambar['upload_data']['file_name'],
                    'tanggal_post'  =>  date('Y-m-d H:i:s'),
                    'status'    =>  'Menunggu Acc'
                );
                $this->tampilan_model->tambah($data);
                redirect(base_url('karya/listbydsn'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Tambah tampilan',
            'kategori'  =>  $prodi,
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/tambahbydsnvideo', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function tambahbymhs()
    {
        $prodi = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_wa',
            'No_Wa',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_hp',
            'No_Hp',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
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
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4';
            $config['max_size'] = '0';

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
                $i = $this->input;
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $data = array(
                    'id' =>  $this->session->userdata('id'),
                    'nama' =>  $this->session->userdata('name'),
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
                    'tanggal_post'  =>  date('Y-m-d H:i:s'),
                    'status'    =>  'Menunggu Acc'
                );
                $this->tampilan_model->tambah($data);
                redirect(base_url('karya/listbymhs'), 'refresh');
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

    public function tambahbymhsvid()
    {
        $prodi = $this->kategori_model->listing_kat();
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_wa',
            'No_Wa',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_hp',
            'No_Hp',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
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
            $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title'     =>  'Tambah tampilan',
                    'kategori'  =>  $prodi,
                    'error'     =>  $this->upload->display_errors(),
                );
                $this->load->view('templates/dashboard/headerDosenMhs', $data);
                $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
                $this->load->view('karya/tambahvideo', $data);
                $this->load->view('templates/dashboard/footer');
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                $i = $this->input;
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $data = array(
                    'id' =>  $this->session->userdata('id'),
                    'nama' =>  $this->session->userdata('name'),
                    'slug_tampilan' => $slug_tampilan,
                    'id_kategori'  =>  $i->post('id_kategori'),
                    'id_ck'   => $i->post('id_ck'),
                    'nim'       => $i->post('nim'),
                    'type'   =>  'Video',
                    'No_wa'       => $i->post('No_wa'),
                    'No_hp'       => $i->post('No_hp'),
                    'judul'       => $i->post('judul'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'gambar'    =>  $upload_gambar['upload_data']['file_name'],
                    'tanggal_post'  =>  date('Y-m-d H:i:s'),
                    'status'    =>  'Menunggu Acc'
                );
                $this->tampilan_model->tambah($data);
                redirect(base_url('karya/listbymhs'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Tambah tampilan',
            'kategori'  =>  $prodi,
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/tambahvideo', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function edit($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        $kategori = $this->kategori_model->listing_kat();
        $data = array(
            'title'     =>  'Edit: ' . $tampilan['judul'],
            'kategori'  =>  $kategori,
            'tampilan'  =>  $tampilan,
        );
        $valid = $this->form_validation;
        $valid->set_rules(
            'nim',
            'Nim',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_wa',
            'No_Wa',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
            )
        );
        $valid->set_rules(
            'No_hp',
            'No_Hp',
            'required|min_length[10]|numeric',
            array(
                'required'      =>  '%s harus diisi',
                'min_length[10]' =>  '%s angka yang diisi kurang',
                'numeric'     =>  'mohon isi %s dengan benar'
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
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/images/';
                $config['allowed_types'] = 'jpg|png|jpeg|gif|mov|mpeg|mp3|avi|mp4|pdf';
                $config['max_size'] = '0';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('templates/dashboard/headerDosenMhs', $data);
                    $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
                    $this->load->view('karya/editbydsn', $data);
                    $this->load->view('templates/dashboard/footer');
                } else {
                    $old_image = $data['tampilan']['gambar'];
                    unlink(FCPATH . 'assets/upload/images/' . $old_image);
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                    $i = $this->input;
                    $data = array(
                        'id_tampilan' => $id_tampilan,
                        'slug_tampilan' => $slug_tampilan,
                        'id_kategori'  =>  $i->post('id_kategori'),
                        'nama'  =>  $i->post('nama'),
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
                    redirect(base_url('karya/listbydsn'), 'refresh');
                }
            } else {
                $slug_tampilan = url_title($this->input->post('judul'), 'dash', TRUE);
                $i = $this->input;
                $data = array(
                    'id_tampilan' => $id_tampilan,
                    'slug_tampilan' => $slug_tampilan,
                    'id_kategori'  =>  $i->post('id_kategori'),
                    'nama'  =>  $i->post('nama'),
                    'id_ck'   => $i->post('id_ck'),
                    'nim'       => $i->post('nim'),
                    'type'   =>  $i->post('type'),
                    'No_wa'       => $i->post('No_wa'),
                    'No_hp'       => $i->post('No_hp'),
                    'judul'       => $i->post('judul'),
                    'deskripsi'     => $i->post('deskripsi')
                );
                $this->tampilan_model->edit($data);
                redirect(base_url('karya/listbydsn'), 'refresh');
            }
        }
        $data = array(
            'title'     =>  'Edit: ' . $tampilan['judul'],
            'kategori'  =>  $kategori,
            'tampilan'  =>  $tampilan
        );
        $this->load->view('templates/dashboard/headerDosenMhs', $data);
        $this->load->view('templates/dashboard/sidebarDosenMhs', $data);
        $this->load->view('karya/editbydsn', $data);
        $this->load->view('templates/dashboard/footer');
    }

    public function deletebydsn($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        unlink('./assets/upload/images/' . $tampilan['gambar']);
        $data = array('id_tampilan' => $id_tampilan);
        $this->tampilan_model->delete($data);
        redirect(base_url('karya/listbydsn'), 'refresh');
    }

    public function deletebymhs($id_tampilan)
    {
        $tampilan = $this->tampilan_model->detail($id_tampilan);
        unlink('./assets/upload/images/' . $tampilan['gambar']);
        $data = array('id_tampilan' => $id_tampilan);
        $this->tampilan_model->delete($data);
        redirect(base_url('karya/listbydsn'), 'refresh');
    }

    function fetch()
    {
        if ($this->input->post('id_kategori')) {
            echo $this->kategori_model->fetch_child($this->input->post('id_kategori'));
        }
    }
}
