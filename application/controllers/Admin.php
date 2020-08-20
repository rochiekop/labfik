<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('main_model');
    $this->load->model('booking_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Dashboard';
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/index', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function dt_lab()
  {
    $data['title'] = 'LABFIK | Data Laboratorium';
    $data['dt_lab'] = $this->main_model->getAllDtLab();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/dt_lab', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function add_dtlab()
  {
    $data['title'] = 'LABFIK | Tambah Data Laboratorium';
    $this->form_validation->set_rules('body', 'Desc', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required|trim|is_unique[tb_lab.title]', [
      'is_unique' => '*Judul ' . $this->input->post('title') . ' sudah terdaftar dalam sistem'
    ]);
    $this->form_validation->set_rules('body', 'Deskripsi', 'required|trim', [
      'required' => 'Form Deskripsi harus diisi'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/add_dtlab', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      // get foto
      $config['upload_path'] = './assets/img/laboratorium';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20024';  //20MB max
      $config['max_width'] = '7680'; // pixel
      $config['max_height'] = '6480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $images = array('upload_data' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/laboratorium/' . $images['upload_data']['file_name'];
        $config['new_image']    = './assets/img/laboratorium/thumbs/';
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 600;
        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $data = [
          'id' => uniqid(),
          "images" =>  $images['upload_data']['file_name'],
          "title" => $this->input->post('title', true),
          'slug'  => url_title($this->input->post('title'), 'dash', TRUE),
          "body" => $this->input->post('body', true),
        ];
        $this->db->insert('tb_lab', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laboratorium berasil ditambahkan!</div>');
        redirect('admin/dt_lab');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        'id' => uniqid(),
        "images" => "default.jpg",
        "title" => $this->input->post('title', true),
        'slug'  => url_title($this->input->post('title'), 'dash', TRUE),
        "body" => $this->input->post('body', true),
      ];
      $this->db->insert('tb_lab', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laboratorium berhasil ditambahkan!</div>');
      redirect('admin/dt_lab');
    }
  }

  // Edit Data Panel

  public function edit_dtlab($id)
  {
    $id = decrypt_url($id);
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Data Lab';

    $data['dt_lab'] = $this->main_model->getDtLabById($id);

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('body', 'Body', 'required');

    $path = './assets/img/laboratorium/';
    $paththumbs = './assets/img/laboratorium/thumbs/';

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/edit_dtlab', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/laboratorium';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20024';  //20MB max
      $config['max_width'] = '7680'; // pixel
      $config['max_height'] = '6480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $old_img = $data['dt_lab']['images'];
        if ($old_img != 'default.jpg') {
          //delete video in direktori
          @unlink($path . $this->input->post('image!updated'));
          @unlink($paththumbs . $this->input->post('image!updated'));
        }
        $image = array('upload_data' => $this->upload->data());;
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/laboratorium/' . $image['upload_data']['file_name'];
        $config['new_image']    = './assets/img/laboratorium/thumbs/';
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 600;
        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $data = array(
          'images'       => $image['upload_data']['file_name'],
          'title'       => $this->input->post('title'),
          'slug'       => url_title($this->input->post('title'), 'dash', TRUE),
          'body'     => $this->input->post('body'),
        );
        $this->db->update('tb_lab', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laboratorium berhasil diubah!</div>');
        redirect('admin/dt_lab');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'images'       => $this->input->post('image!updated'),
        'title' => $this->input->post('title'),
        'slug'       => url_title($this->input->post('title'), 'dash', TRUE),
        'body'     => $this->input->post('body'),
      );
      $this->db->update('tb_lab', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laboratorium berhasil diubah!</div>');
      redirect('admin/dt_lab');
    }
  }

  public function deletelab()
  {
    $id = $this->input->post('id');
    $image = $this->input->post('image');
    $data['dt_lab'] = $this->main_model->getDtLabById($id);
    $path = 'assets/img/laboratorium/';
    $paththumbs = 'assets/img/laboratorium/thumbs/';
    $old_img = $data['dt_lab']['images'];
    if ($old_img != 'default.jpg') {
      @unlink($path . $image);
      @unlink($paththumbs . $image);
    }
    $this->db->delete('tb_lab', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Laboratorium berhasil dihapus!</div>');
    redirect('admin/dt_lab');
  }


  // INFORMATION

  public function dt_info()
  {
    $data['title'] = 'LABFIK | Informasi';
    $data['dt_info'] = $this->main_model->getAllDtInfoDesc();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/dt_info', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function add_dtinfo()
  {
    $data['title'] = 'LABFIK | Tambah Informasi';

    $this->form_validation->set_rules('title', 'Title', 'required|trim|is_unique[tb_info.title]', [
      'is_unique' => '*Judul ' . $this->input->post('title') . ' sudah terdaftar dalam sistem'
    ]);
    $this->form_validation->set_rules('body', 'Deskripsi', 'required|trim', [
      'required' => 'Form Deskripsi harus diisi'
    ]);
    $upload = implode("", $this->main_model->upload());
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/add_dtinfo', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/informasi';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20048';  //20MB max
      $config['max_width'] = '8480'; // pixel
      $config['max_height'] = '8480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $images = array('upload_data' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/informasi/' . $images['upload_data']['file_name'];
        $config['new_image']    = './assets/img/informasi/thumbs/';
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 500;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $data = array(
          'id' => uniqid(),
          'title'       => $this->input->post('title'),
          'slug'       => url_title($this->input->post('title'), 'dash', TRUE),
          'images'       => $images['upload_data']['file_name'],
          'body'     => $this->input->post('body'),
          'uploadby' => $upload,
        );
        $this->db->insert('tb_info', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil ditambahkan!</div>');
        redirect('admin/dt_info');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        'id' => uniqid(),
        "title" => $this->input->post('title', true),
        "slug" => url_title($this->input->post('title'), 'dash', TRUE),
        "images" => "default.jpg",
        "body" => $this->input->post('body', true),
        "uploadby" => $upload
      ];
      $this->db->insert('tb_info', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil ditambahkan!</div>');
      redirect('admin/dt_info');
    }
  }

  public function edit_dtinfo($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'LABFIK | Edit Data Informasi';
    $data['dt_info'] = $this->main_model->getDtInfoById($id);

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('body', 'Body', 'required|trim');

    $path = './assets/img/informasi/';
    $paththumbs = './assets/img/informasi/thumbs/';

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/edit_dtinfo', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/informasi';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '10048';  //10MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $old_img = $data['dt_info']['images'];
        if ($old_img != 'default.jpg') {
          //delete video in direktori
          @unlink($path . $this->input->post('image!updated'));
          @unlink($paththumbs . $this->input->post('image!updated'));
        }
        $image = array('upload_data' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/img/informasi/' . $image['upload_data']['file_name'];
        $config['new_image']    = './assets/img/informasi/thumbs/';
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 500;
        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
        $data = array(
          'title'       => $this->input->post('title'),
          "slug" => url_title($this->input->post('title'), 'dash', TRUE),
          'images'       => $image['upload_data']['file_name'],
          'body'     => $this->input->post('body'),
        );
        $this->db->update('tb_info', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Info has been Updated!</div>');
        redirect('admin/dt_info');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'title' => $this->input->post('title'),
        "slug" => url_title($this->input->post('title'), 'dash', TRUE),
        'images'       => $this->input->post('image!updated'),
        'body'     => $this->input->post('body'),
      );
      $this->db->update('tb_info', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Berhasil diUpdated</div>');
      redirect('admin/dt_info');
    }
  }

  public function deleteinfo()
  {

    $id = $this->input->post('id');
    $image = $this->input->post('image');
    $data['dt_info'] = $this->main_model->getDtInfoById($id);
    $path = 'assets/img/informasi/';
    $paththumbs = 'assets/img/informasi/thumbs/';
    $old_img = $data['dt_info']['images'];
    if ($old_img != 'default.jpg') {
      @unlink($path . $image);
      @unlink($paththumbs . $image);
    }
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->delete('tb_info');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil dihapus</div>');
    redirect('admin/dt_info');
  }

  // PANEL
  public function dt_panel()
  {
    $data['title'] = 'Info Panel';
    $data['dt_panel'] = $this->main_model->getDtPanel();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/dt_panel', $data);
    $this->load->view('templates/dashboard/footer');
  }
  public function add_dtpanel()
  {
    $data['title'] = 'LABFIK | Tambah Info Panel';

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('body', 'Body', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/add_dtpanel', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['video']['name']) and !empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/panel';
      $config['allowed_types'] = '*';
      $config['max_size'] = '1000000';  //100MB max
      $config['max_width'] = '200000000'; // pixel
      $config['max_height'] = '1000000000000'; // pixel
      $video = trim(addslashes($_FILES['video']['name']));
      $video = preg_replace('/\s+/', '_', $video);
      $image = trim(addslashes($_FILES['image']['name']));
      $image = preg_replace('/\s+/', '_', $image);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('video') and $this->upload->do_upload('image')) {
        $data = array(
          'title'       => $this->input->post('title'),
          'body'        => $this->input->post('body'),
          'video'       => $video,
          'thumb' => $image,
        );
        $this->db->insert('tb_panel', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil ditambahkan!</div>');
        redirect('admin/dt_panel');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'title'       => $this->input->post('title'),
        'body'        => $this->input->post('body'),
        'video'       => "video_placeholder.png",
      );
      $this->db->insert('tb_panel', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil ditambahkan!</div>');
      redirect('admin/dt_panel');
    }
  }


  public function editpanel($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'Edit Data Panel';

    $data['dt_panel'] = $this->main_model->getDtPanelById($id);

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('body', 'Body', 'required|trim');
    $path = './assets/img/panel/';
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/edit_dtpanel', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['video']['name']) and !empty($_FILES['image']['name'])) {
      // get Video
      $config['upload_path'] = './assets/img/panel';
      $config['allowed_types'] = '*';
      $config['max_size'] = '1000000';  //100MB max
      $config['max_width'] = '200000000'; // pixel
      $config['max_height'] = '1000000000000'; // pixel
      $config['remove_space'] = TRUE;
      $video = trim(addslashes($_FILES['video']['name']));
      $video = preg_replace('/\s+/', '_', $video);
      $image = trim(addslashes($_FILES['image']['name']));
      $image = preg_replace('/\s+/', '_', $image);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('video') and $this->upload->do_upload('image')) {
        if ($video != 'video_placeholder.png') {
          //delete video in direktori
          @unlink($path . $this->input->post('video!updated'));
          @unlink($path . $this->input->post('image!updated'));
        }
        $data = array(
          'title'       => $this->input->post('title'),
          'body'     => $this->input->post('body'),
          'video'       => $video,
          'thumb'       => $image,
        );
        $this->db->update('tb_panel', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil diperbarui!</div>');
        redirect('admin/dt_panel');
      }
    } elseif (!empty($_FILES['video']['name']) or !empty($_FILES['image']['name'])) {
      // get Video
      $config['upload_path'] = './assets/img/panel';
      $config['allowed_types'] = '*';
      $config['max_size'] = '1000000';  //100MB max
      $config['max_width'] = '200000000'; // pixel
      $config['max_height'] = '1000000000000'; // pixel
      $config['remove_space'] = TRUE;
      $video = trim(addslashes($_FILES['video']['name']));
      $video = preg_replace('/\s+/', '_', $video);
      $image = trim(addslashes($_FILES['image']['name']));
      $image = preg_replace('/\s+/', '_', $image);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('video')) {
        if ($video != 'video_placeholder.png') {
          //delete video in direktori
          @unlink($path . $this->input->post('video!updated'));
        }
        $data = array(
          'title'       => $this->input->post('title'),
          'body'     => $this->input->post('body'),
          'video'       => $video,
          'thumb'       => $this->input->post('image!updated'),
        );
        $this->db->update('tb_panel', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil diperbarui!</div>');
        redirect('admin/dt_panel');
      } elseif ($this->upload->do_upload('image')) {
        @unlink($path . $this->input->post('image!updated'));
        $data = array(
          'title'       => $this->input->post('title'),
          'body'     => $this->input->post('body'),
          'video'       => $this->input->post('video!updated'),
          'thumb'       => $image
        );
        $this->db->update('tb_panel', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil diperbarui!</div>');
        redirect('admin/dt_panel');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'title' => $this->input->post('title'),
        'body'     => $this->input->post('body'),
        'video'       => $this->input->post('video!updated'),
        'thumb'       => $this->input->post('image!updated'),
      );
      $this->db->update('tb_panel', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Info Panel berhasil diperbarui!</div>');
      redirect('admin/dt_panel');
    }
  }


  public function deletepanel()
  {
    $id = $this->input->post('id');
    $video = $this->input->post('video');
    $image = $this->input->post('image');
    $path = './assets/img/panel/';
    $panel = $this->db->get_where('tb_panel', ['id' => $id])->row_array();
    if ($panel->images != 'video_placeholder.png') {
      unlink($path . $video);
      unlink($path . $image);
    }
    $this->main_model->deleteDataPanel($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data panel berhasil dihapus</div>');
    redirect('admin/dt_panel');
  }

  // SLIDER
  public function dt_slider()
  {
    $data['title'] = 'Info Slider Informasi';
    $data['dt_slider'] = $this->main_model->getAllDtSliderDesc();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/dt_slider', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function add_dtslider()
  {
    $data['title'] = 'Add Data Slider';
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/add_dtslider', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      // get foto
      $config['upload_path'] = './assets/img/slider';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20024';  //20MB max
      $config['max_width'] = '7680'; // pixel
      $config['max_height'] = '6480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $images = $this->upload->data();
        $data = [
          "id" => uniqid(),
          "title" => $this->input->post('title', true),
          "images" =>  $images['file_name'],
          "body" => $this->input->post('body', true)
        ];
        $this->db->insert('tb_slider', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider has been Add!</div>');
        redirect('admin/dt_slider');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        "id" => uniqid(),
        "title" => $this->input->post('title', true),
        "images" => "default.jpg",
        "body" => $this->input->post('body', true),
      ];
      $this->db->insert('tb_slider', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider has been Add!</div>');
      redirect('admin/dt_slider');
    }
  }



  public function edit_dtslider($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'Edit Info Slider';
    $data['dt_slider'] = $this->main_model->getDtSliderById($id);
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $path = './assets/img/slider/';
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/edit_dtslider', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/slider';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20048';  //10MB max
      $config['max_width'] = '8480'; // pixel
      $config['max_height'] = '8480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $old_img = $data['dt_slider']['images'];
        if ($old_img != 'default.jpg') {
          //delete video in direktori
          @unlink($path . $this->input->post('image!updated'));
        }
        $image = $this->upload->data();
        $data = array(
          'title'       => $this->input->post('title'),
          'images'       => $image['file_name'],
          'body'     => $this->input->post('body'),
        );
        $this->db->update('tb_slider', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Info slider berhasil diubah!</div>');
        redirect('admin/dt_slider');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'title' => $this->input->post('title'),
        'images'       => $this->input->post('image!updated'),
        'body'     => $this->input->post('body'),
      );
      $this->db->update('tb_slider', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Info slider berhasil diubah!</div>');
      redirect('admin/dt_slider');
    }
  }

  // delete
  public function deleteslider()
  {
    $id = $this->input->post('id');
    $image = $this->input->post('image');
    $data['dt_slider'] = $this->main_model->getDtSliderById($id);
    $path = 'assets/img/slider/';
    $old_img = $data['dt_slider']['images'];
    if ($old_img != 'default.jpg') {
      @unlink($path . $image);
    }
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->delete('tb_slider');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Slider berhasil dihapus</div>');
    redirect('admin/dt_slider');
  }

  // TEMPAT
  public function daftarTempat()
  {

    $data['title'] = ' LABFIK | Data Tempat';
    $data['dtempat'] = $this->admin_model->getAllDaftarTempat();
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/daftarTempat', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function tambahTempat()
  {

    $data['title'] = ' LABFIK | Tambah Tempat';
    $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim|is_unique[ruangan.ruangan]', [
      'is_unique' => '*Ruangan ' . $this->input->post('ruangan') . ' sudah terdaftar dalam sistem'
    ]);
    $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim|numeric', [
      'numeric' => '*Kapasitas harus dalam angka'
    ]);

    $data['kruangan'] = $this->admin_model->kategoriruangan();
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/tambahTempat', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/ruangan';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20048';  //10MB max
      $config['max_width'] = '8480'; // pixel
      $config['max_height'] = '8480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $images = $this->upload->data();
        $data = array(
          'id' => uniqid(),
          'id_kategori' => $this->input->post('kategori'),
          'ruangan'     => $this->input->post('ruangan'),
          'akses' => implode(", ", $this->input->post('akses')),
          'kapasitas' => $this->input->post('kapasitas'),
          'images' => $images['file_name'],
        );
        $this->db->insert('ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan berhasil ditambahkan!</div>');
        redirect('admin/daftartempat');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = [
        'id' => uniqid(),
        'id_kategori' => $this->input->post('kategori'),
        'ruangan'     => $this->input->post('ruangan'),
        'akses' => implode(", ", $this->input->post('akses')),
        'kapasitas' => $this->input->post('kapasitas'),
        'images' => 'default.jpg',
      ];
      $this->db->insert('ruangan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan berhasil ditambahkan!</div>');
      redirect('admin/daftartempat');
    }
  }

  public function editTempat($id)
  {
    $id = decrypt_url($id);
    $data['title'] = 'LABFIK | Edit Tempat';
    $data['kruangan'] = $this->admin_model->kategoriruangan();
    $data['tempatbyid'] = $this->admin_model->getDtTempatById($id);
    $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
    $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim|numeric', [
      'numeric' => '*Kapasitas harus dalam angka'
    ]);

    $path = './assets/img/ruangan/';
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/dashboard/headerAdmin', $data);
      $this->load->view('templates/dashboard/sidebarAdmin', $data);
      $this->load->view('dashboard/admin/editTempat', $data);
      $this->load->view('templates/dashboard/footer');
    } elseif (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './assets/img/ruangan';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '20048';  //20MB max
      $config['max_width'] = '8480'; // pixel
      $config['max_height'] = '8480'; // pixel
      $config['file_name'] = $_FILES['image']['name'];
      $this->upload->initialize($config);
      if ($this->upload->do_upload('image')) {
        $old_img = $data['tempatbyid']['images']; #ambildaridatayang diubah
        if ($old_img != 'default.jpg') {
          //delete image in direktori
          @unlink($path . $this->input->post('image!updated'));
        }
        $image = $this->upload->data();
        $data = array(
          'id_kategori' => $this->input->post('kategori'),
          'ruangan'     => $this->input->post('ruangan'),
          'akses' => implode(", ", $this->input->post('akses')),
          'kapasitas' => $this->input->post('kapasitas'),
          'images' => $image['file_name'],
        );
        $this->db->update('ruangan', $data, ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tempat berhasil diubah!</div>');
        redirect('admin/daftartempat');
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $data = array(
        'id_kategori' => $this->input->post('kategori'),
        'ruangan'     => $this->input->post('ruangan'),
        'akses' => implode(", ", $this->input->post('akses')),
        'kapasitas' => $this->input->post('kapasitas'),
      );
      $this->db->update('ruangan', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tempat berhasil diubah!</div>');
      redirect('admin/daftartempat');
    }
  }

  public function deletetempat()
  {
    $id = $this->input->post('id');
    $image = $this->input->post('image');
    $data['ruangan'] = $this->admin_model->getDtTempatById($id);
    $path = 'assets/img/ruangan/';
    $old_img = $data['ruangan']['images'];
    if ($old_img != 'default.jpg') {
      @unlink($path . $image);
    }
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->delete('ruangan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan berhasil dihapus</div>');
    redirect('admin/daftartempat');
  }

  public function buatPeminjaman()
  {

    $data['title'] = ' LABFIK | Buat Peminjaman';
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/buatPeminjaman', $data);
    $this->load->view('templates/dashboard/footer');
  }
  public function daftarkategori()
  {
    $data['title'] = ' LABFIK | Daftar Kategori Tempat';
    $data['kategori'] = $this->admin_model->kategoriRuangan();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/daftarKategori', $data);
    $this->load->view('templates/dashboard/footer');
  }
  public function addkategori()
  {
    $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[kategoriruangan.kategori]');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang diinputkan sudah terdaftar dalam sistem!</div>');
      redirect('admin/daftarkategori');
    } else {
      $data = array(
        "id" => uniqid(),
        "kategori" => $this->input->post('kategori'),
      );
      $this->db->insert('kategoriruangan  ', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan</div>');
      redirect('admin/daftarkategori');
    }
  }

  public function deletekategori()
  {
    $id = $this->input->post('id');
    $this->db->delete('kategoriruangan', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil dihapus!</div>');
    redirect('admin/daftarkategori');
  }

  public function editkategori()
  {
    $id = $this->input->post('id');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[kategoriruangan.kategori]');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data yang diinputkan sudah terdaftar dalam sistem!</div>');
      redirect('admin/daftarkategori');
    } else {
      $data = array(
        "id" => uniqid(),
        "kategori" => $this->input->post('kategori'),
      );
      $this->db->update('kategoriruangan', $data, ['id' => $id]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan</div>');
      redirect('admin/daftarkategori');
    }
  }

  public function riwayat()
  {
    $data['title'] = ' LABFIK | Riwayat Peminjaman Tempat';
    $data['kategori'] = $this->admin_model->kategoriRuangan();
    $data['booking'] = $this->admin_model->booking();
    $data['ruangan'] = $this->admin_model->getRuangan();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/riwayat', $data);
    $this->load->view('templates/dashboard/footer');
  }

  function get_sub_category($category_id)
  {
    $query = $this->db->get_where('ruangan', array('subcategory_category_id' => $category_id));
    return $query;
  }


  public function activationrequest()
  {
    $data['title'] = ' LABFIK | Riwayat Peminjaman Tempat';
    $data['user'] = $this->admin_model->activationrequest();
    // $data['token'] = $this->admin_model->getToken();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/activationrequest', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function deletetokenrequest()
  {
    $user = $this->db->get_where('user', ['id' => $this->input->post('id')])->row_array();
    if ($user) {
      $this->db->delete('user', ['id' => $this->input->post('id')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="margin-top:24px;">Hapus data request token berhasil dilakukan.</div>');
      redirect('admin/activationrequest');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">Akun belum terdaftar dalam sistem.</div>');
      redirect('admin/activationrequest');
    }
  }

  public function editpeminjaman($id)
  {
    $id = decrypt_url($id);
    $data['id_booking'] = $id;
    $data['title'] = ' LABFIK | Edit Peminjaman Tempat';
    $data['booking'] = $this->booking_model->getBookingById($id)->row_array();
    $getdata = $this->booking_model->getBookingById($id);
    $data['kategori'] = $this->admin_model->kategoriRuangan();
    if ($getdata->num_rows() > 0) {
      $row = $getdata->row_array();
      $data['sub_category_id'] = $row['id_ruangan'];
      $data['status'] = $row['status'];
    }
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/editpeminjaman', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function geteditpeminjaman()
  {
    $booking_id = $this->input->post('id_booking', TRUE);
    $data = $this->booking_model->getBookingById($booking_id)->result();
    echo json_encode($data);
  }

  public function updatepeminjaman()
  {
    if ($this->input->post('status') == "Diterima") {
      $data = array(
        'id_ruangan' => $this->input->post('ruangan'),
        'date_declined' => 'NULL',
        'date' => $this->input->post('date'),
        'time' => implode(", ", $this->input->post('time')),
        'keterangan' => $this->input->post('keterangan'),
        'status' => $this->input->post('status')
      );
      $this->db->update('booking', $data, ['id' => $this->input->post('id_booking')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman berhasil diubah</div>');
      redirect('admin/riwayat');
    } elseif ($this->input->post('status') == "Ditolak") {
      $data = array(
        'date' => 'NULL',
        'date_declined' => $this->input->post('date'),
        'status' => 'Ditolak',
      );
      $this->db->update('booking', $data, ['id' => $this->input->post('id_booking')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman berhasil diubah</div>');
      redirect('admin/riwayat');
    }
  }
  public function deletebooking()
  {
    $where = array('id' =>  $this->input->post('id'));
    $this->db->where($where);
    $this->db->delete('booking');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peminjaman tempat berhasil dihapus</div>');
    redirect('admin/riwayat');
  }

  // UNIT BISNIS
  public function addJasa()
  {
    $data['title'] = ' LABFIK | Tambah Jasa';
    // $data['token'] = $this->admin_model->getToken();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/addJasa', $data);
    $this->load->view('templates/dashboard/footer');
  }

  public function response()
  {
    $data['title'] = ' LABFIK | Daftar Respon Formulir';
    // $data['token'] = $this->admin_model->getToken();
    $this->load->view('templates/dashboard/headerAdmin', $data);
    $this->load->view('templates/dashboard/sidebarAdmin', $data);
    $this->load->view('dashboard/admin/response', $data);
    $this->load->view('templates/dashboard/footer');
  }
}
