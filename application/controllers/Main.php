<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('main_model');
    $this->load->model('user_model');
    $this->load->library('upload');
    $this->load->library('pagination');
    // is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    $data['dt_slider'] = $this->main_model->getDtSlider();
    $data['dt_info'] = $this->main_model->getAllDtInfoDesc();
    $data['dt_lab'] = $this->main_model->getAllDtLab();
    $data['dt_panel'] = $this->main_model->getDtPanel();
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/index');
    $this->load->view('templates/main/footer');
  }


  public function lab()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    // Session name is $newData
    $data['dt_lab'] = $this->main_model->getAllDtLab();
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/lab');
    $this->load->view('templates/main/footer');
  }
  public function galleryKarya()
  {
    $data['title'] = 'Laboratorium FIK';
    // Session name is $newData
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/galleryKarya');
    $this->load->view('templates/main/footer');
  }

  public function galleryView()
  {
    $data['title'] = 'Laboratorium FIK';
    // Session name is $newData
    $this->load->view('templates/main/header', $data);
    $this->load->view('main/galleryView');
    $this->load->view('templates/main/footer');
  }

  public function peminjaman()
  {
    $data['title'] = 'Laboratorium Fakultas Industri Kreatif Telkom University';
    // Session name is $newData
    if (isset($_SESSION['id'])) {
      redirect('auth/check');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">
			Ooppss... Kamu harus login untuk menggunakan fitur ini</div>');
      redirect('auth');
    }
  }

  public function helpdesk()
  {
    $data['title'] = 'Laboratorium FIK';
    // Session name is $newData
    if (isset($_SESSION['id'])) {
      $data['strTitle'] = '';
      $data['strsubTitle'] = '';
      $list = [];
      if ($this->session->userdata['role_id'] == '4') {
        $list = $this->user_model->AdminsList();
        $data['strTitle'] = 'Semua Admin';
        $data['strsubTitle'] = 'Admin';
        $data['chatTitle'] = 'Pilih Admin yang ingin anda hubungi';
      }
      if ($this->session->userdata['role_id'] == '3') {
        $list = $this->user_model->AdminsList();
        $data['strTitle'] = 'Semua Admin';
        $data['strsubTitle'] = 'Admin';
        $data['chatTitle'] = 'Pilih Admin yang ingin anda hubungi';
      } else {
        $list = $this->user_model->DosenMhsList();
        $data['strTitle'] = 'Semua Dosen dan Mahasiswa yang terhubung';
        $data['strsubTitle'] = 'Dosen dan Mahasiswa';
        $data['chatTitle'] = 'Pilih Dosen atau Mahasiswa yang ingin dihubungi';
      }
      $userslist = [];
      foreach ($list as $u) {
        $userslist[] =
          [
            'id' => $u['id'],
            'name' => $u['name'],
            // 'picture_url' => $this->user_model->PictureUrlById($u['id']),
            'status' => $u['status'],
          ];
      }
      $data['userslist'] = $userslist;
      // $this->parser->parse('chat/chatTemplate',$data);
      $this->load->view('chat/chatTemplate', $data);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert" style="margin-top:24px;">
			Ooppss... Kamu harus login untuk menggunakan fitur ini</div>');
      redirect('auth');
    }
  }
}
